<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 11:14
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Client\Credentials;


class ClientCredentials implements CredentialsInterface
{
	/**
	 * @var string
	 */
	private $token;

	/**
	 * @param $token string
	 */
	public function __construct($token)
	{
		$this->token = $token;
	}

	public function getToken()
	{
		return $this->token;
	}
}