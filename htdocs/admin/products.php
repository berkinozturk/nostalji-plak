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
    <div class="dash-content" style="margin-left: 224px; margin-top: 75px; display: block !important; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;">

        <div class="card-deck" style = "padding-left: 5px; padding-right: 5px;">

            <div class="card border-light text-white bg-dark" ">
                <card class="card-title">
                    <h1 style="padding-left: 25px;">Product List</h1>
                </card>
                <div class="card-body">
                    <ul>
                        <?php get_products_in_dashboard_products_page();?>
                    </ul>
                </div>
            </div>

            <div class="card border-light text-white bg-dark">
                <card class="card-title">
                    <h1 style="padding-left: 25px;">New Product</h1>
                </card>
                <hr>
                <div class="card-body">

                    <form name="add-product" action="" method="post">
                        <h5>Title*</h5><input type="text" class="form-control" name="npTitle" placeholder="Enter Title" required>
                        <br>
                        <h5>Artist*</h5><input type="text" class="form-control" name="npArtist" placeholder="Enter Artist" required>
                        <br>
                        <h5>Category*</h5><h7>(1-4)</h7><input type="text" class="form-control" name="npCategory" placeholder="Enter Category ID" required>
                        <br>
                        <h5>Quantity*</h5><input type="text" class="form-control" name="npQuantity" placeholder="Enter Quantity" required>
                        <br>
                        <h5>Price*</h5><input type="text" class="form-control" name="npPrice" placeholder="Enter Price" required>
                        <br>
                        <h5>Description*</h5>

                        <textarea class="form-control" name="npDescription" aria-label="With textarea" required></textarea>
                        <?php add_new_product(); ?>
                        <button type="submit" name="new-product-submit" class=" btn mt-1 btn-primary">Add Product</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
<?php include('include/footer.php'); ?>