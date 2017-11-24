<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11/22/2017
 * Time: 8:48 AM
 */

namespace FormBundle\Controller;


use FormBundle\Forms\TaskForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller {

  public function exampleAction($example, Request $request){
    $taskForm = $this->createForm( TaskForm::class );
    $taskForm->handleRequest($request);
    if($taskForm->isSubmitted()){
      $data = $taskForm->getData();
      var_dump($data);
    }
    return $this->render('FormBundle::form.html.twig', [
      'form' => $taskForm->createView()
    ]);
  }
}