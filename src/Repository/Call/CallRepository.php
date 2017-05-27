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
use LeadDesk\Lib\LeadDeskApiClient\Filter\Call\GetCallInterface;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Call\RefIdFilterCall;
use LeadDesk\Lib\LeadDeskApiClient\Filter\Call\PhoneFilter;

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
	 * @param GetCallInterface $callGetInterface
	 *
	 * @return array
	 */
	public static function getGetCallParameters(GetCallInterface $callGetInterface)
	{
		$modParameter         = self::getStaticModParameter();
		$parametersFromFilter = [];

		if ($callGetInterface instanceof RefIdFilterCall)
		{
			$parametersFromFilter['call_ref_id'] = $callGetInterface->getCallRefId();
		}
		elseif ($callGetInterface instanceof PhoneFilter)
		{
			$parametersFromFilter['phone']= $callGetInterface->getPhone();
		}

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