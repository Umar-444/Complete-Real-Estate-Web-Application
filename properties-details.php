<?php
/**
 * Property Details Page (Public)
 * Detailed showcase for individual property, gallery, tabs, agent info, XSS safe, Codecanyon Edition.
 */
include('include/header.php');
include('include/config.php');
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$property = mysqli_query($con, "SELECT * FROM property WHERE id='$id'");
$res = mysqli_fetch_array($property);
if ($res) {
    $title = $res['title'];
    $address = $res['address'];
    $bedroom = $res['bedroom'];
    $bathroom = $res['bathroom'];
    $kichan = $res['kichan'];
    $balcony = $res['balcony'];
    $sqr_price = $res['sqr_price'];
    $description = $res['description'];
    $price = $res['price'];
    $sold = $res['sold'];
    $video = $res['video'];
    $map = $res['location'];
    $property_type = $res['property_type'];
} else {
    $title = $address = $bedroom = $bathroom = $kichan = $balcony = $sqr_price = $description = $price = $sold = $video = $map = $property_type = '';
}
$img_query = mysqli_query($con, "SELECT * FROM images WHERE property_id='$id'");
$img_result = mysqli_fetch_array($img_query);
$images = [];
if ($img_result) {
    foreach (['image', 'image1', 'image2', 'image3', 'image4'] as $key) {
        if (!empty($img_result[$key])) {
            $images[] = $img_result[$key];
        }
    }
}
$admin_query = mysqli_query($con, "SELECT * FROM admin LIMIT 1");
$admin_result = mysqli_fetch_array($admin_query);
$u_name = ucfirst($admin_result['name'] ?? '');
// Status badge logic
if ($sold === 'yes') {
    $badgeClass = 'bg-danger';
    $badgeText = 'Sold';
} elseif ($sold === 'pending') {
    $badgeClass = 'bg-warning text-dark';
    $badgeText = 'Pending';
} else {
    $badgeClass = 'bg-success';
    $badgeText = 'Available';
}
?>
<!-- Back to Listings Button -->
<div class="container pt-4">
  <a href="properties.php" class="btn btn-outline-secondary btn-sm mb-3"><i class="fas fa-arrow-left me-1"></i> Back to Listings</a>
</div>
<!-- Hero Section with Glass Overlay -->
<section class="property-hero-section position-relative py-5" style="background: linear-gradient(120deg, var(--primary-color), var(--secondary-color)); color: white; min-height: 350px;">
  <div class="container position-relative">
    <div class="row align-items-end pb-2">
      <div class="col-lg-9">
        <div class="glass-card p-5 mb-4 shadow-lg position-relative" style="backdrop-filter: blur(12px); background:rgba(255,255,255,0.14); border-radius:22px; border: 1.5px solid rgba(255,255,255,0.13);">
          <h1 class="display-5 fw-bold mb-2 text-nowrap">
            <?php echo htmlspecialchars($title) ?: 'Property Details'; ?>
            <span class="badge <?php echo $badgeClass; ?> ms-3" style="font-size:1.1rem; vertical-align:middle;"> <?php echo $badgeText; ?> </span>
          </h1>
          <div class="d-flex align-items-center mb-3 gap-3">
            <i class="fas fa-map-marker-alt me-2"></i>
            <span class="fs-5 opacity-85"> <?php echo htmlspecialchars($address) ?: 'N/A'; ?> </span>
          </div>
          <div class="row g-4">
            <div class="col-6 col-md-3 text-center">
              <div class="fs-4 fw-bold text-warning"><i class="fas fa-bed"></i> <?php echo $bedroom ?: '-'; ?></div>
              <div class="small">Beds</div>
            </div>
            <div class="col-6 col-md-3 text-center">
              <div class="fs-4 fw-bold text-info"><i class="fas fa-bath"></i> <?php echo $bathroom ?: '-'; ?></div>
              <div class="small">Baths</div>
            </div>
            <div class="col-6 col-md-3 text-center">
              <div class="fs-4 fw-bold text-success"><i class="fas fa-vector-square"></i> <?php echo $sqr_price ?: '-'; ?> <span class="fs-6">sqft</span></div>
              <div class="small">Area</div>
            </div>
            <div class="col-6 col-md-3 text-center">
              <span class="display-6 fw-bolder text-primary animate__animated animate__bounceIn">
                $<?php echo is_numeric($price) ? number_format($price) : 'N/A'; ?>
              </span>
              <div class="small">Price</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 d-none d-lg-flex justify-content-end align-items-end">
        <img src="assets/img/hero-estate.svg" alt="Property" class="img-fluid w-75" style="opacity:0.7;">
      </div>
    </div>
  </div>
</section>

<!-- Gallery: Property Images -->
<section class="py-4 gallery-section position-relative bg-light ">
  <div class="container px-xl-5 px-2">
    <div class="mb-3">
      <?php if (count($images)): ?>
        <span class="badge bg-primary px-3 py-1 mb-2"><i class="fas fa-images"></i> <?php echo count($images); ?> Photos</span>
      <?php else: ?>
        <span class="badge bg-secondary px-3 py-1 mb-2">No photos available</span>
      <?php endif; ?>
    </div>
    <div class="row g-3">
      <div class="col-12 col-lg-8">
        <div id="propertyCarousel" class="carousel slide rounded-4 shadow-sm overflow-hidden animate__animated animate__fadeIn" data-bs-ride="carousel">
          <div class="carousel-inner bg-light">
            <?php 
            if (count($images)):
            foreach($images as $index => $image): ?>
              <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <?php 
                $imgpath = 'admin/images/property_image/' . htmlspecialchars($image);
                if (!file_exists($imgpath) || !$image) {
                    $imgpath = 'assets/img/avatar/avatar.jpg'; // use placeholder path you like
                }
                ?>
                <img src="<?php echo $imgpath; ?>" class="d-block w-100" alt="Property image <?php echo $index + 1; ?>" style="height:420px; object-fit:cover;cursor:pointer;">
              </div>
            <?php endforeach; else: ?>
              <div class="carousel-item active text-center d-flex align-items-center justify-content-center" style="height:420px; background:#f8fafc;">
                <span class="text-muted">No property images available</span>
              </div>
            <?php endif; ?>
          </div>
          <?php if(count($images) > 1): ?>
          <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-12 col-lg-4 d-flex flex-lg-column flex-row gap-2 gap-lg-3 align-items-stretch">
        <!-- Thumbnail Gallery -->
        <?php if(count($images) > 1): ?>
        <div class="d-flex flex-lg-column flex-row gap-2 gap-lg-3 overflow-auto p-1">
          <?php foreach($images as $index => $image): ?>
            <?php 
            $imgpath = 'admin/images/property_image/' . htmlspecialchars($image);
            if (!file_exists($imgpath) || !$image) {
                $imgpath = 'assets/img/avatar/avatar.jpg'; // use placeholder path you like
            }
            ?>
            <img src="<?php echo $imgpath; ?>" style="width:100px;height:70px;object-fit:cover;border-radius: 10px;cursor:pointer;" class="shadow-sm border border-2 <?php echo $index===0 ? 'border-primary' : 'border-light'; ?> thumb-gallery-img" onclick="goToSlide(<?php echo $index; ?>)" loading="lazy">
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <!-- Agent Info Card -->
        <div class="bg-white p-3 rounded-3 shadow-sm mt-lg-3 ms-lg-0 ms-2 mx-lg-0 d-flex flex-row flex-lg-column align-items-center">
          <div class="d-flex gap-3 align-items-center">
            <img src="admin/images/user.png" style="width:50px;height:50px;object-fit:cover;border-radius:50%;border:2px solid var(--primary-color);">
            <div>
              <span class="fw-semibold">Agent:</span> <?php echo htmlspecialchars($u_name) ?: 'N/A'; ?>
              <div class="small text-muted">Top Seller <i class="fas fa-crown text-warning ms-1"></i></div>
            </div>
          </div>
          <div class="flex-lg-fill mt-2 mt-lg-3 d-grid gap-2 w-100">
            <a href="mailto:contact@yourdomain.com" class="btn btn-outline-primary"><i class="fas fa-envelope"></i> Email</a>
            <a href="tel:+1112223333" class="btn btn-outline-success"><i class="fas fa-phone"></i> Call</a>
            <a href="#" class="btn btn-outline-success"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            <span class="badge bg-info mt-2"><i class="fas fa-check-circle me-1"></i> Verified Agent</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Details Section: Tabs, Features, Description -->
<section class="py-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <ul class="nav nav-pills mb-3" id="propertyTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="desc-tab" data-bs-toggle="pill" data-bs-target="#desc" type="button" role="tab">
              <i class="fas fa-info-circle me-1"></i> Description</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="features-tab" data-bs-toggle="pill" data-bs-target="#features" type="button" role="tab">
              <i class="fas fa-star me-1"></i> Features</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="video-tab" data-bs-toggle="pill" data-bs-target="#video" type="button" role="tab">
              <i class="fas fa-video me-1"></i> Video</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="map-tab" data-bs-toggle="pill" data-bs-target="#map" type="button" role="tab">
              <i class="fas fa-map-marker-alt me-1"></i> Map</button>
          </li>
        </ul>
        <div class="tab-content p-4 rounded shadow-sm bg-white animate__animated animate__fadeIn" id="propertyTabContent">
          <div class="tab-pane fade show active" id="desc" role="tabpanel">
            <h4 class="mb-2"><i class="fas fa-info-circle text-primary"></i> Property Description</h4>
            <p class="text-muted fw-medium fs-5"><?php echo htmlspecialchars($description) ?: 'No description available.'; ?></p>
          </div>
          <div class="tab-pane fade" id="features" role="tabpanel">
            <h4 class="mb-2"><i class="fas fa-star text-warning"></i> Features</h4>
            <div class="mb-2 d-flex flex-wrap gap-2">
              <span class="badge bg-primary-subtle text-primary fs-6"><i class="fas fa-bed me-1"></i> <?php echo $bedroom; ?> Bedrooms</span>
              <span class="badge bg-info-subtle text-info fs-6"><i class="fas fa-bath me-1"></i> <?php echo $bathroom; ?> Bathrooms</span>
              <span class="badge bg-success-subtle text-success fs-6"><i class="fas fa-utensils me-1"></i> <?php echo $kichan; ?> Kitchen</span>
              <span class="badge bg-warning-subtle text-warning fs-6"><i class="fas fa-vector-square me-1"></i> <?php echo $sqr_price; ?> sqft</span>
              <span class="badge bg-secondary-subtle text-secondary fs-6"><i class="fas fa-home me-1"></i> <?php echo htmlspecialchars($property_type); ?></span>
              <?php if($balcony): ?><span class="badge bg-info text-white fs-6"><i class="fas fa-tree me-1"></i> <?php echo $balcony; ?> Balcony</span><?php endif; ?>
            </div>
          </div>
          <div class="tab-pane fade" id="video" role="tabpanel">
            <?php if(!empty($video)): ?>
              <div class="ratio ratio-16x9 mb-3"><iframe src="<?php echo $video; ?>" allowfullscreen></iframe></div>
            <?php else: ?>
              <div class="alert alert-info">No property video available.</div>
            <?php endif; ?>
          </div>
          <div class="tab-pane fade" id="map" role="tabpanel">
            <?php if(!empty($map)): ?>
              <div class="ratio ratio-16x9 mb-3"> <?php echo $map; ?> </div>
            <?php else: ?>
              <div class="alert alert-info">Location map not available.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="bg-white p-4 rounded shadow-sm mb-3 mt-3">
          <div class="d-flex flex-column gap-3 align-items-center">
            <span class="fw-bold mb-2">Ready to visit or have a question?</span>
            <a href="#" class="btn btn-primary w-100"><i class="fas fa-calendar-check me-1"></i> Book Visit</a>
            <a href="#" class="btn btn-outline-dark w-100">Ask a Question</a>
          </div>
        </div>
        <!-- Social Sharing Box -->
        <div class="bg-white p-3 rounded shadow-sm mb-3 mt-3">
          <div class="fw-bold mb-2">Share this property:</div>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-primary btn-sm flex-fill"><i class="fab fa-facebook-f me-1"></i> Facebook</a>
            <a href="#" class="btn btn-outline-info btn-sm flex-fill"><i class="fab fa-twitter me-1"></i> Twitter</a>
            <a href="#" class="btn btn-outline-danger btn-sm flex-fill"><i class="fab fa-pinterest-p me-1"></i> Pinterest</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
function goToSlide(slideIndex) {
    const carousel = new bootstrap.Carousel(document.getElementById('propertyCarousel'));
    carousel.to(slideIndex);
    const thumbs = document.querySelectorAll('.thumb-gallery-img');
    thumbs.forEach((thumb, i) => {
      thumb.classList.toggle('border-primary', i===slideIndex);
      thumb.classList.toggle('border-light', i!==slideIndex);
    });
}
</script>
<div id="main-content" class="container pb-5 pt-4 mt-2">
<?php include('include/footer.php'); ?>