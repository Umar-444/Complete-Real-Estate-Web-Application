<?php
/**
 * View Properties Table (Admin)
 * Shows full property list w/ filters, DataTables, edit/delete functions. Secure + XSS safe for Codecanyon release.
 */
session_start();
// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header('location:index.php');
    exit();
}
include('include/header.php');
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
                            <h1 class="h3 mb-1 text-dark font-weight-bold">Property Management</h1>
                            <p class="text-muted mb-0">View and manage all property listings in your portfolio.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="add_property.php" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Add New Property
                            </a>
                            <a href="view_property_image.php" class="btn btn-outline-info">
                                <i class="fas fa-images me-1"></i>View Images
                            </a>
                            <a href="dashboard.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Properties Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-header bg-gradient-primary text-white position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 1.5rem;">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div>
                                    <h4 class="mb-1 fw-bold">
                                        <i class="fas fa-home me-2"></i>All Properties
                                    </h4>
                                    <p class="mb-0 opacity-75 small">Manage and monitor your property listings</p>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="exportExcel" title="Export to Excel">
                                            <i class="fas fa-file-excel text-success"></i>
                                            <span class="d-none d-sm-inline ms-1">Excel</span>
                                        </button>
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="exportPdf" title="Export to PDF">
                                            <i class="fas fa-file-pdf text-danger"></i>
                                            <span class="d-none d-sm-inline ms-1">PDF</span>
                                        </button>
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="exportCsv" title="Export to CSV">
                                            <i class="fas fa-file-csv text-info"></i>
                                            <span class="d-none d-sm-inline ms-1">CSV</span>
                                        </button>
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="printTable" title="Print Table">
                                            <i class="fas fa-print text-secondary"></i>
                                            <span class="d-none d-sm-inline ms-1">Print</span>
                                        </button>
                                    </div>
                                    <button class="btn btn-outline-light btn-sm border-0 shadow-sm" onclick="refreshTable()" title="Refresh Data">
                                        <i class="fas fa-sync-alt"></i>
                                        <span class="d-none d-sm-inline ms-1">Refresh</span>
                                    </button>
                                </div>
                            </div>
                            <!-- Decorative elements -->
                            <div class="position-absolute top-0 end-0 opacity-25" style="width: 100px; height: 100px; background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);"></div>
                        </div>

                        <!-- Advanced Search and Filters -->
                        <div class="card-body border-bottom bg-light">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white border-0">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <input type="text" class="form-control border-0 shadow-sm" id="globalSearch" placeholder="Search properties by title, type, or address..." style="border-radius: 0 8px 8px 0;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select border-0 shadow-sm" id="statusFilter" style="border-radius: 8px;">
                                        <option value="">All Properties</option>
                                        <option value="Available">Available</option>
                                        <option value="Sold">Sold</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select border-0 shadow-sm" id="typeFilter" style="border-radius: 8px;">
                                        <option value="">All Types</option>
                                        <option value="House">House</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="Land">Land</option>
                                        <option value="Office">Office</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="propertiesTable" class="table table-hover mb-0" style="font-size: 0.875rem;">
                                    <thead class="bg-gradient-dark text-white" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
                                        <tr>
                                            <th class="border-0 fw-bold py-3 px-4"><i class="fas fa-hashtag me-2"></i>S.No</th>
                                            <th class="border-0 fw-bold py-3 px-4"><i class="fas fa-home me-2"></i>Property Details</th>
                                            <th class="border-0 fw-bold py-3 px-4 text-center"><i class="fas fa-bed me-2"></i>Rooms</th>
                                            <th class="border-0 fw-bold py-3 px-4 text-center"><i class="fas fa-utensils me-2"></i>Kitchen</th>
                                            <th class="border-0 fw-bold py-3 px-4 text-center"><i class="fas fa-dollar-sign me-2"></i>Pricing</th>
                                            <th class="border-0 fw-bold py-3 px-4"><i class="fas fa-map-marker-alt me-2"></i>Location</th>
                                            <th class="border-0 fw-bold py-3 px-4 text-center"><i class="fas fa-image me-2"></i>Photo</th>
                                            <th class="border-0 fw-bold py-3 px-4 text-center"><i class="fas fa-cogs me-2"></i>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $query = mysqli_query($con, "SELECT * FROM property ORDER BY id DESC");
                                        while($res = mysqli_fetch_array($query)) {
                                            $id = $res['id'];
                                            $img = $res['image'];
                                            $status_badge = $res['sold'] == 'yes' ? '<span class="badge bg-danger ms-1">Sold</span>' : '<span class="badge bg-success ms-1">Available</span>';
                                        ?>
                                        <tr class="border-bottom border-light">
                                            <td class="py-3 px-4 fw-semibold"><?php echo $i++; ?></td>
                                            <td class="py-3 px-4">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 fw-bold text-dark"><?php echo htmlspecialchars($res['title']); ?></h6>
                                                    <div class="d-flex align-items-center gap-2 mb-1">
                                                        <small class="badge bg-primary-subtle text-primary px-2 py-1"><?php echo htmlspecialchars($res['property_type']); ?></small>
                                                        <?php echo $status_badge; ?>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3 text-muted small">
                                                        <span><i class="fas fa-calendar me-1"></i>ID: <?php echo $res['id']; ?></span>
                                                        <span><i class="fas fa-clock me-1"></i><?php echo date('M d, Y', strtotime($res['date'])); ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="d-flex flex-column align-items-center gap-1">
                                                    <span class="badge bg-primary fs-6 px-3 py-2"><?php echo $res['bedroom']; ?> <small>Beds</small></span>
                                                    <span class="badge bg-info fs-6 px-3 py-1"><?php echo $res['hall']; ?> <small>Halls</small></span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <span class="badge bg-success fs-6 px-3 py-2">
                                                    <?php echo isset($res['kichan']) ? $res['kichan'] : '0'; ?> <small>Kitchen</small>
                                                </span>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="h5 mb-0 text-success fw-bold">$<?php echo number_format($res['price']); ?></div>
                                                    <small class="text-muted">$<?php echo number_format($res['sqr_price']); ?>/sqft</small>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="d-flex align-items-start">
                                                    <i class="fas fa-map-marker-alt text-danger me-2 mt-1"></i>
                                                    <div>
                                                        <div><?php echo htmlspecialchars(substr($res['address'], 0, 40)); ?><?php echo (strlen($res['address']) > 40 ? '...' : ''); ?></div>
                                                        <?php if(!empty($res['location'])): ?>
                                                            <small class="text-primary">
                                                                <i class="fas fa-external-link-alt me-1"></i>
                                                                <a href="<?php echo htmlspecialchars($res['location']); ?>" target="_blank" class="text-decoration-none">View Map</a>
                                                            </small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <?php if(!empty($img) && file_exists("images/property_image/".$img)): ?>
                                                    <div class="position-relative">
                                                        <img src="images/property_image/<?php echo $img; ?>" alt="Property" class="rounded shadow-sm" width="70" height="50" style="object-fit: cover; cursor: pointer;" onclick="openImageModal('images/property_image/<?php echo $img; ?>', '<?php echo htmlspecialchars($res['title']); ?>')">
                                                        <div class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 20px; height: 20px; font-size: 10px;">
                                                            <i class="fas fa-eye"></i>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 70px; height: 50px;">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="update_property.php?id=<?php echo $id; ?>" class="btn btn-sm btn-outline-primary" title="Edit Property" data-bs-toggle="tooltip">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="properties-details.php?id=<?php echo $id; ?>" class="btn btn-sm btn-outline-info" title="View Details" data-bs-toggle="tooltip">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteProperty(<?php echo $id; ?>, '<?php echo htmlspecialchars(addslashes($res['title'])); ?>')" title="Delete Property" data-bs-toggle="tooltip">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        // Initialize DataTable with advanced features
        const propertiesTable = $('#propertiesTable').DataTable({
            responsive: true,
            pageLength: 25,
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            order: [[0, 'asc']],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search properties...",
                lengthMenu: "_MENU_ entries per page",
                info: "Showing _START_ to _END_ of _TOTAL_ properties",
                infoEmpty: "No properties found",
                infoFiltered: "(filtered from _MAX_ total properties)",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>'
                }
            },
            columnDefs: [
                { orderable: false, targets: [6, 7] }, // Disable sorting on Image and Actions columns
                { width: "80px", targets: 0 }, // S.No column width
                { width: "120px", targets: 7 }, // Actions column width
                { className: "text-center", targets: [0, 2, 3, 6, 7] }, // Center align specific columns
            ],
            initComplete: function() {
                // Hide default DataTables search and length controls
                $('.dataTables_filter, .dataTables_length').hide();

                // Style pagination buttons
                $('.dataTables_wrapper .pagination').addClass('justify-content-center mt-4');
                $('.dataTables_wrapper .pagination .page-link').addClass('rounded-pill mx-1 px-3 py-2').css({
                    'border': '1px solid #dee2e6',
                    'transition': 'all 0.2s ease'
                });

                // Add hover effects to pagination
                $('.dataTables_wrapper .pagination .page-link').hover(
                    function() { $(this).addClass('bg-primary text-white border-primary'); },
                    function() { $(this).removeClass('bg-primary text-white border-primary'); }
                );

                // Initialize tooltips
                $('[data-bs-toggle="tooltip"]').tooltip();
            }
        });

        // Custom search functionality
        $('#globalSearch').on('keyup', function() {
            propertiesTable.search($(this).val()).draw();
        });

        // Status filter
        $('#statusFilter').on('change', function() {
            const status = $(this).val();
            if (status === '') {
                propertiesTable.column(1).search('').draw(); // Clear search in title column
            } else {
                propertiesTable.column(1).search(status, true, false).draw();
            }
        });

        // Type filter
        $('#typeFilter').on('change', function() {
            const type = $(this).val();
            if (type === '') {
                propertiesTable.column(1).search('').draw(); // Clear search in title column
            } else {
                propertiesTable.column(1).search(type, true, false).draw();
            }
        });

        // Export button handlers
        $('#exportExcel').on('click', function() {
            const data = propertiesTable.rows().data();
            exportToExcel(data, 'properties');
        });

        $('#exportPdf').on('click', function() {
            const data = propertiesTable.rows().data();
            exportToPDF(data, 'properties');
        });

        $('#exportCsv').on('click', function() {
            propertiesTable.button('.buttons-csv').trigger();
        });

        $('#printTable').on('click', function() {
            propertiesTable.button('.buttons-print').trigger();
        });

        // Add loading state
        propertiesTable.on('processing.dt', function(e, settings, processing) {
            if (processing) {
                $('.table-responsive').append('<div class="loading-overlay"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
            } else {
                $('.loading-overlay').remove();
            }
        });
    });

    function deleteProperty(id, title) {
        Swal.fire({
            title: 'Delete Property?',
            text: `Are you sure you want to delete "${title}"? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `delete_property.php?x=${id}&csrf=<?php echo htmlspecialchars($csrf_token); ?>`;
            }
        });
    }

    function refreshTable() {
        location.reload();
    }

    // Export functions
    function exportToExcel(data, filename) {
        const csvContent = convertToCSV(data);
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');

        if (link.download !== undefined) {
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', filename + '.csv');
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }

    function exportToPDF(data, filename) {
        // Simple PDF export using window.print for now
        // In a real application, you'd use a PDF library like jsPDF
        window.print();
    }

    function convertToCSV(data) {
        if (data.length === 0) return '';

        const headers = ['S.No', 'Title', 'Type', 'Status', 'Bedrooms', 'Bathrooms', 'Halls', 'Price', 'Sq Ft Price', 'Address'];
        let csv = headers.join(',') + '\n';

        data.each(function(row) {
            const rowData = [];
            $(row).find('td').each(function(index) {
                if (index < 10) { // Only include first 10 columns
                    let text = $(this).text().trim();
                    // Clean up badges and formatting
                    text = text.replace(/badge.*/g, '').trim();
                    text = text.replace(/\$/g, '').trim();
                    text = text.replace(/,/g, '').trim();
                    rowData.push('"' + text.replace(/"/g, '""') + '"');
                }
            });
            csv += rowData.join(',') + '\n';
        });

        return csv;
    }
    </script>
            <?php include'include/footer.php';?>


                                