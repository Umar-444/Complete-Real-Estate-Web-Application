<?php
/**
 * Update Property Page (Admin)
 * Allows updating any property entry, including image replacement, with input validation and secure SQL.
 * Includes CSRF protection. Part of Codecanyon Real Estate project.
 */
if (session_status() == PHP_SESSION_NONE) { session_start(); }
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
// Check if admin is logged in
if (!isset($_SESSION['email'])) {
    header('location:index.php');
    exit();
}
include('include/header.php');
include'include/config.php';
extract($_REQUEST);

$id=$_REQUEST['id'];

$query=mysqli_query($con,"select * from property where id='$id'");
$res=mysqli_fetch_array($query);

$id=$res['id'];
$img=$res['image'];
$sold_res=$res['sold'];


if(isset($submit))
{
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid CSRF token. Please reload the page and try again.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    } else {
        $maxSize = 5 * 1024 * 1024; // 5MB
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $file = $_FILES['file']['name'];
        if($file=="") {
            $query = "UPDATE property SET title=?,bedroom=?,hall=?,kichan=?,price=?,sqr_price=?,address=?,description=?,video=?,location=?,bathroom=?,balcony=?,property_owner=?,property_type=?,lot_size=?,land_area=?,sold=? WHERE id=?";
            if($stmt = $con->prepare($query)) {
                $stmt->bind_param('siiiiddsssssssssi', $title, $bedroom, $hall, $kichan, $price, $sqr_price, $add, $description, $video, $location, $bathroom, $balcony, $property_owner, $property_type, $lot_size, $land_area, $sold, $id);
                $stmt->execute();
                $stmt->close();
                $msg='<div class="alert alert-success alert-dismissible">Property Data Update successful.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                echo"<script>window.location.href='view_property.php';</script>";
            }
        } else {
            $fileTmp  = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileType = mime_content_type($fileTmp);
            $ext      = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
            if (!in_array($fileType, $allowedTypes) || !in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
                $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Only JPG, PNG, GIF, WEBP images are allowed.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            } elseif ($fileSize > $maxSize) {
                $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Image too large. Max 5MB.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
            } else {
                $newName = uniqid('prop_', true) . '.' . $ext;
                $target_dir = "images/property_image/";
                $target_file = $target_dir . $newName;
                if (move_uploaded_file($fileTmp, $target_file)) {
                    if ($img && file_exists($target_dir.$img)) { unlink($target_dir.$img); }
                    $query = "UPDATE property SET title=?,bedroom=?,hall=?,kichan=?,price=?,sqr_price=?,address=?,description=?,video=?,location=?,bathroom=?,balcony=?,property_owner=?,property_type=?,lot_size=?,land_area=?,sold=?,image=? WHERE id=?";
                    if($stmt=$con->prepare($query)) {
                        $stmt->bind_param('siiiiddssssssssssi', $title, $bedroom, $hall, $kichan, $price, $sqr_price, $add, $description, $video, $location, $bathroom, $balcony, $property_owner, $property_type, $lot_size, $land_area, $sold, $newName, $id);
                        $stmt->execute();
                        $stmt->close();
                        $msg='<div class="alert alert-success alert-dismissible">Property Data Update successful.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                        echo"<script>window.location.href='view_property.php';</script>";
                    }
                } else {
                    $msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Failed to upload image file.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
                }
            }
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

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="title" value="<?php echo htmlspecialchars($res['title']);?>" class="form-control">
                                                <label class="form-label">Property Title</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="property_owner" value="<?php echo htmlspecialchars($res['property_owner']);?>" class="form-control">
                                                <label class="form-label">Property Owner</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="property_type" value="<?php echo htmlspecialchars($res['property_type']);?>" class="form-control">
                                                <label class="form-label">Property Type</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="lot_size" value="<?php echo htmlspecialchars($res['lot_size']);?>" class="form-control">
                                                <label class="form-label">Property Lot Size</label>
                                            </div>
                                        </div>
                                     </div>

                                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                 <label style="color:gray;">Sold</label>
                                               
                                               <input name="sold" type="radio" <?php if($sold_res=='yes') echo 'checked';?> id="radio_36" value="yes" class="with-gap radio-col-light-blue" checked />
                                                <label for="radio_36">YES</label>

                                                <input name="sold" type="radio" <?php if($sold_res=='no') echo 'checked';?> id="radio_30" value="no" class="with-gap radio-col-red"  />
                                                <label for="radio_30">NO</label>
                                            </div>
                                        </div>
                                     </div>

                                     

                                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="text" name="land_area" value="<?php echo htmlspecialchars($res['land_area']);?>" class="form-control">
                                                <label class="form-label">Land area</label>
                                            </div>
                                        </div>
                                     </div>
                                    
                                    
                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="price" value="<?php echo htmlspecialchars($res['price']);?>" class="form-control">
                                                <label class="form-label">Price</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="sqr_price" value="<?php echo htmlspecialchars($res['sqr_price']);?>" class="form-control">
                                                <label class="form-label">Sqr Fit Price</label>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="add" value="<?php echo htmlspecialchars($res['address']);?>" class="form-control">
                                                <label class="form-label">Address</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea required name="description" class="form-control"><?php echo htmlspecialchars($res['description']);?></textarea>
                                                <label class="form-label">Description</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($res['video']);?>" required name="video">
                                                <label class="form-label">Add Video Link</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($res['location']);?>" required name="location">
                                                <label class="form-label">Add Location Link</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">                                       
                                     <div class="custom-file">
                                    <label class="form-label">Add Property Image</label>
                                    <input  name="file"  type="file" multiple />                                   
                                     </div>                                            
                                      </div>

                                      <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">                                       
                                     <div class="custom-file">
                                    <label class="form-label">Property Image</label>
                                    <img src="images/property_image/<?php echo htmlspecialchars($img);?>" width="200">                              
                                     </div>                                            
                                      </div>

                                <div class="header col-lg-12 col-md-6 col-sm-6 col-xs-12" style="text-align: center;">
                                                 
                               <h4 style="text-align: center;">Condition</h4>
                                                                                     
                                </div>



                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="kichan" value="<?php echo htmlspecialchars($res['kichan']);?>" class="form-control">
                                                <label class="form-label">Kitchan</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="hall" value="<?php echo htmlspecialchars($res['hall']);?>" class="form-control">
                                                <label class="form-label">Hall</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bedroom" value="<?php echo htmlspecialchars($res['bedroom']);?>" class="form-control">
                                                <label class="form-label">Bedroom</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="bathroom" value="<?php echo htmlspecialchars($res['bathroom']);?>" class="form-control">
                                                <label class="form-label">Bathroom</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required type="number" name="balcony" value="<?php echo htmlspecialchars($res['balcony']);?>" class="form-control">
                                                <label class="form-label">Balcony</label>
                                            </div>
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