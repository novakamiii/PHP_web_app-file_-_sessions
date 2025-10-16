<?php
include 'misc/headernavfooter.php';
include 'misc/product_page_handler.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEyewear - Product Details</title>
  <link href="styles.css" rel="stylesheet">
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="add-to-cart.js"></script>
</head>

<body class="bg-dark text-light">

  <!-- NAVBAR -->
  <?php
  navbarcall();
  ?>

  <!-- PRODUCT DETAILS SECTION -->
  <section class="product-details py-5 bg-dark">
    <?php 
      prodDetails();
    ?>
              <button class="btn btn-outline-light btn-lg me-3" onclick="addToWishlist()">
                <i class="fas fa-heart me-2"></i>Add to Wishlist
              </button>
              <button class="btn btn-outline-light btn-lg" onclick="shareProduct()">
                <i class="fas fa-share me-2"></i>Share
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PRODUCT DETAILS TABS -->
  <section class="product-tabs py-5 bg-dark">
    <div class="container">
      <ul class="nav nav-tabs product-tabs-nav" id="productTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab">
            Specifications
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">
            Reviews (4)
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab">
            Shipping & Returns
          </button>
        </li>
      </ul>
      
      <div class="tab-content" id="productTabsContent">
        <!-- Specifications Tab -->
        <div class="tab-pane fade show active" id="specifications" role="tabpanel">
          <div class="specifications-content p-4">
            <div class="row">
              <div class="col-md-6">
                <h5>Technical Specifications</h5>
                <table class="table table-dark table-striped">
                  <tbody>
                    <tr>
                      <td>Frame Material</td>
                      <td>Acetate</td>
                    </tr>
                    <tr>
                      <td>Lens Material</td>
                      <td>Polycarbonate</td>
                    </tr>
                    <tr>
                      <td>Lens Coating</td>
                      <td>Anti-reflective</td>
                    </tr>
                    <tr>
                      <td>UV Protection</td>
                      <td>100% UV400</td>
                    </tr>
                    <tr>
                      <td>Frame Width</td>
                      <td>135mm</td>
                    </tr>
                    <tr>
                      <td>Lens Height</td>
                      <td>45mm</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-6">
                <h5>Care Instructions</h5>
                <ul class="care-list">
                  <li>Clean with microfiber cloth</li>
                  <li>Avoid harsh chemicals</li>
                  <li>Store in protective case</li>
                  <li>Handle by the temples</li>
                  <li>Regular professional cleaning</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Reviews Tab -->
        <div class="tab-pane fade" id="reviews" role="tabpanel">
          <div class="reviews-content p-4">
            <div class="reviews-summary mb-4">
              <div class="row align-items-center">
                <div class="col-md-4 text-center">
                  <div class="rating-display">
                    <span class="rating-number">4.5</span>
                    <div class="stars">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                    <p class="rating-count">Based on 4 reviews</p>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="rating-breakdown">
                    <div class="rating-bar">
                      <span>5★</span>
                      <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                      <span>2</span>
                    </div>
                    <div class="rating-bar">
                      <span>4★</span>
                      <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 25%"></div>
                      </div>
                      <span>1</span>
                    </div>
                    <div class="rating-bar">
                      <span>3★</span>
                      <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 25%"></div>
                      </div>
                      <span>1</span>
                    </div>
                    <div class="rating-bar">
                      <span>2★</span>
                      <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 0%"></div>
                      </div>
                      <span>0</span>
                    </div>
                    <div class="rating-bar">
                      <span>1★</span>
                      <div class="progress">
                        <div class="progress-bar bg-warning" style="width: 0%"></div>
                      </div>
                      <span>0</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Individual Reviews -->
            <div class="individual-reviews">
              <div class="review-item mb-4 p-3 border border-secondary rounded">
                <div class="review-header d-flex justify-content-between align-items-center mb-2">
                  <div class="reviewer-info">
                    <strong>Sarah M.</strong>
                    <div class="stars">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                    </div>
                  </div>
                  <small class="text-muted">2 days ago</small>
                </div>
                <p class="review-text">Excellent quality and very comfortable to wear. The frame fits perfectly and the lenses are crystal clear.</p>
              </div>

              <div class="review-item mb-4 p-3 border border-secondary rounded">
                <div class="review-header d-flex justify-content-between align-items-center mb-2">
                  <div class="reviewer-info">
                    <strong>John D.</strong>
                    <div class="stars">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="far fa-star text-warning"></i>
                    </div>
                  </div>
                  <small class="text-muted">1 week ago</small>
                </div>
                <p class="review-text">Great value for money. The glasses look stylish and the build quality is solid.</p>
              </div>
            </div>

            <!-- Write Review Form -->
            <div class="write-review mt-4">
              <h5>Write a Review</h5>
              <form class="review-form">
                <div class="mb-3">
                  <label class="form-label">Rating</label>
                  <div class="rating-input">
                    <i class="far fa-star rating-star" data-rating="1"></i>
                    <i class="far fa-star rating-star" data-rating="2"></i>
                    <i class="far fa-star rating-star" data-rating="3"></i>
                    <i class="far fa-star rating-star" data-rating="4"></i>
                    <i class="far fa-star rating-star" data-rating="5"></i>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="reviewText" class="form-label">Your Review</label>
                  <textarea class="form-control" id="reviewText" rows="4" placeholder="Share your experience with this product..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
              </form>
            </div>
          </div>
        </div>

        <!-- Shipping Tab -->
        <div class="tab-pane fade" id="shipping" role="tabpanel">
          <div class="shipping-content p-4">
            <div class="row">
              <div class="col-md-6">
                <h5>Shipping Information</h5>
                <ul class="shipping-list">
                  <li><i class="fas fa-truck me-2 text-primary"></i>Free shipping on orders over ₱1,000</li>
                  <li><i class="fas fa-clock me-2 text-primary"></i>Standard delivery: 3-5 business days</li>
                  <li><i class="fas fa-shipping-fast me-2 text-primary"></i>Express delivery: 1-2 business days</li>
                  <li><i class="fas fa-map-marker-alt me-2 text-primary"></i>Nationwide delivery available</li>
                </ul>
              </div>
              <div class="col-md-6">
                <h5>Return Policy</h5>
                <ul class="return-list">
                  <li><i class="fas fa-undo me-2 text-success"></i>30-day return policy</li>
                  <li><i class="fas fa-box me-2 text-success"></i>Original packaging required</li>
                  <li><i class="fas fa-tag me-2 text-success"></i>Tags must be attached</li>
                  <li><i class="fas fa-money-bill-wave me-2 text-success"></i>Full refund or exchange</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- RELATED PRODUCTS -->
  <section class="related-products py-5 bg-dark">
    <div class="container">
      <h3 class="related-title mb-4">Related Products</h3>
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card related-product-card bg-dark border-light h-100">
            <img src="img/products/vision/bonnie.jpg" class="card-img-top" alt="Related Product">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Modern Bonnie</h5>
              <p class="card-text text-muted flex-grow-1">Contemporary style vision glasses</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">₱1,800</span>
                <button class="btn btn-outline-light btn-sm">View</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card related-product-card bg-dark border-light h-100">
            <img src="img/products/vision/clyde.jpg" class="card-img-top" alt="Related Product">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Classic Clyde</h5>
              <p class="card-text text-muted flex-grow-1">Timeless design for everyday wear</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">₱1,600</span>
                <button class="btn btn-outline-light btn-sm">View</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card related-product-card bg-dark border-light h-100">
            <img src="img/products/vision/korange.jpg" class="card-img-top" alt="Related Product">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Vibrant Korange</h5>
              <p class="card-text text-muted flex-grow-1">Bold and colorful frame design</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">₱1,900</span>
                <button class="btn btn-outline-light btn-sm">View</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card related-product-card bg-dark border-light h-100">
            <img src="img/products/vision/masahiro.jpg" class="card-img-top" alt="Related Product">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Elegant Masahiro</h5>
              <p class="card-text text-muted flex-grow-1">Sophisticated Japanese-inspired design</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">₱2,200</span>
                <button class="btn btn-outline-light btn-sm">View</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="down py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>WEyewear</h4>
          <p class="text-muted">Elegance and protection for your eyes</p>
        </div>
        <div class="col-md-6 text-end">
          <p class="text-muted">&copy; 2025 WEyewear. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Bootstrap JS -->
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Product page functionality
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize product data (replace with actual data from database)
      // const productData = {
      //   id: 1,
      //   name: "Classic Aria",
      //   category: "Vision Correction",
      //   price: 1500,
      //   originalPrice: 2000,
      //   discount: 25,
      //   description: "Elegant vision correction glasses designed for everyday comfort and style. Features premium materials and precision craftsmanship for optimal vision clarity. Perfect for both professional and casual settings.",
      //   images: [
      //     "img/products/vision/aria.jpg",
      //     "img/products/vision/aria.jpg",
      //     "img/products/vision/aria.jpg",
      //     "img/products/vision/aria.jpg"
      //   ],
      //   stock: 15,
      //   features: [
      //     "Premium lens material",
      //     "Anti-reflective coating",
      //     "UV protection",
      //     "Lightweight frame",
      //     "Comfortable nose pads"
      //   ]
      // };

      // Update product information
      updateProductInfo(productData);

      // Size selection
      const sizeButtons = document.querySelectorAll('.size-btn');
      sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
          sizeButtons.forEach(btn => btn.classList.remove('active'));
          this.classList.add('active');
        });
      });

      // Rating stars
      const ratingStars = document.querySelectorAll('.rating-star');
      ratingStars.forEach(star => {
        star.addEventListener('click', function() {
          const rating = parseInt(this.dataset.rating);
          ratingStars.forEach((s, index) => {
            if (index < rating) {
              s.classList.remove('far');
              s.classList.add('fas');
            } else {
              s.classList.remove('fas');
              s.classList.add('far');
            }
          });
        });
      });
    });

    function updateProductInfo(product) {
      document.getElementById('productTitle').textContent = product.name;
      document.getElementById('productCategory').textContent = product.category;
      document.getElementById('productCategoryBadge').textContent = product.category;
      document.getElementById('productPrice').textContent = `₱${product.price.toLocaleString()}`;
      document.getElementById('productDescription').textContent = product.description;

      if (product.discount > 0) {
        document.getElementById('originalPrice').textContent = `₱${product.originalPrice.toLocaleString()}`;
        document.getElementById('originalPrice').style.display = 'inline';
        document.getElementById('discountBadge').textContent = `${product.discount}% OFF`;
        document.getElementById('discountBadge').style.display = 'inline';
      }

      // Update stock status
      const stockStatus = document.getElementById('stockStatus');
      if (product.stock > 0) {
        stockStatus.innerHTML = `<i class="fas fa-check-circle me-2"></i>In Stock (${product.stock} available)`;
        stockStatus.className = 'stock-indicator text-success';
      } else {
        stockStatus.innerHTML = '<i class="fas fa-times-circle me-2"></i>Out of Stock';
        stockStatus.className = 'stock-indicator text-danger';
      }
    }

    function changeMainImage(src) {
      document.getElementById('mainProductImage').src = src;
      
      // Update active thumbnail
      document.querySelectorAll('.thumbnail-img').forEach(img => {
        img.classList.remove('active');
      });
      event.target.classList.add('active');
    }

    function increaseQuantity() {
      const quantityInput = document.getElementById('quantityInput');
      const currentValue = parseInt(quantityInput.value);
      if (currentValue < 10) {
        quantityInput.value = currentValue + 1;
      }
    }

    function decreaseQuantity() {
      const quantityInput = document.getElementById('quantityInput');
      const currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    }

    function addToCart() {
      const quantity = document.getElementById('quantityInput').value;
      const selectedSize = document.querySelector('.size-btn.active').dataset.size;
      
      // Add to cart functionality
      alert(`Added ${quantity} item(s) of size ${selectedSize} to cart!`);
    }

    function addToWishlist() {
      alert('Product added to wishlist!');
    }

    function shareProduct() {
      if (navigator.share) {
        navigator.share({
          title: document.getElementById('productTitle').textContent,
          text: document.getElementById('productDescription').textContent,
          url: window.location.href
        });
      } else {
        // Fallback for browsers that don't support Web Share API
        navigator.clipboard.writeText(window.location.href);
        alert('Product link copied to clipboard!');
      }
    }
  </script>

  <style>
    /* Product page specific styles */
    .breadcrumb-nav {
      background-color: #171717;
    }

    .breadcrumb-item a {
      text-decoration: none;
    }

    .breadcrumb-item a:hover {
      color: #ffc107 !important;
    }

    .product-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.5rem;
      font-weight: 600;
      color: white;
    }

    .current-price {
      font-size: 2rem;
      font-weight: 700;
      color: #ffc107;
    }

    .original-price {
      text-decoration: line-through;
      font-size: 1.2rem;
    }

    .discount-badge {
      font-size: 0.8rem;
      padding: 0.25rem 0.5rem;
    }

    .product-main-image {
      max-height: 500px;
      object-fit: cover;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .product-main-image:hover {
      transform: scale(1.05);
    }

    .thumbnail-img {
      height: 80px;
      object-fit: cover;
      cursor: pointer;
      opacity: 0.7;
      transition: opacity 0.3s ease;
    }

    .thumbnail-img:hover,
    .thumbnail-img.active {
      opacity: 1;
      border: 2px solid #ffc107;
    }

    .size-btn {
      margin-right: 0.5rem;
      margin-bottom: 0.5rem;
    }

    .size-btn.active {
      background-color: #ffc107;
      color: #000;
      border-color: #ffc107;
    }

    .quantity-input {
      width: 80px;
      text-align: center;
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
    }

    .quantity-input:focus {
      background-color: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.5);
      color: white;
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    }

    .product-tabs-nav .nav-link {
      background-color: transparent;
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
      margin-right: 0.5rem;
    }

    .product-tabs-nav .nav-link.active {
      background-color: #ffc107;
      color: #000;
      border-color: #ffc107;
    }

    .product-tabs-nav .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border-color: rgba(255, 255, 255, 0.5);
    }

    .rating-number {
      font-size: 3rem;
      font-weight: 700;
      color: #ffc107;
    }

    .rating-bar {
      display: flex;
      align-items: center;
      margin-bottom: 0.5rem;
    }

    .rating-bar .progress {
      flex: 1;
      margin: 0 1rem;
      height: 8px;
    }

    .rating-star {
      cursor: pointer;
      font-size: 1.5rem;
      margin-right: 0.25rem;
      transition: color 0.2s ease;
    }

    .rating-star:hover {
      color: #ffc107;
    }

    .related-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2rem;
      font-weight: 400;
      color: white;
    }

    .related-product-card .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .price {
      font-size: 1.25rem;
      font-weight: 600;
      color: #ffc107;
    }

    .feature-list,
    .care-list,
    .shipping-list,
    .return-list {
      list-style: none;
      padding: 0;
    }

    .feature-list li,
    .care-list li,
    .shipping-list li,
    .return-list li {
      margin-bottom: 0.5rem;
    }

    .btn-primary {
      background-color: #ffc107;
      border-color: #ffc107;
      color: #000;
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: #e0a800;
      border-color: #e0a800;
      color: #000;
    }

    @media (max-width: 768px) {
      .product-title {
        font-size: 2rem;
      }
      
      .current-price {
        font-size: 1.5rem;
      }
      
      .product-main-image {
        max-height: 300px;
      }
      
      .thumbnail-img {
        height: 60px;
      }
    }
  </style>

</body>
</html>

<?php
mysqli_close($conn);
?>