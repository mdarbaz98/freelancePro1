<?php
    include('include/header.php');
    include('include/sidebar.php');
?>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Members</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <form id="addBoardMember" enctype="multipart/form-data">
                    <input type="hidden" name="btn" value="addBoardMember">
                    <div class="card">
                        <div class="card-body">
                        
                        <div id="memberAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        Product has been added!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                            <h4 class="card-title mb-4">Personal Detail</h4>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="username" class="">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="UserName" >
                                        <span class="error usernameError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="firstname" class="">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" >
                                        <span class="error full_nameError"></span>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="lastname" class="">Degree</label>
                                        <input type="text" id="degree" name="degree" class="form-control" id="" placeholder="Enter Degree">
                                        <span class="error degreeError"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="email" class="">Email </label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" >
                                        <span class="error emailError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password" class="">Degree Tag</label>
                                        <input type="text" id="degree_tag" class="form-control" name="degree_tag" placeholder="Enter Degree Tag" >
                                        <span class="error passwordError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password" class="">SEO Title</label>
                                        <input type="text" id="seo_title" class="form-control" name="seo_title" placeholder="Enter SEO Title" >
                                        <span class="error passwordError"></span>
                                    </div>
                                </div>
                                
                            </div>




                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="url" class="">Website</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Website url" >
                                        <span class="error urlError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="facebook" class="">Facebook</label>
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            placeholder="Facebook Link" >
                                        <span class="error facebookError"></span>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="twitter" class="">Twitter</label>
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            placeholder="Twitter Link" >
                                        <span class="error twitterError"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="instagram" class="">Instagram </label>
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                            placeholder="Instagram URL" >
                                        <span class="error instagramError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="" class="">Linkedin </label>
                                        <input type="text" name="linkedin" class="form-control" id="" placeholder="Linkedin Profile URL"
                                            >
                                        <span class="error instagramError"></span>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="youtube" class="">Youtube </label>
                                        <input type="text" class="form-control" id="youtube" name="youtube"
                                            placeholder="Youtube Profile URL" >
                                        <span class="error youtubeError"></span>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-3">
                                <div class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i> Add Image</div>    
                                    <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                    <input type="hidden" class="image_id" name="img_id" value=""/>
                                    <span class="error imageError"></span>
                                </div>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->





            </div>
        </div>


        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Professional Detail</h4>

                    <div class="row">
                    <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="text-area-1014">Highlights</label>
                                <span class="error highlightsError"></span>
                                <textarea id="text-area-1014" name="highlights" class="form-control" rows="2"
                                    placeholder="Highlights"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="text-area-1011">Experience</label>
                                <span class="error experienceError"></span>
                                <textarea id="text-area-1011" class="form-control" name="experience" rows="2"
                                    placeholder="Experience"></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="text-area-1012">Education</label>
                                <span class="error educationError"></span>
                                <textarea id="text-area-1012" name="education" class="form-control" rows="2"
                                    placeholder="Education"></textarea>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="text-area-1013">About Druggist</label>
                                <span class="error aboutError"></span>
                                <textarea id="text-area-1013" class="form-control" name="about" rows="2"
                                    placeholder="About Druggist"></textarea>
                            </div>
                        </div>

                    </div>



                    <div class="row">
                       
                    </div>



                    <div id="submitBtn">
                        <button type="submit" class="btn btn-add w-md btn-primary" id="addMemberBtnds">
                            <span class="button__text"><i class="fa fa-plus-circle mx-2"  aria-hidden="true" name="addMemberBtnds"></i>Add Details</span>
                        </button>
<!-- 
                            <a class="btn btn-add w-md btn-primary" id="addMemberBtn1"><i class="fa fa-plus-circle mx-2"
                            aria-hidden="true"></i>Add
                        Details</a> -->
                    </div>

                    </form>


                </div>
            </div>
        </div>




    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
<?php
    include('include/footer.php');
?>