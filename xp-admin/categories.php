<?php
include('include/header.php');
include('include/sidebar.php');
?>
<div class="main-content">

    <div class="page-content">
        <!--container for category page starts here-->
        <div class="container-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add New Categories</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <!--1st Section start here-->
                <div class="col-lg-4 categoryForm">
                    <form id="addCategories" method="POST">
                        <div class="input-group-datatable">
                            <div class="input-custom">
                                <input type="hidden" name="btn" value="addCategories">
                                <label for="">Category</label>
                                <input type="text" name="name" placeholder="Category Name" id="name" class="form-control">
                                <span class="error nameError"></span>
                            </div>
                            <div class="input-custom">
                                <label for="">Slug</label>
                                <input type="text" name="slug" id="slug" placeholder="Enter Slug" class="form-control">
                                <span class="error slugError"></span>
                            </div>
                            <div class="input-custom">
                                <label for="">Parent Category</label>
                                <select class="form-control select2" name="parentCategory" id="parentCategory">
                                    <option value="0">Select Parent Category</option>
                                    <?php
                                    $getCategory = $conn->prepare('SELECT * FROM categories WHERE parentCategory = ?');
                                    $getCategory->execute([0]);
                                    while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo strtoupper($row['name']); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="error parentCategoryError"></span>
                            </div>
                            <div class="">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="description" cols=" 5" rows="2" placeholder="Enter Description" required></textarea>
                                <span class="error descriptionError"></span>
                            </div>
                            <div class="input-custom">
                                <label for="">Seo Title</label>
                                <input type="text" name="seotitle" id="seotitle" placeholder="Enter Seo Title" class="form-control">
                                <span class="error seotitleError"></span>
                            </div>
                            <div class="">
                                <label for="">SEO Des</label>
                                <textarea class="form-control" name="seodes" id="seodes" cols=" 5" rows="2" placeholder="Enter Description" required></textarea>
                                <span class="error seodesError"></span>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary mt-3 mt-lg-0 add-btn" name="cat-btn" id="cat-btn" value="Add Category">
                            </div>
                        </div>

                    </form>
                </div>
                <!--1st Section ends here-->


                <!--2nd section starts here-->
                <div class="col-lg-8">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex mb-5 mx-2 filter-button">
                                            <!-- <div>
                                                        <i class="fa-brands fa-audible"></i>
                                                    </div> -->
                                            <div class="dropdown">
                                                <button class="btn select-bulk-cat  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Bulk Action<i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">
                                                        <input type="radio" name="operationType" value="delete" id="delete">
                                                        <label for="delete">Delete</label>
                                                    </a>
                                                    <a class="dropdown-item" href="#"> <input type="radio" name="operationType" value="edit" id="edit">
                                                        <label for="edit">Edit</label> </a>

                                                </div>
                                            </div>
                                            <div>
                                                <button class=" btn btn-primary mx-2 apply-btn" id="categoryApply">Apply</button>
                                            </div>
                                            <div>
                                                <div class="select-category">

                                                    <div class="dropdown">
                                                        <button class="btn select-bulk-cat  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Select Category<i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"> <input type="radio" class="form-control" name="skill-1" value="male" id="m"><label for="m">Male</label> </a>
                                                            <a class="dropdown-item" href="#"> <input type="radio" class="form-control" name="skill-1" value="female" id="f"><label for="f">Female</label> </a>
                                                            <a class="dropdown-item" href="#"><input type="radio" class="form-control" name="skill-1" value="other" id="o"> <label for="o">Other</label></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mx-2 ">

                                                <div>
                                                    <input class="form-control checkbox-select-date" type="date" placeholder="Select Date" id="example-date-input">
                                                </div>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered dt-responsive">


                                            <thead>
                                                <tr>
                                                    <th class="text-center"><input type="checkbox" class="form-check-input" id="checkAll"></th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Slug</th>
                                                    <th>Count</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $getCategory = $conn->prepare('SELECT * FROM categories WHERE status=1');
                                                $getCategory->execute();
                                                while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                                                    $id = $row['id'];
                                                ?>
                                                    <tr>
                                                        <th class="text-center"><input type="checkbox" class="form-check-input" name="categoryCheckbox" value="<?php echo $id; ?>"></th>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                        <td><?php echo $row['slug']; ?></td>
                                                        <?php
                                                        $selectTotalBlogCount = $conn->prepare("SELECT * FROM post WHERE mainCategories LIKE '%$id%' OR subcategories LIKE '%$id%'");
                                                        $selectTotalBlogCount->execute();
                                                        $totalBlog = $selectTotalBlogCount->rowCount();
                                                        ?>
                                                        <td><?php echo $totalBlog; ?></td>

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
    <?php
    include('include/footer.php');
    ?>