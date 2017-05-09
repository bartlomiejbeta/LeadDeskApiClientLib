<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 20:05
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact;

use JMS\Serializer\Annotation as Serializer;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\ResponseRepresentationInterface;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class CreateContactRepresentation implements ResponseRepresentationInterface
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
	 * @return bool
	 */
	public function getSuccess()
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
}