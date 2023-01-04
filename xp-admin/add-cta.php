<?php
    include('include/header.php');
    include('include/sidebar.php');
?>
<div class="main-content">



    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Deep Links</h4>
                </div>
            </div>
        </div>
        <div class="card mt-1 mx-2">
            <div class="card-body my-4 mx-3">

                <form id="addCta" enctype="multipart/form-data">

                    <div class="row">
                        <div id="productAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            CTA has been added!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="col-md-4 my-4">
                            <div class="col-lg-12 mb-3">
                                    <input type="hidden" name="btn" value="addCta">
                                    <button class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i> Add Image</button>    
                                    <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                    <input type="hidden" class="image_id" name="img_id" value=""/>
                                    <span class="error imageError"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3 mt-4">
                                <label for="titleInput" class="form-label">TITLE</label>
                                <input  type="text" class="form-control" id="name" name="name" placeholder="Title">
                                <span class="error nameError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mt-4 mx-3">
                                <label for="shortDetails" class="form-label">SHORT DETAILS</label>
                                <input  type="text" class="form-control" id="details" name="details" placeholder="Enter details">
                                <span class="error detailsError"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-3">
                            <div class="mb-3 mt-4">
                                <label for="selectCategory" class="form-label">SELECT CATEGORY</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productMainCategory" name="category">
                                        <option>Select Category</option>
                                        <?php
                                        $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory=0 && status = 1 ');
                                        $getCategory->execute();
                                        while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <span class="error categoryError"></span>
                            </div>

                        </div>

                        <div class="col-lg-6" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 53px;">
                            <div class="mb-3 mt-4" style=" width: 61%; ">
                                <label for="selectCategory" class="form-label">SELECT SUBCATEGORY</label>
                                <select class="form-select" id="productSubCategory" name="subcategory">
                                    <option>Select category first</option>
                                </select>
                                <span class="error subcategoryError"></span>
                            </div>
                            
                            <b>OR</b>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3 mt-4">
                                <label for="productPageUrl" class="form-label">ADD PRODUCT PAGE URL</label>
                                <input  type="text" class="form-control" name="productPageUrl"
                                    id="productPageUrl" placeholder="example: www.druggist.com">
                                <span class="error productPageUrlError"></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-add w-md btn-primary">
                            <span class="button__text"><i class="fa fa-plus-circle mx-2" aria-hidden="true"></i>Add Deep Link</span>
                        </button>
                    </div>
                
                </form>
            </div>
            <!-- end card body -->
        </div>
    </div>

    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
<?php
    include('include/footer.php');
?>