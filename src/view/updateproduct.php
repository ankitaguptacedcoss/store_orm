<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD product</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
</head>

<body>
    <!-- start of nav bar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../images/store.jpg" height=80px; /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../view/show_order.php">show orders</a>
                    <a class="nav-link" href="../view/product_display.php">show Products</a>
                    <a class="nav-link" href="../view/logout.php">Logout</a>

                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        STORE<br />
                        <span style="color: hsl(218, 81%, 75%)">STORE</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Not only do they save a whole load of time and make your models more accurate, but they also offer your data scientists more structure and consistency which makes their jobs easier and more enjoyable.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <!-- form to update product details -->
                            <form action="../controller/update_product.php" method="post" enctype="multipart/form-data">
                                <!-- 2 column grid layout with text inputs for the first  name -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1" class="form-control" name="product_name" value='<?php echo $_SESSION['name']; ?>' required />
                                            <label class="form-label" for="form3Example1">Product Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div>
                                            <?php echo $_SESSION['category']; ?>
                                            <select class="bg-light " name="product_category" value='<?php echo $_SESSION['category']; ?>'>

                                                <option value="Electronics" <?php if ($_SESSION['category'] == 'Electronics')  echo 'selected'; ?>>Electronics</option>
                                                <option value="Clothes" <?php if ($_SESSION['category'] == 'Clothes')  echo 'selected';  ?>>Clothes</option>
                                            </select>
                                            <p> Product Category</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- price input -->
                                <div class="form-outline mb-4">
                                    <input type="number" id="form3Example3" class="form-control" name="product_price" value='<?php echo $_SESSION['price']; ?>' required />
                                    <label class="form-label" for="form3Example3">Product Price</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input class="form-control form-control-lg" name="fileToUpload" id="formFileLg" type="file" />
                                    <div class="small text-muted mt-2">Upload image or any other relevant file. Max file
                                        size 50 MB</div>
                                </div>
                                <!-- stock input -->
                                <div class="form-outline mb-4">
                                    <input type="number" id="form3Example4" class="form-control" name="product_stock" value='<?php echo $_SESSION['quantity']; ?>' required />
                                    <label class="form-label" for="form3Example4">In stock Quantity</label>
                                </div>
                                <?php
                                $msg = $_REQUEST['msg'];
                                echo "<p class='msg'>" . $msg . "</p>"; //show error message if came
                                ?>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Update Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</body>

</html>