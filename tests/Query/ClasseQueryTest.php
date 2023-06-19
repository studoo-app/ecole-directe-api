<?php

namespace Query;

use PHPUnit\Framework\TestCase;
use Studoo\Api\EcoleDirecte\Query\ClassesQuery;

class ClasseQueryTest extends TestCase
{
    private ClassesQuery $classesQuery;
    private array $jsonContent;

    public function setUp(): void
    {
        $this->classeQuery = new ClassesQuery();
        $this->jsonContent = json_decode(
            file_get_contents(__DIR__ . '/../Data/classeV3Type.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    public function testClasseQuery01BuildEntity()
    {
        $this->assertEquals('Studoo\Api\EcoleDirecte\Entity\Classe', get_class($this->classeQuery->buildEntity($this->jsonContent)));
    }

    public function testClasseQuery02getEleve()
    {
        $classes = $this->classeQuery->buildEntity($this->jsonContent);
        $this->assertEquals('Studoo\Api\EcoleDirecte\Entity\Eleve', get_class($classes->getEleves()[0]));
    }

    public function testClasseQuery03getEleveNom()
    {
        $classes = $this->classeQuery->buildEntity($this->jsonContent);
        $this->assertEquals('OUCHE', $classes->getEleves()[0]->getNom());
    }

    public function testClasseQuery03getElevePrenom()
    {
        $classes = $this->classeQuery->buildEntity($this->jsonContent);
        $this->assertEquals('Mike', $classes->getEleves()[2]->getPrenom());
    }

    public function testClasseQuery04getClasseId()
    {
        $classes = $this->classeQuery->buildEntity($this->jsonContent);
        $this->assertEquals('107', $classes->getId());
    }

    public function testClasseQuery05getClasseCode()
    {
        $classes = $this->classeQuery->buildEntity($this->jsonContent);
        $this->assertEquals('1TSSIOA', $classes->getCode());
    }

    public function testClasseQuery06getClasseType()
    {
        $classes = $this->classeQuery->buildEntity($this->jsonContent);
        $this->assertEquals('C', $classes->getType());
    }

    public function testClasseQuery07getClasseLibelle()
    {
        $classes = $this->classeQuery->buildEntity($this->jsonContent);
        $this->assertEquals('1 TS SIO A', $classes->getLibelle());
    }
}
