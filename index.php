
<?php include('include/header.php');?>

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 hero-content">
                <h1 class="hero-title animate__animated animate__fadeInUp">
                    Find Your Dream Home with <span class="text-warning">Property Dealer</span>
                </h1>
                <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">
                    Discover premium properties in prime locations. From luxury apartments to spacious villas,
                    we help you find the perfect home that matches your lifestyle and budget.
                </p>
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="properties.php" class="btn btn-custom btn-primary-custom me-3"></a></a>
                        <i class="fas fa-search me-2"></i>Browse Properties
                    </a>
                    <a href="#contact" class="btn btn-custom btn-outline-custom">
                        <i class="fas fa-phone me-2"></i>Contact Agent
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="animate__animated animate__fadeInRight animate__delay-1s">
                    <div class="position-relative">
                        <div class="bg-white p-4 rounded shadow-lg" style="border-radius: 20px;">
                            <i class="fas fa-home text-primary" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                            <h4 class="text-dark mb-3">Your Dream Home Awaits</h4>
                            <p class="text-muted mb-4">Over 10,000+ satisfied customers have found their perfect homes with us.</p>
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="stats-number text-primary">10K+</div>
                                    <div class="stats-label">Properties</div>
                                </div>
                                <div class="col-4">
                                    <div class="stats-number text-success">5K+</div>
                                    <div class="stats-label">Happy Clients</div>
                                </div>
                                <div class="col-4">
                                    <div class="stats-number text-warning">15+</div>
                                    <div class="stats-label">Years Experience</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5" style="background: var(--light-bg);">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp">
                    <i class="fas fa-home mb-3" style="font-size: 2rem;"></i>
                    <div class="stats-number">10,000+</div>
                    <div class="stats-label">Properties Listed</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp animate__delay-1s">
                    <i class="fas fa-users mb-3" style="font-size: 2rem;"></i>
                    <div class="stats-number">5,000+</div>
                    <div class="stats-label">Happy Customers</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp animate__delay-2s">
                    <i class="fas fa-building mb-3" style="font-size: 2rem;"></i>
                    <div class="stats-number">500+</div>
                    <div class="stats-label">Cities Covered</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp animate__delay-3s">
                    <i class="fas fa-award mb-3" style="font-size: 2rem;"></i>
                    <div class="stats-number">15+</div>
                    <div class="stats-label">Years Experience</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Properties Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Featured Properties</h2>
            <p class="section-subtitle mx-auto">
                Discover our handpicked selection of premium properties in prime locations.
                Each property is carefully vetted to ensure quality and value.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="property-card animate__animated animate__fadeInUp">
                    <div class="position-relative property-image">
                        <img src="admin/images/property_image/1.jpg" alt="Luxury Apartment" class="w-100">
                        <div class="property-badge">For Sale</div>
                    </div>
                    <div class="p-4">
                        <h5 class="mb-2">Modern Luxury Apartment</h5>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Downtown City Center</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-bed text-primary me-1"></i>
                                <span class="me-3">3</span>
                                <i class="fas fa-bath text-primary me-1"></i>
                                <span class="me-3">2</span>
                                <i class="fas fa-car text-primary me-1"></i>
                                <span>1</span>
                            </div>
                            <span class="badge bg-primary">1200 sqft</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-primary mb-0">$450,000</h4>
                            <a href="properties.php" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="property-card animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="position-relative property-image">
                        <img src="admin/images/property_image/2.jpg" alt="Family Villa" class="w-100">
                        <div class="property-badge">For Sale</div>
                    </div>
                    <div class="p-4">
                        <h5 class="mb-2">Spacious Family Villa</h5>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Green Valley Estates</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-bed text-primary me-1"></i>
                                <span class="me-3">4</span>
                                <i class="fas fa-bath text-primary me-1"></i>
                                <span class="me-3">3</span>
                                <i class="fas fa-car text-primary me-1"></i>
                                <span>2</span>
                            </div>
                            <span class="badge bg-success">2500 sqft</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-primary mb-0">$750,000</h4>
                            <a href="properties.php" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="property-card animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="position-relative property-image">
                        <img src="admin/images/property_image/6.jpg" alt="Penthouse Suite" class="w-100">
                        <div class="property-badge">For Rent</div>
                    </div>
                    <div class="p-4">
                        <h5 class="mb-2">Skyline Penthouse</h5>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Metropolitan Heights</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-bed text-primary me-1"></i>
                                <span class="me-3">2</span>
                                <i class="fas fa-bath text-primary me-1"></i>
                                <span class="me-3">2</span>
                                <i class="fas fa-car text-primary me-1"></i>
                                <span>1</span>
                            </div>
                            <span class="badge bg-warning">1800 sqft</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-success mb-0">$3,500/mo</h4>
                            <a href="properties.php" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="property-card animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="position-relative property-image">
                        <img src="admin/images/property_image/1.jpg" alt="Commercial Space" class="w-100">
                        <div class="property-badge">Commercial</div>
                    </div>
                    <div class="p-4">
                        <h5 class="mb-2">Prime Office Space</h5>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt text-muted me-2"></i>
                            <small class="text-muted">Business District</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-building text-primary me-1"></i>
                                <span class="me-3">Office</span>
                                <i class="fas fa-elevator text-primary me-1"></i>
                                <span class="me-3">Yes</span>
                                <i class="fas fa-parking text-primary me-1"></i>
                                <span>10</span>
                            </div>
                            <span class="badge bg-info">3000 sqft</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-primary mb-0">$2,200/mo</h4>
                            <a href="properties.php" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="properties.php" class="btn btn-primary-custom btn-custom">
                <i class="fas fa-search me-2"></i>View All Properties
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Why Choose Property Dealer?</h2>
            <p class="section-subtitle mx-auto">
                We provide comprehensive real estate services with expertise, integrity, and personalized attention to help you achieve your property goals.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="text-center animate__animated animate__fadeInUp">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5 class="mb-3">Property Search</h5>
                    <p class="text-muted">Advanced search filters to find your perfect property based on location, budget, size, and amenities.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-center animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="mb-3">Expert Guidance</h5>
                    <p class="text-muted">Professional real estate agents with years of experience to guide you through every step of your transaction.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-center animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h5 class="mb-3">Market Analysis</h5>
                    <p class="text-muted">Comprehensive market analysis and property valuation to ensure you get the best deal possible.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-center animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5 class="mb-3">Legal Support</h5>
                    <p class="text-muted">Complete legal assistance and documentation support for secure property transactions.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-center animate__animated animate__fadeInUp animate__delay-4s">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h5 class="mb-3">Professional Photography</h5>
                    <p class="text-muted">High-quality property photography and virtual tours to showcase your property effectively.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="text-center animate__animated animate__fadeInUp animate__delay-5s">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="mb-3">24/7 Support</h5>
                    <p class="text-muted">Round-the-clock customer support to assist you with any queries or concerns anytime.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle mx-auto">
                Don't just take our word for it. Here's what our satisfied customers have to say about their experience with Property Dealer.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="testimonial-card animate__animated animate__fadeInUp">
                    <div class="text-center mb-4">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face" alt="Sarah Johnson" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex justify-content-center mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                    </div>
                    <p class="text-center mb-3">
                        "Property Dealer helped me find my dream home in just two weeks! Their team was incredibly professional and guided me through every step of the process. The property I purchased exceeded all my expectations."
                    </p>
                    <div class="text-center">
                        <h6 class="mb-1">Sarah Johnson</h6>
                        <small class="text-muted">Homeowner</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="testimonial-card animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="text-center mb-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face" alt="Michael Chen" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex justify-content-center mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                    </div>
                    <p class="text-center mb-3">
                        "I was skeptical about online property searches, but Property Dealer changed my mind completely. Their website is user-friendly, and their agents are knowledgeable and responsive. Highly recommended!"
                    </p>
                    <div class="text-center">
                        <h6 class="mb-1">Michael Chen</h6>
                        <small class="text-muted">Investor</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="testimonial-card animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="text-center mb-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face" alt="Emily Rodriguez" class="rounded-circle mb-3" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex justify-content-center mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                    </div>
                    <p class="text-center mb-3">
                        "Selling my property through Property Dealer was stress-free. They handled all the marketing, showings, and negotiations professionally. The sale closed quickly and at a great price!"
                    </p>
                    <div class="text-center">
                        <h6 class="mb-1">Emily Rodriguez</h6>
                        <small class="text-muted">Seller</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Call to Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="animate__animated animate__fadeInLeft">
                    <h2 class="mb-4">Ready to Find Your Dream Property?</h2>
                    <p class="mb-4 fs-5 opacity-90">
                        Join thousands of satisfied customers who have found their perfect homes through Property Dealer.
                        Start your property search today and discover the difference professional service makes.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="properties.php" class="btn btn-light btn-custom">
                            <i class="fas fa-search me-2"></i>Start Searching
                        </a>
                        <a href="contact.php" class="btn btn-outline-light btn-custom">
                            <i class="fas fa-phone me-2"></i>Contact Agent
                        </a>
                        <a href="admin/index.php" class="btn btn-warning btn-custom">
                            <i class="fas fa-sign-in-alt me-2"></i>List Your Property
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="animate__animated animate__fadeInRight">
                    <div class="bg-white p-4 rounded shadow-lg" style="border-radius: 20px;">
                        <i class="fas fa-home text-primary" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                        <h4 class="text-dark mb-3">Free Consultation</h4>
                        <p class="text-muted mb-4">Get expert advice on your property needs without any obligation.</p>
                        <div class="d-flex justify-content-around">
                            <div class="text-center">
                                <div class="h5 text-primary mb-1">24/7</div>
                                <small class="text-muted">Support</small>
                            </div>
                            <div class="text-center">
                                <div class="h5 text-success mb-1">Free</div>
                                <small class="text-muted">Consultation</small>
                            </div>
                            <div class="text-center">
                                <div class="h5 text-warning mb-1">Expert</div>
                                <small class="text-muted">Agents</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer start -->
<?php include('include/footer.php');?>