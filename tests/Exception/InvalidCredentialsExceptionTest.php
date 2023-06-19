<?php

namespace Exception;

use Studoo\Api\EcoleDirecte\Exception\InvalidCredentialsException;
use PHPUnit\Framework\TestCase;

class InvalidCredentialsExceptionTest extends TestCase
{
    public function testInvalidCredentialsExceptionTest01GetCode()
    {
        $exception = new InvalidCredentialsException();
        $this->assertEquals('401', $exception->getCode());
    }

    public function testInvalidCredentialsExceptionTest02GetMessage()
    {
        $exception = new InvalidCredentialsException();
        $this->assertEquals('Invalid credentials', $exception->getMessage());
    }
}
