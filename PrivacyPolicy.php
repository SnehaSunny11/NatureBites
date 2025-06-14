<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy | Nature Bites</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

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

        h1, h2, h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: var(--primary-color);
        }

        a {
            color: var(--primary-light);
            text-decoration: none;
            transition: var(--transition);
        }

        a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        /* Main Content Styles */
        main {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
            padding-top: 120px;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .page-header h1::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: var(--primary-light);
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .page-header p {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 700px;
            margin: 20px auto 0;
        }

        /* Content Containers */
        .content-container {
            background: var(--white);
            padding: 30px;
            margin-bottom: 25px;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            border-left: 4px solid var(--primary-light);
            position: relative;
            overflow: hidden;
        }

        .content-container:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .content-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-light);
            transition: var(--transition);
        }

        .content-container:hover::before {
            width: 6px;
            background: var(--primary-color);
        }

        /* Section Styles */
        section {
            position: relative;
            z-index: 1;
        }

        section h2 {
            font-size: 1.6rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            color: var(--primary-color);
        }

        section h2 i {
            margin-right: 15px;
            color: var(--primary-light);
            font-size: 1.4rem;
        }

        section p {
            margin-bottom: 15px;
            color: var(--text-color);
        }

        /* List Styles */
        ul {
            list-style-type: none;
            padding-left: 5px;
        }

        li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 30px;
            color: var(--text-color);
        }

        li::before {
            content: '\f058';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: var(--primary-light);
            position: absolute;
            left: 0;
            top: 2px;
        }

        li strong {
            color: var(--primary-color);
        }

        /* Contact Section */
        #contact {
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
            background: var(--primary-light);
            color: var(--white);
        }

        .contact-method:hover i,
        .contact-method:hover a,
        .contact-method:hover p {
            color: var(--white);
        }

        .contact-method i {
            font-size: 1.5rem;
            margin-right: 15px;
            color: var(--primary-color);
        }

        .contact-method a {
            color: var(--primary-color);
        }

        .contact-method div p {
            margin: 0;
            color: var(--text-color);
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
            
            .content-container {
                padding: 20px;
            }
            
            section h2 {
                font-size: 1.4rem;
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
            
            li {
                padding-left: 25px;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content-container {
            animation: fadeIn 0.6s ease forwards;
        }

        .content-container:nth-child(1) { animation-delay: 0.1s; }
        .content-container:nth-child(2) { animation-delay: 0.2s; }
        .content-container:nth-child(3) { animation-delay: 0.3s; }
        .content-container:nth-child(4) { animation-delay: 0.4s; }
        .content-container:nth-child(5) { animation-delay: 0.5s; }
        .content-container:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <div class="page-header">
            <h1>Privacy Policy</h1>
            <p>Your privacy is important to us. This policy explains how we collect, use, and protect your personal information.</p>
        </div>

        <div class="content-container">
            <section id="commitment">
                <h2><i class="fas fa-shield-alt"></i> Our Commitment to Privacy</h2>
                <p>At Nature Bites, we are dedicated to protecting your personal information and ensuring its security through industry-standard practices and technologies.</p>
                <p>This policy outlines our approach to data collection, usage, and protection to maintain your trust in our services.</p>
            </section>
        </div>

        <div class="content-container">
            <section id="why-collect">
                <h2><i class="fas fa-question-circle"></i> Why We Collect Information</h2>
                <ul>
                    <li>To process and fulfill your orders efficiently</li>
                    <li>To personalize and improve your shopping experience</li>
                    <li>To communicate important order updates and offers</li>
                    <li>To enhance our product offerings and services</li>
                    <li>To comply with legal and regulatory requirements</li>
                </ul>
            </section>
        </div>

        <div class="content-container">
            <section id="information">
                <h2><i class="fas fa-database"></i> Information We Collect</h2>
                <p>We collect only necessary information to provide our services:</p>
                <ul>
                    <li><strong>Personal Details:</strong> Name, contact information</li>
                    <li><strong>Delivery Information:</strong> Address, location data</li>
                    <li><strong>Payment Information:</strong> Processed securely through payment gateways</li>
                    <li><strong>Usage Data:</strong> How you interact with our website</li>
                    <li><strong>Communication:</strong> Emails, customer service interactions</li>
                </ul>
            </section>
        </div>

        <div class="content-container">
            <section id="rights">
                <h2><i class="fas fa-user-check"></i> Your Data Rights</h2>
                <ul>
                    <li><strong>Access:</strong> Request a copy of your personal data</li>
                    <li><strong>Correction:</strong> Update inaccurate information</li>
                    <li><strong>Deletion:</strong> Request removal of your data (subject to legal requirements)</li>
                    <li><strong>Restriction:</strong> Limit how we use your data</li>
                    <li><strong>Portability:</strong> Receive your data in a structured format</li>
                </ul>
                <p style="margin-top: 15px;">To exercise these rights, visit your account settings or contact our support team.</p>
            </section>
        </div>

        <div class="content-container">
            <section id="security">
                <h2><i class="fas fa-lock"></i> Data Security</h2>
                <p>We implement robust security measures to protect your information:</p>
                <ul>
                    <li>SSL encryption for all data transmissions</li>
                    <li>Regular security audits and vulnerability testing</li>
                    <li>Limited access to personal data within our organization</li>
                    <li>Secure payment processing with PCI-compliant partners</li>
                </ul>
            </section>
        </div>

        <div class="content-container">
            <section id="contact">
                <h2><i class="fas fa-envelope"></i> Contact Us</h2>
                <p>For privacy-related inquiries or to exercise your rights:</p>
                
                <div id="contact">
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
                            <strong>Support Hours</strong>
                            <p>Mon-Sat: 9AM - 7PM</p>
                            <p>Sun: 10AM - 5PM</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>