<?php
abstract class BaseModel {
    protected static $db;

    public function __construct() {
        if (self::$db == null) {
            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (self::$db->connect_errno) {
                die('Cannot connect to database');
            }
            self::$db->set_charset("utf8");
        }
    }
}
