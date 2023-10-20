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
    <title>Profile - Dashboard</title>
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
            
            <?php module::general(); ?>
            <?php module::image(); ?>
            <ul class="nav nav-tabs bg-light justify-content-center mb-4 border-0">
                <li class="nav-item">
                    <a class="nav-link border ms-1 rounded-5 bg-transparent active" href="profile.php"><b>General</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border ms-1 rounded-5 bg-transparent" href="change-password.php"><b>Change password</b></a>
                </li>
            </ul>
           <div class="card mx-auto col-sm-5 shadow border-0 rounded-4">
                <form enctype="multipart/form-data" method="POST">
                    <div class="mt-5 text-center">
                        <img src="<?php echo media::image($user["image"])?>" class="rounded-circle border p-1 size-100" id="output">
                        <div class="mt-3 d-flex justify-content-center">
                            <label class="btn btn-dark rounded-5 fw-bold px-3 m-0 mr-2" for="file">
                                <input  name="file" id="file" type="file" accept="image/*" onchange="loadFile(event)" hidden /> 
                                <i class="bx bx-camera"></i> Upload
                            </label>
                            <div id="uploadbtn" class="ms-2"></div>
                        </div>
                    </div>
                </form>
                <form method="POST" class="container-fluid px-3 py-3 rounded border-0">
                    <div class="row">
                        <div class="form-group col-sm-6 mb-3">
                            <label class="mb-0 font-14 lato-bold" for="firstname"><b>Firstname</b></label>
                            <input
                                class="form-control form-control-lg border-0 bg-light shadow-none lato-bold font-14 bg-light"
                                name="firstname" type="text" value="<?php echo $user["firstname"]; ?>" />
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label class="mb-0 font-14 lato-bold" for="lastname"><b>Lastname</b></label>
                            <input
                                class="form-control form-control-lg border-0 bg-light shadow-none lato-bold font-14"
                                name="lastname" type="text" value="<?php echo $user["lastname"]; ?>" />
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label class="mb-0 font-14 lato-bold" for="username"><b>Username</b></label>
                            <input
                                class="form-control form-control-lg border-0 bg-light shadow-none lato-bold font-14"
                                name="username" type="text" value="<?php echo $user["username"]; ?>" />
                        </div>
                        <div class="form-group col-sm-6 mb-3">
                            <label class="mb-0 font-14 lato-bold" for="email"><b>Email</b></label>
                            <input
                                class="form-control form-control-lg border-0 bg-light shadow-none lato-bold font-14"
                                name="email" type="email" value="<?php echo $user["email"]; ?>" />
                        </div>
                        <div class="col-sm-12 text-center bg-transparent border-0">
                            <button class="btn btn-dark rounded-5 px-3 fw-bold" name="action" value="general" type="submit">
                                <b class="bx bx-pencil"></b> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>  
        </section>
    </main>
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
    <script src="./src/js/image.js"></script>

    <script>
        $(document).on('change', '#file', function (e) {
            e.preventDefault();
            $("#uploadbtn").html(`<button type="submit" name="action" value="image" class="btn btn-light ms-2 font-14">Change</button>`)
        });
    </script>
        
</body>

</html>