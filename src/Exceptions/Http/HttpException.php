<?php

namespace Stratedge\Mayday\Exceptions\Http;

use Stratedge\Mayday\Exceptions\ApiException;

class HttpException extends ApiException
{
    protected $code = 2000;
    protected $type = "Http";
    protected $message = "An error has resulted from the request.";
    protected $http_status_code = 400;
}
