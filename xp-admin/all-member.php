<?php
include('include/header.php');
include('include/sidebar.php');
?>
<div class="main-content">

    <div class="page-content">
        <!--container for category page starts here-->
        <div class="container-datatable">
            <div class="header-container">
                <h4>ALL Member</h4>
            </div>

            <div class="row ">
                <!--2nd section starts here-->
                <div class="col-lg-12">
                    <div class="container-fluid">
                        <form action="">
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
                                                                <input type="radio" name="operationType" value="delete" id="delete" checked>
                                                                <label for="delete">Delete</label>
                                                            </a>

                                                        </div>
                                                </div>
                                                <div>
                                                    <button type="button" class=" btn btn-primary mx-2 apply-btn" id="boardmemberApply">Apply</button>
                                                </div>
                                            </div>
                                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">


                                                <thead>
                                                    <tr>
                                                    <th class="text-center"><input type="checkbox" class="form-check-input" id="checkAllMember"></th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Reviewed Blogs</th>
                                                        <th>Written Blogs</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    <?php
                                                        $boardMember = $conn->prepare('SELECT * FROM boardmember order by id desc');
                                                        $boardMember->execute();
                                                        while($row=$boardMember->fetch(PDO::FETCH_ASSOC)){
                                                            $selectwrite = $conn->prepare('SELECT * FROM post where written=?');
                                                            $selectwrite->execute([$row['id']]);
                                                            $writeCount=$selectwrite->rowCount();
                                                            $selectreview = $conn->prepare('SELECT * FROM post where reviewed=?');
                                                            $selectreview->execute([$row['id']]);
                                                            $reviewCount=$selectreview->rowCount();
                                                            
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
                                                                 $author_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                                                }else{
                                                                 $author_image="https://i.ibb.co/4fz1F7f/Getty-Images-974371976.jpg";
                                                                }
                                                    ?>
                                                    <tr>
                                                    <th class="text-center">
                                                        <input type="checkbox" 
                                                        value="<?php echo $row['id'] ?>" class="form-check-input" name="boardmemberCheckbox">
                                                    </th>
                                                        <td><img src="<?php echo $author_image ?>" style="width: 70px;"></td>
                                                        <td><?php echo $row['full_name'] ?></td>
                                                        <td><?php echo $row['email'] ?></td>
                                                        <td><?php echo $reviewCount; ?></td>
                                                        <td><?php echo $writeCount; ?></td>
                                                        <td><a href="edit-member.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pencil"></i></a></td>
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
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Skote.
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