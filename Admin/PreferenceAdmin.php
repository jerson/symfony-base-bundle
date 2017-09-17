<?php

namespace BaseBundle\Admin;

use BaseBundle\Form\Type\NameType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;


/**
 * {@inheritDoc}
 */
class PreferenceAdmin extends AbstractAdmin
{
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'name'
    ];

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            ['@Base/Form/fields.html.twig']
        );
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
            ->add('name', NameType::class, [
                'required' => false,
                'attr' => array(
                    'readonly' => true
                ),
            ])
            ->add('value', TextType::class, ['required' => false]);
    }

    /**
     * {@inheritDoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('value');
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
            ->add('value')
            ->add('_action', 'actions', [
                'actions' => [
                    'edit' => [],
                ]
            ]);;
    }
}