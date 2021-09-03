<?php
include_once 'resources/include/config.php';
include('path.php');
?>

<?php include(ROOT_PATH . '/resources/include/header.php');?>
<main>
    <div class = "container">
        <header>
            <h1>Store</h1>
            <form name = "form-search" action="" method="post">
                <input type = "text" name = "search-input" placeholder="Title/Artist/Category ID" required>
                <?php search(); ?>
                <button type= "submit" name = "search-submit" class="btn btn-primary">Search</button>
            </form>
        </header>
        <hr>
        <div class = "row">
            <?php get_products_in_shop_page(); ?>
        </div>

    </div>
</main>
<?php include(ROOT_PATH . '/resources/include/footer.php');?>

