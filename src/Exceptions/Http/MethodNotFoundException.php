<?php

namespace Stratedge\Mayday\Exceptions\Http;

use Stratedge\Mayday\Exceptions\Http\HttpException;

class MethodNotAllowedException extends HttpException
{
    protected $code = 2001;
    protected $message = "The request method is not allowed.";
}
