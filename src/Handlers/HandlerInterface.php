<?php

namespace Stratedge\Mayday\Handlers;

use Exception;

interface HandlerInterface
{
    /**
     * @param  Exception $e
     * @return boolean
     */
    public static function is(Exception $e);


    /**
     * @param  Exception    $e
     * @return ApiException
     */
    public static function parse(Exception $e);
}
