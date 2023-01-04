<?php
include('include/header.php');
include('include/sidebar.php');

$getPost = $conn->prepare('SELECT * FROM post WHERE id=' . $_GET['id'] . ' limit 1');
$getPost->execute();
while ($row = $getPost->fetch(PDO::FETCH_ASSOC)) {
    $title = $row['title'];
    $summary = $row['summary'];
    $content = $row['content'];
    //echo $cta =$row['cta'];    
    $cta  = explode(",", $row['cta']);
    $product  = explode(",", $row['products']);
    $toc = $row['tableOfContent'];
    $metaTitle  = $row['metaTitle'];
    $slug = $row['slug'];
    $metaDescription  = $row['metaDescription'];
    $schema  = $row['SeoSchema'];
    $mainCategoryPost  = explode(",", $row['mainCategories']);
    $subCategoryPost  = explode(",", $row['subcategories']);
    $tags = $row['tags'];
    $imageAlt  = $row['imageAlt'];
    $imageTitle = $row['imageTitle'];
    $reviewed = $row['reviewed'];
    $written = $row['written'];
    $disease = $row['disease'];
    $poststatus = $row['status'];
    $product_cta = $row['products'];
    $publishDate = $row['publishDate'];
    $postDate = $row['postDate'];
    
    if(empty($row['image'])){
        $image_id = 1;
    }
    else{
        $image_id = $row['image'];}
//        echo $sql = "SELECT * FROM images WHERE path='$image_id' limit 1";

    $getPost_image = $conn->prepare("SELECT * FROM images WHERE id='$image_id' limit 1");
    $getPost_image->execute();
    $totalpost_image = $getPost_image->rowCount();
    if($totalpost_image>0){
    while ($row1 = $getPost_image->fetch(PDO::FETCH_ASSOC)) {
        $image_path=$row1['path'];
    }
  }else{
    echo "set image";
  }
?>
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



    <div class="main-content">

        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Post</h4>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'add') {
            ?>
                    <div id="postAddAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        Post Added As <?php echo $poststatus; ?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
                }
            }
            ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                                <form id="editPost">
                                <input type="hidden" name="btn" value="editPost">
                                <input type="hidden" name="postid" value="<?php echo $_GET['id']; ?>">
                                <div class="row">                                
                                    <div class="col-sm-6">
                                        <input type="text" value="<?php echo $title; ?>" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                        <span class="error titleError"></span>
                                    </div>
                                   <div class="col-sm-6">
                                        <input type="text" class="form-control" value="<?php echo $summary; ?>" id="summary" name="summary" placeholder="Post Summary">
                                        <span class="error summaryError"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end card body -->
                </div>
            

                            <div class="col-xl-12">   
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".imageGallery_forcontentImages"><i class="bx bx-image-add"></i> Add Image</a>
                                        <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".faq_forcontent"><i class="bx bx-image-add"></i> Add FAQ</a>
                                        <br><br>
                                            <textarea id="postContent" cols="30" rows="10"><?php echo $content; ?></textarea>
                                            <span class="error postContentError"></span>

                                            <div id="getDataNew">
                                                <?php echo $content; ?>
                                            </div>
                                        <!-- <span id="textarea-one" name="textarea-one"></span>-->
                                    </div>
                                </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="col-xl-8">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                    <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Add CTA
                                        </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <input class="form-control" id="myInput" type="text" onkeyup="filterTextInput()" placeholder="Search DeepLink">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row cta-check">
                                                <?php
                                                $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                $getCta->execute();
                                                while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {

                                                    if (in_array($row['id'], $cta)) {
                                                       $ctastatus = "checked";
                                                    } else {
                                                       $ctastatus = "";
                                                    }
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
                                                        <input data-id="cta" <?php echo $ctastatus; ?> data-field="cta" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type="checkbox">
                                                        <label for="<?php echo $row['id']; ?>">
                                                            <div class="cta-div mb-3">
                                                                <img src="<?php echo $cta_image?>" alt="">


                                                                <div class="cta-content">
                                                                    <h4><?php echo $row['title']; ?></h4>
                                                                    <p><?php echo $row['details']; ?></p>
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
                                    <!-- end card -->
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                    <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                        Add Product's
                                        </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionExample"> 
                                        <div class="card-body">

                                        <div class="row">
                                                <div class="col-lg-6">
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <input class="form-control" id="myInputproduct" type="text" onkeyup="filterTextInputproduct()" placeholder="Search DeepLink">
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

                                                            if (in_array($rowp['id'], $product)) {
                                                                $productstatus = "checked";
                                                            } else {
                                                                $productstatus = "";
                                                            }

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
                                                        <input type="checkbox" <?php echo $productstatus; ?> value="<?php echo $rowp['id'] ?>" name="postProduct" id="<?php echo $rowp['id'] ?>" data-cta_id="<?php echo $rowp['id'] ?>" onchange="setProduct_id(this)" class="form-check-input">
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
                                        <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                        SEO
                                        </button>
                                        </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordionExample">                     
                        <div class="card-body">
                            <h4 class="card-title mb-4">SEO</h4>

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="meta-title">Meta Title :</label>
                                    <input type="text" class="form-control" value="<?php echo $metaTitle; ?>" id="meta-title" name="meta-title" placeholder="Meta Title ">
                                    <span class="error meta-titleError"></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="meta-slug">Slug :</label>
                                    <input type="text" class="form-control" value="<?php echo $slug; ?>" id="meta-slug" name="meta-slug" placeholder="Slug">
                                    <span class="error meta-slugError"></span>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <div class="mb-3">
                                    <label for="meta-description">Meta Description :</label>
                                    <textarea id="meta-description" name="meta-description" class="form-control" rows="3" placeholder="Meta Description"><?php echo $metaDescription; ?></textarea>
                                    <span class="error meta-descriptionError"></span>
                                </div>

                            </div>

                            <div class="form-floating mb-3">
                                <div class="mb-3">
                                    <label for="schema">Schema :</label>
                                    <textarea id="schema" name="schema" class="form-control" rows="8" placeholder="Schema"><?php echo $schema; ?></textarea>
                                    <span class="error schemaError"></span>
                                </div>
                            </div>
                        </div>


                        </div>
                        <!-- end card body -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                             <h2 class="accordion-header" id="heading4">
                                <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                Table Of Content
                                        </button>
                                    </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordionExample">        
                                <div class="card-body">
                                <div class="col-12 mb-3">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Search
                                    CTA</label>
                            </div>
                            <div id="getAllH2">
                            </div>
                            <div id="lastgetAllH2">
                                <?php
                                echo $toc;
                                ?>
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
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                        Category
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse show" aria-labelledby="heading5" data-bs-parent="#accordionExample">
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
                                                    if (in_array($row['id'], $mainCategoryPost)) {
                                                        $mainstatus = "checked";
                                                    } else {
                                                        $mainstatus = "";
                                                    }
                                                ?>
                                                    <ul class="list-unstyled">
                                                        <div class="form-check mb-3">
                                                            <input class="form-check-input p-2 me-2" <?php echo $mainstatus; ?> value="<?php echo $row['id'] ?>" type="checkbox" data-name="mainCategory" id="<?php echo $row['id'] ?>">
                                                            <label class="form-check-label check_title" for="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></label>
                                                        </div>
                                                        <?php
                                                        $getSubCategory = $conn->prepare("SELECT * FROM categories WHERE parentCategory=? && status = 1");
                                                        $getSubCategory->execute([$row['id']]);
                                                        while ($subcatRow = $getSubCategory->fetch(PDO::FETCH_ASSOC)) {
                                                            if (in_array($subcatRow['id'], $subCategoryPost)) {
                                                                $substatus = "checked";
                                                            } else {
                                                                $substatus = "";
                                                            }
                                                        ?>
                                                            <li class="ps-4">
                                                                <div class="form-check mb-3">
                                                                    <input class="form-check-input p-2 me-2" <?php echo $substatus; ?> value="<?php echo $subcatRow['id'] ?>" type="checkbox" data-name="subCategory" id="<?php echo $subcatRow['id'] ?>">
                                                                    <label class="form-check-label check_title" for="<?php echo $subcatRow['id'] ?>"><?php echo $subcatRow['name'] ?></label>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
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
                                <h2 class="accordion-header" id="heading6">
                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                        Featured image
                                    </button>
                                </h2>
                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                              
                                <div class="m-3">
                                    <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".imageGallery_forfeatureImages"><i class="bx bx-image-add"></i> Add Image</a>
                                    <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                    <input type="hidden" class="image_id" name="img_id" value=""/>
                                    <input type="hidden" class="setCTA_selectedpro" name="setCTA_selectedpro" value="<?php echo $product_cta?>"/ id="setCTA_selectedpro">
                                    
                                </div>

                                <div class="text-center mt-2">
                                    <img src="https://druggist.b-cdn.net/<?php echo $image_path; ?>" alt="<?php echo $imageTitle ?>" style="width:80px;">
                                </div>                                
                               
                                <div class="m-3">
                                    <label for="image-title" class="form-label">Image Title</label>
                                    <input type="text" class="form-control" value="<?php echo $imageTitle ?>" id="image-title" name="image-title" placeholder="Image Title">
                                    <span class="error image-titleError"></span>
                                </div>
                                <div class="m-3">
                                    <label for="image-title" class="form-label">Image ALT</label>
                                    <input type="text" class="form-control" value="<?php echo $imageAlt ?>" id="image-alt" name="image-alt" placeholder="Image ALT">
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
                                            if ($row['id'] == $reviewed) {
                                                $rstatus = "selected";
                                            } else {
                                                $rstatus = "";
                                            }
                                        ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo $rstatus; ?>><?php echo $row['full_name'] ?></option>
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
                                            if ($row['id'] == $written) {
                                                $wstatus = "selected";
                                            } else {
                                                $wstatus = "";
                                            }
                                        ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo $wstatus; ?>><?php echo $row['full_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="error writtenError"></span>
                                </div>
                                <div class="m-3">
                                    <h4 class="card-title mb-4">Disease</h4>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="disease" <?php echo $disease ?> name="disease" placeholder="Disease">
                                    <span class="error diseaseError"></span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>                     
                    <div class="card">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading7">
                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                        Publish
                                    </button>
                                </h2>
                                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                <div class="time-box p-3">
                                <label for="">Select Last Post Date</label>
                                <?php 
                                   $lastDate = date("Y/m/d", strtotime($postDate));
                                ?>
                                <input type="text" name="lastPostDate" class="form-control d-block" value="<?php echo $lastDate; ?>" id="datetimepickerupdate" />
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
                                                <option value="Publish" <?php echo $poststatus == 'Publish' ? 'selected' : ''; ?>>Publish</option>
                                                <option value="Pending Review" <?php echo $poststatus == 'Pending Review' ? 'selected' : ''; ?>>Pending Review</option>
                                                <option value="Draft" <?php echo $poststatus == 'Draft' ? 'selected' : ''; ?>>Draft</option>
                                            </select>
                                            <span class="cancelBtn statusBtn okBtn" style=" font-size: 11px; text-decoration: none; padding: 3px 4px; background: #556ee6; color: #fff; ">OK</span>
                                            <span class="cancelBtn statusBtn">Cancel</span>
                                        </div>
                                    </div>
                                    <?php
                                    if ($poststatus != 'Draft') {
                                    ?>
                                        <div class="schedule">
                                            <span class="label scheduleLabel" style="font-size: 11px;font-weight: 700; color: #556ee6;">Publish</span>
                                            <span class="scheduleContent">immediately</span>
                                            <span class="scheduleEditBtn scheduleBtn">Edit</span>
                                            <div class="postSchedule">
                                                <input type="text" class="datetimepicker" value="<?php echo $publishDate; ?> dadsadas" id="datetimepicker" />
                                                <span class="scheduleCancelBtn scheduleBtn scheduleOkBtn" style=" font-size: 11px; text-decoration: none; padding: 3px 4px; background: #556ee6; color: #fff; ">OK</span>
                                                <span class="scheduleCancelBtn scheduleBtn">Cancel</span>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="schedule">
                                            <span class="label scheduleLabel" style="font-size: 11px;font-weight: 700; color: #556ee6;">Schedule On </span>
                                            <span class="scheduleContent"><?php echo $publishDate; ?></span>
                                            <span class="scheduleEditBtn scheduleBtn">Edit</span>
                                            <div class="postSchedule">
                                                <input type="text" class="datetimepicker" value="<?php echo $publishDate; ?>dsadsadas" id="datetimepicker" />
                                                <span class="scheduleCancelBtn scheduleBtn scheduleOkBtn" style=" font-size: 11px; text-decoration: none; padding: 3px 4px; background: #556ee6; color: #fff; ">OK</span>
                                                <span class="scheduleCancelBtn scheduleBtn">Cancel</span>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                </div>
                               
                            </div>
                           
                        </div>
                    </div>
                    <div class="submit-btn mt-3">
                         <input type="submit" style="width: 100%; border: 0px; background: #556ee6; color: #fff; padding: 6px;" value="Edit Post">
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
}
include('include/footer.php');
?>