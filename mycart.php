<?php
session_start();
require_once "database.php";

$user_id = $_SESSION['user_id']; // Change dynamically if using authentication

// Handle Update Quantity
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_cart"])) {
    $cart_id = intval($_POST["cart_id"]);
    $change = intval($_POST["update_cart"]);

    $sql = "SELECT quantity FROM cart WHERE id = $cart_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $newQuantity = $row["quantity"] + $change;
        if ($newQuantity > 0) {
            $updateQuery = "UPDATE cart SET quantity = $newQuantity WHERE id = $cart_id";
            $conn->query($updateQuery);
        }
    }
}

// Handle Remove Item
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["remove_cart"])) {
    $cart_id = intval($_POST["cart_id"]);
    $deleteQuery = "DELETE FROM cart WHERE id = $cart_id";
    $conn->query($deleteQuery);
}

// Fetch Cart Data
$sql = "SELECT p.*, c.quantity, c.id AS cart_id 
        FROM products p 
        JOIN cart c ON p.id = c.product_id 
        WHERE c.user_id = $user_id";
$result = $conn->query($sql);

$products = [];
$totalPrice = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
        $totalPrice += $row['productPrice'] * $row['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .cart-container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 5%;
            margin-bottom: 3%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #27ae60;
            color: white;
        }
        .cart-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .price {
            font-size: 16px;
            font-weight: bold;
        }
        .old-price {
            text-decoration: line-through;
            color: gray;
        }
        .quantity-controls {
            align-items: center;
            justify-content: center;
        }
        .quantity-controls button {
            padding: 5px 10px;
            border: none;
            background: #27ae60;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .quantity-input {
            width: 30px;
            text-align: center;
            border: none;
            font-size: 16px;
            margin: 0 5px;
        }
        .remove-item {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .total-checkout-container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .total-price {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            width: 40%;
            text-align: left;
            padding-left: 20px;
        }
        .checkout-btn {
            background: #ff6600;
            color: white;
            padding: 12px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            width: 40%;
            text-align: center;
            transition: background 0.3s ease;
        }
        .checkout-btn:hover {
            background: #e65c00;
        }

        /* ✅ Responsive Styles ✅ */
        @media (max-width: 768px) {
            .cart-container, .total-checkout-container {
                width: 95%;
                padding: 15px;
            }
            table {
                font-size: 14px;
            }
            .cart-item img {
                width: 50px;
                height: 50px;
            }
            .quantity-controls button {
                padding: 3px 8px;
            }
            .total-checkout-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .total-price, .checkout-btn {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

    <?php include 'header.php'; ?>

    <div class="cart-container">
        <h2>🛒 My Shopping Cart</h2>

        <?php if (!empty($products)): ?>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($products as $item): ?>
                    <tr class="cart-item">
                        <td>
                            <img src="<?php echo $item['productImage1'] ?? 'images/default.jpg'; ?>" alt="<?php echo $item['productName']; ?>">
                        </td>
                        <td><strong><?php echo $item['productName']; ?></strong></td>
                        <td class="price">
                            <span class="old-price"><?php echo $item['productPriceBeforeDiscount']; ?> RS.</span>
                            <br>
                            <span><?php echo $item['productPrice']; ?> RS.</span>
                        </td>
                        <td class="quantity-controls" style="display: table-cell;">
                            <form method="POST">
                                <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                <button type="submit" name="update_cart" value="-1">-</button>
                                <input type="text" class="quantity-input" value="<?php echo $item['quantity']; ?>" readonly>
                                <button type="submit" name="update_cart" value="1">+</button>
                            </form>
                        </td>
                        <td><strong><?php echo $item['productPrice'] * $item['quantity']; ?> RS.</strong></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                <button type="submit" name="remove_cart" class="remove-item">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="total-checkout-container">
                <div class="total-price">Total Price: <?php echo $totalPrice; ?> RS.</div>
                <button class="checkout-btn"><a href="checkout.php" class="btn btn-primary" style="text-decoration: none;">Proceed to Checkout</a></button>
            </div>

        <?php else: ?>
            <p>Your cart is empty!</p>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
