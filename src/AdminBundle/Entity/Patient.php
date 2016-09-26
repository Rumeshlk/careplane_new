<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="Patient")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\PatientRepository")
 */
class Patient
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
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="datetime")
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="bsn", type="integer")
     */
    private $bsn;

    /**
     * @var string
     *
     * @ORM\Column(name="therapist", type="string", length=255)
     */
    private $therapist;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="landline", type="string", length=255)
     */
    private $landline;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile_phone", type="string", length=255)
     */
    private $mobilePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=255)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="practitioner_name", type="string", length=255)
     */
    private $practitionerName;

    /**
     * @var string
     *
     * @ORM\Column(name="insurer", type="string", length=255)
     */
    private $insurer;

    /**
     * @var string
     *
     * @ORM\Column(name="policy_number", type="string", length=255)
     */
    private $policyNumber;

    /**
     * @var bool
     *
     * @ORM\Column(name="add_insured", type="boolean")
     */
    private $addInsured;

    /**
     * @var string
     *
     * @ORM\Column(name="got_to_know_from", type="string", length=255)
     */
    private $gotToKnowFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Paeint
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Paeint
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return Paeint
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Paeint
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set bsn
     *
     * @param integer $bsn
     *
     * @return Paeint
     */
    public function setBsn($bsn)
    {
        $this->bsn = $bsn;

        return $this;
    }

    /**
     * Get bsn
     *
     * @return int
     */
    public function getBsn()
    {
        return $this->bsn;
    }

    /**
     * Set therapist
     *
     * @param string $therapist
     *
     * @return Paeint
     */
    public function setTherapist($therapist)
    {
        $this->therapist = $therapist;

        return $this;
    }

    /**
     * Get therapist
     *
     * @return string
     */
    public function getTherapist()
    {
        return $this->therapist;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Paeint
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set landline
     *
     * @param string $landline
     *
     * @return Paeint
     */
    public function setLandline($landline)
    {
        $this->landline = $landline;

        return $this;
    }

    /**
     * Get landline
     *
     * @return string
     */
    public function getLandline()
    {
        return $this->landline;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     *
     * @return Paeint
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Paeint
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Paeint
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Paeint
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Paeint
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set practitionerName
     *
     * @param string $practitionerName
     *
     * @return Paeint
     */
    public function setPractitionerName($practitionerName)
    {
        $this->practitionerName = $practitionerName;

        return $this;
    }

    /**
     * Get practitionerName
     *
     * @return string
     */
    public function getPractitionerName()
    {
        return $this->practitionerName;
    }

    /**
     * Set insurer
     *
     * @param string $insurer
     *
     * @return Paeint
     */
    public function setInsurer($insurer)
    {
        $this->insurer = $insurer;

        return $this;
    }

    /**
     * Get insurer
     *
     * @return string
     */
    public function getInsurer()
    {
        return $this->insurer;
    }

    /**
     * Set policyNumber
     *
     * @param string $policyNumber
     *
     * @return Paeint
     */
    public function setPolicyNumber($policyNumber)
    {
        $this->policyNumber = $policyNumber;

        return $this;
    }

    /**
     * Get policyNumber
     *
     * @return string
     */
    public function getPolicyNumber()
    {
        return $this->policyNumber;
    }

    /**
     * Set addInsured
     *
     * @param boolean $addInsured
     *
     * @return Paeint
     */
    public function setAddInsured($addInsured)
    {
        $this->addInsured = $addInsured;

        return $this;
    }

    /**
     * Get addInsured
     *
     * @return bool
     */
    public function getAddInsured()
    {
        return $this->addInsured;
    }

    /**
     * Set gotToKnowFrom
     *
     * @param string $gotToKnowFrom
     *
     * @return Paeint
     */
    public function setGotToKnowFrom($gotToKnowFrom)
    {
        $this->gotToKnowFrom = $gotToKnowFrom;

        return $this;
    }

    /**
     * Get gotToKnowFrom
     *
     * @return string
     */
    public function getGotToKnowFrom()
    {
        return $this->gotToKnowFrom;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Paeint
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}

