<?php

namespace BaseBundle\Controller;

use BaseBundle\Entity\ContentBlock;
use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Controller\CRUDController;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ContentBlockAdminController extends CRUDController
{

    /**
     * @param ProxyQueryInterface $selectedModelQuery
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function batchActionEnable(ProxyQueryInterface $selectedModelQuery, Request $request = null)
    {

        $modelManager = $this->admin->getModelManager();

        set_time_limit(0);

        /** @var ContentBlock[] $selectedModels */
        $selectedModels = $selectedModelQuery->execute();

        try {

            $manager = $this->getManager();
            foreach ($selectedModels as $selectedModel) {
                $selectedModel->setEnabled(true);
                $manager->persist($selectedModel);
            }
            $manager->flush();

        } catch (\Exception $e) {
            $this->addFlash('sonata_flash_error', $this->trans('Failed to enable'));

            return new RedirectResponse(
                $this->admin->generateUrl('list', ['filter' => $this->admin->getFilterParameters()])
            );
        }

        $this->addFlash('sonata_flash_success', $this->trans('Enabled correctly'));

        return new RedirectResponse(
            $this->admin->generateUrl('list', ['filter' => $this->admin->getFilterParameters()])
        );
    }

    /**
     * @return EntityManager
     */
    protected function getManager()
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @param ProxyQueryInterface $selectedModelQuery
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function batchActionDisable(ProxyQueryInterface $selectedModelQuery, Request $request = null)
    {

        $modelManager = $this->admin->getModelManager();
        set_time_limit(0);

        /** @var ContentBlock[] $selectedModels */
        $selectedModels = $selectedModelQuery->execute();

        try {

            $manager = $this->getManager();
            foreach ($selectedModels as $selectedModel) {
                $selectedModel->setEnabled(false);
                $manager->persist($selectedModel);
            }
            $manager->flush();

        } catch (\Exception $e) {
            $this->addFlash('sonata_flash_error', $this->trans('Failed to disable'));

            return new RedirectResponse(
                $this->admin->generateUrl('list', ['filter' => $this->admin->getFilterParameters()])
            );
        }

        $this->addFlash('sonata_flash_success', $this->trans('Disabled correctly'));

        return new RedirectResponse(
            $this->admin->generateUrl('list', ['filter' => $this->admin->getFilterParameters()])
        );
    }

}