Kmom07/10: Projekt och examination
=======

### Spotify In Sight

Länk till projektet: http://www.student.bth.se/~matg12/phpmvc/spot/webroot/


### Krav 1, 2, 3: Grunden

Mitt första steg var att fundera ut hur jag skulle ha med strukturen kring databasen. Jag ville använda mig av tidigare moduler vi har jobbat med, som CDatabase. Från det var det inte svårt att skapa en CUser klass med tillhörande tabell baserat på klassnamnet. Användarklassen gick smidigt att skriva, och med stort självförtroende gav jag mig på nästa del: frågor, svar och kommentarer. Här blev det något klurigare. Skapa en egen klass för varje typ, eller en gemensam? Jag började med att skriva tre klasser, men tyckte inte att jag fick ihop det bra, då jag ville få ihop dem då jag tyckte att de innehöll mycket likheter i sin struktur. Fördelen med gemensam klass var att jag kunde samla ihop fråga, svar och kommentarer i en och samma tabell, och det gick att enkelt få ut allt som var kopplat till en fråga. Vilket iofs inte blev lika viktigt då jag ändå använde mig av views. (I efterhand funderar jag på om det var rätt val, kanske skulle jobbat vidare med tre klasser och låtit dem kalla på varandra…) Det blev något klurigare när jag använde mig av taggar och en kopplingstabell mellan taggar och frågor. Skulle jag använt en klass för taggen och en för kopplingen? Njae, gjorde nog ändå rätt i att skapa egna tabeller direkt i MySQL.

Jag är mycket för att skriva generell kod och använda dem i olika sammanhang, men tyckte bitvis att det var svårt att få ihop. getTags($id=null) blev bra, utan $id skickar den tillbaka alla tillgängliga taggar, med ett siffervärde letar den upp taggar kopplade till frågan vars id-nummer angavs, eller med strängen “popular” returnerar den taggarna med ett värde om hur ofta de används.

Kommentarerna ställde till det för mig ett bra tag. De och svaren gjorde jag ungefär på samma sätt. Det flöt på och jag blev mycket nöjd när det gick att spara svaren i stort sett med en gång. Men när jag skulle spara kommentarerna blev det bara fel. I stället för att skapa en ny rad i tabellen, uppdaterades en befintligt så att den frågan eller svaret försvann. Jag kunde inte hitta felet någonstans, och eftersom det byggde på gemensam kod blev jag mycket förvillad. Till slut hittade jag orsaken, när kommentarerna skulle sparas fanns (konstigt nog) redan $this->id angivet, vilket då sågs som en uppdatering av en befintlig rad. Men varifrån?? Efter ett bra tag insåg jag att den lades till när jag i en funktion anropar databasen för att ta reda på vilket id kommentaren skulle kopplas till. Detta låg kvar i $di. Men den kännedomen blev det genast mycket lättare, det gick att få till det bra. Jag inser att jag har inte fullt grepp på Anax-MVC och DI, trots att jag hela tiden lär mig mer.


### Projektet

Ett utmanande och roligt projekt. Det kändes stort, men ändå fullt greppbart. Kul att få göra något som kan anses vara som en “riktig produkt”. Det gav visserligen en del hinder som tog tid, som jag har beskrivit ovan, men det kändes samtidigt gott att kunna få ihop alla delar. Och det har varit lärorikt, när jag gör om något liknande kan jag planera upp mitt arbete på ett annat, bättre sätt. Det märktes under vägen att jag utvecklades. En del kod skulle jag inte skrivit som jag gjorde i början, men jag lät ändå delar vara kvar som den var. Tidsmässigt var det nog rätt rimligt, men det var dock förskjutet för egen del av andra skäl. Därför är jag ute i sista stund… Så helt klart ett rimligt projekt!


### Kursen

Jag tycker att kursen har varit väldigt bra och lärorik, jag har utvecklats mycket. Samtidigt har den krävt mycket arbete, jag har verkligen fått jobba för att “hänga med” medans andra kurser har gått relativt smidigt. Jag gillar dbwebb.se, att det finns bra handledningar där och tydligt strukturerade kursmoment. Jag har inte använt chatten, trots att jag egentligen tror att det hade varit ett bra sätt att ha dialog med lärare och medstudenter. Forumet har jag använt en del, dels genom att ställa egna frågor, men även genom att läsa andras frågor med tillhörande svar. Handledningen där har varit på topp, Mina problem kring PHPUnit och $di (som jag inte har hunnit ta tag i fullt ut) har besvarats mycket väl av lärare. Tack Mikael. Jag kan lätt rekommendera kursen till andra som vill lära sig mer om programmering och är beredda att jobba för det. Betyget blir en 8:a.
