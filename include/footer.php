<!-- Footer -->
<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="mb-4">
                    <h5 class="text-white mb-3">
                        <i class="fas fa-home text-primary me-2"></i>Property Dealer
                    </h5>
                    <p class="mb-3">
                        Your trusted partner in finding the perfect property. With over 15 years of experience,
                        we help thousands of families find their dream homes every year.
                    </p>
                    <div class="d-flex">
                        <a href="#" class="btn btn-outline-light btn-sm me-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm me-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm me-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm me-2">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="text-white mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="index.php" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-primary"></i>Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="about.php" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-primary"></i>About Us
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="properties.php" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-primary"></i>Properties
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="contact.php" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-primary"></i>Contact
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="admin/index.php" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-primary"></i>Admin Login
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="text-white mb-3">Services</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>Property Sales
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>Property Rentals
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>Property Valuation
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>Legal Support
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>Market Analysis
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>24/7 Support
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="text-white mb-3">Contact Info</h6>
                <div class="mb-2">
                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                    <span>123 Property Street, Real Estate City, REC 12345</span>
                </div>
                <div class="mb-2">
                    <i class="fas fa-phone text-primary me-2"></i>
                    <a href="tel:+1234567890" class="text-light text-decoration-none">+1 (234) 567-8900</a>
                </div>
                <div class="mb-2">
                    <i class="fas fa-envelope text-primary me-2"></i>
                    <a href="mailto:info@propertydealer.com" class="text-light text-decoration-none">info@propertydealer.com</a>
                </div>
                <div class="mb-3">
                    <i class="fas fa-clock text-primary me-2"></i>
                    <span>Mon - Sat: 9:00 AM - 8:00 PM</span>
                </div>

                <div class="mt-4">
                    <h6 class="text-white mb-2">Newsletter</h6>
                    <p class="small mb-2">Stay updated with latest properties and market trends.</p>
                    <div class="input-group">
                        <input type="email" class="form-control form-control-sm" placeholder="Your email" aria-label="Email">
                        <button class="btn btn-primary btn-sm" type="button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">
                    &copy; <?php echo date('Y'); ?> Property Dealer. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-light text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-light text-decoration-none me-3">Terms of Service</a>
                <a href="#" class="text-light text-decoration-none">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Back to Top Button -->
<button type="button" class="btn btn-primary position-fixed bottom-0 end-0 m-3 d-none" id="backToTop" style="z-index: 1030;">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    // Back to top button functionality
    document.addEventListener('DOMContentLoaded', function() {
        const backToTopBtn = document.getElementById('backToTop');

        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('d-none');
            } else {
                backToTopBtn.classList.add('d-none');
            }
        });

        // Scroll to top when clicked
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>


<!-- Bootstrap 5.3.0 JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery 3.6.0 (if needed for compatibility) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Animate.css animations -->
<script>
    // Initialize animations when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Add animation classes to elements as they come into view
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated');
                }
            });
        }, observerOptions);

        // Observe all elements with animate__ classes
        document.querySelectorAll('[class*="animate__"]').forEach(el => {
            observer.observe(el);
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add hover effects for property cards
        document.querySelectorAll('.property-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });

    // Newsletter subscription handler
    function handleNewsletterSubscription(event) {
        event.preventDefault();
        const email = event.target.querySelector('input[type="email"]').value;

        if (email) {
            // Here you would typically send the email to your backend
            alert('Thank you for subscribing! We will keep you updated with the latest properties.');
            event.target.querySelector('input[type="email"]').value = '';
        } else {
            alert('Please enter a valid email address.');
        }
    }

    // Attach newsletter handler
    document.addEventListener('DOMContentLoaded', function() {
        const newsletterForm = document.querySelector('.input-group');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', handleNewsletterSubscription);
        }
    });
</script>

</body>
</html>