<?php

namespace BaseBundle\DataFixtures\ORM;


use BaseBundle\Entity\ContentBlock;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * {@inheritDoc}
 */
class LoadContentBlockData extends LoadBaseData
{

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 3; $i++) {
            $option = new ContentBlock();
            $option->setName(sprintf('block%s', $i));
            $option->setVariables([]);
            $option->setHtml($this->faker->text(500));
            $option->setEnabled($this->faker->randomElement([false, true]));
            $manager->persist($option);
        }

        $manager->flush();
        $manager->clear();
    }

}