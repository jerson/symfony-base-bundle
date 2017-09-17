<?php
namespace BaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class NameType extends AbstractType
{

    public function getParent()
    {
        return TextType::class;
    }

    public function getName()
    {
        return 'name';
    }


}