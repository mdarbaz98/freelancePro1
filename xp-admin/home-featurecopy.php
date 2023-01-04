<?php
include('include/header.php');
include('include/sidebar.php');
?>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Home Feature</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Add Search Tag</h4>
                                <form id="addTag">
                                    <input type="hidden" name="btn" value="addHomeTag">
                                    <div class="row mb-4">
                                        <label for="taginput" class="col-sm-3 col-form-label">Tag</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tag-input" name="tag" for="taginput" placeholder="Enter Your " />
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="url-input" class="col-sm-3 col-form-label">Url</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="url-input" name="url" for="url-input" placeholder="Enter Your Email ID" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" name="add-tag" id="add-tag">
                                                    Add Tag
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Popular Search</h4>

                                <div class="tag-x-cut">
                                    <?php
                                    $getTag = $conn->prepare('SELECT * FROM hometag');
                                    $getTag->execute();
                                    while ($row = $getTag->fetch(PDO::FETCH_ASSOC)) {
                                        if ($row['status'] == 0) {
                                            $status = 'style="border:1px solid red"';
                                        } else {
                                            $status = '';
                                        }
                                    ?>
                                        <div class="tag-x" <?php echo $status; ?>> <?php echo $row['tag']; ?><button class="cross-cut-btn" onclick="deleteTag(this)" id="<?php echo $row['id']; ?>">X</button> </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>


                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Board Member</h4>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="search-element">
                                            <div class="board-member-search d-none d-lg-block">
                                                <div class="position-relative mb-3">

                                                    <input type="text" class="scope-control" id="myInput2" onkeyup="filterTextInput2()" placeholder="Search Member">
                                                    <span class="bx bx-search-alt search-scp"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <form id="setHmeMember">
                                            <div class="row cta-check">
                                                <input type="hidden" name="btn" value="homeMember">
                                                <?php
                                                $getCta = $conn->prepare("SELECT * FROM boardmember");
                                                $getCta->execute();
                                                while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                    if ($row['featured'] == 1) {
                                                        $status = "checked";
                                                    } else {
                                                        $status = '';
                                                    }
                                                ?>

                                                    <div class="col-lg-4 div" data-content="<?php echo $row['firstname']; ?>">
                                                        <input data-id="cta" name="homeMember[]" <?php echo $status; ?> data-field="cta" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type="checkbox">
                                                        <label for="<?php echo $row['id']; ?>">
                                                            <div class="cta-div mb-3">
                                                                <img src="<?php echo $actual_link; ?>/druggist-admin<?php echo $row['image'] ?>" alt="">


                                                                <div class="cta-content">
                                                                    <h4><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h4>
                                                                    <p>@<?php echo $row['username']; ?></p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>

                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <div class="d-flex mt-2">
                                                <button type="submit" class="btn btn-primary w-md">
                                                    Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">CTA</h4>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="search-element">
                                                <div class="board-member-search d-none d-lg-block">
                                                    <div class="position-relative mb-3">

                                                        <input type="text" id="myInput3" onkeyup=" filterTextInput3()" class="scope-control" placeholder="Search CTA">
                                                        <span class="bx bx-search-alt search-scp"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <form id="setHomeCta">
                                                <div class="row cta-check">
                                                    <input type="hidden" name="btn" value="homeCta">
                                                    <?php
                                                    $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                    $getCta->execute();
                                                    while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                        if ($row['featured'] == 1) {
                                                            $status = "checked";
                                                        } else {
                                                            $status = '';
                                                        }
                                                    ?>

                                                        <div class="col-lg-6 div" data-content="<?php echo $row['title']; ?>">
                                                            <input data-id="cta" name="homeCta[]" <?php echo $status; ?> data-field="cta" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type="checkbox">
                                                            <label for="<?php echo $row['id']; ?>">
                                                                <div class="cta-div mb-3">
                                                                    <img src="<?php echo $actual_link; ?>/druggist-admin<?php echo $row['image'] ?>" alt="">


                                                                    <div class="cta-content">
                                                                        <h4><?php echo $row['title']; ?></h4>
                                                                        <p><?php echo $row['details']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>

                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                <div class="d-flex mt-2">
                                                    <button type="submit" class="btn btn-primary w-md">
                                                        Update</button>
                                                </div>
                                            </form>
                                        </div>
                                       

                                    </div>

                                   
                                </div>
                            </div>

                        </div>

                                        <div class="col-lg-12">
                                                   
                                <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">CTA</h4>

                                    <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Lifestyle
                                            </button>
                                        </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <form id="homeCat">
                                                            <?php
                                                            $getData = $conn->prepare('SELECT * FROM post WHERE mainCategories="25"');
                                                            $getData->execute();
                                                            while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
                                                               echo $title = $row['title'];
                                                               echo "<br>";
                                                                // $category = $row['category'];
                                                                // $url = $row['url'];
                                                                // $cta = $row['cta'];
                                                            }
                                                            ?>
                                                            </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>                
                            </div>
                        </div>


                        <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                            Men's Health
                                            </button>
                                        </h2>

                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
fsdfsdfd
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>                
                            </div>
                        </div>


                                                    

                                                </div>
                                            </div>
                                        </div>




                    </div>
                </div>
            </div>



            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Men's Health
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">


                                                        <form id="homeCat">
                                                            <?php
                                                            $getData = $conn->prepare('SELECT * FROM homestaticcat WHERE section="men"');
                                                            $getData->execute();
                                                            while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
                                                                $title = $row['title'];
                                                                $category = $row['category'];
                                                                $url = $row['url'];
                                                                $cta = $row['cta'];
                                                            }
                                                            ?>
                                                            <input type="hidden" name="btn" value="homeCat">
                                                            <input type="hidden" name="section" value="men">
                                                            <div class="input-group">

                                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                                                <span class="error imageError"></span>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">Title</label>
                                                                    <input type="text" value="<?php echo $title ?>" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                                                    <span class="error titleError"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">Category</label>
                                                                    <input type="text" class="form-control" value="<?php echo $category ?>" id="category" name="category" placeholder="Caregory">
                                                                    <span class="error mcategoryError"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">URL</label>
                                                                    <input type="text" class="form-control" value="<?php echo $url ?>" name="url" id="url" placeholder="Url">
                                                                    <span class="error urlError"></span>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-end">
                                                                <div class="col-sm-12">
                                                                    <label for="">CTA</label>
                                                                    <input class="form-control" id="myInput" type="text" onkeyup="filterTextInput()" placeholder="Search DeepLink">
                                                                    <div class="row cta-check my-3">
                                                                        <?php
                                                                        $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                                        $getCta->execute();
                                                                        while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                                            if ($row['id'] == $cta) {
                                                                                $status = "checked";
                                                                            } else {
                                                                                $status = "";
                                                                            }
                                                                        ?>

                                                                            <div class="col-lg-12 div" data-content="<?php echo $row['title']; ?>">
                                                                                <input data-id="cta" <?php echo $status; ?> name="cta" data-field="cta" value="<?php echo $row['id']; ?>" id="m<?php echo $row['id']; ?>" type="radio">
                                                                                <label for="m<?php echo $row['id']; ?>">
                                                                                    <div class="cta-div mb-3">


                                                                                        <img src="<?php echo $actual_link; ?>/druggist-admin<?php echo $row['image'] ?>" alt="">


                                                                                        <div class="cta-content">
                                                                                            <h4><?php echo $row['title']; ?></h4>
                                                                                            <p><?php echo $row['details']; ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>

                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div>
                                                                        <input type="submit" value="Add">
                                                                    </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Women's Health
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form id="homeCat1">
                                                            <?php
                                                            $getData = $conn->prepare('SELECT * FROM homestaticcat WHERE section="women"');
                                                            $getData->execute();
                                                            while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
                                                                $title = $row['title'];
                                                                $category = $row['category'];
                                                                $url = $row['url'];
                                                                $cta = $row['cta'];
                                                            }
                                                            ?>
                                                            <input type="hidden" name="btn" value="homeCat">
                                                            <input type="hidden" name="section" value="women">
                                                            <div class="input-group mb-3">

                                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                                                <span class="error imageError"></span>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">Title</label>
                                                                    <input type="text" value="<?php echo $title ?>" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                                                    <span class="error titleError"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">Category</label>
                                                                    <input type="text" class="form-control" value="<?php echo $category ?>" id="category" name="category" placeholder="Caregory">
                                                                    <span class="error mcategoryError"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">URL</label>
                                                                    <input type="text" class="form-control" value="<?php echo $url ?>" name="url" id="url" placeholder="Url">
                                                                    <span class="error urlError"></span>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-end">
                                                                <div class="col-sm-12">
                                                                    <label for="">CTA</label>
                                                                    <input class="form-control" id="myInput1" type="text" onkeyup="filterTextInput1()" placeholder="Search DeepLink">
                                                                    <div class="row cta-check my-3">
                                                                        <?php
                                                                        $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                                        $getCta->execute();
                                                                        while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                                            if ($row['id'] == $cta) {
                                                                                $status = "checked";
                                                                            } else {
                                                                                $status = "";
                                                                            }
                                                                        ?>

                                                                            <div class="col-lg-12 div" data-content="<?php echo $row['title']; ?>">
                                                                                <input data-id="cta" <?php echo $status; ?> name="cta" data-field="cta" value="<?php echo $row['id']; ?>" id="w<?php echo $row['id']; ?>" type="radio">
                                                                                <label for="w<?php echo $row['id']; ?>">
                                                                                    <div class="cta-div mb-3">
                                                                                        <?php
                                                                                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                                                                        ?>

                                                                                        <img src="<?php echo $actual_link; ?>/druggist-admin<?php echo $row['image'] ?>" alt="">


                                                                                        <div class="cta-content">
                                                                                            <h4><?php echo $row['title']; ?></h4>
                                                                                            <p><?php echo $row['details']; ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>

                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div>
                                                                        <input type="submit" value="Add">
                                                                    </div>
                                                        </form>

                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            General Health
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form id="homeCat2">
                                                            <?php
                                                            $getData = $conn->prepare('SELECT * FROM homestaticcat WHERE section="general-health"');
                                                            $getData->execute();
                                                            while ($row = $getData->fetch(PDO::FETCH_ASSOC)) {
                                                                $title = $row['title'];
                                                                $category = $row['category'];
                                                                $url = $row['url'];
                                                                $cta = $row['cta'];
                                                            }
                                                            ?>
                                                            <input type="hidden" name="btn" value="homeCat">
                                                            <input type="hidden" name="section" value="general-health">
                                                            <div class="input-group mb-3">

                                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                                                <span class="error imageError"></span>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">Title</label>
                                                                    <input type="text" value="<?php echo $title ?>" class="form-control" id="title" name="title" placeholder="Add New Title ">
                                                                    <span class="error titleError"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">Category</label>
                                                                    <input type="text" class="form-control" value="<?php echo $category ?>" id="category" name="category" placeholder="Caregory">
                                                                    <span class="error mcategoryError"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <label for="">URL</label>
                                                                    <input type="text" class="form-control" value="<?php echo $url ?>" name="url" id="url" placeholder="Url">
                                                                    <span class="error urlError"></span>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-end">
                                                                <div class="col-sm-12">
                                                                    <label for="">CTA</label>
                                                                    <input class="form-control" id="myInput1" type="text" onkeyup="filterTextInput1()" placeholder="Search DeepLink">
                                                                    <div class="row cta-check my-3">
                                                                        <?php
                                                                        $getCta = $conn->prepare("SELECT * FROM deeplinks");
                                                                        $getCta->execute();
                                                                        while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                                                            if ($row['id'] == $cta) {
                                                                                $status = "checked";
                                                                            } else {
                                                                                $status = "";
                                                                            }
                                                                        ?>

                                                                            <div class="col-lg-12 div" data-content="<?php echo $row['title']; ?>">
                                                                                <input data-id="cta" <?php echo $status; ?> name="cta" data-field="cta" value="<?php echo $row['id']; ?>" id="g<?php echo $row['id']; ?>" type="radio">
                                                                                <label for="g<?php echo $row['id']; ?>">
                                                                                    <div class="cta-div mb-3">
                                                                                        <?php
                                                                                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                                                                                        ?>

                                                                                        <img src="<?php echo $actual_link; ?>/druggist-admin<?php echo $row['image'] ?>" alt="">


                                                                                        <div class="cta-content">
                                                                                            <h4><?php echo $row['title']; ?></h4>
                                                                                            <p><?php echo $row['details']; ?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>

                                                                        <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <div>
                                                                        <input type="submit" value="Add">
                                                                    </div>
                                                        </form>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end accordion -->
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
</div>
</div>
</div>
<?php
include('include/footer.php');
?>