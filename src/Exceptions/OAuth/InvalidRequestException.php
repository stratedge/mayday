<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class InvalidRequestException extends OAuthException
{
    protected $code = 1005;
    protected $message = "The request is missing a required parameter, includes an invalid parameter value, includes a parameter more than once, or is otherwise malformed.";
    protected $http_status_code = 400;

    protected $error = "invalid_request";
    protected $error_description = "The request is missing a required parameter, includes an invalid parameter value, includes a parameter more than once, or is otherwise malformed.";
}
