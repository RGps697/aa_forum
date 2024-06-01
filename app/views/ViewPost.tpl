{extends file="mainPage.tpl"}

{block name=content}
    
        <div>
            {$form->title}
        </div>
        <div>
            {$form->contents}
        </div>

        <form action="{$conf->action_url}addComment" method="post">

            <input type="hidden" name="postId" value="{$form->id}">

            <div>
                <label for="surname">Treść komentarza: </label><br/>
                <textarea id="surname" type="text" name="contents"></textarea>
            </div>

            <input type="submit" value="Zapisz" />

        </form>
        
        <div>
            {foreach $comments as $c}
            {strip}
                <label for="contents">{$c["login"]}: </label>
                <div id="contents">
                    {$c["contents"]}
                </div>
            {/strip}
            {/foreach}
        </div>


{/block}
