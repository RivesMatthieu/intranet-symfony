<?php

namespace App\Form;

use App\Entity\Clients;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Site')
            ->add('Actif', ChoiceType::class, [
                'choices' => $this->getChoices(Clients::ACTIF)
            ])
            ->add('Url')
            ->add('Societe')
            ->add('Contact')
            ->add('Role')
            ->add('Email')
            ->add('Telephone')
            ->add('Uniweb', ChoiceType::class, [
                'choices' => $this->getChoices(Clients::UNIWEB)
            ])
            ->add('TMA', ChoiceType::class, [
                'choices' => $this->getChoices(Clients::TMA)
            ])
            ->add('Seo', ChoiceType::class, [
                'choices' => $this->getChoices(Clients::SEO)
            ])
            ->add('Sea', ChoiceType::class, [
                'choices' => $this->getChoices(Clients::SEA)
            ])
            ->add('Cms')
            ->add('AdminUrl')
            ->add('AdminAcces')
            ->add('Hack', ChoiceType::class, [
                'choices' => $this->getChoices(Clients::HACK)
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
            'translation_domain' => 'forms'
        ]);
    }

    private function getChoices($e)
    {
        $choices = $e;
        $output = [];
        foreach($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
