<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
<form id="form_submit1" class="form">
                    <label class="form__container" id="upload-container">Choose or Drag & Drop Files
              		<input class="form__file" id="upload-files" name="files[]" type="file" accept="image/*" multiple="multiple"/>
            		</label>
            		<div class="form__files-container" id="files-list-container"></div>
                  
                    <button class="btn btn-success" type="submit" >Upload File</button>
                    <input type="hidden" name="btn" value="insert_images"/>
                </form>
                
</div>
 <script>
                    $('#form_submit1').on('submit', function (e) {
                        alert("dsdsa");
  e.preventDefault();
  $('.error').html('');
  var formData = new FormData(this);
  $.ajax({
    url: 'file_demo.php',
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
                </script>
</body>
</html>

       
                    
                
               