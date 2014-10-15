<?php
require __DIR__.'/config_with_app.php';

$app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');
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
            'byline' => $byline
        ]);

        $sidebar = $app->textFilter->doFilter($app->fileContent->get('kmom-sidebar.md'), 'shortcode, markdown');
        $app->views->add('me/page', [
            'content' => $sidebar,
        ], 'sidebar');

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

$app->router->add('regions', function() use ($app) {
 
    $app->theme->setTitle("Regioner");
    $app->theme->addStylesheet('css/me-grid/theme_grid.css');
    $app->theme->addStylesheet('css/me-grid/theme_regions.css');
 
    $app->views->addString('flash', 'flash')
               ->addString('featured-1', 'featured-1')
               ->addString('featured-2', 'featured-2')
               ->addString('featured-3', 'featured-3')
               ->addString('main-fullwidth', 'main-fullwidth')
               ->addString('main', 'main')
               ->addString('sidebar', 'sidebar')
               ->addString('triptych-1', 'triptych-1')
               ->addString('triptych-2', 'triptych-2')
               ->addString('triptych-3', 'triptych-3')
               ->addString('footer-col-1', 'footer-col-1')
               ->addString('footer-col-2', 'footer-col-2')
               ->addString('footer-col-3', 'footer-col-3')
               ->addString('footer-col-4', 'footer-col-4');
});

$app->router->add('typo', function() use ($app) {
 
    $app->theme->setTitle("Typografi");
    $app->theme->addStylesheet('css/me-grid/theme_grid.css');

    $content = $app->fileContent->get('typography.html');
    $sidebar = $app->fileContent->get('typography.html');
    $app->views->add('me/page', [
        'content' => $content,
    ]);
    $app->views->add('me/page', [
        'content' => $sidebar
    ], 'sidebar');
});

$app->router->add('awesome', function() use ($app) {
 
    $app->theme->setTitle("Font Awesome");
    $app->theme->addStylesheet('css/me-grid/theme_grid.css');

    $content = $app->textFilter->doFilter($app->fileContent->get('awesome-main.md'), 'shortcode, markdown');
    $sidebar = $app->textFilter->doFilter($app->fileContent->get('awesome-sidebar.md'), 'shortcode, markdown');
    $app->views->add('me/page', [
        'content' => $content,
    ]);
    $app->views->add('me/page', [
        'content' => $sidebar
    ], 'sidebar');
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
        'content' => $source->View()
    ], 'main-fullwidth');
});

$app->router->handle();
$app->theme->render();
