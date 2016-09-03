<?php

namespace Stratedge\Mayday\Exceptions\Http;

use Stratedge\Mayday\Exceptions\Http\HttpException;

class MethodNotAllowedException extends HttpException
{
    protected $code = 2002;
    protected $message = "The requested resource cannot be found.";
    protected $http_status_code = 404;
}
