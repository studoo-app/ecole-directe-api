<?php

namespace Exception;

use Studoo\Api\EcoleDirecte\Exception\NotDataResponseException;
use PHPUnit\Framework\TestCase;

class NotDataResponseExceptionTest extends TestCase
{
    public function testNotDataResponseExceptionTest01GetCode()
    {
        $exception = new NotDataResponseException();
        $this->assertEquals('403', $exception->getCode());
    }

    public function testNotDataResponseExceptionTest02GetMessage()
    {
        $exception = new NotDataResponseException();
        $this->assertEquals('Pas de donnée dans la réponse', $exception->getMessage());
    }
}
