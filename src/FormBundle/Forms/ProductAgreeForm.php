<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12/8/2017
 * Time: 10:35 AM
 */

namespace FormBundle\Forms;


use FormBundle\Forms\Models\TaskAgreeModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductAgreeForm extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('product', FormProductType::class, [
      'label_attr' => [
        'class' => 'hide-elem'
      ]
    ]);
    $builder->add('agree', CheckboxType::class);
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => TaskAgreeModel::class
    ]);
  }
}