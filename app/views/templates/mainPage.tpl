<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
    
        
</head>
    
<body>
    
        {if count($conf->roles)>0}
        <div class="pure-menu pure-menu-horizontal" style="margin-left: 1em;">
                <a href="{$conf->action_root}listUsers" class="pure-menu-heading pure-menu-link">Użytkownicy</a>
                <a href="{$conf->action_root}listPosts" class="pure-menu-heading pure-menu-link">Wpisy</a>

        {if count($conf->roles)>0}
                <a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
        {else}	
                <a href="{$conf->action_root}loginShow" class="pure-menu-heading pure-menu-link">Zaloguj</a>
        {/if}
        {/if}
        </div>
        <div class="pure-u-1-2" style="margin-top: 1em; margin-left: 1em;">
            {block name=content} Domyślna treść zawartości .... {/block}

            {block name=messages}

                {if $msgs->isMessage()}
                <div class="messages bottom-margin">
                        <ul>
                        {foreach $msgs->getMessages() as $msg}
                        {strip}
                                <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                        {/strip}
                        {/foreach}
                        </ul>
                </div>
                {/if}

            {/block}
        </div>
</body>
</html>