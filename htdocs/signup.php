<?php
include_once 'resources/include/config.php';
include('path.php');
?>

<?php include(ROOT_PATH . '/resources/include/header.php');?>
<main>
    <div class = container>
        <div class="wrapper-main">
            <div class="card card-register border-light text-white bg-dark mx-auto mt-5">
                <h1>Signup</h1>
                <hr>
                <form class = "form-signup" action="" method="post">
                    <ul>
                        <li><h5>Username</h5><input type="text" name="username" placeholder="Username" required></li>
                        <li><h5>Email</h5><input type="email" name="email" placeholder="Email" required></li>
                        <li><h5>Password</h5><input type="password" name="password" placeholder="Password" required></li>
                        <li><h5>Repeat Password</h5><input type="password" name="password-repeat" placeholder="Repeat Password" required></li>

                        <?php signup(); ?>
                        <button type="submit" name="signup-submit" class="btn btn-primary">Sign Up</button>

                    </ul>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include(ROOT_PATH . '/resources/include/footer.php');?>
