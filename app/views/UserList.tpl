{extends file="mainPage.tpl"}

{block name=content}
        
    <table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
            <tr>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Login</th>
                    <th>Rola</th>
                    <th>Opcje</th>
            </tr>
    </thead>
    <tbody>
    {foreach $accounts as $a}
    {strip}
            <tr>
                    <td>{$a["first_name"]}</td>
                    <td>{$a["last_name"]}</td>
                    <td>{$a["login"]}</td>
                    <td>{$a["role"]}</td>
                    <td>
                            <a class="button-small pure-button button-secondary" href="{$conf->action_url}editUserDisplay/{$a['id']}">Edytuj</a>
                            &nbsp;
                            <a class="button-small pure-button button-warning" href="{$conf->action_url}deleteUser/{$a['id']}">Usuń</a>
                    </td>
            </tr>
    {/strip}
    {/foreach}
    </tbody>
</table>

{/block}
