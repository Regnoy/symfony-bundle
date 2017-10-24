<?php


namespace UserBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\Role;

class RoleLoad implements FixtureInterface {
  
  public function load(ObjectManager $manager) {
    $roleRepo = $manager->getRepository(Role::class);
    $role = $roleRepo->findByRole('USER_ROLE');
    if(!$role){
      $role = new Role();
      $role->setName("USER ROLE");
      $role->setRole("USER_ROLE");
      $manager->persist($role);
      $manager->flush();
    }
  }
  public function getOrder(){
    return 1;
  }
}