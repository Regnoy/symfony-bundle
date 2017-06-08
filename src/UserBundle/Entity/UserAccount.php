<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class User
 * @package UserBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="user_account")
 */
class UserAccount {
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  
  /**
   * @ORM\OneToOne(targetEntity="User")
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
   */
  private $user;
  /**
   * @ORM\Column(type="string")
   */
  private $firstName;
  /**
   * @ORM\Column(type="string")
   */
  private $lastName;
  /**
   * @ORM\Column(type="datetime")
   */
  private $birthday;
  /**
   * @ORM\Column(type="string")
   */
  private $gender;
  
  
  private $entities;
  
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
   * Set firstName
   *
   * @param string $firstName
   *
   * @return UserAccount
   */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;
    
    return $this;
  }
  
  /**
   * Get firstName
   *
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
  }
  
  /**
   * Set lastName
   *
   * @param string $lastName
   *
   * @return UserAccount
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
    
    return $this;
  }
  
  /**
   * Get lastName
   *
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }
  
  /**
   * Set birthday
   *
   * @param \DateTime $birthday
   *
   * @return UserAccount
   */
  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
    
    return $this;
  }
  
  /**
   * Get birthday
   *
   * @return \DateTime
   */
  public function getBirthday()
  {
    return $this->birthday;
  }
  
  /**
   * Set gender
   *
   * @param string $gender
   *
   * @return UserAccount
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
    
    return $this;
  }
  
  /**
   * Get gender
   *
   * @return string
   */
  public function getGender()
  {
    return $this->gender;
  }
  
  /**
   * Set user
   *
   * @param \UserBundle\Entity\User $user
   *
   * @return UserAccount
   */
  public function setUser(\UserBundle\Entity\User $user = null)
  {
    $this->user = $user;
    
    return $this;
  }
  
  /**
   * Get user
   *
   * @return \UserBundle\Entity\User
   */
  public function getUser()
  {
    return $this->user;
  }
  
  
  public function setEntities( $entity , $machine_name){
    $this->entities[$machine_name] = $entity;
  }
  public function getEntities( $machine_name ){
    return isset( $this->entities[$machine_name] ) ? $this->entities[$machine_name] : NULL;
  }
}
