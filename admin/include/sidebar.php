     <?php
// Session should be started in the main files before including this sidebar
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$name = '';

if (!empty($email)) {
    $query = mysqli_query($con, "select * from admin where email='$email'");
    if ($query) {
        $res1 = mysqli_fetch_array($query);
        $name = $res1['name'] ?? '';
    }
}
?>

<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="images/user.png" width="60" height="60" alt="User" class="rounded-circle border border-3 border-white border-opacity-25" />
        </div>
        <div class="info-container">
            <div class="name dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-2"></i>
                    <span><?php echo $name ?: 'Admin';?></span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <ul class="dropdown-menu shadow">
                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="fas fa-user me-2"></i>Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="fas fa-cog me-2"></i>Settings</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="fas fa-question-circle me-2"></i>Help</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</a></li>
                </ul>
            </div>
            <div class="email text-white-50">
                <i class="fas fa-envelope me-1"></i><?php echo $email ?: 'admin@example.com';?>
            </div>
        </div>
    </div>
    <!-- #User Info -->

    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                <a href="dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'add_property.php' ? 'active' : ''; ?>">
                <a href="add_property.php">
                    <i class="fas fa-plus-circle"></i>
                    <span>Add Property</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'view_property.php' ? 'active' : ''; ?>">
                <a href="view_property.php">
                    <i class="fas fa-list"></i>
                    <span>View Properties</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'add_property_image.php' ? 'active' : ''; ?>">
                <a href="add_property_image.php">
                    <i class="fas fa-images"></i>
                    <span>Add Images</span>
                </a>
            </li>

            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'view_property_image.php' ? 'active' : ''; ?>">
                <a href="view_property_image.php">
                    <i class="fas fa-image"></i>
                    <span>View Images</span>
                </a>
            </li>

            <li class="header" style="margin-top: 20px;">SYSTEM</li>

            <li>
                <a href="javascript:void(0);" onclick="showNotification('Feature coming soon!', 'info')">
                    <i class="fas fa-chart-bar"></i>
                    <span>Analytics</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" onclick="showNotification('Feature coming soon!', 'info')">
                    <i class="fas fa-users-cog"></i>
                    <span>User Management</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" onclick="showNotification('Feature coming soon!', 'info')">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->

    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; <?php echo date('Y'); ?> <a href="../index.php" target="_blank" class="text-decoration-none">Real Estate Portal</a>
        </div>
        <div class="version">
            <b>Version:</b> 2.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>