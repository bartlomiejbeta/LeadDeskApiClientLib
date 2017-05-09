<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 09.05.2017
 * Time: 16:26
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Filter\Call;


use LeadDesk\Lib\LeadDeskApiClient\Filter\FilterInterface;

class CallRefIdFilter implements FilterInterface
{
	/** @var int */
	private $callRefId;

	public function __construct($callRefId)
	{
		$this->callRefId = $callRefId;
	}

	public function getCallRefId()
	{
		return $this->callRefId;
	}
}