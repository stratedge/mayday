<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class InvalidRefreshException extends OAuthException
{
    protected $code = 1004;
    protected $message = 'The refresh token is invalid.';
    protected $http_status_code = 400;

    protected $error = 'invalid_request';
    protected $error_description = 'The refresh token is invalid.';
}
