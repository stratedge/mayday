<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class UnauthorizedClientException extends OAuthException
{
    protected $code = 1008;
    protected $message = 'The client is not authorized to request an access token using this method.';
    protected $http_status_code = 400;

    protected $error = 'unauthorized_client';
    protected $error_description = 'The client is not authorized to request an access token using this method.';
}
