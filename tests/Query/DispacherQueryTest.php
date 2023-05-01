<?php

namespace Query;

use PHPUnit\Framework\TestCase;
use Studoo\Api\EcoleDirecte\Exception\InvalidModelException;
use Studoo\Api\EcoleDirecte\Query\DispacherQuery;
use Studoo\Api\EcoleDirecte\Query\LoginQuery;
use Studoo\Api\EcoleDirecte\Query\ViescolaireQuery;

class DispacherQueryTest extends TestCase
{
    use DispacherQuery;

    public function testDispacherQuery01InvalidModelException()
    {
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\InvalidModelException::class);
        $this->assertEquals('logine', $this->dispacherForModel("logine"));
    }

    public function testDispacherQuery02GetLogin()
    {
        $this->assertInstanceOf('Studoo\Api\EcoleDirecte\Query\LoginQuery', $this->dispacherForModel("login"));
    }

    public function testDispacherQuery02GetVieScolaire()
    {
        $this->assertInstanceOf('Studoo\Api\EcoleDirecte\Query\ViescolaireQuery', $this->dispacherForModel("viescolaire"));
    }
}
