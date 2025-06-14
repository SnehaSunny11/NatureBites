<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3 class="footer-heading">Quick Links</h3>
            <div class="footer-links">
                <a href="index.php" class="footer-link">Home</a>
                <a href="AboutUs1.php" class="footer-link">About Us</a>
                <a href="ContactUs.php" class="footer-link">Contact Us</a>
                <a href="Reviews.php" class="footer-link">Review</a>
            </div>
        </div>
        
        <div class="footer-section">
            <h3 class="footer-heading">Contact</h3>
            <div class="contact-info">
                <p class="contact-item"><i class="fas fa-phone-alt contact-icon"></i> +91 8767944421</p>
                <p class="contact-item"><i class="fas fa-phone-alt contact-icon"></i> +91 8767922297</p>
                <p class="contact-item"><i class="fas fa-envelope contact-icon"></i> NatureBites11@gmail.com</p>
            </div>
        </div>
        
        <div class="footer-section">
            <h3 class="footer-heading">Stay Connected</h3>
            <div class="social-links">
                <a href="#" class="social-link" aria-label="Facebook">
                    <i class="fab fa-facebook-f social-icon"></i>
                    <span class="social-text">Facebook</span>
                </a>
                <a href="#" class="social-link" aria-label="Twitter">
                    <i class="fab fa-twitter social-icon"></i>
                    <span class="social-text">Twitter</span>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <i class="fab fa-instagram social-icon"></i>
                    <span class="social-text">Instagram</span>
                </a>
                <a href="#" class="social-link" aria-label="Google">
                    <i class="fab fa-google social-icon"></i>
                    <span class="social-text">Google</span>
                </a>
            </div>
        </div>
        
        <div class="footer-section">
            <h3 class="footer-heading">Our Policy</h3>
            <div class="footer-links">
                <a href="PrivacyPolicy.php" class="footer-link">Privacy Policy</a>
                <a href="PaymentPolicy.php" class="footer-link">Payment Policy</a>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="copyright-container">
            <p class="copyright">&copy; 2025 Nature Bite's. All rights reserved.</p>
        </div>
    </div>
</footer>

<style>
/* Base Footer Styles */
.main-footer {
    background-color: #047604;
    color: white;
    padding: 40px 0 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    min-height: 300px; /* Adjust as needed */
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px 40px;
    flex: 1;
}

.footer-bottom {
    background-color: rgba(0, 0, 0, 0.2);
    width: 100%;
    padding: 15px 0;
    margin-top: auto; /* Pushes it to the bottom */
}

.copyright-container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
    padding: 0 20px;
}

.copyright {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

/* Rest of your existing footer styles remain the same */
.footer-section {
    flex: 1;
    min-width: 200px;
    margin-bottom: 30px;
    padding: 0 15px;
}

.footer-heading {
    color: #ffcc00;
    font-size: 18px;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background-color: #ffcc00;
}

.footer-links {
    display: flex;
    flex-direction: column;
}

.footer-link {
    color: white;
    text-decoration: none;
    margin-bottom: 12px;
    transition: all 0.3s ease;
    position: relative;
    padding-left: 15px;
}

.footer-link::before {
    content: '→';
    position: absolute;
    left: 0;
    opacity: 0;
    transition: all 0.3s ease;
}

.footer-link:hover {
    color: #ffcc00;
    transform: translateX(5px);
}

.footer-link:hover::before {
    opacity: 1;
    left: -5px;
}

/* Contact Section */
.contact-info {
    display: flex;
    flex-direction: column;
}

.contact-item {
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}

.contact-icon {
    margin-right: 10px;
    color: #ffcc00;
    width: 20px;
    text-align: center;
}

/* Social Links */
.social-links {
    display: flex;
    flex-direction: column;
}

.social-link {
    color: white;
    text-decoration: none;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
}

.social-icon {
    width: 30px;
    height: 30px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    transition: all 0.3s ease;
}

.social-link:hover {
    color: #ffcc00;
}

.social-link:hover .social-icon {
    background-color: #ffcc00;
    color: #047604;
    transform: scale(1.1);
}

/* Responsive Styles */
@media (max-width: 900px) {
    .footer-section {
        flex: 0 0 50%;
        margin-bottom: 30px;
    }
}

@media (max-width: 600px) {
    .footer-container {
        flex-direction: column;
    }
    
    .footer-section {
        flex: 1;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .footer-heading::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .footer-links, .contact-info, .social-links {
        align-items: center;
    }
    
    .footer-link {
        padding-left: 0;
    }
    
    .footer-link::before {
        display: none;
    }
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.footer-section {
    animation: fadeIn 0.5s ease forwards;
}

.footer-section:nth-child(1) { animation-delay: 0.1s; }
.footer-section:nth-child(2) { animation-delay: 0.2s; }
.footer-section:nth-child(3) { animation-delay: 0.3s; }
.footer-section:nth-child(4) { animation-delay: 0.4s; }
</style>

<script>
// Your existing JavaScript remains the same
document.addEventListener('DOMContentLoaded', function() {
    // Add click event to scroll to top for footer links
    const footerLinks = document.querySelectorAll('.footer-link');
    
    footerLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if(this.getAttribute('href') === '#') {
                e.preventDefault();
            }
            // Smooth scroll for internal links
            if(this.hash) {
                e.preventDefault();
                const hash = this.hash;
                document.querySelector(hash).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Social media link hover effects
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.querySelector('.social-icon').style.transform = 'rotate(360deg)';
        });
        link.addEventListener('mouseleave', function() {
            this.querySelector('.social-icon').style.transform = 'rotate(0deg)';
        });
    });
    
    // Back to top functionality
    const backToTop = document.createElement('a');
    backToTop.href = '#';
    backToTop.className = 'back-to-top';
    backToTop.innerHTML = '<i class="fas fa-arrow-up"></i> Back to Top';
    backToTop.style.display = 'none';
    backToTop.style.position = 'fixed';
    backToTop.style.bottom = '20px';
    backToTop.style.right = '20px';
    backToTop.style.backgroundColor = '#ffcc00';
    backToTop.style.color = '#047604';
    backToTop.style.padding = '10px 15px';
    backToTop.style.borderRadius = '5px';
    backToTop.style.textDecoration = 'none';
    backToTop.style.zIndex = '1000';
    backToTop.style.transition = 'all 0.3s ease';
    
    document.body.appendChild(backToTop);
    
    window.addEventListener('scroll', function() {
        if(window.pageYOffset > 300) {
            backToTop.style.display = 'block';
        } else {
            backToTop.style.display = 'none';
        }
    });
    
    backToTop.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
</script>