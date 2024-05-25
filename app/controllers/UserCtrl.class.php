<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserForm;

class UserCtrl {
    
    private $form;
    
    public function __construct(){
        
        $this->form = new UserForm();
        
    }
    
    function validateUser(){
        //$this->form->id = ParamUtils::getFromRequest('id',true,'Błędne wywołanie aplikacji id');
        $this->form->name = ParamUtils::getFromRequest('name',true,'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname',true,'Błędne wywołanie aplikacji');
        $this->form->login = ParamUtils::getFromRequest('login',true,'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('pasw',true,'Błędne wywołanie aplikacji');
        $this->form->role = ParamUtils::getFromRequest('role',true,'Błędne wywołanie aplikacji');
        
        if (empty(trim($this->form->name))) {
                Utils::addErrorMessage('Wprowadź imię');
        }
        if (empty(trim($this->form->surname))) {
                Utils::addErrorMessage('Wprowadź nazwisko');
        }
        if (empty(trim($this->form->login))) {
                Utils::addErrorMessage('Wprowadź login');
        }
        if (empty(trim($this->form->password))) {
                Utils::addErrorMessage('Wprowadź hasło');
        }
        if (empty(trim($this->form->role))) {
                Utils::addErrorMessage('Brak roli użytkownika');
        }

        if ( App::getMessages()->isError() ) return false;

        return ! App::getMessages()->isError();
    }
    
    public function action_addUser(){
        
       if ($this->validateUser()){
           
           //DODAĆ WALIDACJĘ DODAWANIA ROLI
           
           try{
               $role = "user";
               
               if($this->form->role == "admin"){
                   $role = "admin";
               }
               
               App::getDB()->insert("account", [
                "first_name" => $this->form->name,
                "last_name" => $this->form->surname,
                "login" => $this->form->login,
                "password" => $this->form->password,
                "role" => $role
               ]);
               
		Utils::addInfoMessage('Pomyślnie zapisano rekord');
               
           } catch (Exception $ex) {

           }
           
       }
        
       App::getSmarty()->display('UserCreation.tpl');
        
    }
    
    public function action_addUserDisplay(){
        
       App::getSmarty()->display('UserCreation.tpl');
    }
}
