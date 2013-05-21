<!-- Login Form -->

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="control-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('username', Input::post('username'), array('class' => 'span4', 'placeholder'=>'Username or email')); ?>

			</div>
		</div>


		<div class="control-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::password('password', Input::post('password'), array('class' => 'span4')); ?>

			</div>
		</div>

		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Log In', array('class' => 'btn btn-large btn-warning')); ?>			</div>
		</div>


	</fieldset>
<?php echo Form::close(); ?>