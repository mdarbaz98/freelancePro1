<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid product_page">
				<!--     start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<div>
								<h4 class="mb-sm-0 font-size-18">Add user</h4></div>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
									<li class="breadcrumb-item active"></li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<!-- end page title -->
				<form id="user_form">
					<div class="row">
						<div class="card">
							<div class="card-body">
								<div class="d-flex  my-4">
									<div class="form-group mx-3  w-100">
										<label for="Title" class="form-label">Name</label>
										<input type="text" class="form-control " id="name" name="name" placeholder="Enter First Name">
									 </div>
									<div class="form-group  mx-3 mt-2 w-100">
										<label for="horizontal-firstname-input">UserName</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="UserName"> 
									</div>
                                </div>
								<div class=" d-flex my-4">
									<div class="form-group  mx-3  w-100 ">
										<label for="horizontal-firstname-input" class="col-form-label">Password</label>
										<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password"> 
									</div>
									<!-- Drop Box -->
									<div class="blog-img-box  w-100 mx-3 rounded" data-toggle="modal" data-target="#exampleModal">
								 		<img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png" alt="feature click image">
										<h5>Set Feature Image</h5>
									</div>
                                </div>
								<!-- Drop Box -->
									<div class="d-flex justify-content-center rounded"></div>
							 		<input type="hidden" class="image_id" name="img_id" />
									<div class="customefeature_image  ml-5"> <img src="" alt="" class="image_path"></div>
								<!-- Submit Button -->
								<div class="submit-btns clearfix d-flex">           
									<input type="hidden" name="btn" value="addUser">
									<input type="submit" class="post-btn float-left" name="blog_publish" value="Publish">
								</div>
							</div><!-- end card body -->
						</div><!-- end card  -->
					</div><!-- end row -->
				</form>
			</div><!-- end container-fluid -->
		</div><!-- end page-content -->
	</div><!-- end main-content -->
<script>
	function blog_img_pathUrl(input) {
		$('#blog-img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
	}
</script>
<?php
    include('include/footer.php');
	}
	else
	{ echo "<script>window.location='http://localhost/augs/admin/index.php'</script>"; }
 ?>