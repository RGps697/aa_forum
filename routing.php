<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('addUserDisplay'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('addUserDisplay', 'UserCtrl');
Utils::addRoute('addUser', 'UserCtrl');
//Utils::addRoute('listUsers', 'UserCtrl');
//Utils::addRoute('addPost', 'ForumCtrl');
//Utils::addRoute('action_name', 'controller_class_name');

//
//App::getRouter()->setDefaultRoute('hello'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

//Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('action_name', 'controller_class_name');