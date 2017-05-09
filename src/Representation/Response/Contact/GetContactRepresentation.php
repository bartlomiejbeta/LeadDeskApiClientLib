<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 16:37
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact;


use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact\Embedded\ContactData;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\ResponseRepresentationInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class GetContactRepresentation implements ResponseRepresentationInterface
{
	/**
	 * @var boolean
	 *
	 * @Serializer\Type("boolean")
	 * @Serializer\Accessor(getter="getSuccess", setter="setSuccess")
	 * @Serializer\Expose()
	 */
	private $success;

	/**
	 * @var int
	 *
	 * @Serializer\Type("integer")
	 * @Serializer\Accessor(getter="getContactId", setter="setContactId")
	 * @Serializer\Expose()
	 */
	private $contactId;

	/**
	 * @var ContactData
	 *
	 * @Serializer\Type("LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact\Embedded\ContactData")
	 * @Serializer\Accessor(getter="getData", setter="setData")
	 * @Serializer\Expose()
	 */
	private $data;

	/**
	 * @return int
	 */
	public function getContactId()
	{
		return $this->contactId;
	}

	/**
	 * @param int $contactId
	 *
	 * @return $this
	 */
	public function setContactId($contactId)
	{
		$this->contactId = $contactId;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSuccess()
	{
		return $this->success;
	}

	/**
	 * @param bool $success
	 *
	 * @return $this
	 */
	public function setSuccess($success)
	{
		$this->success = $success;

		return $this;
	}

	/**
	 * @return ContactData
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param ContactData $data
	 *
	 * @return $this
	 */
	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}
}