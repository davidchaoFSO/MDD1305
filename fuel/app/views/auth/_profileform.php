<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<?php 

$first = Auth::get('firstname');
$last = Auth::get('lastname');
$birth = Auth::get('birthdate');
$letter = Auth::get('newsletter');
$question = Auth::get('question');
?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('First Name', 'firstname', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('firstname', Input::post('firstname', isset($first) ? $first : ''), array('class' => 'span4', 'placeholder'=>'John')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Last Name', 'lastname', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('lastname', Input::post('lastname', isset($last) ? $last : ''), array('class' => 'span4', 'placeholder'=>'Doe')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Birth Date', 'birthdate', array('class'=>'control-label')); ?>
	
			<div class="controls">
				<?php echo Form::input('birthdate', Input::post('birthdate', isset($birth) ? $birth : ''), array('class' => 'span4', 'placeholder'=>'2000-05-31', 'type'=>'date')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Security question: What is your mother&#39;s maiden name?', 'question', array('class'=>'control-label')); ?>
	
			<div class="controls">
				<?php echo Form::input('question', Input::post('question', isset($question) ? $question : ''), array('class' => 'span4', 'placeholder'=>'Smith')); ?>

			</div>
		</div>
		<div class="control-group">

			<?php echo Form::label('Yes, I would like to receive the VG Unstuck Newsletter.', 'newsletter', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::checkbox('newsletter', 'yes', $letter == 1 ,array( )); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-large btn-warning')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>