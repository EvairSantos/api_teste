<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $statusCode;
    protected $errorCode;
    protected $errorMessage;

    public function __construct($statusCode, $errorCode, $errorMessage, $message = null, $code = 0, Exception $previous = null)
    {
        $this->statusCode = $statusCode;
        $this->errorCode = $errorCode;
        $this->errorMessage = $errorMessage;

        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }
}
