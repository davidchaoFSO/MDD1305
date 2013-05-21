<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('auth/index','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('auth/create','Create');?></li>
	<li class='<?php echo Arr::get($subnav, "reset" ); ?>'><?php echo Html::anchor('auth/reset','Reset');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('auth/logout','Logout');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('auth/delete','Delete');?></li>

</ul>
<p>Delete</p>