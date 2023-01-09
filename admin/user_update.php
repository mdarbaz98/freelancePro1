<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid product_page">
				<div class="row"><!--  start page title -->
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<div>
								<h4 class="mb-sm-0 font-size-18">Update user</h4></div>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
									<li class="breadcrumb-item active"></li>
								</ol>
							</div>
						</div>
					</div>
				</div><!-- end page title -->
				<form id="Updateuser">
					<?php 
						$stmt= $conn->prepare("SELECT * FROM `user` WHERE id=?");                               
						$stmt->execute([$_GET['id']]);
						$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $row){
					?>  
						<div class="row">
							<div class="card">
								<div class="card-body">
									<div class="d-flex  my-4">
										<div class="form-group mx-3  w-100">
											<label for="Title" class="form-label">Name</label>
											<input type="text" class="form-control " id="name" name="name" value="<?php echo $row['name'] ?>"> 
										</div>
										<div class="form-group  mx-3 mt-2 w-100">
											<label for="horizontal-firstname-input">UserName</label>
											<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username'] ?>"> 
										</div>
									</div>
									<div class=" d-flex my-4">
										<div class="form-group  mx-3  w-100 ">
											<label for="horizontal-firstname-input" class="col-form-label">Password</label>
											<input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $row['password'] ?>">
										</div>
									</div>
											<?php
												$stmt1 = $conn->prepare("SELECT * FROM `images` WHERE id=?");
												$stmt1->execute([$row['img_id']]);
												$img_data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
											?>
									<div class="blog-img-box" data-toggle="modal" data-target="#exampleModal">
										<?php if(!empty($img_data[0]['path'])){ ?>
										<img src="<?php echo $img_data[0]['path']; ?>"alt="<?php echo $img_data[0]['alt'] ?>" class="image_path">
										<div class=" d-flex justify-content-center">
											<button type="button" id="remove_btn" class="btn btn-danger float-center my-3" onclick="removeFeatureimage(<?php echo $row['id'] ?>)">Remove Image</button> 
										</div>
										<?php }else{ ?>
										<img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png"alt="feature click image" class="image_path">
										<?php } ?>
										<h5>Set Feature Image</h5>
									</div>
									<input type="hidden" class="image_id" name="img_id" value="<?php echo $row['img_id'] ?>"/> 
									<div class="customefeature_image">
										<img src="" alt="" class="image_path">
									</div>
									<!-- Drop Box -->
									<div class="submit-btns clearfix d-flex">  
										<input type="hidden" name="user_id" value="<?php echo $row['id'] ?>"> 
										<input type="hidden" name="btn" value="updateUser">
										<input type="submit" class="post-btn float-left" name="blog_publish" value="Publish">
									</div>
								</div>
							</div>
						</div>
					<?php  } ?>
				</form>
			</div>
		</div>
	</div>

<?php
    include('include/footer.php');
}else{
    echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
	}
 ?>