<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laboratory
 *
 * @ORM\Table(name="laboratory")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\LaboratoryRepository")
 */
class Laboratory
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
     * @ORM\Column(name="Laboratory_Name", type="string", length=255)
     */
    private $laboratoryName;


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
     * Set laboratoryName
     *
     * @param string $laboratoryName
     *
     * @return Laboratory
     */
    public function setLaboratoryName($laboratoryName)
    {
        $this->laboratoryName = $laboratoryName;

        return $this;
    }

    /**
     * Get laboratoryName
     *
     * @return string
     */
    public function getLaboratoryName()
    {
        return $this->laboratoryName;
    }
}

