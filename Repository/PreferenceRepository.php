<?php

namespace BaseBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * PreferenceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PreferenceRepository extends EntityRepository
{

    /**
     * @return Query
     */
    public function queryAll()
    {
        return $this->getRepository('BaseBundle:Preference')
            ->createQueryBuilder('p')
            ->getQuery()
            ->setCacheable($this->isCacheEnabled());
        //->useResultCache($this->isCacheEnabled(), $this->getCacheLifetime(), 'preferences');
    }

    /**
     * @param $name
     * @return EntityRepository
     */
    protected function getRepository($name)
    {
        return $this->getEntityManager()->getRepository($name);
    }

    /**
     * @return bool
     */
    protected function isCacheEnabled()
    {
        if (class_exists('\Constants')) {
            return \Constants::$USE_DATABASE_CACHE;
        }
        return false;
    }

    /**
     * @return bool
     */
    protected function getCacheLifetime()
    {
        if (class_exists('\Constants')) {
            return \Constants::$DATABASE_CACHE_LIFETIME;
        }
        return 1;
    }

}
