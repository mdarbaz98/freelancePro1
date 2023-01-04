<?php
session_start();
$imgBaseUrl = 'https://druggist.b-cdn.net';
if (!isset($_SESSION['username']) && !isset($_SESSION['loginStatus'])) {
    header('location: login.php');
}
include('include/db.php');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Druggist Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <base href="<?php echo $actual_link ?>/freelancePro1/xp-admin/">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!--table data fetch link-->
    <!-- datepicker css cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap Css -->
    <link href="assets/css/login.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify@4.9.8/dist/tagify.css">
    <!-- <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"> -->
    <link href="assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="assets/libs/@chenfengyuan/datepicker/datepicker.min.css"> -->
    <!-- <link rel="stylesheet" href="https://www.jqueryscript.net/demo/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/jquery.datetimepicker.css"> -->
    <link rel='stylesheet' href='https://transloadit.edgly.net/releases/uppy/v1.0.0/uppy.min.css'>
<style>
    @media only screen and (min-width: 820px){
    .uppy-Dashboard-inner {
        height: 297px !important;
    }
}
.uppy-DashboardAddFiles-info {
    display: none !important;
}

.img-checkbox img{
    width: 150px;
    height: 150px;
    object-fit: contain;
}
.tox.tox-tinymce.tox-tinymce--toolbar-sticky-off {
    height: 300px !important;
}
#memberAlert{
    display:none;
}
/* input:checked + label {
    border: solid;
  } */
</style>
</head>

<body data-sidebar="dark">
    <div class="modal fade addCategory" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content edit-cta-box p-4">
                <div class="col-lg-12 categoryForm">
                    <h5 class="text-center mb-4">Add Cetegory</h5>
                    <form id="addCategoriesFromPost" method="POST">
                        <div class="row input-group-datatable">
                            <div class="col-4 mb-4 input-custom">
                                <input type="hidden" name="btn" value="addCategories">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" placeholder="Post title" id="name" class="form-control">
                                <span class="error nameError"></span>
                            </div>
                            <div class="col-4 mb-4 input-custom">
                                <label for="name">Category Slug</label>
                                <input type="text" name="slug" id="slug" placeholder="Enter Slug" class="form-control">
                                <span class="error slugError"></span>
                            </div>
                            <div class="col-4 mb-4 input-custom">
                                <label for="name">Parent Category</label>
                                <select class="form-control select2" name="parentCategory" id="parentCategory">
                                    <option value="0">Select Parent Category</option>
                                    <?php
                                    $getCategory = $conn->prepare('SELECT * FROM categories WHERE parentCategory = ?');
                                    $getCategory->execute([0]);
                                    while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['name']); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="error parentCategoryError"></span>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="name">Description</label>
                                <textarea class="form-control" name="description" id="description" cols=" 5" rows="3" placeholder="Enter Description" required></textarea>
                                <span class="error descriptionError"></span>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary mt-3 mt-lg-0 add-btn" name="cat-btn" id="cat-btn" value="Add Category">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade userEditModal" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content edit-user-box p-4">
                    
                </div>
            </div>
    </div>
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-light.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="19">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <div class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php if(isset($_SESSION['fname'])){ echo $_SESSION['fname']; }?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                <span key="t-profile">Profile</span></a>
                                            <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                        </div>
                    </div>

                    <!-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="bx bx-cog bx-spin"></i>
                        </button>
                    </div> -->

                </div>
            </div>
        </header>