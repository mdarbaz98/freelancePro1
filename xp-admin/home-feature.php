<?php
include('include/header.php');
include('include/sidebar.php');
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
               <h4 class="mb-sm-0 font-size-18">Home Feature</h4>
            </div>
         </div>
      </div>
      <div class="row"> 
         <div class="col-lg-8">
            <div class="row">
               <div class="col-xl-6">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title mb-4">Add Search Tag</h4>
                        <form id="addTag">
                           <input type="hidden" name="btn" value="addHomeTag">
                           <div class="row mb-4">
                              <label for="taginput" class="col-sm-3 col-form-label">Tag</label>
                              <div class="col-sm-12">
                                 <input type="text" class="form-control" id="tag-input" name="tag" for="taginput" placeholder="Enter Your " />
                              </div>
                           </div>
                           <div class="row mb-4">
                              <label for="url-input" class="col-sm-3 col-form-label">Url</label>
                              <div class="col-sm-12">
                                 <input type="text" class="form-control" id="url-input" name="url" for="url-input" placeholder="Enter Your Email ID" />
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-9">
                                 <div>
                                    <button type="submit" class="btn btn-primary w-md" name="add-tag" id="add-tag">
                                    Add Tag
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- end card body -->
                  </div>
                  <!-- end card -->
               </div>
               <div class="col-xl-6">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title mb-4">Popular Search</h4>
                        <div class="tag-x-cut">
                           <?php
                              $getTag = $conn->prepare('SELECT * FROM hometag where status=?');
                              $getTag->execute([1]);
                              while ($row = $getTag->fetch(PDO::FETCH_ASSOC)) {
                                 if ($row['status'] == 0) {
                                    $status = 'style="border:1px solid red"';
                                 } else {
                                    $status = '';
                                 }
                              ?>
                           <div class="tag-x" <?php echo $status; ?>> 
                              <?php echo $row['tag']; ?>
                              <button class="cross-cut-btn" onclick="deleteTag(this)" data-id="<?php echo $row['id']; ?>">X</button> 
                           </div>
                           <?php
                              }
                              ?>
                        </div>
                     </div>
                     <!-- end card body -->
                  </div>
                  <!-- end card -->
               </div>
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h4 class="card-title mb-4">Board Member</h4>
                        <div class="row">
                           <div class="col-12">
                              <div class="search-element">
                                 <div class="board-member-search d-none d-lg-block">
                                    <div class="position-relative mb-3">
                                       <input type="text" class="scope-control" id="myInput2" onkeyup="filterTextInput2()" placeholder="Search Member">
                                       <span class="bx bx-search-alt search-scp"></span>
                                    </div>
                                 </div>
                              </div>
                              <form id="setHmeMember">
                                 <div class="row cta-check">
                                    <input type="hidden" name="btn" value="homeMember">
                                    <?php
                                       $getCta = $conn->prepare("SELECT * FROM boardmember");
                                       $getCta->execute();
                                       while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                          if ($row['featured'] == 1) {
                                             $status = "checked";
                                          } else {
                                             $status = '';
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
                                             $author_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                             }else{
                                             $author_image="https://i.ibb.co/4fz1F7f/Getty-Images-974371976.jpg";
                                             }
                                       ?>
                                    <div class="col-lg-4 div" data-content="<?php echo $row['full_name']; ?>">
                                       <input data-id="cta" name="homeMember[]" <?php echo $status; ?> data-field="cta" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type="checkbox">
                                       <label for="<?php echo $row['id']; ?>">
                                          <div class="cta-div mb-3">
                                             <img src="<?php echo $author_image ?>" alt="">
                                             <div class="cta-content">
                                                <h4><?php echo $row['full_name']; ?></h4>
                                                <p>@<?php echo $row['username']; ?></p>
                                             </div>
                                          </div>
                                       </label>
                                    </div>
                                    <?php
                                       }
                                       ?>
                                 </div>
                                 <div class="d-flex mt-2">
                                    <button type="submit" class="btn btn-primary w-md">
                                    Update</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title mb-4">CTA</h4>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="search-element">
                                    <div class="board-member-search d-none d-lg-block">
                                       <div class="position-relative mb-3">
                                          <input type="text" id="myInput3" onkeyup=" filterTextInput3()" class="scope-control" placeholder="Search CTA">
                                          <span class="bx bx-search-alt search-scp"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <form id="setHomeCta">
                                    <div class="row cta-check">
                                       <input type="hidden" name="btn" value="homeCta">
                                       <?php
                                          $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                          $getCta->execute();
                                          while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                             if ($row['featured'] == 1) {
                                                $status = "checked";
                                             } else {
                                                $status = '';
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
                                          <input data-id="cta" name="homeCta[]" <?php echo $status; ?> data-field="cta" value="<?php echo $row['id']; ?>" id="homecta<?php echo $row['id']; ?>" type="checkbox">
                                          <label for="homecta<?php echo $row['id']; ?>">
                                             <div class="cta-div mb-3">
                                                <img src="<?php echo $cta_image; ?>" alt="">
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
                                    <div class="d-flex mt-2">
                                       <button type="submit" class="btn btn-primary w-md">
                                       Update</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>


                  <div class="col-lg-12" style="">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title mb-4">Post</h4> 

                           <div class="accordion" id="accordionExample">
                           <?php

                              $getcat = $conn->prepare("SELECT * FROM categories where parentCategory=0");
                              $getcat->execute();
                              $i=1;
                              while($row = $getcat->fetch(PDO::FETCH_ASSOC)) {
                             // echo $row['name'];    
                           ?>        
                           
                                          
                              <div class="accordion-item">

                                 <h2 class="accordion-header" id="heading<?php echo $i; ?>">
                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                       <?php echo $row['name'] ?>
                                    </button>
                                 </h2>
                                 <div id="collapse<?php echo $i ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample<?php echo $i; ?>">
                                    <div class="accordion-body">
                                       <div class="col-xl-12">
                                          <div class="card">
                                             <div class="card-body">
                                                <div class="row">
                                                   <div class="col-sm-4">
                                                      <div class="mb-3">
                                                         <input class="form-control" id="postSearch" type="text" onkeyup="filterTextInputPost()" placeholder="Search Post">
                                                      </div>
                                                   </div>
                                                </div>
                                                <form id="lifeStyleform">
                                                   <div class="row cta-check">
                                                      <?php
                                                         $getcat1 = $conn->prepare("SELECT * FROM categories where id='25'");
                                                         $getcat1->execute();
                                                         while ($row1 = $getcat1->fetch(PDO::FETCH_ASSOC)) {
                                                            $post_id = $row1['condition_check'];                      
                                                            $post_array = explode(',',$post_id);
                                                         }
                                                         ?>
                                                      <?php
                                                         $getData2 = $conn->prepare('SELECT * FROM post WHERE mainCategories="25"');
                                                         $getData2->execute();
                                                         while ($row2 = $getData2->fetch(PDO::FETCH_ASSOC)) {
                                                         
                                                         
                                                         
                                                         ?>
                                                      <div class="col-lg-6 div" data-content="<?php echo $row2['title']; ?>">
                                                         <input data-id="cta" name="post_id[]" <?php if(in_array($row2['id'], $post_array)) echo 'checked="checked"'; ?> data-field="cta" value="<?php echo $row2['id']; ?>" id="w<?php echo $row2['id']; ?>" type="checkbox">
                                                         <label for="w<?php echo $row2['id']; ?>">
                                                            <div class="cta-div mb-3">
                                                               <?php
                                                                  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                                                  ?>
                                                               <img src="<?php echo $actual_link; ?>/druggist-admin<?php echo $row2['image'] ?>" alt="">
                                                               <div class="cta-content">
                                                                  <h4><?php echo $row2['title']; ?></h4>
                                                                  <p><?php echo $row2['summary']; ?></p>
                                                               </div>
                                                            </div>
                                                         </label>
                                                      </div>
                                                      <?php
                                                         }
                                                         ?>   
                                                   </div>
                                                   <input type="hidden" name="btn" value="lifeStylebtn">
                                                   <input type="hidden" name="cat_id" value="25" />
                                                   <div class="d-flex mt-2"><button type="submit" class="btn btn-primary w-md">Update</button></div>
                                                </form>

                                                <!-- <h4 class="card-title mb-4 mt-5">Select CTA</h4>
                                                <div class="row">
                                                   <div class="col-sm-4">
                                                      <div class="mb-3">
                                                         <input class="form-control" id="ctaSearch" type="text" onkeyup="filterTextInputCTA()" placeholder="Search DeepLink">
                                                      </div>
                                                   </div>
                                                </div> -->

                                             
                                             </div>
                                          </div>
                                       </div>
                                       <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                 </div>
                              </div>
                        <?php $i++; } ?>

                        </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4">
            <div class="card">
               <div class="card-body">
                  <div class="">
                     <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Men's Health
                              </button>
                           </h2>
                           <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <div class="col-xl-12">
                                    <div class="card">
                                       <div class="card-body">
                                          <form id="homeCat">
                                             <?php
                                                $getData = $conn->prepare('SELECT * FROM homestaticcat WHERE section="men"');
                                                $getData->execute();
                                                while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
                                                   $title = $row['title'];
                                                   $category = $row['category'];
                                                   $url = $row['url'];
                                                   $cta = $row['cta'];
                                                
                                                if(empty($row['image'])){
                                                   $image_id = 1;
                                                   }
                                               else{ $image_id = $row['image'];}
                                               $getPost_image = $conn->prepare("SELECT * FROM images WHERE id=?");
                                               $getPost_image->execute([$image_id]);
                                               $row1 = $getPost_image->fetch(PDO::FETCH_ASSOC);    
                                               $image_path=$row1['path'];
                                               }

                                                ?>
                                             <input type="hidden" name="btn" value="homeCat">
                                             <input type="hidden" name="section" value="men">
                                             
                                             <!-- <div class="col-lg-12">                                   
                                             <div class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i> Add Image</div>    
                                             <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                             <input type="hidden" class="image_id" name="img_id" value=""/>
                                             <span class="error imageError"></span>
                                             </div> -->

                                             <div class="m-3">
                                                <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".imageGallery_forfeatureImages"><i class="bx bx-image-add"></i> Add Image</a>
                                                <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                                <input type="hidden" class="image_id" name="img_id" value=""/>
                                             </div>

                                             <div class="row">
                                                <div class="col-sm-12">
                                                <div class="text-center mt-2">
                                                <img src="https://druggist.b-cdn.net/<?php echo $image_path ?>" style="width:80px;">
                                                </div>
                                                <span class="error imageError"></span>

                                                   <label for="">Title</label>
                                                   <input type="text" value="<?php echo $title ?>" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                                   <span class="error titleError"></span>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-sm-12">
                                                   <label for="">Category</label>
                                                   <input type="text" class="form-control" value="<?php echo $category ?>" id="category" name="category" placeholder="Caregory">
                                                   <span class="error mcategoryError"></span>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-sm-12">
                                                   <label for="">URL</label>
                                                   <input type="text" class="form-control" value="<?php echo $url ?>" name="url" id="url" placeholder="Url">
                                                   <span class="error urlError"></span>
                                                </div>
                                             </div>
                                             <div class="row justify-content-end">
                                                <div class="col-sm-12">
                                                   <label for="">CTA</label>
                                                   <input class="form-control" id="homefeatures1" type="text" onkeyup="filterTextInput_homefeatures1()" placeholder="Search DeepLink">
                                                   <div class="row cta-check my-3">
                                                      <?php
                                                         $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                         $getCta->execute();
                                                         while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                            if ($row['id'] == $cta) {
                                                               $status = "checked";
                                                            } else {
                                                               $status = "";
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
                                                      <div class="col-lg-12 div_men" data-content="<?php echo $row['title']; ?>">
                                                         <input data-id="cta" <?php echo $status; ?> name="cta" data-field="cta" value="<?php echo $row['id']; ?>" id="m<?php echo $row['id']; ?>" type="radio">
                                                         <label for="m<?php echo $row['id']; ?>">
                                                            <div class="cta-div mb-3">
                                                               <img src="<?php echo $cta_image; ?>" alt="">
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
                                                   <div>
                                                      <input type="submit" value="Update" class="btn btn-primary w-md">
                                                   </div>
                                          </form>
                                          </div>
                                          </div>
                                       </div>
                                       <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="">
                           <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Women's Health
                                    </button>
                                 </h2>
                                 <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                       <div class="col-xl-12">
                                          <div class="card">
                                             <div class="card-body">
                                                <form id="homeCat1">
                                                   <?php
                                                      $getData = $conn->prepare('SELECT * FROM homestaticcat WHERE section="women"');
                                                      $getData->execute();
                                                      while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
                                                         $title = $row['title'];
                                                         $category = $row['category'];
                                                         $url = $row['url'];
                                                         $cta = $row['cta'];
                                                      
                                                      if(empty($row['image'])){
                                                         $image_id = 1;
                                                     }
                                                     else{
                                                       $image_id = $row['image'];}
                                                             //echo $sql = "SELECT * FROM images WHERE path='$image_id' limit 1";
                                                     $getPost_image = $conn->prepare("SELECT * FROM images WHERE id=?");
                                                     $getPost_image->execute([$image_id]);
                                                     $row1 = $getPost_image->fetch(PDO::FETCH_ASSOC);    
                                                     $image_path=$row1['path'];
                                                     }
                                                      ?>
                                                   <input type="hidden" name="btn" value="homeCat">
                                                   <input type="hidden" name="section" value="women">
                                                   
                                                   <div class="m-3">
                                                <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".imageGallery_forfeatureImages"><i class="bx bx-image-add"></i> Add Image</a>
                                                <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                                <input type="hidden" class="image_id" name="img_id" value=""/>
                                             </div>
                                                   <div class="row">
                                                   <div class="text-center mt-2">
                                                   <img src="https://druggist.b-cdn.net/<?php echo $image_path ?>" style="width:80px;">
                                                   </div>
                                                   <span class="error imageError"></span>
                                                      <div class="col-sm-12">
                                                         <label for="">Title</label>
                                                         <input type="text" value="<?php echo $title ?>" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                                         <span class="error titleError"></span>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-12">
                                                         <label for="">Category</label>
                                                         <input type="text" class="form-control" value="<?php echo $category ?>" id="category" name="category" placeholder="Caregory">
                                                         <span class="error mcategoryError"></span>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-sm-12">
                                                         <label for="">URL</label>
                                                         <input type="text" class="form-control" value="<?php echo $url ?>" name="url" id="url" placeholder="Url">
                                                         <span class="error urlError"></span>
                                                      </div>
                                                   </div>
                                                   <div class="row justify-content-end">
                                                      <div class="col-sm-12">
                                                         <label for="">CTA</label>
                                                         <input class="form-control" id="homefeatures2" type="text" onkeyup="filterTextInput_homefeatures2()" placeholder="Search DeepLink">
                                                         <div class="row cta-check my-3">
                                                            <?php
                                                               $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                               $getCta->execute();
                                                               while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                                  if ($row['id'] == $cta) {
                                                                     $status = "checked";
                                                                  } else {
                                                                     $status = "";
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
                                                            <div class="col-lg-12 div_women" data-content="<?php echo $row['title']; ?>">
                                                               <input data-id="cta" <?php echo $status; ?> name="cta" data-field="cta" value="<?php echo $row['id']; ?>" id="w<?php echo $row['id']; ?>" type="radio">
                                                               <label for="w<?php echo $row['id']; ?>">
                                                                  <div class="cta-div mb-3">
                                                                     <?php
                                                                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                                                        ?>
                                                                     <img src="<?php echo $cta_image; ?>" alt="">
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
                                                         <div>
                                                            <input type="submit" value="Updated" class="btn btn-primary w-md">
                                                         </div>
                                                </form>
                                                </div>
                                                <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="">
                                 <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                       <h2 class="accordion-header" id="headingThree">
                                          <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          General Health
                                          </button>
                                       </h2>
                                       <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                             <div class="col-xl-12">
                                                <div class="card">
                                                   <div class="card-body">
                                                      <form id="homeCat2">
                                                         <?php
                                                            $getData = $conn->prepare('SELECT * FROM homestaticcat WHERE section="general-health"');
                                                            $getData->execute();
                                                            while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
                                                               $title = $row['title'];
                                                               $category = $row['category'];
                                                               $url = $row['url'];
                                                               $cta = $row['cta'];
                                                               if(empty($row['image'])){
                                                                  $image_id = 1;
                                                              }
                                                              else{
                                                              $image_id = $row['image'];}
                                                              $getPost_image = $conn->prepare("SELECT * FROM images WHERE id=?");
                                                              $getPost_image->execute([$image_id]);
                                                              $row1 = $getPost_image->fetch(PDO::FETCH_ASSOC);    
                                                              $image_path=$row1['path'];
                                                              
                                                            }
                                                            ?>
                                                         <input type="hidden" name="btn" value="homeCat">
                                                         <input type="hidden" name="section" value="general-health">
                                                         <div class="col-lg-12">                                   
                                                         <div class="m-3">
                                                <a class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".imageGallery_forfeatureImages"><i class="bx bx-image-add"></i> Add Image</a>
                                                <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                                <input type="hidden" class="image_id" name="img_id" value=""/>
                                             </div>
                                                   <div class="text-center mt-2">
                                                   <img src="https://druggist.b-cdn.net/<?php echo $image_path ?>" style="width:80px;">
                                                   </div>
                                                   <span class="error imageError"></span>
                                                         <div class="row">
                                                            <div class="col-sm-12">
                                                               <label for="">Title</label>
                                                               <input type="text" value="<?php echo $title ?>" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                                               <span class="error titleError"></span>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-sm-12">
                                                               <label for="">Category</label>
                                                               <input type="text" class="form-control" value="<?php echo $category ?>" id="category" name="category" placeholder="Caregory">
                                                               <span class="error mcategoryError"></span>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-sm-12">
                                                               <label for="">URL</label>
                                                               <input type="text" class="form-control" value="<?php echo $url ?>" name="url" id="url" placeholder="Url">
                                                               <span class="error urlError"></span>
                                                            </div>
                                                         </div>
                                                         <div class="row justify-content-end">
                                                            <div class="col-sm-12">
                                                               <label for="">CTA</label>
                                                               <input class="form-control" id="homefeatures3" type="text" onkeyup="filterTextInput_homefeatures3()" placeholder="Search DeepLink">
                                                               <div class="row cta-check my-3">
                                                                  <?php
                                                                     $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                                     $getCta->execute();
                                                                     while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                                        if ($row['id'] == $cta) {
                                                                           $status = "checked";
                                                                        } else {
                                                                           $status = "";
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
                                                                  <div class="col-lg-12 div_general" data-content="<?php echo $row['title']; ?>">
                                                                     <input data-id="cta" <?php echo $status; ?> name="cta" data-field="cta" value="<?php echo $row['id']; ?>" id="g<?php echo $row['id']; ?>" type="radio">
                                                                     <label for="g<?php echo $row['id']; ?>">
                                                                        <div class="cta-div mb-3">
                                                                           <?php
                                                                              $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                                                              ?>
                                                                           <img src="<?php echo $cta_image; ?>" alt="">
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
                                                               <div>
                                                                  <input type="submit" value="Update" class="btn btn-primary w-md">
                                                               </div>
                                                      </form>
                                                      </div>
                                                      <!-- end card body -->
                                                      </div>
                                                      <!-- end card -->

                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- end accordion -->
                              </div>
                           </div>
                           <!-- end col -->

                        </div>

                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->

</div>
<?php
include('include/footer.php');
?>