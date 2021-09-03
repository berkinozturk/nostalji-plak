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
     include('include/header.php');

    $query = query(" SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while($row = fetch_array($query)):
?>
        <div class="dash-content" style="margin-left: 224px; margin-top: 75px; display: block !important; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;">

            <div class="card-deck" style = "padding-left: 5px; padding-right: 5px;">
                <div class="card border-light text-white bg-dark">
                    <card class="card-title">
                        <h1 style="padding-left: 25px;">Product Information</h1>
                    </card>
                    <hr>
                    <div class="card-body">

                        <ul style="list-style: none">

                            <li><p><h5>Product ID</h5> <?php echo $row['product_id']; ?></p></li>

                            <li><p><h5>Image String</h5> <?php echo $row['product_image']; ?></p></li>

                            <li><p><h5>Title</h5> <?php echo $row['product_title']; ?></p></li>

                            <li><p><h5>Artist</h5> <?php echo $row['product_artist']; ?></p></li>

                            <li><p><h5>Category ID</h5> <?php echo $row['product_category_id']; ?></p></li>

                            <li><p><h5>Current Quantity</h5> <?php echo $row['product_quantity']; ?></p></li>

                            <li><p><h5>Price</h5> £<?php echo $row['product_price']; ?></p></li>

                            <li><p><h5>Product Description</h5> <?php echo $row['product_description']; ?></p></li>

                            <li><p><h5>Spotify Embed URL</h5> <?php echo $row['products_embed_spotify']; ?></p></li>

                            <form name="delete-product" action="" method="post">
                                <?php delete_product_admin(); ?>
                                <li><button type="submit" name="delete-product-submit" class="btn btn-lg btn-danger">Delete Product</button></li>
                            </form>
                        </ul>


                    </div>
                </div>


                <div class="card border-light text-white bg-dark">
                    <card class="card-title">
                        <h1 style="padding-left: 25px;">Update Product</h1>
                    </card>
                    <hr>
                    <div class="card-body">

                        <form name="update-product-title" action="" method="post">

                            <h5>Title</h5><input type="text" class="form-control" name="ptitle" placeholder="Enter Title" required>
                            <?php update_product_title(); ?>
                            <button type="submit" name = "title-update-submit" class="btn btn-sm mt-1 btn-warning">Update</button>
                        </form>
                        <br>
                        <form name="update-product-artist" action="" method="post">
                            <h5>Artist</h5><input type="text" class="form-control" name="partist" placeholder="Enter Artist" required>
                            <?php update_product_artist(); ?>
                            <button type="submit" name = "artist-update-submit" class=" btn btn-sm mt-1 btn-warning">Update</button>
                        </form>
                        <br>
                        <form name="update-product-category" action="" method="post">
                            <h5>Category (1-4)</h5><input type="text" class="form-control" name="pcategory" placeholder="Enter Category ID" required>
                            <?php update_product_category(); ?>
                            <button type="submit" name = "category-update-submit" class=" btn btn-sm mt-1 btn-warning">Update</button>
                        </form>
                        <br>
                        <form name="update-product-quantity" action="" method="post">
                            <h5>Quantity</h5><input type="text" class="form-control" name="pquantity" placeholder="Enter Quantity" required>
                            <?php update_product_quantity(); ?>
                            <button type="submit" name = "quantity-update-submit" class=" btn btn-sm mt-1 btn-warning">Update</button>
                        </form>
                        <br>
                        <form name="update-product-price" action="" method="post">
                            <h5>Price</h5><input type="text" class="form-control" name="pprice" placeholder="Enter Price" required>
                            <?php update_product_price(); ?>
                            <button  type="submit" name = "price-update-submit" class=" btn btn-sm mt-1 btn-warning">Update</button>
                        </form>
                        <br>
                        <form name="update-product-description" action="" method="post">
                            <h5>Description</h5>

                            <textarea class="form-control" name="pdesc" aria-label="With textarea" placeholder="Enter Description" required></textarea>
                            <?php update_product_description(); ?>
                            <button type="submit" name = "description-update-submit" class=" btn btn-sm mt-1 btn-warning">Update</button>
                        </form>

                    </div>
                </div>

            </div>

        </div>


    <?php endwhile; ?>
<?php include('include/footer.php'); ?>