// 1. Post Categories Operation
// 2. Products Operation
// 3. CTA OR DeepLinks Operation
// 4. Board-Memeber Operation

//Home Features start from here
$('#addTag').on('submit', function (e) {
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        window.location.reload();
      }
    }
  });
});

$('#setHomeCta').on('submit', function (e) {
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data.includes("done")) {
        location.reload();
      }
    }
  });
})

$('#setHmeMember').on('submit', function (e) {
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        alert("Updated")
        window.location.reload();
      }
    }
  });
})

function deleteTag(x) {
  var id = $(x).data('id');
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: {
      'id': id, 'btn': 'deleteTag'
    },
    success: function (data) {
      alert("Deleted")
      if (data == "done") {
        window.location.reload();
      }
    }
  });
}

$('#lifeStyleform').on('submit', function (e) {
  e.preventDefault();
  //alert("fdsfsd");
  //$('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        alert("Feature Added Success")
        window.location.reload();
      }
    }
  });
});

$('#lifeStyleform_cta').on('submit', function (e) {
  e.preventDefault();
 // alert("cta");
  //$('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        alert("Feature Added Success")
        window.location.reload();
      }
    }
  });
});

$('#productCarousel').on('submit', function (e) {
  e.preventDefault();
  //$('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        alert("Product Image Added Success")
        window.location.reload();
      }
    }
  });
});

$('#setHmeMemberAboutus').on('submit', function (e) {
  e.preventDefault();
    //alert("pro");
  //$('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        alert("Feature Added Success")
        window.location.reload();
      }
    }
  });
});

// Post Categories Starts From Here
$("#addCategories").on("submit", function (e) {
  e.preventDefault();
  $(".error").html("");
  var formData = new FormData(this);
  $.ajax({
    url: "include/action.php",
    type: "post",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "nameEmpty") {
        $(".nameError").html("Enter Valid Name");
      } else if (data == "slugEmpty") {
        $(".slugError").html("Enter Valid Slug");
      } else if (data == "parentCategoryEmpty") {
        $(".parentCategoryError").html("Select Valid Category");
      } else if (data == "descriptionEmpty") {
        $(".descriptionError").html("Enter Valid Descriptipn");
      } else if (data == "done") {
        location.reload();
      }
    },
  });
});

$("#categoryApply").on("click", function (e) {
  var type = $("input[name='operationType']:checked").val();
  //   var category = $("input[name='categoryCheckbox']:checked").val();
  var category = $("input[name='categoryCheckbox']:checked")
    .map(function () {
      return $(this).val();
    })
    .get();
  if (category.length) {
    if (type == "delete") {
      if (confirm("Are you sure you want to delete this?")) {
        $.ajax({
          url: "include/action.php",
          type: "post",
          data: { type: type, category: category, btn: "categoryOption" },
          success: function (data) {
            if (data == "done") {
              location.reload();
            }
          },
        });
      }
    } else if (type == "edit") {
      $(".categoryForm").html("");
      $.ajax({
        url: "include/action.php",
        type: "post",
        data: { type: type, category: category, btn: "categoryOption" },
        success: function (data) {
          $(".categoryForm").html(data);
          editCat();
        },
      });
    } else {
      alert("please select bulk action");
    }
  } else {
    alert("please select categories");
  }
});
function editCat() {
  $("#editCategories").on("submit", function (e) {
    e.preventDefault();
    $(".error").html("");
    var formData = new FormData(this);
    $.ajax({
      url: "include/action.php",
      type: "post",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        $(".categoryForm").html(data);
        editCat();
      },
    });
  });
}
editCat();

$("#checkAll").change(function () {
  $('input[name="categoryCheckbox"]:checkbox')
    .not(this)
    .prop("checked", this.checked);
});

$("#addCategories #name").on("keyup", function (e) {
  $categoryName = $(this).val().toLowerCase();
  $categoryName = $categoryName.split(" ").join("-");
  $("#addCategories #slug").val($categoryName);
});

//productcategories starts from here

$("#productCategories").on("submit", function (e) {
  e.preventDefault();
  $(".error").html("");
  var formData = new FormData(this);
  $.ajax({
    url: "include/action.php",
    type: "post",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "nameEmpty") {
        $(".nameError").html("Enter Valid Name");
      } else if (data == "slugEmpty") {
        $(".slugError").html("Enter Valid Slug");
      } else if (data == "parentCategoryEmpty") {
        $(".parentCategoryError").html("Select Valid Category");
      } else if (data == "descriptionEmpty") {
        $(".descriptionError").html("Enter Valid Descriptipn");
      } else if (data == "done") {
        location.reload();
      }
    },
  });
});

$("#productCategoryApply").on("click", function (e) {
  var type = $("input[name='operationType']:checked").val();
  //   var category = $("input[name='categoryCheckbox']:checked").val();
  var category = $("input[name='categoryCheckbox']:checked")
    .map(function () {
      return $(this).val();
    })
    .get();
  if (category.length) {
    if (type == "delete") {
      if (confirm("Are you sure you want to delete this?")) {
        $.ajax({
          url: "include/action.php",
          type: "post",
          data: {
            type: type,
            category: category,
            btn: "productCategoryOption",
          },
          success: function (data) {
            if (data == "done") {
              location.reload();
            }
          },
        });
      }
    } else if (type == "edit") {
      $(".categoryForm").html("");
      $.ajax({
        url: "include/action.php",
        type: "post",
        data: { type: type, category: category, btn: "productCategoryOption" },
        success: function (data) {
          $(".categoryForm").html(data);
          editProductCat();
        },
      });
    } else {
      alert("please select bulk action");
    }
  } else {
    alert("please select categories");
  }
});

function editProductCat() {
  $("#editProductCategories").on("submit", function (e) {
    e.preventDefault();
    $(".error").html("");
    var formData = new FormData(this);
    $.ajax({
      url: "include/action.php",
      type: "post",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        $(".categoryForm").html(data);
        editProductCat();
      },
    });
  });
}
editProductCat();



// 2. Add Products Starts From Here
function loadSubcat() {
  $("#productMainCategory").on("change", function (e) {
    var id = $(this).val();
    $.ajax({
      url: "include/action.php",
      type: "post",
      data: { id: id, btn: "getProductSubCategory" },
      success: function (data) {
        $("#productSubCategory").html(data);
      },
    });
  });
}
loadSubcat();

$("#productAlert").hide();
$("#add-product").on("submit", function (e) {
  e.preventDefault();
  $(".error").html("");
  var formData = new FormData(this);
  $.ajax({
    url: "include/action.php",
    type: "post",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        window.scrollTo({ top: 0, behavior: "smooth" });
        $("#productAlert").show();
        $("#add-product").trigger("reset");
      } else {
        $("." + data + "Error").html("Enter Valid " + data);
      }
    },
  });
});


$("#productApply").on("click", function (e) {
  var type = $("input[name='operationType']:checked").val();
  //   var category = $("input[name='categoryCheckbox']:checked").val();
  var category = $("input[name='productCheckbox']:checked")
    .map(function () {
      return $(this).val();
    })
    .get();
  if (category.length) {
    if (type == "delete") {
      if (confirm("Are you sure you want to delete this?")) {
        $.ajax({
          url: "include/action.php",
          type: "post",
          data: { type: type, category: category, btn: "productOption" },
          success: function (data) {
            if (data == "done") {
              location.reload();
            }
          },
        });
      }
    } else if (type == "edit") {

      if (category.length > 1) {
        alert("Only 1 product can be edit at a time!!");
      } else {
        $(".categoryForm").html("");
        $.ajax({
          url: "include/action.php",
          type: "post",
          // dataType: "json",
          data: { type: type, category: category, btn: "productOption" },
          success: function (data) {
            // var json = $.parseJSON(JSON.stringify(data));
            $('.bs-example-modal-xl').modal("toggle");
            $('.edit-product-box').html(data);
            $("#productAlert").hide();
            loadSubcat();
            var input = document.querySelector('input[name=strength]');
            new Tagify(input)
            var input = document.querySelector('input[name=pack]');
            new Tagify(input)
            editProduct();
          },
        });
      }
    } else {
      alert("please select bulk action");
    }
  } else {
    alert("please select product");
  }
});

function editProduct() {
  $("#edit-product").on("submit", function (e) {
    e.preventDefault();
    $(".error").html("");
    var formData = new FormData(this);
    $.ajax({
      url: "include/action.php",
      type: "post",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        if (data == "done") {
          $("#productAlert").show();
          // setTimeout(
          //   
          // );
          setTimeout(function () {
            location.reload(), 10000
          }, 3000);
        } else {
          $("." + data + "Error").html("Enter Valid " + data);
        }
      },
    });
  });
}

editProduct();


$("#checkAllProduct").change(function () {
  $('input[name="productCheckbox"]:checkbox')
    .not(this)
    .prop("checked", this.checked);
});

$("#productCategories #name").on("keyup", function (e) {
  $categoryName = $(this).val().toLowerCase();
  $categoryName = $categoryName.split(" ").join("-");
  $("#productCategories #slug").val($categoryName);
});


// ==================== 3. Cta Starts from here=====================

function urlSelectOption() {
  $('#productMainCategory').on('change', function (e) {
    if ($('#productMainCategory').val() && $('#productMainCategory').val() != 'Select Category') {
      $("#productPageUrl").attr('disabled', 'disabled');
    } else {
      $("#productPageUrl").removeAttr('disabled');
    }
  })

  if ($('#productMainCategory').val() && $('#productMainCategory').val() != 'Select Category') {
    $("#productPageUrl").attr('disabled', 'disabled');
  } else {
    $("#productPageUrl").removeAttr('disabled');
  }
  $('#productPageUrl').on('keyup', function (e) {
    if ($('#productPageUrl').val()) {
      $("#productMainCategory").attr('disabled', 'disabled');
      $("#productSubCategory").attr('disabled', 'disabled');
    } else {
      $("#productMainCategory").removeAttr('disabled');
      $("#productSubCategory").removeAttr('disabled');
    }
  })

  if ($('#productPageUrl').val()) {
    $("#productMainCategory").attr('disabled', 'disabled');
    $("#productSubCategory").attr('disabled', 'disabled');
  } else {
    $("#productMainCategory").removeAttr('disabled');
    $("#productSubCategory").removeAttr('disabled');
  }

}
urlSelectOption();

$('#addCta').on('submit', function (e) {
  $("#addCta button[type=submit]").addClass('button--loading');
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        $("#addCta button[type=submit]").removeClass('button--loading');
        $("#productAlert").show();
        $("#addCta").trigger("reset");
        setTimeout(function () {
          location.reload();
        }, 5000);

      } else {
        
        $("#addCta button[type=submit]").removeClass('button--loading');
        if (data == 'category' || data == 'subcategory' || 'productPageUrl') {
          $(".categoryError").html('Category OR Link! Select any one of these option');
          $(".subcategoryError").html('Category OR Link! Select any one of these option');
          $(".productPageUrlError").html('Category OR Link! Select any one of these option');
        } else {
          $("#addCta button[type=submit]").removeClass('button--loading');
          $("." + data + "Error").html("Enter Valid " + data);
        }
      }
    }
  });
})

$("#ctaApply").on("click", function (e) {
  var type = $("input[name='operationType']:checked").val();
  //   var category = $("input[name='categoryCheckbox']:checked").val();
  var category = $("input[name='ctaCheckbox']:checked")
    .map(function () {
      return $(this).val();
    })
    .get();
  if (category.length) {
    if (type == "delete") {
      if (confirm("Are you sure you want to delete this?")) {
        $.ajax({
          url: "include/action.php",
          type: "post",
          data: { type: type, category: category, btn: "ctaOption" },
          success: function (data) {
            if (data == "done") {
              location.reload();
            }
          },
        });
      }
    } else if (type == "edit") {

      if (category.length > 1) {
        alert("Only 1 product can be edit at a time!!");
      } else {
        $(".categoryForm").html("");
        $.ajax({
          url: "include/action.php",
          type: "post",
          // dataType: "json",
          data: { type: type, category: category, btn: "ctaOption" },
          success: function (data) {
            // var json = $.parseJSON(JSON.stringify(data));
            $('.ctaEditModal').modal("toggle");
            $('.edit-cta-box').html(data);
            $("#productAlert").hide();
            loadSubcat();
            // editCta();
            urlSelectOption();
          },
        });
      }
    } else {
      alert("please select bulk action");
    }
  } else {
    alert("please select product");
  }
});

$("#boardmemberApply").on("click", function (e) {
  var type = $("input[name='operationType']:checked").val();
  //   var category = $("input[name='categoryCheckbox']:checked").val();
  var member = $("input[name='boardmemberCheckbox']:checked")
    .map(function () {
      return $(this).val();
    })
    .get();
  if (member.length) {
    if (type == "delete") {
      if (confirm("Are you sure you want to delete this?")) {
        $.ajax({
          url: "include/action.php",
          type: "post",
          data: { type: type, member: member, btn: "boardmemberOption" },
          success: function (data) {
            if (data == "done") {
              location.reload();
            }
          },
        });
      }
    } else {
      alert("please select bulk action");
    }
  } else {
    alert("please select member");
  }
});


$("#userApply").on("click", function (e) {
  var type = $("input[name='operationType']:checked").val();
  //   var category = $("input[name='categoryCheckbox']:checked").val();
  var user = $("input[name='userCheckbox']:checked")
    .map(function () {
      return $(this).val();
    })
    .get();
  if (user.length) {
    if (type == "delete") {
      if (confirm("Are you sure you want to delete this?")) {
        $.ajax({
          url: "include/action.php",
          type: "post",
          data: { type: type, user: user, btn: "userOption" },
          success: function (data) {
            if (data == "done") {
              location.reload();
            }
          },
        });
      }
    } else if (type == "edit") {

      if (user.length > 1) {
        alert("Only 1 product can be edit at a time!!");
      } else {
        $.ajax({
          url: "include/action.php",
          type: "post",
          // dataType: "json",
          data: { type: type, user: user, btn: "userOption" },
          success: function (data) {
            // var json = $.parseJSON(JSON.stringify(data));
            $('.userEditModal').modal("toggle");
            $('.edit-user-box').html(data);
            $("#productAlert").hide();
            loadSubcat();
            // editCta();
            urlSelectOption();
          },
        });
      }
    } else {
      alert("Please select bulk action");
    }
  } else {
    alert("Please select user.");
  }
});


function editCta() {
  $("#editCta").on("submit", function (e) {
    $("button[type=submit]").addClass('button--loading');
    e.preventDefault();
    $(".error").html("");
    var formData = new FormData(this);
    $.ajax({
      url: "include/action.php",
      type: "post",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        if (data == "done") {
          alert("updated")
          location.reload()
          // $("button[type=submit]").removeClass('button--loading');
          
          // $("#productAlert").show();
          // setTimeout(
            
          // );
          // setTimeout(function () {
          //   location.reload(), 10000
          // }, 3000);
          
        } else {
          $("button[type=submit]").removeClass('button--loading');
          $("." + data + "Error").html("Enter Valid " + data);
        }
      },
    });
  });
}

editCta();



$("#checkAllCta").change(function () {
  $('input[name="ctaCheckbox"]:checkbox')
    .not(this)
    .prop("checked", this.checked);
});

$("#checkAllMember").change(function () {
  $('input[name="boardmemberCheckbox"]:checkbox')
    .not(this)
    .prop("checked", this.checked);
});

$("#checkAllUser").change(function () {
  $('input[name="userCheckbox"]:checkbox')
    .not(this)
    .prop("checked", this.checked);
});

// =================4. Board Member Starts From Here====================

$('#addBoardMember').on('submit', function (e) {
  e.preventDefault();
  $("#addBoardMember button[type=submit]").addClass('button--loading');
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      
      $("#addBoardMember button[type=submit]").removeClass('button--loading');
      if (data == "done") {
        
        //$("#memberAlert").show();
        alert("Product has been added!");
        $("#addBoardMember").trigger("reset");
        location.reload();
        // setTimeout(function () {
        //   location.reload();
        // }, 5000);

      } else {
        $("." + data + "Error").get(0).scrollIntoView();
        $("." + data + "Error").html("Enter Valid " + data);
      }
    }
  });
})

$('#editBoardMember').on('submit', function (e) {
  e.preventDefault();

  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        alert("Product has been updated!")
        //$("#memberAlert").show();
        location.reload();

      } else {
        $("." + data + "Error").get(0).scrollIntoView();
        $("." + data + "Error").html("Enter Valid " + data);
      }
    }
  });
})

function checkPassword() {
  if ($('#password').val() && $('#confirmpassword').val()) {
    if ($('#password').val() == $('#confirmpassword').val()) {
      $('#addMemberBtn').show();
      $('#addMemberBtn1').hide();
    }
    else {
      $('#addMemberBtn1').show();
      $('#addMemberBtn').hide();
    }
  } else {
    $('#addMemberBtn').hide();
    $('#addMemberBtn1').show();
  }
}
checkPassword();

$('#password, #confirmpassword').on('keyup', function (e) {
  checkPassword();
  if ($('#password').val() != $('#confirmpassword').val()) {
    $(".passwordError").html("Enter Valid Password");
    $(".confirmpasswordError").html("Enter Valid Password");
    console.log('notdone');
  } else {
    $(".passwordError").html("");
    $(".confirmpasswordError").html("");
    console.log('done');
  }
})


$("#addMemberBtn1").on('click', function (e) {
  // $("#password").get(0).scrollIntoView(true);
  const element = document.querySelector('#experties');
  const rect = element.getBoundingClientRect();
  let offsetTop = rect.top + document.body.scrollTop;
  window.scrollTo(0, offsetTop);


  $(".passwordError").html("Enter Valid Password");
  $(".confirmpasswordError").html("Enter Valid Password");
})



// Add Post Starts Here

$("#selectCatSelect").change(function () {
  var catId = $('#selectCatSelect').val();
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: { 'catId': catId, 'btn': 'listCFatToAddPost' },
    success: function (data) {
      $('.cta-check').html(data);
      filterTextInput();

    }
  })
});

function postSubmit() {
  $('#addPost').on('submit', function (e) {
    e.preventDefault();
    // if ($('#switch1').prop('checked') == true) {
    //   var postSchedule = $('#datetimepicker').val();
    // } else {
    //   var postSchedule = "";
    // }

    if ($('#postStatus').val() == 'Draft') {
      var postSchedule = $('#datetimepicker').val();
    } else {
      var postSchedule = "";
    }


    var postContent = $('#getDataNew').html();
    var checkValues = [];
    $("input:checkbox[data-newname=auto-fetch]:checked").each(function () {
      checkValues.push($(this).val());
    })
    var products = [];
    $("input:checkbox[name=postProduct]:checked").each(function () {
      products.push($(this).val());
    })

    var maincategory = [];
    $("input:checkbox[data-name=mainCategory]:checked").each(function () {
      maincategory.push($(this).val());
    })

    var subcategory = [];
    $("input:checkbox[data-name=subCategory]:checked").each(function () {
      subcategory.push($(this).val());
    })

    var cta = [];
    $("input:checkbox[data-id=cta]:checked").each(function () {
      cta.push($(this).val());
    })




    var formData = new FormData(this);
    formData.append("tableOfContent", checkValues);
    formData.append("postContent", postContent);
    formData.append("product", products);
    formData.append('postSchedule', postSchedule);
    formData.append('mainCategory', maincategory);
    formData.append('subCategory', subcategory);
    formData.append('cta', cta);
    $.ajax({
      url: "include/action.php",
      type: "post",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        if (data.includes("done")) {
          var id = data.substr(4);
          window.location.href = "edit-post.php?id=" + id + "&status=add";
        } else {
          alert("Enter Valid " + data);
          $('#' + data).focus();
        }
      }
    });
  })
}
postSubmit();
$("#getDataNew").hide();
initTiny();

function getData() {
  tinyMCE.triggerSave();
  var data = $("#postContent").val();
  $("#getDataNew").html(data);
  $("#getAllH2").html('');
  var i = 0;
  fetchH2();
}
$('#lastgetAllH2').hide();
function fetchH2() {
  var i = 0;
  $("#getDataNew h2").each(function () {
    ++i
    $(this).attr('id', 'heading' + i);
    var id = "<p data-id='headeing" + i + "'>" + $(this).html() + "</p>";
    $("#getAllH2").append('<div class="div form-check d-flex align-items-center gap-3 mb-3 add_post_side_bar"><b>' + i + ')</b><input value="' + id + '" data-name="autoFetch" data-content="' + $(this).html() + '" type="checkbox" id="checkTOC' + i + '"><label class="form-check-label" for="checkTOC' + i + '">' + $(this).html() + '</label></div>');
  });
}

function getPrevContent() {
  var i = 0;
  $("#lastgetAllH2 p").each(function () {
    ++i;
    var id = $(this).data('id').replace("headeing", "");
    var html = $(this).html();
    var tag = "<p data-id='headeing" + id + "'>" + html + "</p>";

    $("#selectH2").append('<div class="div newcheckTOC' + id + ' form-check d-flex align-items-center gap-3 mb-3 add_post_side_bar"><b>' + id + ') </b><input value="' + tag + '" data-seq="' + id + '" data-newname="auto-fetch" name="autoFetch[]" data-content="' + html + '" type="checkbox" id="newcheckTOC' + id + '" checked><label class="form-check-label" for="newcheckTOC' + id + '">' + html + '</label></div>');
    radioToc();
  })
}

if (window.location.href.includes("edit-post.php")) {
  fetchH2(); getPrevContent();
}

function getSelectTOC() {
  $("input:checkbox[data-name=autoFetch]:checked").each(function () {
    var content = $(this).data('content');
    var value = $(this).val();
    var id = 'new' + $(this).attr('id');
    var numid = id.replace("newcheckTOC", "");

    $("#selectH2").append('<div class="div newnewcheckTOC' + id + ' form-check d-flex align-items-center gap-3 mb-3 add_post_side_bar"><b>' + numid + ') </b><input value="' + value + '" data-seq="' + numid + '" data-newname="auto-fetch" name="autoFetch[]" data-content="' + content + '" type="checkbox" checked id="' + id + '"><label class="form-check-label" for="' + id + '">' + content + '</label></div>');
    radioToc(); removeSelectTOC()
    // setDataToc(); 
  });
}

function removeSelectTOC() {
  $("input:checkbox[data-newname=auto-fetch]").each(function () {
    if ($(this).prop('checked') == false) {
      var id = $(this).attr('id');
      alert(id);
      $('.' + id).remove();
    }
    // setDataToc();
  });
}
removeSelectTOC();
function radioToc() {
  $("input:checkbox[data-newname=auto-fetch]").change(function () {
    var id = $(this).data('seq');
    var content = $(this).data('content');
    $('#tocEdit').val(content);
    $('#tocId').val(id);
    // setDataToc(); 
  })
}
radioToc();



function setDataToc() {
  var value = $('#tocEdit').val();
  var id = $('#tocId').val();
  var html = "<p data-id='headeing" + id + "'>" + value + "</p>";
  $('#newcheckTOC' + id).val(html);
  $('#newcheckTOC' + id).attr('data-content', value);
  $('label[for=newcheckTOC' + id + ']').html(value);
  radioToc();
}


$("#allPostProduct").change(function () {
  $('input[name="postProduct"]:checkbox')
    .not(this)
    .prop("checked", this.checked);
});
$('.postSchedule').hide();
if ($('#switch1').prop('checked') == true) {
  $('.postSchedule').show();
} else {
  $('.postSchedule').hide();
}

$('#switch1').change(function () {
  alert($('#datetimepicker').val());
  if ($('#switch1').prop('checked') == true) {
    $('.postSchedule').show();
  } else {
    $('.postSchedule').hide();
  }
})


function postEdit() {
  $('#editPost').on('submit', function (e) {
    e.preventDefault();
    tinymce.get('postContent').save();
    // if ($('#switch1').prop('checked') == true) {
    //   var postSchedule = $('#datetimepicker').val();
    // } else {
    //   var postSchedule = "";
    // }

    if ($('#postStatus').val() == 'Draft') {
      var postSchedule = $('#datetimepicker').val();
    } else {
      var postSchedule = "";
    }



    var postContent = $('#getDataNew').html();
    var checkValues = [];
    $("input:checkbox[data-newname=auto-fetch]:checked").each(function () {
      checkValues.push($(this).val());
    })
    var products = [];
    $("input:checkbox[name=postProduct]:checked").each(function () {
      products.push($(this).val());
    })

    var maincategory = [];
    $("input:checkbox[data-name=mainCategory]:checked").each(function () {
      maincategory.push($(this).val());
    })

    var subcategory = [];
    $("input:checkbox[data-name=subCategory]:checked").each(function () {
      subcategory.push($(this).val());
    })

    var cta = [];
    $("input:checkbox[data-id=cta]:checked").each(function () {
      cta.push($(this).val());
    })

    var formData = new FormData(this);
    formData.append("tableOfContent", checkValues);
    formData.append("postContent", postContent);
    formData.append("product", products);
    formData.append('postSchedule', postSchedule);
    formData.append('mainCategory', maincategory);
    formData.append('subCategory', subcategory);
    formData.append('cta', cta);
    $.ajax({
      url: "include/action.php",
      type: "post",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        if (data.includes("done")) {
          var id = data.substr(4);
          window.location.href = "edit-post.php?id=" + id + "&status=add";
        } else {
          alert("Enter Valid " + data);
          $('#' + data).focus();
        }
      }
    });
  })
}

postEdit();

// Add USer

$("#userAlert").hide();
$('#addUser').on('submit', function (e) {
  e.preventDefault();

  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        $("#userAlert").show();
        $("#addUser").trigger("reset");
        setTimeout(function () {
          location.reload();
        }, 5000);

      } else {
        $("." + data + "Error").get(0).scrollIntoView();
        $("." + data + "Error").html("Enter Valid " + data);
      }
    }
  });
})

$('#editUser').on('submit', function (e) {
  e.preventDefault();

  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        $("#userAlert").show();
        $("#editUser").trigger("reset");
        setTimeout(function () {
          location.reload();
        }, 2000);

      } else {
        $("." + data + "Error").get(0).scrollIntoView();
        $("." + data + "Error").html("Enter Valid " + data);
      }
    }
  });
})

function deleteUser(x) {
  var id = $(x).attr('id');
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: {
      'id': id, 'btn': 'deleteUser'
    },
    success: function (data) {
      if (data == "done") {
        window.location.reload();
      }
    }
  });
}

function checkUserPassword() {
  if ($('#passwordUser').val() && $('#confirmpasswordUser').val()) {
    if ($('#passwordUser').val() == $('#confirmpasswordUser').val()) {
      $('#addMemberBtnUser').show();
      $('#addMemberBtnUser1').hide();
    }
    else {
      $('#addMemberBtnUser1').show();
      $('#addMemberBtnUser').hide();
    }
  } else {
    $('#addMemberBtnUser').hide();
    $('#addMemberBtnUser1').show();
  }
}
checkUserPassword();

$('#passwordUser, #confirmpasswordUser').on('keyup', function (e) {
  checkUserPassword();
  if ($('#passwordUser').val() != $('#confirmpasswordUser').val()) {
    $(".passwordError").html("Enter Valid Password");
    $(".confirmpasswordError").html("Enter Valid Password");
    console.log('notdone');
  } else {
    $(".passwordError").html("");
    $(".confirmpasswordError").html("");
    console.log('done');
  }
})

//This Function helps to filter data based on input i.e. CTA Search, Table Of Content Search
function filterTextInput() {
  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("myInput");
  text_filter = input.value.toUpperCase();
  divList = $(".div");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}
//This Function helps to filter data based on input i.e. CTA Search, Table Of Content Search
function filterTextInputproduct() {
  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("myInputproduct");
  text_filter = input.value.toUpperCase();
  divList = $(".div1");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}

function filterTextInputPost(){
  var input, radios, checkboxes, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("postSearch");
  text_filter = input.value.toUpperCase();
  divList = $(".div");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}
function filterTextInputCTA(){
  var input, radios, checkboxes, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("ctaSearch");
  text_filter = input.value.toUpperCase();
  divList = $(".div_cta");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}

function filterTextInput1() {

  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("myInput1");
  text_filter = input.value.toUpperCase();
  divList = $(".div");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}

function filterTextInput2() {
  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("myInput2");
  text_filter = input.value.toUpperCase();
  divList = $(".div");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}
function filterTextInput_homefeatures1() {
  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("homefeatures1");
  text_filter = input.value.toUpperCase();
  divList = $(".div_men");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}
function filterTextInput_homefeatures2() {
  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("homefeatures2");
  text_filter = input.value.toUpperCase();
  divList = $(".div_women");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}
function filterTextInput_homefeatures3() {
  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("homefeatures3");
  text_filter = input.value.toUpperCase();
  divList = $(".div_general");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}

function filterTextInput3() {
  var input, radios, radio_filter, text_filter, td0, i, divList;
  input = document.getElementById("myInput3");
  text_filter = input.value.toUpperCase();
  divList = $(".div");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < divList.length; i++) {
    td0 = divList[i].getAttribute('data-content');
    if (td0) {
      if (td0.toUpperCase().indexOf(text_filter) > -1) {
        divList[i].style.display = "";
      } else {
        divList[i].style.display = "none";
      }
    }
  }
}

$('.okBtn').on('click', function (e) {
  var value = $('#postStatus').val();
  $('.statusContent').html(value);
  if ($('#postStatus').val() == 'Draft') {
    $('.schedule').show();
  } else {
    $('.schedule').hide();
  }
})

$('.datetimepicker').val('');

$('.statusContent').html($('#postStatus').val());

$(".postStatus").hide();
$(".postSchedule").hide();
$(".cancelBtn").hide();
$(".scheduleCancelBtn").hide();

$(".statusBtn").click(function () {
  $(".statusBtn").toggle();
  $(".postStatus").toggle();
  $(".cancelBtn").show();
});

// var time = currentdate.getFullYear() + '/' + (currentdate.getMonth() + 1) + '/'
//   + currentdate.getDate() + ' ' + hour + ':' + '00';

$(".scheduleBtn").click(function () {
  $(".scheduleBtn").toggle();
  $(".postSchedule").toggle();
  $(".scheduleCancelBtn").show();
});

// if ($('.datetimepicker').val() == '' || $('.datetimepicker').val('') == 'immediately') {
//   $('.scheduleLabel').html('Publish');
//   $('.scheduleContent').html('immediately');
//   $('.datetimepicker').val(time);
// } else {
//   var value = $('.datetimepicker').val();
//   $('.scheduleLabel').html('Schedule On');
//   $('.scheduleContent').html(value);
// }

$('.scheduleOkBtn').on('click', function (e) {
  var value = $('.datetimepicker').val();
  $('.scheduleLabel').html('Schedule On');
  $('.scheduleContent').html(value);
})

if (window.location.href.includes("add-post.php")) {
  if ($('.datetimepicker').val() == '' || $('.datetimepicker').val('') == 'immediately') {
    $('.scheduleLabel').html('Publish');
    $('.scheduleContent').html('immediately');
    $('.datetimepicker').val(time);
  } else {
    var value = $('.datetimepicker').val();
    $('.scheduleLabel').html('Schedule On');
    $('.scheduleContent').html(value);
  }



  if ($('#postStatus').val() == 'Draft') {
    $('.schedule').show();
    $('.scheduleLabel').html('Publish');
    $('.scheduleContent').html('immediately');

    $('.datetimepicker').val('immediately');
  } else {
    $('.schedule').hide();
    $('.scheduleLabel').html('Publish');
    $('.scheduleContent').html('immediately');
    $('.datetimepicker').val('immediately');
  }
}

if ($('#postStatus').val() == 'Draft') {
  $('.schedule').show();
} else {
  $('.schedule').hide();

}
$('#homeCat').on('submit', function (e) {
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
       alert("Updated")
         window.location.reload();
      }
    }
  });
})

$('#homeCat1').on('submit', function (e) {
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      //alert(data)
      if (data == "done") {
        alert("Updated")
       window.location.reload();
      }
    }
  });
})

$('#homeCat2').on('submit', function (e) {
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'include/action.php',
    type: 'post',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      if (data == "done") {
        alert("Updated")
       window.location.reload();
      }
    }
  });
})







// File Upload
// 
// function ekUpload(){
//   function Init() {

//     console.log("Upload Initialised");

//     var fileSelect    = document.getElementById('file-upload'),
//         fileDrag      = document.getElementById('file-drag'),
//         submitButton  = document.getElementById('submit-button');

//     fileSelect.addEventListener('change', fileSelectHandler, false);

//     // Is XHR2 available?
//     var xhr = new XMLHttpRequest();
//     if (xhr.upload) {
//       // File Drop
//       fileDrag.addEventListener('dragover', fileDragHover, false);
//       fileDrag.addEventListener('dragleave', fileDragHover, false);
//       fileDrag.addEventListener('drop', fileSelectHandler, false);
//     }
//   }

//   function fileDragHover(e) {
//     var fileDrag = document.getElementById('file-drag');

//     e.stopPropagation();
//     e.preventDefault();

//     fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
//   }

//   function fileSelectHandler(e) {
//     // Fetch FileList object
//     var files = e.target.files || e.dataTransfer.files;

//     // Cancel event and hover styling
//     fileDragHover(e);

//     // Process all File objects
//     for (var i = 0, f; f = files[i]; i++) {
//       parseFile(f);
//       uploadFile(f);
//     }
//   }

//   // Output
//   function output(msg) {
//     // Response
//     var m = document.getElementById('messages');
//     m.innerHTML = msg;
//   }

//   function parseFile(file) {

//     console.log(file.name);
//     output(
//       '<strong>' + encodeURI(file.name) + '</strong>'
//     );
    
//     // var fileType = file.type;
//     // console.log(fileType);
//     var imageName = file.name;

//     var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
//     if (isGood) {
//       document.getElementById('start').classList.add("hidden");
//       document.getElementById('response').classList.remove("hidden");
//       document.getElementById('notimage').classList.add("hidden");
//       // Thumbnail Preview
//       document.getElementById('file-image').classList.remove("hidden");
//       document.getElementById('file-image').src = URL.createObjectURL(file);
//     }
//     else {
//       document.getElementById('file-image').classList.add("hidden");
//       document.getElementById('notimage').classList.remove("hidden");
//       document.getElementById('start').classList.remove("hidden");
//       document.getElementById('response').classList.add("hidden");
//       document.getElementById("file-upload-form").reset();
//     }
//   }

//   function setProgressMaxValue(e) {
//     var pBar = document.getElementById('file-progress');

//     if (e.lengthComputable) {
//       pBar.max = e.total;
//     }
//   }

//   function updateFileProgress(e) {
//     var pBar = document.getElementById('file-progress');

//     if (e.lengthComputable) {
//       pBar.value = e.loaded;
//     }
//   }

//   function uploadFile(file) {

//     var xhr = new XMLHttpRequest(),
//       fileInput = document.getElementById('class-roster-file'),
//       pBar = document.getElementById('file-progress'),
//       fileSizeLimit = 1024; // In MB
//       if (xhr.upload) {
//           // Check if file is less than x MB
//           if (file.size <= fileSizeLimit * 1024 * 1024) {
//           // Progress bar
//           pBar.style.display = 'inline';
//           xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
//           xhr.upload.addEventListener('progress', updateFileProgress, false);
  
//           // File received / failed
//           xhr.onreadystatechange = function(e) {
//               if (xhr.readyState == 4) {
//               // Everything is good!
  
//               // progress.className = (xhr.status == 200 ? "success" : "failure");
//               // document.location.reload(true);
//               }
//           };
  
//           // Start upload
//           xhr.open('POST', document.getElementById('file-upload-form').action, true);
//           xhr.setRequestHeader('X-File-Name', file.name);
//           xhr.setRequestHeader('X-File-Size', file.size);
//           xhr.setRequestHeader('Content-Type', 'multipart/form-data');
//           xhr.send(file);
//           } else {
//           output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
//           }
//       }
//   }

//   // Check for the various File API support.
//   if (window.File && window.FileList && window.FileReader) {
//     Init();
//   } else {
//     document.getElementById('file-drag').style.display = 'none';
//   }
// }
// ekUpload();



 // get current all images
 function getAllimagesforContent() {
  $.ajax({
    type: 'POST',
    url: 'getAllimages.php',
    dataType: 'html',
    data: {
      btn: 'get_Allimages_content',
    },
    success: function (data) {
      //alert(data)
      //console.log(data)
      $('#load_images_content').html(data);
    },
  })
}
   // get current all images
  function getAllimages() {
  $.ajax({
    type: 'POST',
    url: 'getAllimages.php',
    dataType: 'html',
    data: {
      btn: 'get_Allimages',
    },
    success: function (data) {
      //alert(data)
      //console.log(data)
      $('#load_images').html(data);
    },
  })
}

  // get current all product images
  function getAllproductimages() {
    $.ajax({
      type: 'POST',
      url: 'getAllimages.php',
      dataType: 'html',
      data: {
        btn: 'get_Allproductimages',
      },
      success: function (data) {
        //alert(data)
        //console.log(data)
        $('#load_images_product').html(data);
      },
    })
  }
  
//delete image funtion
function deleteImage(img_id){
  var x = confirm('Are you sure you want to remove this?');
  if (x) {
    $.ajax({
    type: 'POST',
    url: 'action_file.php',
    dataType: 'html',
    data: {
      removeimage_id: img_id,
      btn: 'removeimage_id',
    },
    success: function (data) {
      if (data == 'done') {
        alert('removed')
        getAllimages();
        // location.reload()
      }
    },
  })
 }
}


//delete image funtion
function deleteImagecontent(img_id){
  var x = confirm('Are you sure you want to remove this?');
  if (x) {
    $.ajax({
    type: 'POST',
    url: 'action_file.php',
    dataType: 'html',
    data: {
      removeimage_id: img_id,
      btn: 'removeimage_id',
    },
    success: function (data) {
      if (data == 'done') {
        alert('removed')
        getAllimagesforContent();
        // location.reload()
      }
    },
  })
 }
}

//delete product image funtion
function deleteproductImage(img_id){
  var x = confirm('Are you sure you want to remove this?');
  if (x) {
    $.ajax({
    type: 'POST',
    url: 'action_fileproduct.php',
    dataType: 'html',
    data: {
      removeproductimage_id: img_id,
      btn: 'removeproductimage_id',
    },
    success: function (data) {
      if (data == 'done') {
        alert('removed');
        getAllproductimages();
        // location.reload()
      }
    },
  })
 }
}


var setImgAgain
// onclick change right panel image data
function Selectimage(id, path) {
  //  alert(id)
  //  alert(path);
 // contenImage(path)
      //location.reload();
      // alert(data);
      $('.image_id').attr('value', id)
      setImgAgain = path
      // $('.image_path').attr('src', path)
      // console.log($('.image_path').attr('src', path));
      
      const imgSrc = `https://druggist.b-cdn.net/${path}`
        // ..var img = `<img src="https://druggist.b-cdn.net/${path}" alt="" onclick="removeImg(this)" class="set_images" style="width:140px">`; 
        $(".set_images").attr('src',imgSrc);
}

function removeImg(ele){
  ele.remove()
}
function openImgmodal(){
  $('#imageGallery_forproductImages').modal('toggle');
}

// for content images 
function contenImage(path) {
  tinymce.get("postContent").execCommand('mceInsertContent',false,"<img src='https://druggist.b-cdn.net/"+path+"'>");
  var myContent = tinymce.get("postContent").getContent();
  $('#getDataNew').html(myContent);
}


function appendpostFAQ(){
  let counter=1;
  var html_content=`<div class="time-box p-3" id=${'append_newFAQs_'+counter} >
                        <div class="form-group">
                            <label for="">Question</label>
                            <input type="text" value="" name="faq_question[]" class="form-control" placeholder="Enter FAQ Quetion"/>
                        </div>

                        <div class="form-group">
                            <label for="">Answer</label>
                            <textarea name="faq_answer[]" id="" cols="15" rows="5" class="form-control" placeholder="Enter FAQ Answer" value=""></textarea>
                        </div>
                        <div class="submit-btn">
                            <input type="button" class="float-right" style="border: 1px; margin-top:5px; background: #556ee6; color: #fff; padding: 6px;" value="Add More" onclick="appendpostFAQ()">
                            <span class="btn1 add-btn float-left" onclick="deleteFaq(${counter})" style="background:#7e37d8; border: 1px; margin-top:5px; padding: 6px;">Delete</span>
                        </div>
                    </div>`;
      $('#forAppend').append(html_content);
      counter++;
}
function deleteFaq(target){
  const ele=document.getElementById('append_newFAQs_'+target)
  ele.remove() 
}

var db_val = $('#setCTA_selectedpro').val();
var db_array = db_val.split(",");
var numberArray = db_array.map(Number);

function setProduct_id(x){
    var id = $(x).data('cta_id');
    if($(x).is(":checked")){
        numberArray.push(id)    
    } else {
        numberArray.splice(numberArray.indexOf(id),1);
    }
    var pro_id = numberArray.join(",");
     if(pro_id.charAt(0)==','){
        pro_id=pro_id.substring(1);
    }
    $('.setCTA_selectedpro').attr('value',pro_id)
}		    
