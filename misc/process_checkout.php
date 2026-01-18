<?php
// Start output buffering to prevent any output before JSON
ob_start();

include 'db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set content type to JSON
header('Content-Type: application/json');

// Clear any output that might have been sent
ob_clean();

// Check database connection
if (!$conn || !($conn instanceof mysqli)) {
    echo json_encode(['success' => false, 'message' => 'Database connection error. Please try again.']);
    ob_end_flush();
    exit;
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to checkout.']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    
    // Get customer information
    $customer_name = filter_input(INPUT_POST, "customer_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $customer_email = filter_input(INPUT_POST, "customer_email", FILTER_SANITIZE_EMAIL);
    $customer_contact = filter_input(INPUT_POST, "customer_contact", FILTER_SANITIZE_SPECIAL_CHARS);
    $customer_address = filter_input(INPUT_POST, "customer_address", FILTER_SANITIZE_SPECIAL_CHARS);
    
    // Validate required fields
    if (empty($customer_name) || empty($customer_email) || empty($customer_contact) || empty($customer_address)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
        exit;
    }
    
    // Fetch cart items
    $cart_query = "SELECT c.*, p.img, p.category, p.price as unit_price 
                   FROM cart c 
                   JOIN products p ON c.prod_name = p.prod_name 
                   WHERE c.usr_id = ?";
    $cart_stmt = mysqli_prepare($conn, $cart_query);
    mysqli_stmt_bind_param($cart_stmt, "i", $user_id);
    mysqli_stmt_execute($cart_stmt);
    $cart_result = mysqli_stmt_get_result($cart_stmt);
    $cart_items = [];
    $subtotal = 0;
    
    while ($item = mysqli_fetch_assoc($cart_result)) {
        $cart_items[] = $item;
        $subtotal += $item['price'];
    }
    mysqli_stmt_close($cart_stmt);
    
    if (empty($cart_items)) {
        echo json_encode(['success' => false, 'message' => 'Your cart is empty.']);
        exit;
    }
    
    // Calculate totals
    $shipping = 100.00;
    $total = $subtotal + $shipping;
    
    // Generate order ID (using timestamp + user_id for uniqueness)
    $order_id = time() . $user_id;
    
    // Initialize order statuses in session if not exists
    if (!isset($_SESSION['order_statuses'])) {
        $_SESSION['order_statuses'] = [];
    }
    
    // Initialize order items storage in session
    if (!isset($_SESSION['order_items'])) {
        $_SESSION['order_items'] = [];
    }
    
    // Store order in session
    $_SESSION['order_statuses'][$order_id] = 'pending';
    
    // Store order details
    $order_data = [
        'id' => $order_id,
        'user_id' => $user_id,
        'date' => date('F j, Y g:i A'),
        'total' => number_format($total, 2),
        'subtotal' => number_format($subtotal, 2),
        'shipping' => number_format($shipping, 2),
        'status' => 'pending', // Include status in order data
        'customer_name' => $customer_name,
        'customer_email' => $customer_email,
        'customer_contact' => $customer_contact,
        'customer_address' => $customer_address,
        'items' => []
    ];
    
    // Store order items
    foreach ($cart_items as $item) {
        $order_data['items'][] = [
            'name' => $item['prod_name'],
            'qty' => $item['quantity'],
            'size' => $item['frame_size'] ?? '',
            'price' => number_format($item['price'], 2),
            'img' => '../img/products/' . $item['category'] . '/' . $item['img'] . '.jpg'
        ];
    }
    
    // Store order in session
    if (!isset($_SESSION['user_orders'])) {
        $_SESSION['user_orders'] = [];
    }
    $_SESSION['user_orders'][$order_id] = $order_data;
    
    // Clear cart after successful order
    $clear_cart_query = "DELETE FROM cart WHERE usr_id = ?";
    $clear_stmt = mysqli_prepare($conn, $clear_cart_query);
    mysqli_stmt_bind_param($clear_stmt, "i", $user_id);
    mysqli_stmt_execute($clear_stmt);
    mysqli_stmt_close($clear_stmt);
    
    mysqli_close($conn);
    
    // Return JSON response
    ob_end_clean(); // Clear any remaining output
    echo json_encode([
        'success' => true, 
        'message' => 'Order placed successfully!',
        'order_id' => $order_id
    ]);
    ob_end_flush();
    exit;
} else {
    ob_end_clean();
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    ob_end_flush();
    exit;
}
?>
