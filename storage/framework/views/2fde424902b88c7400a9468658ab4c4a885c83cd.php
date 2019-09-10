<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php if($post->user->id == Auth::user()->id): ?>
					<span>Posted by <?php echo e($post->user->name); ?> | <a href="/posts/<?php echo e($post->id); ?>/edit">Edit</a> | </span>
					<?php endif; ?>
					<span class="pull-right"><?php echo e($post->created_at->diffForHumans()); ?></span>
				</div>
				<div class="panel-body">
					<?php echo e($post->content); ?>

				</div>
				<div class="panel-footer clearfix">
					<a href="#" class="pull-right">Like</a>
					<?php if($post->user->id == Auth::user()->id): ?>
					<form action="/posts/<?php echo e($post->id); ?>" method="post">
						<?php echo e(method_field('delete')); ?>

						<?php echo e(csrf_field()); ?>

						<button class="btn btn-warning">Delete</button>
					</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>