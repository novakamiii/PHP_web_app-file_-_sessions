<?php
include 'db.php';

//Product Page
function prodDetails()
{
    global $conn;

    $prod_name = $_GET['name'];

    $query = "SELECT * FROM products WHERE prod_name = '" . mysqli_real_escape_string($conn, $prod_name) . "'";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        echo "<div class='alert alert-danger'>Product not found.</div>";
        return;
    }

    $pID = $product['id'];
    $pName = $product['prod_name'];
    $pPrice = $product['price'];
    $pCategory = $product['category'];
    $pStock = $product['stock'];
    $pDesc = $product['description'];
    $pImage = $product['img'];

    if (isset($_SESSION['user_id'])) {
        $addToCart = <<<HTML
        <div class="action-buttons">
            <a href="#" class="btn btn-primary btn-lg me-3" id="addToCartBtn"
                data-id="$pID">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
            </a>
    HTML;
    } else {
        $addToCart = <<<HTML
        <div class="action-buttons">
            <a href="#" class="btn btn-primary btn-lg me-3" id="loginCartNotif"
                data-id="$pID">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
            </a>
    HTML;
    }

    $html = <<<HTML
                <div class="container">
                    <div class="row">
                        <!-- Product Images -->
                        <div class="col-lg-6 mb-4">
                        <div class="product-image-container">
                            <!-- Main Product Image -->
                            <div class="main-image mb-3">
                            <img src="img/products/$pCategory/$pImage.jpg" class="img-fluid rounded product-main-image" alt="Product Image" id="mainProductImage">
                            </div>
                            
                            <!-- Thumbnail Images -->
                            <div class="thumbnail-images">
                            <div class="row g-2">
                                <div class="col-3">
                                <img src="img/products/$pCategory/$pImage.jpg" class="img-fluid rounded thumbnail-img active" alt="Product View 1" onclick="changeMainImage(this.src)">
                                </div>
                                <div class="col-3">
                                <img src="img/products/$pCategory/$pImage.jpg" class="img-fluid rounded thumbnail-img" alt="Product View 2" onclick="changeMainImage(this.src)">
                                </div>
                                <div class="col-3">
                                <img src="img/products/$pCategory/$pImage.jpg" class="img-fluid rounded thumbnail-img" alt="Product View 3" onclick="changeMainImage(this.src)">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!-- Product Information -->
                        <div class="col-lg-6">
                        <div class="product-info">
                            <!-- Product Title -->
                            <h1 class="product-title mb-3" id="productTitle">$prod_name</h1>
                            
                            <!-- Product Category -->
                            <p class="product-category mb-3">
                            <span class="badge bg-secondary" id="productCategoryBadge">$pCategory</span>
                            </p>
                            
                            <!-- Product Price -->
                            <div class="product-price mb-4">
                            <span class="current-price" id="productPrice">₱$pPrice</span>
                            <span class="original-price text-muted ms-2" id="originalPrice" style="display: none;">₱2,000</span>
                            <span class="discount-badge bg-danger ms-2" id="discountBadge" style="display: none;">25% OFF</span>
                            </div>
                            
                            <!-- Product Description -->
                            <div class="product-description mb-4">
                            <h5>Description</h5>
                            <p id="productDescription">
                                $pDesc
                            </p>
                            </div>

                            <!-- Product Features -->
                            <div class="product-features mb-4">
                            <h5>Features</h5>
                            <ul class="feature-list">
                                <li><i class="fas fa-check text-success me-2"></i>Premium lens material</li>
                                <li><i class="fas fa-check text-success me-2"></i>Anti-reflective coating</li>
                                <li><i class="fas fa-check text-success me-2"></i>UV protection</li>
                                <li><i class="fas fa-check text-success me-2"></i>Lightweight frame</li>
                                <li><i class="fas fa-check text-success me-2"></i>Comfortable nose pads</li>
                            </ul>
                            </div>

                            <!-- Size Selection -->
                            <div class="size-selection mb-4">
                            <h5>Frame Size</h5>
                            <div class="size-options">
                                <button class="btn btn-outline-light size-btn active" data-size="small">Small</button>
                                <button class="btn btn-outline-light size-btn" data-size="medium">Medium</button>
                                <button class="btn btn-outline-light size-btn" data-size="large">Large</button>
                            </div>
                            </div>

                            <!-- Quantity Selection -->
                            <div class="quantity-selection mb-4">
                            <h5>Quantity</h5>
                            <div class="quantity-controls d-flex align-items-center">
                                <button class="btn btn-outline-light" id="decreaseQty">-</button>
                                <input type="number" class="form-control quantity-input mx-2" value="1" min="1" max="10" id="quantityInput">
                                <button class="btn btn-outline-light" id="increaseQty">+</button>
                            </div>
                            </div>

                            <!-- Stock Status -->
                            <div class="stock-status mb-4">
                            <span class="stock-indicator text-success" id="stockStatus">
                                <i class="fas fa-check-circle me-2"></i>In Stock ($pStock available)
                            </span>
                            </div>

                            <!-- Action Buttons
                            <div class="action-buttons">
                            <button class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button> -->

                            <!-- Action Buttons -->
                             $addToCart

        HTML;

    echo $html;
}

//Display 4  Products that has relation to that product.
function displayRelatedProducts()
{
    global $conn;

    $urlPOST = $_GET['name'] ?? 'Aria';

    $productCateg = "SELECT * FROM products WHERE prod_name = '$urlPOST'";
    $productRes = mysqli_query($conn, $productCateg);
    $productRow =  mysqli_fetch_assoc($productRes);
    $productCategory = $productRow['category'];


    $query = "SELECT * FROM products WHERE category = '$productCategory' ORDER BY RAND() LIMIT 4";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_name = $row['prod_name'];
        $description = $row['description'];
        $price = $row['price'];
        $stock = $row['stock'];
        $img = "img/products/$productCategory/" . $row['img'];

        $html = <<<HTML
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card related-product-card bg-dark border-light h-100">
                    <img src="$img.jpg" class="card-img-top" alt="Related Product">
                    <div class="card-body d-flex flex-column">
                        <h5 class="rel-card-title">$prod_name</h5>
                        <p class="rel-card-text flex-grow-1">$description</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <span class="price">₱$price</span>
                        <a href="product-page.php?name=$prod_name" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                    </div>
                </div>
        HTML;

        echo $html;
    }
}
