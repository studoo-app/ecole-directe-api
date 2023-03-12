<?php

namespace Entity;

use Studoo\Api\EcoleDirecte\Entity\Login;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testGetToken()
    {
        $login = new Login('token');
        $this->assertEquals('token', $login->getToken());
    }

    public function testSetToken()
    {
        $login = new Login('token');
        $login->setToken('newToken');
        $this->assertEquals('newToken', $login->getToken());
    }
}
