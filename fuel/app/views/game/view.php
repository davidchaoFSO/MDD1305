
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
//	Status Labeling
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
<?php 
//	Unstuck me Button - does nothing right now
	if($game->status=='Stuck'){
	echo Html::anchor('#', 'Unstuck Me! Not Working',array('class' => 'btn btn-large btn-warning', 'id'=>'unstuck'));
	}
?>
<!-- Incomplete Much more complicated than I thought
<script> 
var something = parses php object $game->comments into a javascript variable string with word+word+word;
$("unstuck").click((function() {
var youtube = "https://gdata.youtube.com/feeds/api/videos?q"+somestring+"&amp;orderby=relevance&amp;start-index=1&amp;max-results=10&amp;v=2&amp;alt=json";
$.getJSON( youtube)
.done(function( data ) {
$.each( data.items, function( i, item ) {
$( "<a/>" ).attr( "href", item.media.m ).appendTo( "#links" ); appends the links to links section

});
});
})();
});
</script>
-->
<div id="links"></div>
<hr>
<div class='btn-group'>
<?php echo Html::anchor('game', 'Back to Game List',array('class' => 'btn btn-inverse')); ?>
<?php echo Html::anchor('game/edit/'.$game->id, 'Edit This Entry',array('class' => 'btn')); ?>
</div>