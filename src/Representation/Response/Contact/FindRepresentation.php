<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 15:30
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact;


use JMS\Serializer\Annotation as Serializer;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\ResponseRepresentationInterface;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class FindRepresentation implements ResponseRepresentationInterface
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
	 * @Serializer\Accessor(getter="getTotalCount", setter="setTotalCount")
	 * @Serializer\Expose()
	 */
	private $totalCount;

	/**
	 * @var array
	 *
	 * @Serializer\Type("array")
	 * @Serializer\Accessor(getter="getContactIds", setter="setContactIds")
	 * @Serializer\Expose()
	 */
	private $contactIds;

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
	public function getTotalCount()
	{
		return $this->totalCount;
	}

	/**
	 * @param int $totalCount
	 *
	 * @return $this
	 */
	public function setTotalCount($totalCount)
	{
		$this->totalCount = $totalCount;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getContactIds()
	{
		return $this->contactIds;
	}

	/**
	 * @param array $contactIds
	 *
	 * @return $this
	 */
	public function setContactIds($contactIds)
	{
		$this->contactIds = $contactIds;

		return $this;
	}
}