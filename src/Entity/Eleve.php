<?php
/*
 * Ce fichier fait partie du ecole-directe-api.
 *
 * (c) Benoit Foujols
 *
 * Pour les informations complètes sur les droits d'auteur et la licence,
 * veuillez consulter le fichier LICENSE qui a été distribué avec ce code source.
 */


namespace Studoo\Api\EcoleDirecte\Entity;

use DateTime;
use Exception;
use Studoo\Api\EcoleDirecte\Exception\InvalidDateTimeException;
use Studoo\Api\EcoleDirecte\Exception\requireDataException;

class Eleve
{
    /**
     * @var int $id L'identifiant de l'élève
     * @codeTest 01
     * @required
     */
    private int $id;

    /**
     * @var string $nom Le nom de l'élève
     * @codeTest 02
     * @required
     */
    private string $nom;

    /**
     * @var string $particule Le particule de l'élève
     * @codeTest 07
     */
    private string $particule;

    /**
     * @var string $prenom Le prénom de l'élève
     * @codeTest 03
     * @required
     */
    private string $prenom;

    /**
     * @var string $sexe Le sexe de l'élève
     * @codeTest 05
     */
    private string $sexe;

    /**
     * @var string $classeId L'identifiant de la classe de l'élève
     * @codeTest 04
     */
    private int $classeId;

    /**
     * @var string $classeLibelle Le libellé de la classe de l'élève
     * @codeTest 04
     */
    private string $classeLibelle;

    /**
     * @var DateTime|null $dateNaissance La date de naissance de l'élève
     * @codeTest 06
     */
    private ?DateTime $dateNaissance;

    /**
     * @var DateTime|null $dateEntree La date d'entrée de l'élève
     * @codeTest 08
     */
    private ?DateTime $dateEntree;

    /**
     * @var DateTime|null $dateSortie La date de sortie de l'élève
     * @codeTest 09
     */
    private ?DateTime $dateSortie;

    /**
     * @var string $numeroBadge Le numéro de badge de l'élève
     * @codeTest 10
     */
    private string $numeroBadge;

    /**
     * @var string $regime Le régime de l'élève
     * @codeTest 11
     */
    private string $regime;

    /**
     * @var string $email L'email de l'élève
     * @codeTest 12
     * @required
     */
    private string $email;

    /**
     * @var string $portable Le numéro de portable de l'élève
     * @codeTest 13
     */
    private string $portable;

    /**
     * @var string $photo L'url de la photo de l'élève
     * @codeTest 14
     */
    private string $photo;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Eleve
     */
    public function setId(int $id): Eleve
    {
        $this->id =  $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Eleve
     * @throws requireDataException
     */
    public function setNom(string $nom): Eleve
    {
        $this->nom = (empty($nom)) ? throw new requireDataException("Le nom de l'élève est obligatoire") : $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getParticule(): string
    {
        return $this->particule;
    }

    /**
     * @param string $particule
     * @return Eleve
     */
    public function setParticule(string $particule): Eleve
    {
        $this->particule = $particule;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Eleve
     * @throws requireDataException
     */
    public function setPrenom(string $prenom): Eleve
    {
        $this->prenom = (empty($prenom))
            ? throw new requireDataException("Le prenom de l'élève est obligatoire") : $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getSexe(): string
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     * @return Eleve
     */
    public function setSexe(string $sexe): Eleve
    {
        $this->sexe = $sexe;
        return $this;
    }

    /**
     * @return int
     */
    public function getClasseId(): int
    {
        return $this->classeId;
    }

    /**
     * @param int $classeId
     * @return Eleve
     */
    public function setClasseId(int $classeId): Eleve
    {
        $this->classeId = $classeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClasseLibelle(): string
    {
        return $this->classeLibelle;
    }

    /**
     * @param string $classeLibelle
     * @return Eleve
     */
    public function setClasseLibelle(string $classeLibelle): Eleve
    {
        $this->classeLibelle = $classeLibelle;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroBadge(): string
    {
        return $this->numeroBadge;
    }

    /**
     * @param string $numeroBadge
     * @return Eleve
     */
    public function setNumeroBadge(string $numeroBadge): Eleve
    {
        $this->numeroBadge = $numeroBadge;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegime(): string
    {
        return $this->regime;
    }

    /**
     * @param string $regime
     * @return Eleve
     */
    public function setRegime(string $regime): Eleve
    {
        $this->regime = $regime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Eleve
     * @throws requireDataException
     */
    public function setEmail(string $email): Eleve
    {
        $this->email = (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
            ? throw new requireDataException("L'email de l'élève est obligatoire") : $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPortable(): string
    {
        return $this->portable;
    }

    /**
     * @param string $portable
     * @return Eleve
     */
    public function setPortable(string $portable): Eleve
    {
        $this->portable = $portable;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return Eleve
     */
    public function setPhoto(string $photo): Eleve
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateNaissance(): ?DateTime
    {
        return $this->dateNaissance;
    }

    /**
     * @param string $dateNaissance
     * @return Eleve
     * @throws InvalidDateTimeException
     */
    public function setDateNaissance(string $dateNaissance): Eleve
    {
        try {
            $this->dateNaissance = ($dateNaissance !== "") ? new DateTime($dateNaissance) : null;
        } catch (Exception) {
            throw new InvalidDateTimeException("La date de naissance n'est pas valide");
        }

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateEntree(): ?DateTime
    {
        return $this->dateEntree;
    }

    /**
     * @param string $dateEntree
     * @return Eleve
     * @throws InvalidDateTimeException
     */
    public function setDateEntree(string $dateEntree): Eleve
    {
        try {
            $this->dateEntree = ($dateEntree !== "") ? new DateTime($dateEntree) : null;
        } catch (Exception) {
            throw new InvalidDateTimeException("La date d'entrée n'est pas valide");
        }

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateSortie(): ?DateTime
    {
        return $this->dateSortie;
    }

    /**
     * @param String $dateSortie
     * @return Eleve
     * @throws InvalidDateTimeException
     */
    public function setDateSortie(String $dateSortie): Eleve
    {
        try {
            $this->dateSortie = ($dateSortie !== "") ? new DateTime($dateSortie) : null;
        } catch (Exception) {
            throw new InvalidDateTimeException("La date de sortie n'est pas valide");
        }

        return $this;
    }

}
