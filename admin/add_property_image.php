<?php
/**
 * Add Property Gallery Images (Admin)
 * Uploads and assigns up to 4 images to a property, with full validation and secure insert. For Codecanyon Real Estate CMS.
 */
session_start();
// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header('location:index.php');
    exit();
}
include('include/header.php');
extract($_REQUEST);
include'include/config.php';
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
if(isset($submit))
{
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $msg='<div class="alert alert-danger alert-dismissible">Invalid CSRF token. Please reload and try again.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    } else {
        $maxSize = 5 * 1024 * 1024; // 5MB
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

        function process_upload($fileField) {
            global $maxSize, $allowedTypes;
            if (!isset($_FILES[$fileField]) || $_FILES[$fileField]['error'] != 0) return '';
            $fileTmp = $_FILES[$fileField]['tmp_name'];
            $fileSize = $_FILES[$fileField]['size'];
            $fileType = mime_content_type($fileTmp);
            $ext = strtolower(pathinfo($_FILES[$fileField]['name'], PATHINFO_EXTENSION));
            if (!in_array($fileType, $allowedTypes) || !in_array($ext, ['jpg','jpeg','png','gif','webp'])) return '';
            if ($fileSize > $maxSize) return '';
            $fname = uniqid('gal_', true) . '.' . $ext;
            $target_dir = "images/property_image/";
            $target_file = $target_dir . $fname;
            if (move_uploaded_file($fileTmp, $target_file)) return $fname;
            return '';
        }
        $f1 = process_upload('file');
        $f2 = process_upload('file1');
        $f3 = process_upload('file2');
        $f4 = process_upload('file3');
        $query = "INSERT INTO images (image, image1, image2, image3, property_id) VALUES (?, ?, ?, ?, ?)";
        if($stmt = $con->prepare($query)) {
            $stmt->bind_param('ssssi', $f1, $f2, $f3, $f4, $property_id);
            $stmt->execute();
            $stmt->close();
            $msg='<div class="alert alert-success alert-dismissible">Image Upload successful.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        } else {
            $msg='<div class="alert alert-danger alert-dismissible">Image Upload failed (DB error).<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        }
    }
}

?>  
    <!-- Header -->
    
    <section>
       
       <!-- Left Sidebar -->
<?php include('include/sidebar.php');?>
        <!-- #END# Left Sidebar -->
        <section class="content">
        <div class="container-fluid">
            <?php echo @$msg;?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="text-align: center;">
                                Add Property
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-6">
                                        <select class="form-control show-tick" name="property_id">
                                            <option disabled selected>--Select Room Title--</option>
                                            <?php
                                            $sel=mysqli_query($con,"select * from property");
                                            while($res=mysqli_fetch_array($sel))
                                            {
                                            ?>

                                            <option value="<?php echo htmlspecialchars($res['id']); ?>"><?php echo htmlspecialchars($res['title']); ?></option>  
                                           
                                           <?php  }  ?>

                                        </select>  


                             
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="file" type="file" multiple />
                                </div>
                             
                             </div>


                             <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="file1" type="file" multiple />
                                </div>
                             
                             </div>

                             <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="file2" type="file" multiple />
                                </div>
                             
                             </div>


                             <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                       
                                      <div class="dz-message">
                                   
                                    <h3>Click to Image upload.</h3>
                                    
                                </div>
                                <div>
                                    <input required name="file3" type="file" multiple />
                                </div>
                             
                             </div>


                                

                                    

                                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">
                             
                                     
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" value="Submit">
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
            <!-- Select Plugin Js -->
 
