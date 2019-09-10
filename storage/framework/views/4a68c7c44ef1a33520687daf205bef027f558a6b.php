<style type="text/css">
    .profile-img{
        max-width: 200px;
        border: 5px solid #fff;
        border-radius:100%;
    }
</style>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card-body text-center">
            <?php if(Auth::user()->id == $user->id): ?>
            <div style="display: block">
                <a class="btn btn-outline-primary clearfix" href="/profile/<?php echo e(Auth::user()->username); ?>/edit/">Edit Profile</a>
            </div>
            <?php else: ?>
            <?php endif; ?>
            
            <h2><?php echo e($user->name); ?> <i>(<?php echo e($user->username); ?>)</i></h2>
                <h5><?php echo e($user->email); ?></h5>
                <h5><?php echo e(Carbon\Carbon::parse($user->bdate)->format('l j F Y')); ?>

                <?php if(Carbon\Carbon::parse($user->bdate)->diffInYears(\Carbon\Carbon::now()) > 0): ?>
                    [ <?php echo e(Carbon\Carbon::parse($user->bdate)->diffInYears(\Carbon\Carbon::now())); ?>

                    
                    <?php if(Carbon\Carbon::parse($user->bdate)->diffInYears(\Carbon\Carbon::now()) == 1): ?>
                        year old ]</h5>
                    <?php else: ?>
                        years old ]</h5>
                    <?php endif; ?>
                <?php else: ?>
                    </h5>
                <?php endif; ?>
                <!-- <input type="submit" class="btn btn-success" value="Follow"></input> -->
            </div>
        </div>
    </div>
    <?php if(Auth::user()->id == $user->id): ?>
    <div id="addpost" class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Post something
                    </div>
                    <div class="card-body">
                        <form class="form-group" action="/home" method="POST">
                            <?php echo csrf_field(); ?>
                            <textarea name="content" class="form-control" placeholder="Something on your mind?"></textarea>
                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" />
                            <input type="submit" class="btn btn-success float-right" value="Post" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>
    <div id="feed" class="row justify-content-center">
            <div class="col-md-8">
            <?php $__empty_1 = true; $__currentLoopData = $user->posts->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="">
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
                            <?php if(strlen($post->content) > 100): ?>
                            <?php echo e(substr($post->content, 0, 100)); ?>

                            <a href="/home/<?php echo e($post->id); ?>">Read more</a>
                            <?php else: ?>
                            <?php echo e($post->content); ?>

                            <?php endif; ?>
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
                                            <?php $__empty_2 = true; $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <div>
                                                <a href="/profile/<?php echo e($like->liker->username); ?>"><?php echo e($like->liker->username); ?></a>
                                            </div>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class=" col-md-3 offset-5">
                No posts found.
            </div>
            <?php endif; ?>

            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>