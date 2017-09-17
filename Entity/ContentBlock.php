<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentBlock
 *
 * @ORM\Table(name="content_block")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="BaseBundle\Repository\ContentBlockRepository")
 * @ORM\Cache(usage="NONSTRICT_READ_WRITE", region="default_region")
 */
class ContentBlock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="html", nullable=true, type="text")
     */
    private $html;

    /**
     * @var array
     *
     * @ORM\Column(name="variables", nullable=true, type="simple_array")
     */
    private $variables;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     *
     */
    function __construct()
    {
        $this->name = '';
    }


    /**
     * @return string
     */
    function __toString()
    {
        return empty($this->name) ? '' : $this->name;
    }


    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     * @return ContentBlock
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ContentBlock
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get html
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Set html
     *
     * @param string $html
     * @return ContentBlock
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get variables
     *
     * @return array
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * Set variables
     *
     * @param array $variables
     *
     * @return ContentBlock
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;

        return $this;
    }
}
