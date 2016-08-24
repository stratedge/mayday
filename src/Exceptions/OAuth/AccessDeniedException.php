<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\OAuth\OAuthException;

class AccessDeniedException extends OAuthException
{
    protected $code = 1001;
    protected $message = 'The resource owner or authorization server denied the request.';
    protected $http_status_code = 401;

    protected $error = 'access_denied';
    protected $error_description = 'The resource owner or authorization server denied the request.';
}
