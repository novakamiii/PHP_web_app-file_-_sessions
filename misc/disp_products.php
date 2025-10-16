<?php
include 'db.php';

//Display all products by Category
function displayProductsbyCateg($categ)
{
    global $conn;

    $query = "SELECT * FROM products WHERE category = '$categ'";
    $result = mysqli_query($conn, $query);

    echo "<script>console.log(\"Caregory: Vision Correction\");</script>";

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $id = $row['id'];
        $desc = $row['description'];
        $stock = $row['stock'];
        $categ = $row['category'];
        $img = "img/products/$categ/".$row['img'];

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

//Featured Product Page

function displayFeaturedProducts()
{
    global $conn;
    $query = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result))
    {
        $prod_name = $row['prod_name'];
        $price = $row['price'];
        $stock = $row['stock'];
        $img = $row['img'];

        $html = <<<HTML
                <div class="col-md-4">
                    <div class="card h-50">
                        <img src="https://i.pinimg.com/1200x/66/70/d0/6670d0596683a34e8e3d44e98d54a7da.jpg" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">$prod_name</h5>
                                <p class="card-text">₱$price</p>
                                <a href="product-page.php?name=$prod_name" class="btn btn-secondary w-100">View</a>
                            </div>
                    </div>
                </div>
        HTML;

        echo $html;
    }
}