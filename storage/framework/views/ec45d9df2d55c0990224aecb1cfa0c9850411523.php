<?php $__env->startSection('content'); ?>
	<div class="row">
		<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<div class="col-md-6 col-md-offset-d">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span><?php echo e($post->user->name); ?> 
						<?php if($post->user->id == Auth::user()->id): ?>
					| <a href="/posts/<?php echo e($post->id); ?>/edit">Edit</a> |</span>
						<?php endif; ?>
					<span class="pull-right"> <?php echo e($post->created_at->diffForHumans()); ?> </span>
				</div>
					<div class="panel-body">
						<div>
							<?php if(strlen($post->content) > 100): ?>
							<?php echo e(substr($post->content, 0, 100)); ?>

							<a href="/posts/<?php echo e($post->id); ?>">Read more</a>
							<?php else: ?>
								<?php echo e($post->content); ?>

							<?php endif; ?>
						</div>
					</div>
			<div class="panel-footer clearfix" style ="background-color: #fff;">
				<a href="#" class ="pull-right">Like</a>
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
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
		No posts found.
	<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>