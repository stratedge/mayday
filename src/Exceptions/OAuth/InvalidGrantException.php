<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class InvalidGrantException extends OAuthException
{
    protected $code = 1003;
    protected $message = 'The provided authorization grant is invalid, expired, revoked, does not match the redirection URI used in the authorization request, or was issued to another client.';
    protected $http_status_code = 400;

    protected $error = 'invalid_grant';
    protected $error_description = 'The provided authorization grant is invalid, expired, revoked, does not match the redirection URI used in the authorization request, or was issued to another client.';
}
