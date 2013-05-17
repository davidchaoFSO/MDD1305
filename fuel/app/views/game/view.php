
<div class="span12">
<h3><span class='muted'>Viewing</span> <?php echo $game->title; ?></h3>
</div>
<hr>
<!--<p>
	<strong>User:</strong>
	<?php echo $game->user; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $game->title; ?></p>-->
<div class='row-fluid'>
<div class='span4'>
<p>
	<strong>Status:</strong>
	<?php 
	if($game->status=='In Progress'){
		echo "<span class='label label-success'>$game->status</span>"; 
	}else if($game->status=='Stuck'){
		echo "<span class='label label-important'>$game->status</span>"; 
	}else if($game->status=='Finished'){
		echo "<span class='label label-info'>$game->status</span>"; 
	}elseif($game->status=='Not Started'){
		echo "<span class='label'>$game->status</span>"; 
	}else{
		echo $game->status; 
	}
	?>
</p>
</div>
<div class='span8'>
<p>
	<strong>Comment:</strong>
	<?php echo $game->comment; ?></p>
</div>
</div>
<div class='btn-group'>
<?php echo Html::anchor('game', 'Back to Game List',array('class' => 'btn btn-inverse')); ?>
<?php echo Html::anchor('game/edit/'.$game->id, 'Edit This Entry',array('class' => 'btn btn-warning')); ?>
</div>