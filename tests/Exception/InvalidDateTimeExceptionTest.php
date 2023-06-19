<?php

namespace Exception;

use Studoo\Api\EcoleDirecte\Exception\InvalidDateTimeException;
use PHPUnit\Framework\TestCase;

class InvalidDateTimeExceptionTest extends TestCase
{
    public function testInvalidDateTimeExceptionTest01GetCode()
    {
        $exception = new InvalidDateTimeException();
        $this->assertEquals('404', $exception->getCode());
    }

    public function testInvalidDateTimeExceptionTest02GetMessage()
    {
        $exception = new InvalidDateTimeException();
        $this->assertEquals('Invalid DateTime format', $exception->getMessage());
    }
}
