// cta
$('#cta_form').validate({
  rules: {
    title: 'required',
    shrt_dtl: 'required',
    category: {
      required: true,
    },
    field: {
      required: true,
    },
  },
  messages: {},
  submitHandler: function (form) {
    $.ajax({
      url: 'action.php',
      type: 'post',
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        console.log(data)
      },
    })
  },
})
$('#updateCta').validate({
  rules: {
    title: 'required',
    shrt_dtl: 'required',
    category: {
      required: true,
    },
    url: {
      required: true,
    },
  },
  messages: {},
  submitHandler: function (form) {
    $.ajax({
      url: 'action.php',
      type: 'post',
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        console.log(data)
      },
    })
  },
})

//product
$('#product_form').validate({
  rules: {
    pro_name: 'required',
    description: 'required',
    content: 'required',
    title: 'required',
    seo_title: 'required',
    strn: { required: true },
    prc: { required: true },
    slug: {
      required: true,
    },
    link: {
      required: true,
    },
    category: {
      required: true,
    },
    img_id: {
      required: true,
    },
  },
  messages: {},
  submitHandler: function (form) {
    $.ajax({
      url: 'action.php',
      type: 'post',
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        $('#exampleModal').modal('show')
        getAllimages()
        $('.nav-link').removeClass('active')
        $('#profile-tab,#profile-tab1,#profile-tab2').click()
        $('#profile-tab,#profile-tab1,#profile-tab2').addClass('active')
        //        console.log(data)
      },
    })
  },
})
$('#updateProduct').validate({
  rules: {
    pro_name: 'required',
    content: 'required',
    description: 'required',
    title: 'required',
    seo_title: 'required',
    strn: { required: true },
    prc: { required: true },
    slug: {
      required: true,
    },
    link: {
      required: true,
    },
    category: {
      required: true,
    },
    img_id: {
      required: true,
    },
  },
  messages: {},
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
          alert('Product Updated Successfully')
          location.reload()
        } else {
          alert('Some Technical Issue')
        }
      },
    })
  },
})

$('#user_form').validate({
  rules: {
    name: 'required',
    username: 'required',
    pwd: {
      required: true,
    },
    img_id: {
      required: true,
    },
  },
  messages: {},
  submitHandler: function (form) {
    $.ajax({
      url: 'action.php',
      type: 'post',
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        console.log(data)
      },
    })
  },
})

$('#Updateuser').validate({
  rules: {
    name: 'required',
    username: 'required',
    pwd: {
      required: true,
    },
    img_id: {
      required: true,
    },
  },
  messages: {},
  submitHandler: function (form) {
    $.ajax({
      url: 'action.php',
      type: 'post',
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        alert(data)
        console.log(data)
      },
    })
  },
})
//
$('#addCategory').validate({
  rules: {
    category: 'required',
    title: 'required',
    content: { required: true },
    slug: { required: true },
    cat_name: {
      required: true,
    },
    desc: {
      required: true,
    },
    img_id: {
      required: true,
    },
  },
  messages: {
    title: 'Please Enter  Title',
    category: 'Please Select Category',
    img_id: 'Select Image',
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
        alert(data)
        console.log(data)
      },
    })
  },
})
// update category
$('#updateCategory').validate({
  rules: {
    category: 'required',
    title: 'required',
    content: { required: true },
    slug: { required: true },
    cat_name: {
      required: true,
    },
    desc: {
      required: true,
    },
    img_id: {
      required: true,
    },
  },
  messages: {
    title: 'Please Enter  Title',
    category: 'Please Select Category',
    img_id: 'Select Image',
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
          alert('Category Updated Successfully')
          location.reload()
        } else {
          alert('Some Technical Issue')
        }
      },
    })
  },
})

$('#addPost').validate({
  rules: {
    title: 'required',
    content: 'required',
    seo_title: 'required',
    slug: 'required',
    img_id: {
      required: true,
      extension: 'jpg|png|jpeg',
    },
    meta_desc: {
      required: false,
    },
    category: {
      required: true,
    },
    description: {
      required: false,
    },
  },
  message: {
    title: 'Please enter username',
    seo_title: 'Please enter username',
    slug: 'Please enter username',
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
        console.log(data)
        alert(data)
        if (data == 'inserted') {
          alert('post Added Successfully')
          $('#addPost').trigger('reset')
        } else {
          alert('Some Technical Issue')
        }
      },
    })
  },
})

//post update validation
$('#updatePost').validate({
  rules: {
    title: 'required',
    content: 'required',
    seo_title: 'required',
    slug: 'required',
    img_id: {
      required: true,
      extension: 'jpg|png|jpeg',
    },
    meta_desc: {
      required: false,
    },
    category: {
      required: true,
    },
    description: {
      required: false,
    },
  },
  message: {
    title: 'Please enter username',
    seo_title: 'Please enter username',
    slug: 'Please enter username',
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
          alert('Post Updated Successfully')
          location.reload()
        } else {
          alert('Some Technical Issue')
        }
      },
    })
  },
})

// blog page end validation

$('#update_blog_form').submit(function (event) {
  event.preventDefault()
  alert('blog update form')
})
$('#update_blog_form').validate({
  rules: {
    blog_title: 'required',
    content: 'required',
    blog_title_seo: 'required',
    blog_slug: 'required',
    // img: {
    //     required: false,
    //   //  extension: "jpg|png|jpeg"
    // },
    img_alt: {
      required: false,
    },
    img_title: {
      required: false,
    },
    focus_keyword: {
      required: true,
    },
    publisher: {
      required: true,
    },
    publisher_logo: {
      required: true,
    },
    meta_title: {
      required: true,
    },
    permalink: {
      required: true,
    },
    description_meta: {
      required: true,
    },
    visibility: {
      required: true,
      //minlength:5
    },
    category: {
      required: true,
      //minlength:5
    },
    sub_category: {
      required: true,
      //minlength:5
    },
    message: {
      required: false,
    },
  },
  message: {
    blog_title: 'Please enter username',
    blog_title_seo: 'Please enter username',
    blog_slug: 'Please enter username',
    focus_keyword: 'Please enter username',
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
        alert(data)
        if (data == 'updated') {
          alert('Blog Update Successfully')
        } else {
        }
        $('#update_blog_form').trigger('reset')
      },
    })
  },
})

$('#addQuotes').submit(function (event) {
  event.preventDefault()
  alert('quotes add form')
})
$('#addQuotes').validate({
  rules: {
    quote_title: 'required',
    content: 'required',
    quote_title_seo: 'required',
    quote_slug: 'required',
    img: {
      required: true,
      extension: 'jpg|png|jpeg',
    },
    focus_keyword: {
      required: true,
    },
    publisher: {
      required: true,
    },
    publisher_logo: {
      required: true,
    },
    meta_title: {
      required: false,
    },
    permalink: {
      required: true,
    },
    description_meta: {
      required: true,
    },
    visibility: {
      required: true,
      //minlength:5
    },
    category: {
      required: true,
      //minlength:5
    },
    message: {
      required: false,
    },
    'open-source-plugins-Quote-page': { required: true },
    img: {
      required: false,
    },
    'quote[]': {
      required: true,
    },
    'authorname[]': {
      required: true,
    },
  },
  message: {
    quote_title: 'Please enter username',
    quote_title_seo: 'Please enter username',
    quote_slug: 'Please enter username',
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
        console.log(data)
        if (data == 'inserted') {
          alert('Quotes Added Successfully')
        } else {
        }

        //$("#addQuotes").trigger("reset");
      },
    })
  },
})
// add quotes close here

// edit quotes statr here
$('#updateQuotes').submit(function (event) {
  event.preventDefault()
  alert('quotes update')
  $('#updateQuotes').validate({
    rules: {
      quote_title: 'required',
      content: 'required',
      quote_title_seo: 'required',
      quote_slug: 'required',
      img: {
        required: false,
        // extension: "jpg|png|jpeg"
      },
      focus_keyword: {
        required: true,
      },
      publisher: {
        required: true,
      },
      publisher_logo: {
        required: true,
      },
      meta_title: {
        required: false,
      },
      permalink: {
        required: true,
      },
      description_meta: {
        required: true,
      },
      visibility: {
        required: true,
        //minlength:5
      },
      category: {
        required: true,
        //minlength:5
      },
      message: {
        required: false,
      },
      'open-source-plugins-Quote-page': { required: true },
    },
    message: {
      quote_title: 'Please enter username',
      quote_title_seo: 'Please enter username',
      quote_slug: 'Please enter username',
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
            alert('Quotes Updated Successfully')
          } else {
            alert('Some Technical Issue')
          }
        },
      })
    },
  })
})

// add author form validate

$('#addAuthor').submit(function (event) {
  event.preventDefault()
  $('#addAuthor').validate({
    rules: {
      username: {
        required: true,
        minlength: 5,
      },
      fname: 'required',
      lname: 'required',
      username: {
        required: true,
        email: true,
        minlength: 8,
      },
      pass: {
        required: true,
        minlength: 8,
        maxlength: 10,
      },
      position: {
        required: true,
      },
      img: {
        required: true,
      },
      text: 'required',
    },
    highlights: {
      required: true,
    },
    experience: {
      required: true,
    },

    messages: {
      username: {
        required: 'required',
        email: 'Please Use Valid Email Address',
        minlength: 'Use Minimum 8 charaters',
      },
      fname: ' Please enter title',
      lname: 'Please enter title',
      pass: {
        minlength: 'Password must be at least 8 characters long',
        maxlength: 'Password must be at least 10 characters long',
      },
      position: 'required',
      text: 'required',
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
          alert(data)
          console.log(data)
          if (data == 'inserted') {
            alert('Author Added Successfully')
          } else {
            alert('Some Technical Issue')
          }
          $('#addAuthor').trigger('reset')
        },
      })
    },
  })
})

$('#add_category_two').submit(function (event) {
  event.preventDefault()
  //validation for category//
  $('#add_category_two').validate({
    rules: {
      cat: 'required',
      cat_slug: 'required',
    },
    message: {
      cat: 'Please enter username',
      cat_slug: 'Please enter username',
    },
    submitHandler: function (form) {
      // alert("validated");

      $.ajax({
        url: 'action.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          if (data == 'inserted') {
            alert('Category Added Successfully')
          } else {
            alert('Some Technical Issue')
          }

          $('#add_category_two').trigger('reset')
        },
      })
    },
  })
})

//sub category function

$('#quotesForm').submit(function (event) {
  event.preventDefault()
  $('#quotesForm').validate({
    rules: {
      title: 'required',
      category: 'required',
      'open-source-plugins-Quote-page': { required: true },
      'category[]': { required: true },
      img: {
        required: false,
      },
      'quote[]': {
        required: true,
      },
      'authorname[]': {
        required: true,
      },
      'authorposition[]': {
        required: false,
      },
      // "author_image[]":{
      //     required:true,
      //     extension: "jpg|jpeg|png|ico|bmp"
      // }
    },
    messages: {
      title: 'Please Enter  Title',
      category: 'Please Select Category',
    },

    submitHandler: function (form) {
      //alert("validated form");
      $.ajax({
        url: 'edit_quotes.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          alert('author Added')
          console.log(data)
        },
      })
    },
  })
})

$('#quotesForm').submit(function (event) {
  event.preventDefault()
  $('#quotes_update_form').validate({
    rules: {
      title: 'required',
      category: 'required',
      'open-source-plugins-Quote-page': { required: true },
      img: {
        required: true,
      },
    },
    messages: {
      title: 'Please Enter  Title',
      category: 'Please Select Category',
    },

    submitHandler: function (form) {
      $.ajax({
        url: 'edit_quotes.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          alert('author Added gfgf')
          console.log(data)
        },
      })
    },
  })
})

// filter blog data here
$('#filter_data').submit(function (event) {
  event.preventDefault()
  $('#filter_data').validate({
    rules: {
      author_name: { required: false },
      category_filter: { required: false },
      date: { required: false },
    },
    messages: {},

    submitHandler: function (form) {
      //alert("validated form");
      $.ajax({
        url: 'action.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          alert('author')
          console.log(data)
          $('#datatable').html(data)
        },
      })
    },
  })
})

// filter quotes data here

$('#filter_Quotesdata').submit(function (event) {
  event.preventDefault()
  $('#filter_Quotesdata').validate({
    rules: {
      category_filter: { required: false },
      date: { required: false },
    },
    messages: {},

    submitHandler: function (form) {
      //alert("validated form");
      $.ajax({
        url: 'action.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          console.log(data)
          $('#datatable').html(data)
        },
      })
    },
  })
})
///cta form
