# TapX
#### How to use our GitHub Repository
* Clone the TapX Repository onto your own server
* We are utilizing a LAMP stack and recommend users install it on their machine as well to avoid environment issues
* Set up your MySQL database using your favorite client
* Import the database structure from the database.sql file
  - Login to MySQL: mysql -h [host] -u [username] -p[password]
  - Create database schema: create database tapx
  - Exit MySQL: quit
  - Import datadump: mysql -h [host] -u [username] -p[password] < database.sql
* Create a dbcreds.php file in the main folder and include your own database login credentials
* We did not obtain an SSL certificate, but we highly recommend it. As such, you may want to acquire an SSL certificate and add HTTPS headers to the pages
* Start a process for websocket.php
* Test your website by heading to the url of your server
