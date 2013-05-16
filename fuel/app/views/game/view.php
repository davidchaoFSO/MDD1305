<h3>Viewing <span class='muted'>#<?php echo $game->id; ?></span></h3>

<p>
	<strong>User:</strong>
	<?php echo $game->user; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $game->title; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $game->status; ?></p>
<p>
	<strong>Comment:</strong>
	<?php echo $game->comment; ?></p>

<?php echo Html::anchor('game/edit/'.$game->id, 'Edit'); ?> |
<?php echo Html::anchor('game', 'Back'); ?>