<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diseases
 *
 * @ORM\Table(name="diseases")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\DiseasesRepository")
 */
class Diseases
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
     * @ORM\Column(name="Disease_name", type="string", length=255)
     */
    private $diseaseName;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set diseaseName
     *
     * @param string $diseaseName
     *
     * @return Diseases
     */
    public function setDiseaseName($diseaseName)
    {
        $this->diseaseName = $diseaseName;

        return $this;
    }

    /**
     * Get diseaseName
     *
     * @return string
     */
    public function getDiseaseName()
    {
        return $this->diseaseName;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Diseases
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Diseases
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

