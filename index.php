
<?php include('include/header.php');?>

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center" style="background: linear-gradient(135deg, #667eea 0%, #185cff 100%); min-height: 100vh; position: relative; overflow: hidden;">
    <!-- Enhanced SVG Background with Multiple Layers -->
    <div class="hero-bg-shapes">
        <!-- Primary floating shapes -->
        <svg class="shape shape-1" viewBox="0 0 800 600" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.1" />
                    <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.05" />
                </linearGradient>
            </defs>
            <ellipse cx="650" cy="150" rx="280" ry="180" fill="url(#grad1)" opacity="0.6"/>
            <circle cx="720" cy="500" r="120" fill="url(#grad1)" opacity="0.4"/>
        </svg>

        <!-- Secondary animated shapes -->
        <svg class="shape shape-2" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
            <circle cx="100" cy="200" r="80" fill="#ffffff" opacity="0.08"/>
            <ellipse cx="450" cy="300" rx="60" ry="90" fill="#ffffff" opacity="0.06"/>
        </svg>

        <!-- Decorative dots pattern -->
        <div class="floating-dots">
            <div class="dot dot-1"></div>
            <div class="dot dot-2"></div>
            <div class="dot dot-3"></div>
            <div class="dot dot-4"></div>
            <div class="dot dot-5"></div>
        </div>
    </div>

    <!-- Particle effect overlay -->
    <div class="particles-container">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
    </div>

    <div class="container position-relative" style="z-index:3;">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-7 col-md-10 mx-auto hero-content text-white py-5">
                <!-- Enhanced Badge -->
                <div class="hero-badge animate__animated animate__bounceIn mb-3">
                    <span class="badge-premium px-4 py-2 rounded-pill shadow-lg">
                        <i class="fas fa-crown me-2"></i>
                        <strong>PREMIUM REAL ESTATE</strong>
                        <i class="fas fa-crown ms-2"></i>
                    </span>
                </div>

                <!-- Enhanced Main Title -->
                <h1 class="hero-title display-3 fw-bold animate__animated animate__fadeInUp mb-4" style="letter-spacing:-2px; line-height:1.1;">
                    Find Your
                    <span class="text-gradient d-block animate__animated animate__fadeInUp animate__delay-1s">
                        Dream Home
                    </span>
                    <span class="hero-subtitle-highlight animate__animated animate__fadeInUp animate__delay-2s">
                        with <strong>Property Dealer</strong>
                    </span>
                </h1>

                <!-- Enhanced Description -->
                <p class="hero-description lead animate__animated animate__fadeInUp animate__delay-3s mb-5" style="opacity:0.95; font-size:1.2rem; line-height:1.6;">
                    Discover <span class="highlight-text">handpicked premium properties</span> in prime locations.
                    From exquisite apartments to luxurious villas, we help you find
                    <strong class="text-warning">the perfect home</strong> tailored to your lifestyle and budget.
                </p>

                <!-- Enhanced CTA Buttons -->
                <div class="hero-actions animate__animated animate__fadeInUp animate__delay-4s">
                    <div class="btn-group-modern mb-4">
                        <a href="properties.php" class="btn btn-glow-primary btn-xl rounded-pill me-3 shadow-lg">
                            <i class="fas fa-search me-2 fs-5"></i>
                            <strong>Browse Properties</strong>
                        </a>
                        <a href="contact.php" class="btn btn-outline-glow btn-xl rounded-pill shadow-lg">
                            <i class="fas fa-phone me-2 fs-5"></i>
                            <strong>Contact Agent</strong>
                        </a>
                    </div>

                    <!-- Quick Stats -->
                    <div class="stats-preview d-flex gap-4 flex-wrap">
                        <div class="stat-item animate__animated animate__fadeInLeft animate__delay-5s">
                            <div class="stat-number text-warning fw-bold fs-4">10K+</div>
                            <div class="stat-label small opacity-75">Properties Listed</div>
                        </div>
                        <div class="stat-item animate__animated animate__fadeInLeft animate__delay-6s">
                            <div class="stat-number text-success fw-bold fs-4">5K+</div>
                            <div class="stat-label small opacity-75">Happy Clients</div>
                        </div>
                        <div class="stat-item animate__animated animate__fadeInLeft animate__delay-7s">
                            <div class="stat-number text-info fw-bold fs-4">15+</div>
                            <div class="stat-label small opacity-75">Years Experience</div>
                        </div>
                    </div>
                </div>

                <!-- Trust Indicators -->
                <div class="trust-indicators animate__animated animate__fadeInUp animate__delay-8s mt-5">
                    <div class="d-flex gap-4 flex-wrap align-items-center">
                        <div class="trust-badge bg-white bg-opacity-20 rounded-4 px-4 py-3 d-flex align-items-center shadow-sm backdrop-blur">
                            <div class="trust-icon me-3">
                                <i class="fas fa-shield-alt text-success fs-4"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-white small">Verified & Secure</div>
                                <div class="text-white-50 tiny">100% Safe Transactions</div>
                            </div>
                        </div>
                        <div class="trust-badge bg-white bg-opacity-20 rounded-4 px-4 py-3 d-flex align-items-center shadow-sm backdrop-blur">
                            <div class="trust-icon me-3">
                                <i class="fas fa-award text-warning fs-4"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-white small">Award Winning</div>
                                <div class="text-white-50 tiny">Best Real Estate Agency</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Right Side Card -->
            <div class="col-lg-5 d-none d-lg-block">
                <div class="hero-card-container">
                    <!-- Main Feature Card -->
                    <div class="feature-card-main animate__animated animate__fadeInRight animate__delay-2s">
                        <div class="card-glass shadow-xl rounded-4 overflow-hidden position-relative">
                            <!-- Animated ribbon -->
                            <div class="premium-ribbon">
                                <span class="ribbon-text">
                                    <i class="fas fa-star"></i> PREMIUM <i class="fas fa-star"></i>
                                </span>
                            </div>

                            <div class="card-header-bg position-relative">
                                <div class="card-illustration">
                                    <i class="fas fa-home display-1 text-white opacity-20"></i>
                                </div>
                                <div class="card-pattern-overlay"></div>
                            </div>

                            <div class="card-content p-4">
                                <h3 class="card-title mb-4">
                                    <i class="fas fa-rocket text-primary me-3"></i>
                                    <strong>Why Choose Property Dealer?</strong>
                                </h3>

                                <div class="features-list">
                                    <div class="feature-item animate__animated animate__slideInRight animate__delay-3s">
                                        <div class="feature-icon-wrapper">
                                            <i class="fas fa-search-location text-primary"></i>
                                        </div>
                                        <div class="feature-content">
                                            <strong>Smart Property Search</strong>
                                            <small class="text-muted">AI-powered recommendations</small>
                                        </div>
                                    </div>

                                    <div class="feature-item animate__animated animate__slideInRight animate__delay-4s">
                                        <div class="feature-icon-wrapper">
                                            <i class="fas fa-handshake text-success"></i>
                                        </div>
                                        <div class="feature-content">
                                            <strong>Transparent Deals</strong>
                                            <small class="text-muted">No hidden fees or charges</small>
                                        </div>
                                    </div>

                                    <div class="feature-item animate__animated animate__slideInRight animate__delay-5s">
                                        <div class="feature-icon-wrapper">
                                            <i class="fas fa-user-tie text-warning"></i>
                                        </div>
                                        <div class="feature-content">
                                            <strong>Expert Agents</strong>
                                            <small class="text-muted">15+ years market experience</small>
                                        </div>
                                    </div>

                                    <div class="feature-item animate__animated animate__slideInRight animate__delay-6s">
                                        <div class="feature-icon-wrapper">
                                            <i class="fas fa-clock text-info"></i>
                                        </div>
                                        <div class="feature-content">
                                            <strong>24/7 Support</strong>
                                            <small class="text-muted">Always here when you need us</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="cta-section mt-4 pt-3 border-top border-light border-opacity-25">
                                    <a href="about.php" class="btn btn-primary-custom btn-lg w-100 rounded-pill">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Learn More About Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating achievement badges -->
                    <div class="floating-badges">
                        <div class="badge-float badge-1 animate__animated animate__bounceIn animate__delay-7s">
                            <div class="badge-content bg-success text-white rounded-circle shadow-lg">
                                <i class="fas fa-trophy"></i>
                            </div>
                        </div>
                        <div class="badge-float badge-2 animate__animated animate__bounceIn animate__delay-8s">
                            <div class="badge-content bg-warning text-dark rounded-circle shadow-lg">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="badge-float badge-3 animate__animated animate__bounceIn animate__delay-9s">
                            <div class="badge-content bg-info text-white rounded-circle shadow-lg">
                                <i class="fas fa-award"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Enhanced Hero Section Styles */
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #185cff 100%) !important;
    position: relative;
    overflow: hidden;
}

/* Background Shapes */
.hero-bg-shapes {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.shape {
    position: absolute;
    opacity: 0.7;
}

.shape-1 {
    top: 0;
    right: 0;
    width: 60vw;
    max-width: 800px;
    animation: floatShapes 20s ease-in-out infinite;
}

.shape-2 {
    bottom: 10%;
    left: 5%;
    width: 30vw;
    max-width: 400px;
    animation: floatShapes 25s ease-in-out infinite reverse;
}

@keyframes floatShapes {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-20px) rotate(2deg); }
    66% { transform: translateY(10px) rotate(-1deg); }
}

/* Floating Dots */
.floating-dots {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.dot {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    animation: floatDots 15s ease-in-out infinite;
}

.dot-1 { width: 8px; height: 8px; top: 20%; left: 10%; animation-delay: 0s; }
.dot-2 { width: 6px; height: 6px; top: 60%; left: 80%; animation-delay: 3s; }
.dot-3 { width: 10px; height: 10px; top: 40%; left: 60%; animation-delay: 6s; }
.dot-4 { width: 5px; height: 5px; top: 80%; left: 20%; animation-delay: 9s; }
.dot-5 { width: 7px; height: 7px; top: 30%; left: 90%; animation-delay: 12s; }

@keyframes floatDots {
    0%, 100% { transform: translateY(0px); opacity: 0.3; }
    50% { transform: translateY(-20px); opacity: 0.8; }
}

/* Particles */
.particles-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 2;
}

.particle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    animation: particleFloat 20s linear infinite;
}

.particle-1 { width: 4px; height: 4px; top: 10%; left: 20%; animation-delay: 0s; }
.particle-2 { width: 6px; height: 6px; top: 30%; left: 70%; animation-delay: 5s; }
.particle-3 { width: 3px; height: 3px; top: 50%; left: 40%; animation-delay: 10s; }
.particle-4 { width: 5px; height: 5px; top: 70%; left: 80%; animation-delay: 15s; }
.particle-5 { width: 4px; height: 4px; top: 90%; left: 30%; animation-delay: 20s; }

@keyframes particleFloat {
    0% { transform: translateY(0px) translateX(0px); }
    25% { transform: translateY(-100px) translateX(50px); }
    50% { transform: translateY(-200px) translateX(100px); }
    75% { transform: translateY(-300px) translateX(150px); }
    100% { transform: translateY(-400px) translateX(200px); opacity: 0; }
}

/* Hero Badge */
.hero-badge {
    text-align: center;
    margin-bottom: 2rem;
}

.badge-premium {
    background: linear-gradient(45deg, #ffd700, #ffed4e);
    color: #1a365d;
    font-size: 0.9rem;
    font-weight: 700;
    letter-spacing: 1px;
    box-shadow: 0 8px 32px rgba(255, 215, 0, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
}

/* Enhanced Title */
.hero-title {
    font-size: clamp(2.5rem, 8vw, 5rem);
    margin-bottom: 1.5rem;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.text-gradient {
    background: linear-gradient(45deg, #ffffff, #e2e8f0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 1.2em;
}

.hero-subtitle-highlight {
    color: #ffd700;
    font-size: 0.8em;
    margin-top: 0.5rem;
    display: block;
}

/* Enhanced Description */
.hero-description .highlight-text {
    color: #ffd700;
    font-weight: 600;
    position: relative;
}

.hero-description .highlight-text::after {
    content: '';
    position: absolute;
    bottom: 2px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, #ffd700, #ffed4e);
    border-radius: 2px;
}

/* Enhanced Buttons */
.btn-group-modern {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.btn-glow-primary {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    color: #667eea;
    border: 2px solid rgba(255, 255, 255, 0.2);
    font-weight: 700;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-glow-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.5s;
}

.btn-glow-primary:hover::before {
    left: 100%;
}

.btn-glow-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
}

.btn-outline-glow {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.8);
    color: white;
    font-weight: 700;
    transition: all 0.3s ease;
}

.btn-outline-glow:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(255, 255, 255, 0.2);
}

.btn-xl {
    padding: 1rem 2.5rem;
    font-size: 1.1rem;
}

/* Stats Preview */
.stats-preview {
    margin-top: 2rem;
}

.stat-item {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 1rem 1.5rem;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.2);
    min-width: 120px;
}

.stat-number {
    font-size: 1.8rem;
    margin-bottom: 0.25rem;
}

/* Trust Indicators */
.trust-indicators {
    margin-top: 3rem;
}

.trust-badge {
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.trust-badge:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.15) !important;
}

/* Enhanced Feature Card */
.hero-card-container {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.card-glass {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    max-width: 420px;
}

.premium-ribbon {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 10;
}

.ribbon-text {
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    padding: 0.5rem 1.5rem;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1px;
    clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
    box-shadow: 0 4px 15px rgba(238, 90, 36, 0.3);
}

.card-header-bg {
    background: linear-gradient(135deg, #667eea 0%, #185cff 100%);
    height: 120px;
    position: relative;
    overflow: hidden;
}

.card-illustration {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.1;
}

.card-pattern-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z'/%3E%3C/g%3E%3C/svg%3E") repeat;
}

.card-title {
    color: #1a365d;
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
}

/* Features List */
.features-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature-item {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    background: rgba(102, 126, 234, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: all 0.3s ease;
}

.feature-item:hover {
    background: rgba(102, 126, 234, 0.1);
    transform: translateX(5px);
}

.feature-icon-wrapper {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-right: 1rem;
    font-size: 1.2rem;
}

.feature-content strong {
    display: block;
    color: #1a365d;
    font-size: 0.95rem;
}

.feature-content small {
    color: #64748b;
    font-size: 0.8rem;
}

/* CTA Section */
.cta-section {
    margin-top: 2rem;
    padding-top: 1.5rem;
}

.btn-primary-custom {
    background: linear-gradient(135deg, #667eea 0%, #185cff 100%);
    border: none;
    color: white;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary-custom:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
}

/* Floating Badges */
.floating-badges {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 5;
}

.badge-float {
    position: absolute;
}

.badge-1 {
    top: 10%;
    right: -20px;
}

.badge-2 {
    top: 30%;
    right: -30px;
}

.badge-3 {
    bottom: 20%;
    right: -25px;
}

.badge-content {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    animation: badgeBounce 2s ease-in-out infinite;
}

@keyframes badgeBounce {
    0%, 100% { transform: translateY(0px) scale(1); }
    50% { transform: translateY(-10px) scale(1.1); }
}

/* Responsive Design */
@media (max-width: 992px) {
    .hero-card-container {
        display: none;
    }

    .hero-content {
        text-align: center;
    }

    .hero-title {
        font-size: clamp(2rem, 10vw, 3.5rem);
    }

    .btn-group-modern {
        justify-content: center;
    }

    .stats-preview {
        justify-content: center;
    }

    .trust-indicators {
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .hero-section {
        padding: 4rem 0;
        min-height: auto;
    }

    .btn-group-modern {
        flex-direction: column;
        align-items: center;
    }

    .btn-xl {
        width: 100%;
        max-width: 300px;
    }

    .stats-preview {
        flex-direction: column;
        align-items: center;
    }

    .trust-indicators .d-flex {
        flex-direction: column;
        gap: 1rem;
    }
}
</style>

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