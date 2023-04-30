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

    public function testEleve02IsEmptyNom()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\requireDataException::class);
        $eleve->setNom('');
    }

    public function testEleve03SetPrenom()
    {
        $eleve = new Eleve();
        $eleve->setPrenom('Julien');
        $this->assertEquals('Julien', $eleve->getPrenom());
    }

    public function testEleve03IsEmptyPrenom()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\requireDataException::class);
        $eleve->setPrenom('');
    }

    public function testEleve04SetClasseId()
    {
        $eleve = new Eleve();
        $eleve->setClasseId('123');
        $this->assertEquals('123', $eleve->getClasseId());
    }

    public function testEleve04SetClasseLibelle()
    {
        $eleve = new Eleve();
        $eleve->setClasseLibelle('BTS-SIO');
        $this->assertEquals('BTS-SIO', $eleve->getClasseLibelle());
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

    public function testEleve07SetParticule()
    {
        $eleve = new Eleve();
        $eleve->setParticule('M.');
        $this->assertEquals('M.', $eleve->getParticule());
    }

    public function testEleve07IsNullParticule()
    {
        $eleve = new Eleve();
        $eleve->setParticule('');
        $this->assertEquals('', $eleve->getParticule());
    }

    public function testEleve08SetDateEntree()
    {
        $eleve = new Eleve();
        $eleve->setDateEntree('2000-12-12');
        $this->assertEquals('2000-12-12', $eleve->getDateEntree()->format('Y-m-d'));
    }

    public function testEleve08SetDateZeroOneEntree()
    {
        $eleve = new Eleve();
        $eleve->setDateEntree('2000-01-01');
        $this->assertEquals('2000-01-01', $eleve->getDateEntree()->format('Y-m-d'));
    }

    public function testEleve08IsNullDateEntree()
    {
        $eleve = new Eleve();
        $eleve->setDateEntree("");
        $this->assertNull($eleve->getDateEntree());
    }

    public function testEleve08IsExceptionDateEntree()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\InvalidDateTimeException::class);
        $eleve->setDateEntree("2001-13-30");
    }

    public function testEleve09SetDateSortie()
    {
        $eleve = new Eleve();
        $eleve->setDateSortie('2000-12-12');
        $this->assertEquals('2000-12-12', $eleve->getDateSortie()->format('Y-m-d'));
    }

    public function testEleve09SetDateZeroOneSortie()
    {
        $eleve = new Eleve();
        $eleve->setDateSortie('2000-01-01');
        $this->assertEquals('2000-01-01', $eleve->getDateSortie()->format('Y-m-d'));
    }

    public function testEleve09IsNullDateSortie()
    {
        $eleve = new Eleve();
        $eleve->setDateSortie("");
        $this->assertNull($eleve->getDateSortie());
    }

    public function testEleve09IsExceptionDateSortie()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\InvalidDateTimeException::class);
        $eleve->setDateSortie("2001-13-30");
    }

    public function testEleve10SetNumeroBadge()
    {
        $eleve = new Eleve();
        $eleve->setNumeroBadge('234654FGRF24RR332');
        $this->assertEquals('234654FGRF24RR332', $eleve->getNumeroBadge());
    }

    public function testEleve11SetRegime()
    {
        $eleve = new Eleve();
        $eleve->setRegime('Sans Lait');
        $this->assertEquals('Sans Lait', $eleve->getRegime());
    }

    public function testEleve12SetEmail()
    {
        $eleve = new Eleve();
        $eleve->setEmail('test@test.fr');
        $this->assertEquals('test@test.fr', $eleve->getEmail());
    }

    public function testEleve12IsEmptyEmail()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\requireDataException::class);
        $eleve->setEmail('');
    }

    public function testEleve12IsBadWithoutDomainEmail()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\requireDataException::class);
        $eleve->setEmail('test@');
    }

    public function testEleve12IsBadDomainEmail()
    {
        $eleve = new Eleve();
        $this->expectException(\Studoo\Api\EcoleDirecte\Exception\requireDataException::class);
        $eleve->setEmail('test.test.fr');
    }

    public function testEleve13SetPortable()
    {
        $eleve = new Eleve();
        $eleve->setPortable('06 22 43 45 65');
        $this->assertEquals('06 22 43 45 65', $eleve->getPortable());
    }

    public function testEleve14SetPhoto()
    {
        $eleve = new Eleve();
        $eleve->setPhoto('https://www.ecoledirecte.com/photo/1234567890');
        $this->assertEquals('https://www.ecoledirecte.com/photo/1234567890', $eleve->getPhoto());
    }
}
