<?php

namespace API;

use Studoo\Api\EcoleDirecte\Query\LoginQuery;
use PHPUnit\Framework\TestCase;

class LoginQueryTest extends TestCase
{
    private LoginQuery $loginQuery;
    private array $jsonContent;

    public function setUp(): void
    {
        $this->loginQuery = new LoginQuery();
        $this->jsonContent = json_decode(file_get_contents(__DIR__ . '/../Data/loginV3TypeP.json'), true);
    }

    public function testGetQuery()
    {
        $this->assertEquals(['identifiant' => '', 'motdepasse' => ''], $this->loginQuery->getQuery());
    }

    public function testGetMethode()
    {
        $this->assertEquals('POST', $this->loginQuery->getMethode());
    }

    public function testBuildEntity()
    {
        $this->assertEquals('Studoo\Api\EcoleDirecte\Entity\Login', get_class($this->loginQuery->buildEntity($this->jsonContent)));
    }

    public function testGetPath()
    {
        $this->assertEquals('login.awp', $this->loginQuery->getPath());
    }

    public function testGetToken()
    {
        $this->assertEquals('f6897e82-c10c-42d9-80R8-5c62r4c2acd2', $this->loginQuery->buildEntity($this->jsonContent)->getToken());
    }

    public function testGetEmail()
    {
        $this->assertEquals('Julien.Bouvier@test.fr', $this->loginQuery->buildEntity($this->jsonContent)->getEmail());
    }
}
