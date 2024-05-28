<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    
</head>
    
<body>
    
<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_root}listUsers" class="pure-menu-heading pure-menu-link">Lista</a>
        <a href="{$conf->action_root}addUserDisplay" class="pure-menu-heading pure-menu-link">Dodaj użytkownika</a>
{if count($conf->roles)>0}
	<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
{else}	
	<a href="{$conf->action_root}loginShow" class="pure-menu-heading pure-menu-link">Zaloguj</a>
{/if}
</div>
    
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
</body>
</html>