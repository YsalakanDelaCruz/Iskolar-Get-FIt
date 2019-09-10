<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Isko Get Fit</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Carme" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link href="css/welcome.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class = "main">
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <img src="photos/IGF logo.png"; style="width:20%">
                    <div class="title m-b-md">
                        Isko Get Fit
                    </div>
                        <?php if(Route::has('login')): ?>
                            <div class="links">
                                <?php if(auth()->guard()->check()): ?>
                                    <a href="<?php echo e(url('/home')); ?>">Home</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>">Login</a>
                                    <a href="<?php echo e(route('register')); ?>">Register</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>   
                </div>
            </div>
        </div>
        <div class = "about">
           <div class="flex-center position-ref full-height">
                <div class="aboutContent">
                        <h4>What is IGF?</h4>
                        <h1>ISKO GET FIT IS EVERYTHING ABOUT FITNESS</h1>
                        <p>IGF is passionate about living life to it's fullest.</p>
                        <p>Our mission is to promote physical fitness, self-appreciation, and social communications via our website.</p>
                        <p>You don’t need to spend hours in the gym in order to get in shape.</p>
                        <p>You don't need a lot of equipment to get in the best shape of your life.</p>
                        <p>The key to getting—and staying—fit is to always believe you can do it.</p>
                        <p>Never, ever give up. When you fail, just get back up and try again and the best part is that you brag to your friends</p>
                        <p>You can conquer the world one step at a time if you only put your mind to it.</p>
                </div>
            </div>
        </div>
            <div class = "meetTheTeam">
                <img src="photos/meetTheTeamBanner.jpg";>

                <div class = "flex-center">
                    <div class="row">
                      <div class="column">
                        <div class="card">
                          <img src="photos/jood.jpg"; style="width:100%">
                          <div class="container">
                            <h2>Jude Oriel Belayro</h2>
                            <p class="title2">Sr. Web Developer</p>
                          </div>
                        </div>
                      </div>

                      <div class="column">
                        <div class="card">
                        <img src="photos/ray.jpg"; style="width:100%">
                          <div class="container">
                            <h2>Ray Castor</h2>
                            <p class="title2">Sr. Designer</p>
                          </div>
                        </div>
                      </div>

                      <div class="column">
                        <div class="card">
                        <img src="photos/lakan.jpg"; style="width:100%">
                          <div class="container">
                            <h2>Emmanuel Rome Ysalakan Dela Cruz</h2>
                            <p class="title2">Sr. Web Developer</p>
                          </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <img src="photos/jose.jpg"; style="width:100%">
                          <div class="container">
                            <h2>Jose Fortaleza III</h2>
                            <p class="title2">Sr. Graphic Artist</p>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </body>
</html>
