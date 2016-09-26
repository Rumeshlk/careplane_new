<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Units
 *
 * @ORM\Table(name="units")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\UnitsRepository")
 */
class Units
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_singular", type="string", length=255)
     */
    private $nameSingular;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_plural", type="string", length=255)
     */
    private $namePlural;

    /**
     * @var string
     *
     * @ORM\Column(name="Abbreviation", type="string", length=255)
     */
    private $abbreviation;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameSingular
     *
     * @param string $nameSingular
     *
     * @return Units
     */
    public function setNameSingular($nameSingular)
    {
        $this->nameSingular = $nameSingular;

        return $this;
    }

    /**
     * Get nameSingular
     *
     * @return string
     */
    public function getNameSingular()
    {
        return $this->nameSingular;
    }

    /**
     * Set namePlural
     *
     * @param string $namePlural
     *
     * @return Units
     */
    public function setNamePlural($namePlural)
    {
        $this->namePlural = $namePlural;

        return $this;
    }

    /**
     * Get namePlural
     *
     * @return string
     */
    public function getNamePlural()
    {
        return $this->namePlural;
    }

    /**
     * Set abbreviation
     *
     * @param string $abbreviation
     *
     * @return Units
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }
}

