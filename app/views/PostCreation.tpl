{extends file="mainPage.tpl"}

{block name=content}
            
    <form action="{$conf->action_url}addPost" method="post">
            
        <input type="hidden" name="id" value="{$form->id}">
    
        <table class="pure-table">
        <tr>
            <td><label for="name">Tytuł </label></td>
            <td><input id="name" type="text" name="title" value="{$form->title}" /></td>
        </tr>
	
        <tr>
            <td><label for="surname">Treść </label></td>
            <td><textarea id="surname" type="text" name="contents">{$form->contents}</textarea></td>
        </tr>
                
        <tr>
            <td/>
            <td><input type="submit" value="Zapisz" /></td>
        </tr>
        
        </table>
    </form>

{/block}
