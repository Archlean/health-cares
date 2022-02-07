# health-cares
 
Welcome to Health cares repositories project this is simple website build for prototype only, the project was build on framework laravel based on PHP language with rich and extensive component make this website have responsive user interface / UI.

# Requirement
before deploying the application you will need some requirment application installed on your localhost or your personal computer
  1. XAMPP or similar application
  2. Mysql Workbench, PHPmyadmin or similar application 
  3. Valet
  4. Laravel

# Installing Laravel
first of all your localhost will need laravel framework to able run or deploy the application on your local server, i'll describe the step by step how to do it
  1. open you terminal or command promp
  2. check if you already have php installed on your localhost, type: php -v if you have result something like Copyrigh (c) The PHP Group the you are good to go. if you already installed xampp you should not to worry about this.
  3. check if you have composer by type composer -v if you already have composer installed on your local host skip this step and go to step 8
  4. if you not have composer installed on your localhost go to getcomposer.org
  5. go to getting started section and refrence to installation to begin your composer installation
  6. type the installation command on your terminal and wait untll the process done
  7. check if the composer successfully installed by typed composer -v on your shell
  8. now you can type composer global laravel/installer to install laravel on your localhost
   
# Database Configuration
this repository environment need db connetion to mysql you can use phpmyadmin or mysql workbrench use what you feel comfotable
  1. open your xampp or similar application and start to mysql service
  2. set up your dns ipv4 {127.0.0.1} and ipv6 {::1}
  3. change your apache configuration port to 80 if you using xampp you only need to open xampp and open config on apache section and search the port 80 or you can use ctrl + f and type 80 and find the line with "Listen 80" change the line to "Listen 8080" and another line with "Servername localhost 80" change the line to "Servername localhost 8080"
  4. default environment port of the project is 3306 just in case if your localhost have a different port of mysql service
  5. create schema or database with name health_care and import table inside raw-database folder on root directory
  6. now you are good to go
    
# Valet
    alternative valet package you can access it at packagist.org and search for valet package
now this may become shortcut since you will no need to use apache virtual host anymore and you can directly open the project on browser with only the directory example: health-cares.test and the application will run automoticly on your localhost
  1. type composer global laravel/valet on your terminal
  2. after the proccess finish type valet install and wait again
  3. if the valet successfully installed on your localhost you only need to change your active directory inside your terminal into the repository directory with command cd c:/example
  4. now the last step is type valet park and the valet successfully set up
  5. you can access the repository by type health-cares.test on url browser
