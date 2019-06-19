<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class University
{
    /**
     * @var
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=5,
     *     max=64,
     *     minMessage="The university title should have at least 5 characters",
     *     maxMessage="The university title is too long"
     * )
     */
    private $title;

    /**
     * @var
     * @Assert\NotBlank()
     * @Assert\Length(min=5, max=64)
     * )
     */
    private $address;

    /**
     * @var
     * @Assert\Regex(
     *     pattern="/^\+(?:[0-9] ?){6,14}[0-9]$/",
     *     message="The phone number has invalid format."
     * )
     */
    private $phone;

    /**
     * @var
     */
    private $country;

    /**
     * @Assert\Json()
     */
    public function getTitle()
    {
    }

    /**
     * @Assert\Ip()
     */
    public function isTitle()
    {
    }

    /**
     * @param mixed $title
     * @return University
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return University
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return University
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     * @Assert\Country()
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return University
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }


}