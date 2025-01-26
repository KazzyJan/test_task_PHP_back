<?php
// Пути в константах для удобства
//Папка views
define('VIEW_PATH', __DIR__ .'/../views/');

//Пути до папок с вьюхами
define('HOME_VIEW_PATH', VIEW_PATH . 'home/');
define('ORDER_VIEW_PATH', VIEW_PATH . 'orders/');
define('CUSTOMER_VIEW_PATH', VIEW_PATH . 'customers/');

//Пути до конкретных вьюх
define('HOME_INDEX_VIEW', HOME_VIEW_PATH . 'index.php');
define('ORDER_INDEX_VIEW', ORDER_VIEW_PATH . 'index.php');
define('ORDER_DETAIL_VIEW', ORDER_VIEW_PATH . 'detail.php');
define('CUSTOMER_INDEX_VIEW', CUSTOMER_VIEW_PATH . 'index.php');
define('CUSTOMER_DETAIL_VIEW', CUSTOMER_VIEW_PATH . 'detail.php');


//Пути до паршиалов
define('PARTIALS_VIEW_PATH', VIEW_PATH . 'partials/');

define('HEADER_VIEW', PARTIALS_VIEW_PATH . 'header.php');
define('FOOTER_VIEW', PARTIALS_VIEW_PATH . 'footer.php');

// Пути до ассетов
define('ASSETS_URL', '/assets'); // Относительный путь от корня сайта

define('CSS_URL', ASSETS_URL . '/css');
define('JS_URL', ASSETS_URL . '/js');

define('CSS_INCLUDE', CSS_URL . '/main.css');

//404
define('PAGE_404', VIEW_PATH . '404.php');