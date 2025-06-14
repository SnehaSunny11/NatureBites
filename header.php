<?php

include 'database.php';

// var_dump($_SESSION['user_id']);
// echo"sdfsdfdsf";die;
// Assuming user is logged in and has a user_id
$user_id = $_SESSION['user_id'] ?? 1; // Replace with session user ID if applicable

// Fetch the total quantity of items in the cart
$cartQuery = "SELECT SUM(quantity) AS cart_count FROM cart WHERE user_id = $user_id";
$res = $conn->query($cartQuery);
$count_row = $res->fetch_assoc();
$cart_count = $count_row['cart_count'] ?? 0; // Default to 0 if no items
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature Bites</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />

    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background-color: green; /* Rich green color */
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        header.scrolled {
            padding: 10px 5%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .logo img {
            height: 50px;
            width: auto;
            transition: all 0.3s ease;
        }
        
        header.scrolled .logo img {
            height: 40px;
        }
        
        /* Navigation Styles */
        nav {
            display: flex;
            gap: 25px;
        }
        
        nav a {
            text-decoration: none;
            color: white;
            font-weight: 600;
            padding: 8px 12px;
            transition: all 0.3s ease;
            border-radius: 5px;
            position: relative;
        }
        
        nav a:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: white;
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        
        nav a:hover::after {
            width: 100%;
        }
        
        /* Dropdown Styles */
        .dropdown {
            position: relative;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #3cb371; /* Lighter green */
            min-width: 200px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            padding: 10px 0;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .dropdown-content a {
            display: block;
            padding: 10px 20px;
            color: white;
            transition: all 0.2s ease;
        }
        
        .dropdown-content a:hover {
            background-color: #2e8b57;
            padding-left: 25px;
        }
        
        /* Actions Styles */
        .actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .actions i {
            font-size: 22px;
            color: white;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .actions i:hover {
            transform: scale(1.1);
            color: #f0fff0;
        }
        
        .login-btn {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            padding: 8px 20px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .login-btn:hover {
            background-color: white;
            color: #2e8b57;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        /* Cart Badge */
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ff6b6b;
            color: white;
            font-size: 12px;
            font-weight: bold;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .cart-icon-container {
            position: relative;
        }
        
        .cart-icon-container:hover .cart-badge {
            transform: scale(1.1);
        }
        
        /* Mobile Menu Styles */
        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 24px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .menu-toggle:hover {
            transform: scale(1.1);
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            header {
                padding: 15px 3%;
            }
        }
        
        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
                flex-wrap: wrap;
            }
            
            .menu-toggle {
                display: block;
                order: 1;
            }
            
            .logo {
                order: 0;
            }
            
            .actions {
                order: 2;
                margin-left: auto;
            }
            
            nav {
                display: none !important; 
                flex-direction: column;
                margin-top: 15px;
                order: 3;
                background-color: #3cb371;
                border-radius: 10px;
                padding: 15px;
            }

            nav.active {
                display: flex !important; 
            }
            
            .dropdown > a::after {
                display: none;
            }
            
            .dropdown > a {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .dropdown > a::after {
                content: '+';
                font-size: 18px;
            }
            
            .dropdown.active > a::after {
                content: '-';
            }
            
            .dropdown-content {
                display: none !important;
                position: static;
                width: 100%;
                box-shadow: none;
                padding-left: 15px;
                background-color: rgba(0,0,0,0.1);
                animation: none;
            }
            
            .dropdown.active .dropdown-content {
                display: block !important;
            }
        }
        
        @media (max-width: 480px) {
            .actions {
                gap: 15px;
            }
            
            .login-btn {
                padding: 6px 15px;
                font-size: 14px;
            }
            
            .logo img {
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/Logo.png" alt="Nature Bites Logo">
        </div>
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <div class="dropdown">
                <a href="AboutUs1.php">About Us</a>
                <div class="dropdown-content">
                    <a href="PaymentPolicy.php">Payment Policy</a>
                    <a href="PrivacyPolicy.php">Privacy Policy</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="ProductPage.php">Products</a>
                <div class="dropdown-content">
                    <a href="ExoticFruits.php">Exotic Fruits</a>
                    <a href="ExoticVegetables.php">Exotic Vegetables</a>
                </div>
            </div>
            <a href="Reviews.php">Reviews</a>
            <a href="ContactUs.php">Contact Us</a>
        </nav>
        <div class="actions">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <a href="profile.php"><i class="fas fa-user" title="Profile"></i></a>
                <a href="mycart.php" class="cart-icon-container">
                    <i class="fas fa-shopping-cart" title="Cart"></i>
                    <span id="cart-badge" class="cart-badge" <?php if ($cart_count == 0) echo 'style="display: none;"'; ?>>
                        <?php echo $cart_count; ?>
                    </span>
                </a>
                <a href="logout.php" class="login-btn">Logout</a>
            <?php else: ?>
                <a href="mycart.php" class="cart-icon-container">
                    <i class="fas fa-shopping-cart" title="Cart"></i>
                    <span id="cart-badge" class="cart-badge" style="display: none;">0</span>
                </a>
                <a href="Login.php" class="login-btn">Login</a>
            <?php endif; ?>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const nav = document.querySelector('nav');
            const header = document.querySelector('header');
            
            // Header scroll effect
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
            
            // Initialize - hide nav on mobile by default
            if (window.innerWidth <= 768) {
                nav.classList.remove('active');
            }
            
            // Mobile menu toggle
            menuToggle.addEventListener('click', function() {
                nav.classList.toggle('active');
                this.querySelector('i').classList.toggle('fa-bars');
                this.querySelector('i').classList.toggle('fa-times');
            });
            
            // Dropdown functionality for mobile
            const handleDropdowns = function() {
                if (window.innerWidth <= 768) {
                    const dropdowns = document.querySelectorAll('.dropdown');
                    
                    dropdowns.forEach(function(dropdown) {
                        const link = dropdown.querySelector('a:first-child');
                        
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            dropdown.classList.toggle('active');
                            
                            // Close other open dropdowns
                            dropdowns.forEach(function(otherDropdown) {
                                if (otherDropdown !== dropdown && otherDropdown.classList.contains('active')) {
                                    otherDropdown.classList.remove('active');
                                }
                            });
                        });
                    });
                } else {
                    // Desktop hover functionality
                    const dropdowns = document.querySelectorAll('.dropdown');
                    
                    dropdowns.forEach(function(dropdown) {
                        dropdown.addEventListener('mouseenter', function() {
                            this.querySelector('.dropdown-content').style.display = 'block';
                        });
                        
                        dropdown.addEventListener('mouseleave', function() {
                            this.querySelector('.dropdown-content').style.display = 'none';
                        });
                    });
                }
            };
            
            // Initial setup
            handleDropdowns();
            
            // Update on window resize
            window.addEventListener('resize', function() {
                const dropdownContents = document.querySelectorAll('.dropdown-content');
                
                if (window.innerWidth <= 768) {
                    // Mobile behavior
                    nav.classList.remove('active');
                    dropdownContents.forEach(function(content) {
                        content.style.display = 'none';
                    });
                } else {
                    // Desktop behavior
                    nav.classList.remove('active');
                    dropdownContents.forEach(function(content) {
                        content.style.display = 'none';
                    });
                    // Reset menu toggle icon
                    menuToggle.querySelector('i').classList.remove('fa-times');
                    menuToggle.querySelector('i').classList.add('fa-bars');
                }
                
                handleDropdowns();
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && nav.classList.contains('active')) {
                    if (!e.target.closest('nav') && !e.target.closest('.menu-toggle')) {
                        nav.classList.remove('active');
                        menuToggle.querySelector('i').classList.remove('fa-times');
                        menuToggle.querySelector('i').classList.add('fa-bars');
                    }
                }
            });
            
            // Prevent dropdown from closing when clicking inside
            document.querySelectorAll('.dropdown-content').forEach(function(content) {
                content.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
        });
    </script>
</body>
</html>