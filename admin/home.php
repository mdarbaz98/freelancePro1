<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row"><!-- start page title -->
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                    </div>
                </div>
            </div><!-- end page title -->
            <div class="row">
                <div class="col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <!-- <p>Skote Dashboard</p> -->
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-sm-4">
                                <?php if(isset($_SESSION['admin_is_login_id']) && !empty($_SESSION['admin_is_login_id'])) {
                                        $id=$_SESSION['admin_is_login_id']; } ?>
                                <?php
                                    $stmt_post_author = $conn->prepare("SELECT count(*) FROM `post`");
                                    $stmt_post_author->execute();
                                    $total_rows_post = $stmt_post_author->fetchColumn();

                                  


                                ?>
                                </div>

                                <div class="col-sm-8">
                                    <div class="pt-4">

                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="font-size-18 mb-0"><b><?php echo $total_rows_post ?></b></h5>
                                                <p class="text-muted mb-0"><strong>Post</strong></p>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="font-size-15"><b>1245</b></h5>
                                                <p class="text-muted mb-0"><strong>Comments</strong></p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <?php
                                            $stmt_total = $conn->prepare("SELECT count(*) FROM `post` WHERE status=1");
                                            $stmt_total->execute();
                                            $total_rows = $stmt_total->fetchColumn();
                                            ?>
                                            <p class="text-muted fw-medium"><strong>Total Post</strong></p>
                                            <h4 class="mb-0"><?php echo $total_rows ?></h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                <span class="avatar-title">
                                                    <i class="bx bx-copy-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium"><strong>Total Comments</strong></p>
                                            <h4 class="mb-0">2,748</h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center ">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-archive-in font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                        <?php
                                            $stmt_total_author = $conn->prepare("SELECT count(*) FROM `post` WHERE status=1");
                                            $stmt_total_author->execute();
                                            $total_rows_author = $stmt_total_author->fetchColumn();
                                            ?>
                                            <p class="text-muted fw-medium"><strong>Users</strong></p>
                                        
                                            <h4 class="mb-0"><?php echo $total_rows_author ?></h4>
                                        </div>

                                        <div class="flex-shrink-0 align-self-center">
                                            <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Post Uploaded</h4>
                            </div>
                            <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row" style="display:none;">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Posts</h4>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check font-size-16 align-middle">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                                    <label class="form-check-label" for="transactionCheck01"></label>
                                                    
                                                </div>
                                            </th>
                                            <th class="align-middle">Image</th>
                                            <th class="align-middle">Author</th>
                                            <th class="align-middle">Title</th>
                                            <th class="align-middle">Date</th>
                                            <th class="align-middle">Categories</th>
                                            <th class="align-middle">Reviews</th>
                                            <th class="align-middle">Tags</th>

                                            <th class="align-middle">View Details</th>
                                            <!-- <th class="align-middle">SEO Description</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="t-row">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                    <label class="form-check-label" for="transactionCheck02"></label>
                                                </div>
                                            </td>
                                            <td class="dash-img">
                                                <img src="https://practicalanxietysolutions.com/wp-content/uploads/2021/12/Is-Speed-Walking-Real-300x200.jpg" alt="" class="b-img">
                                            </td>
                                            <td class="a-name">
                                                <h3 class="h-name">Neal Matthews</h2>
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">What is Sports Psychology?</p>
                                            </td>
                                            <td class="t-date">
                                                07 Oct, 2019
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">Sports Psychology</p>
                                            </td>
                                            <td>
                                                <ul class="ratingstar">
                                                <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                </ul>
                                            </td>

                                            <td class="tname">John</td>



                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <tr class="t-row">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck03">
                                                    <label class="form-check-label" for="transactionCheck03"></label>
                                                </div>
                                            </td>
                                            <td class="dash-img">
                                                <img src="https://practicalanxietysolutions.com/wp-content/uploads/2021/11/05-6-300x200.jpg" alt="" class="b-img">
                                            </td>
                                            <td class="a-name">
                                                <h3 class="h-name">Jamal Burnett</h3>
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">What If A Sportsman Is Going Under Pressure?</p>
                                            </td>
                                            <td class="t-date">
                                                07 Oct, 2019
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">Social Psychology</p>
                                            </td>
                                            <td class="strcon">
                                                <ul class="ratingstar">
                                                <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                </ul>
                                            </td>
                                            <td class="tname">John</td>




                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>

                                        <tr class="t-row">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck04">
                                                    <label class="form-check-label" for="transactionCheck04"></label>
                                                </div>
                                            </td>
                                            <td class="dash-img">
                                                <img src="https://practicalanxietysolutions.com/wp-content/uploads/2021/11/4-3-300x200.jpg" alt="" class="b-img">
                                            </td>
                                            <td class="a-name">
                                                <h3 class="h-name">Juan Mitchell</h3>
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">Introduction About Humanistic Psychology</p>
                                            </td>
                                            <td class="t-date">
                                                06 Oct, 2019
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">Humanistic Psychology</p>
                                            </td>
                                            <td>
                                            
                                                <ul class="ratingstar star-rating">
                                                <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                </ul>
                                              
                                            </td>

                                       
                                            <td class="tname">John</td>


                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="t-row">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck05">
                                                    <label class="form-check-label" for="transactionCheck05"></label>
                                                </div>
                                            </td>
                                            <td class="dash-img">
                                                <img src="https://practicalanxietysolutions.com/wp-content/uploads/2021/12/What-Does-One-Do-To-Walk-More-300x200.jpg" alt="" class="b-img">
                                            </td>
                                            <td class="a-name">
                                                <h3 class="h-name">Barry Rick</h3>
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">What Does One Do To Walk More?</p>
                                            </td>
                                            <td class="t-date">
                                                05 Oct, 2019
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">Behavioural Psychology</p>
                                            </td>
                                            <td>
                                                <ul class="ratingstar">
                                                <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                </ul>
                                            </td>
                                            <td class="tname">John</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="t-row">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck06">
                                                    <label class="form-check-label" for="transactionCheck06"></label>
                                                </div>
                                            </td>
                                            <td class="dash-img">
                                                <img src="https://practicalanxietysolutions.com/wp-content/uploads/2021/12/Does-Water-Keep-Our-Bones-Stronger-300x200.jpg" alt="" class="b-img">
                                            </td>
                                            <td class="a-name">
                                                <h3 class="h-name">Ronald Taylor</h3>
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">Does Water Keep Our Bones Stronger?</p>
                                            </td>
                                            <td class="t-date">
                                                04 Oct, 2019
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">Performance Psychology</p>
                                            </td>
                                            <td>
                                                <ul class="ratingstar">
                                                <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                </ul>
                                            </td>
                                            <td class="tname">John</td>



                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="t-row">
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck07">
                                                    <label class="form-check-label" for="transactionCheck07"></label>
                                                </div>
                                            </td>


                                            <td class="dash-img">
                                                <img src="https://practicalanxietysolutions.com/wp-content/uploads/2021/12/What-Toxins-Are-Flushed-Out-Of-The-Body-By-Water-300x200.jpg" alt="" class="b-img">
                                            </td>
                                            <td class="a-name">
                                                <h3 class="h-name">Jacob Hunter</h3>
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">What Toxins Are Flushed Out Of The Body By Water?</p>
                                            </td>
                                            <td class="t-date">
                                                04 Oct, 2019
                                            </td>
                                            <td class="h-title">
                                                <p class="b-title">General</p>
                                            </td>


                                            <td>
                                                <ul class="ratingstar">
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/fluency/16/000000/star.png"/></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                    <li class="str"><img src="https://img.icons8.com/ios/12/000000/star--v2.png" /></li>
                                                </ul>
                                            </td>

                                            <td class="tname">John</td>



                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>

    <?php
    include('include/footer.php');
                                }else{
         echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
        }
    ?>