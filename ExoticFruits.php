<?php
session_start();
?>

<?php
include 'database.php'; // Include the database connection

$sql = "SELECT * FROM products WHERE category = 'Fruits';";
$result = $conn->query($sql);

$products = []; // Initialize an empty array

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row; // Store each row in the array
    }
}
?>

<?php include 'header.php';  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Store</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .card { border: 1px solid #ddd; padding: 40px; margin: 10px; width: 330px; display: inline-block; text-align: center; }
        .card img { width: 100%; height: 200px; object-fit: cover; }
        .price del { color: red; }
        .size-quantity { margin-top: 10px; }
        .add-to-cart { background: green; color: white; padding: 10px; border: none; cursor: pointer; }
    </style>
</head>

<?php $conn->close(); ?>

    <div class="container">
        <?php foreach ($products as $product): ?>
            <div class="card" style=" padding: 40px;"> 
                <img src="<?php echo $product['productImage1']; ?>" alt="<?php echo $product['productName']; ?>">
                <div class="card-content">
                    <h2><?php echo $product['productName']; ?></h2>
                    <p><?php echo $product['productDescription']; ?></p>
                </div>
                <div class="price"> <?php echo $product['productPrice']; ?> RS. <del><?php echo $product['productPriceBeforeDiscount']; ?> RS.</del></div>
                    <div class="quantity-controls" style="justify-content: center;">
                        <strong>QUANTITY:</strong>
                        <button>1 KG</button>
                    </div>
                <button class="add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo $product['productName']; ?>', <?php echo $product['productPrice']; ?>)">Add to Cart</button>
                <!-- <button class="add-to-cart">Add to Cart</button>    -->
            </div>
        <?php endforeach; ?>
    </div>
    
    <?php include 'footer.php';  ?>


    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const decrementButtons = document.querySelectorAll(".quantity-decrement");
            const incrementButtons = document.querySelectorAll(".quantity-increment");

            decrementButtons.forEach((button) => {
                button.addEventListener("click", function () {
                    let inputField = this.nextElementSibling; // Input field ko target karein
                    let value = parseInt(inputField.value);
                    if (value > 1) {
                        inputField.value = value - 1;
                    }
                });
            });

            incrementButtons.forEach((button) => {
                button.addEventListener("click", function () {
                    let inputField = this.previousElementSibling; // Input field ko target karein
                    let value = parseInt(inputField.value);
                    inputField.value = value + 1;
                });
            });
        });


        function addToCart(productId, productName, productPrice) {
                let formData = new FormData();
                formData.append("product_id", productId);
                formData.append("product_name", productName);
                formData.append("product_price", productPrice);

                fetch("add_to_cart.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        alert("Product added to cart!");
                        updateCartBadge(); // **Cart Count Refresh**
                    } else {
                        alert("Error adding product to cart.");
                    }
                })
                .catch(error => console.error("Error:", error));
            }


        function updateCartBadge() {
            fetch("update_cart_count.php")
            .then(response => response.text())
            .then(count => {
                let badge = document.getElementById("cart-badge");
                if (badge) {
                    if (parseInt(count) > 0) {
                        badge.textContent = count;
                        badge.style.display = "flex";
                    } else {
                        badge.style.display = "none";
                    }
                }
            })
            .catch(error => console.log("Error updating cart badge:", error));
        }

        // **Page Load par Cart Count Update Karein**
        document.addEventListener("DOMContentLoaded", function() {
            updateCartBadge();
        });


    </script>
</body>
</html>