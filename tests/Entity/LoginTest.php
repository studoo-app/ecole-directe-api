<?php

namespace Entity;

use Studoo\Api\EcoleDirecte\Entity\Login;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testGetToken()
    {
        $login = new Login();
        $login->setToken('f6897f82-c10c-42d9-80e8-5c62a4c2acd2');
        $this->assertEquals('f6897f82-c10c-42d9-80e8-5c62a4c2acd2', $login->getToken());
    }

    public function testSetIdLogin()
    {
        $login = new Login();
        $login->setIdLogin('345');
        $this->assertEquals('345', $login->getIdLogin());
    }

    public function testSetId()
    {
        $login = new Login();
        $login->setId('345');
        $this->assertEquals('345', $login->getId());
    }

    public function testSetUid()
    {
        $login = new Login();
        $login->setUid('345');
        $this->assertEquals('345', $login->getUid());
    }

    public function testSetEmail()
    {
        $login = new Login();
        $login->setEmail('julien@test.fr');
        $this->assertEquals('julien@test.fr', $login->getEmail());
    }

    public function testSetPrenom()
    {
        $login = new Login();
        $login->setPrenom('Julien');
        $this->assertEquals('Julien', $login->getPrenom());
    }

    public function testSetNom()
    {
        $login = new Login();
        $login->setNom('Test');
        $this->assertEquals('Test', $login->getNom());
    }

    public function testSetIdentifiant()
    {
        $login = new Login();
        $login->setIdentifiant('julien.test');
        $this->assertEquals('julien.test', $login->getIdentifiant());
    }

    public function testSetTypeCompte()
    {
        $login = new Login();
        $login->setTypeCompte('ELEVE');
        $this->assertEquals('ELEVE', $login->getTypeCompte());
    }

    public function testSetNomEtablissement()
    {
        $login = new Login();
        $login->setNomEtablissement('Code School');
        $this->assertEquals('Code School', $login->getNomEtablissement());
    }

    public function testAnneeScolaireCourante()
    {
        $login = new Login();
        $login->setAnneeScolaireCourante('2020-2021');
        $this->assertEquals('2020-2021', $login->getAnneeScolaireCourante());
    }

    public function testSetProfile()
    {
        $login = new Login();
        $login->setProfile(['ELEVE']);
        $this->assertEquals(['ELEVE'], $login->getProfile());
    }
}
