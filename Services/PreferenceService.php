<?php

namespace BaseBundle\Services;


use BaseBundle\Entity\Preference;
use BaseBundle\Repository\PreferenceRepository;
use Doctrine\ORM\EntityManager;

class PreferenceService
{

    protected $em;
    protected $globals;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $name
     * @param string $default
     * @return string
     */
    public function get($name, $default = '')
    {
        $this->checkIsEmpty();
        return isset($this->globals[$name]) ? $this->globals[$name] : $default;
    }

    /**
     *
     */
    private function checkIsEmpty()
    {
        if (empty($this->globals)) {
            $this->globals = $this->getGlobals();
        }
    }

    private function getGlobals()
    {

        $globals = [];

        try {
            /** @var PreferenceRepository $repository */
            $repository = $this->em->getRepository('BaseBundle:Preference');


            /** @var Preference[] $preferences */
            $preferences = $repository->queryAll()
                ->execute();
            foreach ($preferences as $preference) {
                $globals[$preference->getName()] = $preference->getValue();
            }
        } catch (\Exception $e) {
            return [];
        }


        return $globals;
    }

    /**
     * @param $name
     * @param boolean $default
     * @return boolean
     */
    public function getBoolean($name, $default = false)
    {
        $this->checkIsEmpty();
        return (bool)(isset($this->globals[$name]) ? $this->globals[$name] : $default);
    }

}