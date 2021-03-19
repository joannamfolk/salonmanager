<?php echo $this->render('includes/header.html',NULL,get_defined_vars(),0); ?>

<body>

<!-- Navigation -->
<nav id="" class="navbar navbar-expand-lg static-top">
    <div class="container">
        <a class="navbar-brand" href="<?= ($BASE) ?>"><img src="images/logo.png" alt="Studio 11 logo"></a>
        <button class="navbar-toggler navbar-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin">Dashboard</a>
                </li>
                <!-- Active Nav -->
                <li class="nav-item active">
                    <a class="nav-link" href="#">Log Out
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <!-- End Active Nav -->
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation -->

<div class="container mt-5 rounded shadow-sm  d-flex justify-content-center">
    <div>
        <h3>Logged In As:</h3>
    </div>
    <br>
    <div class="border w-50 m-5 text-center rounded shadow-lg">
        <button onclick="window.location.href='admin-add-product';" class="btn btn-primary btn-lg mt-3 rounded">
            Add Product
        </button>
        <br>
        <button onclick="window.location.href='admin-add-stylist';" class="btn btn-primary btn-lg mt-3 rounded">
            Add New Stylist
        </button>
        <br>
        <button onclick="window.location.href='<?= ($BASE) ?>';" class="btn btn-primary btn-lg mt-3 rounded">
            View Product Inventory
        </button>
        <br>
        <button onclick="window.location.href='<?= ($BASE) ?>';" class="btn btn-primary btn-lg mt-3 mb-3 rounded">
            View Employed Stylists
        </button>
        <br>
        <button onclick="window.location.href='admin-view-contacts';" class="btn btn-primary btn-lg mb-3 rounded">
            View Customer Queries
        </button>
        <br>
    </div>
</div>

</body>
</html>