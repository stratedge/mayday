<?php

namespace Stratedge\Mayday\Handlers;

use Exception;
use Stratedge\Mayday\Exceptions\Http\HttpException;
use Stratedge\Mayday\Exceptions\Http\MethodNotAllowedException;
use Stratedge\Mayday\Exceptions\Http\NotFoundException;
use Stratedge\Mayday\Handlers\HandlerInterface;
use Symfony\Component\HttpKernel\Exception\HttpException as SymfonyHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException as SymfonyMethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as SymfonyNotFoundHttpException;

class Http implements HandlerInterface
{
    public static function is(Exception $e)
    {
        return $e instanceof SymfonyHttpException;
    }


    public static function parse(Exception $e)
    {
        switch (true) {
            case $e instanceof SymfonyMethodNotAllowedHttpException:
                return static::parseMethodNotAllowedFunction($e);
            case $e instanceof SymfonyNotFoundHttpException:
                return new NotFoundException();
            default:
                return new HttpException(null, null, $e->getMessage());
        }
    }


    protected static function parseMethodNotAllowedFunction(
        SymfonyMethodNotAllowedHttpException $e
    ) {
        $headers = $e->getHeaders();

        $e = new MethodNotAllowedException();

        if (!empty($headers['Allow'])) {
            $e->setMessage('Request method not allowed. Allowed methods: ' . $headers['Allow']);
        }

        $e->setHeaders($headers);

        return $e;
    }
}
