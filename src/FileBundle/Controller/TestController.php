<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12/5/2016
 * Time: 9:07 AM
 */

namespace FileBundle\Controller;




use CoreBundle\CoreBundle;
use Doctrine\ORM\EntityManager;
use FileBundle\Forms\Form\FileUploadTestForm;
use FileBundle\Forms\Model\FileUploadModel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller {

  public function testAction( Request $request ){
 
    $model = new FileUploadModel([], 'trash');
    $form = $this->createForm( FileUploadTestForm::class, $model );
    $form->handleRequest($request);
    if( $form->isSubmitted() && $form->isValid() ){
      $file = CoreBundle::service('file.manager')->prepareUploadFile($model);
	   // var_dump($file);
	    /**
	     * @var $em EntityManager;
	     */
	    $em = CoreBundle::service('doctrine.orm.entity_manager');
	    $em->persist($file);
	    $em->flush();
    }
    return $this->render("FileBundle:test:file.html.twig", [
      'form' => $form->createView()
    ]);
  }

}