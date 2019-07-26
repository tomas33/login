<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\HelloWorldController;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message

        $container->get('logger')->addInfo('desde slim.es');
        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
    $app->get('/login', function (Request $request, Response $response) use ($container){
        $username = 'tomas';
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
    $app->get('/hello', HelloWorldController::class);
};
