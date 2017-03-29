<?php

namespace AppBundle\Form;

use AppBundle\Entity\Tag;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagDeleteType extends AbstractDeleteType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Tag::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tag_delete';
    }
}
