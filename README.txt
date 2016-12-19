Documentation
-------------

This README contains instructions on how to build and run the SnoutScout web application, as well as other information about the project.

What is SnoutScout?
-------------
  SnoutScout is an animal adoption matching service that helps users find a pet in need from shelters around their vicinity. The project originally started as a phone application idea that involved "swiping right" and "swiping left" (like tinder) so users can easily and quickly find a cat or a dog that would suit their needs. The process of finding an animal to adopt would be;

Creating an account --> Choose whether you are a Cat or a Dog person (or both!) --> "Swipe right" on pets you like and "swipe left" on animals you will not be considering --> View your "liked pets" from the "saved pets" page --> View the pets profile for their location 
--> Visit that shelter and adopt

  Ideally, the application would be connected to a database of pets that come directly from the animal shelters themselves, so that the status of each pet is kept up to date (perhaps an animal is already adopted, but it still shows up as an available pet on the users saved pets page). This would require a sort of "subscription" between our SnoutScout application and the animal shelter so that they could provide an updated version of the pets they have available in their shelter. 
  Now you may be wondering, "Why wouldn't I just use the multitude of other pet finding applications and websites?" What our application does differently is provide users with a method of saving a bank of animals that the user might like, and provide a fun and new experience for the user via swiping for a pet they may be interested in. The application is mainly for those who believe that all pets should be considered for adoption, or for people who do not know what type of pet they are looking for. 

The Current State of our Project
-------------
1. During the project building process, we scrapped the idea of creating an application, and instead created a website in place of the application. This reason was because of our inexperience as programmers, and being unfamiliar with application creation. We instead opted for the creation of a website, because our members were more suitable for that sort of approach. 
2. The database of pets that are provided within this Github repository is an out-dated database of animals that were "webscraped" from other websites (I.e, petfinder), and is currently used to demo our website and project. The end goal of this project was not to "webscrape" our animals from other websites and use that information as our own, however, in order to portray our demo, we resorted to these methods for project completion. 
3. Our website currently will allow you sign-up, log-in, like and skip animals, and view saved animals from the user account page. During the animal "liking" and "skipping" process, we input a "heart" button for liking and an "arrow" button for skipping.
4. We were not able to implement a mapping of shelters around the user. 

Where We Want to Go From Here
-------------
1. We would like to return back to the idea of creating a mobile application for SnoutScout, because we believe that in order to convey "swiping right" and "swiping left" to pets, a mobile application will be needed and give the user a tactile experience, which is what we aim for. 
2. We would like our website's animal liking and skipping feature to closely resemble our swiping concept. An idea that we had was to have clickable arrows on either side of the screen, where clicking left would skip and clicking right would save to the users account page. 
3. In order for the project to become a reality, there needs to be involvement with a local animal shelter. Integrating a local animal shelters database with our website and future application will allow for the user to reliably like and view the animals that they save.
4. A mapping of shelters around the user on the bottom of the website should have been implemented during our first three sprints, but was scrapped due to time constraints and the loss of team members. We would like to see a mapping of shelters around the user, possibly implemented through GPS functionality. 


Tips for Future Contributers
-------------
1. We used "www.wixsite.com" in order to design our website before creating an HTML code. If you are unfamilar with website design, this website provides a wide array of tools to get you started on creating a new webpage for SnoutScout, or even updating the one we currently have to a more modern, sleeker design. 
2. To immediately get started with an updated version of the database, try using our "webscraping" technique that we did in order to have a working demo. (A method for webscraping was not provided due to a team member leaving us and not providing the proper method for webscraping)

How to Build
-------------
SnoutScout was originally built and ran on a centOS 6.7 Linux server, the instructions in this document will be for that operating system, but are still relevant to other operating systems. In order to build the project, the LAMP stack must be installed on the server machine. The LAMP server stack consists of a Linux operating system (called MAMP for Mac OS and WAMP for Windows OS), Apache web server, MySQL databases, and PHP code and modules. In-depth instructions for installing a LAMP server can be found here: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-centos-6. After installing the LAMP server all SnoutScout files on GitHub must be downloaded and placed in the default directory for the Apache web server, which in CentOS is /var/www/html. Once all the files are in the correct directory, enter your server's ip address into the address bar of any browser and 'index.html' should appear. After the Apache server is configured, add two new databases to MySQL, 'pets' and 'test1'. The 'test1' database should have a table called 'user' which has the columns 'email', 'password', 'first_name', 'likedDog1', 'likedDog2', 'likedDog3', 'likedDog4', 'likedDog5', 'likedDog6', and an auto-incrementing 'userID'. The 'pets' database should have two tables, one for dogs called 'dogs', and one for cats called 'cats', these tables should both have the columns 'url' (a link to find the pet on a shelter site), 'image' (URL of an image of the pet), 'pet_name', 'pet_location', 'breed', and an auto-incrementing 'index', then fill these tables with entries of pets.

How to Run
-------------
After the MySQL databases are configured, enter the ip address of your server into a browser and navigate to the 'Sign Up!' page from 'index.html' and fill out the required fields. After completing a sign up, navigate to the 'login' page and use your new credentials to login. After logging in you will be asked to select an image of a cat or a dog, pick whichever, you should then see a page with a picture of whichever type of animal you chose and a heart image next to an arrow. To go to the next animal, click the arrow and to save an animal click on the heart. In order to see which pets were liked click on 'Hello, *yourname*", where you should see hyperlinks of liked pets’ names. 

Updates
-------------
Any updates and/or changes to the source code of SnoutScout will be pushed to the GitHub repository located at: https://github.com/CS3398-Electric-Handshake/CS3398-Electric and accessible for download there.

Authors
-------------
Kyle Chilek, Carlo Rodriguez, Samuel Sugia, Francisco Recio
