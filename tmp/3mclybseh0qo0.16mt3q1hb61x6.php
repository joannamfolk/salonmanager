<?php echo $this->render('includes/header.html',NULL,get_defined_vars(),0); ?>

<body>

<!-- TODO: put footer in - fix styling for current nav link in CSS - make rest of text an off white (CSS AGAIN) -->
<!-- TODO: LOAD GOOGLE FONT!  (Find something for that studio 11 blurb that matches design proof -->

<!-- Navigation Start -->
<nav id="" class="navbar navbar-expand-lg static-top">
    <div class="container">
        <a class="navbar-brand" href="<?= ($BASE) ?>"><img src="images/logo.png" alt="Studio 11 logo"></a>
        <button class="navbar-toggler navbar-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!-- Active Nav -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= ($BASE) ?>">Home</a>
                </li>
                <!-- End Active Nav -->
                <li class="nav-item">
                    <a class="nav-link" href="services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stylist">Stylist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navigation End -->

<!-- Jumbotron Start -->
<section class="jumbotron">
    <div class="container">
    </div>
</section>
<!-- Jumbotron End -->

<!-- Intro Container Start -->
<div class="intro-container">
     <div class="row pr-lg-5 d-flex justify-content-center mx-auto">

        <!-- Left Side Content Start -->
        <div class="col-md-4 mb-4">
            <div class="view">
               <h1 class="display-4">Welcome to Studio 11</h1>
            </div>
        </div>
        <!-- Left Side Content End -->

        <!-- Right Side Content Start -->
        <div class="col-md-5 d-flex">
            <div>
                <p class="text-white font-weight-bolder">Our mission at Studio 11 is to provide a friendly, personalized service through a team of highly skilled and creative professionals.
                    Teamwork is our most valuable asset which ensures our clients are always number one, and we strive to exceed your expectations.</p>
            </div>
        </div>
        <!-- Right Side Content End -->

    </div>
</div>
<!-- Intro Container End -->

<!-- Cards Div Start -->
<div class="container">
    <div class="row justify-content-center my-5">

        <!-- Card 1 Start -->
        <div class="col-md-3 mx-auto my-auto">
            <h4 class="text-center"><strong>Product</strong></h4>
            <hr>
            <div class="profile-card-2"><a href="products"><img src="images/front-product.png" alt="A jar with cream" class="img img-responsive"></a>
                <div class="profile-name">All Clear</div>
                <div class="profile-username">Check out the latest line of product</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
        </div>
        <!-- Card 1 End -->

        <!-- Card 2 Start -->
        <div class="col-md-3 mx-auto my-auto">
            <h4 class="text-center"><strong>Services</strong></h4>
            <hr>
            <div class="profile-card-2"><a href="services"><img src="images/front-services.png" alt="An individual with curled hair" class="img img-responsive"></a>
                <div class="profile-name">Flat-Iron Curls</div>
                <div class="profile-username">Styles for the must have looks</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
        </div>
        <!-- Card 2 End -->

        <!-- Card 3 Start -->
        <div class="col-md-3 mx-auto my-auto">
            <h4 class="text-center"><strong>Stylist</strong></h4>
            <hr>
            <div class="profile-card-2"><a href="stylist"><img src="images/front-stylist.png" alt="A Studio 11 stylist" class="img img-responsive"></a>
                <div class="profile-name">Meet Carol</div>
                <div class="profile-username">One member of our diverse staff</div>
                <div class="profile-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
            </div>
        </div>
        <!-- Card 3 End -->
    </div>
</div>
<!-- Cards Div End -->

<!-- Video Container Start -->
<div class="container d-flex justify-content-center">
    <div class="row pr-lg-5 mx-auto">

        <!-- Video Content Start -->
        <div class="my-4">
            <div class="view">
                <h4 class="text-center"><strong>Latest Commercial</strong></h4>
                <hr>
                <iframe width="853" height="505" src="https://www.youtube.com/embed/mn8ROwUH4-Q?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <!-- Video Content End -->

    </div>
</div>
<!-- Video Container End -->

<!-- Footer Start -->
<?php echo $this->render('includes/footer.html',NULL,get_defined_vars(),0); ?>
<!-- Footer End -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>