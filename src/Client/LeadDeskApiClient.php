<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 12:10
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Client;


use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactFilter;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactIdFilter;
use LeadDesk\Lib\LeadDeskApiClient\Http\RequestFactory;
use LeadDesk\Lib\LeadDeskApiClient\Repository\Contact\ContactRepository;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Contact\ExistRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Contact\FindRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Contact\GetRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\RepresentationInterface;
use Psr\Http\Message\RequestInterface;

class LeadDeskApiClient
{
	/** @var ApiClient */
	private $apiClient;

	/** @var SerializerInterface */
	private $serializer;

	public function __construct(ApiClient $apiClient)
	{
		$this->apiClient  = $apiClient;
		$this->serializer = SerializerBuilder::create()->build();

	}

	/**
	 * @param ContactFilter $contactFilter
	 *
	 * @return ExistRepresentation|RepresentationInterface
	 */
	public function contactExists(ContactFilter $contactFilter)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getExistsParameters($contactFilter));
		$response          = $this->apiClient->sendRequest($request, ExistRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param ContactFilter $contactFilter
	 *
	 * @return FindRepresentation|RepresentationInterface
	 */
	public function findContact(ContactFilter $contactFilter)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getFindParameters($contactFilter));
		$response          = $this->apiClient->sendRequest($request, FindRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param ContactIdFilter $contactIdFilter
	 *
	 * @return GetRepresentation|RepresentationInterface
	 */
	public function getContact(ContactIdFilter $contactIdFilter)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getGetContactParameters($contactIdFilter));
		$response          = $this->apiClient->sendRequest($request, GetRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param string                       $method
	 * @param array                        $queryParams
	 * @param RepresentationInterface|null $body
	 *
	 * @return RequestInterface
	 */
	private function createRequest(
		$method = RequestFactory::METHOD_GET,
		array $queryParams = [],
		RepresentationInterface $body = null
	)
	{
		$query    = http_build_query($queryParams);
		$basePath = RequestFactory::LEAD_DESK_API_URL;
		$uri      = sprintf('%s?%s', $basePath, $query);

		if (false === ($body instanceof RepresentationInterface))
		{
			return $this->apiClient->getMessageFactory()->createRequest($method, $uri,
				[
					RequestFactory::ACCEPT_HEADER => RequestFactory::JSON_TYPE,
				]);
		}

		$serializedBody = $this->serializer->serialize($body, 'json');
		$stream         = $this->apiClient->getStreamFactory()->createStream($serializedBody);

		return $this->apiClient->getMessageFactory()->createRequest($method, $uri, [
			RequestFactory::ACCEPT_HEADER       => RequestFactory::JSON_TYPE,
			RequestFactory::CONTENT_TYPE_HEADER => RequestFactory::JSON_TYPE,
		])->withBody($stream);
	}
}