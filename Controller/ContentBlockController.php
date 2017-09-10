<?php

namespace BaseBundle\Controller;

use BaseBundle\Repository\ContentBlockRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * {@inheritDoc}
 */
class ContentBlockController extends Controller
{


    /**
     * @param $name
     * @param $vars
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function renderAction($name, $vars = [])
    {
        /** @var ContentBlockRepository $repository */
        $repository = $this->getRepository('BaseBundle:ContentBlock');
        $contentBlock = $repository->findOneByName($name);
        $vars['block'] = $contentBlock;
        return $this->render('@Base/ContentBlock/simple.html.twig', $vars);
    }

    /**
     * @param $name
     * @return EntityRepository
     */
    protected function getRepository($name)
    {
        return $this->getDoctrine()->getRepository($name);
    }

}
