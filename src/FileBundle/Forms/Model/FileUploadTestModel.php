<?php


namespace FileBundle\Forms\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class FileUploadTestModel {

  /**
   * @Assert\File(
   *   maxSize = "10M",
   *   mimeTypes = {"image/jpeg", "image/png", "image/gif"},
   *   mimeTypesMessage = "Please upload a valid Image"
   * )
   */
  private $file;

  public function setFile( UploadedFile $file ){
    $this->file= $file;
  }

  public function getFile(){
    return $this->file;
  }
}