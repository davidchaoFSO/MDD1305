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
	<!-- FaceBook SDK -->
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
	<div class="span4 fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="250" data-show-faces="false" data-stream="true" data-show-border="true" data-header="true"></div>
	<div class="span8">
		<?php echo $content; ?>
	</div>
	</div>
	<hr />
	<footer>
		<div class="row-fluid">
		<div class="span4"></div>
		<div class="span4 offset4">
			<!--
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		-->
		<p>Copyright 2013. Created for Fullsail University for educational purposes only. Last Update: 5-30-2013.</p>
	</div>
	</div>
	<footer>
		
	</div>
	<?php echo Asset::js('http://code.jquery.com/jquery-1.10.0.min.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
</body>
</html>
