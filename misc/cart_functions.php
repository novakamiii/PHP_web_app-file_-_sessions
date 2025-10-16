<?php
include 'db.php';

// Add to cart function
if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
    $id   = intval($_GET['id']);
    $size = $_GET['size'] ?? '';
    $qty  = intval($_GET['qty'] ?? 1);

    $query = "SELECT * FROM products WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $prod_name = mysqli_real_escape_string($conn, $row['prod_name']);
        $unit_price = $row['price'];

        // Check if already in cart
        $checkQuery = "SELECT * FROM cart WHERE prod_name = '$prod_name' LIMIT 1";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Product already in cart → update quantity & price
            $cartItem = mysqli_fetch_assoc($checkResult);
            $newQty = $cartItem['quantity'] + $qty;
            $newPrice = $unit_price * $newQty;

            $updateQuery = "UPDATE cart 
                            SET quantity = $newQty, price = $newPrice 
                            WHERE prod_name = '$prod_name'";
            mysqli_query($conn, $updateQuery);

        } else {
            // Add new item
            $total_price = $unit_price * $qty;
            $insertQuery = "INSERT INTO cart (prod_name, quantity, price, frame_size) 
                            VALUES ('$prod_name', $qty, '$total_price', '$size')";
            mysqli_query($conn, $insertQuery);
        }

        echo "<script>alert('{$prod_name} added to cart!');</script>";

    } else {
        echo "<script>alert('Product not found.');</script>";
    }
}

function showCartItems()
{
    global $conn;

    $query = "SELECT * FROM cart";
    $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $prod_name = $row['prod_name'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $frame_size = $row['frame_size']; 

            //GET IMG & PER PRICE
            $imageQuery = "SELECT * FROM products WHERE prod_name = '$prod_name'";
            $imageRes = mysqli_query($conn, $imageQuery);
            $imageRow = mysqli_fetch_assoc($imageRes);
            $image = $imageRow['img'];
            $category = $imageRow['category'];
            $perPrice = $imageRow['price'];

            $link = "img/products/$category/$image";
            
            $html = <<<HTML
                <div class="list-group-item d-flex align-items-center" data-unit="$perPrice">
                    <img src="$link.jpg" alt="$prod_name" style="width:64px;height:64px;object-fit:cover;border-radius:6px;margin-right:12px">
                    <div class="flex-fill">
                    <div class="fw-bold">$prod_name</div>
                    <div>Qty: <span class="qty">$quantity</span> &middot; ₱$perPrice</div>
                    </div>
                    <div>
                    <div class="text-end">₱<span class="item-total">$price</span></div> <!-- ✅ wrapped with .item-total -->
                    <div class="btn-group mt-2" role="group">
                        <button class="btn btn-sm btn-outline-secondary decrease">−</button>
                        <button class="btn btn-sm btn-outline-secondary increase">+</button>
                        <button class="btn btn-sm btn-outline-danger remove">Remove</button>
                    </div>
                    </div>
                </div>
            HTML;


            echo $html;

        }

}


?>
