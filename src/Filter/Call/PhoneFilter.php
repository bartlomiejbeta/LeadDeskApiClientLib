<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 09.05.2017
 * Time: 16:26
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Filter\Call;



class PhoneFilter implements GetCallInterface
{
	/** @var int */
	private $phone;

	public function __construct($phone)
	{
		$this->phone = $phone;
	}

	public function getPhone()
	{
		return $this->phone;
	}
}