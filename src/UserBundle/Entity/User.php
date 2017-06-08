<?php


namespace UserBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package UserBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements \Serializable ,UserInterface {
  
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  
  /**
   * @ORM\Column(type="string", unique=true)
   */
  private $username;
  
  /**
   * @ORM\Column(type="string", unique=true)
   */
  private $email;
  
  /**
   * @ORM\Column(type="string", length=40)
   */
  private $password;
  /**
   * @ORM\Column(type="string")
   */
  private $salt;
  
  /**
   * @ORM\Column(type="datetime")
   */
  private $created;
  /**
   * @ORM\Column(type="datetime")
   */
  private $updated;
  /**
   * @ORM\Column(type="smallint")
   */
  private $status;
  
  /**
   * @var \Doctrine\Common\Collections\ArrayCollection
   * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
   * @ORM\JoinTable(name="users_roles")
   */
  private $roles;
  
  public function __construct() {
    $this->roles = new ArrayCollection();
    $this->salt = md5( uniqid(null, TRUE) );
    $this->username = md5( uniqid(null, TRUE) );
    $this->created = new \DateTime();
    $this->updated = new \DateTime();
    $this->status = 1;
  }
  
  
  public function serialize() {
   return serialize([$this->id]);
  }
  public function unserialize($serialized) {
    list($this->id) = $this->unserialize($serialized);
  }
  public function getRoles() {
    return $this->roles->toArray();
  }
  public function getPassword() {
    return $this->password;
  }
  public function getSalt() {
    return $this->salt;
  }
  public function getUsername() {
    return $this->username;
  }
  public function eraseCredentials() {
    // TODO: Implement eraseCredentials() method.
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
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return User
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

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return User
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
     * Add role
     *
     * @param \UserBundle\Entity\Role $role
     *
     * @return User
     */
    public function addRole(\UserBundle\Entity\Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \UserBundle\Entity\Role $role
     */
    public function removeRole(\UserBundle\Entity\Role $role)
    {
        $this->roles->removeElement($role);
    }
}
