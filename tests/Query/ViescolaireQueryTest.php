<?php

namespace Query;

use Studoo\Api\EcoleDirecte\Query\ViescolaireQuery;
use PHPUnit\Framework\TestCase;

class ViescolaireQueryTest extends TestCase
{
    private ViescolaireQuery $viescolaireQuery;
    private array $jsonContent;

    public function setUp(): void
    {
        $_ENV["ENV"] = "";
        $this->viescolaireQuery = new ViescolaireQuery();
        $this->jsonContent = json_decode(
            file_get_contents(__DIR__ . '/../Data/viescolaireV3TypeE.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    public function testVieScolaireQuery01GetMethode()
    {
        $this->assertEquals('POST', $this->viescolaireQuery->getMethode());
    }

    public function testVieScolaireQuery02BuildEntity()
    {
        $this->assertEquals('Studoo\Api\EcoleDirecte\Entity\Viescolaire', get_class($this->viescolaireQuery->buildEntity($this->jsonContent)));
    }

    public function testVieScolaireQuery03GetPath()
    {
        $this->assertEquals('eleves/<ID>/viescolaire.awp?verbe=get', $this->viescolaireQuery->getPath());
    }

    public function testVieScolaireQuery04GetAbsencesRetards()
    {
        $this->assertEquals('987', $this->viescolaireQuery->buildEntity($this->jsonContent)->getAbsencesRetards()[0]["id"]);
    }

    public function testVieScolaireQuery05GetParametrage()
    {
        $this->assertFalse($this->viescolaireQuery->buildEntity($this->jsonContent)->getParametrage()["justificationEnLigne"]);
    }

    public function testVieScolaireQuery06NotDataResponseException()
    {
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\NotDataResponseException::class);
        $this->assertFalse($this->viescolaireQuery->buildEntity([])->getParametrage()["justificationEnLigne"]);
    }
}
