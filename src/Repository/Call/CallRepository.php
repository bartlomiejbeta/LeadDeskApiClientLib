<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 09.05.2017
 * Time: 17:39
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Repository\Call;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use LeadDesk\Lib\LeadDeskApiClient\Client\Credentials\CredentialsInterface;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Call\CallRefIdFilter;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactFilter;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Contact\ContactIdFilter;
use LeadDesk\Lib\LeadDeskApiClient\Representation\Request\Contact\ContactRepresentation;

class CallRepository
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
	 * @param CallRefIdFilter $callRefIdFilter
	 *
	 * @return array
	 */
	public static function getGetCallParameters(CallRefIdFilter $callRefIdFilter)
	{
		$modParameter         = self::getStaticModParameter();
		$parametersFromFilter = [
			'call_ref_id' => $callRefIdFilter->getCallRefId(),
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
			'mod'  => 'call',
		];
	}
}