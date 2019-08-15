<?php


use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Doctrine\ORM\Tools\Setup;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Slim\App;
use Slim\Container;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Twig\Extension\DebugExtension;

return function (App $app) {
    $container = $app->getContainer();

    // monolog
    $container[logger::class] = function ($c) {
        $settings = $c->get('settings')['logger'];

        $logger = new Logger($settings['name']);
        $logger->pushProcessor(new UidProcessor());
        $logger->pushHandler(new StreamHandler($settings['path'], $settings['level']));

        return $logger;
    };

    // Registrar componente al contenedor
    $container[Twig::class] = function ($c) {
        $settings = $c->get('settings')['twig'];
        $view = new Twig(
            [$settings['template_path']],
            ['cache' => $settings['cache_path']]
        );

        // Add extensions
        $view->addExtension(new TwigExtension($c->get('router'), $c->get('request')->getUri()));
        $view->addExtension(new DebugExtension());

        return $view;
    };

    $container[EntityManager::class] = function (Container $c): EntityManager {
        $config = Setup::createXMLMetadataConfiguration(
            $c['settings']['doctrine']['metadata_dirs'],
            $c['settings']['doctrine']['dev_mode']
        );

        $namespaces = array(
            __DIR__.'/../src/Domain/Mapping' => 'App\Domain',
        );

        $driver = new SimplifiedXmlDriver($namespaces);

        $config->setMetadataDriverImpl($driver);

        $config->setMetadataCacheImpl(
            new FilesystemCache(
                $c['settings']['doctrine']['cache_dir']
            )
        );

        return EntityManager::create(
            $c['settings']['doctrine']['connection'],
            $config
        );
    };

    return $container;
};
