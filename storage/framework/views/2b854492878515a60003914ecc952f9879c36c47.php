<?php $__env->startSection('content'); ?>


	        <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-default">
                        <div class="card-header">
                            Edit Post
                        </div>
                        <div class="card-body">
                            <form class="form-group" action="/home/<?php echo e($post->id); ?>" method="POST">
								<?php echo e(method_field('put')); ?>

                                <?php echo csrf_field(); ?>
                                <textarea name="content" class="form-control"><?php echo e($post->content); ?></textarea>
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" />
                                <input type="submit" class="btn btn-success float-right" value="Save Changes" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>