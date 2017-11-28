<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11/22/2017
 * Time: 8:48 AM
 */

namespace FormBundle\Controller;


use FormBundle\Forms\Models\TaskModel;
use FormBundle\Forms\TaskForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller {

  public function exampleAction($example, Request $request){
    $taskModel = new TaskModel();
    $taskForm = $this->createForm( TaskForm::class, $taskModel );
    $taskForm->handleRequest($request);
    if($taskForm->isSubmitted()){

      var_dump($taskModel->getTask());
      //save
      return $this->redirectToRoute('form_example');
    }
    return $this->render('FormBundle::form.html.twig', [
      'form' => $taskForm->createView()
    ]);
  }
}