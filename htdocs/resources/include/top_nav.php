<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Nostalji Plak</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="store.php">Store</a>
        </div>
    </div>

    <!--login/signup/logout area-->
    <!--if not logged in display-->
    <?php if(!isset($_SESSION["loggedin"])) :?>
        <h2 class="text-center bg-warning"><?php display_message(); ?></h2>
        <form action="" method = "post">
            <?php login_user(); ?>
            <input type = "text" name = "username" placeholder="Username" required>
            <input type = "password" name = "password" placeholder="Password" required>
            <button type="submit" name = "login-submit" class="btn btn-primary">Login</button>
        </form>
        <a href="signup.php"><button type="submit" name ="signup-submit" class="btn btn-secondary btn btn-outline-light">Signup</button></a>

    <!-- if logged in display-->
    <?php else :?>
        <h2 class="text-center bg-warning"><?php display_message(); ?></h2>
        <a href="account.php"><button type="submit" class="btn btn-primary">Manage Account</button></a>
        <form action="" method = "post">
            <?php logout_user(); ?>
            <button type="submit" name = "logout-submit" class="btn btn-secondary btn btn-outline-light">Logout</button>
        </form>
    <?php endif;?>
    <!--login/signup/logout area-->
</nav>