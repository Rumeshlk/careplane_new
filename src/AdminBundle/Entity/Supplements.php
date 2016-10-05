<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplements
 *
 * @ORM\Table(name="supplements")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\SupplementsRepository")
 */
class Supplements
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
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $productName;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="tax", type="string", length=255)
     */
    private $tax;

    /**
     * @var float
     *
     * @ORM\Column(name="price_with_tax", type="float")
     */
    private $priceWithTax;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="unit", type="integer")
     */
    private $unit;

    /**
     * @var string
     *
     * @ORM\Column(name="dosage", type="string", length=255)
     */
    private $dosage;

    /**
     * @var string
     *
     * @ORM\Column(name="servings", type="string", length=255)
     */
    private $servings;

    /**
     * @var string
     *
     * @ORM\Column(name="casing", type="string", length=255)
     */
    private $casing;

    /**
     * @var string
     *
     * @ORM\Column(name="active_substance", type="string", length=255)
     */
    private $activeSubstance;

    /**
     * @var string
     *
     * @ORM\Column(name="content_active_substance", type="string", length=255)
     */
    private $contentActiveSubstance;

    /**
     * @var int
     *
     * @ORM\Column(name="unit_as", type="integer")
     */
    private $unitAs;

    /**
     * @var string
     *
     * @ORM\Column(name="intake_advice", type="string", length=255)
     */
    private $intakeAdvice;

    /**
     * @var bool
     *
     * @ORM\Column(name="Stock", type="boolean")
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="content_active_substance_in_sumlement", type="string", length=255)
     */
    private $contentActiveSubstanceInSumlement;

    /**
     * @var integer
     *
     * @ORM\Column(name="no_of_servings", type="integer")
     */
    private $noOfServings;


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
     * Set productName
     *
     * @param string $productName
     *
     * @return Supplements
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Supplements
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set tax
     *
     * @param string $tax
     *
     * @return Supplements
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set priceWithTax
     *
     * @param float $priceWithTax
     *
     * @return Supplements
     */
    public function setPriceWithTax($priceWithTax)
    {
        $this->priceWithTax = $priceWithTax;

        return $this;
    }

    /**
     * Get priceWithTax
     *
     * @return float
     */
    public function getPriceWithTax()
    {
        return $this->priceWithTax;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Supplements
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set unit
     *
     * @param integer $unit
     *
     * @return Supplements
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return int
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set dosage
     *
     * @param string $dosage
     *
     * @return Supplements
     */
    public function setDosage($dosage)
    {
        $this->dosage = $dosage;

        return $this;
    }

    /**
     * Get dosage
     *
     * @return string
     */
    public function getDosage()
    {
        return $this->dosage;
    }

    /**
     * Set servings
     *
     * @param string $servings
     *
     * @return Supplements
     */
    public function setServings($servings)
    {
        $this->servings = $servings;

        return $this;
    }

    /**
     * Get servings
     *
     * @return string
     */
    public function getServings()
    {
        return $this->servings;
    }

    /**
     * Set casing
     *
     * @param string $casing
     *
     * @return Supplements
     */
    public function setCasing($casing)
    {
        $this->casing = $casing;

        return $this;
    }

    /**
     * Get casing
     *
     * @return string
     */
    public function getCasing()
    {
        return $this->casing;
    }

    /**
     * Set activeSubstance
     *
     * @param string $activeSubstance
     *
     * @return Supplements
     */
    public function setActiveSubstance($activeSubstance)
    {
        $this->activeSubstance = $activeSubstance;

        return $this;
    }

    /**
     * Get activeSubstance
     *
     * @return string
     */
    public function getActiveSubstance()
    {
        return $this->activeSubstance;
    }

    /**
     * Set contentActiveSubstance
     *
     * @param string $contentActiveSubstance
     *
     * @return Supplements
     */
    public function setContentActiveSubstance($contentActiveSubstance)
    {
        $this->contentActiveSubstance = $contentActiveSubstance;

        return $this;
    }

    /**
     * Get contentActiveSubstance
     *
     * @return string
     */
    public function getContentActiveSubstance()
    {
        return $this->contentActiveSubstance;
    }

    /**
     * Set unitAs
     *
     * @param integer $unitAs
     *
     * @return Supplements
     */
    public function setUnitAs($unitAs)
    {
        $this->unitAs = $unitAs;

        return $this;
    }

    /**
     * Get unitAs
     *
     * @return int
     */
    public function getUnitAs()
    {
        return $this->unitAs;
    }

    /**
     * Set intakeAdvice
     *
     * @param string $intakeAdvice
     *
     * @return Supplements
     */
    public function setIntakeAdvice($intakeAdvice)
    {
        $this->intakeAdvice = $intakeAdvice;

        return $this;
    }

    /**
     * Get intakeAdvice
     *
     * @return string
     */
    public function getIntakeAdvice()
    {
        return $this->intakeAdvice;
    }

    /**
     * Set stock
     *
     * @param boolean $stock
     *
     * @return Supplements
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return bool
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set contentActiveSubstanceInSumlement
     *
     * @param string $contentActiveSubstanceInSumlement
     *
     * @return Supplements
     */
    public function setContentActiveSubstanceInSumlement($contentActiveSubstanceInSumlement)
    {
        $this->contentActiveSubstanceInSumlement = $contentActiveSubstanceInSumlement;

        return $this;
    }

    /**
     * Get contentActiveSubstanceInSumlement
     *
     * @return string
     */
    public function getContentActiveSubstanceInSumlement()
    {
        return $this->contentActiveSubstanceInSumlement;
    }

    /**
     * Set noOfServings
     *
     * @param string $noOfServings
     *
     * @return Supplements
     */
    public function setNoOfServings($noOfServings)
    {
        $this->noOfServings = $noOfServings;

        return $this;
    }

    /**
     * Get noOfServings
     *
     * @return string
     */
    public function getNoOfServings()
    {
        return $this->noOfServings;
    }
}

