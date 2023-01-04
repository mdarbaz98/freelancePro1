<?php
    include('include/header.php');
    include('include/sidebar.php');
?>
    <div class="modal fade bs-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content edit-product-box">
                
            </div>
        </div>
    </div>
<div class="main-content">

    <div class="page-content">
        <!--container for category page starts here-->
        <div class="container-datatable">
            <div class="header-container">
                <h4>ALL Product</h4>
            </div>

            <div class="row ">

                <form action="">

                    <!--2nd section starts here-->
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
                                                <button type="button" class=" btn btn-primary mx-2 apply-btn" id="productApply">Apply</button>
                                            </div>
                                                <div>
                                                    <div class="select-category">

                                                        <div class="dropdown">
                                                            <button class="btn select-bulk-cat  dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Select Category<i class="mdi mdi-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#"> <input type="radio"
                                                                        class="form-control" name="skill-1" value="male"
                                                                        id="m"><label for="m">Male</label> </a>
                                                                <a class="dropdown-item" href="#"> <input type="radio"
                                                                        class="form-control" name="skill-1"
                                                                        value="female" id="f"><label
                                                                        for="f">Female</label> </a>
                                                                <a class="dropdown-item" href="#"><input type="radio"
                                                                        class="form-control" name="skill-1"
                                                                        value="other" id="o"> <label
                                                                        for="o">Other</label></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mx-2 ">

                                                    <div>
                                                        <input class="form-control checkbox-select-date" type="date"
                                                            placeholder="Select Date" id="example-date-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="datatable"
                                                class="table table-bordered dt-responsive  nowrap w-100">


                                                <thead>
                                                    <tr>
                                                        <th class="text-center"><input type="checkbox"
                                                                class="form-check-input" name="productCheckbox" id="checkAllProduct"></th>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Category</th>
                                                        <th>Subcategory</th>
                                                        <th>Price</th>
                                                        <th>Discount Price</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                        $getProduct = $conn->prepare('SELECT * FROM product WHERE status=1 order by id desc');
                                                        $getProduct->execute();
                                                        while($row=$getProduct->fetch(PDO::FETCH_ASSOC)) {
                                                            $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
                                                            $getCategory->execute([$row['category']]);
                                                            while($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)){
                                                                $category = $rowCat['name'];
                                                            }
                                                            $getSubcategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
                                                            $getSubcategory->execute([$row['subcategory']]);
                                                            while($rowCat = $getSubcategory->fetch(PDO::FETCH_ASSOC)){
                                                                $subcategory = $rowCat['name'];
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
                                                        <th class="text-center"><input type="checkbox"
                                                                value="<?php echo $row['id'] ?>"
                                                                class="form-check-input" name="productCheckbox"></th>
                                                        <td class="table-img"><img src="<?php echo $post_image ?>" alt="<?php echo $row['img_alt']; ?>"></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $category; ?></td>
                                                        <td><?php echo $subcategory; ?></td>
                                                        <td>$<?php echo $row['price']; ?></td>
                                                        <td>$<?php echo $row['discountPrice']; ?></td>
                                                        <td><i class="fa-solid fa-ellipsis"></i></td>

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
                </form>
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
<?php
    include('include/footer.php');
?>