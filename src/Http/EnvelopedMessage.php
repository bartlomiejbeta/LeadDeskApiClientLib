<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 11:48
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Http;


use LeadDesk\Lib\LeadDeskApiClient\Representation\RepresentationInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EnvelopedMessage
{
	/** @var RepresentationInterface */
	private $representation;

	/** @var ResponseInterface */
	private $response;

	/** @var RequestInterface */
	private $request;

	public function __construct(ResponseInterface $response, RequestInterface $request)
	{
		$this->response = $response;
		$this->request  = $request;
	}

	/**
	 * @return RepresentationInterface|null
	 */
	public function getRepresentation()
	{
		return $this->representation;
	}

	/**
	 * @param RepresentationInterface $representation
	 *
	 * @return EnvelopedMessage
	 */
	public function setRepresentation(RepresentationInterface $representation)
	{
		$this->representation = $representation;

		return $this;
	}

	/**
	 * @return ResponseInterface
	 */
	public function getResponse()
	{
		return $this->response;
	}

	/**
	 * @param ResponseInterface $response
	 *
	 * @return EnvelopedMessage
	 */
	public function setResponse(ResponseInterface $response)
	{
		$this->response = $response;

		return $this;
	}

	/**
	 * @return RequestInterface
	 */
	public function getRequest()
	{
		return $this->request;
	}

	/**
	 * @param RequestInterface $request
	 *
	 * @return EnvelopedMessage
	 */
	public function setRequest(RequestInterface $request)
	{
		$this->request = $request;

		return $this;
	}
}