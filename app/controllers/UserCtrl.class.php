<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserForm;

class UserCtrl {
    
    private $form;
    private $accounts;
    
    public function __construct(){
        
        $this->form = new UserForm();
        
    }
    
    function validateUser(){
        
        $this->form->id = ParamUtils::getFromRequest('id',true,'Błędne wywołanie aplikacji');
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
        else{
            
            $count = App::getDB()->count("account", "*", [
                "login" => $this->form->login
            ]);

            if ($count > 0){
                Utils::addErrorMessage('Błędny login');
            }
                            
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
    
    
    public function action_addUserDisplay(){
        
            //UPRAWNIENIA ADMINISTRATORA
        
        $this->form = new UserForm();
        
        $this->form->id = "";
        $this->form->name = "";
        $this->form->surname = "";
        $this->form->login = "";
        $this->form->role = "";

        App::getSmarty()->assign('form', $this->form);
       
        App::getSmarty()->display('UserCreation.tpl');
       
  
    }
    
    
    public function action_addUser(){
        
            //UPRAWNIENIA ADMINISTRATORA
        
       if ($this->validateUser()){
           
           try{
               $role = "user";
               
               if($this->form->role == "admin"){
                   $role = "admin";
               }
               
               if ($this->form->id == '') {
               
                App::getDB()->insert("account", [
                    "first_name" => $this->form->name,
                    "last_name" => $this->form->surname,
                    "login" => $this->form->login,
                    "password" => $this->form->password,
                    "role" => $role
                ]);
               
                Utils::addInfoMessage('Udane zapisanie rekordu');
                
               }
               else{
                App::getDB()->update("account", [
                     "first_name" => $this->form->name,
                     "last_name" => $this->form->surname,
                     "login" => $this->form->login,
                     "password" => $this->form->password,
                     "role" => $role
                         ], [
                     "id" => $this->form->id
                 ]);
                Utils::addInfoMessage('Udane edytowanie rekordu');
               }
               
               App::getRouter()->forwardTo('listUsers');
                
           } catch (Exception $ex) {

           }
           
       }
       else{
       
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('UserCreation.tpl');
        
       }
    }
    
    
    public function action_listUsers(){
            //UPRAWNIENIA ADMINISTRATORA
        
        try {
            $this->accounts = App::getDB()->select("account", [
                    "id",
                    "first_name",
                    "last_name",
                    "login",
                    "role"
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        App::getSmarty()->assign('accounts', $this->accounts);
        
        App::getSmarty()->display('UserList.tpl');
    }
    
    function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    
    public function action_editUserDisplay(){
            //UPRAWNIENIA ADMINISTRATORA
        
        if ($this->validateEdit()) {
            
            
            try {
                
                $record = App::getDB()->get("account", "*", [
                    "id" => $this->form->id
                ]);
                
                $this->form->id = $record['id'];
                $this->form->name = $record['first_name'];
                $this->form->surname = $record['last_name'];
                $this->form->login = $record['login'];
                $this->form->role = $record['role'];
                
                App::getSmarty()->assign('form', $this->form);
                App::getSmarty()->display('UserCreation.tpl');
       
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        
    }
    
    public function action_deleteUser(){
        
            //UPRAWNIENIA ADMINISTRATORA
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("account", [
                    "id" => $this->form->id
                ]);
                Utils::addInfoMessage('Udane usunięcie rekordu');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('listUsers');
    }
}
