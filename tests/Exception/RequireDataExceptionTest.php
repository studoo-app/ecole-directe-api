<?php

namespace Exception;

use Studoo\Api\EcoleDirecte\Exception\RequireDataException;
use PHPUnit\Framework\TestCase;

class RequireDataExceptionTest extends TestCase
{
    public function testRequireDataExceptionTest01GetCode()
    {
        $exception = new RequireDataException();
        $this->assertEquals('405', $exception->getCode());
    }

    public function testRequireDataExceptionTest02GetMessage()
    {
        $exception = new RequireDataException();
        $this->assertEquals('Require Data in the method', $exception->getMessage());
    }
}
