<?php

namespace Exception;

use Studoo\Api\EcoleDirecte\Exception\ErrorHttpStatusException;
use PHPUnit\Framework\TestCase;

class ErrorHttpStatusExceptionTest extends TestCase
{
    public function testErrorHttpStatusExceptionTest01GetCode()
    {
        $exception = new ErrorHttpStatusException();
        $this->assertEquals('400', $exception->getCode());
    }

    public function testErrorHttpStatusExceptionTest02GetMessage()
    {
        $exception = new ErrorHttpStatusException();
        $this->assertEquals('Erreur HTTP status', $exception->getMessage());
    }
}
