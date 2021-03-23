<include href="includes/header.html"></include>

<body>

<!-- Navigation -->
<nav id="" class="navbar navbar-expand-lg static-top">
    <div class="container">
        <a class="navbar-brand" href="{{@BASE}}"><img src="images/logo.png" alt="Studio 11 logo"></a>
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

<div class="container border border-dark rounded shadow-lg mt-5">
    <h5>Logged In As: Admin</h5>
    <div class="row">
        <div class="col-4 border">
            <form action="#" method="post">
                <h4>Add Service</h4>
                <label for="service-name" class="font-weight-bolder">Service Name: <br>
                    <input type="text" size="75" class="form-control shadow-sm rounded" id="service-name" name="service-name" value="">
                    <div class="text-danger">
                        <check if="{{isset(@errors['servicename'])}}">
                            {{@errors['servicename']}}
                        </check>
                    </div>
                </label> <br>

                <label for="service-description" class="font-weight-bolder">Service Description: <br>
                    <textarea name="service-description" id="service-description" class="shadow-sm rounded" wrap="hard" cols="50" rows="6"></textarea>
                    <div class="text-danger">
                        <check if="{{isset(@errors['servicedescription'])}}">
                            {{@errors['servicedescription']}}
                        </check>
                    </div>
                </label> <br>


                <label for="service-price" class="font-weight-bolder">Service Price: <br>
                    <input type="text" size="75" class="form-control shadow-sm rounded" id="service-price" name="service-price" value="">
                    <div class="text-danger">
                        <check if="{{isset(@errors['serviceprice'])}}">
                            {{@errors['serviceprice']}}
                        </check>
                    </div>
                </label> <br>


                <div class="text-center align-middle">
                    <input class="btn btn-primary mt-5 text-center rounded" type="submit" value="Add Service">
                </div>
            </form>
        </div>
        <div class="col-8 border">
            <repeat group="{{@services}}" value="{{@service}}">
                <div class="row justify-content-around">
                    <div class="card d-inline-block mt-3 col-2" style="width: 22rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{@service.service_name}}</h5>
                            <p class="card-text">{{@service.service_description}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Price: ${{@service.service_price}}</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Update Service</a>
                            <a href="#" class="card-link">Delete Service</a>
                        </div>
                    </div>
                </div>
            </repeat>
        </div>
    </div>
</div>

</body>

</html>