<?php

namespace FileBundle\Core;

use CoreBundle\CoreBundle;
use FileBundle\Entity\File;
use FileBundle\Forms\Model\FileUploadModel;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManager {
	
	public static $fileSystem = null;
	
	public static function rootDir(){
		return CoreBundle::parameter('kernel.root_dir').'/../web';
	}
	
	public static function uploadFolderDir( $folder = null){
		$rootDir = static::rootDir();
		$fileDir = $rootDir.'/files';
		if(!is_dir($fileDir)){
			CoreBundle::service('filesystem')->mkdir($fileDir, 755);
		}
		if( $folder ){
			$fileDir = $fileDir.'/'.$folder;
			CoreBundle::service('filesystem')->mkdir($fileDir, 755);
		}
		return $fileDir;
	}
	
	
	
	/**
	 * @param $url
	 * @return mixed
	 */
	public static function webDir( $url ){
		$url = str_replace('public://', '/files/', $url);
		return $url;
	}
	
	public function prepareUploadFile( FileUploadModel $file_upload_model ){
		$uploadedFile = $file_upload_model->getFile();
		$fileName = md5(uniqid()).'.'.$uploadedFile->guessExtension();
		$file = new File();
		$file->setFilename($fileName)->setFileSize( $uploadedFile->getSize());
		$webFolder = 'public://'.$file_upload_model->getFolder().'/'.$fileName;
		$file->setUser(0)->setUrl($webFolder);
		$file->setFileMime($uploadedFile->getMimeType());
		$file->setStatus(1)->setFileUpload($file_upload_model);
		return $file;
	}
	
	
}