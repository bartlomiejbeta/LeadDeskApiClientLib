<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 11:16
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Client\Credentials;


interface CredentialsInterface
{
	/**
	 * @return string
	 */
	public function getToken();
}