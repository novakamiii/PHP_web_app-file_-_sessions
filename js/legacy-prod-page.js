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