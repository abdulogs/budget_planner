<!-- App -->
<?php require_once "./classes/app.php"; ?>
<!-- Middleware will redirect if session is out -->
<?php middleware::logout("id", "index"); ?>
<!-- Module -->
<?php f::module("profile"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/png">
    <title>Change password - Dashboard</title>
    <!-- Common css -->
    <link rel="stylesheet" href="./src/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/libs/boxicons/css/boxicons.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="./src/css/stylesheet.css">
    <link rel="stylesheet" href="./src/css/utilities.css">
</head>

<body class="bg-light">
<!-- Navbar -->
<?php f::component("navbar"); ?>
<!-- Navbar -->
    
<!-- Content -->
<main class="container container-sm container-md container-lg container-xl container-xxl">
<?php $user = auth::user(); ?>
    <section class="d-flex flex-column">
        <!-- Breadcrumb -->
        <nav class="mt-5 pt-5 pb-4">
            <h1 class="font-20 text-dark text-decoration-none fw-bold">Dashboard</h1>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="index.php" class="text-decoration-none text-dark">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="profile.php" class="text-decoration-none text-dark">Profile</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> 
                    <b><?php echo $user["firstname"]." ".$user["lastname"]; ?></b>
                </li>
            </ol>
        </nav>
        <!-- Breadcrumb -->
        <!-- Alerts -->
        <?php msg::get(); ?>
        <!-- Alerts -->
        <?php module::change_password(); ?>
        <ul class="nav nav-tabs bg-light justify-content-center mb-4 border-0">
            <li class="nav-item">
                <a class="nav-link border ms-1 rounded-5 bg-transparent" href="profile.php"><b>General</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link border ms-1 rounded-5 bg-transparent active" href="change-password.php"><b>Change password</b></a>
            </li>
        </ul>
        <div class="card mx-auto col-sm-5 shadow border-0 rounded-4">
            <form method="POST" class="container-fluid p-4">
                <div class="row">
                    <div class="form-group col-sm-6 mb-3">
                        <label class="mb-0 font-14" for="password"> <b>New password</b></label>
                        <input class="form-control form-control-lg border-0 bg-light shadow-none font-14"
                            name="npassword" type="password" required/>
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label class="mb-0 font-14" for="password2"><b>Confirm password</b></label>
                        <input
                            class="form-control form-control-lg border-0 bg-light shadow-none font-14"
                            name="cpassword" type="password" required/>
                    </div>
                    <div class="col-sm-12 text-center bg-white border-0">
                        <button class="btn btn-dark rounded-5 px-3" name="action" value="change_password" type="submit">
                            <span class="bx bx-lock me-2"></span> Change password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Content -->

    <!-- Footer -->
    <?php f::component("footer");  ?>
    <!-- Footer -->

    <!-- Libraries -->
    <script src="./src/libs/jquery/jquery.min.js"></script>
    <script src="./src/libs/popper/popper.min.js"></script>
    <script src="./src/libs/bootstrap/js/bootstrap.min.js"></script>

    <!-- Common -->
    <script src="./src/js/base.js"></script>
</body>

</html>