<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('corps')
            ->add('publication')
            ->add('auteur', EntityType::class, [
                'class' => 'AppBundle:Auteur',
                'choice_label' => function($auteur) {
                    return $auteur->getPrenom() . ' ' . $auteur->getNom() . ' (coupe de cheveux: ' . $auteur->getCoupeDeCheveux() . ')';
                },
            ])
            ->add('tags', EntityType::class, [
                'class' => 'AppBundle:Tag',
                'choice_label' => 'nom',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_article';
    }


}
