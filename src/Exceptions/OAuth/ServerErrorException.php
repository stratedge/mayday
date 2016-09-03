<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class ServerErrorException extends OAuthException
{
    protected $code = 1007;
    protected $message = "The authorization server encountered an unexpected condition which prevented it from fulfilling the request.";
    protected $http_status_code = 500;

    protected $error = "server_error";
    protected $error_description = "The authorization server encountered an unexpected condition which prevented it from fulfilling the request.";
}
