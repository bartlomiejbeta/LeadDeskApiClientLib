<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 11:34
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Client;


use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Message\StreamFactory;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use LeadDesk\Lib\LeadDeskApiClient\Client\Credentials\CredentialsInterface;
use LeadDesk\Lib\LeadDeskApiClient\Exception\ApiClientException;
use LeadDesk\Lib\LeadDeskApiClient\Exception\InvalidRepresentationException;
use LeadDesk\Lib\LeadDeskApiClient\Http\EnvelopedMessage;
use LeadDesk\Lib\LeadDeskApiClient\Http\ResponseFactory;
use LeadDesk\Lib\LeadDeskApiClient\Representation\RepresentationInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiClient
{
	/** @var HttpClient */
	private $httpClient;

	/** @var CredentialsInterface */
	private $credentials;

	/** @var MessageFactory */
	private $messageFactory;

	/** @var StreamFactory */
	private $streamFactory;

	/** @var SerializerInterface */
	private $serializer;

	public function __construct(HttpClient $httpClient, CredentialsInterface $credentials, MessageFactory $messageFactory, StreamFactory $streamFactory)
	{
		$this->httpClient     = $httpClient;
		$this->credentials    = $credentials;
		$this->messageFactory = $messageFactory;
		$this->streamFactory  = $streamFactory;
		$this->serializer     = SerializerBuilder::create()->build();
	}

	/**
	 * @param RequestInterface $request
	 * @param string           $representation
	 *
	 * @return EnvelopedMessage
	 */
	public function sendRequest(RequestInterface $request, $representation = null)
	{
		$response = $this->send($request, $representation);

		return $response;
	}

	/**
	 * @return CredentialsInterface
	 */
	public function getCredentials()
	{
		return $this->credentials;
	}

	/**
	 * @return MessageFactory
	 */
	public function getMessageFactory()
	{
		return $this->messageFactory;
	}

	/**
	 * @return StreamFactory
	 */
	public function getStreamFactory()
	{
		return $this->streamFactory;
	}

	/**
	 * @param RequestInterface $request
	 * @param string           $representation
	 *
	 * @return EnvelopedMessage
	 */
	private function send(RequestInterface $request, $representation = null)
	{
		$response = $this->httpClient->sendRequest($request);

		if (false === ResponseFactory::isSuccessCode($response->getStatusCode()))
		{
			throw new ApiClientException(
				$response->getBody(),
				$response->getStatusCode()
			);
		}

		return $this->wrapMessage($request, $response, $representation);
	}

	/**
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param string            $representation
	 *
	 * @return EnvelopedMessage
	 */
	private function wrapMessage(
		RequestInterface $request,
		ResponseInterface $response,
		$representation = null
	)
	{
		$wrappedMessage = new EnvelopedMessage($response, $request);
		$httpResponse   = $wrappedMessage->getResponse();
		$responseBody   = $httpResponse->getBody();
		$content        = $responseBody->getContents();
		//Rewind the stream for the next usage
		$responseBody->rewind();
		if (false === empty($content) && false === empty($representation))
		{
			/** @var RepresentationInterface $representation */
			$responseRepresentation = $this->deserialize($content, $representation);
			$wrappedMessage->setRepresentation($responseRepresentation);
		}

		return $wrappedMessage;
	}

	/**
	 * @param string $object
	 * @param string $representation
	 *
	 * @return RepresentationInterface
	 */
	private function deserialize($object, $representation)
	{
		$representation = $this->serializer->deserialize($object, $representation, 'json');

		if (false === ($representation instanceof RepresentationInterface))
		{
			throw new InvalidRepresentationException(
				sprintf(
					'object must be an instance of %s, but %s given',
					RepresentationInterface::class,
					$representation
				)
			);
		}

		/** @var RepresentationInterface $representation */
		return $representation;
	}
}