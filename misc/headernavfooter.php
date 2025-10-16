<?php

function navbarcall()
{
    $html = <<<HTML
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a class="navbar-brand" href="index.php">WEyewear</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="search-nav d-flex" action="search.php" method="GET">
                <input 
                    class="form-control me-2" 
                    type="search" 
                    name="search_query" 
                    placeholder="Search products..." 
                    aria-label="Search"
                    required
                >
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>



            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">🛒 Cart</a></li>
                <li class ="nav-item"><a class="nav-link" href="#" id="loginButton">👤</a></li>
                </ul>
            </div>
            </div>
        </nav>
    HTML;

    echo $html;
}

function footer()
{
    $html = <<<HTML
            <footer class="mt-auto bg-black text-center py-2 text-secondary small">
                © 2025 Weyewear | Designed for demo purposes
            </footer>
    HTML;

    echo $html;
}