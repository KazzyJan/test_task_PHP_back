<?php
require_once('./../database/connection.php');

class Model {
    protected $db;

    public function __construct() {
        $this->db = connect();
    }
}