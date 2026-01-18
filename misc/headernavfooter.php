<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * For showing the navigation bar.
 */
function navbarcall()
{
    // Determine base path based on current directory
    $script_path = $_SERVER['PHP_SELF'];
    $base_path = '';
    $user_info_link = 'profile/user-information.php';
    $orders_link = 'profile/orders-list.php';
    
    // If we're in profile directory, use relative paths for profile pages (no base_path prefix)
    if (strpos($script_path, '/profile/') !== false) {
        $base_path = '../';
        // Profile pages are in the same directory, so no base_path needed
        $user_info_link = 'user-information.php';
        $orders_link = 'orders-list.php';
    }
    
    //Checks if user is logged in:

    //Not logged in:
    if (!isset($_SESSION['user_id']))
    {
        $logSignHTML = <<<HTML
            <li><a class="dropdown-item" href="#" id="loginButton">Login</a></li>
            <li><a class="dropdown-item" href="#" id="registerButton">Register</a></li>
        HTML;
        $cartHTML = <<<HTML
        HTML;
    }
    //Logged In:
    else
    {
        $name = $_SESSION['user_name'];
        
        // Build profile links - if in profile directory, don't use base_path
        if (strpos($script_path, '/profile/') !== false) {
            // Already in profile directory - use relative paths without base_path
            $profile_user_info = 'user-information.php';
            $profile_orders = 'orders-list.php';
        } else {
            // In root directory - use base_path with profile/ prefix
            $profile_user_info = 'profile/user-information.php';
            $profile_orders = 'profile/orders-list.php';
        }
        
        $logSignHTML = <<<HTML
            <li><p class=" dropdown-item fw-bold">Hi, $name!</p></li>
            <hr>
            <li><a class="dropdown-item" href="{$profile_user_info}"><i class="fas fa-user me-2"></i>User Information</a></li>
            <li><a class="dropdown-item" href="{$profile_orders}"><i class="fas fa-shopping-bag me-2"></i>My Orders</a></li>
            <li><a class="dropdown-item" href="#" id="logoutButton">Logout</a></li>
        HTML;
        $cartHTML = <<<HTML
            <li class="nav-item"><a class="nav-link" href="{$base_path}cart.php">🛒 Cart</a></li>
        HTML;
    }

    //Navbar Format
    $html = <<<HTML
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{$base_path}index.php">Silicon</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form class="search-nav d-flex ms-3 me-3" action="{$base_path}search.php" method="GET">
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
                        <li class="nav-item"><a class="nav-link" href="{$base_path}index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{$base_path}products.php">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="{$base_path}about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{$base_path}contact-us.php">Contact Us</a></li>
                        $cartHTML

                        <!-- Account Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                $logSignHTML
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    HTML;

    echo $html;
}

/**
 * For showing the footer
 */
function footer()
{
    $html = <<<HTML
            <footer class="mt-auto bg-black text-center py-2 text-secondary small">
                © 2025 Silicon Optics | Designed for demo purposes
            </footer>
    HTML;

    echo $html;
}