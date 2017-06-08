<?php


namespace CoreBundle\Entity;



use Doctrine\ORM\EntityRepository;

class StateRepository extends EntityRepository {


  public function get($key){//user.2.recover_password
    return $this->find($key);
  }

  public function set( $key, $value = null, $expired = null ){
//    $key = [
//      "user",
//      2, //$user->getId()
//      "recover"
//    ];
    //"user.".$user->getId().".recover"
    if( is_array($key) ){
      $key = implode('.', $key);
    }
    $value = serialize($value);

    $state = new State();
    $state->setCollection($key)->setValue($value);
    if(!is_null($expired)){
      $state->setExpired($expired);
    }
    $this->_em->merge($state);
    $this->_em->flush($state);
  }
  public function remove($key){
    if( is_array($key) ){
      $key = implode('.', $key);
    }
    $this->_em->remove($key);
    $this->_em->flush();
  }
}

