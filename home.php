<?php require_once "./classes/app.php"; ?>
<!-- Login redirect -->
<?php middleware::logout("id", "index"); ?>
<!-- Home page -->
<?php f::module("index"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/png">
    <title>Home - Dashboard</title>
    <!-- Common css -->
    <link rel="stylesheet" href="./src/libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/libs/boxicons/css/boxicons.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="./src/css/stylesheet.css">
    <link rel="stylesheet" href="./src/css/utilities.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <?php f::component("navbar"); ?>
    <!-- Navbar -->
    
    <!-- Content -->
    <main class="container container-sm container-md container-lg container-xl container-xxl">
        <!-- Breadcrumb -->
        <nav class="mt-5 pt-5 pb-4">
            <h1 class="font-20 text-dark text-decoration-none fw-bold">Dashboard</h1>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="index.php" class="text-decoration-none text-dark">Home</a>
                </li>
                <li class="breadcrumb-item active fw-bold">All</li>
            </ol>
        </nav>
        <!-- Breadcrumb -->
        <!-- Modules -->
        <?php $expenses = module::expenses(); ?>
        <?php $bs = module::bs();?>
        <!-- Modules -->
        <!-- Content -->
        <section class="row mb-4">
            <div class="col-sm-6">
                <div class="card shadow rounded-4 border-0 mb-4">
                    <div class="card-body">
                        <canvas id="bs" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow rounded-4 border-0 mb-4">
                    <div class="card-body">
                        <canvas id="expenses" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow rounded-4 border-0 mb-4">
                    <div class="card-body">
                        <canvas id="savings" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card shadow rounded-4 border-0 mb-4">
                    <div class="card-body">
                        <canvas id="expensesYear" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Content -->

    <!-- Libraries -->
    <script src="./src/libs/jquery/jquery.min.js"></script>
    <script src="./src/libs/popper/popper.min.js"></script>
    <script src="./src/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./src/libs/chart/chart.min.js"></script>
    <!-- Common -->
    <script src="./src/js/base.js"></script>

    <?php 
    $categories = "";
    $amounts = "";
    $colors = "";
    foreach ($expenses as $category){
        $categories .= "'".$category["category"]."',";
        $amounts .= $category["amount"].",";
        $colors .= "'#" . substr(str_shuffle("ABCDEF0123456789"), 0, 6)."',";
    }
    $categories = substr($categories, 0, -1);
    $amounts = substr($amounts, 0, -1);
    $colors = substr($colors, 0, -1);
    ?>
    <script>
    new Chart("expenses", {
        type: "doughnut",
        data: {
            labels: [<?php echo $categories; ?>],
            datasets: [{
            backgroundColor: [<?php echo $colors; ?>],
            data: [<?php echo $amounts; ?>]
            }]
        },
        options: {
            title: {
            display: true,
            text: "Today's expenses"
                }
            }
        });
    </script>

    <script>
    new Chart("bs", {
        type: "doughnut",
        data: {
            labels: ["Budget amount", "Saving amount"],
            datasets: [{
            backgroundColor: ["#B287F8","#F67A35"],
            data: [<?php echo $bs["budget"]; ?>,  <?php echo $bs["savings"]; ?>]
            }]
        },
        options: {
            title: {
            display: true,
            text: "Monthly budget and the amount you have to save"
                }
            }
        });
    </script>


    <?php 
    $budget = $bs["savings"]; 
    $savings = 0;
    foreach ($expenses as $opt){
        $savings += $opt["amount"];
    }
    ?>
    <script>
    new Chart("savings", {
        type: "pie",
        data: {
            labels: ["Savings target in this month", "Saved amount in this month"],
            datasets: [{
            backgroundColor: ["#00A150","#FFB200"],
            data: [<?php echo $bs["savings"]; ?>,  <?php echo $savings; ?>]
            }]
        },
        options: {
            title: {
            display: true,
            text: "Monthly budget and the amount you have to save"
                }
            }
        });
    </script>


    <?php $expensesYear = module::expensesYear();
        $ymonths = "";
        $yamounts = "";
        foreach ($expensesYear as $item){
            $ymonths .= "'".date('F', mktime(0, 0, 0, $item["e_month"], 10))."',";
            $yamounts .= "'".$item["amount"]."',";
        }
        $ymonths = substr($ymonths, 0, -1);
        $yamounts = substr($yamounts, 0, -1);    
    ?>

    <script>
    new Chart("expensesYear", {
        type: "bar",
        data: {
            labels: [<?php echo $ymonths; ?>],
            datasets: [{
            backgroundColor: "orange",
            data: [<?php echo $yamounts; ?>]
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "This year expenses"
            }
        }
    });
    </script>


</body>

</html>