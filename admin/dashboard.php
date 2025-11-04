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
	
   
    <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->

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

            <!-- Dashboard styles are now in css/style.css -->

            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <div>
                            <h1 class="h3 mb-1 text-dark font-weight-bold">Dashboard Overview</h1>
                            <p class="text-muted mb-0">Welcome back! Here's what's happening with your real estate portal.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary btn-sm" onclick="exportReport()">
                                <i class="fas fa-download me-1"></i>Export
                            </button>
                            <a href="add_property.php" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-1"></i>Add Property
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-5">
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card fade-in">
                        <div class="icon" style="background: linear-gradient(135deg, #667eea, #185cff);">
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
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-chart-line me-2 text-primary"></i>
                                Property Views Analytics
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="propertyViewsChart" height="300"></canvas>
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
                                <canvas id="propertyTypesChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities and Quick Actions -->
            <div class="row g-4">
                <div class="row g-4">
                    <div class="col-xl-6 d-flex flex-column">
                        <div class="card slide-up h-100 d-flex flex-column">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-clock me-2 text-info"></i>
                                    Recent Activities
                                </h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                            </div>
                            <div class="card-body flex-grow-1">
                                <div class="activity-list">
                                    <div class="activity-item d-flex align-items-start mb-3 pb-3 border-bottom border-light">
                                        <div class="activity-icon me-3">
                                            <div class="avatar" style="background: linear-gradient(135deg, #667eea, #185cff);">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1 fw-semibold">New property added</h6>
                                                    <p class="mb-1 text-muted small">Luxury Villa in Downtown - $2.5M</p>
                                                </div>
                                                <small class="text-muted">2h ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity-item d-flex align-items-start mb-3 pb-3 border-bottom border-light">
                                        <div class="activity-icon me-3">
                                            <div class="avatar" style="background: linear-gradient(135deg, #10b981, #34d399);">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1 fw-semibold">New user registered</h6>
                                                    <p class="mb-1 text-muted small">john.doe@example.com</p>
                                                </div>
                                                <small class="text-muted">4h ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity-item d-flex align-items-start">
                                        <div class="activity-icon me-3">
                                            <div class="avatar" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                                                <i class="fas fa-handshake"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1 fw-semibold">Property sold</h6>
                                                    <p class="mb-1 text-muted small">Modern Apartment - $450K</p>
                                                </div>
                                                <small class="text-muted">1d ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex flex-column">
                        <div class="card slide-up h-100 d-flex flex-column">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-tasks me-2 text-warning"></i>
                                    Quick Actions
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-sm-6 col-lg-6">
                                        <a href="add_property.php" class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <div class="action-content">
                                                <h6 class="action-title">Add Property</h6>
                                                <p class="action-desc">List a new property</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <a href="view_property.php" class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-list"></i>
                                            </div>
                                            <div class="action-content">
                                                <h6 class="action-title">View Properties</h6>
                                                <p class="action-desc">Manage listings</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <a href="add_property_image.php" class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-images"></i>
                                            </div>
                                            <div class="action-content">
                                                <h6 class="action-title">Add Images</h6>
                                                <p class="action-desc">Upload photos</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <a href="#" class="action-card" onclick="showNotification('Analytics feature coming soon!', 'info')">
                                            <div class="action-icon">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                            <div class="action-content">
                                                <h6 class="action-title">Analytics</h6>
                                                <p class="action-desc">View reports</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include'include/footer.php';?>
    