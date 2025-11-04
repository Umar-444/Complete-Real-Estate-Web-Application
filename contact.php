<?php include('include/header.php');?>

<!-- Hero Section - Contact Us -->
<section class="hero-section d-flex align-items-center" style="background: linear-gradient(135deg, #667eea 0%, #185cff 100%); min-height: 60vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h1 class="hero-title animate__animated animate__fadeInUp">Get In Touch</h1>
                <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s mx-auto">
                    Ready to find your dream property? Our expert team is here to help you every step of the way.
                    Contact us today and let's start your real estate journey.
                </p>
                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center bg-transparent">
                            <li class="breadcrumb-item"><a href="index.php" class="text-white-50">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Contact Our Team</h2>
            <p class="section-subtitle mx-auto">
                Have questions about a property or need assistance with your real estate needs?
                Get in touch with our expert team today.
            </p>
        </div>

        <div class="row g-5">
            <div class="col-lg-8">
                <div class="property-card p-4 animate__animated animate__fadeInLeft">
                    <h3 class="mb-4 text-primary">Send us a Message</h3>
                    <form action="#" method="POST" id="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    <label for="name"><i class="fas fa-user me-2"></i>Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                    <label for="email"><i class="fas fa-envelope me-2"></i>Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    <label for="subject"><i class="fas fa-tag me-2"></i>Subject</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                                    <label for="phone"><i class="fas fa-phone me-2"></i>Phone Number</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" style="height: 120px" placeholder="Your Message" required></textarea>
                                    <label for="message"><i class="fas fa-comment me-2"></i>Your Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary-custom btn-custom">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="animate__animated animate__fadeInRight">
                    <!-- Contact Information -->
                    <div class="property-card p-4 mb-4">
                        <h4 class="mb-4 text-primary"><i class="fas fa-info-circle me-2"></i>Contact Information</h4>
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary fs-4 me-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Office Address</h6>
                                <p class="text-muted mb-0">Your Office Address Here</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-phone text-success fs-4 me-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Phone Number</h6>
                                <p class="text-muted mb-1"><a href="tel:+1112223333" class="text-decoration-none">+111 222 3333</a></p>
                                <small class="text-muted">Mon - Sat: 9:00 AM - 8:00 PM</small>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-envelope text-warning fs-4 me-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email Address</h6>
                                <p class="text-muted mb-0"><a href="mailto:contact@yourdomain.com" class="text-decoration-none">contact@yourdomain.com</a></p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-clock text-info fs-4 me-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Business Hours</h6>
                                <p class="text-muted mb-0">Mon - Sat: 9:00 AM - 8:00 PM<br>Sunday: By Appointment</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Contact Options -->
                    <div class="property-card p-4 mb-4">
                        <h5 class="mb-3 text-primary">Quick Contact</h5>
                        <div class="d-grid gap-2">
                            <a href="tel:+1112223333" class="btn btn-outline-success">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </a>
                            <a href="#" class="btn btn-outline-success" target="_blank">
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                            <a href="mailto:contact@yourdomain.com" class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>Email Us
                            </a>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="property-card p-4 mb-4">
                        <h5 class="mb-3 text-primary">Follow Us</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="#" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fab fa-facebook-f me-1"></i>Facebook
                            </a>
                            <a href="#" target="_blank" class="btn btn-outline-danger btn-sm">
                                <i class="fab fa-instagram me-1"></i>Instagram
                            </a>
                            <a href="#" target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="fab fa-linkedin-in me-1"></i>LinkedIn
                            </a>
                            <a href="#" target="_blank" class="btn btn-outline-dark btn-sm">
                                <i class="fab fa-github me-1"></i>GitHub
                            </a>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="bg-primary text-white p-4 rounded-3">
                        <h6 class="mb-2"><i class="fas fa-exclamation-triangle me-2"></i>24/7 Emergency</h6>
                        <p class="mb-2 small">For urgent property matters or after-hours assistance:</p>
                        <a href="tel:+1112223333" class="text-white fw-bold">
                            <i class="fas fa-phone me-1"></i>+111 222 3333
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location & Map Section -->
<section class="py-5" style="background: var(--light-bg);">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Find Our Office</h2>
            <p class="section-subtitle mx-auto">
                Visit our office or get directions to meet with our property experts in person.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="property-card p-4 animate__animated animate__fadeInLeft">
                    <h4 class="mb-3 text-primary"><i class="fas fa-map-marked-alt me-2"></i>Our Location</h4>
                    <div class="mb-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878428698!3d40.74076684313207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sGoogle!5e0!3m2!1sen!2sus!4v1679887089631!5m2!1sen!2sus"
                            width="100%"
                            height="300"
                            style="border:0; border-radius: 12px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="text-center">
                                <i class="fas fa-route text-primary fs-2 mb-2"></i>
                                <h6>Get Directions</h6>
                                <a href="https://maps.google.com" target="_blank" class="btn btn-outline-primary btn-sm">Open in Maps</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <i class="fas fa-parking text-success fs-2 mb-2"></i>
                                <h6>Parking</h6>
                                <p class="text-muted small mb-0">Free street parking available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="animate__animated animate__fadeInRight">
                    <div class="property-card p-4 mb-4">
                        <h4 class="mb-3 text-primary"><i class="fas fa-building me-2"></i>Office Amenities</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-wifi text-success me-3 fs-5"></i>
                                    <div>
                                        <h6 class="mb-0">Free Wi-Fi</h6>
                                        <small class="text-muted">High-speed internet</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-coffee text-warning me-3 fs-5"></i>
                                    <div>
                                        <h6 class="mb-0">Refreshments</h6>
                                        <small class="text-muted">Coffee & water</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-wheelchair text-info me-3 fs-5"></i>
                                    <div>
                                        <h6 class="mb-0">Accessible</h6>
                                        <small class="text-muted">Wheelchair friendly</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock text-primary me-3 fs-5"></i>
                                    <div>
                                        <h6 class="mb-0">Extended Hours</h6>
                                        <small class="text-muted">By appointment</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-primary text-white p-4 rounded-3">
                        <h5 class="mb-3"><i class="fas fa-calendar-check me-2"></i>Schedule a Visit</h5>
                        <p class="mb-3">Want to discuss your property needs in person? Schedule a consultation with our experts.</p>
                        <div class="d-flex gap-2">
                        <a href="tel:+1112223333" class="btn btn-light btn-sm">
                            <i class="fas fa-phone me-1"></i>Call to Schedule
                        </a>
                        <a href="mailto:contact@yourdomain.com" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-envelope me-1"></i>Email Us
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle mx-auto">
                Quick answers to common questions about working with Property Dealer.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                                <i class="fas fa-clock text-primary me-3"></i>
                                <strong>How quickly can I get a response?</strong>
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We typically respond to all inquiries within 2 hours during business hours. For urgent property matters, we offer 24/7 emergency contact options.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-white shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <i class="fas fa-handshake text-success me-3"></i>
                                <strong>Do you offer virtual consultations?</strong>
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We offer virtual consultations via video call or phone. This is perfect for out-of-town clients or those who prefer the convenience of remote meetings.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-white shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                <i class="fas fa-home text-warning me-3"></i>
                                <strong>Can you help with both buying and selling?</strong>
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! Our team specializes in both residential and commercial properties for buying, selling, and renting. We provide comprehensive services for all your real estate needs.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-white shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                <i class="fas fa-shield-alt text-info me-3"></i>
                                <strong>Is there any consultation fee?</strong>
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                All initial consultations are completely free! We want to help you understand your options and find the best solution for your property needs without any upfront costs.
                            </div>
                        </div>
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
                    <h2 class="mb-4">Ready to Start Your Property Journey?</h2>
                    <p class="mb-4 fs-5 opacity-90">
                        Don't wait any longer! Contact Property Dealer today and let our experienced team guide you
                        through every step of finding your perfect property.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="properties.php" class="btn btn-light btn-custom">
                            <i class="fas fa-search me-2"></i>Browse Properties
                        </a>
                        <a href="tel:+1112223333" class="btn btn-outline-light btn-custom">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                        <a href="admin/index.php" class="btn btn-warning btn-custom">
                            <i class="fas fa-plus me-2"></i>List Your Property
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="animate__animated animate__fadeInRight">
                    <div class="bg-white p-4 rounded shadow-lg" style="border-radius: 20px;">
                        <i class="fas fa-comments text-primary" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                        <h4 class="text-dark mb-3">Have Questions?</h4>
                        <p class="text-muted mb-4">Our team is ready to help with any questions about properties, pricing, or the buying/selling process.</p>
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
                                <small class="text-muted">Advice</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('include/footer.php');?>