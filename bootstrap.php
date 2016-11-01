<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once("vendor/autoload.php");

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/dao"), false); //true because dev mode

$conn= array(
	'driver' => 'pdo_mysql',
	'user' => 'root',
	'password'=> '9cnHadtZTjoGtzUPY8ge',
	'dbname' => 'budgeteer'
);

$entityManager = EntityManager::create($conn, $config);