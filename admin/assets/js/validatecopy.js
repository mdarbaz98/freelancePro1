$("#blog_form").submit(function(event) {
    event.preventDefault();
    alert("inside form")
    $("#blog_form").validate({
    rules: {
        i1: "required",
        content: "required",
        i2: "required",
        i3: "required",
        img: {
            required: true,
            extension: "jpg|png|jpeg"
        },
        focus_keyword: {
                required:true, 
                    },
        publisher:{
            required:true,
        },
        publisher_logo:{
            required:true,
        },
        meta_title:{
            required:false,
        },
        permalink:{
            required:true,
        },
        description_meta:{
            required:true,
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
        }, message: {
            required: false,
        },
    },
    message: {
        i1: "Please enter username",
        i2: "Please enter username",
        i3: "Please enter username",
        focus_keyword: "Please enter username",
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
                console.log(data);
                alert(data);
                if(data=='inserted')
                {
                    alert("Blog Added Successfully");
                }
                else
                {
                    alert("Some Technical Issue");
                }
                
                $("#blog_form").trigger("reset"); 
            }

        });
        
    }

});
});

// blog page end validation


$("#update_blog_form").submit(function(event) {
    event.preventDefault();
    alert("blog update form");
    $("#update_blog_form").validate({
    rules: {
        i1: "required",
        content: "required",
        i2: "required",
        i3: "required",
        // img: {
        //     required: false,
        //   //  extension: "jpg|png|jpeg"
        // },
        img_alt:{
            required:false,
        },
        img_title:{
            required:false,
        },
        focus_keyword:{
                required:true,
                    },
        publisher:{
            required:true,
        },
        publisher_logo:{
            required:true,
        },
        meta_title:{
            required:true,
        },
        permalink:{
            required:true,
        },
        description_meta:{
            required:true,
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
        }, message: {
            required: false,
        },
    },
    message: {
        i1: "Please enter username",
        i2: "Please enter username",
        i3: "Please enter username",
        focus_keyword: "Please enter username",
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
                alert(data);
                if(data=='updated')
                {
                    alert("Blog Update Successfully");
                }
                else
                {
                }
                $("#update_blog_form").trigger("reset"); 

            }

        });
        
    }

});
});

$("#addQuotes").submit(function(event) {
    event.preventDefault();
    alert("quotes add form")
    $("#addQuotes").validate({
    rules: {
        i1: "required",
        content: "required",
        i2: "required",
        i3: "required",
        img: {
            required: true,
            extension: "jpg|png|jpeg"
        },
        focus_keyword: {
                required:true, 
                    },
        publisher:{
            required:true,
        },
        publisher_logo:{
            required:true,
        },
        meta_title:{
            required:false,
        },
        permalink:{
            required:true,
        },
        description_meta:{
            required:true,
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
        "open-source-plugins-Quote-page":{required:true,},
        img:{
            required:false,
        },
        "quote[]":{
            required:true,
        },
        "authorname[]":{
            required:true,
        },
    },
    message: {
        i1: "Please enter username",
        i2: "Please enter username",
        i3: "Please enter username",
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
                if(data=='inserted')
                {
                    alert("Quotes Added Successfully");
                }
                else
                {
                }
                
                $("#addQuotes").trigger("reset"); 

            }

        });
        
    }

});
});
// add quotes close here 

// edit quotes statr here 
$("#updateQuotes").submit(function(event) {
    event.preventDefault();
    akert("quotes update");
$("#updateQuotes").validate({
    rules: {
        i1: "required",
        content: "required",
        i2: "required",
        i3: "required",
        img: {
            required: false,
            // extension: "jpg|png|jpeg"
        },
        focus_keyword: {
                required:true, 
                    },
        publisher:{
            required:true,
        },
        publisher_logo:{
            required:true,
        },
        meta_title:{
            required:false,
        },
        permalink:{
            required:true,
        },
        description_meta:{
            required:true,
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
        "open-source-plugins-Quote-page":{required:true,},
    },
    message: {
        i1: "Please enter username",
        i2: "Please enter username",
        i3: "Please enter username",
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
                if(data=='updated')
                {
                    alert("Quotes Updated Successfully");
                }
                else
                {

                }
                
                $("#updateQuotes").trigger("reset"); 

            }

        });
        
    }

});
});


$(".author_change_other").change(function () {

var val = $('#author_change_other').val();

let position = val.includes('others');
//const lastVal="";

if(position)
{
$("#others_author_section").modal('show');
}
//alert(val);
else
{

}

$("#add_author_other").validate({
    rules: {
        author_name: "required",
        email: "required",
        password: "required",
        image: {
            required: true,
            extension: "jpg|png|jpeg"
        },
        message: {
            required: true,
        },
        position: {
            required: true,
        },


    },
        message: {
        author_name: "Please enter username",
        email: "Please enter username",
        password: "Please enter username",
    },
        submitHandler: function (form) {
        //alert("validated");
         
        
        var authors = $('#author_change_other').val();
        var formData = new FormData(form);
        formData.append('author_id', authors);
//                    console.log(formData);

        $.ajax({
            url: 'edit_author.php',
            type: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                alert("New Author Added");
                $("#others_author_section").modal('hide');
                $("#author_change_other").html(data);
                //location.reload();
                console.log(data);

            }

        });
    }

});

});

$("#category").change(function () {
var id = $(this).val();
//alert(id)

if (id == "others") {
//  alert("others");

$("#others_category_section").modal('show');
$("#add_category").validate({
    rules: {
        cat: "required",
        sub_cat: "required",
        cat_slug: "required",
    },
    message: {
        cat: "Please enter username",
        sub_cat: "Please enter username",
        cat_slug: "Please enter username",

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

                alert("Cat");
                console.log(data);
                $("#others_category_section").modal('hide');
                //location.reload();

            }

        });
    }

});



}

$.ajax({
    type: "post",
    url: "get_subcat.php",
    data: { cat_id: id },
    cache: false,
    success: function (data) {
        $(".sub_category").html(data);
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
          })
        //alert(data);
        //console.log(data);
    }
});
//    }  // if close

});


// blog title filter

$("#blog_title_change_other").change(function () {
alert("fdsfds");
var id = $(this).val();

alert(id);   

$.ajax({
type: "post",
url: "get_title_blog.php",
data: { blog_id: id },
cache: false,
success: function (data) {
 $("#datatable").html(data);
 //alert(data);
 console.log(data);
}
});


});




/// edit page start here


$("#blog_form_edit").validate({

rules: {
i1: "required",
file: {
    required: true,
    extension: "jpg|png|jpeg"
},
author_name: {
    required: true,
    // email:true
},

review: {
    required: true,
    //minlength:5
},
content: "required",
i2: "required",
i3: "required",
focus_keyword: "required",
datetime: "required",
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

},
message: {
i1: "Please enter username",
i2: "Please enter username",
i3: "Please enter username",
focus_keyword: "Please enter username",


},
submitHandler: function (form) {
//alert("validated");

$.ajax({
    url: 'blog_edit.php',
    type: 'post',
    data: new FormData(form),
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {

        alert("blog updated");
        //window.location.href = 'bloglisting.php';
        console.log(data);


    }

});
}

});

/// validation end


// add author form validate

$.validator.addMethod(
"regex",
function(value, element, regexp) {
return this.optional(element) || regexp.test(value);
},
"Please check your input."
);


$(function () {
$('#uiEmailAdress').focus();
$('#addAuthor').validate({
rules: {
    username:{
        required: true,
        minlength: 5,
        regex: "([A-Z]{0,3}|[A-Z]{3}[0-9]*)"
    },
fname: "required",
lname: "required",
username: {
    required: true,
    email: true,
    minlength: 8
},
pass: {
    required: true,
    minlength: 8,
    maxlength:10,
},
position: {
    required: true,
},
img: {
    required: true,
},
text: "required",
    },
    highlights:{
        required:true,
    },
    experience:{
        required:true,
    },

messages: {
    username:{
        required: 'required',
        email: 'Please use symbolic character',
        minlength: 'Minimum 8 charaters required'
    },
            fname: " Please enter title",
            lname: "Please enter title",
            pass: {
                minlength: 'Password must be at least 8 characters long',
                maxlength: 'Password must be at least 10 characters long',
            },
            position: "required",
            text: "required",
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
                    if(data=='inserted')
                    {
                    toastr.success('Author Added', 'Successfully', {
                    timeOut: 4000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-center',
                    // Redirect 
                    });
    
                    }
                    else
                    {
                    toastr.error('OOPS', 'Something Issue');
                    toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
                    toastr.options.showMethod = 'slideUp';
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 400;
                    }
                    
                    $("#addAuthor").trigger("reset"); 

                }

            });
            }

});
});




// $("#addAuthor").submit(function (event) {
//     event.preventDefault();
// });

// $("#addAuthor").validate({

//     rules: {
//         fname: "required",
//         lname: "required",
//         username: {
//             required: true,
//             email: "required",
//         },
//         pass: {
//             required: true,
//             minlength: 8,
//             maxlength:10,
//         },
//         position: {
//             required: true,
//         },
//         img: {
//             required: true,
//         },
//         text: "required",

//     },

//     message: {
//         fname: " Please enter title",
//         lname: "Please enter title",
//         username:{
//             required:"required",
//             email:"Enter a valid username and use symbolic character",
//         },
//         pass: {
//             minlength: 'Password must be at least 8 characters long',
//             maxlength: 'Password must be at least 10 characters long',
//         },
//         position: "required",
//         text: "required",
//     },
//     submitHandler: function (form) {
//         alert("validated form")

//         $.ajax({
//             url: 'edit_author.php',
//             type: 'post',
//             data: new FormData(form),
//             contentType: false,
//             cache: false,
//             processData: false,
//             success: function (data) {
//                 alert(data);
//                 console.log(data);

//             }

//         });


//     }
// });



$("#schema_click").click(function () {

$("#myModal").modal('show');

});

$("#add_schema").submit(function(event){
event.preventDefault();

});

//validation for category//
$("#add_category_two").validate({
rules: {
cat: "required",
cat_slug: "required",
},
message: {
cat: "Please enter username",
cat_slug: "Please enter username",
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
    if(data=='inserted')
    {
    toastr.success('Category Added', 'Successfully', {
    timeOut: 4000,
    preventDuplicates: true,
    positionClass: 'toast-top-center',
    // Redirect 
    });

    }
    else
    {
    toastr.error('OOPS', 'Something Issue');
    toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
    toastr.options.showMethod = 'slideUp';
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 400;
    }
    
    $("#add_category_two").trigger("reset"); 
}

});
}

});


//sub category function

//validation for category//
$("#add_category_two").validate({
rules: {
cat: "required",
cat_slug: "required",
},
message: {
cat: "Please enter username",
cat_slug: "Please enter username",
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
    if(data=='inserted')
    {
    toastr.success('Category Added', 'Successfully', {
    timeOut: 4000,
    preventDuplicates: true,
    positionClass: 'toast-top-center',
    // Redirect 
    });

    }
    else
    {
    toastr.error('OOPS', 'Something Issue');
    toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';
    toastr.options.showMethod = 'slideUp';
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.closeDuration = 400;
    }
    
    $("#add_category_two").trigger("reset"); 
}

});
}

});



// farin quates page work


$("#quotes_form").submit(function(event){
event.preventDefault();
$.ajax({
url: 'edit_quotes.php',
type: 'post',
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function (data) {
alert("author Added");
console.log(data);

}

});
})

$("#quotesForm").validate({
rules:{
title:"required",
category:"required",
"open-source-plugins-Quote-page":{required:true,},
"category[]":{required:true},
img:{
required:false,
},
"quote[]":{
required:true,
},
"authorname[]":{
required:true,
},
"authorposition[]":{
required:false,
},
// "author_image[]":{
//     required:true,
//     extension: "jpg|jpeg|png|ico|bmp"
// }

},
messages:{
title:"Please Enter  Title",
category:"Please Select Category",    
},

submitHandler:function(form){
//alert("validated form");
$.ajax({
url: 'edit_quotes.php',
type: 'post',
data: new FormData(form),
contentType: false,
cache: false,
processData: false,
success: function (data) {
alert("author Added");
console.log(data);

}

});

}

});




$("#quotes_update_form").validate({
rules:{
title:"required",
category:"required",
"open-source-plugins-Quote-page":{required:true,},
img:{
required:true,
},

},
messages:{
title:"Please Enter  Title",
category:"Please Select Category",    
},

submitHandler:function(form){
//alert("validated form");
$.ajax({
url: 'edit_quotes.php',
type: 'post',
data: new FormData(form),
contentType: false,
cache: false,
processData: false,
success: function (data) {
alert("author Added gfgf");
console.log(data);

}

});

}

});

// filter blog data here
$("#filter_data").submit(function (event) {
event.preventDefault();
});
$("#filter_data").validate({
rules:{
author_name:{required:false},
category_filter:{required:false},
date:{required:false},
},
messages:{
},

submitHandler:function(form){
//alert("validated form");
$.ajax({
url: 'action.php',
type: 'post',
data: new FormData(form),
contentType: false,
cache: false,
processData: false,
success: function (data) {
alert("author");
 console.log(data);
$("#datatable").html(data);

}

});

}

});

// filter quotes data here




$("#filter_Quotesdata").submit(function (event) {
event.preventDefault();
});
$("#filter_Quotesdata").validate({
rules:{
category_filter:{required:false},
date:{required:false},
},
messages:{
},

submitHandler:function(form){
//alert("validated form");
$.ajax({
url: 'action.php',
type: 'post',
data: new FormData(form),
contentType: false,
cache: false,
processData: false,
success: function (data) {
 console.log(data);
$("#datatable").html(data);

}

});

}
});

function image_update_Function(id) {
alert("work")
//$("#others_category_section1").modal('show');
if (id) {
$.ajax({
type: "POST",
url: "blog_edit.php",
dataType: 'html',
data: {
    quotes_author_id: id
},
success: function (data) {


    //location.reload();
     //alert(data);
     console.log(data);

     $("#upload_image_here").html(data);
     loadImageUpdateCode();
     
     
}

});
}
}



function loadImageUpdateCode() {
$("#add_image_upload").on("submit", function (event) {
event.preventDefault();
alert("work");
$.ajax({    
url: 'action.php',
type: 'post',
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function (data) {
    alert(data);
    console.log(data);
                
}
});
});
}

function quotes_update_authors(id){
alert(id);
$("#quotes_update_contet").modal('show');
if (id) {
$.ajax({
type: "POST",
url: "action.php",
dataType: 'html',
data: {
    quotes_author_content_id: id,
    btn: 'quotes_author_content_id',
},
success: function (data) {
    //location.reload();
     //alert(data);
     console.log(data);
     $("#author_content_form").html(data);
     loadQuoteUpdateCode();   
}

});

}
}

function loadQuoteUpdateCode(){
$("#update_author_data").on("submit", function (event) {
event.preventDefault();
$.ajax({    
url: 'action.php',
type: 'post',
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function (data) {
alert(data);
console.log(data);
            
}
});
});
}
// $("#add_image_upload").on("submit", function (event) {
//     event.preventDefault();
//     alert("work");
// });


// SEO Title KeyUp Function
function copytext_cat(e) {
let ctrC = document.getElementById("cat").value;
//alert(ctrC)
str = ctrC.replace(/\s+/g, "-").toLowerCase();
document.getElementById("cat_slug").value = str;
}

function editCategory(){

}
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
</div>`;

$('.wrapper').append(html);
}

// $("#quotesForm").on('submit', function(e){
//     alert('Working');
//     e.preventDefault();
//     var dataForm = new FormData(this);
//     $.ajax({
//         url: 'edit_quotes.php',
//         type: 'post',
//         data: dataForm,
//         cache: false,
//         processData: false,
//         success: function(data) {
//             // alert(data);
//             console.log(data);
//         }
//     })
// })