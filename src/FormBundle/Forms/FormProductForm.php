<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12/1/2017
 * Time: 11:17 AM
 */

namespace FormBundle\Forms;


use FormBundle\Entity\FormProduct;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormProductForm extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('title');
    $builder->add('description');
    $builder->add('price');
    $builder->add('submit', SubmitType::class, [
      'label' => 'Add'
    ]);
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => FormProduct::class
    ]);
  }
}