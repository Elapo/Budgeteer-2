<?php

/**
 * Created by PhpStorm.
 * User: Frederik
 * Date: 31/10/2016
 * Time: 17:40
 */

require_once "../vendor/autoload.php";
require_once "../bootstrap.php";
require_once "../dao/User.php";

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testUserIsPersisted(){
        global $entityManager;
        $user = new User("Frederik", "Van Hebruggen", "email", "abc");
        $entityManager->persist($user);
        $entityManager->flush();

        $this->assertNotNull($entityManager->find('User', $user->getId()));
    }
}
