Documentation
-------------

This README contains instructions on how to build and run the SnoutScout web application, as well as other information about the project.

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
Kyle Chilek, Carlo Rodriguez
