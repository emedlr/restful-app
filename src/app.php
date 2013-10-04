<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Controller\MainController;

$app = new Silex\Application();

/* Registers */
$app->register(new TranslationServiceProvider(), array(
    'locale' => '[Your_locale]',
    'translation.class_path' =>  __DIR__ . '/../vendor/symfony/src',
    'translator.messages' => array()
));
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/templates',
    'twig.class_path' => __DIR__.'/../vendor/twig/twig/lib',
    'twig.options' => array('cache' => __DIR__.'/../cache'),
));
$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'    => 'pdo_mysql',
        'host'      => '',
        'dbname'    => '',
        'user'      => '',
        'password'  => '',
        'charset'   => 'utf8',
    ),
));

$app['debug'] = true;


/*
 * RESTFul API
 */

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

$app->get('/test', function () use($app) {
    return $app['twig']->render('index.html.twig');
});

$app->post('/api/comments', function (Request $request) use ($app) {
    $data = array(
        'comment'   => $request->request->get('comment'),
        'username'  => $request->request->get('username'),
        'thumbnail' => $request->request->get('thumbnail')
    );
    /* Return id and datetime */
    $controller = new MainController($app, $request);
    $data = $controller->saveAction($data);

    return $app->json($data, 201);
});
$app->get('/api/comments', function (Request $request) use ($app) {
    $controller = new MainController($app, $request);
    $data = $controller->fetchAction();
    return $app->json($data, 201);
});

$app->run();