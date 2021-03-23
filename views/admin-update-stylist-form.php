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
            <form  action="#" method="post" id="update-stylist-form" enctype="multipart/form-data">
                <h4>Update Stylist</h4>
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
                <!--Stylist Bio-->
                <label for="stylistBio" class="font-weight-bolder">About: <br>
                    <textarea name="stylistBio" id="stylistBio" class="shadow-sm rounded" cols="30" rows="4" value="{{@bio}}"></textarea>
                    <div class="text-danger">
                        <check if="{{isset(@errors['bio'])}}">
                            {{@errors['bio']}}
                        </check>
                    </div>
                </label>

                <!--Stylist Skill-->
                <label for="stylistSkill" class="font-weight-bolder">Skill: <br>
                    <input type="text" size="50" class="form-control shadow-sm rounded" id="stylistSkill" name="stylistSkill" value="{{@skill}}">
                    <div class="text-danger">
                        <check if="{{isset(@errors['skill'])}}">
                            {{@errors['skill']}}
                        </check>
                    </div>
                </label>
                <!--Stylist nickname-->
                <label for="stylistNickname" class="font-weight-bolder">Nickname: <br>
                    <input type="text" size="50" class="form-control shadow-sm rounded" id="stylistNickname" name="stylistNickname" value="{{@nickname}}">
                    <div class="text-danger">
                        <check if="{{isset(@errors['nickname'])}}">
                            {{@errors['nickname']}}
                        </check>
                    </div>
                </label>
                <!--Stylist phone-->
                <label for="stylistPhone" class="font-weight-bolder">Phone: <br>
                    <input type="number" size="50" class="form-control shadow-sm rounded" id="stylistPhone" name="stylistPhone" value="{{@phone}}">
                    <div class="text-danger">
                        <check if="{{isset(@errors['phone'])}}">
                            {{@errors['phone']}}
                        </check>
                    </div>
                </label>
                <label for="fileToUpload" class="font-weight-bolder">Select image to upload: <br>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <div class="text-danger">
                        <check if="{{isset(@errors['image'])}}">
                            {{@errors['image']}}
                        </check>
                    </div>
                    <!--                    <input type="submit" value="Upload Image" name="submit">-->
                </label>

                <div class="text-center align-middle ">
                    <button class="btn btn-primary mt-5 text-center rounded" type="submit" id="submit-update" >Submit</button>
                </div>
            </form>
            <diV class="text-center align-middle">
                <a href="admin-add-stylist">
                    <button class="btn btn-primary mt-5 text-center rounded" type="submit" >Back</button>
                </a>
            </div>

        </div>
        <div class="col-8 border">
            <!--            <repeat group="{{@products}}" value="{{@product}}">-->
            <!--                <div class="row justify-content-around">-->
            <!--                    <div class="card d-inline-block mt-3 col-2" style="width: 22rem;">-->
            <!--                        <img class="card-img-top" src="images/front-product.png" alt="Card image cap">-->
            <!--                        <div class="card-body">-->
            <!--                            <h5 class="card-title">{{@product.product_name}}</h5>-->
            <!--                            <p class="card-text">{{@product.product_description}}</p>-->
            <!--                        </div>-->
            <!--                        <ul class="list-group list-group-flush">-->
            <!--                            <li class="list-group-item">{{@product.product_size}}</li>-->
            <!--                            <li class="list-group-item">{{@product.product_price}}</li>-->
            <!--                            <li class="list-group-item">{{@product.product_category}}</li>-->
            <!--                        </ul>-->
            <!--                        <div class="card-body">-->
            <!--                            <a href="#" class="card-link">Update Product</a>-->
            <!--                            <a href="#" class="card-link">Delete Product</a>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </repeat>-->
        </div>
    </div>
</div>

</body>
<script src="//code.jquery.com/jquery.js"></script>
<script src="scripts/stylist.js"></script>

</html>

