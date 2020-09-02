###################
Payment System
###################

**Payment System** is a sliced part of the POS (point of sale) application that is used to handle payments and payments confirmation.

**************************
Features
**************************
- Registration
- Login 
- Dashboard
- Product Purchase
- Payment Confirmation Sender

*******************
Server Requirements
*******************

Programing Language : PHP 5.6 (Codeigniter 3.16)  
Front End : Booststrap 3.2, jQuery v1.11.1, Font Awesome 4.5.0 

************
Installation
************
1. Install XAMPP / LAMPP
2. Put the Project Folder (payment_system) under the "**htdocs**" directory
3. Create new database on MYSQL, then import payment_system/db/payment.sql on MYSQL
4. Open file ***payment_confirmation/application/config/config.php***, then set the value of the variable : **$config['base_url']**
5. Open file ***payment_confirmation/application/config/database.php*** , then config the index 	**'username'**, **'password'**, **'database'** of the variable : **$db['default']**

*******
Login
*******

**Login as User**  
url 	 : https://localhost/payment_system/login  
username : User  
password : 12341234  

**Login as Admin**  
url 	 : https://localhost/payment_system/login  
username : Admin  
password : 12341234  

