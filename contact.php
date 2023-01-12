<?php 
include ('./include/header.php')
?>
    <section class="contact__page">
        <div class="container">
<div class="hero">
    <div class="row">
        <div class="col-lg-6">
            <h2>Contact Us</h2>
            <p>We align website traffic drivers to end goals. We utilize powerful content and behavioral science
                to foster the needs of Millions of Individuals.
</p>
            <div class="inner">
                <p class="mb-0 py-1"><span class="me-2"><i class="bi bi-telephone"></i><a href="tel:+917678084459"></span>+91 7678084459</a>
            </p>
                <p class="mb-0 py-1"><span class="me-2"><a class="text-decoration-none" href="mailto:hello@houseofxp.com"><span class="me-2"><i class="bi bi-envelope"></i></span>hello@houseofxp.com</a>
                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="./images/Frame.png" alt="">
        </div>
    </div>
</div>
        </div>
        <div class="form-background">
            <div class="form-wrapper">
                <div class="inner-hero d-lg-flex gap-4">
                    <div class="left">
                        <h3>Enter your details</h3>

                    </div>
                    <div class="righ ms-auto">
                        <img src="./images/mail.png" alt="">
                    </div>
                </div>
                <p>Personal information</p>
                <form id="contact_details">
                    <div class="row">
                        <div class="mb-4 col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter your First Name" id="fname" name="fname" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-4 col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter your Last Name" id="lname" name="lname" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-4 col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                            <input type="Mobile number" class="form-control" placeholder="Enter your Mobile No." name="mobile" id="mobile" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-4 col-lg-6">
                            <label for="exampleInputEmail1" class="form-label">Business Email</label>
                            <input type="email" class="form-control" placeholder="Enter only Business Email" name="business_email" id="business_email" aria-describedby="emailHelp">
                          </div>


                          <div class="mb-12 col-lg-12">
                          <label for="exampleInputEmail1" class="form-label">Message</label>
                          <textarea name="message" id="message" style="background-color: #202020;" placeholder="Enter Your Message" class="form-control" cols="15" rows="5"></textarea>
                          <!-- <input type="email" class="form-control" placeholder="Enter only Business mail id" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                          </div>
                        
                    </div>
                    <input type="hidden" name="btn" value="contact_details" />                  
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  
                  </form>
            </div>
           
        </div>
    </section>
    <?php 
    include ('./include/footer.php');
    ?>