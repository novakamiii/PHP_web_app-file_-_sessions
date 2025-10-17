<?php

function navbarcall()
{
    // Always start session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $userName = $_SESSION['user_name'] ?? null;

    $accountHtml = $userName
    ? <<<HTML
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i> $userName
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                <li><a class="dropdown-item" href="#" id="profileButton">Profile</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </li>
    HTML
    : <<<HTML
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i> Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                <li><a class="dropdown-item" href="#" id="loginButton">Login</a></li>
                <li><a class="dropdown-item" href="#" id="registerButton">Register</a></li>
            </ul>
        </li>
    HTML;

    $html = <<<HTML
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">WEyewear</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form class="search-nav d-flex ms-3 me-3" action="search.php" method="GET">
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

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">🛒 Cart</a></li>
                        $accountHtml
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
