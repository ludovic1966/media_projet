<?php

namespace MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AlbumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titreAlbum', ChoiceType::class, array(
                'choices'  => array(
                    ' ' => false,
                    'Hiphop' => true,
                    'Soul' => true,
                    'Rock' => true,
                ),
                // *this line is important*
                'choices_as_values' => true,
                ))
                ->add('artiste')
                ->add('genre')
                ->add('support')
                ->add('support', ChoiceType::class, array(
                'choices'  => array(
                    ' ' => false,
                    'Vinyl' => true,
                    'CD' => true,
                    'Cassette' => true,
                ),
                // *this line is important*
                'choices_as_values' => true,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MediaBundle\Entity\Album'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mediabundle_album';
    }


}
