<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VG Unstuck &#124; <?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.min.css'); ?>
	<?php echo Asset::css('bootstrap-responsive.min.css'); ?>
	<style>
		body { /*margin: 40px;*/ }
		#tophead {background-color: #3e0092;color: white;}
		#tophead h2 {padding-left: 40px;padding-top: 15px;}
	</style>
</head>
<body>
	<div id="tophead">
			<h2>VG Unstuck</h2>
			<hr>
	</div>
	<div class="container-fluid">
	<div class="row-fluid">
		
			
<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-error">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		
	</div>
		<div class="row-fluid">
		
<?php echo $content; ?>
		
		</div>
		<footer>
			<!--
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		-->
		</footer>
	</div>
	<?php echo Asset::js('http://code.jquery.com/jquery-1.10.0.min.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
</body>
</html>
