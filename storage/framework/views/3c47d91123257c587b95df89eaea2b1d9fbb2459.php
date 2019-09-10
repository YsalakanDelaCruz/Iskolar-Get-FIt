<style type="text/cass">
	.profile-img{
		max-width: 200px;
		border: 5px solid #fff
		border-radiusL 100%;
	}
</style>

<?php $__env->startSection('content'); ?>

	<div class="row">
		<div class="col-md-6 offset-3">
			<div class="card-body text-center">

                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e($user->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" name="username" value="<?php echo e($user->username); ?>" required autofocus>

                                <?php if($errors->has('username')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bdate" class="col-md-4 col-form-label text-md-right">Birthday</label>

                            <div class="col-md-6">
                                <input id="bdate" type="date" class="form-control<?php echo e($errors->has('bdate') ? ' is-invalid' : ''); ?>" name="bdate" value="<?php echo e($user->bdate); ?>" required autofocus>

                                <?php if($errors->has('bdate')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('bdate')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e($user->email); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Save Changes')); ?>

                                </button>
                            </div>
                        </div>
                    </form>

				

			</div>
		</div>
	</div> <!-- End of Profile Info -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>