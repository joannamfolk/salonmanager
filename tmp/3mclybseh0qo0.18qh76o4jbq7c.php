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

<!-- Contact Begin -->
<div class="space d-flex justify-content-center mt-5 mx-auto">
    <div>
        <h3 class="text-dark mb-3">CONTACT US</h3>
        <p><strong>Phone:</strong> <a href="tel:5555555454">555-555-5454</a></p>
        <p><strong>Email:</strong> <a href="mailto:info@studioeleven.com">info@studioeleven.com</a></p>
        <br>
    </div>
</div>
<!-- Contact End -->

<!-- Thank You Start -->
<div class="space d-flex justify-content-center mb-4 mx-auto">
    <div class="alert alert-warning" role="alert">
        Thank you!  We'll get back to you soon.
    </div>
</div>
<!-- Thank You End -->

<!-- Map Start -->
<div class="space d-flex justify-content-center">
    <div class="row pr-lg-5 mx-auto">

        <h4 class="text-center"><strong>Our Location</strong></h4>
        <hr>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25583.58114981988!2d-122.3674086030565!3d47.623357127489975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5490156c0c1483a9%3A0xd52ec2915b07a0db!2sIntermezzo%20Salon%20%26%20Spa!5e0!3m2!1sen!2sus!4v1616118230894!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>
</div>
<!-- Map End -->

<?php echo $this->render('includes/footer.html',NULL,get_defined_vars(),0); ?>
</body>