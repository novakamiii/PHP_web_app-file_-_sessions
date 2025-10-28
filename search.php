<?php
include 'misc/headernavfooter.php';

$searchQuery = isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEyewear - Search</title>
  <link href="styles.css" rel="stylesheet">
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="js/search.js"></script>
</head>

<body class="bg-dark text-light">

  <!-- NAVBAR -->
  <?php
  navbarcall();
  ?>

  <!-- SEARCH HERO
  <header class="search-hero text-center text-white py-5 bg-dark" style="background:url('https://i.pinimg.com/1200x/cc/c8/d1/ccc8d1cbc54f9aeed28b3b44fa0f6599.jpg') center/cover no-repeat;">
    <div class="container">
      <h1 class="search-display-10">Search Products</h1>
      <p class="search-lead">Find your perfect eyewear</p>
    </div>
  </header> -->

  <!-- SEARCH SECTION -->
  <section class="search-section py-5 bg-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <!-- Search Form -->
          <div class="search-form-container mb-5">
            <form class="search-form" id="searchForm">
              <div class="input-group input-group-lg">
                <input type="text" class="form-control search-input" id="searchInput" value="<?php echo $searchQuery; ?> placeholder="Search for eyewear..." aria-label="Search products">
                <button class="btn btn-outline-light search-btn" type="submit">
                  <i class="fas fa-search"></i> Search
                </button>
              </div>
            </form>
          </div>

          <!-- Filter Options -->
          <div class="filter-section mb-4">
            <div class="row">
              <div class="col-md-3 mb-3">
                <select class="form-select filter-select" id="categoryFilter">
                  <option value="">All Categories</option>
                  <option value="vision">Vision Correction</option>
                  <option value="protection">Protection</option>
                  <option value="sunglasses">Sunglasses</option>
                  <option value="fashion">Fashion</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <select class="form-select filter-select" id="priceFilter">
                  <option value="">All Prices</option>
                  <option value="0-1000">Under ₱1,000</option>
                  <option value="1000-2000">₱1,000 - ₱2,000</option>
                  <option value="2000-3000">₱2,000 - ₱3,000</option>
                  <option value="3000+">Above ₱3,000</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <select class="form-select filter-select" id="sortFilter">
                  <option value="name">Sort by Name</option>
                  <option value="price-low">Price: Low to High</option>
                  <option value="price-high">Price: High to Low</option>
                  <option value="newest">Newest First</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <button class="btn btn-outline-light w-100" id="clearFilters">
                  <i class="fas fa-times"></i> Clear Filters
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SEARCH RESULTS -->
  <section class="search-results py-5 bg-dark">
    <div class="container">
      <!-- Results Header -->
      <div class="results-header mb-4">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2 class="results-title">Search Results</h2>
            <p class="results-count text-muted" id="resultsCount">Showing 0 products</p>
          </div>
          <div class="col-md-6 text-end">
            <div class="view-options">
              <button class="btn btn-outline-light btn-sm me-2 active" id="gridView">
                <i class="fas fa-th"></i> Grid
              </button>
              <button class="btn btn-outline-light btn-sm" id="listView">
                <i class="fas fa-list"></i> List
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Loading Spinner -->
      <div class="text-center py-5" id="loadingSpinner" style="display: none;">
        <div class="spinner-border text-light" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <p class="mt-3">Searching products...</p>
      </div>

      <!-- No Results Message -->
      <div class="no-results text-center py-5" id="noResults" style="display: none;">
        <i class="fas fa-search fa-3x text-muted mb-3"></i>
        <h3>No products found</h3>
        <p class="text-muted">Try adjusting your search terms or filters</p>
        <button class="btn btn-outline-light" id="resetSearch">Reset Search</button>
      </div>

      <!-- Search Results Grid -->
      <div class="search-results-grid" id="searchResults">
        <!-- Results will be populated here by JavaScript -->
      </div>

      <!-- Pagination -->
      <nav aria-label="Search results pagination" class="mt-5">
        <ul class="pagination justify-content-center" id="pagination">
          <!-- Pagination will be populated here by JavaScript -->
        </ul>
      </nav>
    </div>
  </section>

  <!-- FOOTER
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
  </footer> -->

  <!-- FOOTER -->
    <?php
      footer();
    ?>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <script>
   
  </script>
</body>

</html>