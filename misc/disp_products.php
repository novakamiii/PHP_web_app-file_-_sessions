<?php
include 'db.php';

//Display the Vision Correction Products
function displayVisionCorrection()
{
    global $conn;

    $query = "SELECT * FROM products WHERE category = 'vision'";
    $result = mysqli_query($conn, $query);

    echo "<script>console.log(\"Caregory: Vision Correction\");</script>";

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
                         <a href="product-page.php?name=$prod_name" class="btn btn-secondary w-70">View</a>
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

    echo "<script>console.log(\"Category: Protection \");</script>";

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
                        <a href="product-page.php?name=$prod_name" class="btn btn-secondary w-20 ">View</a>
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

    echo "<script>console.log(\"Category: Sunglasses \");</script>";

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
                        <a href="product-page.php?name=$prod_name" class="btn btn-secondary w-20 ">View</a>
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

    echo "<script>console.log(\"Category: Fashion\");</script>";

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['prod_name'];
        $price = number_format($row['price'], 2, '.', ','); // Format price for consistency
        $id = $row['id'];
        $desc = $row['description'];
        $stock = $row['stock'];
        $img = "img/products/fashion/" . $row['img'];

        $html = <<<HTML
                    <div class="Fashion-item">
                        <img src="$img.jpg" class="Fashion-img" alt="$prod_name" style="width:200px;height:200px;">
                        
                        <div class="product-info-box">
                            <p class="Fashion-tag product-name-text">$prod_name</p>
                            <p class="Fashion-tag product-price-text">₱$price</p>
                        </div>

                        <div class="text-center">
                        <a href="product-page.php?name=$prod_name" class="btn btn-secondary w-20 ">View</a>
                        </div>
                    </div>
                    <script>console.log("Displaying: $prod_name");</script>
        HTML;

        echo $html;
    }
}