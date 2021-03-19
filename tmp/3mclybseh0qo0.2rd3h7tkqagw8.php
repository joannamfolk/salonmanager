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

<!-- Container to hold body -->
<div class="container-content border mx-auto my-5 d-flex justify-content-center">
    <div class="row w-90 mx-auto my-auto  d-flex justify-content-center">
        <table id="requests" class="display cell-border-compact stripe my-5">
            <thead>
            <tr>
                <th>Query</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Preferred Days</th>
                <th>Preferred Times</th>
                <th>Comments</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach (($contacts?:[]) as $contact): ?>
                <tr>
                    <td><?= ($contact['query']) ?></td>
                    <td><?= ($contact['name']) ?></td>
                    <td><?= ($contact['phone']) ?></td>
                    <td><?= ($contact['email']) ?></td>
                    <td><?= ($contact['preferredDays']) ?></td>
                    <td><?= ($contact['preferredTimes']) ?></td>
                    <td><?= ($contact['comments']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

            </tbody>
        </table>
    </div>
</div>
<!-- End body container -->


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>