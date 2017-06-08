<?php

namespace FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FileBundle\Forms\Model\FileUploadModel;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class File
 * @package FileBundle\Entity
 * @ORM\Table(name="file")
 * @ORM\Entity
 */
class File {

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="integer", name="uid")
   */
  private $user;
  /**
   * @ORM\Column(type="string")
   */
  private $filename;

  /**
   * @ORM\Column(type="string")
   */
  private $url;

  /**
   * @ORM\Column(type="integer")
   */
  private $fileSize;

  /**
   * @ORM\Column(type="string")
   */
  private $fileMime;

  /**
   * @ORM\Column(type="smallint")
   */
  private $status;

  /**
   * @ORM\Column(type="datetime")
   */
  private $created;


  private $fileUpload;

  /**
   * @return FileUploadModel
   */
  public function getFileUpload() {
    return $this->fileUpload;
  }

  /**
   * @param mixed $fileUpload
   */
  public function setFileUpload( FileUploadModel  $fileUpload) {
    $this->fileUpload = $fileUpload;
  }


  public function __construct() {
    $this->created = new \DateTime();
    $this->fileSize = 0;
    $this->status = 0;
  }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return File
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return File
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return File
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     *
     * @return File
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return integer
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set fileMime
     *
     * @param string $fileMime
     *
     * @return File
     */
    public function setFileMime($fileMime)
    {
        $this->fileMime = $fileMime;

        return $this;
    }

    /**
     * Get fileMime
     *
     * @return string
     */
    public function getFileMime()
    {
        return $this->fileMime;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return File
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return File
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
}
