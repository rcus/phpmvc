<<<<<<< HEAD:webroot/error.php
<?php 
/**
 * This is a Anax frontcontroller.
 *
 */
// Get environment & autoloader.
require __DIR__.'/config.php';

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDocumentation();
$app = new \Anax\Kernel\CAnax($di);

$app->theme->setVariable('style', "article {max-width: 650px;}");



// Home route
$app->router->add('', function () use ($app) {

    $app->theme->setTitle("HTTP errorcodes");

    $content = $app->documentation->get('http-error-codes.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

    $app->views->add('default/article', [
        'content' => $content,
    ]);

});



// Throw ForbiddenException to get a 403 page
$app->router->add('403', function () use ($app) {

    throw new \Anax\Exception\ForbiddenException("Here is the details, if any.");

});



// Throw NotFoundException to get a 404 page
$app->router->add('404', function () use ($app) {

    throw new \Anax\Exception\NotFoundException("Here is the details, if any.");

});



// Throw InternalServerErrorException to get a 500 page
$app->router->add('500', function () use ($app) {

    throw new \Anax\Exception\InternalServerErrorException("Here is the details, if any.");

});



// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();
=======
<?php 
/**
 * This is a Anax frontcontroller.
 *
 */
// Get environment & autoloader.
require __DIR__.'/../config.php';

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryTest();
$app = new \Anax\Kernel\CAnax($di);



// Home route
$app->router->add('', function () use ($app) {

    $app->theme->setTitle("Throw exceptions to generate HTTP error pages");
    $app->views->add('default/page', [
        'title' => "Throw exceptions to generate HTTP error pages",
        'content' => "Testcases for exception to generate HTTP error pages.",
        'links' => [
            [
                'href' => $app->url->create('403'),
                'text' => "\Anax\Exception\ForbiddenException() as 403",
            ],
            [
                'href' => $app->url->create('404'),
                'text' => "\Anax\Exception\NotFoundException() as 404",
            ],
            [
                'href' => $app->url->create('500'),
                'text' => "\Anax\Exception\InternalServerErrorException() as 500",
            ],
        ]
    ]);

});



// Throw ForbiddenException to get a 403 page
$app->router->add('403', function () use ($app) {

    throw new \Anax\Exception\ForbiddenException("Here is the details, if any.");

});



// Throw NotFoundException to get a 404 page
$app->router->add('404', function () use ($app) {

    throw new \Anax\Exception\NotFoundException("Here is the details, if any.");

});



// Throw InternalServerErrorException to get a 500 page
$app->router->add('500', function () use ($app) {

    throw new \Anax\Exception\InternalServerErrorException("Here is the details, if any.");

});



// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();

// Render the page
$app->theme->render();
>>>>>>> eabc4f016b370e1e73f609a4aa3cd14d2b056f6b:webroot/test/exception-as-http-error-page.php
