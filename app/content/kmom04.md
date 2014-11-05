Kmom04: Databasdrivna modeller
=======

En givande uppgift! Här skulle jag lätt kunna ha lagt hur många timmar till som helst, bara för att lära mig mer! Därför har en av mina utmaningar varit gränsdragningar för vad jag ska göra. Jag har försökt att få det så enkelt som möjligt, men med "snygg" och effektiv kod. Bitvis har jag fastnat för att jag inte är helt insatt i Anax, men det tar sig. Jag tror nästan att jag har koll på det ;)

### Formulärhantering
CForm har många funktioner, men jag har bara skrapat lite på ytan. Den verkar väldigt kraftfull och användbar. Något som jag inte har undersökt är t.ex. om man kan påverka hur den generar HTML-koden och man kan använda funktioner som onBlur, onChange och liknande.  
Jag vet inte vilket som är smidigast när det gäller att använda mig av CForm, Git (på något sätt...) eller Composer. Jag körde Composer, vilket funkade rätt. i `CForm.php` hittade jag en mindre bugg. Följande rad ger ett varningsmeddelande

    unset($_SESSION['form-failed']);

vilket jag ersatte med

    if (isset($_SESSION['form-failed'])) {
        unset($_SESSION['form-failed']);
    }
Hade jag varit en fena på Git, så hade jag gärna gjort en pull request. Men tyvärr är det nerprioriterat just nu.

### Databashantering
Jag gillar upplägget, det känns mer integrerat i php-klasstänket. Det finns många möjligheter att få till finesserna. Det är även bra att det finns flera olika sätt för att göra en query, de har olika logiska tänk som kan vara bra i olika situationer. Däremot behövs kunskap om tradiontionell SQL ändå, annars blir det svårt att få ihop det. I uppgiften gick jag över till att använda SQLite istället för MySQL som jag hade tänkt från början. Stor fördel att slippa konfigurera först när jag utvecklar lokalt, och sedan konfigurera om när jag lägger upp på studentservern.

### Basklasser
Min tanke var att lägga User-specifika metoder i `UsersController` och databas-metoder i `CDatabaseModel`. Det blev i stort sett rätt, tror jag. Men `Users` blev tom, så kanske ett lite annat tänk hade funkat bättre. Däremot tog jag med mig det när jag sedan gjorde klasserna till kommentarerna, `CComments` fick innehåll som hade med kommentarernas databaskoppling att göra, medan `CCommentsController` fick innehålla metoder för själva kommentarshanteringen. Där tycker jag att det blev en bättre uppdelning.

### Kommentarssystemet
Jag försökte såklart använda mig av samma upplägg som tidigare, men jag inser ändå att jag ändrat en hel del. En stor fördel, tycker jag, är att kommentarerna hanteras i huvudsak av den egna controllern, inte som tidigare i frontcontrollern. Denna gång använder jag routrarna bättre så att jag slipper hitta på lösningar för att komma ihåg kommentarens id och placering (vilken sida). Jag är också nöjd över att ha fått in CForm, då den fungerade bra i användardelen (jag kikade mycket där). Sen tycker jag att jag har kunnat gå igenom och "snygga till" koden. Det kändes som den är effektivare nu med färre metoder att jobba med. Eller kanske bara bättre struktur?
