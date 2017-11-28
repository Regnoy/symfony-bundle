<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11/28/2017
 * Time: 9:11 AM
 */

namespace FormBundle\Forms\Models;


class TaskModel {

  private $task;

  private $description;

  /**
   * @return mixed
   */
  public function getTask() {
    return $this->task;
  }

  /**
   * @param mixed $task
   */
  public function setTask($task) {
    $this->task = trim($task);
  }

  /**
   * @return mixed
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * @param mixed $description
   */
  public function setDescription($description) {
    $this->description = $description;
  }

}