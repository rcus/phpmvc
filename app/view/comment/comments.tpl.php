<h2><i class='fa fa-comments-o'></i> Kommentarer</h2>

<?php if (is_array($comments)) : ?>
<div class='comments'>
<?php foreach ($comments as $id => $comment) : ?>
<div class='comment'>
<img src="<?php echo "http://www.gravatar.com/avatar/" . md5(strtolower(trim($comment['mail']))) . "?s=50"; ?>">
<h4><?=$comment['name']?></h4>
<div class='links'><?=date('Y-m-d H:i', $comment['timestamp'])?> |
<a href='mailto:<?=$comment['mail']?>'>e-post</a> |
<a href='<?=$comment['web']?>'>www</a> |
<a href='<?=$this->url->create('comment/edit/'.$this->request->getRoute().'/'.$id)?>'>redigera</a> |
<a href='<?=$this->url->create('comment/delete/'.$this->request->getRoute().'/'.$id)?>'>ta bort</a></div>
<p><?=$comment['content']?></p>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
