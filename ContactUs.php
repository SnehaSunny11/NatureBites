<?php include 'Header.php'; ?>

    <style>
      /* General Reset */
      body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            flex-direction: column;
            align-items: center;
            color: white;
            position: relative;
        }

        /* Faded Background */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('images/Sliders.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            opacity: 0.5;
            z-index: -1;
        }


        .logo {
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

                /* Contact Box */
        .contact-container {
            max-width: 600px;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            margin-top: 120px;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black */
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 60px;
            margin-left: auto;
            margin-right: auto;
        }


        h2 {
            color: #ffcc00;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 15px;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }


        .social-links {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .social-links div {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .social-links i {
            font-size: 1.2rem;
            color: white;
        }

        @media (max-width: 768px) {
            .footer-headings {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }

        
    </style>
    

    <!-- Contact Section -->
    <div class="contact-container">
        <img src="images/Logo.png" alt="Nature Bites Logo" style="width: 100px; height: auto; margin-bottom: 20px;">
        <h2>Contact Nature Bites</h2>
        <p><strong>Email:</strong> <a href="mailto:NatureBites11@gmail.com">NatureBites11@gmail.com</a></p>
        <p><strong>Phone:</strong> <a href="tel:+91 8767944421">+91 8767944421</a> / <a href="tel:+91 8767922297">+91 8767922297</a></p>
      <p><strong>Support Hours</strong>
                            <p>Mon-Sat: 9AM - 7PM</p>
                            <p>Sun: 10AM - 5PM</p></p>              
        <p>24 x 7 Customer Services</p>
        <p><strong>Headquarters:</strong></p>
        <p>Nature Bites<br>10, Vatika City Market, Sector 60,<br>Vasai Road,<br>Vasai: 401202, INDIA</p>
    </div>       

    <?php include 'footer.php';  ?>