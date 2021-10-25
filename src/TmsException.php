<?php
namespace ProviderTmsApiSdk;


use Exception;
use Throwable;

class TmsException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}