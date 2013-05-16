<h3>Editing <span class='muted'>Game</span></h3>
<br>

<?php echo render('game/_form'); ?>
<p>
	<?php echo Html::anchor('game/view/'.$game->id, 'View'); ?> |
	<?php echo Html::anchor('game', 'Back'); ?></p>
