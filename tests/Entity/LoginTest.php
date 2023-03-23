<?php

namespace Entity;

use Studoo\Api\EcoleDirecte\Entity\Login;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testGetToken()
    {
        $login = new Login();
        $login->setToken('f6897f82-c10c-42d9-80e8-5c62a4c2acd2');
        $this->assertEquals('f6897f82-c10c-42d9-80e8-5c62a4c2acd2', $login->getToken());
    }

    public function testSetIdLogin()
    {
        $login = new Login();
        $login->setIdLogin('345');
        $this->assertEquals('345', $login->getIdLogin());
    }

    public function testGetIdLogin()
    {
        $login = new Login();
        $login->setIdLogin('345');
        $this->assertEquals('345', $login->getIdLogin());
    }

    public function testGetId()
    {
        $login = new Login();
        $login->setId('345');
        $this->assertEquals('345', $login->getId());
    }

    public function testSetId()
    {
        $login = new Login();
        $login->setId('345');
        $this->assertEquals('345', $login->getId());
    }

    public function testGetUid()
    {
        $login = new Login();
        $login->setUid('345');
        $this->assertEquals('345', $login->getUid());
    }

    public function testSetUid()
    {
        $login = new Login();
        $login->setUid('345');
        $this->assertEquals('345', $login->getUid());
    }


}
