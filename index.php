<!DOCTYPE html>
<html lang='en'>

<?php
//used to track logged in user
session_start();
include('header.php');
?>

<head>
    <meta http-equiv="X-UA-Compatible" content="width=device;charset=UTF-8">
    <!-- Bootstrap core CSS -->
    <title>Scot views</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style type="text/css">
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .bgimg2 {
            background-image: url("./assets/images/116b8511971396d224b86e2783ee6ea9.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: rgba(0, 0, 0, 0.5);
            /* set the transparency level here */
            opacity: 1;
        }

        .bg3 {
            background-image: url("./assets/images/Sanna.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: rgba(0, 0, 0, 0.5);
            /* set the transparency level here */
            opacity: 0.8;
        }

        .bgimg {
            background-image: url("./assets/images/bg.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: rgba(0, 0, 0, 0.5);
            /* set the transparency level here */
        }

        /* #body{
            background-color:#45474d
        } */
    </style>

    <script>
        var video = document.getElementById("my-video");
        var carousel = document.querySelector(".carousel-inner");

        video.addEventListener("ended", function() {
            // Move to the next slide
            var activeItem = carousel.querySelector(".active");
            var nextItem = activeItem.nextElementSibling || carousel.firstElementChild;
            activeItem.classList.remove("active");
            nextItem.classList.add("active");
        });
    </script>
</head>

<body class="container-fluid container" id="body">
    <div class="">
        <div id="myCarousel" class="carousel slide  carousel slide span8" data-ride="carousel">
            <div id="carouselExampleCaptions" data-mdb-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <!-- https://css-tricks.com/full-page-background-video-styles/ -->
                    <div class="item active">
                        <video width="100%" height="50%" autoplay loop muted id="my-video">
                            <source src="./assets/videos/scotviews.mp4" type="video/mp4">
                            Scot Views
                        </video>
                    </div>

                    <div class="item ">
                        <img src="assets/images/la.jpg" alt="Los Angeles" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Edinbrugh</h3>
                            <p>Edinbrugh is always so much fun!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="assets/images/chicago.jpg" alt="Chicago" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Glasgow</h3>
                            <p>Nighlife in Glasgow!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="assets/images/ny.jpg" alt="New York" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Falkirk</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="section">
            <br>
            <h2 class="w-100 text-center">Welcome to Scot Views</h2>
            <h2 class="w-100 text-center"> Enjoy a moment of peace as you walk along the sandy shores of our Hebridean islands. Soak up the energy of the crowd at a ceilidh gig in the heart of Glasgow. Feel the burn of joy and success as you reach the top of a hill in Aberdeenshire. </h2><br>

        </div><br>

        <main>
            <!-- START THE FEATURETTES -->
            <hr class="featurette-divider">

            <div class="row featurette bgimg text-center">
                <div class="col-md-7 ">
                    <h2 class="featurette-heading">Spring break ideas... <span class="text-muted">that will blow your mind.</span>
                    </h2>
                    <br><br><br>
                    <p class="lead ">Every season in Scotland is worth time exploring. Hit the sparkling slopes this spring, sweep your partner away to a luxury hotel, or take the little ones out to see the flowers. <br>Whatever kind of break you deserve right now, you’ll find it in Scotland.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="./assets/images/cairngorm-mountain.jpeg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>

            <hr class="featurette-divider ">

            <div class="row featurette row bgimg text-center">
                <div class="col-md-7 order-md-2">
                    <h1 class="featurette-heading">THE SILVER DARLING, ABERDEEN.... <span class="text-muted">Dhoom, Dunfermline</span></h1>
                    <p class="lead">Enjoy dinner with a view at The Silver Darling located on the harbour at Footdee. Boasting a unique heritage and stylish interior, tuck into a delectable selection of locally caught seafood and fish served up on a creative dish with the best Scottish produce. Head upstairs for floor-to-ceiling glass windows that offer an incredible panoramic view of the harbour and Aberdeen. Watch the ships sail by and keep an eye open for seals and dolphins bobbing around in the waters below as you enjoy a delicious meal.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="./assets/images/Dhoom-Dunfermline.jpg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette bgimg2 text-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading ">Sanna, Ardnamurchan,. <span class="text-muted"> westcoastwaters</span></h2>
                    <p class="lead">Home to the most westerly point on the British mainland, Corrachadh Mòr, Ardnamurchan is a scenic spot located in the beauty of the West Highlands Peninsula. It’s a great place to explore on two wheels, with cycle paths, trails and quiet roads, giving you the opportunity to explore this corner of Scotland at your own pace and in an eco-friendly way. <br> Gaelic for ‘headland of the great seas’, Ardnamuchan boasts its famous lighthouse, a rocky northern coast, and is designated as a National Scenic Area due to its mesmerising scenery and landscape.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bg3 bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="./assets/images/Sanna.png" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->



    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

<bottom>
    <?php
    include('footer.php');
    ?>
</bottom>

</html>