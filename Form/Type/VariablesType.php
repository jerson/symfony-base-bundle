<?php

namespace BaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class VariablesType extends AbstractType
{

    public function getParent()
    {
        return CollectionType::class;
    }

    public function getName()
    {
        return 'variables';
    }


}