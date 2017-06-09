<?php

namespace AppBundle\Controller;

use CoreBundle\Core\Core;
use CoreBundle\CoreBundle;
use CoreBundle\Entity\State;
use FileBundle\Core\FileManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
  /**
   * @Route("/", name="homepage")
   */
  public function indexAction(Request $request)
  {

    $em = Core::em();
    $stateRepo = $em->getRepository(State::class);

    $key = ['user', 1, 'token'];
    $key2 = ['user', 3, 'token123'];
    $states = $stateRepo->getMultiple([$key, $key2]);
    var_dump($states);
    $states = $stateRepo->getMultiple([$key, $key2]);
    var_dump($states);
//    $value = $stateRepo->get($key);
//    $value2 = $stateRepo->get($key2);
//
//    $value = $stateRepo->get($key);
//    $value2 = $stateRepo->get($key2);

//    $value = ['token' => '3749823u4892f4982fj'];
//    $stateRepo->set($key, $value);
//
//
//    $key = ['user', 3, 'token123'];
//    $value = ['token' => '12312312312'];
//    $stateRepo->set($key, $value);

    return $this->render('default/index.html.twig', [
      'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
    ]);
  }
}
