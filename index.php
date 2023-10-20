<!-- App -->
<?php require_once "./classes/app.php"; ?>

<?php middleware::login("id", "home"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/png">
    <title>Budget planner</title>
    <!-- Common css -->
    <link rel="stylesheet" href="./src/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/libs/boxicons/css/boxicons.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="./src/css/stylesheet.css">
    <link rel="stylesheet" href="./src/css/utilities.css">
</head>

<body class="h-100 d-flex flex-column bg-white">


  <?php f::component("navbar"); ?>
    
  <main class="container mt-5 pt-5 mb-5 pb-5">
        <div class="row mt-5 pt-5 mb-5 pb-5">
            <div class="col-sm-7">
                <h1 class="mb-2 fw-bold display-1"> Welcome to <span class="text-warning">Budget</span> planner</h1>
                <p class="text-muted font-14">
                Discover our free online MoneyHelper Budget Planner tool to gain a better understanding of your money coming in and out, and how to improve your finances.
                </p>
                <a href="signup.php" class="btn btn-lg btn-light border fw-bold font-14">Get started</a>
                <a href="login.php" class="btn btn-lg btn-dark fw-bold font-14">Login</a>
            </div>
            <div class="col-sm-5 text-right">
                <img src="./src/images/main.jpg" class="img-fluid" alt="">
            </div>
        </div>
    </main>

    <?php f::component("footer"); ?>

</body>

</html>