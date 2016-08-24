<?php

namespace Stratedge\Mayday\Exceptions\OAuth;

use Stratedge\Mayday\Exceptions\ApiException;

class OAuthException extends ApiException
{
    protected $code = 1000;
    protected $type = 'OAuth';
    protected $message = 'An unexpected authentication error has occurred.';
    protected $http_status_code = 401;

    protected $error = 'oauth';
    protected $error_description = 'An unexpected authentication error has occurred';


    public function setMessage($message)
    {
        parent::setMessage($message);
        $this->setErrorDescription($message);
    }


    public function getError()
    {
        return $this->error;

    }


    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }


    public function getErrorDescription()
    {
        return $this->error_description;

    }


    public function setErrorDescription($error_description)
    {
        $this->error_description = $error_description;
        return $this;
    }


    public function render()
    {
        return array_merge(parent::render(), [
            'error' => $this->error,
            'error_description' => $this->error_description
        ]);
    }
}
