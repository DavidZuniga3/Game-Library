# Game-Library
This project is a game library website that lets the users learn about videogames and lets them view and review them.
This project is meant to resemble popular review websites and apps, such as Letterboxd.

Midterm project for CSC321
Name: David Zuniga
ID: 812015
Course: CSC321-B

For the front end portion of this project, HTML, JavaScript, and CSS were used. 
For the back end portion of this project, PHP was used.
No databases were used, but to fulfill that role a JSON file was used.

Future plans for this project includes making a database to store and collect data from to further enchance this project.
For this project I used PHP and XAMPP to actually display the page and use the back end features that were implemented with PHP.
I plan to continue using PHP and XAMPP, as well as use MYSQL for the databases.
For the Database schema:
User:              id, userName, email, encrypted password
game:              id, title, description, genre, year, image
review:            id, gameId, userId, rating, reviewText
likes:             id, userId, gameId
