<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label'=>'votre nom',
                'label_attr' => array(
                        'class' => 'col-3 col-form-label',
                        'id' => 'name',
                        'for' =>'name'),
                'attr' => array(
                    'class' => 'form-control col-7'),
                
            ))
            ->add('firstName', TextType::class, array(
                'label'=>'votre prénom', 
                    'label_attr' => array(
                        'class' => 'col-3 col-form-label',
                        'id' => 'firstName',
                        'for' =>'firstName'),
                'attr' => array(
                    'class' => 'form-control col-7'),
            ))
            ->add('birthday', BirthdayType::class , array(
                'widget' => 'choice',
                'label' => 'date de naissance',
                'label_attr' => array('class' => 'col-3 col-form-label',
                    'id' => 'birthday',
                    'for' => 'birthday'),
                
            ))
            ->add('reduction', CheckboxType::class,array(
                'label' => 'tarif réduit', 
                'label_attr' => array(
                    'class' => 'col-3 col-form-label',
                    'id' => 'reduction',
                    'for' => 'reduction'),
                'attr' => array(
                    'class' => 'form-control col-7 mb-3 mt-3'),
                'required' => false,
                ))
            ->add('country', CountryType::class, array(
                'placeholder' => 'selectionner votre nationalité',
                'label' => false,
                'attr' => array('class' => 'form-control col-10')
                
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
