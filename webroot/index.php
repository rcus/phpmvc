<?php
require __DIR__.'/config_with_app.php';

$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');

$app->router->add('', function() use ($app) {
    $app->theme->setTitle("Välkommen");
    $content = $app->textFilter->doFilter($app->fileContent->get('me.md'), 'shortcode, markdown');
    $byline  = $app->textFilter->doFilter($app->fileContent->get('by_marcus.md'), 'shortcode, markdown');
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline
    ]);
});

for($i = 1; $i <= 7; $i++) {
    $kmom = "kmom0" . $i;
    $app->router->add($kmom, function() use ($app, $kmom) {
        $app->theme->setTitle(ucfirst($kmom));
        $content = $app->textFilter->doFilter($app->fileContent->get($kmom.'.md'), 'shortcode, markdown');
        $byline  = $app->textFilter->doFilter($app->fileContent->get('by_marcus.md'), 'shortcode, markdown');
        $app->views->add('me/page', [
            'content' => $content,
            'byline' => $byline,
        ]);

        $app->dispatcher->forward([
            'controller' => 'comment',
            'action'     => 'view',
            'params'     => [$kmom]
        ]);

        $app->views->add('comment/form', [
            'mail'      => null,
            'web'       => null,
            'name'      => null,
            'content'   => null,
            'output'    => null,
        ]);
    }, $kmom);
}

$app->router->add('myDice', function() use ($app) {
    $app->theme->setTitle("Spela tärning");
    $app->theme->addStylesheet('css/dice.css');
    $dice = new \Mos\Dice\CDice([]);
    $app->views->add('me/dice', [
        'dice' => $dice,
    ]);

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params'     => ['myDice']
    ]);

    $app->views->add('comment/form', [
        'mail'      => null,
        'web'       => null,
        'name'      => null,
        'content'   => null,
        'output'    => null,
    ]);
});

$app->router->add('source', function() use ($app) {
    $app->theme->setTitle("Källkod");
    $app->theme->addStylesheet('css/source.css');
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);
 
});
$app->router->handle();
$app->theme->render();
