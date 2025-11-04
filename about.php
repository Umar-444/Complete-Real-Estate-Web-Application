<?php include('include/header.php');?>

<!-- Hero Section - About Us -->
<section class="hero-section d-flex align-items-center" style="background: linear-gradient(135deg, #667eea 0%, #185cff 100%); min-height: 60vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h1 class="hero-title animate__animated animate__fadeInUp">About Property Dealer</h1>
                <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s mx-auto">
                    Your trusted partner in real estate excellence. With over 15 years of experience, we've helped thousands of families find their dream homes.
                </p>
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent">
                            <li class="breadcrumb-item"><a href="index.php" class="text-white-50">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="assets/img/admin.png" alt="Property Dealer Team" class="img-fluid rounded-4 shadow-lg animate__animated animate__fadeInLeft">
                    <div class="position-absolute top-0 start-0 bg-primary opacity-25 rounded-4" style="width: 100%; height: 100%; transform: translate(20px, 20px); z-index: -1;"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="animate__animated animate__fadeInRight">
                    <h2 class="section-title mb-4">Why Choose Property Dealer?</h2>
                    <p class="mb-4 fs-5 text-muted">
                        We combine years of experience with cutting-edge technology to provide exceptional real estate services.
                        Our commitment to excellence has made us the trusted choice for property buyers and sellers.
                    </p>

                    <!-- FAQ Accordion -->
                    <div class="accordion" id="aboutAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true">
                                    <i class="fas fa-handshake text-primary me-3"></i>
                                    <strong>Impeccable Customer Service</strong>
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#aboutAccordion">
                                <div class="accordion-body">
                                    We prioritize our clients' needs and provide personalized service throughout the entire real estate process.
                                    From initial consultation to final closing, our dedicated team ensures a smooth and satisfying experience.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-white shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                    <i class="fas fa-award text-success me-3"></i>
                                    <strong>Expertise & Experience</strong>
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                                <div class="accordion-body">
                                    With over 15 years in the industry, our team brings unparalleled knowledge of local markets,
                                    pricing strategies, and negotiation tactics to help you achieve the best possible results.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-white shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                    <i class="fas fa-shield-alt text-warning me-3"></i>
                                    <strong>Honesty & Integrity</strong>
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                                <div class="accordion-body">
                                    We believe in transparent dealings and ethical practices. Our clients trust us because we always
                                    put their best interests first and maintain the highest standards of professional conduct.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-white shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                    <i class="fas fa-clock text-info me-3"></i>
                                    <strong>24/7 Support & Guidance</strong>
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                                <div class="accordion-body">
                                    Real estate questions don't keep office hours. Our team is available around the clock to answer
                                    your questions, provide guidance, and ensure you feel supported throughout your journey.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Meet Our Expert Team</h2>
            <p class="section-subtitle mx-auto">
                Our experienced professionals are dedicated to helping you achieve your real estate goals.
                Each team member brings unique expertise and a passion for exceptional service.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="property-card text-center animate__animated animate__fadeInUp h-100">
                    <div class="position-relative mb-4">
                        <img src="assets/img/avatar/avatar-5.jpg" alt="Martin Smith" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-color);">
                    </div>
                    <div class="p-3">
                        <h5 class="mb-2">Umar Farooq</h5>
                        <p class="text-primary fw-semibold mb-3">CEO & Founder WorldWebTree</p>
                        <p class="text-muted mb-3">Specializing in luxury residential properties with over 10 years of market expertise.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-info btn-sm"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="property-card text-center animate__animated animate__fadeInUp animate__delay-1s h-100">
                    <div class="position-relative mb-4">
                        <img src="assets/img/avatar/avatar-6.jpg" alt="John Pitarshon" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-color);">
                    </div>
                    <div class="p-3">
                        <h5 class="mb-2">Behram Khattak</h5>
                        <p class="text-success fw-semibold mb-3">Commercial Real Estate Specialist</p>
                        <p class="text-muted mb-3">Expert in commercial properties and investment opportunities across multiple sectors.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-info btn-sm"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="property-card text-center animate__animated animate__fadeInUp animate__delay-2s h-100">
                    <div class="position-relative mb-4">
                        <img src="assets/img/avatar/avatar-7.jpg" alt="Maria Blank" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-color);">
                    </div>
                    <div class="p-3">
                        <h5 class="mb-2">Hamza Khan</h5>
                        <p class="text-warning fw-semibold mb-3">Property Manager & Coordinator</p>
                        <p class="text-muted mb-3">Dedicated to seamless property management and client coordination services.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-info btn-sm"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="property-card text-center animate__animated animate__fadeInUp animate__delay-3s h-100">
                    <div class="position-relative mb-4">
                        <img src="assets/img/avatar/avatar-11.jpg" alt="Karen Paran" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-color);">
                    </div>
                    <div class="p-3">
                        <h5 class="mb-2">Danyal Khan</h5>
                        <p class="text-info fw-semibold mb-3">Client Relations Manager</p>
                        <p class="text-muted mb-3">Ensuring exceptional client experiences and building lasting relationships.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-info btn-sm"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-linkedin-in"></i></a>
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
        <div class="text-center mb-5">
            <h2 class="section-title">Our Achievements</h2>
            <p class="section-subtitle mx-auto">
                Numbers speak louder than words. Here's what we've accomplished together with our clients.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp text-center">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="stats-number">10,000+</div>
                    <div class="stats-label">Properties Sold</div>
                    <p class="text-muted mt-2">Successful transactions completed</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp animate__delay-1s text-center">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-number">5,000+</div>
                    <div class="stats-label">Happy Clients</div>
                    <p class="text-muted mt-2">Satisfied customers worldwide</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp animate__delay-2s text-center">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="stats-number">500+</div>
                    <div class="stats-label">Cities Covered</div>
                    <p class="text-muted mt-2">Extensive market coverage</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-counter animate__animated animate__fadeInUp animate__delay-3s text-center">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="stats-number">15+</div>
                    <div class="stats-label">Years Experience</div>
                    <p class="text-muted mt-2">Industry expertise</p>
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
                Don't just take our word for it. Here's what our satisfied clients have to say about their experience with Property Dealer.
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
                    <h2 class="mb-4">Ready to Work With Us?</h2>
                    <p class="mb-4 fs-5 opacity-90">
                        Join thousands of satisfied clients who have found their perfect properties with Property Dealer.
                        Whether you're buying, selling, or investing, we're here to make your real estate journey successful.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="properties.php" class="btn btn-light btn-custom">
                            <i class="fas fa-search me-2"></i>Explore Properties
                        </a>
                        <a href="contact.php" class="btn btn-outline-light btn-custom">
                            <i class="fas fa-phone me-2"></i>Contact Our Team
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
                        <i class="fas fa-users text-primary" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                        <h4 class="text-dark mb-3">Join Our Family</h4>
                        <p class="text-muted mb-4">Become part of the Property Dealer success story. Let's build something amazing together.</p>
                        <div class="d-flex justify-content-around">
                            <div class="text-center">
                                <div class="h5 text-primary mb-1">24/7</div>
                                <small class="text-muted">Available</small>
                            </div>
                            <div class="text-center">
                                <div class="h5 text-success mb-1">Free</div>
                                <small class="text-muted">Consultation</small>
                            </div>
                            <div class="text-center">
                                <div class="h5 text-warning mb-1">Expert</div>
                                <small class="text-muted">Guidance</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('include/footer.php');?>