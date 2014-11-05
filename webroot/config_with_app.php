<?php
/**
 * Config file for pagecontrollers, creating an instance of $app.
 *
 */

// Get environment & autoloader.
require __DIR__.'/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();

// Include support for forms
//$di->set('form', '\Mos\HTMLForm\CForm');

// Include controllers for comments
$di->setShared('CommentsController', function() use ($di) {
    $controller = new \Anax\Comments\CCommentsController();
    $controller->setDI($di);
    return $controller;
});

// Include controllers for users
$di->setShared('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

// Include support for database
$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/database_sqlite.php');
    $db->connect();
    return $db;
});

$app = new \Anax\Kernel\CAnax($di);
