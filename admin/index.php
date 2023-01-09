<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>AUGS PANEL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="AUGS Admin & Dashboard" name="description" />
	<meta content="Themesbrand" name="author" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<style>
		body{
			background: linear-gradient(90deg, black 50%, #d3d3d3 50%);
		}
		.error{
			color: red;
    	font-size: 15px;
		}
	/* #login_section{
		box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
		height:500px;
	} */
	#login_section{
		height:500px;
		background:white;
	}
	.login_div{
		height:100vh;
	}
	.custome_sideimg{
		background: linear-gradient(1800deg, #d3d3d3 50%, black 50%);
	}
	.container{
		box-shadow:#212529 0px 0px 0px 3px, #343a40 0px 0px 0px 6px, rgb(0 0 0 / 30%) 33px 37px 3px, rgb(255 255 255 / 22%) -28px 33px 8px; 
	}
	.logo_design{
		width: 120px;
    position: absolute;
    padding-top: 25px;
    left: 685px;
    z-index: 5;
	}
	</style>
</head>
	
<body>
<div class="login_div d-flex justify-content-center align-items-center">
	<div class="container">
		<div class="row g-0">
			<div class="col-xl-12 m-auto">
				<div class="row">
					<div class="col-sm-4 p-0">
						<div class="auth-full-page-content p-4" id="login_section">
							<h3 class="text-center"><img src="assets/images/logo.png" alt="AUGS Logo" class="logo_design"></h3>
							<form id="login_form" class="mt-5">
								<div class="mb-3">
									<label for="formemail" class="form-label">Username</label>
									<input type="text" class="form-control" id="email" type="text" name="username" placeholder="Enter username"> 
								</div>
								<div class="mb-3">
									<label class="form-label" for="formpassword">Password</label>
									<input type="password" class="form-control" placeholder="Enter password" id="password" name="password"> 
								</div>
								<div class="mt-3 d-grid">
									<input type="hidden" name="btn" value="loginUser" />
									<div class="d-flex justify-content-between">
										<button class="btn btn-primary waves-effect waves-light lg-btn" name="login" value="login" type="submit" style="background:#000;border:none;">Log In</button>
										<div class="float-end"> <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a> </div>
									</div>
								</div>
							</form>
						</div>
					</div><!-- end col 4 -->
					<div class="col-sm-8 custome_sideimg d-flex flex-column justify-content-center align-items-center">
						<h2 class="text-center text-white">Welcome To Our Website</h2>
						<p class="text-center text-black">Login to access your admin account</p>
						<!-- <img src="assets/images/Background-2.jpg" alt="" style="width:100%;"> -->
					</div><!-- end col 8 -->
				</div>
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end login -->
	<!-- JAVASCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>

$("#login_form").validate({
rules:{
	username:{ 
            required: true,
         // email:true,
          	},
    password:{
              required:true,
            //minlength:8,
            //maxlength:10,
             },
	  },
message:{
   email:"Please enter username",
   password:"Please enter password",
		},
	submitHandler:function(form){
		$.ajax ({
            url: 'action.php',
            type: 'post',
            data: new FormData(form),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
              if(data=='login')
			  {				
              	alert("Login Successfully");
				window.location = "http://localhost/freelancePro1/admin/home.php";
			  }
			  else{
					alert("Wrong Credentials")
				  }
        	}
    	});
	}//submithaandler
});

</script>
</body>
</html>