<?php

namespace Entity;

use Exception;
use Studoo\Api\EcoleDirecte\Entity\Eleve;
use PHPUnit\Framework\TestCase;
use Studoo\Api\EcoleDirecte\Exception\InvalidDateTimeException;

class EleveTest extends TestCase
{
    public function testEleve01SetId()
    {
        $eleve = new Eleve();
        $eleve->setId('345');
        $this->assertEquals('345', $eleve->getId());
    }

    public function testEleve02SetNom()
    {
        $eleve = new Eleve();
        $eleve->setNom('Ba');
        $this->assertEquals('Ba', $eleve->getNom());
    }

    public function testEleve03SetPrenom()
    {
        $eleve = new Eleve();
        $eleve->setPrenom('Julien');
        $this->assertEquals('Julien', $eleve->getPrenom());
    }

    public function testEleve04SetClasse()
    {
        $eleve = new Eleve();
        $eleve->setClasseId('123');
        $this->assertEquals('123', $eleve->getClasseId());
    }

    public function testEleve05SetSexe()
    {
        $eleve = new Eleve();
        $eleve->setSexe('M');
        $this->assertEquals('M', $eleve->getSexe());
    }

    public function testEleve06SetDateNaissance()
    {
        $eleve = new Eleve();
        $eleve->setDateNaissance('2000-12-12');
        $this->assertEquals('2000-12-12', $eleve->getDateNaissance()->format('Y-m-d'));
    }

    public function testEleve06SetDateZeroOneNaissance()
    {
        $eleve = new Eleve();
        $eleve->setDateNaissance('2000-01-01');
        $this->assertEquals('2000-01-01', $eleve->getDateNaissance()->format('Y-m-d'));
    }

    public function testEleve06IsNullDateNaissance()
    {
        $eleve = new Eleve();
        $eleve->setDateNaissance("");
        $this->assertNull($eleve->getDateNaissance());
    }

    public function testEleve06IsExceptionDateNaissance()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\InvalidDateTimeException::class);
        $eleve->setDateNaissance("2001-13-30");
    }
}
