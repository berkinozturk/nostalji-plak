<?php
    include_once 'resources/include/config.php';
    include('path.php');
?>

<?php include(ROOT_PATH . '/resources/include/header.php');?>
<main>
    <div class = "container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./resources/product_images/plak1.jpg" alt="http://placehold.it/1400x1400">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./resources/product_images/plak2.jpg" alt="http://placehold.it/1400x1400">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./resources/product_images/plak3.jpg" alt="http://placehold.it/1400x1400">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class = "container">
        <a href="store.php"><button type="button" class="btn btn-primary">Browse</button></a>
        <button type="button" class="btn btn-primary">Manage Account</button>
    </div>
</main>
<?php include(ROOT_PATH . '/resources/include/footer.php');?>
