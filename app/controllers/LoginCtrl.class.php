<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\Validator;
use app\forms\LoginForm;

class LoginCtrl {
    
    private $form;

    public function __construct() {
        
        $this->form = new LoginForm();
        
    }

    public function validate() {
        
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if (!isset($this->form->login))
            return false;

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        if (App::getMessages()->isError())
            return false;

        $record = App::getDB()->get("account", "*", [
            "login" => $this->form->login
        ]);
        
        if( !empty(count($record)) ){
            
            if($record["password"] == $this->form->pass){
            
                RoleUtils::addRole($record["role"]);
                RoleUtils::setUser($record["id"]);
                
                
                
            }
            else{
                Utils::addErrorMessage('Niepoprawny login lub hasło');
            }
            
        } 
        else {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
    }
    
    public function action_login() {
        if ($this->validate()) {
            
            App::getRouter()->redirectTo('listPosts');
            
        } else {
            
                App::getSmarty()->assign('form', $this->form);
                App::getSmarty()->display('LoginPage.tpl');
            
        }
    }
    
    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('login');
    }
    
}
