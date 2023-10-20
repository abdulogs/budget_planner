<!-- App -->
<?php require_once "./classes/app.php"; ?>
<!-- Middleware will redirect if session is out -->
<?php middleware::logout("id", "index"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/png">
    <title>Faqs - Dashboard</title>
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
        <!-- Breadcrumb -->
        <nav class="mt-5 pt-5 pb-4">
            <h1 class="font-20 text-dark text-decoration-none fw-bold">Dashboard</h1>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="index.php" class="text-decoration-none text-dark">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="faqs.php" class="text-decoration-none text-dark">
                        FAQs
                    </a>
                </li>
                <li class="breadcrumb-item active fw-bold">All</li>
            </ol>
        </nav>
        <!-- Breadcrumb -->

        <!-- Content -->

        <section class="d-flex flex-column justify-content-center align-items-center">
            <div class="col-12 col-sm-12 col-md-8 col-lg-7 col-xl-6 col-xll-6 ">
                <div class="accordion accordion-flush" id="faqs">
                    <div class="accordion-item border-0 mb-2 rounded-4 w-100">
                        <button class="accordion-button bg-white text-dark collapsed shadow border-0 rounded-4 fw-bold font-16"
                        type="button" data-bs-toggle="collapse" data-bs-target="#question1">
                        <b class="bx bx-question-mark bg-light p-2 text-info rounded-circle me-2"></b>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        </button>
                        <div id="question1" class="accordion-collapse collapse" data-bs-parent="#faqs">
                            <div class="accordion-body shadow pt-5 pb-5 rounded-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                Ab assumenda cupiditate itaque aliquid, eum adipisci voluptate dignissimos commodi pariatur esse ipsa soluta tempora obcaecati quod ipsum facere ea odit non.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 mb-2 rounded-4 w-100">
                        <button class="accordion-button bg-white text-dark collapsed shadow border-0 rounded-4 fw-bold font-16"
                        type="button" data-bs-toggle="collapse" data-bs-target="#question2">
                        <b class="bx bx-question-mark bg-light p-2 text-info rounded-circle me-2"></b>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        </button>
                        <div id="question2" class="accordion-collapse collapse" data-bs-parent="#faqs">
                            <div class="accordion-body shadow pt-5 pb-5 rounded-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                Ab assumenda cupiditate itaque aliquid, eum adipisci voluptate dignissimos commodi pariatur esse ipsa soluta tempora obcaecati quod ipsum facere ea odit non.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 mb-2 rounded-4 w-100">
                        <button class="accordion-button bg-white text-dark collapsed shadow border-0 rounded-4 fw-bold font-16"
                        type="button" data-bs-toggle="collapse" data-bs-target="#question3">
                        <b class="bx bx-question-mark bg-light p-2 text-info rounded-circle me-2"></b>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        </button>
                        <div id="question3" class="accordion-collapse collapse" data-bs-parent="#faqs">
                            <div class="accordion-body shadow pt-5 pb-5 rounded-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                Ab assumenda cupiditate itaque aliquid, eum adipisci voluptate dignissimos commodi pariatur esse ipsa soluta tempora obcaecati quod ipsum facere ea odit non.
                            </div>
                        </div>
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

    <!-- Common -->
    <script src="./src/js/base.js"></script>

    <!-- Remove params from url -->
    <script>
    clearparams("id");
    clearparams("action");
    </script>

</body>

</html>