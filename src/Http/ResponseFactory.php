<?php
/**
 * Created by PhpStorm.
 * User: bartb
 * Date: 06.05.2017
 * Time: 11:53
 */

namespace LeadDesk\Lib\LeadDeskApiClient\Http;


use Fig\Http\Message\StatusCodeInterface;
use LeadDesk\Lib\LeadDeskApiClient\Exception\ApiClientException;

class ResponseFactory implements StatusCodeInterface
{
	/**
	 * @param int $statusCode
	 *
	 * @return bool
	 */
	public static function isSuccessCode($statusCode)
	{
		if (false === is_int($statusCode))
		{
			throw new ApiClientException(sprintf('expected int as response code but got %s', $statusCode));
		}

		return $statusCode >= self::STATUS_OK && $statusCode <= self::STATUS_IM_USED;
	}
}