<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature Bites - Fresh Fruits & Vegetables</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        /* Color Variables */
        :root {
            --primary-color: #2e8b57;
            --primary-light: #3cb371;
            --accent-color: #ff6b6b;
            --text-color: #333;
            --text-light: #666;
            --light-bg: #f8f9fa;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            line-height: 1.7;
            color: var(--text-color);
            background-color: var(--light-bg);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--primary-color);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* Swiper Slider */
        .swiper {
            width: 100%;
            height: 80vh;
            min-height: 500px;
        }

        .swiper-slide {
            position: relative;
            overflow: hidden;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.8);
        }

        .banner-text {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            color: var(--white);
            max-width: 600px;
            z-index: 2;
        }

        .banner-text h1 {
            font-size: 4rem;
            color: var(--white);
            margin-bottom: 15px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        }

        .banner-text h2 {
            font-size: 1.8rem;
            color: var(--white);
            margin-bottom: 30px;
            font-weight: 400;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }

        .btn {
            display: inline-block;
            background-color: var(--primary-light);
            color: var(--white);
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: var(--transition);
            border: 2px solid var(--primary-light);
        }

        .btn:hover {
            background-color: transparent;
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* About Section */
        .card {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .card_content {
            display: flex;
            flex-wrap: wrap;
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .card_content:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .about_image {
            flex: 1;
            min-width: 300px;
            overflow: hidden;
        }

        .about_image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .card_content:hover .about_image img {
            transform: scale(1.03);
        }

        .about_text {
            flex: 1;
            min-width: 300px;
            padding: 40px;
        }

        .about_text h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .about_text h2::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background: var(--primary-light);
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }

        .about_text p {
            margin-bottom: 25px;
            color: var(--text-color);
        }

        .about_services {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .s_1 {
            text-align: center;
            padding: 20px 15px;
            background: var(--light-bg);
            border-radius: 10px;
            transition: var(--transition);
            cursor: default;
        }

        .s_1:hover {
            background: var(--primary-light);
            transform: translateY(-5px);
            box-shadow: var(--shadow-sm);
        }

        .s_1:hover i, 
        .s_1:hover h6 {
            color: var(--white);
        }

        .s_1 i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
            transition: var(--transition);
        }

        .s_1 h6 {
            font-size: 0.9rem;
            color: var(--text-color);
            transition: var(--transition);
        }

        /* Featured Products */
        .featured-products {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 20px;
            text-align: center;
        }

        .featured-products h2 {
            font-size: 2.5rem;
            margin-bottom: 50px;
            position: relative;
        }

        .featured-products h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--primary-light);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            text-align: center;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-md);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid var(--primary-light);
        }

        .product-card h3 {
            font-size: 1.3rem;
            margin: 15px 0 5px;
        }

        .product-card h4 {
            font-size: 0.9rem;
            color: var(--primary-light);
            margin-bottom: 15px;
            font-weight: 500;
        }

        .buy-now-btn {
            display: inline-block;
            background: var(--primary-light);
            color: var(--white);
            padding: 8px 20px;
            border-radius: 50px;
            margin: 15px 0;
            font-weight: 600;
            transition: var(--transition);
        }

        .product-card:hover .buy-now-btn {
            background: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Reviews Section */
        .reviews-section {
            padding: 80px 20px;
            background-color: var(--light-bg);
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--primary-light);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .reviews-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .review-card {
            background: var(--white);
            border-radius: 12px;
            padding: 30px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .review-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-md);
        }

        .review-card::before {
            content: '\201C';
            font-family: Georgia, serif;
            font-size: 5rem;
            color: rgba(46, 139, 87, 0.1);
            position: absolute;
            top: 10px;
            left: 10px;
            line-height: 1;
        }

        .review-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-light);
            margin-bottom: 15px;
        }

        .review-card h3 {
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .stars {
            color: #FFD700;
            font-size: 1.3rem;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        .review-card p {
            font-style: italic;
            color: var(--text-light);
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .banner-text h1 {
                font-size: 3rem;
            }
            
            .banner-text h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .swiper {
                height: 60vh;
            }
            
            .banner-text {
                left: 5%;
                right: 5%;
                text-align: center;
            }
            
            .banner-text h1 {
                font-size: 2.5rem;
            }
            
            .about_text {
                padding: 30px;
            }
            
            .section-title, 
            .featured-products h2 {
                font-size: 2rem;
            }
            
            .reviews-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }
        }

        @media (max-width: 480px) {
            .swiper {
                height: 50vh;
            }
            
            .banner-text h1 {
                font-size: 2rem;
            }
            
            .banner-text h2 {
                font-size: 1.2rem;
            }
            
            .about_text {
                padding: 25px 20px;
            }
            
            .section-title, 
            .featured-products h2 {
                font-size: 1.8rem;
            }
            
            .about_services {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card_content,
        .featured-products,
        .reviews-section {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Hero Slider -->
    <section class="swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <img src="images/fnv.jpg" alt="Fresh Fruits and Vegetables">
                <div class="banner-text">
                    <h1>Nature Bites</h1>
                    <h2>Farm Fresh Produce Delivered to Your Doorstep</h2>
                    <a href="ProductPage.php" class="btn">Shop Now</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <img src="images/sliders.jpg" alt="Fresh Vegetables">
                <div class="banner-text">
                    <h1>Premium Quality</h1>
                    <h2>Handpicked Fruits & Vegetables for Your Family</h2>
                    <a href="ProductPage.php" class="btn">Explore Products</a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    <!-- About Section -->
    <div class="card">
        <div class="card_content">
            <div class="about_image">
                <img src="images/Aboutinhome1.jpg" alt="Fresh Produce from Nature Bites">
            </div>
            <div class="about_text">
                <h2>Why Choose Nature Bites?</h2>
                <p>We're passionate about connecting you with nature's finest offerings. Our farm-fresh fruits and vegetables are carefully selected for exceptional quality, freshness, and flavor. We go beyond just delivering produce - we're dedicated to promoting healthier lifestyles and sustainable food systems.</p>
                <p>Partnering with local farmers who share our values of eco-friendly practices, we bring you superior quality while supporting small-scale agriculture and environmental responsibility through minimal, eco-conscious packaging.</p>
                
                <div class="about_services">
                    <div class="s_1">
                        <i class="fa-solid fa-truck-fast"></i>
                        <h6>Same Day Delivery</h6>
                    </div>
                    <div class="s_1">
                        <i class="fa fa-credit-card"></i>
                        <h6>Secure Payments</h6>
                    </div>
                    <div class="s_1">
                        <i class="fa-solid fa-headset"></i>
                        <h6>24/7 Support</h6>
                    </div>
                    <div class="s_1">
                        <i class="fas fa-handshake"></i>
                        <h6>Farmer Partnerships</h6>
                    </div>
                    <!-- <div class="s_1">
                        <i class="fas fa-seedling"></i>
                        <h6>Sustainable Farming</h6>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Featured Products -->
    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-container">
            <div class="product-card">
                <img src="images/Mango.jpg" alt="Fresh Mango">
                <h3>Fresh Mango</h3>
                <p>Seasonal, Sweet & Juicy</p>
                <a href="ProductPage.php" class="buy-now-btn">Shop Now</a>
            </div>
            <div class="product-card">
                <img src="images/Carrot.jpg" alt="Fresh Carrot">
                <h3>Fresh Carrot</h3>
                <p>Organic, Crunchy & Nutritious</p>
                <a href="ProductPage.php" class="buy-now-btn">Shop Now</a>
            </div>
            <div class="product-card">
                <img src="images/Rambutan.jpg" alt="Fresh Rambutan">
                <h3>Exotic Rambutan</h3>
                <p>Tropical Sweet Delight</p>
                <a href="ExoticFruits.php" class="buy-now-btn">Explore Exotics</a>
            </div>
            <div class="product-card">
                <img src="images/Kohlrabi.jpg" alt="Fresh Kohlrabi">
                <h3>Fresh Kohlrabi</h3>
                <p>Unique & Versatile</p>
                <a href="ExoticVegetables.php" class="buy-now-btn">Discover More</a>
            </div>
        </div>
    </section>

    <!-- Customer Reviews -->
    <div class="reviews-section">
        <h2 class="section-title">What Our Customers Say</h2>
        
        <div class="reviews-container">
            <div class="review-card">
                <img src="images/4CR.jpg" alt="John Doe">
                <h3>John Doe</h3>
                <div class="stars">★★★★★</div>
                <p>"The fruits were incredibly fresh and delicious! Delivery was faster than expected. Will definitely order again."</p>
            </div>
            
            <div class="review-card">
                <img src="images/6CR.jpg" alt="Jane Smith">
                <h3>Jane Smith</h3>
                <div class="stars">★★★★☆</div>
                <p>"Excellent quality produce. The avocados were perfectly ripe. Only wish there were more organic options."</p>
            </div>
            
            <div class="review-card">
                <img src="images/7CR.jpg" alt="Mark Wilson">
                <h3>Mark Wilson</h3>
                <div class="stars">★★★★★</div>
                <p>"Nature Bites has become my weekly grocery solution. The convenience and quality can't be beaten!"</p>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    <!-- Initialize Swiper -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper('.swiper', {
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                speed: 1000,
            });
        });
    </script>
</body>
</html>