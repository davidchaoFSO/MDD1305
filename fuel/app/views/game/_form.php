<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('User', 'user', array('class'=>'control-label')); ?><!--NOTE: this needs to be changed once auth is in-->

			<div class="controls">
				<?php echo Form::input('user', Input::post('user', \Session::get('username')), array('class' => 'span4', 'placeholder'=>\Session::get('username'), 'readonly')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('title', Input::post('title', isset($game) ? $game->title : ''), array('class' => 'span4', 'placeholder'=>'Title')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>
	
			<div class="controls">
				<!-- Custom dropdown for status -->
				<?php echo Form::select('status', Input::post('status', isset($game) ? $game->status : ''),array(
				    'In Progress' => 'In Progress',
				    'Stuck' => 'Stuck',
				    'Not Started' => 'Not Started',
				    'Finished' => 'Finished',
					),array('class' => 'span4'));?>
			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Comment', 'comment', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::textarea('comment', Input::post('comment', isset($game) ? $game->comment : ''), array('class' => 'span8', 'rows' => 8, 'placeholder'=>'Comment')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-large btn-warning')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>