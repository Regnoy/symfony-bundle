<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12/5/2016
 * Time: 9:12 AM
 */

namespace FileBundle\Forms\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileUploadTestForm extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('file', FileType::class, array('label' => 'Upload File'));
    $builder->add('submit', SubmitType::class);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'FileBundle\Forms\Model\FileUploadModel',
    ));
  }

}