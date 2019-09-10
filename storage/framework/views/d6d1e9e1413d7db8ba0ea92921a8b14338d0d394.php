<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Isko Get Fit</title>


    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/dynamic.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/light.css')); ?>" rel="stylesheet">


    <link rel="fav icon" href="<?php echo e(url('photos/IGFlogo.png')); ?>" >
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <?php if(auth()->guard()->guest()): ?>
                <a class="navbar-brand navbar mr-auto" href="<?php echo e(url('/')); ?>">
                    Isko Get Fit
                </a>
                <?php else: ?>
                <a class="navbar-brand mr-auto" href="/profile/<?php echo e(Auth::user()->username); ?>">
                    <?php echo e(Auth::user()->username); ?>

                </a>

                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Center Side Of Navbar -->
                    <?php if(auth()->guard()->guest()): ?>

                    <?php else: ?>
                    <ul class="navbar-nav mx-auto" style="align-items: center; justify-content: center; display: flex;">
                        <div>
                            <li>
                                <a class="" style="position: center; padding: none; margin:none;" href="<?php echo e(url('/home')); ?>">
                                <img style="width:45px; height:45px; " src="<?php echo e(url('photos/IGF logo.png')); ?>" />
                                </a>
                            </li>
                        </div>
                    </ul>
                    <?php endif; ?>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <?php if(auth()->guard()->guest()): ?>
                        

                        <?php else: ?>  
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <!-- this is where edit profile go -->


                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>

                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                <!-- </div> -->
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/todolist.js')); ?>"></script>
    <script src="<?php echo e(asset('js/weightcal.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html>
