<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                null,
                [
                    'required' => true,
                    'attr' =>
                        ['maxlength' => 8]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}