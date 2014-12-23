Kmom06: Verktyg och Continuous integration (CI)
=======

Det här var intressant att lära sig. Tyvärr stötte jag på hinder på vägen som gjorde att det drog ut på tiden för mycket. Det är ju roligare när man kan lösa problemen med detsamma, men skam den som ger sig... Med hjälp från forumet och mos, så gick det vägen till slut.

### Tidigare bekantskap
Innan denna uppgift har jag hållt mig borta från testande. Jag har inte satt mig in i det, för jag har helt enkelt saknat motivation. Lite har jag tänkt på att det kan vara nyttigt, men har skjutit på det hela tiden.

### PHPUnit
Här var det två stora hinder som jag fick kämpa med. Det ena handlade om att min modul, `rcus/htmltable`, har ett beroende till `mosbth/cdatabase`. Jag fick inte till det ordenligt med att integrera CDatabase, fast jag hela tiden trodde att jag var på rätt väg. Efter flera frågor fram och tillbaka i [forumet](http://dbwebb.se/forum/viewtopic.php?f=40&t=3329) och en nyskapad [guide](http://dbwebb.se/kunskap/phpunit-och-testa-modul-som-ar-beroende-av-databas) av mos, så löste sig detta. Jag fick använda mig av `setUpBeforeClass()` (körde `setUp()` tidigare), `static private $table` och hänvisa till `self::$table` (istället för `$this->table`).
Det andra stora hindret är inte helt klart. Det handlar om att min modul bygger på en Anax-MVC-funktion `request->getGet()` som hämtar variabler från `$_GET`. Efter flera turer i en annan [forumtråd](http://dbwebb.se/forum/viewtopic.php?f=40&t=3325) valde jag till slut att lämna spåret att försöka mocka `$di->request->getGet()` och körde testet mot `$_GET` då det tog för lång tid. Men med värden i `$_GET` så fungerade det som det skulle.

### Travis och Scrutinizer
Här fungerade det i stort sett problemfritt. De små hinder som dök upp på vägen löstes smidigt. Det handlade om att konfigurera yml-filen rätt, som att lägga in `composer install`. Roligt att se att man med små enkla grepp kan få fram rätt omfattande rapporter.

### Verktygs-känsla och fortsatt användning
Att jobba med verktygen kändes ok. Det svåra var att rätt till felen i PHPUnit-testen. Med en konfigurerad `phpunit.xml` var det smidigt att köra testet och kul att se de olika resultaten efter små förändringar i koden. I fortsättningen kan jag tänka mig att testa min kod, men jag har inte fått riktigt stort engagemang för det. Dels för att föstår poängen med tester, men fick tyvärr ingen riktig aha-upplevelse, och dels för att det strulade så mycket för att få ihop databas-kopplingen genom mitt beroende. Men samtidigt vill jag inte ge mig, får se bara hur jag tar tag i kommande projekt.

### Extrauppgift
Nepp, inte nu. Det tog tyvärr för lång tid eftersom jag fastnade.

Me-sida: http://www.student.bth.se/~matg12/phpmvc/kmom06/webroot
Packagist: https://packagist.org/packages/rcus/htmltable
Github: https://github.com/rcus/htmltable
Travis-CI: https://travis-ci.org/rcus/htmltable
Scrutinizer: https://scrutinizer-ci.com/g/rcus/htmltable