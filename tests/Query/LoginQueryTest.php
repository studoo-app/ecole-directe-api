<?php

namespace API;

use PHPUnit\Framework\TestCase;
use Studoo\Api\EcoleDirecte\Query\LoginQuery;

class LoginQueryTest extends TestCase
{
    private LoginQuery $loginQuery;
    private array $jsonContent;

    public function setUp(): void
    {
        $_ENV["ENV"] = "";
        $this->loginQuery = new LoginQuery();
        $this->jsonContent = json_decode(
            file_get_contents(__DIR__ . '/../Data/loginV3TypeP.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    public function testLoginQuery01GetQuery()
    {
        $this->assertEquals(['identifiant' => '', 'motdepasse' => ''], $this->loginQuery->getQuery());
    }

    public function testLoginQuery02GetMethode()
    {
        $this->assertEquals('POST', $this->loginQuery->getMethode());
    }

    public function testLoginQuery03BuildEntity()
    {
        $this->assertEquals('Studoo\Api\EcoleDirecte\Entity\Login', get_class($this->loginQuery->buildEntity($this->jsonContent)));
    }

    public function testLoginQuery04GetPath()
    {
        $this->assertEquals('login.awp', $this->loginQuery->getPath());
    }

    public function testLoginQuery05GetToken()
    {
        $this->assertEquals('f6897e82-c10c-42d9-80R8-5c62r4c2acd2', $this->loginQuery->buildEntity($this->jsonContent)->getToken());
    }

    public function testLoginQuery06GetEmail()
    {
        $this->assertEquals('Julien.Bouvier@test.fr', $this->loginQuery->buildEntity($this->jsonContent)->getEmail());
    }
}
