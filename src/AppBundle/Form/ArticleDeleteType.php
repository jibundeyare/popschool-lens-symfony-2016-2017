<?php

namespace AppBundle\Form;

use AppBundle\Entity\Article;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleDeleteType extends AbstractDeleteType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Article::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_article_delete';
    }
}
