<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 16:34
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Filter\Contact;


class ContactIdFilter
{
	/** @var int */
	private $contactId;

	public function __construct($contactId)
	{
		$this->contactId = $contactId;
	}

	public function getContactId()
	{
		return $this->contactId;
	}
}