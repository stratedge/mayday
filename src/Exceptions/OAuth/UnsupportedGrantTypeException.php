<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class UnsupportedGrantTypeException extends OAuthException
{
    protected $code = 1009;
    protected $message = "The authorization grant type is not supported by the authorization server.";
    protected $http_status_code = 400;

    protected $error = "unsupported_grant_type";
    protected $error_description = "The authorization grant type is not supported by the authorization server.";
}
