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
<div class="container text-center">
    <h1>Services</h1>
    <table class="table table-striped text-center">
        <thead>
        <tr class="font-weight-bolder">
                <td>Service Name</td>
                <td>Service Description</td>
                <td>Price</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach (($services?:[]) as $service): ?>
            <tr>
                <td><?= ($service['service_name']) ?></td>
                <td><?= ($service['service_description']) ?></td>
                <td><?= ($service['service_price']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php echo $this->render('includes/footer.html',NULL,get_defined_vars(),0); ?>
</body>