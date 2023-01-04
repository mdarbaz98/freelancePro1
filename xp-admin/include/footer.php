</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
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


            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>


            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>


            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>

<!-- Modal -->
<!-- <div class="modal fade imageGallery" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeModel" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->



<!-- /Right-bar -->

<div class="modal fade faq_forcontent" tabindex="-1" aria-labelledby="faq_forcontent" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-4">
                  <form id="post_faq">
                    <div class="model-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-8 gallery-part align-item-center" style="height: 500px !important; overflow-y: auto; overflow-x: hidden;">
                                                        <div class="card">
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            FAQ
                                                        </button>
                                                    </h2>
                                                <div id="forAppend">
                                                    <div class="time-box p-3" id="append_newFAQs_0">

                                                        <div class="form-group">
                                                            <label for="">Question</label>
                                                            <input type="text" name="faq_question[]" class="form-control" placeholder="Enter FAQ Quetion" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Answer</label>
                                                            <textarea name="faq_answer[]" cols="15" rows="5" class="form-control" placeholder="Enter FAQ Answer" value=""></textarea>
                                                        </div>

                                                        <div class="submit-btn">
                                                            <input type="button" class="float-right" style="border: 1px; margin-top:5px; background: #556ee6; color: #fff; padding: 6px;" value="Add More" onclick="appendpostFAQ()">
                                                        </div>

                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="btn" value="add_post_faq">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>

                </div>
            </div>
        </div>


<div class="modal fade imageGallery_forfeatureImages" tabindex="-1" aria-labelledby="imageGallery_forfeatureImages" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-4">
                    <div class="model-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-4 gallery-part">
                                    <div id="drag-drop-area"></div>
                                </div>
                                <div class="col-8 gallery-part" style="height: 500px !important; overflow-y: auto; overflow-x: hidden;">
                                <div class="row">
                                  <div class="col-sm-3 ms-auto">
                                  <div class="form-group d-block">
                                    <input type="text" class="form-control" id="search_image_features" placeholder="Search Image">
                                  </div>
                                </div>
                                </div>
                                <div class="row image-modal-features" id="load_images">  <?php 
                                        $images=$conn->prepare("SELECT * FROM images order by id desc");
                                        $images->execute();
                                        $i=0;
                                        $total_images = $images->rowCount();
                                        if ($total_images > 0) {
                                            while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
                                        ?>    
                                    <div class="col-3 img-checkbox">     
                                                            
                                    <input type="radio" id="cb<?php echo $i; ?>" name="images_id" value="<?php echo $row['id'] ?>"/ class="invisible">
                                            <label for="cb<?php echo $i; ?>" style="padding:10px;">
                                            <button class="btn btn-danger float-right" onclick="deleteImage(<?php echo $row['id']; ?>)">Delete</button>
                                            <img src="https://druggist.b-cdn.net/<?php echo $row['path']; ?>" alt="<?php echo $row['name']; ?>" class="img-rounded custome_images" onclick="Selectimage(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')">
                                            </label>
                                    </div>
                                <?php $i++; } }else{ ?>
                                            <p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
                                            <?php }?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="modal fade imageGallery_forcontentImages" tabindex="-1" aria-labelledby="imageGallery_forcontentImages" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-4">
                    <div class="model-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-4 gallery-part">
                                    <div id="drag-drop-area-content"></div>
                                </div>
                                <div class="col-8 gallery-part" style="height: 500px !important; overflow-y: auto; overflow-x: hidden;">
                                <div class="row">
                                  <div class="col-sm-3 ms-auto">
                                  <div class="form-group d-block">
                                    <input type="text" class="form-control" id="search_image" placeholder="Search Image">
                                  </div>
                                </div>
                                </div>

                                <div class="row image-modal-1" id="load_images_content">  <?php 
                                        $images=$conn->prepare("SELECT * FROM images order by id desc");
                                        $images->execute();
                                        $i=0;
                                        $total_images = $images->rowCount();
                                        if ($total_images > 0) {
                                            while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
                                        ?>    
                                    <div class="col-3 img-checkbox">     
                                                            
                                    <input type="radio" id="cba<?php echo $i; ?>" name="images_id" value="<?php echo $row['id'] ?>" class="invisible">
                                            <label for="cba<?php echo $i; ?>" style="padding:10px">
                                            <button class="btn btn-danger" style="float:right" onclick="deleteImagecontent(<?php echo $row['id']; ?>)">Delete</button>
                                            
                                            <img src="https://druggist.b-cdn.net/<?php echo $row['path']; ?>" alt="<?php echo $row['name']; ?>" class="img-rounded custome_images" onclick="contenImage('<?php echo $row['path']; ?>')">
                                            </label>
                                    </div>
                                <?php $i++; } }else{ ?>
                                            <p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
                                            <?php }?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="imageGallery_forproductImages" style="display: none;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-4">
                    <div class="model-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-4 gallery-part">
                                    <div id="drag-drop-area-product-image"></div>
                                </div>
                                <div class="col-8 gallery-part" style="height: 500px !important; overflow-y: auto; overflow-x: hidden;">
                                <div class="row">
                                  <div class="col-sm-3 ms-auto">
                                  <div class="form-group d-block">
                                    <input type="text" class="form-control" id="search_image_product" placeholder="Search Image">
                                  </div>
                                </div>
                                </div>
                                <div class="row image-modal-product" id="load_images_product">  <?php 
                                        $images=$conn->prepare("SELECT * FROM images order by id desc");
                                        $images->execute();
                                        $i=0;
                                        $total_images = $images->rowCount();
                                        if ($total_images > 0) {
                                            while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
                                        ?>    
                                    <div class="col-3 img-checkbox">     
                                                            
                                    <input type="radio" id="cb<?php echo $i; ?>" name="images_id" value="<?php echo $row['id'] ?>"/ class="invisible">
                                            <label for="cb<?php echo $i; ?>" style="padding:10px;">
                                            <button class="btn btn-danger float-right" onclick="deleteproductImage(<?php echo $row['id']; ?>)">Delete</button>
                                            <img src="https://druggist.b-cdn.net/<?php echo $row['path']; ?>" alt="<?php echo $row['name']; ?>" class="img-rounded custome_images" onclick="Selectimage(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')">
                                            </label>
                                    </div>
                                <?php $i++; } }else{ ?>
                                            <p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
                                            <?php }?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<!-- <script src="assets/libs/jquery/jquery.min.js"></script> -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- file-manager js -->
<script src="assets/js/pages/file-manager.init.js"></script>
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>
<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>
<script src="https://unpkg.com/@yaireo/tagify@4.9.8/dist/tagify.min.js"></script>
<script>
    var input = document.querySelector('input[name=strength]');
    new Tagify(input)
    var input = document.querySelector('input[name=pack]');
    new Tagify(input)
    var input = document.querySelector('input[name=tags]');
    new Tagify(input)
</script>
<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->
<script src="assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
<!-- <script src="assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script> -->
<!-- <script src="assets/libs/@chenfengyuan/datepicker/datepicker.min.js"></script> -->
<!--<script src="https://www.jqueryscript.net/demo/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/jquery.datetimepicker.js"></script>-->
<script src='https://transloadit.edgly.net/releases/uppy/v1.0.0/uppy.min.js'></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/main.js"></script>
<script>
    // $('.closeModel').click(function(){
    //     $('.imageGallery')
    // })
    var uppy = new Uppy.Core()
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area'
        })
        .use(Uppy.Webcam, { target: Uppy.Dashboard })
        .use(Uppy.XHRUpload, { endpoint: 'action_file.php', method:'post'})

        uppy.on('complete', (result) => {
          if(result.successful.length>0){
            alert('uploaded');
            getAllimages();
          }else {
            alert('error');
          }
        });

        // for content images
        var uppy = new Uppy.Core()
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area-content'
        })
        .use(Uppy.Webcam, { target: Uppy.Dashboard })
        .use(Uppy.XHRUpload, { endpoint: 'action_file.php', method:'post'})

        uppy.on('complete', (result) => {
          if(result.successful.length>0){
            alert('uploaded');
            getAllimagesforContent();
          }else {
            alert('error');
          }
        });

         // for product images
         var uppy = new Uppy.Core()
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area-product-image'
        })
        .use(Uppy.Webcam, { target: Uppy.Dashboard })
        .use(Uppy.XHRUpload, { endpoint: 'action_fileproduct.php', method:'post'})

        uppy.on('complete', (result) => {
          if(result.successful.length>0){
            alert('uploaded');
            getAllproductimages();
          }else {
            alert('error');
          }
        });
   
        function showPreview(event) {
  if (event.target.files.length > 0) {
    var src = URL.createObjectURL(event.target.files[0])
    var preview = document.getElementById('file-ip-1-preview')
    preview.src = src
    preview.style.display = 'block'
  }
}

$('.toggle-password').click(function () {
  $(this).toggleClass('fa-eye fa-eye-slash')
  input = $(this).parent().find('input')
  if (input.attr('type') == 'password') {
    input.attr('type', 'text')
  } else {
    input.attr('type', 'password')
  }
})

$('#datetimepicker_mask').datetimepicker({
  mask: '9999/19/39 29:59',
})
var currentdate = new Date()

var hour = currentdate.getHours()
if (hour.toString().length > 1) {
  var hour = currentdate.getHours()
} else {
  var hour = '0' + currentdate.getHours()
}
var min = currentdate.getMinutes()
if (min.toString().length > 1) {
  var min = currentdate.getMinutes()
} else {
  var min = '0' + currentdate.getMinutes()
}

var time =
  currentdate.getFullYear() +
  '/' +
  (currentdate.getMonth() + 1) +
  '/' +
  currentdate.getDate() +
  ' ' +
  hour +
  ':' +
  '00'

$('#datetimepicker2').val(time)
$('#datetimepicker2').focus( function() {
    $(this).datetimepicker()
});


$('#datetimepickerupdate').datetimepicker();

// $('#datetimepicker2').datetimepicker()

        // for content images
        var input = document.getElementById('search_image');
        
        var image1 = document.querySelectorAll('.image-modal-1 img')
        input.addEventListener('input',(e) => {
            image1.forEach((image)=> {
              const isVisible = image.getAttribute('alt').includes(e.target.value) ;
                var mainParent = image.parentElement
                mainParent.parentElement.classList.toggle("hide",!isVisible);
            })
        });

        // for features images
        var input = document.getElementById('search_image_features');
        var image = document.querySelectorAll('.image-modal-features img')
        input.addEventListener('input',(e) => {
            image.forEach((image)=> {
                const isVisible = image.getAttribute('alt').includes(e.target.value) ;
                var mainParent = image.parentElement
                mainParent.parentElement.classList.toggle("hide",!isVisible);
            })
        });

        // for product images
        var input = document.getElementById('search_image_product');
        var image2 = document.querySelectorAll('.image-modal-product img')
        input.addEventListener('input',(e) => {
            image2.forEach((image)=> {
                const isVisible = image.getAttribute('alt').includes(e.target.value) ;
                var mainParent = image.parentElement
                mainParent.parentElement.classList.toggle("hide",!isVisible);
            })
        });

        


        

// $('#datetimepicker2').datetimepicker();


// $('#datetimepicker2').datetimepicker()

// if (window.location.href.includes('add-post.php')) {
//   $('#datetimepicker2').datetimepicker({ value: time })
// }
// Post Categories Starts From Here

// $("#post_faq").on("submit", function (e) {
//   e.preventDefault();
//   var formData = new FormData(this);
//   $.ajax({
//     url: "post_faq.php",
//     type: "post",
//     data: formData,
//     contentType: false,
//     cache: false,
//     processData: false,
//     success: function (data) {
//       // if(data=='aaa'){
//       //   alert("required");
//       // }

//       var myContent = tinymce.get("postContent").getContent()+data;
//       tinymce.get("postContent").setContent(myContent); 
//       $('#getDataNew').prepend(myContent);
//       var text_data = $('#postContent').val()+myContent;
//       // $('#postContent_ifr').val(text_data);
//     },
//   });
// });


            $("#post_faq").validate({
                rules: {
                    "faq_answer[]": {required:true},
                    "faq_question[]": {required: true},
                      },
                message: {
                  faq_question: "Please enter username",
                },
                submitHandler: function (form) {
                        $.ajax({
                        url: 'post_faq.php',
                        type: 'post',
                        data: new FormData(form),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                          // var myContent = tinymce.get("postContent").getContent()+data;
                          // tinymce.get("postContent").setContent(myContent); 
                          tinymce.get("postContent").execCommand('mceInsertContent',false,data);
                          var myContent = tinymce.get("postContent").getContent();
                          $('#getDataNew').html(myContent);
                          alert("FAQ Added");
                          $('.faq_forcontent').modal('toggle');

                          //var text_data = $('#postContent').val()+myContent;                      
                        }
                    });   
                }
            });
       
       

$('#form_submit1').validate({
  rules: {
    files: {
      required: true,
      extension: 'jpg|png|jpeg',
    },
  },
  message: {
    files: 'select image',
  },
  submitHandler: function (form) {
    // alert(form)
    $.ajax({
      url: 'upload.php',
      type: 'post',
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        getAllimages()
        $('.nav-link').removeClass('active')
        $('#profile-tab,#profile-tab1,#profile-tab2').click()
        $('#profile-tab,#profile-tab1,#profile-tab2').addClass('active')

        // console.log(data)

        // if(data=='updated')
        // {
        //     alert("Blog Update Successfully");
        // }
        // else
        // {
        // }
        // $("#update_blog_form").trigger("reset");
      },
    })
  },
})


</script>
</body>

</html>