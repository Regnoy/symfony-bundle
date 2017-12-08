<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11/22/2017
 * Time: 8:48 AM
 */

namespace FormBundle\Controller;


use FormBundle\Entity\FormProduct;
use FormBundle\Forms\FormProductForm;
use FormBundle\Forms\Models\TaskAgreeModel;
use FormBundle\Forms\Models\TaskModel;
use FormBundle\Forms\ProductAgreeForm;
use FormBundle\Forms\TaskForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller {
  public function exampleAction($example, Request $request){
    switch ($example){
      case 'example_1':
        return $this->exampleTutorial($request);
        break;
    }
    $formProduct = new FormProduct();
    $form = $this->createForm( FormProductForm::class, $formProduct );

    $form->handleRequest($request);
    if($form->isSubmitted()){
      $em = $this->getDoctrine()->getManager();
      $em->persist($formProduct);
      $data = $form->getData();
      $form->getExtraData();
      var_dump($form->get('agree')->getData());
      var_dump($data);
      var_dump($formProduct);

      //$em->flush();
     // return $this->redirectToRoute('form_example');
    }
    return $this->render('FormBundle::form.html.twig', [
      'form' => $form->createView()
    ]);
  }
  public function exampleTutorial(Request $request){
    $formProduct = new FormProduct();
    $agreeProduct = new TaskAgreeModel($formProduct);
    $form = $this->createForm( ProductAgreeForm::class, $agreeProduct );
    $form->handleRequest($request);
    if($form->isSubmitted()){

    }
    return $this->render('FormBundle::example_1.html.twig', [
      'form' => $form->createView()
    ]);
  }
}