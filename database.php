<?php

require_once 'lib/Medoo/Medoo.php';

use Medoo\Medoo;

//Create database "AA_forum" manually, tables are created automatically

$database = new \Medoo\Medoo([
    'database_type' => $conf->db_type,
    'database_name' => $conf->db_name,
    'server' => $conf->db_server,
    'username' => $conf->db_user,
    'password' => $conf->db_pass,
    'charset' => $conf->db_charset,
    //'collation' => $conf->db_charset,
    'option' => [
        $conf->db_option
    ]
]);

// 'utf8_polish_ci';

//DATABASE DEFINITION
/*
$database->create("account", [
    "id" => [
            "INT",
            "NOT NULL",
            "AUTO_INCREMENT",
            "PRIMARY KEY"
    ],
    "first_name" => [
            "VARCHAR(30)",
            "NOT NULL"
    ],
    "last_name" => [
            "VARCHAR(30)",
            "NOT NULL"
    ],
    "login" => [
            "VARCHAR(30)",
            "NOT NULL"
    ],
    "password" => [
            "VARCHAR(30)",
            "NOT NULL"
    ],
    "role" => [
            "VARCHAR(15)",
            "NOT NULL"
    ]
]);

*/