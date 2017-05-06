<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 12:16
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Filter\Contact;


use LeadDesk\Lib\LeadDeskApiClient\Filter\FilterInterface;

class ContactFilter implements FilterInterface
{
	/** @var string */
	private $phone;

	/** @var int */
	private $listId;

	private $firstName;

	private $lastName;

	public function __construct($phone, $listId)
	{
		$this->phone  = $phone;
		$this->listId = $listId;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function getListId()
	{
		return $this->listId;
	}

	/**
	 * @return string|null
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 *
	 * @return $this
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 *
	 * @return $this
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;

		return $this;
	}


}