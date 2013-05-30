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