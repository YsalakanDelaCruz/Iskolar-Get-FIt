<style type="text/cass">
	.profile-img{
		max-width: 200px;
		border: 5px solid #fff
		border-radiusL 100%;
	}
</style>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-6 col-mid-offset-3">
			<div class="panel-body text-center">
				<img class="profile-img" src="<?php echo e(asset('img/vamp.png')); ?>" alt="" />

				<h2><?php echo e($user->name); ?> <i>(<?php echo e($user->username); ?>)</i></h2>
				<h5><?php echo e($user->email); ?></h5>
				<h5><?php echo e(Carbon\Carbon::parse($user->bdate)->format('l j F Y')); ?>


			<?php if(Carbon\Carbon::parse($user->bdate)->diffInYears(Carbon\Carbon::now()) > 0): ?> [ <?php echo e(Carbon\Carbon::parse($user->bdate)->diffInYears(Carbon\Carbon::now())); ?>


				<?php if(Carbon\Carbon::parse($user->bdate)->diffInYears(Carbon\Carbon::now()) == 1): ?> year old ]</h5>

				<?php else: ?>
					years old ]</h5>

				<?php endif; ?>
			<?php else: ?>
				</h5>
			<?php endif; ?>

				<input type="submit" class="btn btn-success" value="Follow"></input>
			</div>
		</div>
	</div> <!-- End of Profile Info -->
	<div class="row">
		<?php $__empty_1 = true; $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		<div class="col-md-6 col-mid-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span><?php echo e($user->name); ?></span>
					<span class="pull-right"> <?php echo e($post->created_at->diffForHumans()); ?>

						<?php if($post->user->id == Auth::user()->id): ?>
						[ <a href="/post/<?php echo e($post->id); ?>/edit">Edit</a> ]
						<?php endif; ?>
					</span>
				</div>
				<div class="panel-body panel-default">
					<div>
						<?php if(strlen($post->content)>100): ?>
							<?php echo e(substr($post->content, 0, 100)); ?>

							<a href="/posts/<?php echo e($post->id); ?>">Read more</a>
						<?php else: ?>
							<?php echo e($post->content); ?>

						<?php endif; ?>
					</div>
				</div>
				<div class="panel-footer clearfix" style="background-color: #fff;">
					<?php if($post->user->id == Auth::user()->id): ?>
						<form action="/posts/<?php echo e($post->id); ?>" method="post">
							<?php echo e(method_field('delete')); ?>

							<?php echo e(csrf_field()); ?>

							<button class="btn btn-warning">Delete</button>
						</form>
					<?php endif; ?>
					<a href="" class="pull-right">Hear! Hear!</a>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<div class="col-md-3 col-mid-offset-5">
				No posts found.
			</div>	
		<?php endif; ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>