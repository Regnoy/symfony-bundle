<?php

namespace UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Forms\Models\RegisterUserModel;
use UserBundle\Forms\RegisterUserForm;


class SecurityController extends Controller  {

  public function loginAction(Request $request){
    $authenticationUtils = $this->get('security.authentication_utils');
    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('@User/security/login.html.twig', array(
      'last_username' => $lastUsername,
      'error'         => $error,
    ));
  }
  public function registerAction( Request $request ){
    $registerModel = new RegisterUserModel();
    $registerForm = $this->createForm(RegisterUserForm::class, $registerModel);
    $registerForm->handleRequest($request);
    if($registerForm->isSubmitted()){

      $user = $registerModel->getUserHandler();
      $em = $this->getDoctrine()->getManager();
      $em->persist($user);
      $em->flush();
      return $this->redirectToRoute('login');
    }
    return $this->render('@User/security/register.html.twig',[
      'register_form' => $registerForm->createView()
    ]);
  }
}