<?php

namespace Entity;

use Studoo\Api\EcoleDirecte\Entity\Viescolaire;
use PHPUnit\Framework\TestCase;

class ViescolaireTest extends TestCase
{
    public function testViescolaire01SetAbsencesRetards()
    {
        $viescolaire = new Viescolaire();
        $viescolaire->setAbsencesRetards(["nbAR" => "345"]);
        $this->assertEquals('345', $viescolaire->getAbsencesRetards()["nbAR"]);
    }

    public function testViescolaire02SetSanctionsEncouragements()
    {
        $viescolaire = new Viescolaire();
        $viescolaire->setSanctionsEncouragements(["EC" => "TB"]);
        $this->assertEquals('TB', $viescolaire->getSanctionsEncouragements()["EC"]);
    }

    public function testViescolaire03SetParametrage()
    {
        $viescolaire = new Viescolaire();
        $viescolaire->setParametrage(["justificationEnLigne" => true]);
        $this->assertTrue($viescolaire->getParametrage()["justificationEnLigne"]);
    }
}
