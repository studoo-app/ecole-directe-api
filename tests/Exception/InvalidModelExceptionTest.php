<?php

namespace Exception;

use Studoo\Api\EcoleDirecte\Exception\InvalidModelException;
use PHPUnit\Framework\TestCase;

class InvalidModelExceptionTest extends TestCase
{
    public function testInvalidModelExceptionTest01GetCode()
    {
        $exception = new InvalidModelException();
        $this->assertEquals('402', $exception->getCode());
    }

    public function testInvalidModelExceptionTest02GetMessage()
    {
        $exception = new InvalidModelException();
        $this->assertEquals('Invalid model API', $exception->getMessage());
    }
}
