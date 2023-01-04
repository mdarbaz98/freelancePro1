<?php
include('include/header.php');
include('include/sidebar.php');
?>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Product</h4>
                </div>
            </div>
        </div>
        <form action="POST" id="add-product" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Product Details</h4>
                    </div>
                    <div id="productAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        Product has been added!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="my-4">
                                <div class="col-lg-12">
                                <input name="btn" type="hidden" value="addProduct">                                   
                                <div class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i> Add Image</div>    
                                <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                <input type="hidden" class="image_id" name="img_id" value=""/>
                                <span class="error imageError"></span>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="my-4">
                                <label for="productName" class="form-label">Image Alt</label>
                                <input type="text" class="form-control" id="img_alt" name="img_alt" placeholder="Enter Image Alt">
                                <span class="error img_altError"></span>
                            </div>
                        </div>
                            <div class="col-lg-6">
                                <div class="my-4">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="name" placeholder="Product Name">
                                    <span class="error nameError"></span>
                                </div>
                            </div>
                    </div>
                        <div class="col-lg-6  mt-3">
                            <div class="mb-3">
                                <label class="form-label" for="productDescriptionError">Product Description</label>
                                <div>
                                    <textarea class="form-control" rows="3" id="description" name="description" placeholder="Product Description"></textarea>
                                    <span class="error descriptionError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="mb-3">
                                <label class="form-label" for="productDescriptionError">Generic Name</label>
                                <div>
                                    <textarea class="form-control" rows="3" id="point" name="point" placeholder="Product Point"></textarea>
                                    <span class="error pointError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  mt-3">
                            <div class="mb-3">
                                <label class="form-label">Strength</label>
                                <input class="form-control" name="strength" value="strength">
                                <span class="error strengthError"></span>
                            </div>
                        </div>
                        <div class="col-lg-6  mt-3">
                            <div class="mb-3">
                                <label class="form-label">Pack Size</label>
                                <input class="form-control" name="pack" value="pack">
                                <span class="error packError"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="price" class="col-sm-12 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="price" placeholder="INR 500" onkeypress="return (event.charCode !=8 && event.charCode ==0 || event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))">
                                <span class="error priceError"></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="discountPrice" class="col-sm-12 col-form-label">Discount
                                Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="discountPrice" name="discountPrice" value="450" onkeypress="return (event.charCode !=8 && event.charCode ==0 || event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))">
                                <span class="error discountPriceError"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="globalLInk" class="col-sm-12 col-form-label">One Global
                                Link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="link" name="globalLInk" placeholder="Enter Link here">
                                <span class="error globalLInkError"></span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="category" class="col-sm-12 col-form-label">Select
                                Category</label>
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
                        <div class="col-lg-4">
                            <label for="category" class="col-sm-12 col-form-label">Select
                                Subcategory</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="productSubCategory" name="subcategory">
                                    <option>Select category first</option>
                                </select>
                            </div>
                            <span class="error subcategoryError"></span>
                        </div>
                        <div>
                            <button type="submit" name="addProductBtn" id="addProductBtn" class="btn btn-primary w-md mt-4">Add Product</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</div>
<?php
include('include/footer.php');
?>