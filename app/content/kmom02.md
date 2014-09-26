Kmom02: Kontroller och Modeller
=======

### Composer
Nu är det många delar som är nytt för mig. Jag har insett att det är många beroenden som man använder sig av som PHP-programmerare, men tidigare har jag inte fått någon bra överblick. Nu börjar det klarna så smått. Composer förstår jag styrkan i, men att förstå hur det fungerar med en gång var klurigare. Det gick bra att installera den på min Ubuntu-server (som jag försöker att förstå mig på) med hjälp av instruktionerna på dbwebb. Det enda strulet som gjorde att jag fick klia mig i huvudet, var att den inte laddade hem phpmvc/comment. Hur jag än försökte pröva om, kolla skrivrättigheter och liknande, så funkade det inte. Tills jag insåg att jag hade lagt in texten på fel rad. I stället för

    "require": {
        "phpmvc/comment": "dev-master"
    }

hade det blivit

    "require-dev": {
        "phpmvc/comment": "dev-master"
    }

vilket inte funkade så bra. Efter denna upptäckt kom en lättnadens suck, det funka! Fast jag fick ett felmeddelande (som jag ignorerade):

    ./composer.json is valid, but with a few warnings
    See http://getcomposer.org/doc/04-schema.md for details on the schema
    require.phpmvc/comment : unbound version constraints (dev-master) should be avoided

### Packagist
Första anblicken av Packagist ger ett förvirrat intryck. Min känsla är att det är svårt (inledningsvis) att hitta vilka paket som är välgjorda och tillför något, vilket gjorde att jag inte har tittat på några andra. Däremot ser jag smidigheten med en samling som detta, det var lätt att lägga till. Framöver kan jag tänka mig att använda Packagist, men jag i nuläget vet jag inte vad jag ska leta efter och hur jag ska hitta det smidigt.

### dispatching
Njae, här har inte allt fallit på plats. Det var smidigt att använda sig av de tjänster som var dispatchade, jag hittade flera i ramverket som jag använde mig av. Jag hittade dessutom ett litet fel i CSession::get, dock inget som jag har upptäckt störa sidan. Däremot satte jag mig inte in i det såpass mycket att jag kunde lägga till metoder (tjänster). Jag kunde lägga till metoder i CommentController.php som följde samma struktur namnAction(). Men jag visste inte hur jag skulle göra för att lägga till en "egen" metod med helt annat namn. Däremot uppskattar jag hur patchningen av urlen leder fram till controller, action och params.

### phpmvc/comment
Det var enkelt att komma igång med och utveckla, men jag skulle inte vilja säga att det var en svaghet i sig. Det som inte funka som jag tänkte var dock redirect som var som en gömd del i formuläret. Jag ville att den skulle ladda om sidan jag kom från, inte webbplatsens startsida. Sen vet jag inte om jag använde \$output på tänkt sätt när jag skickade med gömd formulär-data.

### Övrigt
Under tidens gång har jag fått flera idéer på fortsättningar, men kände att jag var tvungen att hålla mig till huvuduppgiften (KISS) för att jag skulle hinna med det viktigaste. Det gäller exempelvis göra snyggare funktioner i kommentarsystemet och layout (css) generellt. Jag gillar hur en del andra har fått till sitt, exempelvis [Amanda](http://www.student.bth.se/~amab14/phpmvc/kmom02/Anax-MVC/webroot/report) och [David](http://www.student.bth.se/~dali14/phpmvc/kmom02/webroot/).

Vid första momentet skulle vi beskriva vår utvecklingsmiljö. Under de senaste veckorna har jag försökt att lägga om från WAMP till en virtuell Ubuntu server. Kul att greja med det med, men det tar ju alltid längre tid än vad man tänker sig. Så nu kör jag Sublime Text direkt mot filerna på servern med hjälp av shared folder genom VBox. Ubuntu server har flera fördelar och det dyker upp nya möjligheter. Exempelvis försöker jag sätta upp en lokal DNS-server så att alla enheter i mitt nätverk kan se webbservern utan att behöva ange specifik ip-adress.