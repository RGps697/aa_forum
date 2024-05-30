<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\CommentForm;

class CommentCtrl {
    
    private $form;
    
    public function __construct(){
        
        $this->form = new CommentForm();
        
    }
    
    function validateComment(){
        
        $this->form->contents = ParamUtils::getFromRequest('contents',true,'Błędne wywołanie aplikacji');
        $this->form->postId = ParamUtils::getFromRequest('postId',true,'Błędne wywołanie aplikacji');
        
        if (empty(trim($this->form->contents))) {
                Utils::addErrorMessage('Wprowadź zawartość wpisu');
        }
        if (empty(trim($this->form->postId))) {
            Utils::addErrorMessage('Błędne przesłanie danych');
        }
        if(strlen($this->form->contents) > 500){
                Utils::addErrorMessage('Treść komentarza nie może przekraczać 500 znaków');
        }

        if ( App::getMessages()->isError() ) return false;

        return ! App::getMessages()->isError();
        
    }
    
    public function action_addComment(){
        
        if($this->validateComment()){
         
            try{
                
               App::getDB()->insert("comment", [
                    "contents" => $this->form->contents,
                    "post_id" => $this->form->postId
                ]);
               
                Utils::addInfoMessage('Udane zapisanie rekordu');
                
            } catch (Exception $ex) {

            }
                    
        }
        
        App::getRouter()->redirectTo('viewPost/'.$this->form->postId);        
    }
    
}
