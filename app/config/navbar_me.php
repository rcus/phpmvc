<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
    'role' => 'custom-dropdown',
    'in_wrapper' => '<input type="checkbox" id="button"><label for="button" onclick></label>',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'me'  => [
            'text'  => 'Om mig',   
            'url'   => '',  
            'title' => 'Allt om Marcus Törnroth'
        ],
 
        // This is a menu item
        'kmom03'  => [
            'text'  => 'Redovisning',   
            'url'   => 'kmom03',   
            'title' => 'Såhär gjorde jag',
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'kmom01'  => [
                        'text'  => 'Kmom01',   
                        'url'   => 'kmom01',  
                        'title' => 'PHP-baserade och MVC-inspirerade ramverk'
                    ],

                    // This is a menu item of the submenu
                    'kmom02'  => [
                        'text'  => 'Kmom02',   
                        'url'   => 'kmom02',  
                        'title' => 'Kontroller och Modeller'
                    ],

                    // This is a menu item of the submenu
                    'kmom03'  => [
                        'text'  => 'Kmom03',   
                        'url'   => 'kmom03',  
                        'title' => 'Bygg ett eget tema'
                    ],

/*                    // This is a menu item of the submenu
                    'kmom04'  => [
                        'text'  => 'Kmom04',   
                        'url'   => 'kmom04',  
                        'title' => 'Databasdrivna modeller'
                    ],

                    // This is a menu item of the submenu
                    'kmom05'  => [
                        'text'  => 'Kmom05',   
                        'url'   => 'kmom05',  
                        'title' => 'Bygg ut ramverket'
                    ],

                    // This is a menu item of the submenu
                    'kmom06'  => [
                        'text'  => 'Kmom06',   
                        'url'   => 'kmom06',  
                        'title' => 'Verktyg och Continuous integration (CI)'
                    ],

                    // This is a menu item of the submenu
                    'kmom07'  => [
                        'text'  => 'Kmom07/10',   
                        'url'   => 'kmom07',  
                        'title' => 'Projekt och examination'
                    ],
*/                ],
            ],
        ],
 
        // This is a menu item
        'dice' => [
            'text'  => 'Tärning',
            'url'   => 'myDice',
            'title' => 'Spela tärning'
        ],
 
        // This is a menu item
        'theme' => [
            'text'  => 'Tema', 
            'url'   => 'regions',  
            'title' => 'Eget tema',
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'regions'  => [
                        'text'  => 'Regioner',
                        'url'   => 'regions',
                        'title' => 'Visa regioner'
                    ],

                    // This is a menu item of the submenu
                    'typo'  => [
                        'text'  => 'Typografi',
                        'url'   => 'typo',
                        'title' => 'Visa typografier'
                    ],

                    // This is a menu item of the submenu
                    'awesome'  => [
                        'text'  => 'Font Awesome',
                        'url'   => 'awesome',
                        'title' => 'Visa Font Awesome'
                    ],

                ],
            ],
        ],
        // This is a menu item
        'source' => [
            'text'  => 'Källkod', 
            'url'   => 'source',  
            'title' => 'Visa källkod'
        ],
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function($url) {
        if ($url == $this->di->get('request')->getRoute()) {
            return true;
        }
    },

    // Callback to create the urls
    'create_url' => function($url) {
        return $this->di->get('url')->create($url);
    },
];
