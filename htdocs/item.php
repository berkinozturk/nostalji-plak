<?php
    include_once 'resources/include/config.php';
    include('path.php');
?>

<?php include(ROOT_PATH . '/resources/include/header.php');?>

<?php
    $query = query(" SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while($row = fetch_array($query)):
 ?>
<main>
    <div class = "container" style="margin-top: 25px">
        <div class="product-info">

        <!--Row For Image-->

        <div class="row">

            <div class="col-md-7">
               <img class="img-responsive" src="./resources/product_images/<?php  echo display_image($row['product_image']); ?>" alt="" style="max-width: 450px">


            </div>

            <div class="col-md-5">

                <div class="thumbnail">

                        <div class="card border-light text-white bg-dark mb-3" >
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row['product_title']; ?></h4>
                                <h5 class="card-text"><?php echo $row['product_artist']; ?></h5>
                                <p class ="card-text"><?php echo $row['product_description']; ?></p>
                                <p class ="card-text"><?php echo "£" . $row['product_price']; ?></p>
                                <a href="#" class="btn btn-primary">Buy</a>
                            </div>
                        </div>

                </div>

            </div>
        </div><!--Row For Image-->
            <hr>

            <?php
                if(isset($row['products_embed_spotify'])){

                    $spotify = <<<DELIMITER
                        <div class="mt-5">
                            <iframe src="{$row['products_embed_spotify']}" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>
DELIMITER;
                    echo $spotify;
                }
            ?>
            add stuff

    </div><!-- col-md-9 ends here -->


    <?php endwhile; ?>

    </div>
    <!-- /.container -->
</main>

<?php include(ROOT_PATH . '/resources/include/footer.php');?>

