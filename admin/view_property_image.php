<?php
/**
 * View Property Images Gallery (Admin)
 * Displays and manages all images per property in the admin panel (Codecanyon Edition).
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
    <section class="content"></section></section>
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <div>
                            <h1 class="h3 mb-1 text-dark font-weight-bold">Property Images Gallery</h1>
                            <p class="text-muted mb-0">View and manage all property images in your portfolio.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="add_property_image.php" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i>Add Property Images
                            </a>
                            <a href="view_property.php" class="btn btn-outline-info">
                                <i class="fas fa-home me-1"></i>View Properties
                            </a>
                            <a href="dashboard.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Images Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                        <div class="card-header bg-gradient-primary text-white position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; padding: 1.5rem;">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div>
                                    <h4 class="mb-1 fw-bold">
                                        <i class="fas fa-images me-2"></i>Property Images Gallery
                                    </h4>
                                    <p class="mb-0 opacity-75 small">Manage and view all property images</p>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="exportImagesExcel" title="Export to Excel">
                                            <i class="fas fa-file-excel text-success"></i>
                                            <span class="d-none d-sm-inline ms-1">Excel</span>
                                        </button>
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="exportImagesPdf" title="Export to PDF">
                                            <i class="fas fa-file-pdf text-danger"></i>
                                            <span class="d-none d-sm-inline ms-1">PDF</span>
                                        </button>
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="exportImagesCsv" title="Export to CSV">
                                            <i class="fas fa-file-csv text-info"></i>
                                            <span class="d-none d-sm-inline ms-1">CSV</span>
                                        </button>
                                        <button class="btn btn-light btn-sm border-0 shadow-sm" id="printImagesTable" title="Print Table">
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
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white border-0">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <input type="text" class="form-control border-0 shadow-sm" id="globalSearchImages" placeholder="Search properties by title, type, or status..." style="border-radius: 0 8px 8px 0;">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select border-0 shadow-sm" id="statusFilterImages" style="border-radius: 8px;">
                                        <option value="">All Status</option>
                                        <option value="Available">Available</option>
                                        <option value="Sold">Sold</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex align-items-center">
                                        <small class="text-muted me-2">Images:</small>
                                        <span id="totalImagesCount" class="badge bg-primary">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="propertyImagesTable" class="table table-hover mb-0" style="font-size: 0.875rem;">
                                    <thead class="bg-gradient-dark text-white" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
                                        <tr>
                                            <th class="border-0 fw-bold py-3 px-4"><i class="fas fa-hashtag me-2"></i>S.No</th>
                                            <th class="border-0 fw-bold py-3 px-4"><i class="fas fa-home me-2"></i>Property Details</th>
                                            <th class="border-0 fw-bold py-3 px-4 text-center"><i class="fas fa-image me-2"></i>Gallery</th>
                                            <th class="border-0 fw-bold py-3 px-4 text-center"><i class="fas fa-cogs me-2"></i>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
include'include/config.php';





$query1 = mysqli_query($con, "SELECT * FROM images ORDER BY id DESC");

while($res = mysqli_fetch_array($query1)) {
    $image_id = $res['property_id'];
    $img1 = $res['image1'];
    $img2 = $res['image2'];
    $img3 = $res['image3'];
    $img4 = $res['image4'];

    // Count available images
    $imageCount = 0;
    if(!empty($img1) && file_exists("images/property_image/".$img1)) $imageCount++;
    if(!empty($img2) && file_exists("images/property_image/".$img2)) $imageCount++;
    if(!empty($img3) && file_exists("images/property_image/".$img3)) $imageCount++;
    if(!empty($img4) && file_exists("images/property_image/".$img4)) $imageCount++;

    $query = mysqli_query($con, "SELECT title, property_type, sold FROM property WHERE id='$image_id'");
    $res1 = mysqli_fetch_array($query);
    $property_title = $res1 ? $res1['title'] : 'Property Not Found';
    $property_type = $res1 ? $res1['property_type'] : '';
    $status_badge = $res1 && $res1['sold'] == 'yes' ? '<span class="badge bg-danger ms-1">Sold</span>' : '<span class="badge bg-success ms-1">Available</span>';

?>

                                        <tr class="border-bottom border-light">
                                            <td class="py-3 px-4 fw-semibold"><?php echo $i++; ?></td>
                                            <td class="py-3 px-4">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 fw-bold text-dark"><?php echo htmlspecialchars($property_title); ?></h6>
                                                    <div class="d-flex align-items-center gap-2 mb-1">
                                                        <small class="badge bg-primary-subtle text-primary px-2 py-1"><?php echo htmlspecialchars($property_type); ?></small>
                                                        <?php echo $status_badge; ?>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3 text-muted small">
                                                        <span><i class="fas fa-hashtag me-1"></i>ID: <?php echo htmlspecialchars($image_id); ?></span>
                                                        <span><i class="fas fa-images me-1"></i><?php echo $imageCount; ?> images</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                                    <?php if(!empty($img1) && file_exists("images/property_image/".$img1)): ?>
                                                        <div class="position-relative">
                                                            <img src="images/property_image/<?php echo htmlspecialchars($img1); ?>" alt="Image 1" class="rounded shadow-sm" width="60" height="45" style="object-fit: cover; cursor: pointer;" onclick="openImageModal('images/property_image/<?php echo htmlspecialchars($img1); ?>', 'Image 1 - <?php echo htmlspecialchars($property_title); ?>')">
                                                            <div class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 16px; height: 16px; font-size: 8px;">1</div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if(!empty($img2) && file_exists("images/property_image/".$img2)): ?>
                                                        <div class="position-relative">
                                                            <img src="images/property_image/<?php echo htmlspecialchars($img2); ?>" alt="Image 2" class="rounded shadow-sm" width="60" height="45" style="object-fit: cover; cursor: pointer;" onclick="openImageModal('images/property_image/<?php echo htmlspecialchars($img2); ?>', 'Image 2 - <?php echo htmlspecialchars($property_title); ?>')">
                                                            <div class="position-absolute bottom-0 end-0 bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 16px; height: 16px; font-size: 8px;">2</div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if(!empty($img3) && file_exists("images/property_image/".$img3)): ?>
                                                        <div class="position-relative">
                                                            <img src="images/property_image/<?php echo htmlspecialchars($img3); ?>" alt="Image 3" class="rounded shadow-sm" width="60" height="45" style="object-fit: cover; cursor: pointer;" onclick="openImageModal('images/property_image/<?php echo htmlspecialchars($img3); ?>', 'Image 3 - <?php echo htmlspecialchars($property_title); ?>')">
                                                            <div class="position-absolute bottom-0 end-0 bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 16px; height: 16px; font-size: 8px;">3</div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if(!empty($img4) && file_exists("images/property_image/".$img4)): ?>
                                                        <div class="position-relative">
                                                            <img src="images/property_image/<?php echo htmlspecialchars($img4); ?>" alt="Image 4" class="rounded shadow-sm" width="60" height="45" style="object-fit: cover; cursor: pointer;" onclick="openImageModal('images/property_image/<?php echo htmlspecialchars($img4); ?>', 'Image 4 - <?php echo htmlspecialchars($property_title); ?>')">
                                                            <div class="position-absolute bottom-0 end-0 bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 16px; height: 16px; font-size: 8px;">4</div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if($imageCount === 0): ?>
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 45px;">
                                                            <i class="fas fa-image text-muted"></i>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="update_property_image.php?id=<?php echo htmlspecialchars($image_id); ?>" class="btn btn-sm btn-outline-primary" title="Edit Images" data-bs-toggle="tooltip">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="deletePropertyImages(<?php echo htmlspecialchars($image_id); ?>, '<?php echo htmlspecialchars(addslashes($property_title)); ?>')" title="Delete Images" data-bs-toggle="tooltip">
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

            <!-- Image Modal -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Property Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="modalImage" src="" alt="Property Image" class="img-fluid rounded">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        // Initialize DataTable with advanced features
        const propertyImagesTable = $('#propertyImagesTable').DataTable({
            responsive: true,
            pageLength: 15,
            lengthMenu: [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
            order: [[0, 'asc']],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search property images...",
                lengthMenu: "_MENU_ entries per page",
                info: "Showing _START_ to _END_ of _TOTAL_ property images",
                infoEmpty: "No property images found",
                infoFiltered: "(filtered from _MAX_ total property images)",
                paginate: {
                    first: '<i class="fas fa-angle-double-left"></i>',
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>',
                    last: '<i class="fas fa-angle-double-right"></i>'
                }
            },
            columnDefs: [
                { orderable: false, targets: [2, 3] }, // Disable sorting on gallery and actions columns
                { width: "80px", targets: 0 }, // S.No column width
                { width: "120px", targets: 3 }, // Actions column width
                { className: "text-center", targets: [0, 2, 3] }, // Center align specific columns
                { className: "text-start", targets: [1] } // Left align title column
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

                // Update total images count
                const totalRows = propertyImagesTable.rows().count();
                $('#totalImagesCount').text(totalRows);
            }
        });

        // Custom search functionality
        $('#globalSearchImages').on('keyup', function() {
            propertyImagesTable.search($(this).val()).draw();
        });

        // Status filter
        $('#statusFilterImages').on('change', function() {
            const status = $(this).val();
            if (status === '') {
                propertyImagesTable.column(1).search('').draw(); // Clear search in title column
            } else {
                propertyImagesTable.column(1).search(status, true, false).draw();
            }
        });

        // Export button handlers
        $('#exportImagesExcel').on('click', function() {
            const data = propertyImagesTable.rows().data();
            exportToExcel(data, 'property_images');
        });

        $('#exportImagesPdf').on('click', function() {
            const data = propertyImagesTable.rows().data();
            exportToPDF(data, 'property_images');
        });

        $('#exportImagesCsv').on('click', function() {
            propertyImagesTable.button('.buttons-csv').trigger();
        });

        $('#printImagesTable').on('click', function() {
            propertyImagesTable.button('.buttons-print').trigger();
        });

        // Add loading state
        propertyImagesTable.on('processing.dt', function(e, settings, processing) {
            if (processing) {
                $('.table-responsive').append('<div class="loading-overlay"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>');
            } else {
                $('.loading-overlay').remove();
            }
        });
    });

    function openImageModal(imageSrc, title) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModalLabel').textContent = title;
        new bootstrap.Modal(document.getElementById('imageModal')).show();
    }

    function deletePropertyImages(id, title) {
        Swal.fire({
            title: 'Delete Property Images?',
            text: `Are you sure you want to delete all images for "${title}"? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete images!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'delete_property_image.php?x=' + id;
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

        const headers = ['S.No', 'Property Title', 'Type', 'Status', 'Images Count'];
        let csv = headers.join(',') + '\n';

        data.each(function(row) {
            const rowData = [];
            $(row).find('td').each(function(index) {
                if (index < 5) { // Only include first 5 columns
                    let text = $(this).text().trim();
                    // Clean up badges and formatting
                    text = text.replace(/badge.*/g, '').trim();
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


                                