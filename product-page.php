<?php
include 'misc/headernavfooter.php';
include 'misc/product_page_handler.php';
$site = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'template/head.php'?>
  
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
          <?php
            displayRelatedProducts();
          ?>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
   <?php
      footer();
    ?>

</body>
</html>

<?php
mysqli_close($conn);
?>
<?php require_once 'template/scripts.php'?>
<script src="js/legacy-prod-page.js"></script>  
<script type="module" src="js/add-to-cart.js"></script>