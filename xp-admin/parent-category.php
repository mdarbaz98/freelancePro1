<?php
include('include/header.php');
include('include/sidebar.php');
?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Parent Category</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Category</h4>
                                <form action="">
                                    <div class="row">
                                        <div class="col-lg-7">

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

                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div
                                                        class="page-title-box d-sm-flex align-items-center justify-content-between">
                                                        <h4 class="mb-sm-0 font-size-18">LifeStyle</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-pills nav-justified" role="tablist">
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#home-1"
                                                        role="tab">
                                                        <span class="d-block d-sm-none"><i
                                                                class="fas fa-home"></i></span>
                                                        <span class="d-none d-sm-block">Include</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#profile-1"
                                                        role="tab">
                                                        <span class="d-block d-sm-none"><i
                                                                class="far fa-user"></i></span>
                                                        <span class="d-none d-sm-block">Exclude</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content p-3 text-muted">
                                                <div class="tab-pane active" id="home-1" role="tabpanel">
                                                    <div class="search-element">
                                                        <div class="board-member-search d-none d-lg-block">
                                                            <div class="position-relative mb-3">

                                                                <input type="text" class="scope-control"
                                                                    placeholder="Search Member">
                                                                <span class="bx bx-search-alt search-scp"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-casual-character_183364-80985.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-casual-character_183364-80985.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-casual-character_183364-80985.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-casual-character_183364-80985.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-casual-character_183364-80985.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="m-3">
                                                        <button type="submit"
                                                            class="btn btn-primary w-md">Update</button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="profile-1" role="tabpanel">
                                                    <div class="search-element">
                                                        <div class="board-member-search d-none d-lg-block">
                                                            <div class="position-relative mb-3">

                                                                <input type="text" class="scope-control"
                                                                    placeholder="Search Member">
                                                                <span class="bx bx-search-alt search-scp"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="baord_member_item my-2 d-flex gap-2">
                                                        <div class="image">
                                                            <img src="https://img.freepik.com/free-photo/fun-3d-cartoon-teenage-boy_183364-81184.jpg?w=740"
                                                                alt="">
                                                        </div>
                                                        <div class="member_info">
                                                            <h2>Name Here</h2>
                                                            <span>Designation</span>
                                                        </div>
                                                        <button type="button" class="btn-close me-2 m-auto p-1"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                    <div class="m-3">
                                                        <button type="submit"
                                                            class="btn btn-primary w-md">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-4">CTA</h4>
                                        <div class="mb-3">
                                            <select id="formrow-inputState" class="form-select">
                                                <option selected="">Select Category</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="search-element">
                                                <div class="board-member-search d-none d-lg-block">
                                                    <!-- <div class="position-relative mb-3">

                                                        <input type="text" class="scope-control"
                                                            placeholder="Search CTA">
                                                        <span class="bx bx-search-alt search-scp"></span>
                                                    </div> -->
                                                </div>
                                            </div>

                                           <div class="row">
                                               <div class="col-lg-6">
                                                    <div class="d-flex flex-column mr-2">
                                                <div class="toast-white-01 d-flex flex-row mb-3">
                                                    <div class="toast-img-01">
                                                        <img src="https://img.freepik.com/free-photo/living-room-interior-with-armchair-cabinet-empty-green-wall-background3d-rendering_41470-4402.jpg?w=740"
                                                            alt="">
                                                    </div>
                                                    <div class="toast-content-01">
                                                        <h6>Lorem ipsum</h6>
                                                        <p>In publishing and graphic
                                                            design</p>
                                                    </div>
                                                    <button type="button" class="btn-close me-2 m-auto p-1"
                                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mr-2">
                                                <div class="toast-white-01 d-flex flex-row mb-3">
                                                    <div class="toast-img-01">
                                                        <img src="https://img.freepik.com/free-photo/living-room-interior-with-armchair-cabinet-empty-green-wall-background3d-rendering_41470-4402.jpg?w=740"
                                                            alt="">
                                                    </div>
                                                    <div class="toast-content-01">
                                                        <h6>Lorem ipsum</h6>
                                                        <p>In publishing and graphic
                                                            design</p>
                                                    </div>
                                                    <button type="button" class="btn-close me-2 m-auto p-1"
                                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column mr-2">
                                                <div class="toast-white-01 d-flex flex-row mb-3">
                                                    <div class="toast-img-01">
                                                        <img src="https://img.freepik.com/free-photo/living-room-interior-with-armchair-cabinet-empty-green-wall-background3d-rendering_41470-4402.jpg?w=740"
                                                            alt="">
                                                    </div>
                                                    <div class="toast-content-01">
                                                        <h6>Lorem ipsum</h6>
                                                        <p>In publishing and graphic
                                                            design</p>
                                                    </div>
                                                    <button type="button" class="btn-close me-2 m-auto p-1"
                                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>
                                               </div>
                                               <div class="col-lg-6">
                                                    <div class="d-flex flex-column mr-2">
                                                <div class="toast-white-01 d-flex flex-row mb-3">
                                                    <div class="toast-img-01">
                                                        <img src="https://img.freepik.com/free-photo/living-room-interior-with-armchair-cabinet-empty-green-wall-background3d-rendering_41470-4402.jpg?w=740"
                                                            alt="">
                                                    </div>
                                                    <div class="toast-content-01">
                                                        <h6>Lorem ipsum</h6>
                                                        <p>In publishing and graphic
                                                            design</p>
                                                    </div>
                                                    <button type="button" class="btn-close me-2 m-auto p-1"
                                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mr-2">
                                                <div class="toast-white-01 d-flex flex-row mb-3">
                                                    <div class="toast-img-01">
                                                        <img src="https://img.freepik.com/free-photo/living-room-interior-with-armchair-cabinet-empty-green-wall-background3d-rendering_41470-4402.jpg?w=740"
                                                            alt="">
                                                    </div>
                                                    <div class="toast-content-01">
                                                        <h6>Lorem ipsum</h6>
                                                        <p>In publishing and graphic
                                                            design</p>
                                                    </div>
                                                    <button type="button" class="btn-close me-2 m-auto p-1"
                                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column mr-2">
                                                <div class="toast-white-01 d-flex flex-row mb-3">
                                                    <div class="toast-img-01">
                                                        <img src="https://img.freepik.com/free-photo/living-room-interior-with-armchair-cabinet-empty-green-wall-background3d-rendering_41470-4402.jpg?w=740"
                                                            alt="">
                                                    </div>
                                                    <div class="toast-content-01">
                                                        <h6>Lorem ipsum</h6>
                                                        <p>In publishing and graphic
                                                            design</p>
                                                    </div>
                                                    <button type="button" class="btn-close me-2 m-auto p-1"
                                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>
                                               </div>
                                           </div>
                                            <div class="d-flex">
                                                <button type="submit" class="btn btn-primary w-md">Update</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Page-content -->
    <?php include('include/footer.php');?>