<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('login'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('addUserDisplay', 'UserCtrl', ['admin']);
Utils::addRoute('addUser', 'UserCtrl', ['admin']);
Utils::addRoute('listUsers', 'UserCtrl', ['admin']);
Utils::addRoute('editUserDisplay', 'UserCtrl', ['admin']);
Utils::addRoute('editUser', 'UserCtrl', ['admin']);
Utils::addRoute('deleteUser', 'UserCtrl', ['admin']);
Utils::addRoute('addPostDisplay', 'ForumCtrl', ['user', 'admin']);
Utils::addRoute('addPost', 'ForumCtrl', ['user', 'admin']);
Utils::addRoute('listPosts', 'ForumCtrl', ['user', 'admin']);
Utils::addRoute('editPostDisplay', 'ForumCtrl', ['admin']);
Utils::addRoute('editPost', 'ForumCtrl', ['admin']);
Utils::addRoute('viewPost', 'ForumCtrl', ['user', 'admin']);
Utils::addRoute('addComment', 'CommentCtrl', ['user', 'admin']);
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
//Utils::addRoute('action_name', 'controller_class_name');

//
//App::getRouter()->setDefaultRoute('hello'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

//Utils::addRoute('hello', 'HelloCtrl');
//Utils::addRoute('action_name', 'controller_class_name');