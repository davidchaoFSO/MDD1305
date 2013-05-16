<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>VG Unstuck | <?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
		#tophead {background-color: #3e0092;color: white;}
		#tophead h2 {padding-left: 10px;padding-top: 10px;}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
		<div class="span12">
			<div id="tophead">
			<h2>VG Unstuck | <?php echo $title; ?></h2>
			<hr>
		</div>
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
	</div>
		<div class="row-fluid">
		<div class="span12">
<?php echo $content; ?>
		</div>
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
</body>
</html>
