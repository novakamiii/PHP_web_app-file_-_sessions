$(document).ready(function () {
    const $searchResults = $('#searchResults');
    const $resultsCount = $('#resultsCount');
    const $loadingSpinner = $('#loadingSpinner');
    const $noResults = $('#noResults');
    const $categoryFilter = $('#categoryFilter');
    const $priceFilter = $('#priceFilter');
    const $sortFilter = $('#sortFilter');
    const $gridView = $('#gridView');
    const $listView = $('#listView');
    const $searchForm = $('#searchForm');
    const $searchInput = $('#searchInput');

    let currentView = 'grid';
    let sampleProducts = [];

    // ✅ Fetch products from PHP
    function loadProducts() {
        $loadingSpinner.show();
        $.ajax({
            url: 'misc/search_function.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log('Loaded products:', data); // Debug
                sampleProducts = data;
                performSearch();
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
            },
            complete: function () {
                $loadingSpinner.hide();
            }
        });
    }

    // ✅ Filtering + searching
    function performSearch() {
        const searchTerm = $searchInput.val().toLowerCase();
        const category = $categoryFilter.val();
        const priceRange = $priceFilter.val();

        const filtered = sampleProducts.filter(product => {
            const name = product.name ? product.name.toLowerCase() : '';
            const desc = product.description ? product.description.toLowerCase() : '';
            const matchesSearch = name.includes(searchTerm) || desc.includes(searchTerm);
            const matchesCategory = !category || product.category === category;
            const matchesPrice = !priceRange || checkPriceRange(parseFloat(product.price), priceRange);
            return matchesSearch && matchesCategory && matchesPrice;
        });

        sortProducts(filtered);
        displayResults(filtered);
    }

    // ✅ Price range filter logic
    function checkPriceRange(price, range) {
        switch (range) {
            case '0-1000': return price < 1000;
            case '1000-2000': return price >= 1000 && price < 2000;
            case '2000-3000': return price >= 2000 && price < 3000;
            case '3000+': return price >= 3000;
            default: return true;
        }
    }

    // ✅ Sorting
    function sortProducts(products) {
        const sortBy = $sortFilter.val();
        switch (sortBy) {
            case 'name': products.sort((a, b) => a.name.localeCompare(b.name)); break;
            case 'price-low': products.sort((a, b) => a.price - b.price); break;
            case 'price-high': products.sort((a, b) => b.price - a.price); break;
            case 'newest': products.sort((a, b) => b.id - a.id); break;
        }
    }

    // ✅ Display results
    function displayResults(products) {
        $searchResults.empty();
        $noResults.hide();

        if (products.length === 0) {
            $noResults.show();
            $resultsCount.text('No products found');
            return;
        }

        $resultsCount.text(`Showing ${products.length} product${products.length !== 1 ? 's' : ''}`);

        const viewClass = currentView === 'grid' ? 'col-lg-3 col-md-4 col-sm-6' : 'col-12';
        const cardClass = currentView === 'grid' ? 'product-card-grid' : 'product-card-list';

        products.forEach(product => {
            const card = `
        <div class="${viewClass} mb-4">
          <div class="card ${cardClass} bg-dark border-light h-100">
            <img src="${product.image}" class="card-img-top" alt="${product.name}" style="height:200px;object-fit:cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">${product.name}</h5>
              <p class="card-text text-muted flex-grow-1">${product.description}</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price">₱${parseFloat(product.price).toLocaleString()}</span>
                <button class="btn btn-outline-light btn-sm" onclick="viewProduct('${product.name}')">
                  <i class="fas fa-cart-plus"></i>View
                </button>
              </div>
            </div>
          </div>
        </div>`;
            $searchResults.append(card);
        });
    }

    // ✅ Event Listeners
    $searchForm.on('submit', function (e) {
        e.preventDefault();
        performSearch();
    });

    $categoryFilter.add($priceFilter).add($sortFilter).on('change', performSearch);

    $gridView.on('click', function () {
        currentView = 'grid';
        $gridView.addClass('active');
        $listView.removeClass('active');
        performSearch();
    });

    $listView.on('click', function () {
        currentView = 'list';
        $listView.addClass('active');
        $gridView.removeClass('active');
        performSearch();
    });

    // ✅ Initial load
    loadProducts();
});

function viewProduct(productName) {
    const safeName = encodeURIComponent(productName);
    const redirectUrl = `product-page.php?name=${safeName}`;
    window.location.href = redirectUrl;
}

$(document).ready(function () {
    // Auto-search if coming from navbar
    const urlParams = new URLSearchParams(window.location.search);
    const initialSearch = urlParams.get('search_query');
    if (initialSearch) {
        $('#searchInput').val(initialSearch);
        setTimeout(() => {
            $('#searchForm').submit();
        }, 200);
    }
});

$(document).ready(function () {
    if (window.location.pathname.includes('search.php')) {
        $(".search-nav").hide(); // or $(".search-nav").hide()
    }
});


