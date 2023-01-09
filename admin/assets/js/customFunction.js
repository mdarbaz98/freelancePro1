$('#form_submit,#form_submit1,#form_submit2').validate({
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

// for image validation
function imageUdatevalidate() {
  $('#imageUpdate,#imageUpdate1').validate({
    rules: {
      alt: {
        required: true,
      },
      title: {
        required: true,
      },
    },
    message: {
      alt: 'enter',
    },
    submitHandler: function (form) {
      $.ajax({
        url: 'action.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          if (data == 'updated') {
            alert('Image Updated Successfully')
          } else {
            alert('Something Went Wrong')
          }
          // $("#update_blog_form").trigger("reset");
        },
      })
    },
  })
}
// get current all images
function getAllimages() {
  $.ajax({
    url: 'get_images.php',
    type: 'post',
    data: {
      btn: 'getAllimages',
    },
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      alert(data)
      console.log(data)
      $('#getall_images').html(data)
    },
  })
}

var setImgAgain

// onclick change right panel image data
function imageChahge(id, path) {
  $.ajax({
    type: 'POST',
    url: 'upload.php',
    dataType: 'html',
    data: {
      image_id: id,
    },
    success: function (data) {
      $('#for_dynamicImage,#for_dynamicImage1,#for_dynamicImage2').html(data)
      //location.reload();
      // alert(data);
      //$('.image_id').attr('value', id)
      setImgAgain = path
      // $('.image_path').attr('src', path)
      // console.log($('.image_path').attr('src', path));
      
        var img = `<img src="${path}" alt="" onclick="removeImg(this)" class="set_images" style="width:90px">`; 
        $(".set_images").append(img);
    
      // $('.customefeature_image').show()
      imageUdatevalidate()
    },
  })
}

function removeImg(ele){
  alert('hi')
  ele.remove()
}

function contenImage(id, path) {
  $.ajax({
    type: 'POST',
    url: 'upload.php',
    dataType: 'html',
    data: {
      image_id: id,
    },
    success: function (data) {
      $('#for_dynamicImage,#for_dynamicImage1,#for_dynamicImage2').html(data)
      $('#content_ifr')
        .contents()
        .find('body')
        .append('<img src="' + path + '">')
      imageUdatevalidate()
    },
  })
}
function postImagechange(id, path) {
  $.ajax({
    type: 'POST',
    url: 'upload.php',
    dataType: 'html',
    data: {
      image_id: id,
    },
    success: function (data) {
      $('#for_dynamicImage,#for_dynamicImage1,#for_dynamicImage2').html(data)
      $('#content_ifr')
        .contents()
        .find('body')
        .append('<img src="' + path + '">')
      imageUdatevalidate()
    },
  })
}

const INPUT_FILE = document.querySelector('#upload-files')
const INPUT_CONTAINER = document.querySelector('#upload-container')
const FILES_LIST_CONTAINER = document.querySelector('#files-list-container')
const FILE_LIST = []
let UPLOADED_FILES = []

const multipleEvents = (element, eventNames, listener) => {
  const events = eventNames.split(' ')

  events.forEach((event) => {
    element.addEventListener(event, listener, false)
  })
}

const previewImages = () => {
  FILES_LIST_CONTAINER.innerHTML = ''
  if (FILE_LIST.length > 0) {
    FILE_LIST.forEach((addedFile, index) => {
      const content = `
            <div class="form__image-container js-remove-image" data-index="${index}">
              <img class="form__image" src="${addedFile.url}" alt="${addedFile.name}">
            </div>
          `

      FILES_LIST_CONTAINER.insertAdjacentHTML('beforeEnd', content)
    })
  } else {
    console.log('empty')
    INPUT_FILE.value = ''
  }
}

const fileUpload = () => {
  if (FILES_LIST_CONTAINER) {
    multipleEvents(INPUT_FILE, 'click dragstart dragover', () => {
      INPUT_CONTAINER.classList.add('active')
    })

    multipleEvents(INPUT_FILE, 'dragleave dragend drop change blur', () => {
      INPUT_CONTAINER.classList.remove('active')
    })

    INPUT_FILE.addEventListener('change', () => {
      const files = [...INPUT_FILE.files]
      console.log('changed')
      files.forEach((file) => {
        const fileURL = URL.createObjectURL(file)
        const fileName = file.name
        if (!file.type.match('image/')) {
          alert(file.name + ' is not an image')
          console.log(file.type)
        } else {
          const uploadedFiles = {
            name: fileName,
            url: fileURL,
          }

          FILE_LIST.push(uploadedFiles)
        }
      })

      console.log(FILE_LIST) //final list of uploaded files
      previewImages()
      UPLOADED_FILES = document.querySelectorAll('.js-remove-image')
      removeFile()
    })
  }
}

const removeFile = () => {
  UPLOADED_FILES = document.querySelectorAll('.js-remove-image')

  if (UPLOADED_FILES) {
    UPLOADED_FILES.forEach((image) => {
      image.addEventListener('click', function () {
        const fileIndex = this.getAttribute('data-index')

        FILE_LIST.splice(fileIndex, 1)
        previewImages()
        removeFile()
      })
    })
  } else {
    ;[...INPUT_FILE.files] = []
  }
}

fileUpload()
removeFile()

// Delete Category
function deleteCategory(id) {
  var x = confirm('Are you sure you want to permanent delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deleteCategory_id: id,
        btn: 'deleteCategory_id',
      },
      success: function (data) {
        if (data == 'deleted') {
          alert('Category Successfully Deleted')
          location.reload()
        }
      },
    })
  }
}
//Delete user
function deleteUser(id) {
  var x = confirm('Are you sure you want to permanent delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deleteUser_id: id,
        btn: 'deleteUser_id',
      },
      success: function (data) {
        if (data == 'deleted') {
          alert('User Successfully Deleted')
          location.reload()
        }
      },
    })
  }
}
// upload
function uploadProduct(id) {
  var x = confirm('Are you sure you want to upload this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        uploadProduct_id: id,
        btn: 'uploadProduct_id',
      },
      success: function (data) {
        if (data == 'uploaded') {
          alert('Product Successfully Uploaded')
          location.reload()
        }
      },
    })
  }
}
//Trash product
function trashProduct(id) {
  var x = confirm('Are you sure you want to trash this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        trashProduct_id: id,
        btn: 'trashProduct_id',
      },
      success: function (data) {
        if (data == 'trashed') {
          alert('Product Successfully Trashed')
          location.reload()
        }
      },
    })
  }
}
//Trash enquiry
function trashEnquiry(id) {
  var x = confirm('Are you sure you want to trash this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        trashEnquiry_id: id,
        btn: 'trashEnquiry_id',
      },
      success: function (data) {
        if (data == 'trashed') {
          alert('Enquiry Successfully Trashed')
          location.reload()
        }
      },
    })
  }
}
// delete enquiry
function deleteEnquiry(id) {
  var x = confirm('Are you sure you want to delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deleteEnquiry_id: id,
        btn: 'deleteEnquiry_id',
      },
      success: function (data) {
        if (data == 'deleted') {
          alert('Enquiry Successfully deleted')
          location.reload()
        }
      },
    })
  }
}
//Permanent Delete product
function deleteProduct(id) {
  var x = confirm('Are you sure you want to permanent delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deleteProduct_id: id,
        btn: 'deleteProduct_id',
      },
      success: function (data) {
        if (data == 'deleted') {
          alert('Product Successfully Deleted')
          location.reload()
        }
      },
    })
  }
}
// Remove features images
function removeFeatureimage(id) {
  alert(id)
  $.ajax({
    type: 'POST',
    url: 'action.php',
    dataType: 'html',
    data: {
      removeFeatureimage_id: id,
      btn: 'removeFeatureimage_id',
    },
    success: function (data) {
      if (data == 'removed') {
        if (!setImgAgain) {
          $('.blog-img-box').html(
            '<img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png">',
          )
          $('#remove_btn').hide()
        } else {
          $('.set_images img').attr('src', setImgAgain)
        }
      }
    },
  })
}

// Remove product images
function removeproductimage(img_id,pro_id) {
  alert("img "+img_id)
  alert("pro "+pro_id)
  $.ajax({
    type: 'POST',
    url: 'action.php',
    dataType: 'html',
    data: {
      removeproductimage_id: img_id,
      removepro_id: pro_id,
      btn: 'removeproductimage_id',
    },
    success: function (data) {
      if (data == 'removed') {
        alert('removed')
        location.reload()
        //   if (!setImgAgain) {
        //     $('.blog-img-box').html(
        //       '<img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png">',
        //     )
        //     $('#remove_btn').hide()
        //   } else {
        //     $('.image_path').attr('src', setImgAgain)
        //   }
        // }
      }
    },
  })
}

function removeCategoryimage(cat_id) {
  alert("img "+cat_id)
  $.ajax({
    type: 'POST',
    url: 'action.php',
    dataType: 'html',
    data: {
      removecategoryimage_id: cat_id,
      btn: 'removecategoryimage_id',
    },
    success: function (data) {
      if (data == 'removed') {
        alert('removed')
        location.reload()
        //   if (!setImgAgain) {
        //     $('.blog-img-box').html(
        //       '<img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png">',
        //     )
        //     $('#remove_btn').hide()
        //   } else {
        //     $('.image_path').attr('src', setImgAgain)
        //   }
        // }
      }
    },
  })
}

// Delete feature Images
function deleteFeatureimage(id) {
  var x = confirm('Are you sure you want to permanent delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deleteFeatureimage_id: id,
        btn: 'deleteFeatureimage_id',
      },
      success: function (data) {
        if (data == 'deleted') {
          alert('Deleted Successfully')
          getAllimages()
          //location.reload()
        }
      },
    })
  }
}

function setFrontproductimage(id){
  alert(id);
  $.ajax({
    type: 'POST',
    url: 'action.php',
    dataType: 'html',
    data: {
      setFrontimage_id: id,
      btn: 'setFrontimage_id',
    },
    success: function (data) {
      if (data == 'updated') {
        alert('Image Set Successfully')
        location.reload()
      }
    },
  })

}

//Delete cta
function deleteCta(id) {
  var x = confirm('Are you sure you want to permanent delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deleteCta_id: id,
        btn: 'deleteCta_id',
      },
      success: function (data) {
        if (data == 'deleted') {
          alert('Cta Successfully Deleted')
          location.reload()
        }
      },
    })
  }
}

//post search text here
$('#search_post_title').keyup(function () {
  var name = $('#search_post_title').val()
  if (name == '') {
    //Assigning empty value to "display" div in "search.php" file.
    $('#datatable').html('')
    //alert("blank");
  } else {
    $.ajax({
      type: 'post',
      url: 'getFilter_table.php',
      data: { post_title: name, btn: 'post_title' },
      cache: false,
      success: function (data) {
        $('#datatable').html(data)
        //alert(data);
        //console.log(data);
      },
    })
  }
})

// product search table

$('#product_search_table').keyup(function () {
  var name = $('#product_search_table').val()
  if (name == '') {
    //Assigning empty value to "display" div in "search.php" file.
    $('#datatable').html('')
    //alert("blank");
  } else {
    $.ajax({
      type: 'post',
      url: 'getFilter_table.php',
      data: { pro_name: name, btn: 'pro_name' },
      cache: false,
      success: function (data) {
        $('#datatable').html(data)
        //alert(data);
        //console.log(data);
      },
    })
  }
})

//blog section of pass
function blogTrashRows(id) {
  var x = confirm('Are you sure you want to trash this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        blog_id_trash: id,
        btn: 'blog_id_trash',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        //location.reload();
        alert(data)
        //console.log(data);
        location.reload()
      },
    })
  }
}
// post trash
function trashPost(id) {
  var x = confirm('Are you sure you want to trash this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        trashPost_id: id,
        btn: 'trashPost_id',
      },
      success: function (data) {
        if (data == 'trashed') {
          alert('Post Successfully Trashed')
          location.reload()
        }
      },
    })
  }
}
// upload
function uploadPost(id) {
  var x = confirm('Are you sure you want to upload this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        uploadPost_id: id,
        btn: 'uploadPost_id',
      },
      success: function (data) {
        if (data == 'uploaded') {
          alert('Post Successfully Uploaded')
          location.reload()
        }
      },
    })
  }
}
// blog permanent delete
function deletePost(id) {
  var x = confirm('Are you sure you want to permanent delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deletePost_id: id,
        btn: 'deletePost_id',
      },
      success: function (data) {
        if (data == 'deleted') {
          alert('post Successfully Deleted')
          location.reload()
        }
      },
    })
  }
}
// blog restore data
function blogRestoreRows(id) {
  var x = confirm('Are you sure you want to restore this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        blog_id_restore: id,
        btn: 'blog_id_restore',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        //location.reload();
        alert(data)
        location.reload()
      },
    })
  }
}
// blog upload function
function blogUploadRows(id) {
  var x = confirm('Are you sure you want to upload this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        blogUploadRows_id: id,
        btn: 'blogUploadRows_id',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        //location.reload();
        alert(data)
        location.reload()
      },
    })
  }
}

// quotes trash row function

function quotesTrashRows(id) {
  var x = confirm('Are you sure you want to trash this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        quotesTrashRows_id: id,
        btn: 'quotesTrashRows_id',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        //location.reload();
        alert(data)
        //console.log(data);
        location.reload()
      },
    })
  }
}
// quotes delete function
function quotesPermenetDelete(id) {
  var x = confirm('Are you sure you want to permanent delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        quotesPermenetDelete_id: id,
        btn: 'quotesPermenetDelete_id',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        //location.reload();
        alert(data)
        //console.log(data);
        location.reload()
      },
    })
  }
}

// Quotes restore function

function quoteRestoreRows(id) {
  var x = confirm('Are you sure you want to restore this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        quoteRestoreRows_id: id,
        btn: 'quoteRestoreRows_id',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        //location.reload();
        alert(data)
        //console.log(data);
        location.reload()
      },
    })
  }
}
// quotes upload function
function uploadDraftdata(id) {
  var x = confirm('Are you sure you want to upload this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        uploadDraftdata_id: id,
        btn: 'uploadDraftdata_id',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        //location.reload();
        alert(data)
        //console.log(data);
        location.reload()
      },
    })
  }
}
// author delete function

function deleteFunctionAuthor(id) {
  var x = confirm('Are you sure you want to delete this?')
  if (x) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        deleteFunctionAuthor_id: id,
        btn: 'deleteFunctionAuthor_id',
      },
      success: function (data) {
        //$("#whats_new").html(data);
        alert(data)
        location.reload()
      },
    })
  }
}

let counter = 1
function appendQuotesAuthor() {
  var html = ` <div id=${'author_block_meta_block_' + counter} class="row mt-5">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Enter Author's Description</label>
                            <textarea class="form-control" name="quote[]" rows="8"></textarea>
                            </div>
                        </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Author Position</label>
                            <input type="text" class="form-control" name="authorname[]" placeholder="Author Name">
                        </div>

                        <div class="form-group">
                            <label for="resume ">Upload</label>
                            <input type="file" accept="image/png, image/jpeg" class="form-control" name="author_image[]">
                        </div>	
                        <div class="d-flex clearfix">
                        <span class="btn1 add-btn float-left" onclick="appendQuotesAuthor()">Add More</span>
                        <span class="btn1 add-btn float-left" onclick="deleteQuotesAuthor(${counter})" style="background:#7e37d8;">Delete</span>
                        </div>  
                    </div>                            
            </div>`

  $('#forAppend').append(html)
  counter++
}

function deleteQuotesAuthor(target) {
  const ele = document.getElementById('author_block_meta_block_' + target)
  ele.remove()
}

//blog search text here
$('#search_blog_title').keyup(function () {
  var name = $('#search_blog_title').val()
  //alert(name);
  if (name == '') {
    //Assigning empty value to "display" div in "search.php" file.
    $('#datatable').html('')
    //alert("blank");
  } else {
    $.ajax({
      type: 'post',
      url: 'get_filterTable.php',
      data: { blog_title: name, btn: 'blog_title' },
      cache: false,
      success: function (data) {
        $('#datatable').html(data)
        //alert(data);
        //console.log(data);
      },
    })
  }
})

//quotes search text here
$('#search_quotes_title').keyup(function () {
  var name = $('#search_quotes_title').val()
  //alert(name);
  if (name == '') {
    //Assigning empty value to "display" div in "search.php" file.
    $('#datatable').html('')
    //alert("blank");
  } else {
    $.ajax({
      type: 'post',
      url: 'get_filterTable.php',
      data: { quotes_title: name, btn: 'quotes_title' },
      cache: false,
      success: function (data) {
        $('#datatable').html(data)
        //alert(data);
        //console.log(data);
      },
    })
  }
})

function image_update_Function(id) {
  alert('fdfsd')
  // $("#others_category_section1").modal('show');
  if (id) {
    $.ajax({
      type: 'POST',
      url: 'blog_edit.php',
      dataType: 'html',
      data: {
        quotes_author_id: id,
      },
      success: function (data) {
        //location.reload();
        //alert(data);
        console.log(data)

        $('#upload_image_here').html(data)
        loadImageUpdateCode()
      },
    })
  }
}

function loadImageUpdateCode() {
  $('#add_image_upload').on('submit', function (event) {
    event.preventDefault()
    alert('work')
    $.ajax({
      url: 'action.php',
      type: 'post',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        console.log(data)
      },
    })
  })
}

function quotes_update_authors(id) {
  alert(id)
  $('#quotes_update_contet').modal('show')
  if (id) {
    $.ajax({
      type: 'POST',
      url: 'action.php',
      dataType: 'html',
      data: {
        quotes_author_content_id: id,
        btn: 'quotes_author_content_id',
      },
      success: function (data) {
        //location.reload();
        //alert(data);
        console.log(data)
        $('#author_content_form').html(data)
        loadQuoteUpdateCode()
      },
    })
  }
}

function loadQuoteUpdateCode() {
  $('#update_author_data').on('submit', function (event) {
    event.preventDefault()
    $.ajax({
      url: 'action.php',
      type: 'post',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        console.log(data)
      },
    })
  })
}
// $("#add_image_upload").on("submit", function (event) {
//     event.preventDefault();
//     alert("work");
// });

// SEO Title KeyUp Function
function copytext_cat(e) {
  let ctrC = document.getElementById('cat').value
  //alert(ctrC)
  str = ctrC.replace(/\s+/g, '-').toLowerCase()
  document.getElementById('cat_slug').value = str
}

function editCategory() {}
//validation for category//

function appendInput() {
  var html = ` <div class="input-box">
        <div class="row">
       <div class="col-lg-6">
           <textarea name="quote[]" rows="8"  style="margin-right:20px;width:100%"></textarea>
               </div>
               <div class=" col-lg-5">
               <div>
               <label>Author Name</label>
               <input type="text" name="authorname[]" placeholder="Author Name"> </div>
               <div>
               <label>Author Position</label>
   
           <input type="text" name="authorposition[]" placeholder="Author Position"> </div>
           <div>
           <label for="resume ">Upload</label>
           <input type="file" class="form-control" name="author_image[]"> </div>
           </div>

<button class="remove-lnk" style="background:#7e37d8;color:white;border-radius:7px;padding:10px 10px;cursor:pointer;display:inline-block;height:40px;width:80px;top: 85px;">Delete</button>
</div>`

  $('.wrapper').append(html)
}

$('.author_change_other').change(function () {
  var val = $('#author_change_other').val()

  let position = val.includes('others')
  //const lastVal="";

  if (position) {
    $('#others_author_section').modal('show')
  }
  //alert(val);
  else {
  }

  $('#add_author_other').validate({
    rules: {
      author_name: 'required',
      email: 'required',
      password: 'required',
      image: {
        required: true,
        extension: 'jpg|png|jpeg',
      },
      message: {
        required: true,
      },
      position: {
        required: true,
      },
    },
    message: {
      author_name: 'Please enter username',
      email: 'Please enter username',
      password: 'Please enter username',
    },
    submitHandler: function (form) {
      //alert("validated");

      var authors = $('#author_change_other').val()
      var formData = new FormData(form)
      formData.append('author_id', authors)
      //                    console.log(formData);

      $.ajax({
        url: 'edit_author.php',
        type: 'post',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          console.log(data)
          alert('New Author Added')
          $('#others_author_section').modal('hide')
          $('#author_change_other').html(data)
          //location.reload();
          console.log(data)
        },
      })
    },
  })
})

$('#category').change(function () {
  var id = $(this).val()
  //alert(id)

  if (id == 'others') {
    //  alert("others");

    $('#others_category_section').modal('show')
    $('#add_category').validate({
      rules: {
        cat: 'required',
        sub_cat: 'required',
        cat_slug: 'required',
      },
      message: {
        cat: 'Please enter username',
        sub_cat: 'Please enter username',
        cat_slug: 'Please enter username',
      },
      submitHandler: function (form) {
        // alert("validated");

        $.ajax({
          url: 'category_edit.php',
          type: 'post',
          data: new FormData(form),
          contentType: false,
          cache: false,
          processData: false,
          success: function (data) {
            alert('Cat')
            console.log(data)
            $('#others_category_section').modal('hide')
            //location.reload();
          },
        })
      },
    })
  }

  $.ajax({
    type: 'post',
    url: 'get_subcat.php',
    data: { cat_id: id },
    cache: false,
    success: function (data) {
      $('.sub_category111').html(data)
      $('.chosen-select').chosen({
        no_results_text: 'Oops, nothing found!',
      })
      //alert(data);
      //console.log(data);
    },
  })
  //    }  // if close
})

// blog title filter

$('#blog_title_change_other').change(function () {
  alert('fdsfds')
  var id = $(this).val()

  alert(id)

  $.ajax({
    type: 'post',
    url: 'get_title_blog.php',
    data: { blog_id: id },
    cache: false,
    success: function (data) {
      $('#datatable').html(data)
      //alert(data);
      console.log(data)
    },
  })
})
