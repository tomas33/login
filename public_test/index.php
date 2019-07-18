<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;
session_start();
require '../../vendor/autoload.php';
$settings =     require __DIR__.'/../../src/settings.php';
$app = new \Slim\App($settings);
// Set up dependencies
 $dependencies = require __DIR__ . '/../src/dependencies.php';
 $dependencies($app);


$config['db']['host']   = 'localhost';
$config['db']['user']   = 'root';
$config['db']['pass']   = '';
$config['db']['dbname'] = 'login';


$container = $app->getContainer();

/*$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};*/

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
    $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$app->get('/hola/{name}', function (Request $request, Response $response, array $args) use($container) {
    $name = $args['name'];
    var_dump($container);
   $container->get('logger')->addInfo('desde index test prueva2');
    $response->getBody()->write("hola, $name");
    
   
    return $response;
});

$app->get('/ticket/{id}', function (Request $request, Response $response, $args) {
    $ticket_id = (int)$args['id'];
    $mapper = new TicketMapper($this->db);
    $ticket = $mapper->getTicketById($ticket_id);

    $response->getBody()->write(var_export($ticket, true));
    return $response;
});
$app->get('/login', function (Request $request, Response $response ,$args) {
    $username ='tomas';
    $query = $this->db->prepare('SELECT password, username, memberID,rol FROM members WHERE username = :username AND active="Yes" ');
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    //$this->login;
    $query->execute();
    $datos = $query->fetchAll(pdo::FETCH_ASSOC);
    var_dump($datos);
    //var_dump($this->login);
    foreach ($datos as $row) {
        print $row['username'] . "\t";
        
   }
  //$app->render();
       return $response;
});
$app->run();