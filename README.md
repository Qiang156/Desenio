## Uppgifter

1.  Om sidan laddas med ?action=members så visas en lista medlemmar. Nu vill vi visa varje medlems parentID bredvid namnet. Dels behöver alltså parentID vara med i SQL-SELECT samt att det skrivs ut i viewfilen "startpage.php" bredvid namnet på varje medlem.

2.  Medlemmarna har alltså parametern parentID som visar vilken annan medlem som är förälder. Lägg till en nytt värde för parametern "action" i WGR_ExamplePageController (t.ex. ?action=members-parents) som aktiverar en laddning av medlemmarnas namn tillsammans med deras förfäder (rekursivt). Visa sedan resultatet i viewfilen "startpage.php".  
    Exempel på resultat:  
    Andersson  
    Bengtsson (Andersson)  
    Claesson (Bengtsson, Andersson)  
    Davidsson (Claesson, Bengtsson, Andersson)

3.  Lägg till en ny "action" som visar en lista med hundraser av typen "terrier" från detta API:  https://dog.ceo/dog-api/ 
    Laddningen av data ska ske genom PHP och curl (ej Guzzle eller liknande).

4.  Byt ut länken till ?action=members mot en knapp. Knappen ska trigga laddning av resultatet via ajax genom WGR.example i JS. Det ska alltså vara en class på knappen som javascriptet i scripts.js har en onclick-lyssnare mot. Se https://wgrsecure.se/docs/coding-style/#header7 för tips.

5.  Tänk dig att det finns tabeller i databasen som heter clients, orders och orderItems.
    Skapa en ny class med en funktion som hämtar en lista med unika kundnamn där kunderna har köpt artikelnummer X inom de senaste Y dagarna.

    Info om kolumnerna i databasen (alla har egna index):

    ```
    orderItems.orderID = orders.id
    orders.clientID =  clients.id
    orders.orderTime = DATETIME
    clients.name = varchar
    orderItems.articleNumber = varchar
    ```

    Använd dbFetchAllPrepared för detta (du ska inte skapa någon riktig koppling mot databasen eller få ut något riktigt resultat, vi vill bara se funktionen du skriver samt SQL-satsen).

6.  Skriv en funktion som returnerar antalet ordrar per datum, mellan två angivna datum. Resultatet ska även innehålla datum där det finns 0 ordrar.

När du är nöjd skickar du över koden i en zip-fil till din kontaktperson.

Lycka till!!

PS. Om du vill fördjupa dig i Wikinggruppens syntaxregler för PHP och Javascript så finns de beskrivna här, men det är inget krav i arbetsprovet: https://wgrsecure.se/docs/coding-style/
