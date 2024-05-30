<?php

require_once 'lib/Medoo/Medoo.php';
require_once 'core/App.class.php';

use core\App;
//use Medoo\Medoo;

//DATABASE DEFINITION
/*
App::getDB()->create("account", [
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


App::getDB()->create("post", [
  "id" => [
    "INT",
    "NOT NULL",
    "AUTO_INCREMENT",
    "PRIMARY KEY"
  ],
  "title" => [
          "VARCHAR(100)",
          "NOT NULL"
  ],
  "contents" => [
          "VARCHAR(1000)",
          "NOT NULL"
  ],
  "author_id" => [
    "INT",
    "NOT NULL"
  ]
]);
*/

App::getDB()->create("comment", [
  "id" => [
    "INT",
    "NOT NULL",
    "AUTO_INCREMENT",
    "PRIMARY KEY"
  ],
  "contents" => [
          "VARCHAR(500)",
          "NOT NULL"
  ],
  "post_id" => [
    "INT",
    "NOT NULL"
  ],
  "author_id" => [
    "INT",
    "NOT NULL"
  ]
]);
