{extends file="mainPage.tpl"}

{block name=content}
        
    <form action="{$conf->action_url}addUser" method="post">
        <table class="pure-table">
        <tr>
            <td><label for="name">Imie </label></td>
            <td><input id="name" type="text" name="name" /></td>
        </tr>
	
        <tr>
            <td><label for="surname">Nazwisko </label></td>
            <td><input id="surname" type="text" name="surname" /></td>
        </tr>
	
        <tr>
            <td><label for="login">Login </label></td>
            <td><input id="login" type="text" name="login" /></td>
        </tr>
        
        <tr>
            <td><label for="pasw">Hasło </label></td>
            <td><input id="pasw" type="text" name="pasw" /></td>
        </tr>
        
        <tr>
            <td><label>Uprawnienia </label></td>
            <td>
            <input type="radio" id="user" name="role" value="user" checked />
            <label for="user">Uzytkownik</label>

            <input type="radio" id="admin" name="role" value="admin" />
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
