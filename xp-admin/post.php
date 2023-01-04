<?php
include('include/header.php');
include('include/sidebar.php');
           $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="main-content">

    <div class="page-content">
        <!--container for category page starts here-->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"> All Post</h4>
                </div>
            </div>
        </div>
        <div class="container-datatable">
            <div class="row ">

                <form action=""></form>
                <div class="col-lg-12">
                    <div class="row ml-3">
                        <div class="col-lg-4">
                            <div class="posts-add-new-post ">
                                <a href="add-post.php"><button class="btn btn-primary mt-3 mb-4   add-btn"><i class="fa-solid fa-circle-plus"></i> Add New Post</button></a>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4 ">
                            <!-- <form class="app-search d-none d-lg-block">
                                        <div class="position-relative mr-3">
                                            <input type="search" class="form-control" placeholder="Search Post">
                                            <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                        </div>
                                    </form> -->
                        </div>
                    </div>
                </div>

                <!--2nd section starts here-->
                <div class="col-lg-12">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="postLink">
                                            <li>
                                                <?php
                                                $allPost = $conn->prepare('SELECT * FROM post ORDER BY postDate DESC');
                                                $allPost->execute();
                                                $allPost = $allPost->rowCount();
                                                ?>
                                                <a href="post.php">All (<?php echo $allPost; ?>)</a>
                                            </li>
                                            <li>
                                                <?php
                                                $allPost = $conn->prepare('SELECT * FROM post WHERE status="Publish" ORDER BY postDate DESC');
                                                $allPost->execute();
                                                $allPost = $allPost->rowCount();
                                                ?>
                                                <a href="post.php?status=Publish">Publish (<?php echo $allPost; ?>)</a>
                                            </li>
                                            <li>
                                                <?php
                                                $allPost = $conn->prepare('SELECT * FROM post WHERE status="Pending Review" ORDER BY postDate DESC');
                                                $allPost->execute();
                                                $allPost = $allPost->rowCount();
                                                ?>
                                                <a href="post.php?status=Pending Review">Pending (<?php echo $allPost; ?>)</a>
                                            </li>
                                            <li>
                                                <?php
                                                $allPost = $conn->prepare('SELECT * FROM post WHERE status="Draft" ORDER BY postDate DESC');
                                                $allPost->execute();
                                                $allPost = $allPost->rowCount();
                                                ?>
                                                <a href="post.php?status=Draft">Draft (<?php echo $allPost; ?>)</a>
                                            </li>
                                            <li>
                                                <?php
                                                $allPost = $conn->prepare('SELECT * FROM post WHERE status="Trash" ORDER BY postDate DESC');
                                                $allPost->execute();
                                                $allPost = $allPost->rowCount();
                                                ?>
                                                <a href="post.php?status=Trash">Trash (<?php echo $allPost; ?>)</a>
                                            </li>
                                        </ul>
                                        <br>
                                        <table id="datatable" class="table table-borderless table-striped ">


                                            <thead>
                                                <tr>
                                                    <th class="text-center"><input type="checkbox" class="form-check-input" id="select-all"></th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Categories</th>
                                                    <th>Subcategories</th>
                                                    <th>Date</th>
                                                    <th>status</th>
                                                    <th>View</th>
                                                    <th><i class="fa-solid fa-ellipsis"></i></th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                if (isset($_GET['status'])) {
                                                    $getPost = $conn->prepare('SELECT * FROM post WHERE status = ? ORDER BY postDate DESC');
                                                    $getPost->execute([$_GET['status']]);
                                                } else {
                                                    $getPost = $conn->prepare('SELECT * FROM post ORDER BY postDate DESC');
                                                    $getPost->execute();
                                                }

                                                while ($row = $getPost->fetch(PDO::FETCH_ASSOC)) {
                                                    if(!empty($row['written'])){
                                                        $written_id=$row['written'];
                                                    }else{
                                                        $written_id=1;
                                                    }

                                                   //echo 'SELECT * FROM boardmember WHERE id=? limit 1'
                                                    $boardMember = $conn->prepare('SELECT * FROM boardmember WHERE id=? limit 1');
                                                    $boardMember->execute([$written_id]);
                                                    while ($rowWrite = $boardMember->fetch(PDO::FETCH_ASSOC)) {
                                                        $written = $rowWrite['full_name'];
                                                    }   
                                                    $getCategory = $conn->prepare('SELECT * FROM categories WHERE id IN ("' . $row['mainCategories'] . '") limit 1');
                                                    $getCategory->execute();
                                                    while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                                                        $category = $rowCat['name'];
                                                    }
                                                    $getSubcategory = $conn->prepare('SELECT * FROM categories WHERE id IN ("' . $row['subcategories'] . '") limit 1');
                                                    $getSubcategory->execute();
                                                    while ($rowCat = $getSubcategory->fetch(PDO::FETCH_ASSOC)) {
                                                        $subcategory = $rowCat['name'];
                                                    }
                                                        $postDate = $row['postDate'];
                                                        $filter_postDate = date('F d, Y', strtotime($postDate));
                                                       // $filter_postDate = date('d, m, Y', strtotime($postDate));
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
                                                        <th class="text-center"><input type="checkbox" class="form-check-input" name="category"></th>
                                                        <td class="table-img"><img src="<?php echo $post_image ?>" alt="<?php echo $row['img_alt']; ?>"></td>
                                                        <td><?php echo $row['title'] ?></td>
                                                        <td><?php echo $written ?></td>
                                                        <td><?php echo $category ?></td>
                                                        <td><?php echo $subcategory ?></td>
                                                        <th><?php echo $filter_postDate ?></th>
                                                        <th><p class="status"><?php echo $row['status'] ?></p>
                                                        </th>
                                                        <td> <a target="_blank" href="http://localhost/<?php echo $row['slug']; ?>" class="btn btn-success"><i class="fas fa-solid fa-eye"
														 style="margin-left:-2px;color: white;font-size: 15px;margin-top:1px;"></i>
														</td>
														
                                                        <?php
                                             
                                                        ?>
                                                        <th class="table-data-icons">
                                                            <a href="edit-post.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-pencil"></i></a>
                                                            <a href="delete-post.php?id=<?php echo $row['id'] ?>&link=<?php echo $actual_link ?>"><i class="fa-solid fa-trash"></i></a>
                                                            <!-- <i class="fa-solid fa-ellipsis"></i> -->
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
<?php include('include/footer.php');?>