<?php $__env->startSection('content'); ?>

<div class="row">

    <div id="todolist" class="col-md-3" style="padding-left: 40px; padding-right: 0px;">
        <div class="card card-default">
            <div class="card-header">
                Add to Your To-do-list:
            </div>
                <div class="card-body" style="padding-left: 5px; padding-right: 5px; padding-bottom: 10px; padding-top: 10px">
                    <form name="" id="formToDo" class="form control" action="" style="padding-left: 5px; padding-right: 5px; padding-bottom: 10px; padding-top: 10px">
                        <input type="text" id="newToDo" style="width:80%;" />
                        <button class="btn-sm btn-primary" style="width:19%;" type = "button" onclick = "buttonMake()"> Add </button>
                        <br/><br/>
                    </form>
                </div>

                <div class="card-footer" id ="toDoList">
                    <?php $__empty_1 = true; $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <button class="btn btn-success addToDoButton" id="<?php echo e($list->id); ?>"> <?php echo e($list->content); ?> </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>No List Found</p>
                    <?php endif; ?>
                </div>
        </div>
    </div>

    <div id="posts" class="col-md-6">
        <div id="addpost" class="row" style="margin-bottom:13px;">
            <div class="col">
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
        <div id="feed" class="row">
            <div class="col">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="" style="margin-bottom:5px;">
                <div class="card card-default">
                    <div class="card-header">
                        <span><?php echo e($post->user->name); ?> 
                            &nbsp; <span class="float-right"> <?php echo e($post->created_at->diffForHumans()); ?>

                                <form class="form-inline float-right" style="clear: none;"action="/home/<?php echo e($post->id); ?>" method="post">
                                <?php if($post->user->id == Auth::user()->id): ?>
                                    &nbsp; | &nbsp; <a href="/home/<?php echo e($post->id); ?>/edit">Edit</a> &nbsp; | &nbsp;
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
    </div>



    <div id="weight" class="col-md-3" style="padding-left: 0px; padding-right: 40px;">
    <div id="weightcal" class="card card-default">
            <div>
                <div class="wcal">
                    <div class="card-header">
                        Input Weight:
                    </div>
                    <div class="card-body" style="padding-left: 5px; padding-right: 5px; padding-bottom: 4px; padding-top: 10px;">
                        <form name="" id="formWeightCal" class="form control" action="" style="padding-left: 5px; padding-right: 5px; padding-bottom: 10px; padding-top: 10px;">
                            <input type="text" id="weightInput" style="width:80%;"  />
                            <button class="btn-sm btn-primary" type = "button" onclick = "inputWeight()" style="width:19%;"> Go </button>
                        </form>


                        <div id = "weightMsg">

                            <span id="weightErrorMsg"></span>
                            <span id="valueForWeight">

                            <?php if( ( ($weight2 - $weight1) >= 5) and ($weight1 != null) ): ?>

                            <p> You gained: <span style="color:red;"><?php echo e($weight2 - $weight1); ?></span> <span style="color:red;">Better work your hardest the next time!</span></p>

                            <?php elseif( ($weight2 - $weight1) <= -5 and ($weight1 != null) ): ?>

                            <p> You lost: <?php echo e((($weight2 - $weight1) * -1)); ?> &nbsp; Keep the same spirit up!</p>

                            <?php endif; ?>

                            </span>
                        </div>
                    </div>                    


                    <div id ="weightList" class="card-footer">
                        <?php $__empty_1 = true; $__currentLoopData = $weights->reverse()->slice(0, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>


                            <p id="<?php echo e($weight->id); ?>" class="addToWeight"> Weight: <?php echo e($weight->weight); ?> &emsp; Date: <?php echo e(Carbon\Carbon::parse($weight->created_at)->format('D, j F Y')); ?> </p>
                              

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>No Records Found</p>
                        <?php endif; ?>

                    </div>

                </div>  
            </div>
        </div>

    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>