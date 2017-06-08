<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12/22/2016
 * Time: 8:52 AM
 */

namespace FileBundle\Events\EventSubscriber;


use CoreBundle\CoreBundle;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use FileBundle\Entity\File;

class FileUploadSubscriber implements EventSubscriber
{
	
	public function getSubscribedEvents()
	{
		return[
			'postPersist',
			'postUpdate'
		];
	}
	public function postUpdate(LifecycleEventArgs $args)
	{
		$this->index($args);
	}
	
	public function postPersist(LifecycleEventArgs $args)
	{
		$this->index($args);
	}
	
	public function index(LifecycleEventArgs $args)
	{
		$entity = $args->getObject();
		if ($entity instanceof File) {
			$fileUploadModel = $entity->getFileUpload();
			$file = $fileUploadModel->getFile();
			$fileManager = CoreBundle::service('file.manager');
			$folderUploadDir = $fileManager->uploadFolderDir($fileUploadModel->getFolder());
			$file->move($folderUploadDir, $entity->getFilename());
		}
	}
}