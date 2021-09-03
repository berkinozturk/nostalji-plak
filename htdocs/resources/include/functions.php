<?php
    //sets the 'message' variable as the passed string
    function set_message($msg){
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            $msg = "";
        }
    }

    //redirects user to the passed $location
    function redirect($location){
        return header("Location: $location ");
    }

    function escape_string($string){
        global $conn;
        return mysqli_real_escape_string($conn, $string);
    }

    //displays the 'set' message
    function display_message() {
        if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    //run passed sql query. return query
    function query($sql) {
        global $conn;
        return mysqli_query($conn, $sql);
    }

    //confirms that the sql query has ran correctly, if query fails echo error message
    function confirm($result){
        global $conn;
        if(!$result) {
            die("QUERY FAILED " . mysqli_error($conn));
            echo "dead";
        }
    }

    //login function, if user has administrator value of 1 then set 'admin' value to true.
    function login_user(){
        if(isset($_POST['login-submit'])){
            $username = escape_string($_POST['username']);
            $password = escape_string($_POST['password']);

            $password = md5($password);

            $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
            confirm($query);

            if(mysqli_num_rows($query) == false) {
                set_message("Your Password or Username are wrong.");
                redirect("index.php");
            } else {
                $table = null;
                while ($row = mysqli_fetch_array($query)) {
                    $table = $row;
                }

                $admin = $table['administrator'];

                if($admin == 1){
                    $_SESSION['admin'] = true;
                }

                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;

                redirect("index.php");
            }
        }
    }

    //logout for non-admin page navbar
    function logout_user(){
        if(isset($_POST['logout-submit'])){
            session_destroy();

            redirect("index.php");
        }
    }

    //logout function for admin navbar, re-directs to index.php
    function logout_admin(){
        if(isset($_POST['logout-submit'])){
            session_destroy();

            redirect("../index.php");
        }
    }

    //function for signing up a new user
    //validates all fields, if invalid display error
    // if valid signs up new user to db and signs user into site
    function signup(){
        if(isset($_POST['signup-submit'])){
            $username = escape_string($_POST['username']);
            $email = escape_string($_POST['email']);
            $password = escape_string($_POST['password']);
            $passwordRepeat = escape_string($_POST['password-repeat']);

            if(empty($username)){
                set_message('Invalid Username');
                header("Location: signup.php?error=emptyfields&username=".$username."&email=".$email);
                exit();

            } elseif (empty($email)) {
                set_message('Invalid Email');
                header("Location: signup.php?error=emptyfields&username=".$username."&email=".$email);
                exit();

            } elseif (empty($password)||empty($passwordRepeat)) {
                set_message('Invalid Password');
                header("Location: signup.php?error=emptyfields&username=".$username."&email=".$email);
                exit();

            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                set_message("Invalid Email");
                header("Location: signup.php?error=invalidemail&username=".$username);
                exit();

            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
                set_message('Invalid Characters in Username');
                header("Location: signup.php?error=invalidusername&email=".$email);
                exit();

            } elseif ($password !== $passwordRepeat) {
                set_message('Passwords Do Not Match');
                header("Location: signup.php?error=passwordcheckusername=".$username."&email".$email);
                exit();
            } else {

                $password = md5($password);

                $query = query("INSERT INTO users(`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
                confirm($query);
                
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;

                redirect("index.php");
            }
        }
    }

    //returns array from sql query result
    function fetch_array($result) {
    return mysqli_fetch_array($result);
    }

    //returns the image
    function display_image($picture) {
        global $upload_directory;
        return $upload_directory  . '/' . $picture;
    }

    //displays a new card component for each product in the DB
    function get_products_in_shop_page() {

        $query = query(" SELECT * FROM products");
        confirm($query);

        while($row = fetch_array($query)) {

            $product_image = display_image($row['product_image']);

            $product = <<<DELIMETER
                    <div class="card-deck" style = "padding-left: 5px; padding-right: 5px;">
                        <div class="card border-light text-white bg-dark mb-3" style = "max-width: 17rem;">
                                
                                <a href = "item.php?id={$row['product_id']}"> <img class="card-img-top" src="./resources/product_images/{$product_image}" alt="Unable to Find Image" style = "max-height: 275px"> </a>
                                <div class="card-body">
                                    <h5 class = "card-title" >{$row['product_title']}</h5>
                                    <p class="card-text" >{$row['product_artist']}</p>
                                    <p class="card-text" >£{$row['product_price']}</p>
                                </div>
                                  
                        </div>
                    </div>
DELIMETER;
            echo $product;
        }
    }

    //displays a new list item for each product in DB
    function get_products_in_dashboard_products_page() {
        $query = query(" SELECT * FROM products");
        confirm($query);

        while($row = fetch_array($query)){
            $product = <<<DELIMETER
                <a href = "../admin/update_product.php?id={$row['product_id']}"> <li style="color: #ffffff">ID: {$row['product_id']} - Title: {$row['product_title']}<br>Artist: {$row['product_artist']}</li> </a>
DELIMETER;
            echo $product;
        }
    }

    //runs when 'title-update-submit' is pressed
    //updates a product's title if input is valid, if invalid, display error message and refresh page.
    function update_product_title(){
            if(isset($_POST['title-update-submit'])) {
                $title = escape_string($_POST['ptitle']);
                $productId = $_GET['id'];
                if (empty($title)) {
                    set_message('Invalid Title');
                    header("Location: update_product.php?id=" . $productId);
                    exit();
                } else {
                    $query = query("UPDATE products SET product_title = '$title' WHERE product_id = '$productId'");
                    confirm($query);
                    redirect("update_product.php?id=" . $productId);
                }
            }
    }

    //runs when 'artist-update-submit' is pressed
    //updates a product's artist if input is valid, if invalid, display error message and refresh page.
    function update_product_artist(){
        if(isset($_POST['artist-update-submit'])) {
            $artist = escape_string($_POST['partist']);
            $productId = $_GET['id'];
            if (empty($artist)) {
                set_message('Invalid Artist');
                header("Location: update_product.php?id=" . $productId);
                exit();
            } else {
                $query = query("UPDATE products SET product_artist = '$artist' WHERE product_id = '$productId'");
                confirm($query);
                redirect("update_product.php?id=" . $productId);
            }
        }
    }

    //runs when 'category-update-submit' is pressed
    //updates a product's category if input is valid, if invalid, display error message and refresh page.
    function update_product_category(){
        if(isset($_POST['category-update-submit'])) {
            $category = escape_string($_POST['pcategory']);
            $productId = $_GET['id'];
            if (empty($category)||$category<1||$category>4) {
                set_message('Invalid Category ID');
                header("Location: update_product.php?id=" . $productId);
                exit();
            } else {
                $query = query("UPDATE products SET product_category_id = '$category' WHERE product_id = '$productId'");
                confirm($query);
                redirect("update_product.php?id=" . $productId);
            }
        }
    }


    //runs when 'quantity-update-submit' is pressed
    //updates a product's quantity if input is valid, if invalid, display error message and refresh page.
    function update_product_quantity(){
        if(isset($_POST['quantity-update-submit'])) {
            $quantity = escape_string($_POST['pquantity']);
            $productId = $_GET['id'];
            if (empty($quantity)||!is_numeric($quantity)) {
                set_message('Invalid Quantity');
                header("Location: update_product.php?id=" . $productId);
                exit();
            } else {
                $query = query("UPDATE products SET product_quantity = '$quantity' WHERE product_id = '$productId'");
                confirm($query);
                redirect("update_product.php?id=" . $productId);
            }
        }
    }

    //runs when 'price-update-submit' is pressed
    //updates a product's price if input is valid, if invalid, display error message and refresh page.
    function update_product_price(){
        if(isset($_POST['price-update-submit'])) {
            $price = escape_string($_POST['pprice']);
            $productId = $_GET['id'];
            if (empty($price)||!is_numeric($price)) {
                set_message('Invalid Price');
                header("Location: update_product.php?id=" . $productId);
                exit();
            } else {
                $query = query("UPDATE products SET product_price = '$price' WHERE product_id = '$productId'");
                confirm($query);
                redirect("update_product.php?id=" . $productId);
            }
        }
    }

    //runs when 'description-update-submit' is pressed
    //updates a product's description if input is valid, if invalid, display error message and refresh page.
    function update_product_description(){
        if(isset($_POST['description-update-submit'])) {
            $description = escape_string($_POST['pdesc']);
            $productId = $_GET['id'];
            if (empty($description)) {
                set_message('Invalid Price');
                header("Location: update_product.php?id=" . $productId);
                exit();
            } else {
                $query = query("UPDATE products SET product_description = '$description' WHERE product_id = '$productId'");
                confirm($query);
                redirect("update_product.php?id=" . $productId);
            }
        }
    }

    //runs when 'new-product-submit' is pressed
    //adds a new product to db if input is valid, if invalid set error message and reload page to display message
    function add_new_product(){
            if(isset($_POST['new-product-submit'])){
                $title = escape_string($_POST['npTitle']);
                $artist = escape_string($_POST['npArtist']);
                $category = escape_string($_POST['npCategory']);
                $quantity = escape_string($_POST['npQuantity']);
                $price = escape_string($_POST['npPrice']);
                $description= escape_string($_POST['npDescription']);

                if (empty($price)||!is_numeric($price)) {
                    set_message('Invalid Price');
                    redirect("products.php");
                    exit();
                }elseif(empty($category)||$category<1||$category>4){
                    set_message('Invalid Category');
                    redirect("products.php");
                    exit();
                }elseif (empty($quantity)||!is_numeric($quantity)||$quantity<0) {
                    set_message('Invalid Quantity');
                    redirect("products.php");
                    exit();
                }elseif (empty($title)){
                    set_message('Invalid Title');
                    redirect("products.php");
                    exit();
                }elseif (empty($artist)){
                    set_message('Invalid Artist');
                    redirect("products.php");
                    exit();
                }elseif (empty($description)){
                    set_message('Invalid Description');
                    redirect("products.php");
                    exit();
                }else{
                    $query = query("INSERT INTO `products`(`product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_artist`) 
                                                VALUES ('$title', $category, $price, $quantity, '$description', '$artist')");
                    confirm($query);
                    redirect("products.php");
                }
            }
    }

    //runs when 'delete-product-submit' is pressed
    //gets the current id from URL and deletes the product with that product id from the DB
    function delete_product_admin(){
        if(isset($_POST['delete-product-submit'])) {
            $productId = $_GET['id'];

            $query = query("DELETE FROM `products` WHERE product_id = $productId");
            confirm($query);
            set_message("Product Removed");
            redirect("products.php");
        }
    }

    //runs when 'search-submit' button is pressed
    //returns all products where title/artist/category id is like user input
    function search(){
            if(isset($_POST['search-submit'])){
                $searchInput = escape_string($_POST['search-input']);

                if(!empty($searchInput)){
                    $query = query("SELECT * FROM products WHERE product_title LIKE '%$searchInput%' OR product_artist LIKE '%$searchInput%' OR product_category_id LIKE '%$searchInput%'");
                    confirm($query);
                    if (mysqli_num_rows($query)>0){
                        while($row = fetch_array($query)) {

                            $product_image = display_image($row['product_image']);

                            $product = <<<DELIMETER
                    <div class="card-deck" style = "padding-left: 5px; padding-right: 5px;">
                        <div class="card border-light text-white bg-dark mb-3" style = "max-width: 17rem;">
                                
                                <a href = "item.php?id={$row['product_id']}"> <img class="card-img-top" src="./resources/product_images/{$product_image}" alt="Unable to Find Image" style = "max-height: 275px"> </a>
                                <div class="card-body">
                                    <h5 class = "card-title" >{$row['product_title']}</h5>
                                    <p class="card-text" >{$row['product_artist']}</p>
                                    <p class="card-text" >£{$row['product_price']}</p>
                                </div>
                                  
                        </div>
                    </div>
DELIMETER;
                            echo $product;
                        }
                    }
                    else{
                        $noResults = <<<DELIMETER
                <h4>No Results</h4>
DELIMETER;
                        echo $noResults;

                    }
                }
            }
    }