<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('User', 'user', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('user', Input::post('user', isset($game) ? $game->user : ''), array('class' => 'span4', 'placeholder'=>'User')); ?>

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
				<?php echo Form::input('status', Input::post('status', isset($game) ? $game->status : ''), array('class' => 'span4', 'placeholder'=>'Status')); ?>

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
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>