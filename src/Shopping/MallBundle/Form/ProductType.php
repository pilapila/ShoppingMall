<?php

namespace Shopping\MallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productname')
            ->add('productpic')
            ->add('productprice')
            ->add('productdate', 'date', array(
                'years' => range(date('Y'), date('Y', strtotime('-50 years'))),
                'required' => TRUE,
            ))
            ->add('productcomment')
            ->add('tags', 'entity', array(
                'required' => TRUE,
                'class' => 'ShoppingMallBundle:Tag',
                //'multiple'    => true,
            ))
            ->add('category', 'entity', array(
                'required' => TRUE,
                'class' => 'ShoppingMallBundle:Category',
                //'multiple'    => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Shopping\MallBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'shopping_mallbundle_product';
    }
}
