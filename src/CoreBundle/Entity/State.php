<?php


namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class State
 * @package CoreBundle\Entity
 * @ORM\Entity(repositoryClass="StateRepository")
 * @ORM\Table(name="state")
 */
class State {

  /**
   * @ORM\Column(type="string", unique=true)
   * @ORM\Id
   */
  private $collection;

  /**
   * @ORM\Column(type="blob")
   */
  private $value;

  /**
   * @ORM\Column(type="string")
   */
  private $expired;


  public function __construct() {
    $date = new \DateTime();
    $this->expired = $date->getTimestamp() + (60*60*24);
  }

  /**
   * Set collection
   *
   * @param string $collection
   *
   * @return State
   */
  public function setCollection($collection)
  {
    $this->collection = $collection;

    return $this;
  }

  /**
   * Get collection
   *
   * @return string
   */
  public function getCollection()
  {
    return $this->collection;
  }

  /**
   * Set value
   *
   * @param string $value
   *
   * @return State
   */
  public function setValue($value)
  {
    $this->value = $value;

    return $this;
  }

  /**
   * Get value
   *
   * @return string
   */
  public function getValue()
  {
    $stream = stream_get_contents($this->value);
    return unserialize($stream);
  }

  /**
   * Set expired
   *
   * @param String $expired
   *
   * @return State
   */
  public function setExpired($expired)
  {
    $this->expired = $expired;

    return $this;
  }

  /**
   * Get expired
   *
   * @return String
   */
  public function getExpired()
  {
    return $this->expired;
  }
}
