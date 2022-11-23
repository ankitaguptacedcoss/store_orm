<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .msg {
            color: red;
        }
    </style>
</head>

<body>
    <!-- start of nav bar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    <a class="nav-link" href="#">Register</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <!-- start of login form for user -->
    <div class="container">
        <section class="h-100 gradient-form" style="background-color: #eee; margin-left:20px;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100" style="background-color: #eee; margin-left:20px;">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black">
                            <div class="row g-0">
                                <div class="w-10">
                                    <div class="card-body p-md-5 mx-md-4">

                                        <div class="text-center">
                                            <img src="../images/store.jpg" style="width: 185px;" alt="logo">
                                            <h4 class="mt-1 mb-5 pb-1">Store</h4>
                                        </div>

                                        <form method="post" action="../controller/userslogin.php">
                                            <p>Please login to your account</p>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="form2Example11" class="form-control" placeholder=" email address" name="email" />
                                                <label class="form-label" for="form2Example11">Email</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="form2Example22" class="form-control" name="password" />
                                                <label class="form-label" for="form2Example22">Password</label>
                                            </div>
                                            <?php
                                            $msg = $_REQUEST['msg'];
                                            echo "<p class='msg'>" . $msg . "</p>";
                                            ?>
                                            <button type="submit" class="btn btn-outline-danger">Login</button>
                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">Don't have an account?</p>

                                                <a href="../view/register_user.php"><button type="submit" class="btn btn-outline-danger">Create new</button></a>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>