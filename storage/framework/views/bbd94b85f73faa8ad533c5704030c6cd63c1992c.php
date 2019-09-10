<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-d">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>Add rant</h1>
				</div>
				<div class="panel-body">
					<form class="form-group" action="/posts" method="POST">
						<?php echo e(csrf_field()); ?>

						<textarea name="content" class="form-control"></textarea>
						<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" />
						<input type="submit" class="btn btn-sucess pull-right" value="Rant" />
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>