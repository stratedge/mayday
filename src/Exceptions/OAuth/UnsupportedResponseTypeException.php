<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class UnsupportedResponseTypeException extends OAuthException
{
    protected $code = 1010;
    protected $message = 'The authorization server does not support obtaining an access token using this method.';
    protected $http_status_code = 400;

    protected $error = 'unsupported_response_type';
    protected $error_description = 'The authorization server does not support obtaining an access token using this method.';
}
