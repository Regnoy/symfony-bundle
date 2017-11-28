<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11/24/2017
 * Time: 9:29 AM
 */

namespace FormBundle\Forms;


use FormBundle\Forms\Models\TaskModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskForm extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('task', TextType::class, [
      'label' => 'Task',
      'label_attr' => [
        'class' => 'label',
        'data-class' => 'data-class'
      ],
      'attr' => [
        'placeholder' => 'Task'
      ]
    ]);
    $builder->add('description', TextareaType::class,[
      'label' => 'Description',
      'attr' => [
        'placeholder' => 'Task'
      ]
    ]);
    $builder->add('submit', SubmitType::class,[
      'label' => 'Add'
    ]);
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
      'data_class' => TaskModel::class
    ]);
  }
}