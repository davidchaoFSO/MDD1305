<?php $name = \Session::get('username'); ?>
<div class="navbar">
    <div class="navbar-inner">
    <div class="container">
     
    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	    <span class="icon-bar"></span>
	    
    </a>
     
    <!-- Be sure to leave the brand out there if you want it shown -->
    <a class="brand" href="#">VG Unstuck</a>
     
    <!-- Everything you want hidden at 940px or less, place within here -->
    <div class="nav-collapse collapse">
	    <!-- .nav, .navbar-search, .navbar-form, etc -->
	    <ul class="nav pull-right">
			<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('game/welcome','Home');?></li>
			<li class='<?php echo Arr::get($subnav, "games" ); ?>'><?php echo Html::anchor('game/index','Update Your Games');?></li>
			<li class='<?php echo Arr::get($subnav, "profile" ); ?>'><?php echo Html::anchor('auth/profile','Need to Edit Your Profile?');?></li>

			<?php if (isset($name)): ?>

			<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('auth/logout','Not '.$name.'? Log out here!');?></li>
			
			<?php else: ?>

			<li class=''><?php echo Html::anchor('auth/index','Log in Here!');?></li>

			<?php endif; ?>

			<li class='<?php echo Arr::get($subnav, "help" ); ?>'><?php echo Html::anchor('game/help','Need Help?');?></li>

		</ul>
    </div>
     
    </div>
    </div>
    </div>
<h3><span class='muted'>Listing</span> Games</h3>

<br>
<?php if ($games): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Status</th>
			<th>Comment</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($games as $game): ?>		<tr>

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
<hr>
	<?php echo Html::anchor('game/create', 'Add new Game', array('class' => 'btn btn-warning')); ?>
	

</p>
