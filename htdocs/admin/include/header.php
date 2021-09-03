<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nostalji Plak</title>
    <link rel = "icon" type="image/png" href="filepath"/>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/style.css">
</head>

<body class="bg-dark">
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="page-top">
        <a class="navbar-brand" href="../index.php">Nostalji Plak</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="../store.php">Browse</a>
            </div>
        </div>

        <!--login/signup/logout area-->
        <!--redirect moved to individual pages rather than in header.php-->
        <?php if(!isset($_SESSION["loggedin"])) :?>

            <!-- if logged in display-->
        <?php else :?>
            <h2 class="text-center bg-warning"><?php display_message(); ?></h2>
            <a href="../account.php"><button type="submit" class="btn btn-primary">Manage Account</button></a>
            <form action="" method = "post">
                <?php logout_admin(); ?>
                <button type="submit" name = "logout-submit" class="btn btn-secondary btn btn-outline-light">Logout</button>
            </form>
        <?php endif;?>
        <!--login/signup/logout area-->
    </nav>
    <!-- Top Navigation -->

    <hr>
    <!-- Side Navigation -->
    <nav class="bg-dark sidebar">
        <div>
            <h5 style="margin-left: 15px" ">Admin Dashboard</h5>
            <ul class="nav flex-column" >
                <!--FeatherIcons provided here: https://package.elm-lang.org/packages/1602/elm-feather/2.0.1/FeatherIcons-->
                <li class="nav-item" >
                    <a class="nav-link active" href="dashboard.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        Users
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Side Navigation -->