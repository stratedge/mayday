<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class InvalidCredentialsException extends OAuthException
{
    protected $code = 1011;
    protected $message = "The user credentials were incorrect.";
    protected $http_status_code = 401;

    protected $error = "invalid_credentials";
    protected $error_description = "The user credentials were incorrect.";
}
