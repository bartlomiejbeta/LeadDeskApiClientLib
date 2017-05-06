<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 15:18
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Repository\Contact;


use LeadDesk\Lib\LeadDeskApiClient\Client\Credentials\CredentialsInterface;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactFilter;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactIdFilter;

class ContactRepository
{
	/**
	 * @var CredentialsInterface
	 */
	private static $credentials;

	public function __construct(CredentialsInterface $credentials)
	{
		self::$credentials = $credentials;
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