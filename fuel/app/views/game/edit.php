<h3><span class='muted'>Editing</span> <?php echo $game->title; ?></h3>
<br>

<?php echo render('game/_form'); ?>
<div class="btn-group">
	
	<?php echo Html::anchor('game', 'Back to Game List',array('class' => 'btn btn-inverse')); ?>
	<?php echo Html::anchor('game/view/'.$game->id, 'View This Entry',array('class' => 'btn')); ?>
</div>
