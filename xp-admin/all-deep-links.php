<?php
    include('include/header.php');
    include('include/sidebar.php');
?>
<div class="modal fade ctaEditModal" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content p-4">
                <button class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i> Add Image</button>
                <form id="editCta" class="edit-cta-box" enctype="multipart/form-data">

                
                </form>
            </div>
        </div>
</div>
<div class="main-content">
    <div class="page-content">
        <!--container for category page starts here-->
        <div class="container-datatable">
            <div class="header-container">
                <h4>All Deep Link</h4>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex mb-5 mx-2 filter-button">
                                            <div>
                                                <i class="fa-brands fa-audible"></i>
                                            </div>
                                            <div class="dropdown">
                                                    <button class="btn select-bulk-cat  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Bulk Action<i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">
                                                            <input type="radio" name="operationType" value="delete" id="delete">
                                                            <label for="delete">Delete</label>
                                                        </a>
                                                        <a class="dropdown-item" href="#"> <input type="radio" name="operationType" value="edit" id="edit" checked>
                                                            <label for="edit">Edit</label> </a>

                                                    </div>
                                            </div>
                                            <div>
                                                <button type="button" class=" btn btn-primary mx-2 apply-btn" id="ctaApply">Apply</button>
                                            </div>
                                        </div>
                                        <table id="datatable"
                                            class="table table-bordered table-striped  table-responsive">


                                            <thead>
                                                <tr>
                                                    <th class="text-center"><input type="checkbox" class="form-check-input" id="checkAllCta"></th>
                                                    <th>TITLE</th>
                                                    <th>IMAGES</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>CATEGORIES</th>
                                                    <th>SUBCATEGORIES</th>
                                                    <th>LINK</th>
                                                    <th><i class="fa-solid fa-ellipsis"></i></th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                    $selectCta = $conn->prepare('SELECT * FROM deeplinks WHERE status = ? order by id desc');
                                                    $selectCta->execute([1]);
                                                    while($row=$selectCta->fetch(PDO::FETCH_ASSOC)){
                                                        $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
                                                        $getCategory->execute([$row['category']]);
                                                        $totalCat = $getCategory->rowCount();
                                                        if($totalCat>0){
                                                            while($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)){
                                                                $category = $rowCat['name'];
                                                            }
                                                        }else {
                                                            $category = "";
                                                        }
                                                        $getSubcategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
                                                        $getSubcategory->execute([$row['subcategory']]);
                                                        $totalSubcat = $getCategory->rowCount();
                                                        if($totalSubcat>0){
                                                            while($rowCat = $getSubcategory->fetch(PDO::FETCH_ASSOC)){
                                                                $subcategory = $rowCat['name'];
                                                            }
                                                        }else {
                                                            $subcategory = "";
                                                        }
                                                        if(!empty($row['image'])){
                                                            $img_id = $row['image'];
                                                          }else{
                                                            $img_id=1;
                                                          }
                                                           // for image get
                                                           $select_stmtPost_img=$conn->prepare("SELECT * FROM images WHERE id='".$img_id."' ");
                                                           $select_stmtPost_img->execute();
                                                           $post_data_image=$select_stmtPost_img->fetch(PDO::FETCH_ASSOC);
                                                           if(!empty($post_data_image['path'])){
                                                             $post_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                                            }else{
                                                             $post_image="https://i.ibb.co/4fz1F7f/Getty-Images-974371976.jpg";
                                                            }
                                                ?>
                                                <tr>
                                                    <th class="text-center">
                                                        <input type="checkbox" 
                                                        value="<?php echo $row['id'] ?>" class="form-check-input" name="ctaCheckbox">
                                                    </th>
                                                    <th><?php echo $row['title'] ?></th>
                                                    <td><img src="<?php echo $post_image ?>"
                                                            alt="1200px-Grey-background" width="50" height="50"></td>
                                                    <td><?php echo $row['details']; ?></td>
                                                    <td><?php echo $category ?></td>
                                                    <td><?php echo $subcategory ?></td>
                                                    <td><a href="<?php echo $row['productLink']; ?>">Link</a></td>
                                                    <th class="table-data-icons"><i class="fa-solid fa-ellipsis"></i>
                                                    </th>
                                                </tr>
                                                <?php
                                                    }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!--2nd section starts here-->
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