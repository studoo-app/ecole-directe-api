<?php

namespace Entity;

use Studoo\Api\EcoleDirecte\Entity\Classe;
use PHPUnit\Framework\TestCase;
use Studoo\Api\EcoleDirecte\Entity\Eleve;

class ClasseTest extends TestCase
{

    public function testClasse01SetEleves()
    {
        $classe = new Classe();
        $classe->setEleves(new Eleve());
        $this->assertEquals(new Eleve(), $classe->getEleves()[0]);
    }

    public function testClasse02SetId()
    {
        $classe = new Classe();
        $classe->setId('345');
        $this->assertEquals('345', $classe->getId());
    }

    public function testClasse03SetCode()
    {
        $classe = new Classe();
        $classe->setCode('345');
        $this->assertEquals('345', $classe->getCode());
    }

    public function testClasse04SetLibelle()
    {
        $classe = new Classe();
        $classe->setLibelle('345');
        $this->assertEquals('345', $classe->getLibelle());
    }

    public function testClasse05SetType()
    {
        $classe = new Classe();
        $classe->setType('345');
        $this->assertEquals('345', $classe->getType());
    }

    public function testClasse06SetIsFlexibleTrue()
    {
        $classe = new Classe();
        $classe->setIsFlexible(true);
        $this->assertTrue($classe->IsFlexible());
    }

    public function testClasse06SetIsFlexibleFalse()
    {
        $classe = new Classe();
        $classe->setIsFlexible(false);
        $this->assertFalse($classe->IsFlexible());
    }
}
