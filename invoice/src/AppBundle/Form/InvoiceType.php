<?php

namespace AppBundle\Form;

use AppBundle\Entity\Invoice;
use AppBundle\Entity\InvoiceItem;
use AppBundle\Form\InvoiceItemType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Enum\TermsPaymentEnum;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nr', 'text')
            ->add('id_buyer', 'entity', [
                'class' => 'AppBundle:Buyer',
                'choice_label' => 'name',
                'label' => 'Buyer'
            ])
            ->add('created_at', 'date')
            ->add('sale_date', 'date')
            ->add('payment_deadline', 'date')
            ->add('terms_payment', ChoiceType::class, [
                'choices' => TermsPaymentEnum::getAllTermsPayment()
            ])
            ->add('bank_account', 'text')
            ->add('items',
                CollectionType::class,
                ['entry_type' => InvoiceItemType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false

                ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success'],
                'label' => 'Add invoice']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Invoice::class,
        ));
    }
}