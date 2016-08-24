<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class InvalidScopeException extends OAuthException
{
    protected $code = 1006;
    protected $message = 'The requested scope is invalid, unknown, or malformed.';
    protected $http_status_code = 400;

    protected $error = 'invalid_scope';
    protected $error_description = 'The requested scope is invalid, unknown, or malformed.';
}
