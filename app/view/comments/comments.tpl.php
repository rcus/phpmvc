
<h2><i class='fa fa-comments-o'></i> Kommentarer</h2>

<div class='comments'>
<?php
if (is_array($comments) && !empty($comments)) {
    foreach ($comments as $comment) :
        $info = $comment->getProperties();
        ?>
        <div class='comment'>
        <img src="<?php echo "http://www.gravatar.com/avatar/" . md5(strtolower(trim($info['email']))) . "?s=50"; ?>">
        <h4><?=$info['name']?></h4>
        <div class='links'><?=$info['time']?> |
        <a href='mailto:<?=$info['email']?>'>e-post</a> |
        <a href='<?=$info['web']?>'>www</a> |
        <a href='<?=$this->url->create('comments/edit/'.$this->request->getRoute().'/'.$info['id'])?>'>redigera</a> |
        <a href='<?=$this->url->create('comments/delete/'.$this->request->getRoute().'/'.$info['id'])?>'>ta bort</a></div>
        <p><?=$info['content']?></p>
        </div>
    <?php
    endforeach;
}
else { ?>
<p>Inga kommentarer att visa... :(</p>
<?php
} ?>
</div>
