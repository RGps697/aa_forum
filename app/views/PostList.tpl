{extends file="mainPage.tpl"}

{block name=content}
    
    <a href="{$conf->action_root}addPostDisplay" class="pure-button" style="margin-bottom: 1em;" >Utwórz wpis</a>
    
    <table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
            <tr>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Opcje</th>
            </tr>
    </thead>
    <tbody>
    {foreach $posts as $p}
    {strip}
            <tr>
                    <td>{$p["title"]}</td>
                    <td>{$p["login"]}</td>
                    <td>
                            <a class="button-small pure-button button-secondary" href="{$conf->action_url}viewPost/{$p['id']}">Wyświetl</a>
                            &nbsp;
                            <a class="button-small pure-button button-secondary" href="{$conf->action_url}editPostDisplay/{$p['id']}">Edytuj</a>
                    </td>
            </tr>
    {/strip}
    {/foreach}
    </tbody>
</table>

{/block}
