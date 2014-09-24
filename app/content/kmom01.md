Kmom01: PHP-baserade och MVC-inspirerade ramverk
=======

### Min utvecklingsmiljö
Det är ett spännande kapitel, jag håller på att pröva olika varianter. Sedan ett tag tillbaka kör jag med **WAMP** (japp, Win 8.1 här), vilket har funkat smidigt. Jag har tidigare använt Notepad++ och sedan flyttat över filer till driftservrar med FileZilla. Men nu när terminen började, så läser jag oophp parallellt. När jag gjorde första uppgiften där testade jag att köra med **Sublime Text 2**, vilket jag gillade skarpt. Bara bakgrundsfärgerna gör att jag känner mig mer som en "riktig" programmerare. Trädstrukturen, översikten och snabbredigeringar i texten är stora vinster för mig.

Sedan en tid tillbaka har jag funderat på att använda mig av någon slags versionshantering. Så nu när terminen började har jag precis kommit igång med **Git** och **GitHub**. Det funkar smidigt att commita och pusha mina filer till GitHub, för att sedan göra en clone till student-servern med hjälp av **PuTTY**-klienten. Lite funderingar hade jag kring hur jag skulle göra när jag började med att clona Anax-MVC och sen jobba vidare med det på ett eget repo. Men med hjälp av Google hittade jag en fråga på [Stackoverflow](http://stackoverflow.com/questions/5181845/git-push-existing-repo-to-a-new-and-different-remote-repo-server) med ett lämpligt svar. Först clona, byta namn på origin, sen lägga till eget repo. Så det som är kvar efter jag har skrivit den här texten är att lägga till detta och dra ner till student-servern. Jag ska nog passa på med en versionstag också.


### Tidigare ramverk
Jag tänkte mig att jag inte har jobbat med några MVC-ramverk tidigare. Wordpress har jag använt en del och det blev snabbt klart i texten på dbwebb att det inte är ett MVC-ramverk. Dock har jag tidigare testat på Joomla. Oavsett har jag inte kopplat ihop det med Model-View-Controller. Ärligt talat tyckte jag det var mest krångligt och svårt att överskåda. Wordpress har jag greppat till stor del i strukturen, men har säkert missat några väsentliga delar. 

### Avancerade begrepp
Viss objektshantering av PHP känns bekant sedan tidigare, då jag har läst Java. Tyvärr är inte allt färskt i minnet, så jag fick klura lite på en del saker. Men vissa delar kändes nya, som traits, __clone(), anonymous functions. Sen tycker jag att det är svårt med arv och rättigheter, vilka variabler som man kan komma åt i olika sammanhang som klasser, objekt, funktioner. Det finns många sätt att lösa det på, frågan är vilket som lämpar sig bäst. En variabel i klassen, objektet, GLOBAL, public... Och här är det nog mest att jobba mycket med det för att komma in i det.


### Anax och Anax-MVC
Anax-Base fick jag grepp om, men det tog lite längre tid med Anax-MVC. Vissa delar har jag inte koll på helt ändå. Jag tycker att det är svårt att förstå MVC-upplägget och katalogsturkturen helt. Uppdelning av innehållet mapparna theme, app/view och pagecontrollern i webroot har jag inte riktigt koll på, så det tog ett tag och hitta rätt när jag var ute efter att ändra informationen. Ett tag hade jag dubbla utskrifter av bylinen, och jag fick leta runt ett tag innan jag förstod var jag skulle ändra. Nu är jag med på var informationen finns, men uppdelningen... Njae, inte full koll där.

I slutet hade jag även problem med att webroot inte syntes alls, men med hjälp av forumet fick jag hjälp att hitta problemet. Det går uppenbarligen inte att kommentera text i .htaccess på samma rad som det finns data.


### Andra lärdomar
Fast uppgiften har handlat om MVC, så har jag tagit mig tid för CSS för att få till menyknapparna. Jag har även kommit igång med webfonts. Och att fått till favicon. Se där vad man kan lära sig i farten :)
