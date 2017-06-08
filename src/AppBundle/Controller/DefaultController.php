<?php

namespace AppBundle\Controller;

use CoreBundle\CoreBundle;
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
        //Folder > /files
        //file.txt
        // /files/file.txt
        // /files/file2.txt
        // /files/file3.txt

        // public://file.txt = public:// == /files/
        // public://file2.txt
        // public://file3.txt

        //C:\wamp\www\symfony3.dev\www\app/../web/files/file.txt
        var_dump(FileManager::UploadFolderDir('trash'));
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
