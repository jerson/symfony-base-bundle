<?php

namespace BaseBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * {@inheritDoc}
 */
class ContentBlockAdmin extends AbstractAdmin
{
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'name'
    ];

    /**
     * @param array $actions
     * @return array
     */
    public function configureBatchActions($actions)
    {

        $actions['disable'] = [
            'ask_confirmation' => true
        ];
        $actions['enable'] = [
            'ask_confirmation' => true
        ];


        return $actions;
    }


    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }

    /**
     * {@inheritDoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('enabled', CheckboxType::class, ['required' => false])
            ->add('html', TextareaType::class, ['required' => false]);
    }

    // Fields to be shown on filter forms

    /**
     * {@inheritDoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('enabled')
            ->add('html');
    }

    // Fields to be shown on lists

    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', 'trans', [
                'catalogue' => 'messages'
            ])
            ->add('enabled')
            ->add('vars', 'array')
            ->add('_action', 'actions', [
                'actions' => [
                    'edit' => [],
                    'show' => [],
                ]
            ]);
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name', 'trans', [
                'catalogue' => 'messages'
            ])
            ->add('enabled')
            ->add('html')
            ->add('vars', 'array');
    }
}