<?php
include('include/header.php');
include('include/sidebar.php');
?>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Post</h4>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <form id="addPost">
                            <input type="hidden" name="btn" value="addPost">

                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                    <span class="error titleError"></span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="summary" name="summary" placeholder="Post Summary">
                                    <span class="error summaryError"></span>
                                </div>
                            </div>

                    </div>
                    <!-- end card body -->
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".imageGallery_forcontentImages"><i class="bx bx-image-add"></i> Add Image</a>
                                <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".faq_forcontent"><i class="bx bx-image-add"></i> Add FAQ</a>
                                <br><br>
                                <textarea id="postContent" cols="30" rows="10"></textarea>
                                <span class="error postContentError"></span>

                                <div id="getDataNew">
                                </div>
                                <!-- <span id="textarea-one" name="textarea-one"></span>-->
                            </div>
                        </div>



                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <div class="col-xl-8">
                
        <div class="row">
            <div class="col-xl-12">
                                <div class="card">
                                <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading4">
                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                        Add CTA
                                        </button>
                                    </h2>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <!-- <label class="form-label"> Select Category</label> -->
                                                    <input class="form-control" id="myInput" type="text" onkeyup="filterTextInput()" placeholder="Search DeepLink">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="row cta-check">
                                            <?php
                                            $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                            $getCta->execute();
                                            while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                if(!empty($row['image'])){
                                                    $image_id=$row['image'];
                                                    //$post_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                                }else{
                                                      $image_id=1;
                                                }
                                                // for image get
                                                $select_stmtPost_img=$conn->prepare("SELECT * FROM images WHERE id='".$image_id."'");
                                                $select_stmtPost_img->execute();
                                                $post_data_image=$select_stmtPost_img->fetch(PDO::FETCH_ASSOC);
                                                if(!empty($post_data_image['path'])){
                                                    $cta_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                                    }else{
                                                    $cta_image="https://i.ibb.co/4fz1F7f/Getty-Images-974371976.jpg";
                                                    }
                                            ?>

                                                <div class="col-lg-6 div" data-content="<?php echo $row['title']; ?>">
                                                    <input data-id="cta" data-field="cta" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" name="addcta" type="checkbox">
                                                    <label for="<?php echo $row['id']; ?>">
                                                        <div class="cta-div mb-3">
                                                            <img src="<?php echo $cta_image ?>" alt="">
                                                            <div class="cta-content">
                                                                <h4><?php echo $row['title']; ?></h4>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>

                                            <?php
                                            }
                                            ?>

                                        </div>


                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>
                        </div>
                    </div>
                                <!-- end card -->
                </div>
            </div>
                    
          
                                    




                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading5">
                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                            Add Product's
                                        </button>
                                    </h2>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                                    <div class="card-body">

                                    <div class="row">
                                                <div class="col-lg-6">
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <input class="form-control" id="myInputproduct"  data-id="1" type="text" onkeyup="filterTextInputproduct()" placeholder="Search Product">
                                                    </div>
                                                </div>
                                        </div>
                                    <div class="row cta-check">
                                    <?php
                                                        $getProduct = $conn->prepare('SELECT * FROM product');
                                                        $getProduct->execute();
                                                        while ($rowp = $getProduct->fetch(PDO::FETCH_ASSOC)) {

                                                            $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
                                                            $getCategory->execute([$rowp['category']]);
                                                            if ($getCategory->rowCount()>0) {
                                                                while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                                                                    $category = $rowCat['name'];
                                                                }
                                                            } else {
                                                                $category = "Not found";
                                                            }

                                                            $getSubcategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
                                                            $getSubcategory->execute([$rowp['subcategory']]);
                                                            if ($getSubcategory->rowCount() > 0) {
                                                                while ($rowCat = $getSubcategory->fetch(PDO::FETCH_ASSOC)) {
                                                                    $subcategory = $rowCat['name'];
                                                                }
                                                            } else {
                                                                $subcategory = "Not Found";
                                                            }

                                                            // if (in_array($rowp['id'], $product)) {
                                                            //     $productstatus = "checked";
                                                            // } else {
                                                            //     $productstatus = "";
                                                            // }
                                                            if(!empty($rowp['image'])){
                                                                $image_id=$rowp['image'];
                                                                //$post_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                                            }else{
                                                                  $image_id=1;
                                                            }
                                                            // for image get
                                                            $select_stmtPost_img=$conn->prepare("SELECT * FROM images WHERE id='".$image_id."'");
                                                            $select_stmtPost_img->execute();
                                                            $post_data_image=$select_stmtPost_img->fetch(PDO::FETCH_ASSOC);
                                                            if(!empty($post_data_image['path'])){
                                                                $post_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                                                }else{
                                                                $post_image="https://i.ibb.co/4fz1F7f/Getty-Images-974371976.jpg";
                                                                }
                                                        ?>
                                                    <div class="col-lg-6 div1" data-content="<?php echo $rowp['name']; ?>">
                                                        <input type="checkbox" value="<?php echo $rowp['id'] ?>" name="postProduct" id="<?php echo $rowp['id'] ?>" class="form-check-input">
                                                          <label for="<?php echo $rowp['id']; ?>">
                                                            <div class="cta-div mb-3">
                                                                <img src="<?php echo $post_image ?>" alt="">
                                                                <div class="cta-content">
                                                                    <h4><?php echo $rowp['name']; ?></h4>
                                                                    <p><?php //echo $row['details']; ?></p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                            <?php
                                            }
                                        ?>

                                            </div>




                                    </div>
                                 </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>

                <div class="card">
                <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading6">
                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                        SEO
                                        </button>
                                    </h2>
                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                              
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="meta-title">Meta Title :</label>
                                <input type="text" class="form-control" id="meta-title" name="meta-title" placeholder="Meta Title ">
                                <span class="error meta-titleError"></span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="meta-slug">Slug :</label>
                                <input type="text" class="form-control" id="meta-slug" name="meta-slug" placeholder="Slug">
                                <span class="error meta-slugError"></span>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <div class="mb-3">
                                <label for="meta-description">Meta Description :</label>
                                <textarea id="meta-description" name="meta-description" class="form-control" rows="3" placeholder="Meta Description"></textarea>
                                <span class="error meta-descriptionError"></span>
                            </div>

                        </div>

                        <div class="form-floating mb-3">
                            <div class="mb-3">
                                <label for="schema">Schema :</label>
                                <textarea id="schema" name="schema" class="form-control" rows="3" placeholder="Schema"></textarea>
                                <span class="error schemaError"></span>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
                    <!-- end card body -->
    </div>
        
            <div class="card">
                <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                             <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                Table Of Content
                                        </button>
                                    </h2>
                            <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                                        
                                <div class="card-body">

                                <div class="col-12 mb-3">
                            <label class="visually-hidden" for="inlineFormInputGroupUsername">Search
                                CTA</label>
                        </div>
                        <div id="getAllH2">
                        </div>
                        <button style=" text-align: center; display: block; width: fit-content; background: #556ee6; color: #fff; border: 0px; position: relative; margin-bottom: 16px !important; margin: 0 auto; font-weight: 600; " onclick="getSelectTOC()" type="button">Final Selected</button>
                        <div class="input-group">
                            <input type="hidden" class="form-control" id="tocId">
                            <input type="text" class="form-control" id="tocEdit">
                            <div class="input-group-text" onclick="setDataToc()">
                                <i class="bx bx-check"></i>
                            </div>
                        </div>
                        <div id="selectH2" style="padding-top: 13px;">
                        </div>

                        <button style=" text-align: center; display: block; width: fit-content; background: #ff0562; color: #fff; border: 0px; position: relative; margin-bottom: 16px !important; margin: 0 auto; font-weight: 600; " onclick="removeSelectTOC()" type="button">Remove</button>


                                </div>
                            </div>
                        </div>
                </div>
            </div>
               
    </div>                                        

            <div class="col-xl-4">
                <!-- <span class="error mainCategoryError"></span>
                <span class="error subCategoryError"></span> -->
                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Category
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">All Categories</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">Most View</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content category_body_section p-3 text-muted">
                                        <div class="tab-pane active" id="home" role="tabpanel">
                                            <?php
                                            $getPostCategory = $conn->prepare('SELECT * FROM categories WHERE parentCategory=0 && status=1');
                                            $getPostCategory->execute();
                                            while ($row = $getPostCategory->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <ul class="list-unstyled">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" value="<?php echo $row['id'] ?>" type="checkbox" data-name="mainCategory" id="<?php echo $row['id'] ?>">
                                                        <label class="form-check-label check_title" for="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></label>
                                                    </div>
                                                    <?php
                                                    $getSubCategory = $conn->prepare("SELECT * FROM categories WHERE parentCategory=? && status = 1");
                                                    $getSubCategory->execute([$row['id']]);
                                                    while ($subcatRow = $getSubCategory->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <li class="ps-4">
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input p-2 me-2" value="<?php echo $subcatRow['id'] ?>" type="checkbox" data-name="subCategory" id="<?php echo $subcatRow['id'] ?>">
                                                                <label class="form-check-label check_title" for="<?php echo $subcatRow['id'] ?>"><?php echo $subcatRow['name'] ?></label>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                        <div class="tab-pane" id="profile" role="tabpanel">
                                            <ul class="list-unstyled">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d1" name="form-check-d1">
                                                    <label class="form-check-label check_title" for="form-check-d1">
                                                        Drugs
                                                    </label>
                                                </div>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d2" name="form-check-d2">
                                                        <label class="form-check-label check_title" for="form-check-d2">
                                                            Drugs Alternatives
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d3" name="form-check-d3">
                                                        <label class="form-check-label check_title" for="form-check-d3">
                                                            Drugs Comibinaion
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d4" name="form-check-d4">
                                                        <label class="form-check-label check_title" for="form-check-d4">
                                                            Drugs Review
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d5" name="form-check-d5">
                                                        <label class="form-check-label check_title" for="form-check-d5">
                                                            Drugs vs Drugs
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <ul class="list-unstyled">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d6" name="form-check-d6">
                                                    <label class="form-check-label check_title" for="form-check-d6">
                                                        Drugs
                                                    </label>
                                                </div>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d7" name="form-check-d7">
                                                        <label class="form-check-label check_title" for="form-check-d7">
                                                            Drugs Alternatives
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d8" name="form-check-d8">
                                                        <label class="form-check-label check_title" for="form-check-d8">
                                                            Drugs Comibinaion
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-d9" name="form-check-d9">
                                                        <label class="form-check-label check_title" for="form-check-d9">
                                                            Drugs Review
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="ps-4">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input p-2 me-2" type="checkbox" id="form-check-10" name="form-check-d10">
                                                        <label class="form-check-label check_title" for="form-check-d10">
                                                            Drugs vs Drugs
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <a class="button" data-bs-toggle="modal" data-bs-target=".addCategory"><u>+ Add new category</u></a>
                    </div>
                </div>


                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapseOne">
                                    Featured image
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                            <div class="m-3">
                                <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".imageGallery_forfeatureImages"><i class="bx bx-image-add"></i> Add Image</a>
                                
                                <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">

                                <!-- <div class="set_images text-center">					
                                </div> -->
                                <input type="hidden" class="image_id" name="img_id" value=""/>
                                
                                <!-- <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon03" aria-label="Upload"> -->
                                <span class="error imageError"></span>
                            </div>
                            <div class="m-3">
                                <label for="image-title" class="form-label">Image Title</label>
                                <input type="text" class="form-control" id="image-title" name="image-title" placeholder="Image Title">
                                <span class="error image-titleError"></span>
                            </div>
                            <div class="m-3">
                                <label for="image-title" class="form-label">Image ALT</label>
                                <input type="text" class="form-control" id="image-title" name="image-alt" placeholder="Image ALT">
                                <span class="error image-altError"></span>
                            </div>
                            <div class="m-3">
                            <label for="exampleDataList" class="col-md-2 col-form-label" style="display: block;width: 100%;text-align: center;">Reviewd By</label>
                            <select class="form-select" name="review">
                                <option value="7">Admin</option>
                                <?php
                                
                                $getBoardMember = $conn->prepare('SELECT * FROM boardmember WHERE username!="admin"');
                                $getBoardMember->execute();
                                while ($row = $getBoardMember->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="error reviewError"></span>
                            </div>
                            <div class="m-3">
                            <label for="exampleDataList" class="col-md-2 col-form-label" style="display: block;width: 100%;text-align: center;">Written By</label>
                            <select class="form-select" name="written">
                                <option value="7">Admin</option>
                                <?php
                                $getBoardMember = $conn->prepare('SELECT * FROM boardmember WHERE username!="admin"');
                                $getBoardMember->execute();
                                while ($row = $getBoardMember->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="error writtenError"></span>
                            </div>                                
                                <div class="m-10">
                                        <h4 class="card-title mb-4">Disease</h4>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="disease" name="disease" placeholder="Disease">
                                    <span class="error diseaseError"></span>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
                            </div>
                            </div>

                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading3">
                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                    Publish
                                </button>
                            </h2>
                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="time-box p-3">
                                <label for="">Select Last Post Date</label>
                                <input type="text" name="lastPostDate" class="form-control d-block" value="" id="datetimepicker2" />
                                <br>
                                <!-- <input type="checkbox" id="switch1" value="" switch="none">
                                <label for="switch1" data-on-label="Now" data-off-label="Later"></label> -->
                                <!-- <div class="postSchedule">
                                    <p><b>Schedule Post</b></p>
                                    <input type="text" class="form-control" value="2014/03/15 05:06" id="datetimepicker1"/>
                                </div> -->

                                <div class="status">
                                    <span class="label" style="font-size: 11px;font-weight: 700; color: #556ee6;">Status</span>
                                    <span class="statusContent"></span>
                                    <span class="editBtn statusBtn">Edit</span>
                                    <div class="postStatus">
                                        <select name="postStatus" id="postStatus" class="statusSelect">
                                            <option value="Publish" selected>Publish</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                        <span class="cancelBtn statusBtn okBtn" style=" font-size: 11px; text-decoration: none; padding: 3px 4px; background: #556ee6; color: #fff; ">OK</span>
                                        <span class="cancelBtn statusBtn">Cancel</span>
                                    </div>
                                </div>

                                <div class="schedule">
                                    <span class="label scheduleLabel" style="font-size: 11px;font-weight: 700; color: #556ee6;">Publish</span>
                                    <span class="scheduleContent"></span>
                                    <span class="scheduleEditBtn scheduleBtn">Edit</span>
                                    <div class="postSchedule">
                                        <input type="text" class="datetimepicker" value="2014/03/15 05:06" id="datetimepicker" />
                                        <span class="scheduleCancelBtn scheduleBtn scheduleOkBtn" style=" font-size: 11px; text-decoration: none; padding: 3px 4px; background: #556ee6; color: #fff; ">OK</span>
                                        <span class="scheduleCancelBtn scheduleBtn">Cancel</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>    
                            </div>
                            <div class="submit-btn mt-2">
                                <input type="submit" style="width: 100%; border: 0px; background: #556ee6; color: #fff; padding: 6px;" value="Add Post">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </form>
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

</div>
<?php
include('include/footer.php');
?>