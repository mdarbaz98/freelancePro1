<footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <div class="footer-info">
                            <img src="./images/logo.png" alt="">
                            <!-- <p>Lorem ipsum dolor sit amet consectetur. Feugiat.</p> -->
                            <div>
                                <p class="mb-0 py-1"><span class="me-2"><i class="bi bi-telephone"></i><a href="tel:+919876543210"></span>+91 9876543210</a>
                                </p>
                                <p class="mb-0 py-1"><span class="me-2"><a class="text-decoration-none" href="mailto:hello@houseofxp.com"><span class="me-2"><i class="bi bi-envelope"></i></span>hello@houseofxp.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <div class="quick-link">
                            <div class="left-quick-link">
                                <p>Quick links</p>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="aboutus.php">About us</a></li>
                                    <li><a href="contact.php">Contact us</a></li>
                                    
                                </ul>
                            </div>
                            <div class="left-quick-link">
                                <p>Services</p>
                                <ul>
                                    <li><a href="image.php">Image Management</a></li>
                                    <li><a href="events.php">Events</a></li>
                                    <li><a href="video.php">Video Production</a></li>
                                    <li><a href="creative.php">Creative and Communication</a></li>
                                    <li><a href="marketing.php">Marketing Analytics</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 mb-5 mb-lg-0">
                        <div class="quick-link">
                            <div class="left-quick-link">
                                <p>Social Links</p>
                                <ul>
                                    <li><a href="service.php">Facebook</a></li>
                                    <li><a href="events.php">Instagram</a></li>
                                    <li><a href="video.php">LinkedIn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
<script>


$("#contact_details").validate({
rules: {
fname: "required",
lname: "required",
business_email: {
    required: true,
    email: true,
    minlength: 8
},
mobile: {
    required: true,
    minlength: 10,
    maxlength: 10
},
message: "required",
},
messages: {
            fname: " Please Enter First Name",
            lname: "Please Enter Last Name",
            message: "Enter Your Query",
},
    submitHandler: function (form) {
        //tinyMCE.triggerSave();
    $.ajax({
        url: 'action.php',
        type: 'post',
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            
             if(data=='done'){
                $("#contact_details").trigger("reset");
                alert("Our team will reach out within 24 hours once you fill the below details");                
             }
            // {
            //     $("#addAuthor").trigger("reset");
            //     alert("Author Added Successfully");
            //     location.reload();
            // }
            // else
            // {
            //     alert("Some Technical Issue");
            // }


        }

    });


    }
});

</script>

</body>
</html>