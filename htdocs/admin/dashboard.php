<?php
    include_once '../resources/include/config.php';
    include('../path.php');
?>


<?php
//if an admin is not logged in on the current session, redirect the user before loading content
    if(!isset($_SESSION['admin'])){
        header("Location: ../index.php");
        echo "YOU DO NOT HAVE ACCESS TO THIS PAGE";
    }else{
        //echo "admin user on page";
    }
?>
<?php include('include/header.php'); ?>
    <div class="dash-content" style="margin-left: 224px; margin-top: 75px; display: block !important; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px; background-color: #1a1a1a">
        <h1>nothing here<br>please navigate to another page</h1>
    </div>
<?php include('include/footer.php'); ?>