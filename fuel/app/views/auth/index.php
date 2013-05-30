


<h3>Welcome! Please Log In</h3>
<br>

<?php echo render('auth/_loginform'); ?>
<hr>
<?php echo Html::anchor('auth/create', 'Not a member? Sign up here!',array('class' => 'btn btn-small btn-info')); ?>
<p></p>

<?php echo Html::anchor('game/help', 'Forgot your password? Reset it here!',array('class' => 'btn btn-small btn-inverse')); ?>