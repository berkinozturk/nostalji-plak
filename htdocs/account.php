<?php
    include_once 'resources/include/config.php';
    include('path.php');
?>

<?php
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        echo "YOU DO NOT HAVE ACCESS TO THIS PAGE";
        }

    include(ROOT_PATH . '/resources/include/header.php');
?>



<main>
    <div class = "container">
        <div class="card card-register border-light text-white bg-dark mx-auto mt-5">
            <h1 style="margin-top: 5px; margin-left: 15px;">Your Account</h1>
            <hr>

                <ul style="list-style: none">
                    <li style="margin-bottom: 10px;: ;">No Items Yet</li>
                    <?php
                    if(isset($_SESSION['admin'])){
                        $adminDashboardBtn = <<<DELIMETER
                        <li><a href="admin/dashboard.php"> <div class = "btn btn-primary btn-sm"><b>Go To Admin Page</b></div></a></li>
DELIMETER;
                        echo $adminDashboardBtn;
                    }
                    ?>

                </ul>
        </div>
    </div>
</main>
<?php include(ROOT_PATH . '/resources/include/footer.php');?>
