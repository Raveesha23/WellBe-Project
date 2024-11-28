<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DBNAME', 'wellbe_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

<<<<<<< HEAD
	define('ROOT', 'http://localhost/MVC/public');
=======
	define('ROOT', 'http://localhost/mvc/public');
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b
} else {
	/** database config **/
	define('DBNAME', 'wellbe_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');
}

define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
