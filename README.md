phpmvc
==================================

My website for examination in the [phpmvc](http://dbwebb.se/phpmvc)-course at [BTH](http://bth.se). Built on [Anax-MVC](https://github.com/mosbth/Anax-MVC), [README](http://github.com/mosbth/Anax-MVC/README.md).

By Marcus Törnroth


License 
----------------------------------

This software is free software and carries a MIT license.


Use of external libraries
----------------------------------

The following external modules are included and subject to its own license.


### Modernizr
* Website: http://modernizr.com/
* Version: 2.6.2
* License: MIT license 
* Path: included in `webroot/js/modernizr.js`


### PHP Markdown
* Website: http://michelf.ca/projects/php-markdown/
* Version: 1.4.0, November 29, 2013
* License: PHP Markdown Lib Copyright © 2004-2013 Michel Fortin http://michelf.ca/ 
* Path: included in `3pp/php-markdown`


History
<<<<<<< HEAD
----------------------------------
=======
-----------------------------------


###History for Anax-MVC

v2.0.x (latest)

* Improved errorhandling in trait `TInjectable`, now throwing more verbose exceptions on which class is using the trait. 



v2.0.2 (2014-10-25)

* Added example for navigation bar and how to create urls in navbar.
* Add default route handler for route defined as '*'.
* Added empryt directory for app-specific file content `app/content`.
* Minor fixes to error messages.
* Several minor fixes to code formatting.
* Added `CUrl::createRelative()` for urls relative current frontcontroller.
* Reorganized and added testprograms in `webroot/test`.
* Improved documentation in `docs/documentation` and `webroot/docs.php`.
* Added config-file for phpunit `phpunit.xml.dist`.
* Added `phpdoc.dist.xml`.
* Enhanced `Anax\Navigation\CNavBar` with class in menu item.
* Added phpdocs to `docs/api`.


v2.0.1 (2014-10-17)

* Updates to match comments example.
* Introduced and corrected bug (issue #1) where exception was thrown instead of presenting a 404-page.
* Added `CSession::has()`.
* Corrected bug #2 in `CSession->name` which did not use the config-file for naming the session.
* Added `Anax\MVC\CDispatcherBasic` calling `initialize` om each controller.
* Added exception handling to provide views for 403, 404 and 500 http status codes and added example program in `webroot/error.php`.
* Added `docs` to init online documentation.
* Adding flash message (not storing in session).
* Adding testcases for CDispatcherBasic and now throwing exceptions from `dispatch()` as #3.
* Adding example for integrating CForm in Anax MVC and as a result some improvements to several places.
* Adding check to `Anax\MVC\CDispatcherBasic` to really check if the methods are part of the controller class and not using `__call()`.
* Improved error handling in `Anax\MVC\CDispatcherBasic` and testcase in `webroot/test_errormessages.php`.


v2.0.0 (2014-03-26)

* Cloned Anax-MVC and preparing to build Anax-MVC.
* Added autoloader for PSR-0.
* Not throwing exception in standard anax autoloader.
* Using anonomous functions in `bootstrap.php` to set up exception handler and autoloader.
* Added `$anax['style']` as inline style in `config.php` and `index.tpl.php`.
* Added unit testing with phpunit.
* Added automatic build with travis.
* Added codecoverage reports on coveralls.io.
* Added code quality through scrutinizer-ci.com.
* Major additions of classes to support a framework using dependency injections and service container.


###History for Anax-base

v1.0.3 (2013-11-22)

* Naming of session in `webroot/config.php` allows only alphanumeric characters.


v1.0.2 (2013-09-23)

* Needs to define the ANAX_INSTALL path before using it. v1.0.1 did not work.
>>>>>>> f12017a0a7631040a1a9e42a588c33b6f32d316c

### v5.0
* Release for Kmom05.


### v4.0
* Release for Kmom04.
* Users and comments stored i database.


### v3.0
* Release for Kmom03.
* Now with responsive theme, driven by LESS together with lessphp.


### v2.0
* Release for Kmom02.
* New feature: Comments.


### v1.0
* First release for Kmom01.


----------------------------------
Copyright (c) 2014 Marcus Törnroth
