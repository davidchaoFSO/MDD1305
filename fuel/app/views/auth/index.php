
<h3>Log In</h3>
<br>

<?php echo render('auth/_loginform'); ?>

<?php echo Html::anchor('auth/create', 'Not a member? Sign up here!',array('class' => 'btn btn-small btn-info')); ?>
<p></p>

<?php echo Html::anchor('#', 'Forgot your password? Reset it here! NYI',array('class' => 'btn btn-small btn-inverse')); ?>