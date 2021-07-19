<?php

use app\controllers\UsersController;
use app\models\UserModel;
use components\DB;
use components\db\Connect as DbConnect;
use components\routing\Connect as RoutingConnect;
use components\db\Select;

require_once __DIR__ . '/Autoloader.php';

//$appLoader = new Autoloader(__DIR__ . '/app');
$globalLoader = new Autoloader(__DIR__);

//spl_autoload_register([$appLoader, 'load']);
spl_autoload_register([$globalLoader, 'load']);

$usersController = new UsersController();
$dbConnect = new DbConnect();
$routingConnect = new RoutingConnect();
$select = new Select();
$userModel = new UserModel();
$db = new DB();
var_dump($usersController, $dbConnect, $routingConnect, $select, $userModel, $db);

$usersController->testTraits();
