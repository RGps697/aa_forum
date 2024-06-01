{extends file="mainPage.tpl"}

{block name=content}
    
        <style>
        .post-main {
                border: 1px solid #ddd;
                border-radius: 5px;
                padding: 20px;
                margin-bottom: 20px;
                background-color: #f9f9f9;
        }
        
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 30px;
        }
        
        .post-content {
            line-height: 1.5;
            margin-bottom: 10px;
        }
        
        .post-replies {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .post-replies .reply {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
        
        .post-replies .reply {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .post-replies .reply .author {
            border-top: solid 1px;
            border-bottom: solid 1px;
            font-weight: bold;
        }
        
        .post-add-reply {
            padding: 5px;
            margin-bottom: 10px;
            background-color: rgba(0, 255, 0, 0.1)
            
        }
        
        .post-add-reply textarea{
            margin-bottom: 5px;
            max-height: 200px;
            max-width: 90%;
            height: 100px;
            width: 80%;
        }
        
        </style>
    
        <div class="post-main">
            <div class="post-header">
                {$form->title}
            </div>
            <div class="post-content">
                {$form->contents}
            </div>
        </div>

        <form action="{$conf->action_url}addComment" method="post" class="post-add-reply">

            <input type="hidden" name="postId" value="{$form->id}">

            <div>
                <label for="surname">Treść komentarza: </label><br/>
                <textarea id="surname" type="text" name="contents"></textarea>
            </div>

            <input type="submit" value="Zapisz" />

        </form>
        
        <div class="post-replies">
            {foreach $comments as $c}
            {strip}
                <div class="reply">
                    <label for="contents" class="author">{$c["login"]}: </label>
                    <div id="contents" class="reply">
                        {$c["contents"]}
                    </div>
                </div>
            {/strip}
            {/foreach}
        </div>


{/block}
