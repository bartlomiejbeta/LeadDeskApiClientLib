<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 09.05.2017
 * Time: 16:28
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Call;


use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\ResponseRepresentationInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class GetCallRepresentation implements ResponseRepresentationInterface
{
	/**
	 * @var int
	 *
	 * @Serializer\Type("integer")
	 * @Serializer\Accessor(getter="getId", setter="setId")
	 * @Serializer\Expose()
	 */
	private $id;

	/**
	 * @var int
	 *
	 * @Serializer\Type("integer")
	 * @Serializer\Accessor(getter="getAgentId", setter="setAgentId")
	 * @Serializer\Expose()
	 */
	private $agentId;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getAgentUsername", setter="setAgentUsername")
	 * @Serializer\Expose()
	 */
	private $agentUsername;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getTalkTime", setter="setTalkTime")
	 * @Serializer\Expose()
	 */
	private $talkTime;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getTalkStart", setter="setTalkStart")
	 * @Serializer\Expose()
	 */
	private $talkStart;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getTalkEnd", setter="setTalkEnd")
	 * @Serializer\Expose()
	 */
	private $talkEnd;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getNumber", setter="setNumber")
	 * @Serializer\Expose()
	 */
	private $number;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getRecordFile", setter="setRecordFile")
	 * @Serializer\Expose()
	 */
	private $recordFile;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getCreatedAt", setter="setCreatedAt")
	 * @Serializer\Expose()
	 */
	private $createdAt;

	/**
	 * @var int
	 *
	 * @Serializer\Type("integer")
	 * @Serializer\Accessor(getter="getCustomerId", setter="setCustomerId")
	 * @Serializer\Expose()
	 */
	private $customerId;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getComment", setter="setComment")
	 * @Serializer\Expose()
	 */
	private $comment;

	/**
	 * @var int
	 *
	 * @Serializer\Type("integer")
	 * @Serializer\Accessor(getter="getCallEndingReason", setter="setCallEndingReason")
	 * @Serializer\Expose()
	 */
	private $callEndingReason;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getCallEndingReasonName", setter="setCallEndingReasonName")
	 * @Serializer\Expose()
	 */
	private $callEndingReasonName;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getHandlingStop", setter="setHandlingStop")
	 * @Serializer\Expose()
	 */
	private $handlingStop;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	public function getAgentId()
	{
		return $this->agentId;
	}

	public function setAgentId($agentId)
	{
		$this->agentId = $agentId;

		return $this;
	}

	public function getAgentUsername()
	{
		return $this->agentUsername;
	}

	public function setAgentUsername($agentUsername)
	{
		$this->agentUsername = $agentUsername;

		return $this;
	}

	public function getTalkTime()
	{
		return $this->talkTime;
	}

	public function setTalkTime($talkTime)
	{
		$this->talkTime = $talkTime;

		return $this;
	}

	public function getTalkStart()
	{
		return $this->talkStart;
	}

	public function setTalkStart($talkStart)
	{
		$this->talkStart = $talkStart;

		return $this;
	}

	public function getTalkEnd()
	{
		return $this->talkEnd;
	}

	public function setTalkEnd($talkEnd)
	{
		$this->talkEnd = $talkEnd;

		return $this;
	}

	public function getNumber()
	{
		return $this->number;
	}

	public function setNumber($number)
	{
		$this->number = $number;

		return $this;
	}

	public function getRecordFile()
	{
		return $this->recordFile;
	}

	public function setRecordFile($recordFile)
	{
		$this->recordFile = $recordFile;

		return $this;
	}

	public function getCreatedAt()
	{
		return $this->createdAt;
	}

	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getCustomerId()
	{
		return $this->customerId;
	}

	public function setCustomerId($customerId)
	{
		$this->customerId = $customerId;

		return $this;
	}

	public function getComment()
	{
		return $this->comment;
	}

	public function setComment($comment)
	{
		$this->comment = $comment;

		return $this;
	}

	public function getCallEndingReason()
	{
		return $this->callEndingReason;
	}

	public function setCallEndingReason($callEndingReason)
	{
		$this->callEndingReason = $callEndingReason;

		return $this;
	}

	public function getCallEndingReasonName()
	{
		return $this->callEndingReasonName;
	}

	public function setCallEndingReasonName($callEndingReasonName)
	{
		$this->callEndingReasonName = $callEndingReasonName;

		return $this;
	}

	public function getHandlingStop()
	{
		return $this->handlingStop;
	}

	public function setHandlingStop($handlingStop)
	{
		$this->handlingStop = $handlingStop;

		return $this;
	}
}