<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\ForumForm;


class ForumCtrl {
    
    private $form;
    private $posts;
    private $comments;
    
    public function __construct(){
        
        $this->form = new ForumForm();
        
    }
    
    function validatePost(){
        $this->form->id = ParamUtils::getFromRequest('id',true,'Błędne wywołanie aplikacji');
        $this->form->title = ParamUtils::getFromRequest('title',true,'Błędne wywołanie aplikacji');
        $this->form->contents = ParamUtils::getFromRequest('contents',true,'Błędne wywołanie aplikacji');
        
        
        if (empty(trim($this->form->title))) {
                Utils::addErrorMessage('Wprowadź tytuł');
        }
        if (empty(trim($this->form->contents))) {
                Utils::addErrorMessage('Wprowadź zawartość wpisu');
        }
        if(strlen($this->form->title) > 100){
                Utils::addErrorMessage('Tytuł wpisu nie może przekraczać 100 znaków');
        }
        if(strlen($this->form->contents) > 1000){
                Utils::addErrorMessage('Treść wpisu nie może przekraczać 1000 znaków');
        }

        if ( App::getMessages()->isError() ) return false;

        return ! App::getMessages()->isError();
    }
    
    
    public function action_addPostDisplay(){
       
       App::getSmarty()->assign('form', $this->form);
       
       App::getSmarty()->display('PostCreation.tpl');
        
    }
    
    public function action_addPost(){
     
       if ($this->validatePost()){

            if ($this->form->id == '') {
                App::getDB()->insert("post", [
                     "title" => $this->form->title,
                     "contents" => $this->form->contents
                 ]);

                 Utils::addInfoMessage('Wpis został utworzony');

            }
            else
            {
                App::getDB()->update("post", [
                     "title" => $this->form->title,
                     "contents" => $this->form->contents
                         ], [
                     "id" => $this->form->id
                 ]);
                Utils::addInfoMessage('Wpis został edytowany');
           }
           
           App::getRouter()->forwardTo('listPosts');
           
       }
       else{   
           
            App::getSmarty()->assign('form', $this->form);
            App::getSmarty()->display('PostCreation.tpl');
        
       }
    }
    
    function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    
    public function action_editPostDisplay(){
            //UPRAWNIENIA ADMINISTRATORA LUB USER ID TAKIE SAME
        
        if ($this->validateEdit()) {
            
            
            try {
                
                $record = App::getDB()->get("post", "*", [
                    "id" => $this->form->id
                ]);
                
                $this->form->id = $record['id'];
                $this->form->title = $record['title'];
                $this->form->contents = $record['contents'];
                
                App::getSmarty()->assign('form', $this->form);
                App::getSmarty()->display('PostCreation.tpl');
       
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        
    }
    
    public function action_listPosts(){
        
        try {
            $this->posts = App::getDB()->select("post", [
                    "id",
                    "title"
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        App::getSmarty()->assign('posts', $this->posts);
        App::getSmarty()->display('PostList.tpl');
        
    }
    
    public function action_viewPost(){
        
        if ($this->validateEdit()){
        
            try {

                $record = App::getDB()->get("post", "*", [
                    "id" => $this->form->id
                ]);

                $this->form->id = $record['id'];
                $this->form->title = $record['title'];
                $this->form->contents = $record['contents'];
                
                $this->comments = App::getDB()->select("comment", [
                    "contents"
                ],[
                     "post_id" => $this->form->id
                 ]
                );
                
            }
            catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            App::getSmarty()->assign('form', $this->form);
            App::getSmarty()->assign('comments', $this->comments);
            App::getSmarty()->display('ViewPost.tpl');
        }
    }
    
}
