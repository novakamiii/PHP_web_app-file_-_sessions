<?php
include 'db.php';

//Display the Vision Correction Products
function displayVisionCorrection()
{
    global $conn;

    $query = "SELECT * FROM products WHERE category = 'vision'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $id = $row['id'];
        $desc = $row['description'];
        $stock = $row['stock'];
        $img = "img/products/vision/".$row['img'];

        $html = <<<HTML
                    <div class="Vision-item">
                         <img src="$img.jpg" class="vision-img" alt="$prod_name" style="width:200px;height:200px;">
                         <p class="vis-tag">$prod_name<span style="margin-left: 50px;">₱$price</span></p> 
                         <div class="text-center">
                         <a href="#" class="btn btn-secondary w-70">Add to Cart</a>
                        </div>
                    </div>
                    <script>console.log("Displaying: $prod_name");</script>
        HTML;

        echo $html;
    }
}

//Display the Protection Products
function displayProtection()
{
    global $conn;

    $query = "SELECT * FROM products WHERE category = 'protection'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $id = $row['id'];
        $desc = $row['description'];
        $stock = $row['stock'];
        $img = "img/products/protection/".$row['img'];

        $html = <<<HTML
                    <div class="protection-item">
                        <img src="$img.jpg" class="protection-img" alt="$prod_name" style="width:200px;height:200px;">
                        <p class="pro-tag">$prod_name<span style="margin-left: 50px;">₱$price</span></p> 
                        <div class="text-center">
                        <a href="#" class="btn btn-secondary w-20 ">Add to Cart</a>
                        </div>
                    </div>
                    <script>console.log("Displaying: $prod_name");</script>
        HTML;

        echo $html;
    }
}

//Display the Sunglasses Products
function displaySunglasses()
{
    global $conn;

    $query = "SELECT * FROM products WHERE category = 'sunglasses'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $id = $row['id'];
        $desc = $row['description'];
        $stock = $row['stock'];
        $img = "img/products/sunglasses/".$row['img'];

        $html = <<<HTML
                    <div class="sunglasses-item">
                        <img src="$img.jpg" class="sunglasses-img" alt="$prod_name" style="width:200px;height:200px;">
                        <p class="sun-tag">$prod_name<span style="margin-left: 50px;">₱$price</span></p> 
                        <div class="text-center">
                        <a href="#" class="btn btn-secondary w-20 ">Add to Cart</a>
                        </div>
                    </div>
                    <script>console.log("Displaying: $prod_name");</script>
        HTML;

        echo $html;
    }
}

//Display the Fashion Products
function displayFashion()
{
    global $conn;

    $query = "SELECT * FROM products WHERE category = 'fashion'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $id = $row['id'];
        $desc = $row['description'];
        $stock = $row['stock'];
        $img = "img/products/fashion/".$row['img'];

        $html = <<<HTML
                    <div class="Fashion-item">
                        <img src="$img.jpg" class="Fashion-img" alt="$prod_name" style="width:200px;height:200px;">
                        <p class="Fashion-tag">$prod_name<span style="margin-left: 55px;">₱$price</span></p> 
                        <div class="text-center">
                        <a href="#" class="btn btn-secondary w-20 ">Add to Cart</a>
                        </div>
                    </div>
                    <script>console.log("Displaying: $prod_name");</script>
        HTML;

        echo $html;
    }
}
