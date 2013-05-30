<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="control-group">
			<?php echo Form::label('Old Password', 'password', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::password('password', Input::post('password'), array('class' => 'span4')); ?>

			</div>
		</div>

		<div class="control-group">
			<?php echo Form::label('New Password', 'newpass', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::password('newpass', Input::post('newpass'), array('class' => 'span4')); ?>

			</div>
		</div>



		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Reset', array('class' => 'btn btn-large btn-warning')); ?>			</div>
		</div>


	</fieldset>
<?php echo Form::close(); ?>