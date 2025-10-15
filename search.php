<?php
include 'misc/headernavfooter.php';
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
</head>

<body class="bg-dark text-light">

  <!-- NAVBAR -->
  <?php
  navbarcall();
  ?>

  <!-- SEARCH HERO -->
  <header class="search-hero text-center text-white py-5 bg-dark" style="background:url('https://i.pinimg.com/1200x/cc/c8/d1/ccc8d1cbc54f9aeed28b3b44fa0f6599.jpg') center/cover no-repeat;">
    <div class="container">
      <h1 class="search-display-10">Search Products</h1>
      <p class="search-lead">Find your perfect eyewear</p>
    </div>
  </header>

  <!-- SEARCH SECTION -->
  <section class="search-section py-5 bg-dark">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <!-- Search Form -->
          <div class="search-form-container mb-5">
            <form class="search-form" id="searchForm">
              <div class="input-group input-group-lg">
                <input type="text" class="form-control search-input" id="searchInput" placeholder="Search for eyewear..." aria-label="Search products">
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

  <script>
    // Search functionality
    document.addEventListener('DOMContentLoaded', function() {
      const searchForm = document.getElementById('searchForm');
      const searchInput = document.getElementById('searchInput');
      const categoryFilter = document.getElementById('categoryFilter');
      const priceFilter = document.getElementById('priceFilter');
      const sortFilter = document.getElementById('sortFilter');
      const clearFilters = document.getElementById('clearFilters');
      const searchResults = document.getElementById('searchResults');
      const resultsCount = document.getElementById('resultsCount');
      const loadingSpinner = document.getElementById('loadingSpinner');
      const noResults = document.getElementById('noResults');
      const gridView = document.getElementById('gridView');
      const listView = document.getElementById('listView');

      // Sample product data (replace with actual database query)
      const sampleProducts = [
        {
          id: 1,
          name: "Classic Aria",
          category: "vision",
          price: 1500,
          image: "img/products/vision/aria.jpg",
          description: "Elegant vision correction glasses"
        },
        {
          id: 2,
          name: "Modern Bonnie",
          category: "vision",
          price: 1800,
          image: "img/products/vision/bonnie.jpg",
          description: "Contemporary style vision glasses"
        },
        {
          id: 3,
          name: "Protective Aspalt",
          category: "protection",
          price: 1200,
          image: "img/products/protection/aspalt.jpg",
          description: "Industrial protection eyewear"
        },
        {
          id: 4,
          name: "Stylish Barbara",
          category: "sunglasses",
          price: 2200,
          image: "img/products/sunglasses/barbara.jpg",
          description: "Fashionable sunglasses"
        },
        {
          id: 5,
          name: "Trendy Audrey",
          category: "fashion",
          price: 2500,
          image: "img/products/fashion/audrey.jpg",
          description: "Fashion-forward eyewear"
        }
      ];

      let currentView = 'grid';
      let filteredProducts = [...sampleProducts];

      // Search and filter functions
      function performSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        const category = categoryFilter.value;
        const priceRange = priceFilter.value;

        loadingSpinner.style.display = 'block';
        searchResults.innerHTML = '';
        noResults.style.display = 'none';

        setTimeout(() => {
          filteredProducts = sampleProducts.filter(product => {
            const matchesSearch = product.name.toLowerCase().includes(searchTerm) ||
                                 product.description.toLowerCase().includes(searchTerm);
            const matchesCategory = !category || product.category === category;
            const matchesPrice = !priceRange || checkPriceRange(product.price, priceRange);

            return matchesSearch && matchesCategory && matchesPrice;
          });

          // Sort products
          sortProducts();

          displayResults();
          loadingSpinner.style.display = 'none';
        }, 500);
      }

      function checkPriceRange(price, range) {
        switch(range) {
          case '0-1000': return price < 1000;
          case '1000-2000': return price >= 1000 && price < 2000;
          case '2000-3000': return price >= 2000 && price < 3000;
          case '3000+': return price >= 3000;
          default: return true;
        }
      }

      function sortProducts() {
        const sortBy = sortFilter.value;
        switch(sortBy) {
          case 'name':
            filteredProducts.sort((a, b) => a.name.localeCompare(b.name));
            break;
          case 'price-low':
            filteredProducts.sort((a, b) => a.price - b.price);
            break;
          case 'price-high':
            filteredProducts.sort((a, b) => b.price - a.price);
            break;
          case 'newest':
            filteredProducts.sort((a, b) => b.id - a.id);
            break;
        }
      }

      function displayResults() {
        if (filteredProducts.length === 0) {
          noResults.style.display = 'block';
          resultsCount.textContent = 'No products found';
          return;
        }

        resultsCount.textContent = `Showing ${filteredProducts.length} product${filteredProducts.length !== 1 ? 's' : ''}`;

        const viewClass = currentView === 'grid' ? 'col-lg-3 col-md-4 col-sm-6' : 'col-12';
        const cardClass = currentView === 'grid' ? 'product-card-grid' : 'product-card-list';

        filteredProducts.forEach(product => {
          const productCard = createProductCard(product, cardClass);
          searchResults.innerHTML += `<div class="${viewClass} mb-4">${productCard}</div>`;
        });
      }

      function createProductCard(product, cardClass) {
        return `
          <div class="card ${cardClass} bg-dark border-light h-100">
            <img src="${product.image}" class="card-img-top" alt="${product.name}" style="height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">${product.name}</h5>
              <p class="card-text text-muted flex-grow-1">${product.description}</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">₱${product.price.toLocaleString()}</span>
                <button class="btn btn-outline-light btn-sm" onclick="addToCart(${product.id})">
                  <i class="fas fa-cart-plus"></i> Add to Cart
                </button>
              </div>
            </div>
          </div>
        `;
      }

      // Event listeners
      searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        performSearch();
      });

      [categoryFilter, priceFilter, sortFilter].forEach(filter => {
        filter.addEventListener('change', performSearch);
      });

      clearFilters.addEventListener('click', function() {
        searchInput.value = '';
        categoryFilter.value = '';
        priceFilter.value = '';
        sortFilter.value = 'name';
        performSearch();
      });

      gridView.addEventListener('click', function() {
        currentView = 'grid';
        gridView.classList.add('active');
        listView.classList.remove('active');
        displayResults();
      });

      listView.addEventListener('click', function() {
        currentView = 'list';
        listView.classList.add('active');
        gridView.classList.remove('active');
        displayResults();
      });

      document.getElementById('resetSearch').addEventListener('click', function() {
        searchInput.value = '';
        categoryFilter.value = '';
        priceFilter.value = '';
        sortFilter.value = 'name';
        performSearch();
      });

      // Initial load
      performSearch();
    });

    function addToCart(productId) {
      // Add to cart functionality
      alert('Product added to cart!');
    }
  </script>

  <style>
    /* Search-specific styles */
    .search-hero {
      width: 100vw;
      min-height: 50vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .search-display-10 {
      font-family: 'Corinthia', 'Montserrat', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      font-weight: 590;
      letter-spacing: 0.05em;
      text-shadow: 0 4px 8px rgba(0, 0, 0, 0.45);
      font-size: 4rem;
      margin-bottom: 1rem;
    }

    .search-lead {
      font-size: 1.5rem;
      font-weight: 300;
      line-height: 1.5;
      font-family: 'Cormorant Garamond', serif;
      text-shadow: 0 4px 8px rgba(0, 0, 0, 0.45);
    }

    .search-form-container {
      background: rgba(0, 0, 0, 0.7);
      padding: 2rem;
      border-radius: 10px;
      backdrop-filter: blur(10px);
    }

    .search-input {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
    }

    .search-input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .search-input:focus {
      background-color: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.5);
      color: white;
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    }

    .filter-select {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
    }

    .filter-select:focus {
      background-color: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.5);
      color: white;
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    }

    .filter-select option {
      background-color: #212529;
      color: white;
    }

    .results-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.5rem;
      font-weight: 400;
      color: white;
    }

    .product-card-grid .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .product-card-list {
      display: flex;
      flex-direction: row;
    }

    .product-card-list .card-img-top {
      width: 200px;
      height: 150px;
      object-fit: cover;
      flex-shrink: 0;
    }

    .product-card-list .card-body {
      flex: 1;
    }

    .price {
      font-size: 1.25rem;
      font-weight: 600;
      color: #ffc107;
    }

    .btn-outline-light:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border-color: rgba(255, 255, 255, 0.5);
    }

    .btn.active {
      background-color: rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 255, 255, 0.5);
    }

    @media (max-width: 768px) {
      .search-display-10 {
        font-size: 2.5rem;
      }
      
      .search-lead {
        font-size: 1.2rem;
      }
      
      .product-card-list {
        flex-direction: column;
      }
      
      .product-card-list .card-img-top {
        width: 100%;
        height: 200px;
      }
    }
  </style>

</body>
</html>
