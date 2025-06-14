<?php include 'header.php'; ?>

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

    /* Reviews Section */
    .reviews-section {
        padding: 60px 20px;
        background-color: var(--light-bg);
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 50px;
        position: relative;
        font-family: 'Poppins', sans-serif;
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
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .review-card {
        background: var(--white);
        border-radius: 12px;
        padding: 30px;
        width: 300px;
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
        font-family: 'Poppins', sans-serif;
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

    /* Rating Breakdown */
    .rating-summary {
        max-width: 800px;
        margin: 40px auto;
        background: var(--white);
        padding: 30px;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
    }

    .rating-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .rating-label {
        width: 80px;
        font-weight: 600;
    }

    .rating-bar {
        flex-grow: 1;
        height: 20px;
        background: #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        margin: 0 15px;
    }

    .rating-fill {
        height: 100%;
        background: var(--primary-light);
    }

    .rating-value {
        width: 40px;
        text-align: right;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .section-title {
            font-size: 2rem;
        }
        
        .review-card {
            width: 100%;
            max-width: 350px;
        }
        
        .reviews-container {
            gap: 20px;
        }
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 1.8rem;
        }
        
        .review-card {
            padding: 20px;
        }
    }

    /* Animation */
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

    .review-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .review-card:nth-child(1) { animation-delay: 0.1s; }
    .review-card:nth-child(2) { animation-delay: 0.2s; }
    .review-card:nth-child(3) { animation-delay: 0.3s; }
    .review-card:nth-child(4) { animation-delay: 0.4s; }
</style>

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
            <img src="images/6CR.jpg" alt="Mary Wilson">
            <h3>Mary Wilson</h3>
            <div class="stars">★★★★☆</div>
            <p>“Smooth ordering process and good customer support. Just a small delay in delivery, but the produce made up for it.”</p>
        </div>
        
        <div class="review-card">
            <img src="images/7CR.jpg" alt="Susan Gomes">
            <h3>Susan Gomes</h3>
            <div class="stars">★★★★★</div>
            <p>"Nature Bites has become my weekly grocery solution. The convenience and quality can't be beaten!"</p>
        </div>
        
        <div class="review-card">
            <img src="images/9CR.jpg" alt="Sarah Johnson">
            <h3>Sarah Johnson</h3>
            <div class="stars">★★★★★</div>
            <p>"The exotic fruits selection is amazing! My kids loved the dragon fruit. Customer service is top-notch too."</p>
        </div>
    </div>

    <div class="reviews-container" style="margin-top: 10px;">
        <div class="review-card">
            <img src="images/8CR.jpg" alt="Rachel Mathew">
            <h3>Rachel Mathew</h3>
            <div class="stars">★★★★★</div>
            <p>“Hands down the best online store for fresh fruits and veggies. I especially love the seasonal fruit boxes – always a surprise and always delicious!”</p>
        </div>
        
        <div class="review-card">
            <img src="images/2CR.jpg" alt="Andrew Gonsalves">
            <h3>Andrew Gonsalves</h3>
            <div class="stars">★★★★☆</div>
            <p>“Love the variety and the prices. The delivery was a bit delayed once, but customer service was quick to respond and resolved it fast. Will definitely order again!”</p>
        </div>
        
        <div class="review-card">
            <img src="images/10CR.jpg" alt="Ayush Sharma">
            <h3>Ayush Sharma</h3>
            <div class="stars">★★★★★</div>
            <p>“Fast delivery, great packaging, and amazing freshness. Everything looked like it was picked the same day. I'm a regular customer now!</p>
        </div>
        
        <div class="review-card">
            <img src="images/1CR.jpg" alt="Helen Philip">
            <h3>Helen Philip</h3>
            <div class="stars">★★★★★</div>
            <p>“Super convenient and affordable. The variety is great and the website is really easy to use. Love the seasonal offers too!”</p>
        </div>
    </div>
    
    Rating Summary Section
    <div class="rating-summary">
        <h3 style="text-align: center; margin-bottom: 20px; color: var(--primary-color);">Customer Rating Breakdown</h3>
        
        <div class="rating-item">
            <div class="rating-label">5 Stars</div>
            <div class="rating-bar">
                <div class="rating-fill" style="width: 85%;"></div>
            </div>
            <div class="rating-value">85%</div>
        </div>
        
        <div class="rating-item">
            <div class="rating-label">4 Stars</div>
            <div class="rating-bar">
                <div class="rating-fill" style="width: 12%;"></div>
            </div>
            <div class="rating-value">12%</div>
        </div>
        
        <div class="rating-item">
            <div class="rating-label">3 Stars</div>
            <div class="rating-bar">
                <div class="rating-fill" style="width: 2%;"></div>
            </div>
            <div class="rating-value">2%</div>
        </div>
        
        <div class="rating-item">
            <div class="rating-label">2 Stars</div>
            <div class="rating-bar">
                <div class="rating-fill" style="width: 1%;"></div>
            </div>
            <div class="rating-value">1%</div>
        </div>
        
        <div class="rating-item">
            <div class="rating-label">1 Star</div>
            <div class="rating-bar">
                <div class="rating-fill" style="width: 0%;"></div>
            </div>
            <div class="rating-value">0%</div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>