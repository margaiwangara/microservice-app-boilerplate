## Churches And Sermons Web Application

### Introduction

This project is structured in two for conveniency. Due to the number of developers expected to work on the project, applying the microservices architecture seems to be the best way to handle the project. Developers can work on the project without taking into account which language is being used by another developer or incase a push may lead to problems with the application. Due to the eventual cost of handling the microservice architecture, as a fail safe, a monolithic architecture has also been developed. The all run on the same service just on difference ports. The monolithic architecture project folder has been added on as a microservice such that developers can work on both architectures without causing problems or wasting time.

#### Requirements

Developers are required to install only one software into their respective machines as follows:

##### Docker

###### Windows

[Docker Desktop For Windows](https://hub.docker.com/editions/community/docker-ce-desktop-windows)

###### Mac

[Docker Desktop For Mac](https://hub.docker.com/editions/community/docker-ce-desktop-mac)

##### Text Editors

In addition, it is also required to have a text editor
[Visual Studio Code](https://code.visualstudio.com/download)
[Atom](https://atom.io/)

##### Git VC

[Git](https://git-scm.com/)

#### Installation

Once all the above software has been installed, clone this repository into any location on your computer

        ```
        git clone https://github.com/margaiwangara/churchesandsermons-microservice churchesandsermons

        // cd into the repository
        cd churchesandsermons

        ```

After you have opened your terminal at the location of your cloned folder, input `ls` or `dir` in Windows OS and press enter then check the list, the docker-compose.yml file must be present. Then run `docker-compose up -d`
All the images will be downloaded from docker and installed to your machine. To stop the containers from running run `docker-compose down` and the containers will be stopped and images deleted

#### Usage

For developers using php to develop, it is easy to integrate your application. Inside the cloned folder, a folder named application was created for php developers to be able to run their apps. All is needed is create a new folder, name it,copy all files from application folder into the new folder created then open the docker-compose.yml file then copy all the configuration within the php-project tag to a new line then make sure you have changed the port and save then run `docker-compose up -d`, a new container will have been created for use. Open your browser localhost at the port you assigned your application and you can start to write your code as you please

#### Using The Monolith Application

The monolith application is already configured for use, any developer who can code in laravel can make changes and push it to github without any problems. Once you have cloned the project into a directory on your computer and run `docker-compose up -d`, open the folder named **cands_fullstack** and make changes as you wish. MySQL and MongoDB have already been configured for this project, however migration will not work locally since we are using docker containers to link the apps. To run migrations, write the code below

        ```
          docker-compose exec monolith php artisan migrate

        ```

Apart from migrations, all the other artisan commands work as expected

**Note:** For additional configuration or questions please contact me directly
