<?php

use Studoo\Api\EcoleDirecte\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    /**
     * @throws \Studoo\Api\EcoleDirecte\Exception\InvalidModelException
     */
    public function testFetchAccessToken()
    {
        $_ENV["ENV"] = "test";

        $client = new Client([
            "base_path" => "http://localhost:9042",
            "client_id" => "jeremy",
            "client_secret" => "test",
        ]);
        $this->assertEquals('7654-5678-43345-80R8-54324', $client->fetchAccessToken()->getToken());
    }
}
