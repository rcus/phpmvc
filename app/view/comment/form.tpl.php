<div class='comment-form'>
    <form method=post>
        <input type=hidden name="referer" value="<?=$this->request->getRoute()?>">
        <fieldset>
        <legend>Skriv en kommentar</legend>
        <p><label>Kommentar:<br/><textarea name='content'><?=$content?></textarea></label></p>
        <p><label>Namn:<br/><input type='text' name='name' value='<?=$name?>'/></label></p>
        <p><label>E-post:<br/><input type='text' name='mail' value='<?=$mail?>'/></label></p>
        <p><label>Hemsida:<br/><input type='text' name='web' value='<?=$web?>'/></label></p>
        <p class=buttons>
            <input type='submit' name='doCreate' value='Skicka' onClick="this.form.action = '<?=$this->url->create('comment/add/')?>'"/>
            <input type='reset' value='Återställ'/>
            <input type='submit' name='doRemoveAll' value='Ta bort alla' onClick="this.form.action = '<?=$this->url->create('comment/remove-all/'.$this->request->getRoute())?>'"/>
        </p>
        <output><?=$output?></output>
        </fieldset>
    </form>
</div>
