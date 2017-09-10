<?php

namespace BaseBundle\DataFixtures\ORM;


use BaseBundle\Entity\Preference;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * {@inheritDoc}
 */
class LoadPreferenceData extends LoadBaseData
{

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < rand(10, 20); $i++) {
            $option = new Preference();
            $option->setName(sprintf('option%s', $i));
            $option->setValue(sprintf('value%s', $i));
            $manager->persist($option);
        }

        $manager->flush();
        $manager->clear();
    }

}