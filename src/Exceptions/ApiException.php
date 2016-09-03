<?php

namespace Stratedge\Mayday\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $code = 0;
    protected $type = "General";
    protected $message = "An unexpected error has occured";
    protected $http_status_code = 500;

    protected $headers = [];

    public function __construct($http_status_code = null, $code = null, $message = null, $type = null)
    {
        if (!is_null($http_status_code)) {
            $this->setHttpStatusCode($http_status_code);
        }

        if (!is_null($code)) {
            $this->setCode($code);
        }

        if (!is_null($message)) {
            $this->setMessage($message);
        }

        if (!is_null($type)) {
            $this->setType($type);
        }
    }


    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }


    public function getType()
    {
        return $this->type;
    }


    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }


    public function getHttpStatusCode()
    {
        return $this->http_status_code;
    }


    public function setHttpStatusCode($http_status_code)
    {
        $this->http_status_code = $http_status_code;
        return $this;
    }


    public function getHeaders()
    {
        return $this->headers;
    }


    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }


    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }


    public function render()
    {
        return [
            'code' => $this->code,
            'type' => $this->type,
            'message' => $this->message
        ];
    }
}
