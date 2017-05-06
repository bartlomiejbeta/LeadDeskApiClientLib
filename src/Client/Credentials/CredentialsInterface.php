<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 11:16
 */

//@formatter:off
declare(strict_types=1);
//@formatter:on

namespace LeadDesk\Lib\LeadDeskApiClient\Client\Credentials;


interface CredentialsInterface
{
	/**
	 * @return string
	 */
	public function getToken();
}