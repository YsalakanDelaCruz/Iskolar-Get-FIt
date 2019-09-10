<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Rant
				</div>
				<div class="panel-body">
					<form class="form-group" action="/posts/<?php echo e($post->id); ?>" method = "POST">
						<?php echo e(method_field('put')); ?>

						<?php echo e(csrf_field()); ?>

						<textarea name="content" class="form-group"><?php echo e($post->content); ?></textarea>
						<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
						<input type="submit" class="bn btn-success pull-right" value="Rant">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>