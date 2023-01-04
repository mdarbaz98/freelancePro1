<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--owl Carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--font awesome new version-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- css link-->
    <link href="assets/css/login.css" id="app-style" rel="stylesheet" type="text/css" />
    <title>Document</title>

</head>

<body>
    <div class="container-fluid" style=" height: 100vh;display: flex;box-sizing: border-box; align-items: center;
">
        <div class="login-container">
            <div class="login-header">
                <h2 class="text-center"><img
                        src="https://i.ibb.co/6B185kh/Druggist-Online-New-Logo-Design.png"
                        alt="Druggist-Online-New-Logo-Design" width="190px"></h1>
                    <h4 class="text-center">Login in to Dashboard</h4>
                    <p class="text-center">Enter your email and password below</p>
            </div>
            <!--Inputs Start Here-->
            <div class="login-inputs">
                <form id="login-form">
                    <input type="hidden" name="btn" value="loginUser">
                    <label for="email">EMAIL</label>
                    <div class="mb-4">
                        <input type="email" name="email" id="email" placeholder="Email address">
                        <span class="error emailError"></span>
                    </div>
                    <div class="d-flex justify-content-between password-input">
                        <div> <label for="password">PASSWORD</label></div>
                        <div><a href="#forget">forget password?</a></div>
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" id="password" placeholder="Password">
                        <span class="password passwordError"></span>
                    </div>
                    <div class="login-btn">
                        <button value="submit" type="submit">Log In</button>
                    </div>
                </form>
            </div>
            <!--Inputs end here-->
        </div>
    </div>
    <!--jquery library-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--jquery validation-->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#login-form").submit(function (event) {
                event.preventDefault();
            });

            $("#login-form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: "required",
                },

                message: {
                    email: "Please enter your email",
                    password: "Please enter password",
                },
                submitHandler: function (form) {
                    
                    $.ajax({
                        url: 'include/action.php',
                        type: 'post',
                        data: new FormData(form),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {  
                            if(data=='done'){
                                window.location.href = "index.php";
                            }else{
                                alert("You Have Entered Wrong Credentials")
                            }
                        }
                    })
                }
            });
        });
    </script>
</body>

</html>