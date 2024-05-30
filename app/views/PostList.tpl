
{extends file="mainPage.tpl"}

{block name=content}
        
    <table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
            <tr>
                    <th>Tytuł</th>
                    <th>Opcje</th>
            </tr>
    </thead>
    <tbody>
    {foreach $posts as $p}
    {strip}
            <tr>
                    <td>{$p["title"]}</td>
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
