
<h3><span class='muted'>Listing</span> Games</h3>

<br>
<?php if ($games): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>User</th>	<!--NOTE: this needs to be changed once auth is in-->
			<th>Title</th>
			<th>Status</th>
			<th>Comment</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($games as $game): ?>		<tr>

			<td><?php echo $game->user; ?></td>	<!--NOTE: this needs to be changed once auth is in-->
			<td><?php echo $game->title; ?></td>
			<td><?php 
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
			</td>
			<td><?php echo $game->comment; ?></td>
			<td>
				<?php echo Html::anchor('game/view/'.$game->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('game/edit/'.$game->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('game/delete/'.$game->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Games.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('game/create', 'Add new Game', array('class' => 'btn btn-warning')); ?>

</p>
