<?php
session_start();
include 'database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details
$user_query = $conn->prepare("SELECT name, email, phone FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user = $user_query->get_result()->fetch_assoc();

// Fetch order history
$order_query = $conn->prepare("SELECT orders.id AS order_id, orders.order_date, orders.status, orders.total_price, 
           GROUP_CONCAT(products.productName SEPARATOR ', ') AS product_names
    FROM orders
    JOIN order_items ON orders.id = order_items.order_id
    JOIN products ON order_items.product_id = products.id
    WHERE orders.user_id = ?
    GROUP BY orders.id
    ORDER BY orders.id ASC");
$order_query->bind_param("i", $user_id);
$order_query->execute();
$orders = $order_query->get_result();

// Handle password update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Fetch user password
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $user_password = $stmt->get_result()->fetch_assoc();

    // Verify current password
    if ($user_password['password']) {
        if (password_verify($current_password, $user_password['password'])) {
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update_stmt->bind_param("si", $new_hashed_password, $user_id);
            if ($update_stmt->execute()) {
                echo "<script>alert('Password updated successfully!');</script>";
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        } else {
            echo "<script>alert('Incorrect current password.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<style> 
    body {
        font-family: 'Poppins', sans-serif;
        background: #f8f9fa;
        margin: 0;
    }

    .profile-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        margin: 90px 0px 30px 0px;
    }

    .profile-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 300px;
    }

    .profile-pic {
        width: 80px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .btn {
        background: #087659;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .btn:hover {
        background: #065d4a;
    }

    /* Order History Table */
    .order-history {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background: #087659;
        color: white;
    }

    /* Status Colors */
    .status-pending { color: orange; font-weight: bold; }
    .status-processing { color: blue; font-weight: bold; }
    .status-shipped { color: green; font-weight: bold; }
    .status-delivered { color: darkgreen; font-weight: bold; }
    .status-cancelled { color: red; font-weight: bold; }

    /* Modal */
    .modal {
        display: none; /* Initially hidden */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }


    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
    }

</style>

<div class="profile-container">
    <div class="profile-card">
        <img src="images/users.jpg" class="profile-pic">
        <h2><?= htmlspecialchars($user['name']) ?></h2>
        <p>Email: <strong><?= htmlspecialchars($user['email']) ?></strong></p>
        <p>Phone: <strong><?= htmlspecialchars($user['phone']) ?></strong></p>
        <button onclick="openModal()" class="btn">Change Password</button>
    </div>

    <div class="order-history">
        <h3>Order History</h3>
        <table>
            <tr>
                <th>Order No.</th>
                <th>Product Name(s)</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
            <?php 
            $order_no = 1;
            while ($order = $orders->fetch_assoc()) { 
                $status_class = "status-" . strtolower($order['status']);
            ?>
                <tr>
                    <td><?= $order_no++ ?></td>
                    <td><?= htmlspecialchars($order['product_names']) ?></td>
                    <td><?= $order['order_date'] ?></td>
                    <td class="<?= $status_class ?>"><?= $order['status'] ?></td>
                    <td>₹<?= number_format($order['total_price'], 2) ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<!-- Password Change Modal -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Change Password</h3>
        <form method="POST">
            <input type="password" name="current_password" placeholder="Current Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <button type="submit" name="update_password" class="btn">Update Password</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    function openModal() {
        document.getElementById("passwordModal").style.display = "flex"; // Change from block to flex
    }

    function closeModal() {
        document.getElementById("passwordModal").style.display = "none";
    }

</script>

</body>
</html>

<?php 
$conn->close();
?>
