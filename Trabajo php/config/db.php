<?php
require_once "../vendor/autoload.php";

use Doctrine\ORM\src\Tools\Setup;
use Doctrine\ORM\src\EntityManager;


$paths = ["src/Entities"];
$isDevMode = true;

$dbParams = [
    'driver' => 'pdo_mysql',
    'host' => '127.0.0.1',
    'dbname' => 'biblioteca',
    'user' => 'root',
    'password' => '',
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);