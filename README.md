# Interview exercises

## Exercise 1

If the page is loaded with `?action=members`, a list of members is displayed. Now we want to show each member’s parentID next to the name. In other words, parentID needs to be included in SQL-SELECT and that it is printed in the view file “startpage.php” next to the name of each member.

## Exercise 2

The members thus have the parameter parentID which shows which other member is the parent. Add a new value for the “action” parameter in the WGR_ExamplePageController (eg `?action=members-parents`) that activates a load of members’ names along with their ancestors (recursive). Then display the result in the viewfile “startpage.php”.

**Examples of results:**  
Andersson  
Bengtsson (Andersson)  
Claesson (Bengtsson, Andersson)  
Davidsson (Claesson, Bengtsson, Andersson)

## Exercise 3

Add a new “action” that shows a list of dog breeds of the type “terrier” from this API: https://dog.ceo/dog-api/ The loading of data should be done through PHP and curl (not Guzzle or similar).

## Exercise 4

Replace the link to ?Action = members with a button. The button should trigger loading of the result via ajax through WGR.example in JS. It should therefore be a class on the button that the javascript in scripts.js has an onclick listener against. See https://wgrsecure.se/docs/coding-style/#header7 for tips.

## Exercise 5

Imagine that there are tables in the database called clients, orders and orderItems. Create a new class with a function that retrieves a list of unique customer names where customers have purchased item number X within the last Y days.

Info about the columns in the database (all have their own indexes):

```
orderItems.orderID = orders.id
orders.clientID = clients.id
orders.orderTime = DATETIME
clients.name = varchar
orderItems.articleNumber = varchar
```

Use dbFetchAllPrepared for this (you should not create a real connection to the database or get a real result, we just want to see the function you write and the SQL statement).

## Exercise 6

Enter a function that returns the number of orders per date, between two specified dates. The result must also contain dates where there are 0 orders.

---

When you are satisfied, send the code in a zip file to your contact person.

**Good luck!!**

PS. If you want to immerse yourself in the Wikinggruppens syntax rules for PHP and Javascript, they are described here, but there is no requirement in the work test: https://wgrsecure.se/docs/coding-style/
