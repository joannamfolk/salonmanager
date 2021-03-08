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
    <h5>Logged In As: </h5>
    <div class="row">
        <div class="col-4 border">
            <form action="#" method="post">
                <h4>Add Product</h4>
                <label for="product-name" class="font-weight-bolder">Product Name: <br>
                    <input type="text" size="75" class="form-control shadow-sm rounded" id="product-name" name="product-name" value="">
                    <div class="text-danger">
                        <check if="{{isset(@errors['productname'])}}">
                            {{@errors['productname']}}
                        </check>
                    </div>
                </label> <br>

                <label for="product-description" class="font-weight-bolder">Product Description: <br>
                <textarea name="product-description" id="product-description" class="shadow-sm rounded" wrap="hard" cols="50" rows="6"></textarea>
                    <div class="text-danger">
                        <check if="{{isset(@errors['productdescription'])}}">
                            {{@errors['productdescription']}}
                        </check>
                    </div>
                </label> <br>

                <label for="product-size" class="font-weight-bolder">Product Size: <br>
                    <input type="text" size="75" class="form-control shadow-sm rounded" id="product-size" name="product-size" value="">
                    <div class="text-danger">
                        <check if="{{isset(@errors['productsize'])}}">
                            {{@errors['productsize']}}
                        </check>
                    </div>
                </label> <br>

                <label for="product-price" class="font-weight-bolder">Product Price: <br>
                    <input type="text" size="75" class="form-control shadow-sm rounded" id="product-price" name="product-price" value="">
                    <div class="text-danger">
                        <check if="{{isset(@errors['productprice'])}}">
                            {{@errors['productprice']}}
                        </check>
                    </div>
                </label> <br>

                <label class="font-weight-bolder">Product Category <br>
                    <select name="product-category" id="product-category">
                        <option value="null" selected="selected">Select a Category</option>
                        <option value="shampoo">Shampoo</option>
                        <option value="conditioner">Conditioner</option>
                        <option value="deep conditioner">Deep-Conditioner</option>
                        <option value="styling gel">Styling Gel</option>
                        <option value="holding spray">Holding Spray</option>
                        <option value="styling pomade">Styling Pomade</option>
                        <option value="serums oils">Serums/Oils</option>
                        <option value="skin cremes">Skin Cremes</option>
                    </select>
                    <div class="text-danger">
                        <check if="{{isset(@errors['productcategory'])}}">
                            {{@errors['productcategory']}}
                        </check>
                    </div>
                </label> <br>

                <div class="text-center align-middle">
                    <input class="btn btn-primary mt-5 text-center rounded" type="submit" value="Add to Inventory">
                </div>
            </form>
            <div class="text-center align-middle">
                <button type="button" class="btn btn-primary m-3 rounded">Update Product</button>
                <br>
                <button type="button" class="btn btn-primary m-3 rounded">Delete Product</button>
            </div>
        </div>
        <div class="col-8 border">
            <repeat group="{{@products}}" value="{{@product}}">
                <div class="card d-inline" style="width: 18rem;">
                    <img class="card-img-top" src="images/front-product.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{@product.product_name}}</h5>
                        <p class="card-text">{{@product.product_description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{@product.product_size}}</li>
                        <li class="list-group-item">{{@product.product_price}}</li>
                        <li class="list-group-item">{{@product.product_category}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Update Product</a>
                        <a href="#" class="card-link">Delete Product</a>
                    </div>
                </div>
            </repeat>
        </div>
    </div>
</div>

</body>

</html>