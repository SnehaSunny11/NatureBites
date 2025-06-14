<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Policy | Nature Bites</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* General Styles */
        :root {
            --primary-color: #2e8b57;
            --secondary-color: #3cb371;
            --accent-color: #ff6b6b;
            --text-color: #333;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.7;
            color: var(--text-color);
            background-color: var(--light-bg);
            overflow-x: hidden;
        }
        
        /* Main Content Styles */
        main {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
            padding-top: 120px;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .page-header h1::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background: var(--secondary-color);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .page-header p {
            font-size: 1.1rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Section Styles */
        section {
            background: var(--white);
            padding: 30px;
            margin-bottom: 30px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border-left: 4px solid var(--secondary-color);
        }
        
        section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        section h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
        }
        
        section h2 i {
            margin-right: 15px;
            color: var(--secondary-color);
        }
        
        ul {
            padding-left: 20px;
        }
        
        li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 25px;
        }
        
        li::before {
            content: '\f058';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: var(--secondary-color);
            position: absolute;
            left: 0;
        }
        
        /* Contact Section */
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        
        .contact-method {
            flex: 1;
            min-width: 200px;
            background: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }
        
        .contact-method:hover {
            background: var(--secondary-color);
            color: var(--white);
        }
        
        .contact-method:hover i,
        .contact-method:hover a {
            color: var(--white);
        }
        
        .contact-method i {
            font-size: 1.5rem;
            margin-right: 15px;
            color: var(--primary-color);
        }
        
        .contact-method a {
            color: var(--primary-color);
            text-decoration: none;
            transition: var(--transition);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            main {
                padding-top: 100px;
            }
            
            .page-header h1 {
                font-size: 2rem;
            }
            
            section {
                padding: 20px;
            }
            
            section h2 {
                font-size: 1.5rem;
            }
            
            .contact-method {
                min-width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            .page-header h1 {
                font-size: 1.8rem;
            }
            
            section h2 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <main>
        <div class="page-header">
            <h1>Payment Policy</h1>
            <p>At Nature Bites, we prioritize providing a seamless and secure shopping experience for our customers. This payment policy outlines our accepted methods, terms, and important transaction information.</p>
        </div>
    
        <section>
            <h2><i class="fas fa-credit-card"></i> Accepted Payment Methods</h2>
            <ul>
                <li><strong>Credit/Debit Cards:</strong> Visa, MasterCard, American Express, and RuPay</li>
                <li><strong>UPI Payments:</strong> Google Pay, PhonePe, Paytm, and other UPI apps</li>
                <li><strong>Net Banking:</strong> Supported by all major banks in India</li>
                <li><strong>Digital Wallets:</strong> Paytm, PhonePe, Amazon Pay, and other wallets</li>
                <li><strong>Cash on Delivery (COD):</strong> Available for orders under ₹5,000 (select pin codes)</li>
            </ul>
        </section>
    
        <section>
            <h2><i class="fas fa-file-contract"></i> Payment Terms</h2>
            <ul>
                <li>Orders are processed only after successful payment verification</li>
                <li>All payments use secure, encrypted payment gateways</li>
                <li>COD available for select pin codes (max ₹5,000 order value)</li>
                <li>Prices include GST unless stated otherwise</li>
                <li>International cards may incur additional bank charges</li>
            </ul>
        </section>
    
        <section>
            <h2><i class="fas fa-exchange-alt"></i> Refund Policy</h2>
            <ul>
                <li><strong>Eligibility:</strong> Double payments, canceled orders, or defective items</li>
                <li><strong>Timeframe:</strong> Requests must be made within 7 days of transaction</li>
                <li><strong>Processing:</strong> Online refunds in 5-7 business days</li>
                <li><strong>COD Refunds:</strong> Processed via bank transfer in 7-10 business days</li>
                <li><strong>Exceptions:</strong> Perishable items may have different refund policies</li>
            </ul>
        </section>
    
        <section>
            <h2><i class="fas fa-headset"></i> Customer Support</h2>
            <p>For any payment-related queries, our team is happy to assist you:</p>
            
            <div class="contact-info">
                <div class="contact-method">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email Us</strong>
                        <p><a href="mailto:NatureBites11@gmail.com">NatureBites11@gmail.com</a></p>
                    </div>
                </div>
                
                <div class="contact-method">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <strong>Call Us</strong>
                        <p><a href="tel:+918767944421">+91 8767944421</a></p>
                        <p><a href="tel:+918767922297">+91 8767922297</a></p>
                    </div>
                </div>
                
                <div class="contact-method">
                    <i class="fas fa-clock"></i>
                    <div>
                        <strong>Hours</strong>
                        <p>Mon-Sat: 9AM - 7PM</p>
                        <p>Sun: 10AM - 5PM</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>