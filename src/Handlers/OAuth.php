<?php

namespace Stratedge\Mayday\Handlers;

use Exception;
use League\OAuth2\Server\Exception\AccessDeniedException;
use League\OAuth2\Server\Exception\InvalidClientException;
use League\OAuth2\Server\Exception\InvalidCredentialsException;
use League\OAuth2\Server\Exception\InvalidGrantException;
use League\OAuth2\Server\Exception\InvalidRefreshException;
use League\OAuth2\Server\Exception\InvalidRequestException;
use League\OAuth2\Server\Exception\InvalidScopeException;
use League\OAuth2\Server\Exception\OAuthException;
use League\OAuth2\Server\Exception\ServerErrorException;
use League\OAuth2\Server\Exception\UnauthorizedClientException;
use League\OAuth2\Server\Exception\UnsupportedGrantTypeException;
use League\OAuth2\Server\Exception\UnsupportedResponseTypeException;
use Stratedge\Mayday\Exceptions\OAuth\AccessDeniedException as ApiAccessDeniedException;
use Stratedge\Mayday\Exceptions\OAuth\InvalidClientException as ApiInvalidClientException;
use Stratedge\Mayday\Exceptions\OAuth\InvalidCredentialsException as ApiInvalidCredentialsException;
use Stratedge\Mayday\Exceptions\OAuth\InvalidGrantException as ApiInvalidGrantException;
use Stratedge\Mayday\Exceptions\OAuth\InvalidRefreshException as ApiInvalidRefreshException;
use Stratedge\Mayday\Exceptions\OAuth\InvalidRequestException as ApiInvalidRequestException;
use Stratedge\Mayday\Exceptions\OAuth\InvalidScopeException as ApiInvalidScopeException;
use Stratedge\Mayday\Exceptions\OAuth\OAuthException as ApiOAuthException;
use Stratedge\Mayday\Exceptions\OAuth\ServerErrorException as ApiServerErrorException;
use Stratedge\Mayday\Exceptions\OAuth\UnauthorizedClientException as ApiUnauthorizedClientException;
use Stratedge\Mayday\Exceptions\OAuth\UnsupportedGrantTypeException as ApiUnsupportedGrantTypeException;
use Stratedge\Mayday\Exceptions\OAuth\UnsupportedResponseTypeException as ApiUnsupportedResponseTypeException;
use Stratedge\Mayday\Handlers\HandlerInterface;

class OAuth implements HandlerInterface
{
    public static function is(Exception $e)
    {
        return $e instanceof OAuthException;
    }


    public static function parse(Exception $e)
    {
        $exceptions = [
            AccessDeniedException::class => ApiAccessDeniedException::class,
            InvalidClientException::class => ApiInvalidClientException::class,
            InvalidCredentialsException::class => ApiInvalidCredentialsException::class,
            InvalidGrantException::class => ApiInvalidGrantException::class,
            InvalidRefreshException::class => ApiInvalidRefreshException::class,
            InvalidRequestException::class => ApiInvalidRequestException::class,
            InvalidScopeException::class => ApiInvalidScopeException::class,
            ServerErrorException::class => ApiServerErrorException::class,
            UnauthorizedClientException::class => ApiUnauthorizedClientException::class,
            UnsupportedGrantTypeException::class => ApiUnsupportedGrantTypeException::class,
            UnsupportedResponseTypeException::class => ApiUnsupportedResponseTypeException::class,
        ];

        if (!empty($exceptions[get_class($e)])) {
            $exception = new $exceptions[get_class($e)];
        } else {
            $exception = new ApiOAuthException;
        }

        $exception->setHttpStatusCode($e->httpStatusCode);
        $exception->setMessage($e->getMessage());
        $exception->setError($e->errorType);

        $headers = [];

        //Reformat headers into an array of key-value pairs
        foreach ($e->getHttpHeaders() as $header) {
            $parts = explode(' ', $header);
            $key = array_shift($parts);
            $headers[$key] = implode(' ', $parts);
        }

        $exception->setHeaders($headers);

        return $exception;
    }
}
