<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 12:10
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Client;


use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Call\CallRefIdFilter;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactFilter;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactIdFilter;
use LeadDesk\Lib\LeadDeskApiClient\Http\RequestFactory;
use LeadDesk\Lib\LeadDeskApiClient\Repository\Call\CallRepository;
use LeadDesk\Lib\LeadDeskApiClient\Repository\Contact\ContactRepository;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Request\Contact\ContactRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Call\GetCallRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact\CreateContactRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact\DeleteContactRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact\ExistContactRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact\FindContactRepresentation;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact\GetContactRepresentation;
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
	 * @return ExistContactRepresentation|RepresentationInterface
	 */
	public function contactExists(ContactFilter $contactFilter)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getExistsParameters($contactFilter));
		$response          = $this->apiClient->sendRequest($request, ExistContactRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param ContactFilter $contactFilter
	 *
	 * @return FindContactRepresentation|RepresentationInterface
	 */
	public function findContact(ContactFilter $contactFilter)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getFindParameters($contactFilter));
		$response          = $this->apiClient->sendRequest($request, FindContactRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param ContactIdFilter $contactIdFilter
	 *
	 * @return GetContactRepresentation|RepresentationInterface
	 */
	public function getContact(ContactIdFilter $contactIdFilter)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getGetContactParameters($contactIdFilter));
		$response          = $this->apiClient->sendRequest($request, GetContactRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param CallRefIdFilter $callRefIdFilter
	 *
	 * @return GetCallRepresentation|RepresentationInterface
	 */
	public function getCallDataByCallRefId(CallRefIdFilter $callRefIdFilter)
	{
		$callRepository = (new CallRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $callRepository::getGetCallParameters($callRefIdFilter));
		$response          = $this->apiClient->sendRequest($request, GetCallRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param ContactIdFilter $contactIdFilter
	 *
	 * @return DeleteContactRepresentation|RepresentationInterface
	 */
	public function deleteContact(ContactIdFilter $contactIdFilter)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getDeleteContactParameters($contactIdFilter));
		$response          = $this->apiClient->sendRequest($request, DeleteContactRepresentation::class);

		return $response->getRepresentation();
	}

	/**
	 * @param ContactRepresentation $contactRepresentation
	 *
	 * @return CreateContactRepresentation|RepresentationInterface
	 */
	public function createContact(ContactRepresentation $contactRepresentation)
	{
		$contactRepository = (new ContactRepository($this->apiClient->getCredentials()));
		$request           = $this->createRequest(RequestFactory::METHOD_GET, $contactRepository::getCreateContactParameters($contactRepresentation));
		$response          = $this->apiClient->sendRequest($request, CreateContactRepresentation::class);

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