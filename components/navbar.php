<?php $user = auth::user(); ?>

<header class="navbar navbar-expand navbar-light fixed-top bg-white shadow-sm">
    <nav class="container container-sm container-md container-lg container-xl container-xxl">
        <a class="navbar-brand" href="index.php">
            <img src="./src/images/logo.png" class="d-inline-block logo">
        </a>

        <?php if(!f::is_authenticated()): ?>
        <ul class="navbar-nav nav-right">
            <li class="nav-item">
                <a class="nav-link text-dark btn btn-light shadow-none rounded-4" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark btn btn-light shadow-none rounded-4" href="signup.php">Sign up</a>
            </li>
        </ul>
        <?php else: ?>
        <ul class="navbar-nav nav-center d-none d-lg-flex">
            <?php if(f::is_admin()): ?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="users.php">Users</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="categories.php">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="budgets.php">Budgets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="expenses.php">Expenses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="faqs.php">Faqs</a>
            </li>
        </ul>
        <?php endif; ?>
   
        <?php if(f::is_authenticated()): ?>
        <div class="dropdown ms-3">
            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                class="d-flex align-items-center text-dark text-decoration-none">
                <div class="size-35 me-2">
                    <img src="<?php echo media::image($user["image"])?>" class="rounded-circle w-100 h-100 object-cover">
                </div>
                <b class="font-14"><?php echo $user["username"]; ?></b>
                <b class="bx bx-chevron-down font-18"></b>
            </a>
            <div class="dropdown-menu shadow border-0 rounded-4">
                <a href="profile.php" class="dropdown-item">
                    <span class="icon bx bx-user-circle"></span> Profile
                </a>
                <a href="change-password.php" class="dropdown-item">
                    <span class="icon bx bx-lock"></span> Change password
                </a>
                <a href="logout.php" class="dropdown-item">
                    <span class="icon bx bx-log-out"></span> Logout
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="nav-item dropdown dropstart ms-3 d-inline d-md-inline d-lg-none">
            <button type="button" class="btn btn-light rounded-circle text-dark btn p-1 shadow-none bx bx-menu font-24"
                    data-bs-toggle="dropdown"></button>
            <ul class="dropdown-menu border-0 shadow rounded-4 font-14">
                <?php if(f::is_admin()): ?>
                <li>
                    <a class="dropdown-item d-flex align-items-center text-dark" href="users.php">
                        All users
                    </a>
                </li>
                <?php endif; ?>
                <li>
                    <a class="dropdown-item d-flex align-items-center text-dark" href="categories.php">
                        Categories
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center text-dark" href="budgets.php">
                        Budgets
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center text-dark" href="expenses.php">
                        Expenses
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center text-dark" href="faqs.php">
                        FAQs
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>