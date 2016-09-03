<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class InvalidClientException extends OAuthException
{
    protected $code = 1002;
    protected $message = "Client authentication failed.";
    protected $http_status_code = 401;

    protected $error = "invalid_client";
    protected $error_description = "Client authentication failed.";
}
