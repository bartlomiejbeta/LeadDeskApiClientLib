<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 09.05.2017
 * Time: 16:26
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Filter\Call;



class RefIdFilterCall implements GetCallInterface
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