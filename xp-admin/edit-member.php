<?php
    include('include/header.php');
    include('include/sidebar.php');
    $id = $_GET['id'];
    $boardMember = $conn->prepare('SELECT * FROM boardmember WHERE id=?');
    $boardMember->execute([$id]);
    while($row=$boardMember->fetch(PDO::FETCH_ASSOC)){
        $username =$row['username'];
        $firstname=$row['full_name'];
        $degree=$row['deg_position'];
        $degree_tag=$row['degree_tag'];
        $seo_title=$row['seo_title'];
        $email=$row['email'];
        $image=$row['image'];
        $website=$row['website'];
        $facebook=$row['facebook'];
        $twitter=$row['twitter'];
        $instagram=$row['instagram'];
        $linkedin=$row['linkedin'];
        $youtube=$row['youtube'];
        $experties=$row['experties'];
        $experience=$row['experience'];
        $education=$row['education'];
        $about=$row['about'];
        $highlights=$row['highlights'];
        
        if(empty($row['image'])){
            $image_id = 1;
        }
        else{
            $image_id = $row['image'];}
    //        echo $sql = "SELECT * FROM images WHERE path='$image_id' limit 1";
    
        $getPost_image = $conn->prepare("SELECT * FROM images WHERE id='$image_id' limit 1");
        $getPost_image->execute();
        while ($row1 = $getPost_image->fetch(PDO::FETCH_ASSOC)) {
            $image_path=$row1['path'];
        }
    }
?>
<div class="main-content">
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Members</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <form id="editBoardMember" enctype="multipart/form-data">
                <input type="hidden" name="btn" value="editBoardMember">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="uploadedImage" value="<?php echo $image; ?>">
                <div class="card">
                    <div class="card-body">
                    <div id="memberAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        <h4 class="card-title mb-4">Personal Detail</h4>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="username" class="">Username</label>
                                    <input type="text" id="username" value="<?php echo $username; ?>" name="username" class="form-control" placeholder="UserName" >
                                    <span class="error usernameError"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="firstname" class="">Full Name</label>
                                    <input type="text" class="form-control" value="<?php echo $firstname; ?>" name="full_name" id="full_name" placeholder="First Name" >
                                    <span class="error full_nameError"></span>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="lastname" class="">Degree</label>
                                    <input type="text" id="degree" name="degree" value="<?php echo $degree; ?>" class="form-control" id="" placeholder="Degree" >
                                    <span class="error lastnameError"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="email" class="">Email</label>
                                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email" >
                                    <span class="error emailError"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="password" class="">Degree Tag</label>
                                    <input type="text" id="degree_tag" class="form-control" name="degree_tag" value="<?php echo $degree_tag; ?>">
                                    <span class="error passwordError"></span>
                                </div>
                            </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password" class="">SEO Title</label>
                                        <input type="text" id="seo_title" class="form-control" name="seo_title" value="<?php echo $seo_title; ?>">
                                        <span class="error passwordError"></span>
                                    </div>
                                </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="url" class="">Website</label>
                                    <input type="text" class="form-control" value="<?php echo $website; ?>" id="url" name="url" placeholder="Website url" >
                                    <span class="error urlError"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="facebook" class="">Facebook</label>
                                    <input type="text" class="form-control" value="<?php echo $facebook; ?>" id="facebook" name="facebook"
                                        placeholder="Facebook Link" >
                                    <span class="error facebookError"></span>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="twitter" class="">Twitter</label>
                                    <input type="text" class="form-control" id="twitter" value="<?php echo $twitter; ?>" name="twitter"
                                        placeholder="Twitter Link" >
                                    <span class="error twitterError"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="instagram" class="">Instagram </label>
                                    <input type="text" class="form-control" id="instagram" value="<?php echo $instagram; ?>" name="instagram"
                                        placeholder="Instagram URL" >
                                    <span class="error instagramError"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="" class="">Linkedin </label>
                                    <input type="text" name="linkedin" class="form-control" id="" value="<?php echo $linkedin; ?>" placeholder="Linkedin Profile URL"
                                        >
                                    <span class="error instagramError"></span>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="youtube" class="">Youtube </label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" value="<?php echo $youtube; ?>" placeholder="Youtube Profile URL" >
                                    <span class="error youtubeError"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-3">
                                <div class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i> Add Image</div>    
                                    <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                    <input type="hidden" class="image_id" name="img_id" value="<?php echo $image; ?>"/>
                                    <span class="error imageError"></span>
                                    <div class="text-center mt-2">
                                    <img src="https://druggist.b-cdn.net/<?php echo $image_path; ?>" style="width:80px;">
                                </div>    
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
                                placeholder="Highlights"><?php echo $highlights; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="text-area-1011">Experience</label>
                            <span class="error experienceError"></span>
                            <textarea id="text-area-1011" class="form-control" name="experience" rows="2"
                                placeholder="Experience"><?php echo $experience; ?></textarea>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="text-area-1012">Education</label>
                            <span class="error educationError"></span>
                            <textarea id="text-area-1012" name="education" class="form-control" rows="2"
                                placeholder="Education"><?php echo $education; ?></textarea>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="text-area-1013">About Druggist</label>
                            <span class="error aboutError"></span>
                            <textarea id="text-area-1013" class="form-control" name="about" rows="2"
                                placeholder="About Druggist"><?php echo $about; ?></textarea>
                        </div>
                    </div>

                </div>

                <div id="submitBtn">
                            <button type="submit" class="btn btn-add w-md btn-primary" id="addMemberBtn55"><i class="fa fa-plus-circle mx-2"
                            aria-hidden="true" name="addMemberBtn"></i>Update Details</button>
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