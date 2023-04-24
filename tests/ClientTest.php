<?php

use Studoo\Api\EcoleDirecte\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    /**
     * @throws \Studoo\Api\EcoleDirecte\Exception\InvalidModelException
     */
    public function testClient01FetchAccessToken()
    {
        $_ENV["ENV"] = "test";

        $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
        ]);
        $this->assertEquals('7654-5678-43345-80R8-54324', $client->fetchAccessToken()->getToken());
    }

    /**
     * @throws \Studoo\Api\EcoleDirecte\Exception\InvalidModelException
     */
    public function testClient02GetCurrentUserLogin()
    {
        $_ENV["ENV"] = "test";

        $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
        ]);
        $this->assertInstanceOf("Studoo\Api\EcoleDirecte\Entity\Login", $client->fetchAccessToken());
    }

    public function testClient03ErrorHttpStatusException()
    {
        $_ENV["ENV"] = "test";

        $client = new Client([
            "base_path" => "http://NoTDomain:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
        ]);
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\ErrorHttpStatusException::class);
        $client->fetchAccessToken();
    }

    public function testClient04InvalidCredentialsException()
    {
        $_ENV["ENV"] = "test";

        $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "j",
            "client_secret" => "t",
        ]);
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\InvalidCredentialsException::class);
        $client->fetchAccessToken();
    }

    public function testClient05InvalidModelException()
    {
        $_ENV["ENV"] = "";

        $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
        ]);
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\InvalidModelException::class);
        $client->fetchAccessToken();
    }
}
