<?php

namespace Stratedge\Mayday\Handlers;

use Stratedge\Mayday\Exceptions\ApiException;
use Stratedge\Mayday\Handlers\HandlerInterface;

class Generic implements HandlerInterface
{
    public static function is(Exception $e)
    {
        return true;
    }


    public static function parse(Exception $e)
    {
        if (app()->environment('prod') === false) {
            return new ApiException(null, $e->getCode(), null, $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
        }

        return $e = new ApiException();
    }
}
