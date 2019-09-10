<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link href="https://fonts.googleapis.com/css?family=Karma" rel="stylesheet" type="text/css">
        <link href="css/background.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <!-- <img href = "photos/background1.jpg" id = "aboutImg"/> -->


        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                        <a href="<?php echo e(route('login')); ?>">Login</a>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                </div>
            <?php endif; ?>
    
                <div class="content">
                    <div class="title m-b-md">
                        About
                    </div>

                    <div class = "des flex-center">
                        <p>
                            Hi I'm your always online pal when it comes to video games. I code because I find it interesting and the different ways to play by its rules that also happens when playing video games. I hope that you'd stay and still find my site interesting.
                        </p>
                    </div>    
                    <br/>  
                    <br/>  
                    <div class = "ars">
                        Things I follow:

                        <br/>    
                        <a href="https://rfpinix.com/" class="mylink">RF Pinix PVP</a>
                        <br/>
                        <a href="http://fate-go.us/" class="mylink">FATE/Grand Order NA</a>
                        <br/>
                        <a href="https://www.dndbeyond.com/" class="mylink">Everything DnD</a>
                        <br/>
                        <a href="http://store.steampowered.com/" class="mylink">Steam</a>
                        <br/>
                        <br/>
                        My Achievements:
                        <br/>
                        <a href="video/7slot.mp4" class = "mylink">7 Slot VIP Weapon<a/> 

                </div>
  
             
        </div>
    </body>
</html>