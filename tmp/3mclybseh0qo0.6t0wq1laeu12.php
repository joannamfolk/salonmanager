<?php echo $this->render('includes/header.html',NULL,get_defined_vars(),0); ?>


<body>
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

<div class="container">
    <div class="row justify-content-center my-5">

        <h1 class="text-center"><strong>Stylists</strong></h1>

    </div>


    <div class="row justify-content-center">


        <?php foreach (($stylists?:[]) as $name=>$stylist): ?>
            <div class="col-md-4 mx-auto my-auto">

                <div class="stylist-card"><a href="#"><img src="<?= ($stylist[3]) ?>" alt="A jar with cream" class="img img-responsive"></a>
                    <div class="profile-name"><?= ($name) ?></div>
                    <div class="bio" id="bio"><strong>About:</strong><?= ($stylist[0]) ?></div><br>
                    <div class="skills" id="skill"><strong>Skills: </strong><?= ($stylist[1]) ?></div><br>
                    <div class="nickname" id="nickname"><strong>Nickname: </strong><?= ($stylist[2]) ?></div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php echo $this->render('includes/footer.html',NULL,get_defined_vars(),0); ?>
</body>