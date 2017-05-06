<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 15:32
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Contact;


use LeadDesk\Lib\LeadDeskApiClient\Representation\RepresentationInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class ExistRepresentation implements RepresentationInterface
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
	 * @var boolean
	 *
	 * @Serializer\Type("boolean")
	 * @Serializer\Accessor(getter="getMatch", setter="setMatch")
	 * @Serializer\Expose()
	 */
	private $match;

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
	 * @return bool
	 */
	public function getMatch()
	{
		return $this->match;
	}

	/**
	 * @param bool $match
	 *
	 * @return $this
	 */
	public function setMatch($match)
	{
		$this->match = $match;

		return $this;
	}
}