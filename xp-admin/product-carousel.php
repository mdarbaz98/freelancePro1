<?php
   include('include/header.php');
   include('include/sidebar.php');
   ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content px-2">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Product Page</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Add Carousel Image</h5>
                                <form id="productCarousel">
                                <div class="row row-cols-lg-auto g-3 align-items-center">
                                
                                <div class="col-lg-4">

                                <div class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i>  Add Image</div>    
                                    <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                    <input type="hidden" class="image_id" name="img_id" value=""/>
                                    <span class="error imageError"></span>
                                </div>    
                                    <div class="col-lg-4">
                                        <div class="d-flex">
                                            <input class="form-control me-auto my-3" type="text" placeholder="URL" name="url" id="carousel1">
                                            <span class="error carousel1Error"></span>
                                        </div>
                                    </div>   
                                    

                                    <div class="col-lg-4">
                                        <input type="hidden" name="btn" value="addCarousel"/>
                                        <button type="submit" class="btn btn-add w-md btn-primary" name="carousel-btn" id="carousel-btn"><i
                                                class="fa fa-plus-circle mx-2" aria-hidden="true"></i>Update</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            </div>

            <!-- End Page-content -->
            <?php include('include/footer.php'); ?>