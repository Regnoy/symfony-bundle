<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12/8/2017
 * Time: 10:34 AM
 */

namespace FormBundle\Forms\Models;


use FormBundle\Entity\FormProduct;

class TaskAgreeModel {

  public $product;

  public $agree;


  public function __construct(FormProduct $product) {
    $this->product = $product;
  }
}