<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 15:18
 */


namespace LeadDesk\Lib\LeadDeskApiClient\Repository\Contact;


use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use LeadDesk\Lib\LeadDeskApiClient\Client\Credentials\CredentialsInterface;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactFilter;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactIdFilter;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Request\Contact\ContactRepresentation;

class ContactRepository
{
	/**
	 * @var CredentialsInterface
	 */
	private static $credentials;

	/**
	 * @var SerializerInterface
	 */
	private static $serializer;

	public function __construct(CredentialsInterface $credentials)
	{
		self::$credentials = $credentials;
		self::$serializer = SerializerBuilder::create()->build();

	}

	/**
	 * @param ContactFilter $contactFilter
	 *
	 * @return array
	 */
	public static function getExistsParameters(ContactFilter $contactFilter)
	{
		$modParameter         = self::getStaticModParameter();
		$parametersFromFilter = [
			'contact_list_id' => $contactFilter->getListId(),
			'phone'           => $contactFilter->getPhone(),
		];

		if (false === empty($contactFilter->getFirstName()))
		{
			$parametersFromFilter['fname'] = $contactFilter->getFirstName();
		}

		if (false === empty($contactFilter->getLastName()))
		{
			$parametersFromFilter['lname'] = $contactFilter->getLastName();
		}

		$cmd = [
			'cmd' => 'exists',
		];

		return array_merge($modParameter, $cmd, $parametersFromFilter);
	}

	/**
	 * @param ContactFilter $contactFilter
	 *
	 * @return array
	 */
	public static function getFindParameters(ContactFilter $contactFilter)
	{
		$modParameter         = self::getStaticModParameter();
		$parametersFromFilter = [
			'contact_list_id' => $contactFilter->getListId(),
			'phone'           => $contactFilter->getPhone(),
		];

		if (false === empty($contactFilter->getFirstName()))
		{
			$parametersFromFilter['fname'] = $contactFilter->getFirstName();
		}

		if (false === empty($contactFilter->getLastName()))
		{
			$parametersFromFilter['lname'] = $contactFilter->getLastName();
		}

		$cmd = [
			'cmd' => 'find',
		];

		return array_merge($modParameter, $cmd, $parametersFromFilter);
	}

	/**
	 * @param ContactIdFilter $contactIdFilter
	 *
	 * @return array
	 */
	public static function getGetContactParameters(ContactIdFilter $contactIdFilter)
	{
		$modParameter         = self::getStaticModParameter();
		$parametersFromFilter = [
			'contact_id' => $contactIdFilter->getContactId(),
		];
		$cmd                  = [
			'cmd' => 'get',
		];

		return array_merge($modParameter, $cmd, $parametersFromFilter);
	}


	/**
	 * @param ContactIdFilter $contactIdFilter
	 *
	 * @return array
	 */
	public static function getDeleteContactParameters(ContactIdFilter $contactIdFilter)
	{
		$modParameter         = self::getStaticModParameter();
		$parametersFromFilter = [
			'contact_id' => $contactIdFilter->getContactId(),
		];
		$cmd                  = [
			'cmd' => 'delete',
		];

		return array_merge($modParameter, $cmd, $parametersFromFilter);
	}

	/**
	 * @param ContactRepresentation $contactRepresentation
	 *
	 * @return array
	 */
	public static function getCreateContactParameters(ContactRepresentation $contactRepresentation)
	{
		$modParameter      = self::getStaticModParameter();
		$contactParameters = self::$serializer->toArray($contactRepresentation);
		$cmd               = [
			'cmd' => 'add',
		];

		return array_merge($modParameter, $cmd, $contactParameters);
	}

	/**
	 * @return array
	 */
	private static function getStaticModParameter()
	{
		return [
			'auth' => self::$credentials->getToken(),
			'mod'  => 'contact',
		];
	}
}