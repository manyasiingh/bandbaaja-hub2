<div class="header-transparent"  style="background-color:#fb8dca">

    <!-- navigation start -->
    <div class="container" >
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
                <nav class="navbar navbar-expand-lg navbar-transparent">
                    <a class="navbar-brand" href="index.php"> <img src="images/logo-white.png" alt=""></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-transparent" aria-controls="navbar-transparent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar mt-0"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-transparent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php" id="menu-1" aria-haspopup="true" aria-expanded="false">
                                    Home
                                </a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                    Packges
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="menu-1">
                                    <?php
                                    $category = mysqli_query($connection, "SELECT * FROM `tbl_category`");
                                    foreach ($category as $key => $value) {
                                    ?>
                                        <li>
                                            <a class="dropdown-item" href="package-listing.php?category_id=<?php echo $value['category_id'] ?>">
                                                <?php echo $value['category_name'] ?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="vendor-listing.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                    Vendors
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about-us.php" id="menu-1" aria-haspopup="true" aria-expanded="false">
                                    About us
                                </a>

                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact-us.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                    Contact us
                                </a>

                            </li>
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                        My Profile
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="menu-1">

                                        <li>
                                            <a class="dropdown-item" href="bookings.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                                Bookings
                                            </a>

                                        </li>
                                        <?php
                                        if(isset($_SESSION['email']))
                                        {
                                        $vendor = mysqli_query($connection, "select * from tbl_vendor where vendor_email='{$_SESSION['email']}'") or die(mysqli_error($connection));
                                        $count_vendor = mysqli_num_rows($vendor);
                                        if ($count_vendor > 0) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="package-add.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                                    Add Packages
                                                </a>

                                            </li>
                                            
                                            <li>
                                                <a class="dropdown-item" href="your-packages.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                                    Your Packages
                                                </a>

                                            </li>
                                        <?php
                                        }
                                        } else {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="feedback-add.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                                    Feedback
                                                </a>

                                            </li>
                                        <?php
                                        }
                                        ?>
                                        <li>
                                            <a class="dropdown-item" href="change-password.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                                Change Password
                                            </a>

                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout.php" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                                Logout
                                            </a>

                                        </li>
                                    </ul>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                        Login
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="menu-1">
                                        <li><a class="dropdown-item" href="vendor-login.php">
                                                Vendor</a>
                                        </li>
                                        <li><a class="dropdown-item" href="couple-login.php">
                                                Couple</a>
                                        </li>
                                        <li><a class="dropdown-item" href="forgot_user.php">
                                                Forgot password</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="menu-5" aria-haspopup="true" aria-expanded="false">
                                        Sign up
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="menu-1">
                                        <li><a class="dropdown-item" href="vendor-register.php">
                                                Vendor</a>
                                        </li>
                                        <li><a class="dropdown-item" href="couple-register.php">
                                                Couple</a>
                                        </li>

                                    </ul>
                                </li>

                            <?php
                            }
                            ?>



                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- navigation close -->
</div>