<?php

use Studoo\Api\EcoleDirecte\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private $version = "0.1.5";

    public function testClientGetVersion()
    {
        $client = new Client([
            "base_path" => "http://localhost:9042",
            "mock" => true
        ]);
        $this->assertEquals($this->version, $client->getVersion());
    }

    /**
     * @throws \Studoo\Api\EcoleDirecte\Exception\InvalidModelException
     * @throws \Studoo\Api\EcoleDirecte\Exception\ErrorHttpStatusException
     */
    public function testClient01FetchAccessToken()
    {
        $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
            "mock" => true
        ]);
        $this->assertEquals(52, strlen($client->fetchAccessToken()->getToken()));
    }

    /**
     * @throws \Studoo\Api\EcoleDirecte\Exception\InvalidModelException
     */
    public function testClient02GetCurrentUserLogin()
    {
        $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
            "mock" => true
        ]);
        $this->assertInstanceOf("Studoo\Api\EcoleDirecte\Entity\Login", $client->fetchAccessToken());
    }

    public function testClient03ErrorHttpStatusException()
    {
        $client = new Client([
            "base_path" => "http://NoTDomain:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
            "mock" => true
        ]);
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\ErrorHttpStatusException::class);
        $client->fetchAccessToken();
    }

    public function testClient04InvalidCredentialsException()
    {
       $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "j",
            "client_secret" => "t",
            "mock" => true
        ]);
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\InvalidCredentialsException::class);
        $client->fetchAccessToken();
    }

    // TODO public function testClient05InvalidModelException()
}
