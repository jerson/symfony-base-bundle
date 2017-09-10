<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Preference
 *
 * @ORM\Table(name="preference", uniqueConstraints={@ORM\UniqueConstraint(name="key_UNIQUE", columns={"name"})})
 * @ORM\Entity
 * @UniqueEntity(fields={"name"})
 * @ORM\Entity(repositoryClass="BaseBundle\Repository\PreferenceRepository")
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE", region="default_region")
 */
class Preference
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=191, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @return string
     */
    function __toString()
    {
        return empty($this->name) ? '' : $this->name;
    }


    /**
     * @return array
     */
    public function getApi()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'value' => $this->getValue(),
        ];
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set key
     *
     * @param string $name
     *
     * @return Preference
     */
    public function setName($name)
    {
        $this->name = $name;

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

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Preference
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
