<?php

namespace BaseBundle\Repository;

use BaseBundle\Entity\ContentBlock;
use Doctrine\ORM\EntityRepository;

/**
 * ContentBlockRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContentBlockRepository extends EntityRepository
{
    /**
     * @param $name
     * @return ContentBlock|null
     */
    public function findOneByName($name)
    {
        return $this->getRepository('BaseBundle:ContentBlock')
            ->createQueryBuilder('o')
            ->where('o.enabled = true')
            ->andWhere('o.name = :name')
            ->setParameter('name', $name)
            ->setMaxResults(1)
            ->getQuery()
            ->setCacheable($this->isCacheEnabled())
            //->useResultCache($this->isCacheEnabled(), $this->getCacheLifetime(), 'content_block_' . $name)
            ->getOneOrNullResult();

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
