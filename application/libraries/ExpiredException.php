<?php
use \Firebase\JWT;

class ExpiredException extends \UnexpectedValueException
{
	public function errorMessage()
	{
		return "Token Expired";
	}
}
