<?php
/**
 * Add Property Page (Admin)
 * Handles new property entry with full validation, file upload, and secure DB insert.
 * For Codecanyon Real Estate full-stack system.
 */
session_start();
// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header('location:index.php');
    exit();
}
include('include/header.php');
// Handle form submission
$msg = '';
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

if(isset($_POST['submit'])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid CSRF token. Please reload the page and try again.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    } else {
        // Get form data
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $bedroom = (int)$_POST['bedroom'];
        $hall = (int)$_POST['hall'];
        $kitchan = (int)$_POST['kitchan'];
        $bathroom = (int)$_POST['bathroom'];
        $balcony = (int)$_POST['balcony'];
        $price = (float)$_POST['price'];
        $sqr_price = (float)$_POST['sqr_price'];
        $add = mysqli_real_escape_string($con, $_POST['add']);
        $video = mysqli_real_escape_string($con, $_POST['video']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $location = mysqli_real_escape_string($con, $_POST['location']);
        $property_owner = mysqli_real_escape_string($con, $_POST['property_owner']);
        $property_type = mysqli_real_escape_string($con, $_POST['property_type']);
        $lot_size = mysqli_real_escape_string($con, $_POST['lot_size']);
        $sold = isset($_POST['sold']) ? $_POST['sold'] : 'No';
        $land_area = mysqli_real_escape_string($con, $_POST['land_area']);

        // Handle file upload
        $file = '';
        $maxSize = 5 * 1024 * 1024; // 5MB
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $fileTmp  = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileType = mime_content_type($fileTmp);
            $ext      = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
            // Validate type and extension
            if (!in_array($fileType, $allowedTypes) || !in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
                $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Only JPG, PNG, GIF, WEBP images are allowed.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';
            } elseif ($fileSize > $maxSize) {
                $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Image is too large. Max allowed size is 5MB.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';
            } else {
                // Randomize filename
                $newName = uniqid('prop_', true) . '.' . $ext;
                $target_dir = "images/property_image/";
                $target_file = $target_dir . $newName;
                if (move_uploaded_file($fileTmp, $target_file)) {
                    $file = $newName;
                    // Insert into database securely (keep rest of insert logic unchanged for this commit)
                    // Keep logic to set $file to randomized uploaded image name if upload succeeded, else do not proceed with DB insert
                    if ($file) { // Only insert if there is a good, validated file
                        $query = "INSERT INTO property (title, bedroom, hall, kitchan, bathroom, balcony, price, sqr_price, address, video, image, description, location, property_owner, property_type, lot_size, sold, land_area, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
                        if ($stmt = $con->prepare($query)) {
                            $stmt->bind_param('siiiiiddssssssssss', $title, $bedroom, $hall, $kitchan, $bathroom, $balcony, $price, $sqr_price, $add, $video, $file, $description, $location, $property_owner, $property_type, $lot_size, $sold, $land_area);
                            if($stmt->execute()) {
                                $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check-circle me-2"></i><strong>Success!</strong> Property added successfully.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                            } else {
                                $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-circle me-2"></i><strong>Error!</strong> Failed to add property to database: ' . htmlspecialchars($stmt->error) . '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                            }
                            $stmt->close();
                        } else {
                            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-circle me-2"></i>Failed to prepare the statement.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                        }
                    }
                } else {
                    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>Error!</strong> Failed to upload image file.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>';
                }
            }
        } else {
            $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>Error!</strong> Please select an image file.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>';
        }
    }
}

?>
    <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->

    <section class="content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <div>
                            <h1 class="h3 mb-1 text-dark font-weight-bold">Add New Property</h1>
                            <p class="text-muted mb-0">Fill in the details below to add a new property to your portfolio.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="view_property.php" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-list me-1"></i>View Properties
                            </a>
                            <a href="dashboard.php" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert Messages -->
            <?php if($msg): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <?php echo $msg; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Property Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                <i class="fas fa-home me-2 text-primary"></i>
                                Property Information
                            </h5>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                                <div class="row g-3">
                                    <!-- Basic Information -->
                                    <div class="col-md-6">
                                        <label for="title" class="form-label fw-semibold">Property Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter property title" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="property_owner" class="form-label fw-semibold">Property Owner <span class="text-danger">*</span></label>
                                        <input type="text" name="property_owner" id="property_owner" class="form-control" placeholder="Enter property owner name" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="property_type" class="form-label fw-semibold">Property Type <span class="text-danger">*</span></label>
                                        <select name="property_type" id="property_type" class="form-select" required>
                                            <option value="">Select property type</option>
                                            <option value="House">House</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Villa">Villa</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Land">Land</option>
                                            <option value="Office">Office</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="lot_size" class="form-label fw-semibold">Lot Size</label>
                                        <input type="text" name="lot_size" id="lot_size" class="form-control" placeholder="e.g., 5000 sqft">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Property Status <span class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sold" id="sold_no" value="No" checked>
                                            <label class="form-check-label" for="sold_no">Available</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sold" id="sold_yes" value="yes">
                                            <label class="form-check-label" for="sold_yes">Sold</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="land_area" class="form-label fw-semibold">Land Area</label>
                                        <input type="text" name="land_area" id="land_area" class="form-control" placeholder="e.g., 5000 sqft">
                                    </div>

                                    <!-- Pricing Information -->
                                    <div class="col-md-6">
                                        <label for="price" class="form-label fw-semibold">Property Price <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" name="price" id="price" class="form-control" placeholder="Enter property price" min="0" step="0.01" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="sqr_price" class="form-label fw-semibold">Price per Sq Ft <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" name="sqr_price" id="sqr_price" class="form-control" placeholder="Price per square foot" min="0" step="0.01" required>
                                        </div>
                                    </div>

                                    <!-- Location & Media -->
                                    <div class="col-md-6">
                                        <label for="add" class="form-label fw-semibold">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="add" id="add" class="form-control" placeholder="Enter full address" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="location" class="form-label fw-semibold">Location Link</label>
                                        <input type="url" name="location" id="location" class="form-control" placeholder="https://maps.google.com/...">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="video" class="form-label fw-semibold">Video Link</label>
                                        <input type="url" name="video" id="video" class="form-control" placeholder="https://youtube.com/...">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="file" class="form-label fw-semibold">Property Image <span class="text-danger">*</span></label>
                                        <input type="file" name="file" id="file" class="form-control" accept="image/*" required>
                                        <div class="form-text">Supported formats: JPG, PNG, GIF. Max size: 5MB</div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-12">
                                        <label for="description" class="form-label fw-semibold">Property Description <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter detailed property description" required></textarea>
                                    </div>

                                <!-- Property Features -->
                                <div class="col-12 mt-4">
                                    <h5 class="text-primary mb-3">
                                        <i class="fas fa-building me-2"></i>
                                        Property Features
                                    </h5>
                                    <hr class="mb-4">
                                </div>

                                    <div class="col-md-6">
                                        <label for="bedroom" class="form-label fw-semibold">Bedrooms <span class="text-danger">*</span></label>
                                        <input type="number" name="bedroom" id="bedroom" class="form-control" placeholder="Number of bedrooms" min="0" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="bathroom" class="form-label fw-semibold">Bathrooms <span class="text-danger">*</span></label>
                                        <input type="number" name="bathroom" id="bathroom" class="form-control" placeholder="Number of bathrooms" min="0" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="hall" class="form-label fw-semibold">Halls <span class="text-danger">*</span></label>
                                        <input type="number" name="hall" id="hall" class="form-control" placeholder="Number of halls" min="0" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="kitchan" class="form-label fw-semibold">Kitchens <span class="text-danger">*</span></label>
                                        <input type="number" name="kitchan" id="kitchan" class="form-control" placeholder="Number of kitchens" min="0" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="balcony" class="form-label fw-semibold">Balconies <span class="text-danger">*</span></label>
                                        <input type="number" name="balcony" id="balcony" class="form-control" placeholder="Number of balconies" min="0" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12 mt-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="dashboard.php" class="btn btn-secondary">
                                                <i class="fas fa-times me-1"></i>Cancel
                                            </a>
                                            <button type="submit" name="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-1"></i>Add Property
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include'include/footer.php';?>