<?php


namespace CoreBundle;


use CoreBundle\Core\Core;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CoreBundle extends Bundle {

  private static $handleContainer;

  public function setContainer(ContainerInterface $container = null)
  {
    parent::setContainer($container);
    Core::setContainer($container);
    static::$handleContainer = $container;
  }

  /**
   * @return ContainerInterface
   * @deprecated
   */
  public static function getContainer()
  {
    return static::$handleContainer;
  }
  
  /**
   * @param $service_name
   * @return mixed
   * @deprecated
   */
  public static function service( $service_name ){
    return static::$handleContainer->get($service_name);
  }
  
  /**
   * @param $param
   * @return mixed
   * @deprecated
   */
  public static function parameter($param){
    return static::getContainer()->getParameter($param);
  }

}