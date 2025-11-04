<?php
session_start();
// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header('location:index.php');
    exit();
}
include('include/header.php');
?>
    <!-- Header -->
	
    <section>
       
	   <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->

   
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php
            // Get statistics from database
            $totalProperties = mysqli_num_rows(mysqli_query($con, "SELECT * FROM property"));
            $totalImages = mysqli_num_rows(mysqli_query($con, "SELECT * FROM images"));
            $soldProperties = mysqli_num_rows(mysqli_query($con, "SELECT * FROM property WHERE sold='yes'"));
            $availableProperties = $totalProperties - $soldProperties;

            // Calculate estimated revenue from sold properties
            $revenueQuery = mysqli_query($con, "SELECT SUM(price) as total FROM property WHERE sold='yes'");
            $revenue = mysqli_fetch_array($revenueQuery)['total'] ?? 0;
            ?>

            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="h3 mb-1 text-dark font-weight-bold">Dashboard Overview</h1>
                            <p class="text-muted mb-0">Welcome back! Here's what's happening with your real estate portal.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-download me-2"></i>Export Report
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Property
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-5">
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card fade-in">
                        <div class="icon" style="background: linear-gradient(135deg, #667eea, #764ba2);">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="stats-number" id="totalProperties"><?php echo $totalProperties; ?></div>
                        <div class="stats-title">Total Properties</div>
                        <div class="stats-change positive">
                            <i class="fas fa-arrow-up"></i> +12.5% from last month
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card fade-in">
                        <div class="icon" style="background: linear-gradient(135deg, #10b981, #34d399);">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-number" id="totalUsers"><?php echo $totalImages * 3; ?></div>
                        <div class="stats-title">Property Images</div>
                        <div class="stats-change positive">
                            <i class="fas fa-arrow-up"></i> +8.2% from last month
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card fade-in">
                        <div class="icon" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="stats-number" id="totalDeals"><?php echo $soldProperties; ?></div>
                        <div class="stats-title">Sold Properties</div>
                        <div class="stats-change positive">
                            <i class="fas fa-arrow-up"></i> +15.3% from last month
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card fade-in">
                        <div class="icon" style="background: linear-gradient(135deg, #ef4444, #f87171);">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stats-number" id="totalRevenue">$<?php echo number_format($revenue); ?></div>
                        <div class="stats-title">Total Revenue</div>
                        <div class="stats-change negative">
                            <i class="fas fa-arrow-down"></i> -2.4% from last month
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Analytics -->
            <div class="row g-4 mb-5">
                <div class="col-xl-8">
                    <div class="card slide-up">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-chart-line me-2 text-primary"></i>
                                Property Views Analytics
                            </h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Last 30 Days
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                    <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
                                    <li><a class="dropdown-item" href="#">Last 90 Days</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="propertyViewsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card slide-up">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-chart-pie me-2 text-success"></i>
                                Property Types
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="propertyTypesChart"></canvas>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-sm text-muted">Apartments</span>
                                    <span class="badge bg-primary">45%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-sm text-muted">Houses</span>
                                    <span class="badge bg-success">30%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-sm text-muted">Commercial</span>
                                    <span class="badge bg-warning">15%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-sm text-muted">Land</span>
                                    <span class="badge bg-info">10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities and Quick Actions -->
            <div class="row g-4">
                <div class="col-xl-6">
                    <div class="card slide-up">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-clock me-2 text-info"></i>
                                Recent Activities
                            </h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3" style="background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-1 fw-semibold">New property added</p>
                                            <small class="text-muted">Luxury Villa in Downtown - $2.5M</small>
                                        </div>
                                        <small class="text-muted">2h ago</small>
                                    </div>
                                </div>
                                <div class="list-group-item px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3" style="background: linear-gradient(135deg, #10b981, #34d399); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-1 fw-semibold">New user registered</p>
                                            <small class="text-muted">john.doe@example.com</small>
                                        </div>
                                        <small class="text-muted">4h ago</small>
                                    </div>
                                </div>
                                <div class="list-group-item px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-3" style="background: linear-gradient(135deg, #f59e0b, #fbbf24); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-handshake"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-1 fw-semibold">Property sold</p>
                                            <small class="text-muted">Modern Apartment - $450K</small>
                                        </div>
                                        <small class="text-muted">1d ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card slide-up">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-tasks me-2 text-warning"></i>
                                Quick Actions
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <a href="add_property.php" class="btn btn-outline-primary w-100 p-3 h-auto d-flex align-items-center">
                                        <div class="text-start">
                                            <i class="fas fa-home fa-2x mb-2"></i>
                                            <div class="fw-semibold">Add Property</div>
                                            <small class="text-muted">List a new property</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="view_property.php" class="btn btn-outline-success w-100 p-3 h-auto d-flex align-items-center">
                                        <div class="text-start">
                                            <i class="fas fa-list fa-2x mb-2"></i>
                                            <div class="fw-semibold">View Properties</div>
                                            <small class="text-muted">Manage listings</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="add_property_image.php" class="btn btn-outline-info w-100 p-3 h-auto d-flex align-items-center">
                                        <div class="text-start">
                                            <i class="fas fa-images fa-2x mb-2"></i>
                                            <div class="fw-semibold">Add Images</div>
                                            <small class="text-muted">Upload photos</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="view_property_image.php" class="btn btn-outline-warning w-100 p-3 h-auto d-flex align-items-center">
                                        <div class="text-start">
                                            <i class="fas fa-chart-bar fa-2x mb-2"></i>
                                            <div class="fw-semibold">Analytics</div>
                                            <small class="text-muted">View reports</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include'include/footer.php';?>
	
    