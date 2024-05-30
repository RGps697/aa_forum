<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('addUserDisplay'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('addUserDisplay', 'UserCtrl');
Utils::addRoute('addUser', 'UserCtrl');
Utils::addRoute('listUsers', 'UserCtrl');
Utils::addRoute('editUserDisplay', 'UserCtrl');
Utils::addRoute('editUser', 'UserCtrl');
Utils::addRoute('deleteUser', 'UserCtrl');
Utils::addRoute('addPostDisplay', 'ForumCtrl');
Utils::addRoute('addPost', 'ForumCtrl');
Utils::addRoute('listPosts', 'ForumCtrl');
Utils::addRoute('editPostDisplay', 'ForumCtrl');
Utils::addRoute('editPost', 'ForumCtrl');
Utils::addRoute('viewPost', 'ForumCtrl');
//Utils::addRoute('action_name', 'controller_class_name');

//
//App::getRouter()->setDefaultRoute('hello'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

//Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('action_name', 'controller_class_name');