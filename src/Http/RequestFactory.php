<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 11:53
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Http;


use Fig\Http\Message\RequestMethodInterface;

class RequestFactory implements RequestMethodInterface
{
	const LEAD_DESK_API_URL   = 'http://api.leaddesk.com/';
	const CONTENT_TYPE_HEADER = 'Content-Type';
	const JSON_TYPE           = 'application/json';
	const ACCEPT_HEADER       = 'Accept';

}