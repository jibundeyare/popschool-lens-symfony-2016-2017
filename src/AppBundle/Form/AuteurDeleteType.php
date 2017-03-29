<?php

namespace AppBundle\Form;

use AppBundle\Entity\Auteur;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurDeleteType extends AbstractDeleteType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Auteur::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_auteur_delete';
    }
}
