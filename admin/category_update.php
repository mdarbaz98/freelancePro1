<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<!--     start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between mx-4">
							<h4 class="mb-sm-0 font-size-18">Add Category</h4>
							<div class="page-title-right">
							</div>
						</div>
					</div>
				</div>
				<!-- end page title -->
        <form id="updateCategory">
            <?php 
                $stmt= $conn->prepare("SELECT * FROM `category` WHERE id=?");                               
                $stmt->execute([$_GET['id']]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row_cat)
                { ?>          
            <div class="row">
              <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title mb-4">Content</h4>
                        <div class="form-group mx-2" style="position: relative;">
                          <textarea id="content" name="content" class="form-control" rows="50"><?php echo $row_cat['content'] ?></textarea>
                        <div style="position: absolute;top: 3px;right: 307px;z-index:1;" >
                          <div class="btn upload-btn content_upload ml-2" data-toggle="modal" data-target="#exampleModalContent">Image <i class="fa-solid fa-arrow-up-from-bracket"></i></div>            
                        </div>
                      </div>
                    </div><!-- end card body -->
                </div> <!-- end card -->
              </div> <!-- end col -->
              <div class="col-xl-4">
                <div class="card">
                  <div class="card-body" id="accordion">
                    <h4 class="card-title mb-4">Features</h4>
                      <div class="form-group">
                        <label for="Title" class="form-label">Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" value="<?php echo $row_cat['name'] ?>">
                      </div>    
                      <div class="form-group">                          
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="form-control" id="title" name ="title" value="<?php echo $row_cat['title'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Slug</label> <br>
                        <input type="text" class="form-control" id="slug" name ="slug" value="<?php echo $row_cat['slug'] ?>">
                      </div>               
                      <div class="form-group mt-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" id="desc" name="desc"><?php echo $row_cat['description'] ?></textarea>
                      </div>
                        
                          <div class="blog-img-box" data-toggle="modal" data-target="#exampleModal">
                            <img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png"alt="feature click image" class="image_path">
                            <h5>Set Feature Image</h5>
                          </div> 
                      
                          <?php
                                if($row_cat['img_id']){
                                  $cat_img = $row_cat['img_id'];
                                }else{
                                  $cat_img=1; 
                                }
                                $stmt1 = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                                $stmt1->execute([$cat_img]);
                                $img_data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                                if(!empty($img_data)){?>
                                <div class="customefeature_image1">
                                  <img src="<?php echo $img_data[0]['path']; ?>"alt="<?php echo $img_data[0]['alt'] ?>" class="image_path">
                                  <div class=" d-flex justify-content-center"><button type="button" id="remove_btn" class="btn btn-danger float-center my-3" onclick="removeCategoryimage(<?php echo $row_cat['id'] ?>)">Remove Image</button> </div>
                                </div>
                              <?php } ?>
                      <div class="set_images">					
									    </div>	
                          <input type="hidden" class="image_id" name="img_id" value="<?php echo $row_cat['img_id'] ?>"/> 
                      <div class="customefeature_image"><!-- <img src="" alt="" class="image_path"> --></div>
                      <div class="submit-btns clearfix d-flex">           
                          <input type="hidden" name="cat_id" value="<?php echo $row_cat['id'] ?>">
                          <input type="hidden" name="btn" value="updateCategory">
                          <input type="submit" class="post-btn float-left" name="blog_publish" value="Publish">
                      </div>
                  </div>
                </div>
              </div><!-- end col  -->
            </div><!-- end row  -->
            <?php  } ?>
        </form>
			</div><!-- end container-fluid -->
		</div><!--end page-content -->
	</div><!--end main-content -->
<?php include('include/footer.php');
                  }else{
   echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
  }
   ?>