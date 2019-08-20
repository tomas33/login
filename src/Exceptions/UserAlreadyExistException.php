<?php

namespace App\Exceptions;

class UserAlreadyExistException extends Exception{
    public function __invoke()
    {
        $errorMsg = $this->getMessage();
        return $errorMsg;
    }
} 
 

