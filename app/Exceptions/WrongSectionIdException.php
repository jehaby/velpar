<?php


namespace App\Exceptions;





class WrongSectionIdException extends \InvalidArgumentException {


    public function __construct()
    {
        $this->message = "There'is no section with such id";
    }





}