<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 17:06
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Response\Contact;


use LeadDesk\Lib\LeadDeskApiClient\Representation\Response\ResponseRepresentationInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class DeleteRepresentation implements ResponseRepresentationInterface
{
	/**
	 * @var boolean
	 *
	 * @Serializer\Type("boolean")
	 * @Serializer\Accessor(getter="getSuccess", setter="setSuccess")
	 * @Serializer\Expose()
	 */
	private $success;

	public function getSuccess()
	{
		return $this->success;
	}

	public function setSuccess($success)
	{
		$this->success = $success;

		return $this;
	}
}