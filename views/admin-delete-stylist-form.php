<include href="includes/header.html"></include>

<body>

<!-- Navigation -->
<nav id="" class="navbar navbar-expand-lg static-top">
    <div class="container">
        <a class="navbar-brand" href="/328/salonmanager"><img src="images/logo.png" alt="Studio 11 logo"></a>
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
    <h5>Logged In As: </h5>
    <div class="row">
        <div class="col-4 border">
            <!--FORM TO ADD STYLIST-->
            <form  action="#" method="post" id="delete-stylist-form">
                <h4>Delete Stylist</h4>
                <!--Stylist first name-->

                <label for="stylistFirstName" class="font-weight-bolder">First Name: <br>
                    <input type="text" size="50" class="form-control shadow-sm rounded" id="stylistFirstName" name="stylistFirstName" value="{{@fname}}">
                    <div class="text-danger">
                        <check if="{{isset(@errors['fname'])}}">
                            {{@errors['fname']}}
                        </check>

                    </div>
                </label>
                <!--Stylist last name-->
                <label for="stylistLastName" class="font-weight-bolder">Last Name: <br>
                    <input type="text" size="50" class="form-control shadow-sm rounded" id="stylistLastName" name="stylistLastName" value="{{@lname}}">
                    <div class="text-danger">
                        <check if="{{isset(@errors['lname'])}}">
                            {{@errors['lname']}}
                        </check>
                    </div>
                </label>
                <div class="text-center align-middle">
                        <button class="btn btn-primary mt-5 text-center rounded" type="submit" id="submit-delete" >Submit</button>

                </div>
            </form>
            <p id="output"></p>
            <diV class="text-center align-middle">
                    <a href="admin-add-stylist">
                        <button class="btn btn-primary mt-5 text-center rounded" type="submit" >Back</button>
                    </a>
            </div>
        </div>
        <div class="col-8 border">

        </div>
    </div>
</div>

</body>
<script src="//code.jquery.com/jquery.js"></script>
<script src="scripts/stylist.js"></script>


</html>

