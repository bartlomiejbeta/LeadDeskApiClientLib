<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 16:41
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Representation\Contact\Embedded;


use LeadDesk\Lib\LeadDeskApiClient\Representation\RepresentationInterface;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class ContactData implements RepresentationInterface
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
	 * @var array
	 *
	 * @Serializer\Type("array")
	 * @Serializer\Accessor(getter="getPhoneNumbers", setter="setPhoneNumbers")
	 * @Serializer\Expose()
	 */
	private $phoneNumbers;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param $id
	 *
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param $phone
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
	 * @param $fname
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
	 * @param $lname
	 *
	 * @return $this
	 */
	public function setLname($lname)
	{
		$this->lname = $lname;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getPhoneNumbers()
	{
		return $this->phoneNumbers;
	}

	/**
	 * @param $phoneNumbers
	 *
	 * @return $this
	 */
	public function setPhoneNumbers($phoneNumbers)
	{
		$this->phoneNumbers = $phoneNumbers;

		return $this;
	}


}