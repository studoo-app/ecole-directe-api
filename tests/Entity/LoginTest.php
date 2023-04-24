<?php

namespace Entity;

use Studoo\Api\EcoleDirecte\Entity\Login;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLogin01GetToken()
    {
        $login = new Login();
        $login->setToken('f6897f82-c10c-42d9-80e8-5c62a4c2acd2');
        $this->assertEquals('f6897f82-c10c-42d9-80e8-5c62a4c2acd2', $login->getToken());
    }

    public function testLogin02SetIdLogin()
    {
        $login = new Login();
        $login->setIdLogin('345');
        $this->assertEquals('345', $login->getIdLogin());
    }

    public function testLogin03SetId()
    {
        $login = new Login();
        $login->setId('345');
        $this->assertEquals('345', $login->getId());
    }

    public function testLogin04SetUid()
    {
        $login = new Login();
        $login->setUid('345');
        $this->assertEquals('345', $login->getUid());
    }

    public function testLogin05SetEmail()
    {
        $login = new Login();
        $login->setEmail('julien@test.fr');
        $this->assertEquals('julien@test.fr', $login->getEmail());
    }

    public function testLogin06SetPrenom()
    {
        $login = new Login();
        $login->setPrenom('Julien');
        $this->assertEquals('Julien', $login->getPrenom());
    }

    public function testLogin07SetNom()
    {
        $login = new Login();
        $login->setNom('Test');
        $this->assertEquals('Test', $login->getNom());
    }

    public function testLogin08SetIdentifiant()
    {
        $login = new Login();
        $login->setIdentifiant('julien.test');
        $this->assertEquals('julien.test', $login->getIdentifiant());
    }

    public function testLogin09SetTypeCompte()
    {
        $login = new Login();
        $login->setTypeCompte('ELEVE');
        $this->assertEquals('ELEVE', $login->getTypeCompte());
    }

    public function testLogin10SetNomEtablissement()
    {
        $login = new Login();
        $login->setNomEtablissement('Code School');
        $this->assertEquals('Code School', $login->getNomEtablissement());
    }

    public function testLogin11AnneeScolaireCourante()
    {
        $login = new Login();
        $login->setAnneeScolaireCourante('2020-2021');
        $this->assertEquals('2020-2021', $login->getAnneeScolaireCourante());
    }

    public function testLogin12SetProfile()
    {
        $login = new Login();
        $login->setProfile(['ELEVE']);
        $this->assertEquals(['ELEVE'], $login->getProfile());
    }
}
