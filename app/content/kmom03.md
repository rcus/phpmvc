Kmom03: Bygg ett eget tema
=======

### CSS-ramverk
CSS vill jag så gärna ha kläm på. I sig gillar jag CSS, för det skapar så stora möjligheter med små medel. Bara några justeringar, så ändras det genomgående på en hel webbplats. Samtidigt tycker jag att det kan vara frusterande då det är mycket som kan ändras utan jag ser orsaken till det. Eftersom jag inte har behövt sätta mig in (eller snarare inte tagit mig tid till det) i ett CSS-ramverk tidigare, så har jag låtit bli. Jag tror dock att jag skulle kunna få ut mycket av ett ramverk, om jag väl tar till mig något/några.

### LESS, lessphp och Semantic.gs
Välkommen LESS! Det är något jag har sneglat på tidigare, just att kunna göra beräkningar och funktionsliknande metoder. När väl lessphp var på plats, så var det lätt att förstå. Dock hade jag ett problem i början med en vit skärm utan något innehåll i style.php. Efter att ha testat även på student-servern förstod jag att det var ett php-fel som inte visades min dev-server. Felet berodde på att lessphp inte är förlåtande nog för felaktigheter i CSS flödet. Här är raden som "förstörde" allt:

    m in-height: 80px;

Semantic.gs tycker jag fungerar bra. Känner igen tänket i olika Wordpress-teman, nu kan jag använda det i egen CSS-kod. Gillas.

### Gridbaserad layout
Jag har på senare tid tänkt gridbaserat. Fördelen är att få ihop sina block/moduler på ett smidigt sätt och få ett flyt på en webbsida. Det är hyfsat flexibelt, så länge man håller sig till sitt rutnät. Risken är att layouten kan bli väldigt "rutig", men det kanske hänger ihop med vilket designsinne man jag, vilket jag önskar att jag hade en större portion av. Det som kan ställa till det lite (för mig) är att få ihop det vertikalt och horisontellt. Om jag har två "rutor" bredvid varandra med någon bakgrund eller kantlinje så tycker jag att är klurigt att få dem i samma höjd. Eller att kunna centrera innehållet vertikalt. Likaså att få ett vertikalt flyt om det fortfarande finns innehåll horisontellt.

### Font Awesome, Bootstrap, Normalize
Font Awesome och Normalize har jag använt lite tidigare. Tycker att det är roligt att få in några ikoner/symboler på ett relativt smidigt sätt. När det gäller Normalize kan jag se nyttan av det. Jag har inte märkt av några situationer då jag har sett skilnader på en webbplats i olika miljöer, så jag kan inte säga så mycket om det... Bootstrap är dock nytt för mig, men jag har inte använt det något nämnvärt här.

### Mitt tema
Jag formade mitt tema efter den tidigare layout jag har gjort i kursen. Förutom att flytta runt en del CSS-kod gick det förhållandevis smidigt. Eller nästan... Jag fick ihop det med routrar och tema-kopplingar. Men det som jag fastnade på var två delar. Det första hänger ihop med Git, att kunna lägga in ett repo inne i mitt och sedan kunna jobba vidare med det. Det följde inte med i mitt eget repo. Jag fick [tips om submodules](http://dbwebb.se/forum/viewtopic.php?f=23&t=2933 "dbwebb.se forum"), tror att jag ska få ihop det nu. Det andra var mer att jag fastnade tidsmässigt. Det tog tid att få ihop menyn för smala skärmar med CSS-kod. Till slut hittade jag något som verkar funka bra. Jag använder mig av en dold checkbox som får avgöra om menyn ska visas eller inte. Den är stylad så att det inte märks att det är en checkbox. Nackdelen med den här metoden var dels att jag fick ändra lite i koden i CNavbar.php och dels att jag kan inte "toggla" undermenyer. Men i stort är jag nöjd med resultatet. Sen fick det var nog med utmaning för min del, det blev ingen extra uppgift.

