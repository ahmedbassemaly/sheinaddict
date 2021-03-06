<?php
// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sheinaddict');

// App Root
//echo dirname(dirname(__FILE__));
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('URLROOT', 'http://localhost/sheinaddict/public/');
// define('URLROOT', 'https://sheinaddict.herokuapp.com/public/');

// Site Name
define('SITENAME', 'Shein Addict');

define('APP_VERSION', '1.2');

//public pages path
define('VIEWS_PATH', '../app/views/');

//Images Root
// define('ImageRoot', '../app/views/images/');
define('ImageRoot', 'http://localhost/sheinaddict/app/views/images/');

//Images Root for uploads ~used in edit FAQ~
// define('ImageRoot2', '../app/views/images/uploads');
define('ImageRoot2', 'http://localhost/sheinaddict/app/views/images/uploads/');
