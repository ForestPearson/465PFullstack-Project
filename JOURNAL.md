- Forest Pearson
- Ian Wasson
- Zachary Chronister

CS 465P/564

5/10/2022

## Magic The Gathering Project Journal


##**Ian:** 

I spent a lot of my time making sure that the backend was working. There was a lot of troubleshooting on the postgres side of things to get the site working which is not present in the github repo. There were a couple problems with the database that we had to work through as the project evolved. We found out that the way user accounts were going to be handled by Laravel was going to conflict with how the DB was initially set up, we also found out that there would be small changes for other tables that need to be fixed. 

Aside from that I spent the rest of my time working on the controllers for our site. Since I was familiar with how the DB was being configured, I was able to write the controllers and models pretty easily. The most time consuming aspect of this project was the card browsing functionality. Trying to figure out how to get multiple stacking filters to work was quite a challenge, and I know that my current solution is a bit clunky and could be refined to allow for further expansion of filters. That being said, refining that code is definitely a stretch goal that I do not have time to finish, and the current solution works just fine as it is. Furthermore, I was able to get all of these filters working as API calls, eliminating the need for reloading the page upon filter selection. This means that our website is more responsive, and we have a fully functional API which can be used externally by other services as well.

##**Zach:**

My major focus in this project was the frontend and UX. This was my first time needing to integrate with a database. This certainly provided a challenge, but overall I think the website turned out fairly well. Another major challenge for me was the time crunch, because most of our website revolved around cards which would need to be pulled from the database, I needed to wait for most of the backend stuff to be complete to start on the frontend. Luckily, my teammates pulled through and finished most of the backend with a full week for me to put together my parts.

I feel that the website's layout, while simplistic, is extremely user friendly. This was indeed a focus of mine as many other Magic the Gathering websites can be a bit overwhelming when first using them. With our deck builder, users can search by mana type, card type, and rarity. I would have liked to do more filters, but time constraints deemed it would be impractical to implement more. Thanks to bootstrap we were able to use clever modals to enhance the UX in areas such as signing in, selecting cards to add, and removing cards from a deck.

##**Forest:**

For this project a lot of my focus was on setting up and maintaining the API/SDK in addition to also setting up and implementing auth services for the project. For the Auth services I initially setup and installed Oauth2, which included generating the keys, migrating to the database and configuring passport. I was able to set up user login,registration, and authentication with it but keeping a persistent connection/cookie proved to be challenging, leading to me manually authenticating and logging in users using Laravels authentication services with the Auth facade. This allowed for a persistent and secure connection that made use of the users token and encrypted password upon login while also allowing for logout upon request. This auth setup was also used to access user information such as the unique account id, which worked well when retrieving personal data from the database.

For the API/SDK alot of my focus after the initial setup of the calls and editing of some database models, was accessing the deck controller as a microservice in the form of a routed api call. A lot of the challenges here were in figuring out how we wanted to display that data and in figuring out what way I could best access the database to make it happen. This led to a lot of unique functions that accomplished things such as modifying a deck, getting a specific user deck, getting a deck by name, creating a deck, adding a card to a specified deck, and of course delete functions for all relevant objects. I also worked to create and add these to the blade model for the deck builder itself by accessing their routes and passing in the relevant inputs. Beyond all that and troubleshooting fixes across the project I also implemented another minor microservice that generated a random Un type MTG card for fun.
