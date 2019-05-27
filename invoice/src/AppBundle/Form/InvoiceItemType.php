<?php

namespace AppBundle\Form;

use AppBundle\Entity\InvoiceItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('quantity', 'text')
            ->add('unit', 'text')
            ->add('net_unit_price', 'text')
            ->add('net_price', 'text')
            ->add('vat', 'text')
            ->add('gross_price', 'text');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => InvoiceItem::class,
        ));
    }
}