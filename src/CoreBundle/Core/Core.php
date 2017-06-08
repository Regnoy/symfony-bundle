<?php


namespace CoreBundle\Core;



class Core {
  
  private static $container;
  
  public static function setContainer( $container ){
    static::$container = $container;
  }
  
  /**
   * @param $service_name
   * @return mixed
   *
   */
  public static function service( $service_name ){
    return static::$container->get($service_name);
  }
  
  /**
   * @param $param
   * @return mixed
   *
   */

  public static function parameter($param){
    return static::$container->getParameter($param);
  }

  /**
   * @return EntityManager
   */
  public static function em(){
    return static::$container->get('doctrine.orm.entity_manager');
  }
  
  public static function repository( $repository_class ){
    return static::em()->getRepository($repository_class);
  }
  
}