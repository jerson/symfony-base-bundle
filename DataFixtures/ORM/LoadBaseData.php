<?php

namespace BaseBundle\DataFixtures\ORM;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\ORM\EntityRepository;
use Faker;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * {@inheritDoc}
 */
abstract class LoadBaseData implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
{
    /**
     * @var int
     */
    protected $batchSize = 500;

    /**
     * @var boolean
     */
    protected $useFakeData = true;
    /**
     * @var Faker\Generator
     */
    protected $faker;
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     *
     */
    function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @param $name
     * @return EntityRepository
     */
    protected function getRepository($name)
    {
        return $this->getDoctrine()->getRepository($name);
    }

    /**
     * @return Registry
     */
    protected function getDoctrine()
    {
        return $this->container->get('doctrine');
    }
}