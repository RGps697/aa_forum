{extends file="mainPage.tpl"}

{block name=content}
        
    <form action="{$conf->action_url}addUser" method="post">
        
    <input type="hidden" name="id" value="{$form->id}">
    
        <table class="pure-table">
        <tr>
            <td><label for="name">Imie </label></td>
            <td><input id="name" type="text" name="name" {if !empty($form->title)}value="{$form->name}"{/if}/></td>
        </tr>
	
        <tr>
            <td><label for="surname">Nazwisko </label></td>
            <td><input id="surname" type="text" name="surname" {if !empty($form->surname)}value="{$form->surname}"{/if} /></td>
        </tr>
	
        <tr>
            <td><label for="login">Login </label></td>
            <td><input id="login" type="text" name="login" {if !empty($form->login)}value="{$form->login}"{/if}/></td>
        </tr>
        
        <tr>
            <td><label for="pasw">Hasło </label></td>
            <td><input id="pasw" type="text" name="pasw" /></td>
        </tr>
        
        <tr>
            <td><label>Uprawnienia </label></td>
            <td>
            <input type="radio" id="user" name="role" value="user" {if $form->role == 'user'  || empty($form->id)}checked{/if} />
            <label for="user">Uzytkownik</label>

            <input type="radio" id="admin" name="role" value="admin" {if $form->role == 'admin'}checked{/if} />
            <label for="admin">Administrator </label>
            </td>
        </tr>
        
        <tr>
            <td/>
            <td><input type="submit" value="Utwórz" /></td>
        </tr>
    </table>
    </form>

{/block}
