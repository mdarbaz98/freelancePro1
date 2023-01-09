</div>
</div>
<div class="right-bar">
	<div data-simplebar class="h-100">
		<div class="rightbar-title d-flex align-items-center px-3 py-4">
			<h5 class="m-0 me-2">Settings</h5>
			<a href="javascript:void(0);" class="right-bar-toggle ms-auto"> <i class="mdi mdi-close noti-icon"></i> </a>
		</div>
		<!-- Settings -->
		<hr class="mt-0" />
		<h6 class="text-center mb-0">Choose Layouts</h6>
		<div class="p-4">
			<div class="mb-2"> 
        <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
      </div>
			<div class="form-check form-switch mb-3">
				<input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
				<label class="form-check-label" for="light-mode-switch">Light Mode</label>
			</div>
			<div class="mb-2">
         <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images"> 
      </div>
			<div class="form-check form-switch mb-3">
				<input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
				<label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
			</div>
			<div class="mb-2">
         <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images"> 
      </div>
			<div class="form-check form-switch mb-3">
				<input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
				<label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
			</div>
			<div class="mb-2">
         <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images"> 
      </div>
			<div class="form-check form-switch mb-5">
				<input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
				<label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
			</div>
		</div>
	</div>
	<!-- end slimscroll-menu-->
</div>
<div class="rightbar-overlay"></div>
<!-- modal image upload gallery open -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-xl custome_modal">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload And Set Feature Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Gallery</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          
            <div class="container">
              <div class="row mt-5">
                <div class="col-sm-10 m-auto">
                    <form id="form_submit1" class="form">
                    <label class="form__container" id="upload-container">Choose or Drag & Drop Files
              		<input class="form__file" id="upload-files" name="files[]" type="file" accept="image/*" multiple="multiple"/>
            		</label>
            		<div class="form__files-container" id="files-list-container"></div>
                  
                    <button class="btn btn-success" type="submit" >Upload File</button>
                    <input type="hidden" name="btn" value="insert_images"/>
                </form>
                </div>
              </div>
            </div>
          </div>
  
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
     	 <div class="container" id="getall_images">
       	 <div class="row">
          <div class="col-sm-8">
            <div class="row m-auto mt-5">
            <div class="col img-checkbox">     
                <ul style="overflow-y: scroll;height: 500px;">
                <?php 
                    $images=$conn->prepare("SELECT * FROM images WHERE status=?");
                    $images->execute([1]);
                    $i=0;
                    $total_images = $images->rowCount();
                    if ($total_images > 0) {
                        while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
                  ?>                          
                 <li><input type="checkbox" id="cb<?php echo $i; ?>" onclick="imageCheckbox()" name="images_id" value="<?php echo $row['id'] ?>"/>
                      <label for="cb<?php echo $i; ?>">
                      <img src="<?php echo $row['path']; ?>" alt="<?php echo $row['alt']; ?>" class="img-rounded custome_images" onclick="imageChahge(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')">
                      </label>
                 </li>
                
            
                      <?php $i++; } }else{ ?>
                      <p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
                      <?php }?>
											<ul>
                </div>
              </div>
            </div>
                <div class="col-sm-4">
                <div class="card mt-3" id="for_dynamicImage"> 
                </div>

                </div>
              </div>
            </div>
          </div>
          </div>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="postModalContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl custome_modal">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload And Set Feature Image</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Upload</a> </li>
					<li class="nav-item"> <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Gallery</a> </li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
						<div class="container">
							<div class="row mt-5">
								<div class="col-sm-10 m-auto">
									<form id="form_submit2" class="form">
										<label class="form__container" id="upload-container">Choose or Drag & Drop Files
											<input class="form__file" id="upload-files" name="files[]" type="file" accept="image/*" multiple="multiple" /> </label>
										<div class="form__files-container" id="files-list-container"></div>
										<button class="btn btn-success" type="submit">Upload File</button>
										<input type="hidden" name="btn" value="insert_images" /> </form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
						<div class="container" id="getall_images">
							<div class="row">
								<div class="col-sm-8">
									<div class="row m-auto mt-5">
										<?php 
              $images=$conn->prepare("SELECT * FROM images WHERE status=?");
              $images->execute([1]);
              $total_images = $images->rowCount();
              if ($total_images > 0) {
                  while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
            ?>
											<div class="col">
												<div class="img_div"> <img src="<?php echo $row['path']; ?>" alt="<?php echo $row['alt']; ?>" class="img-rounded custome_images" onclick="postImagechange(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')"> </div>
											</div>
											<?php } }else{ ?>
												<p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
												<?php }?>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="card mt-3" id="for_dynamicImage2"> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModalContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl custome_modal">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Or Set Image</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item"> <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">Upload</a> </li>
					<li class="nav-item"> <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false">Gallery</a> </li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
						<div class="container">
							<div class="row mt-5">
								<div class="col-sm-10 m-auto">
									<form id="form_submit" class="form">
										<label class="form__container" id="upload-container">Choose or Drag & Drop Files
											<input class="form__file" id="upload-files" name="files[]" type="file" accept="image/*" multiple="multiple" /> </label>
										<div class="form__files-container" id="files-list-container"></div>
										<button class="btn btn-success" type="submit">Upload File</button>
										<input type="hidden" name="btn" value="insert_images" /> </form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab1">
						<div class="container" id="getall_images">
							<div class="row">
								<div class="col-sm-8">
									<div class="row m-auto mt-5">
										<?php 
              $images=$conn->prepare("SELECT * FROM images WHERE status=?");
              $images->execute([1]);
              $total_images = $images->rowCount();
              if ($total_images > 0) {
                  while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
            ?>
											<div class="col">
												<div class="img_div"> <img src="<?php echo $row['path']; ?>" alt="<?php echo $row['alt']; ?>" class="img-rounded custome_images" onclick="contenImage(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')"> </div>
											</div>
											<?php } }else{ ?>
												<p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
												<?php }?>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="card mt-3" id="for_dynamicImage1"> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>
</div>
<!-- JAVASCRIPT -->
<!-- <script src="assets/libs/jquery/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<!-- <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script> -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<!-- apexcharts -->
<!-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> -->
<!-- dashboard init -->
<!-- <script src="assets/js/pages/dashboard.init.js"></script> -->
<!--wysoiiwyg-->
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>
<!--category js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<!--drop and drag-->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>
<!-- App js -->
<script src="assets/js/wisvyg_edit.js"></script>
<script src="assets/js/validate.js"></script>
<script src="assets/js/customFunction.js"></script>
<script src="assets/js/app.js"></script>
<!-- <script src="assets/js/pages/script.js"></script> -->
<script>
$('.title').click(function() {
	$(this).addClass('active')
	$(this).siblings('.title').removeClass('active')
	$(this).siblings('.desc').stop().slideUp()
	$(this).next().stop().slideDown()
})
if($('#draft_edit').val() > 0) {
	$(".showDate").css({
		'display': 'block'
	});
}
$("#draft").change(function() {
	if($(this).val() > 0) {
		$(".showDate").css({
			'display': 'block'
		});
	}
});
// 	$.datetimepicker.setLocale('pt-BR');
$('#datetimepicker').datetimepicker();
// $(function () {
//   $('#datetimepicker').datepicker({
//     viewMode: 'years'
//   });
// });


function imageCheckbox(){
	alert("work check");
            var favorite = [];
            $.each($("input[name='images_id']:checked"), function(){            
                favorite.push($(this).val());
            });
            var img_id = favorite.join(",");
            alert(img_id);
			$('.image_id').attr('value',img_id)
}

// $('.imageCheckbox').click(function() {
  			
            
// })


</script>
</body>
</html>