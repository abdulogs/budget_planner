<?php require_once "./classes/app.php"; ?>
<!-- Middleware will redirect if session is out -->
<?php middleware::logout("id", "index"); ?>
<?php middleware::is_customer("403"); ?>
<!-- Module -->
<?php f::module("users"); ?>
<?php module::delete(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/png">
    <title>Users - Dashboard</title>
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
                    <a href="users.php" class="text-decoration-none text-dark">
                        Users
                    </a>
                </li>
                <li class="breadcrumb-item active fw-bold">All</li>
            </ol>
        </nav>
        <!-- Breadcrumb -->
        <!-- Alerts -->
        <?php msg::get(); ?>
        <!-- Alerts -->
        <!-- Content -->
        <section class="bg-white card shadow rounded-4 border-0 mb-5">
            <div class="card-header bg-transparent d-flex align-items-center border-0">
                <h3 class="card-title fw-bold m-0 d-flex align-items-center">
                    <span class="bx bx-group bg-light p-1 font-20 text-warning rounded-circle me-2"></span>
                    Users
                </h3>
                <a href="user-create.php" class="d-flex align-items-center btn btn-light border ms-auto rounded-5">
                    <b class="bx bx-plus-circle me-1 font-20"></b> <b>Create</b>
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table table-card m-0 font-12">
                    <thead class="bg-light">
                    <tr>
                        <th class="px-4 border-bottom text-uppercase text-muted" scope="col">Fullname</th>
                        <th class="border-bottom text-uppercase text-muted" scope="col">Email</th>
                        <th class="border-bottom text-uppercase text-muted" scope="col">Role</th>
                        <th class="border-bottom text-uppercase text-muted" scope="col">Approved</th>
                        <th class="border-bottom text-uppercase text-muted" scope="col">Created at</th>
                        <th class="border-bottom text-uppercase text-muted" scope="col">Updated at</th>
                    </tr>
                </thead>
                <tbody class="font-12">
                    <?php $listing = module::listing(); ?>
                    <?php if($listing): ?>
                    <?php foreach($listing as $item): ?>
                        <tr>
                            <td class="align-middle text-break px-4" data-label="Firstname">
                                <a href="user-details.php?id=<?php echo $item["id"]; ?>" class="fw-bold link-dark font-14 text-decoration-none">
                                    <?php echo $item["firstname"]; ?> 
                                    <?php echo $item["lastname"]; ?> (<?php echo $item["username"]; ?>)
                                </a>
                                <div class="d-flex align-items-center m-0 mt-2">
                                    <a href="user-update.php?id=<?php echo $item["id"]; ?>" class="text-decoration-none text-success me-1">Edit</a>
                                    <b>-</b>
                                    <a href="users.php?id=<?php echo $item["id"]; ?>&action=delete" class="text-decoration-none text-danger mx-1">Delete</a>
                                    <b>-</b>
                                    <p class="ms-1 m-0"><?php echo f::is_active($item['is_active']); ?></p>
                                </div>
                            </td>
                            <td class="align-middle text-break" data-label="Email">
                                <?php echo $item["email"]; ?>
                            </td>
                            <td class="align-middle text-break" data-label="Role">
                                <?php echo f::is_role($item['is_role']); ?>
                            </td>
                            <td class="align-middle text-break" data-label="Approved">
                                <?php echo f::is_status($item['is_status']); ?>
                            </td>
                            <td class="align-middle text-break" data-label="Created at">
                                <?php echo DT::format($item["created_at"]); ?>
                            </td>
                            <td class="align-middle text-break" data-label="Updated at">
                                <?php echo DT::format($item["updated_at"]); ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
            <?php if(!$listing):?>
                <div class="text-center text-danger p-2 border-bottom">
                    <p class="m-0 p-0 font-14"><b>No records found!</b></p>
                </div>
                <?php endif;?>          
            </div>
            <div class="card-footer text-center bg-transparent border-0">
                <?php DB::btns("users", $listing);  ?>
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

    <!-- Remove params from url -->
    <script>
    clearparams("id");
    clearparams("action");
    </script>
</body>

</html>