<?php $__env->startSection('content'); ?>

	
<div class="row">

	<div class="col-md-6 offset-3">
		<div class="card card-default">
			<div class="card-header">
				<span><?php echo e($post->user->name); ?> 

					&nbsp; <span class="float-right"> <?php echo e($post->created_at->diffForHumans()); ?>


					<form class="form-inline float-right" style="clear: none;"action="/home/<?php echo e($post->id); ?>" method="post">
					<?php if($post->user->id == Auth::user()->id): ?>
						| <a href="/home/<?php echo e($post->id); ?>/edit">Edit</a> |
						<?php echo e(method_field('delete')); ?>

						<?php echo e(csrf_field()); ?>

						<button class=" btn btn-link text-warning" style="clear: none;padding: 0; margin: 0;">Delete</button>
					</form>
					<?php endif; ?>
						</span>
				</span>
			</div>
			<div class="card-body">
				<div>
					<?php echo e($post->content); ?>

				</div>
			</div>
			<div class="card-footer clearfix" style ="background-color: #fff;">
				<a href="#" id="like-count-<?php echo e($post->id); ?>" class="float-right" data-toggle="modal" data-target="#myModal_<?php echo e($post->id); ?>"><?php echo e($post->likes->count()); ?> like(s)</a>

				<?php if($post->user->id != Auth::user()->id): ?>
				<a href="javascript:void(0)" data-pg="<?php echo e($post->id); ?>" class="btn btn-info like-post btn-info float-left">Like</a>
				<?php endif; ?>

				<!-- Modal -->
				<div id="myModal_<?php echo e($post->id); ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">People who liked this post: </h4>
							</div>
							<div class="modal-body">
								<p>
									<?php $__empty_1 = true; $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<div>
										<a href="/profile/<?php echo e($like->liker->username); ?>"><?php echo e($like->liker->username); ?></a>
									</div>  
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									no likes
									<?php endif; ?>
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				<!-- End of modal -->
			</div>

		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>