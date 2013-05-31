<h3>Reset Password</h3>
<br>

<?php 
if (Auth::get_screen_name())
{
echo render('auth/_resetformb');
}else{
echo render('auth/_resetform');
}

?>
<hr>
<?php echo Html::anchor('auth/index', 'Try logging in again?',array('class' => 'btn btn-small btn-info')); ?>
<p></p>
<?php echo Html::anchor('game/help', 'Need more help? Return to Help Page!',array('class' => 'btn btn-small btn-inverse')); ?>
<p></p>
<?php echo Html::anchor('game/welcome', 'Back to Home',array('class' => 'btn btn-small btn-primary')); ?>