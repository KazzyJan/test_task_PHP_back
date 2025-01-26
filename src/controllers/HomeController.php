<?php
require_once __DIR__ . '/../config/Paths.php';
class HomeController {

    public function __construct() {
    }
    public function index() {
        require_once HOME_INDEX_VIEW;
    }
}