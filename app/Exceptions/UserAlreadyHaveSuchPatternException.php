<?php


namespace App\Exceptions;


class UserAlreadyHaveSuchPatternException extends \UnexpectedValueException
{
    public function __construct($message, $previous)
    {
        parent::__construct();
        $this->previous = $previous;
        $this->message = 'User already has such pattern';
    }

}