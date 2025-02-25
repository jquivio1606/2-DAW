<?php
require_once "./vendor/autoload.php";

use Doctrine\ORM\SRC\Tools\Setup;
use Doctrine\ORM\SRC\EntityManager;


$paths = array("./src");
$isDevMode = true;

$dbParams = [
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'dbname' => 'biblioteca',
    'user' => 'root',
    'password' => '',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);