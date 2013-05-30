

<?php $name = \Session::get('username'); ?>
<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "home" ); ?>'><?php echo Html::anchor('game/welcome','Home');?></li>
	<li class='<?php echo Arr::get($subnav, "games" ); ?>'><?php echo Html::anchor('game/index','Update Your Games');?></li>
	<li class='<?php echo Arr::get($subnav, "profile" ); ?>'><?php echo Html::anchor('auth/profile','Need to Edit Your Profile?');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('auth/logout','Not '.$name.'? Log out here!');?></li>
	<li class='<?php echo Arr::get($subnav, "help" ); ?>'><?php echo Html::anchor('game/help','Need Help?');?></li>

</ul>
<p>Logout</p>