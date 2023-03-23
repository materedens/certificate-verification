<nav class="ts-sidebar">
    <ul class="ts-sidebar-menu">

        <li class="ts-label">Dashboard</li>
        <?PHP if (isset($_SESSION['ceraid'])) { ?>
            <li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>

            <li><a href="search-certificate.php"><i class="fa fa-search"></i>Search Certificate</a></li>
            <li><a href="room-details.php"><i class="fa fa-file-o"></i>Verify Certificate</a></li>
            <li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
            <li><a href="change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
        <?php } else { ?>

            <li><a href="register.php"><i class="fa fa-files-o"></i> User Registration</a></li>
            <li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
            <li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
            <li><a href="institute.php"><i class="fa fa-user"></i> Institute Login</a></li>
        <?php } ?>

    </ul>
</nav>