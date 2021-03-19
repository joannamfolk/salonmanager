<?php echo $this->render('includes/header.html',NULL,get_defined_vars(),0); ?>

<body class="products-body">
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

<!-- Products start -->
<section id="gallery mt-5">
    <div class="container">
        <div class="row">

            <!-- Card starts -->
            <?php foreach (($products?:[]) as $product): ?>
            <div class="col-lg-4 my-4">
                <div class="card d-inline-block">
                    <img src="images/product-soap.png" alt="image of our product" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= ($product['product_name']) ?></h5>
                        <h6 class="inline-block"><?= ($product['product_size']) ?></h6>
                        <p class="card-text mb-5"><?= ($product['product_description']) ?></p>

                        <p class="card-text"><?= ($product['product_price']) ?></p>
<!--                        &lt;!&ndash; TODO - Shopping Cart?? &ndash;&gt;-->
<!--                        <a href="" class="btn btn-outline-success mb-3 float-right">Buy Now!</a>-->

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- Card Ends -->

<!--            &lt;!&ndash; Form Starts &ndash;&gt;-->
<!--            <form class="form-horizontal">-->
<!--                <fieldset>-->

<!--                    &lt;!&ndash; Form Name &ndash;&gt;-->
<!--                    <legend>Form Name</legend>-->

<!--                    &lt;!&ndash; Text input&ndash;&gt;-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="name">Name</label>-->
<!--                        <div class="col-md-6">-->
<!--                            <input id="name" name="name" type="text" placeholder="J Schmo" class="form-control input-md" required="">-->

<!--                        </div>-->
<!--                    </div>-->

<!--                    &lt;!&ndash; Text input&ndash;&gt;-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-4 control-label" for="card">Credit Card</label>-->
<!--                        <div class="col-md-6">-->
<!--                            <input id="card" name="card" type="text" placeholder="12 Digits" class="form-control input-md" required="">-->

<!--                        </div>-->
<!--                    </div>-->

<!--                </fieldset>-->
<!--            </form>-->
<!--            &lt;!&ndash; Form Ends &ndash;&gt;-->

        </div>
    </div>
</section>
<!-- Products Container -->


<?php echo $this->render('includes/footer.html',NULL,get_defined_vars(),0); ?>
</body>