<?php
namespace ProviderTmsApiSdk;


use Exception;

class TmsException extends Exception
{
    /**
     * @param string $message
     * @param int $code
     * @param Exception|null $previous
     */
    public function __construct($message = "", $code = 0,  $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}