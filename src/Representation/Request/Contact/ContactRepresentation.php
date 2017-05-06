<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 17:30
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Request\Contact;


use LeadDesk\Lib\LeadDeskApiClient\Representation\Request\RequestRepresentationInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class ContactRepresentation implements RequestRepresentationInterface
{
	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getPhone", setter="setPhone")
	 * @Serializer\Expose()
	 */
	private $phone;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getFname", setter="setFname")
	 * @Serializer\Expose()
	 */
	private $fname;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getLname", setter="setLname")
	 * @Serializer\Expose()
	 */
	private $lname;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getEmail", setter="setEmail")
	 * @Serializer\Expose()
	 */
	private $email;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getCompany", setter="setCompany")
	 * @Serializer\Expose()
	 */
	private $company;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getOther1", setter="setOther1")
	 * @Serializer\Expose()
	 */
	private $other1;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getOrder", setter="setOrder")
	 * @Serializer\Expose()
	 */
	private $order;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getWww", setter="setWww")
	 * @Serializer\Expose()
	 */
	private $www;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getOtherLabel1", setter="setOtherLabel1")
	 * @Serializer\Expose()
	 */
	private $otherLabel1;

	/**
	 * @var string
	 *
	 * @Serializer\Type("string")
	 * @Serializer\Accessor(getter="getOtherLabel2", setter="setOtherLabel2")
	 * @Serializer\Expose()
	 */
	private $otherLabel2;

	/**
	 * @var int
	 *
	 * @Serializer\Type("integer")
	 * @Serializer\Accessor(getter="getList", setter="setList")
	 * @Serializer\Expose()
	 */
	private $list;

	/**
	 * @return string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param string $phone
	 *
	 * @return $this
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getFname()
	{
		return $this->fname;
	}

	/**
	 * @param string $fname
	 *
	 * @return $this
	 */
	public function setFname($fname)
	{
		$this->fname = $fname;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getLname()
	{
		return $this->lname;
	}

	/**
	 * @param string $lname
	 *
	 * @return $this
	 */
	public function setLname($lname)
	{
		$this->lname = $lname;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 *
	 * @return $this
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * @param string $company
	 *
	 * @return $this
	 */
	public function setCompany($company)
	{
		$this->company = $company;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getOther1()
	{
		return $this->other1;
	}

	/**
	 * @param string $other1
	 *
	 * @return $this
	 */
	public function setOther1($other1)
	{
		$this->other1 = $other1;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * @param string $order
	 *
	 * @return $this
	 */
	public function setOrder($order)
	{
		$this->order = $order;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getWww()
	{
		return $this->www;
	}

	/**
	 * @param string $www
	 *
	 * @return $this
	 */
	public function setWww($www)
	{
		$this->www = $www;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getOtherLabel1()
	{
		return $this->otherLabel1;
	}

	/**
	 * @param string $otherLabel1
	 *
	 * @return $this
	 */
	public function setOtherLabel1($otherLabel1)
	{
		$this->otherLabel1 = $otherLabel1;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getOtherLabel2()
	{
		return $this->otherLabel2;
	}

	/**
	 * @param string $otherLabel2
	 *
	 * @return $this
	 */
	public function setOtherLabel2($otherLabel2)
	{
		$this->otherLabel2 = $otherLabel2;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getList()
	{
		return $this->list;
	}

	/**
	 * @param int $list
	 *
	 * @return $this
	 */
	public function setList($list)
	{
		$this->list = $list;

		return $this;
	}

}