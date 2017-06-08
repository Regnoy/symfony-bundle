<?php


namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class State
 * @package CoreBundle\Entity
 * @ORM\Entity
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
   * @ORM\Column(type="datetime")
   */
  private $expired;


  public function __construct() {

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
    $stream = stream_get_contents($this->getValue());
    return unserialize($stream);
  }

  /**
   * Set expired
   *
   * @param \DateTime $expired
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
   * @return \DateTime
   */
  public function getExpired()
  {
    return $this->expired;
  }
}
