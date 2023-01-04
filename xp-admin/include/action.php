<?php
session_start();
include('db.php');
if ($_POST['btn'] == 'addCategories') {
    $name = cleanData($_POST['name']);
    $slug  = cleanData($_POST['slug']);
    $parentCategory = cleanData($_POST['parentCategory']);
    $description = cleanData($_POST['description']);
    $seotitle = cleanData($_POST['seotitle']);
    $seodes = cleanData($_POST['seodes']);

    if (!empty($name)) {
        if (!empty($slug)) {
            if (!empty($parentCategory) or $parentCategory == 0) {
                if (!empty($description)) {
                    $insertCategory = $conn->prepare('INSERT INTO categories(name, slug, parentCategory, description, seotitle, seodes, addBy) VALUE(?,?,?,?,?,?,?)');
                    $insertCategory->execute([$name, $slug, $parentCategory, $description, $seotitle, $seodes, $_SESSION['username']]);
                    if ($insertCategory) {
                        echo "done";
                    }
                } else {
                    echo "descriptionEmpty";
                }
            } else {
                echo 'parentCategoryEmpty';
            }
        } else {
            echo 'slugEmpty';
        }
    } else {
        echo "nameEmpty";
    }
}


if ($_POST['btn'] == 'categoryOption') {
    $type = $_POST['type'];
    $category = $_POST['category'];
    $total = count($category);
    if ($type == 'edit') {
        $data = '';
        for ($i = 0; $i < $total; $i++) {
            $getCategory = $conn->prepare('SELECT * FROM categories WHERE id=?');
            $getCategory->execute([$category[$i]]);
            while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                $data .= '
                <p><b>' . ($j = $i + 1) . '-' . $row['name'] . '</b></p>
                <div class="">
                    <input type="hidden" name="id[]" value="' . $row['id'] . '">
                    <label for="">Category</label>
                    <input type="text" name="name[]" placeholder="Category Name" value="' . $row['name'] . '" id="name" class="form-control" required>
                    <span class="error nameError"></span>
                </div>
                <div class="">
                    <label for="">Slug</label>
                    <input type="text" name="slug[]" id="slug" value="' . $row['slug'] . '" placeholder="Enter Slug" class="form-control" required>
                    <span class="error slugError"></span>
                </div>
                <div class="">
                    <label for="">Parent Category</label>
                    <select class="form-control select2" name="parentCategory[]" id="parentCategory" required>
                        <option value="0">Select Parent Category</option>
                        ';
                $getSingleCategory = $conn->prepare('SELECT * FROM categories WHERE parentCategory = ?');
                $getSingleCategory->execute([0]);
                while ($rowCat = $getSingleCategory->fetch(PDO::FETCH_ASSOC)) {
                    if ($rowCat['id'] == $row['parentCategory']) {
                        $status = "selected";
                    } else {
                        $status = "";
                    }
                    $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                }
                $data .= '
                    </select>
                    <span class="error parentCategoryError"></span>
                </div>
                <div class="">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description[]" id="description" cols=" 5" rows="2" placeholder="Enter Description" required>' . $row['description'] . '</textarea>
                    <span class="error descriptionError"></span>
                </div>
                <div class="">
                    <label for="">Seo Title</label>
                    <input type="text" name="seotitle[]" value="' . $row['seotitle'] . '" id="seotitle" placeholder="Enter Seo Title" class="form-control">
                    <span class="error seotitleError"></span>
                </div>
                <div class="">
                    <label for="">SEO Des</label>
                    <textarea class="form-control" name="seodes[]" id="seodes" cols=" 5" rows="2" placeholder="Enter Description" required>' . $row['seodes'] . '</textarea>
                    <span class="error seodesError"></span>
                </div>
                ';
            }
        }
        echo '
                <form id="editCategories" method="POST">
                    <div class="input-group-datatable">
                    <input type="hidden" name="btn" value="editCategory">
            ';
        echo $data;
        echo '
                    </div>
                    <input type="submit" class="btn btn-primary mt-3 mt-lg-0 add-btn" name="cat-btn" id="cat-btn" value="Update Category">
                </form>
            ';
    } elseif ($type == "delete") {
        for ($i = 0; $i < $total; $i++) {
            $deleteCategory = $conn->prepare('UPDATE categories SET status=? WHERE id=?');
            $deleteCategory->execute([0, $category[$i]]);
            if ($i == ($total - 1)) {
                echo 'done';
            }
        }
    }
}

if ($_POST['btn'] == "editCategory") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $parentCategory = $_POST['parentCategory'];
    $description = $_POST['description'];
    $seotitle = $_POST['seotitle'];
    $seodes = $_POST['seodes'];
    $data = '';
    $total = count($id);
    for ($i = 0; $i < $total; $i++) {
        $updateCategory = $conn->prepare("UPDATE categories SET name=?, slug=?, parentCategory=?,  description=?,  seotitle=?, seodes=? WHERE id=?");
        $updateCategory->execute([$name[$i], $slug[$i], $parentCategory[$i], $description[$i], $seotitle[$i], $seodes[$i],  $id[$i]]);
        if ($i == ($total - 1)) {
            for ($i = 0; $i < $total; $i++) {
                $getCategory = $conn->prepare('SELECT * FROM categories WHERE id=?');
                $getCategory->execute([$id[$i]]);
                while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                    $data .= '
                    <p><b>' . ($j = $i + 1) . '-' . $row['name'] . '</b></p>
                    <div class="">
                        <input type="hidden" name="id[]" value="' . $row['id'] . '">
                        <label for="">Category</label>
                        <input type="text" name="name[]" placeholder="Category Name" value="' . $row['name'] . '" id="name" class="form-control" required>
                        <span class="error nameError"></span>
                    </div>
                    <div class="">
                        <label for="">Slug</label>
                        <input type="text" name="slug[]" id="slug" value="' . $row['slug'] . '" placeholder="Enter Slug" class="form-control" required>
                        <span class="error slugError"></span>
                    </div>
                    <div class="">
                        <label for="">Parent Category</label>
                        <select class="form-control select2" name="parentCategory[]" id="parentCategory" required>
                            <option value="0">Select Parent Category</option>
                            ';
                    $getSingleCategory = $conn->prepare('SELECT * FROM categories WHERE parentCategory = ?');
                    $getSingleCategory->execute([0]);
                    while ($rowCat = $getSingleCategory->fetch(PDO::FETCH_ASSOC)) {
                        if ($rowCat['id'] == $row['parentCategory']) {
                            $status = "selected";
                        } else {
                            $status = "";
                        }
                        $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                    }
                    $data .= '
                        </select>
                        <span class="error parentCategoryError"></span>
                    </div>
                    <div class="">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description[]" id="description" cols=" 5" rows="2" placeholder="Enter Description" required>' . $row['description'] . '</textarea>
                        <span class="error descriptionError"></span>
                    </div>
                    <div class="">
                        <label for="">Seo Title</label>
                        <input type="text" name="seotitle[]" value="' . $row['seotitle'] . '" id="seotitle" placeholder="Enter Seo Title" class="form-control">
                        <span class="error seotitleError"></span>
                    </div>
                    <div class="">
                        <label for="">SEO Des</label>
                        <textarea class="form-control" name="seodes[]" value="' . $row['seodes'] . '" id="seodes" cols=" 5" rows="2" placeholder="Enter Description" required></textarea>
                        <span class="error seodesError"></span>
                    </div>
                    ';
                }
            }
            echo '

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                Category has been updated!!
                <button type="button" style=" background: #07db92; border: 0px; color: #fff; font-weight: 700; border-radius: 7px; " onclick="location.reload()">Done</button>
            </div>
                    <form id="editCategories" method="POST">
                        <div class="input-group-datatable">
                        <input type="hidden" name="btn" value="editCategory">
                ';
            echo $data;
            echo '
                        </div>
                        <input type="submit" class="btn btn-primary mt-3 mt-lg-0 add-btn" name="cat-btn" id="cat-btn" value="Update Category">
                    </form>
                ';
        }
    }
}


//product categories starts from here

if ($_POST['btn'] == 'addProductCategories') {
    $name = cleanData($_POST['name']);
    $slug  = cleanData($_POST['slug']);
    $parentCategory = cleanData($_POST['parentCategory']);
    $description = cleanData($_POST['description']);

    if (!empty($name)) {
            if (!empty($parentCategory) or $parentCategory == 0) {
                    $insertCategory = $conn->prepare('INSERT INTO productcategories(name, slug, parentCategory, description, addBy) VALUE(?,?,?,?,?)');
                    $insertCategory->execute([$name, $slug, $parentCategory, $description, $_SESSION['username']]);
                    if ($insertCategory) {
                        echo "done";
                    }
                
            } else {
                echo 'parentCategoryEmpty';
            }
    } else {
        echo "nameEmpty";
    }
}

if ($_POST['btn'] == 'productCategoryOption') {
    $type = $_POST['type'];
    $category = $_POST['category'];
    $total = count($category);
    if ($type == 'edit') {
        $data = '';
        for ($i = 0; $i < $total; $i++) {
            $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
            $getCategory->execute([$category[$i]]);
            while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                $data .= '
                <p><b>' . ($j = $i + 1) . '-' . $row['name'] . '</b></p>
                <div class="mb-4 input-custom">
                    <input type="hidden" name="id[]" value="' . $row['id'] . '">
                    <input type="text" name="name[]" placeholder="Category Name" value="' . $row['name'] . '" id="name" class="form-control" required>
                    <span class="error nameError"></span>
                </div>
                <div class="mb-4 input-custom">
                    <input type="text" name="slug[]" id="slug" value="' . $row['slug'] . '" placeholder="Enter Slug" class="form-control" required>
                    <span class="error slugError"></span>
                </div>
                <div class="mb-4 input-custom">
                    <select class="form-control select2" name="parentCategory[]" id="parentCategory" required>
                        <option value="0">Select Parent Category</option>
                        ';
                $getSingleCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory = ?');
                $getSingleCategory->execute([0]);
                while ($rowCat = $getSingleCategory->fetch(PDO::FETCH_ASSOC)) {
                    if ($rowCat['id'] == $row['parentCategory']) {
                        $status = "selected";
                    } else {
                        $status = "";
                    }
                    $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                }
                $data .= '
                    </select>
                    <span class="error parentCategoryError"></span>
                </div>
                <div class="mb-4">
                    <textarea class="form-control" name="description[]" id="description" cols=" 5" rows="5" placeholder="Enter Description" required>' . $row['description'] . '</textarea>
                    <span class="error descriptionError"></span>
                </div>
                ';
            }
        }
        echo '
                <form id="editProductCategories" method="POST">
                    <div class="input-group-datatable">
                    <input type="hidden" name="btn" value="editProductCategory">
            ';
        echo $data;
        echo '
                    </div>
                    <input type="submit" class="btn btn-primary mt-3 mt-lg-0 add-btn" name="cat-btn" id="cat-btn" value="Update Category">
                </form>
            ';
    } elseif ($type == "delete") {
        for ($i = 0; $i < $total; $i++) {
            $deleteCategory = $conn->prepare('UPDATE productcategories SET status=? WHERE id=?');
            $deleteCategory->execute([0, $category[$i]]);
            if ($i == ($total - 1)) {
                echo 'done';
            }
        }
    }
}

if ($_POST['btn'] == "editProductCategory") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $parentCategory = $_POST['parentCategory'];
    $description = $_POST['description'];
    $seotitle = cleanData($_POST['seotitle']);
    $seodes = cleanData($_POST['seodes']);

    $data = '';
    $total = count($id);
    for ($i = 0; $i < $total; $i++) {
        $updateCategory = $conn->prepare("UPDATE productcategories SET name=?, slug=?, parentCategory=?, description=?, seotitle=?, seodes=? WHERE id=?");
        $updateCategory->execute([$name[$i], $slug[$i], $parentCategory[$i], $description[$i], $seotitle[$i], $seodes[$i], $id[$i]]);
        if ($i == ($total - 1)) {
            for ($i = 0; $i < $total; $i++) {
                $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=?');
                $getCategory->execute([$id[$i]]);
                while ($row = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                    $data .= '
                    <p><b>' . ($j = $i + 1) . '-' . $row['name'] . '</b></p>
                    <div class="mb-4 input-custom">
                        <input type="hidden" name="id[]" value="' . $row['id'] . '">
                        <input type="text" name="name[]" placeholder="Category Name" value="' . $row['name'] . '" id="name" class="form-control" required>
                        <span class="error nameError"></span>
                    </div>
                    <div class="mb-4 input-custom">
                        <input type="text" name="slug[]" id="slug" value="' . $row['slug'] . '" placeholder="Enter Slug" class="form-control" required>
                        <span class="error slugError"></span>
                    </div>
                    <div class="mb-4 input-custom">
                        <select class="form-control select2" name="parentCategory[]" id="parentCategory" required>
                            <option value="0">Select Parent Category</option>
                            ';
                    $getSingleCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory = ?');
                    $getSingleCategory->execute([0]);
                    while ($rowCat = $getSingleCategory->fetch(PDO::FETCH_ASSOC)) {
                        if ($rowCat['id'] == $row['parentCategory']) {
                            $status = "selected";
                        } else {
                            $status = "";
                        }
                        $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                    }
                    $data .= '
                        </select>
                        <span class="error parentCategoryError"></span>
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control" name="description[]" id="description" cols=" 5" rows="5" placeholder="Enter Description" required>' . $row['description'] . '</textarea>
                        <span class="error descriptionError"></span>
                    </div>
                    ';
                }
            }
            echo '

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                Category has been updated!!
                <button type="button" style=" background: #07db92; border: 0px; color: #fff; font-weight: 700; border-radius: 7px; " onclick="location.reload()">Done</button>
            </div>
                    <form id="editProductCategories" method="POST">
                        <div class="input-group-datatable">
                        <input type="hidden" name="btn" value="editProductCategory">
                ';
            echo $data;
            echo '
                        </div>
                        <input type="submit" class="btn btn-primary mt-3 mt-lg-0 add-btn" name="cat-btn" id="cat-btn" value="Update Category">
                    </form>
                ';
        }
    }
}

//load product subcategory
if ($_POST['btn'] == 'getProductSubCategory') {
    $data = "";
    $id = $_POST['id'];
    $getSubcategory = $conn->prepare('SELECT * FROM productcategories WHERE status = 1 && parentCategory=?');
    $getSubcategory->execute([$id]);
    $total = $getSubcategory->rowCount();
    if ($total > 0) {
        while ($row = $getSubcategory->fetch(PDO::FETCH_ASSOC)) {
            $data .= "
                <option value='" . $row['id'] . "'>" . $row['name'] . "</option>
            ";
        }
    } else {
        $data .= "
            <option>Not Found</option>
        ";
    }
    echo $data;
}

if ($_POST['btn'] == 'addProduct') {
    if (!empty($_POST['img_id'])) {
        foreach ($_POST as $fieldName => $fieldValue) {
            $error = '';
            if ((empty($fieldValue) || $fieldValue == 'Select Category' || $fieldValue == 'Select category first' || $fieldValue == 'Select Subcategory')) {
                if($fieldName=='globalLInk'){
                    if (!filter_var($url, FILTER_VALIDATE_URL)) {
                        die($fieldName);
                    }
                }
                if($fieldName!='btn' && $fieldName!='description' && $fieldName!='pack' && $fieldName!='strength'){
                    $error = "aaa";
                    die($fieldName);
                }
            }
        }
    } else {
        $error = "aaa";
        die('image');
    }
    if (empty($error)) {
        $image=$_POST['img_id'];
        $strengthList = array();
        if(!empty($_POST['strength'])){
            $strengthval = $_POST['strength'];
            $strength = json_decode($strengthval, true);
            $totalStrength = count($strength);
            for ($i = 0; $i < $totalStrength; $i++) {
                array_push($strengthList, $strength[$i]['value']);
            }
            $strength = implode(",", $strengthList);
        }else{
            $strength=NULL;
        }
        
        $packList = array();
        if(!empty($_POST['pack'])){
            $packval = $_POST['pack'];
            $pack = json_decode($packval, true);
            $totalPack = count($pack);
            for ($i = 0; $i < $totalPack; $i++) {
                array_push($packList, $pack[$i]['value']);
            }
            $pack = implode(",", $packList);
        }else{
            $pack=NULL;
        }
        $insertProduct = $conn->prepare('INSERT INTO product(image, img_alt, name, description, point, strength, pack, price, discountPrice, category, subcategory, websiteLink, addby) VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $insertProduct->execute([$image, $_POST['img_alt'], $_POST['name'], $_POST['description'], $_POST['point'], $strength, $pack, $_POST['price'], $_POST['discountPrice'], $_POST['category'], $_POST['subcategory'], $_POST['globalLInk'], $_SESSION['username']]);
        echo 'done';
    }
}

if ($_POST['btn'] == 'productOption') {
    if ($_POST['type'] == 'delete') {
        $totalProduct = count($_POST['category']);
        for ($i = 0; $i < $totalProduct; $i++) {
            $deleteCategory = $conn->prepare('UPDATE product SET status=? WHERE id=?');
            $deleteCategory->execute([0, $_POST['category'][$i]]);
            if ($i == ($totalProduct - 1)) {
                echo 'done';
            }
        }
    } elseif ($_POST['type'] == 'edit') {
        $data = '';
        $totalProduct = count($_POST['category']);
        for ($i = 0; $i < $totalProduct; $i++) {
            $getProductData = $conn->prepare('SELECT * FROM product WHERE id=?');
            $getProductData->execute([$_POST['category'][$i]]);
            while ($row = $getProductData->fetch(PDO::FETCH_ASSOC)) {
                // echo json_encode(array(
                //     "name"=>$row['name'],
                //     "sku"=>$row['sku'],
                //     "description"=>$row['description'],
                //     "point"=>$row['point'],
                //     "strength"=>$row['strength'],
                //     "pack"=>$row['pack'],
                //     "price"=>$row['price'],
                //     "discountPrice"=>$row['discountPrice'],
                //     "link"=>$row['websiteLink'],
                //     "category"=>$row['category'],
                //     "subcategory"=>$row['subcategory']
                // ));

                if(empty($row['image'])){
                    $image_id = 1;
                }
                else{
                  $image_id = $row['image'];}
                        //echo $sql = "SELECT * FROM images WHERE path='$image_id' limit 1";
                $getPost_image = $conn->prepare("SELECT * FROM images WHERE id=?");
                $getPost_image->execute([$image_id]);
                $totalpost_image = $getPost_image->rowCount();
                if($totalpost_image>0){
                $row1 = $getPost_image->fetch(PDO::FETCH_ASSOC);    
                $image_path=$row1['path'];
                }
                else{
                    $image_path="set image";
                    }
                $data .= '
                <div class="card">
                    <div class="card-body">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Product Details</h4>
                        </div>
                        <form action="POST" id="edit-product" enctype="multipart/form-data">
                        <input type="hidden" name="productId" value="' . $row['id'] . '">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="my-4">
                                    <div class="col-lg-12">
                                        <input name="btn" type="hidden" value="editProduct">
                                        <div class="btn btn-primary waves-effect waves-light" onclick="openImgmodal()"><i class="bx bx-image-add"></i> Add Image</div>    
                                        <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                        <input type="hidden" class="image_id" name="img_id" value="'.$row['image'].'"/>
                                        <div class="text-center mt-2">
                                        <img src="https://druggist.b-cdn.net/'.$image_path.'" alt="'.$row['img_alt'].'" style="width:80px;">
                                        </div>
                                        <span class="error imageError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-6">
                            
                            <div class="my-4">
                            <label for="productName" class="form-label">Image Alt</label>
                            <input type="text" class="form-control" id="productName" value="' . $row['img_alt'] . '" name="img_alt" placeholder="Product Name">
                            <span class="error nameError"></span>
                            </div>
                            </div>

                            <div class="col-lg-6">
                            <div class="my-4">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" value="' . $row['name'] . '" name="name" placeholder="Product Name">
                                <span class="error nameError"></span>
                            </div>
                        </div>
                        </div>

                            <div class="col-lg-6  mt-3">
                                <div class="mb-3">
                                    <label class="form-label" for="productDescriptionError">Product Description</label>
                                    <div>
                                        <textarea class="form-control" rows="3" id="description" name="description" placeholder="Product Description">' . $row['description'] . '</textarea>
                                        <span class="error descriptionError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div class="mb-3">
                                    <label class="form-label" for="productDescriptionError">Generic Name</label>
                                    <div>
                                        <textarea class="form-control" rows="3" id="point" name="point">'.$row['point'].'</textarea>
                                        <span class="error pointError"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  mt-3">
                                <div class="mb-3">
                                    <label class="form-label">Strength</label>
                                    <input class="form-control" name="strength" value="' . $row['strength'] . '">
                                    <span class="error strengthError"></span>
                                </div>
                            </div>
                            <div class="col-lg-6  mt-3">
                                <div class="mb-3">
                                    <label class="form-label">Pack Size</label>
                                    <input class="form-control" name="pack" value="' . $row['pack'] . '">
                                    <span class="error packError"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <label for="price" class="col-sm-12 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="' . $row['price'] . '" id="price" name="price" placeholder="INR 500" onkeypress="return (event.charCode !=8 && event.charCode ==0 || event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="error priceError"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="discountPrice" class="col-sm-12 col-form-label">Discount
                                    Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="' . $row['discountPrice'] . '" id="discountPrice" name="discountPrice" placeholder="INR 450" onkeypress="return (event.charCode !=8 && event.charCode ==0 || event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))">
                                    <span class="error discountPriceError"></span>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="globalLInk" class="col-sm-12 col-form-label">One Global
                                    Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="link" value="'.$row['websiteLink'].'" name="globalLInk" placeholder="Enter Link here">
                                    <span class="error globalLInkError"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="category" class="col-sm-12 col-form-label">Select
                                    Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productMainCategory" name="category">
                                        <option>Select Category</option>
                                        ';
                $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory=0 && status = 1 ');
                $getCategory->execute();
                while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                    if ($rowCat['id'] == $row['category']) {
                        $status = "selected";
                    } else {
                        $status = "";
                    }

                    $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                }
                $data .= '
                                    </select>
                                </div>
                                <span style="color: #000000; font-size: 9px; background: #efaa33; padding: 0 7px; font-weight: 700;">Don\'t change! Unnecessarily</span>
                                <span class="error categoryError"></span>
                            </div>
                            <div class="col-lg-4">
                                <label for="category" class="col-sm-12 col-form-label">Select
                                    Subcategory</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productSubCategory" name="subcategory">
                                    <option>Select Subcategory</option>';
                $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory=? && status = 1 ');
                $getCategory->execute([$row['category']]);
                while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                    if ($rowCat['id'] == $row['subcategory']) {
                        $status = "selected";
                    } else {
                        $status = "";
                    }

                    $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                }
                $data .= '</select>
                                </div>
                                <span style="color: #000000; font-size: 9px; background: #efaa33; padding: 0 7px; font-weight: 700;">Don\'t change! Unnecessarily</span>
                                <span class="error subcategoryError"></span>
                            </div>
                            <div>
                                <button type="submit" name="addProductBtn" id="addProductBtn" class="btn btn-primary w-md mt-4">Edit Product</button>
                            </div>
                            <div id="productAlert" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            Product has been edited!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        </div>
                    </div>
            </form>
                ';
            }
        }
        echo $data;
    }
}

if ($_POST['btn'] == 'editProduct') {
    foreach ($_POST as $fieldName => $fieldValue) {
        $error = '';
        if (empty($fieldValue) || $fieldValue == 'Select Category' || $fieldValue == 'Select category first' || $fieldValue == 'Select Subcategory') {
            $error = "aaa";
            die($fieldName);
        }
    }

    $strengthList = array();
    $strength = json_decode($_POST['strength'], true);
    $totalStrength = count($strength);
    for ($i = 0; $i < $totalStrength; $i++) {
        array_push($strengthList, $strength[$i]['value']);
    }
    $strength = implode(",", $strengthList);

    $packList = array();
    $pack = json_decode($_POST['pack'], true);
    $totalPack = count($pack);
    for ($i = 0; $i < $totalPack; $i++) {
        array_push($packList, $pack[$i]['value']);
    }
    $pack = implode(",", $packList);

    if(!empty($_POST['img_id'])) {
        $image = $_POST['img_id'];
        // $imageName = $_FILES['image']['name'];
        // $imageTmp = $_FILES['image']['tmp_name'];
        // $imageSize = $_FILES['image']['size'];
        // $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        // $extension  = array("jpg", "png", "JPG", "JPEG", "jpeg", "PNG", 'WEBP', 'webp');
        // $imagePath = "/assets/images/product/";

        $updateProduct = $conn->prepare("UPDATE product SET image=?, img_alt=?, name=?, description=?, point=?, strength=?, pack=?, price=?, discountPrice=?, websiteLink=?, category=?, subcategory=? WHERE id=?");
        $updateProduct->execute([$image, $_POST['img_alt'], $_POST['name'], $_POST['description'], $_POST['point'], $strength, $pack, $_POST['price'], $_POST['discountPrice'], $_POST['globalLInk'], $_POST['category'], $_POST['subcategory'], $_POST['productId']]);
        //move_uploaded_file($imageTmp, '..' . $imagePath . $imageName);
        echo 'done';
    } else {
        $updateProduct = $conn->prepare("UPDATE product SET name=?, description=?, point=?, strength=?, pack=?, price=?, discountPrice=?, websiteLink=?, category=?, subcategory=? WHERE id=?");
        $updateProduct->execute([$_POST['name'], $_POST['description'], $_POST['point'], $strength, $pack, $_POST['price'], $_POST['discountPrice'], $_POST['globalLInk'], $_POST['category'], $_POST['subcategory'], $_POST['productId']]);
        echo 'done';
    }
}


//ADD Cta Starts From Here
if ($_POST['btn'] == 'addCta') {
    
    if (!empty($_POST['img_id'])) {
        foreach ($_POST as $fieldName => $fieldValue) {
            $error = '';
            if (empty($fieldValue) || $fieldValue == 'Select Category' || $fieldValue == 'Select category first' || $fieldValue == 'Select Subcategory') {
                $error = "aaa";
                die($fieldName);
            }
        }
    } else {
        $error = "aaa";
        die('image');
    }

    if (empty($error)) {
        // $imageName = $_FILES['image']['name'];
        // $imageTmp = $_FILES['image']['tmp_name'];
        // $imageSize = $_FILES['image']['size'];
        // $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        // $extension  = array("jpg", "png", "JPG", "JPEG", "jpeg", "PNG", 'WEBP', 'webp','svg','SVG');
        // $imagePath = "/cta/";

        // get category
        $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=? AND status = 1');
        $getCategory->execute([$_POST['category']]);
        while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
           $category=$rowCat['slug'];  
        }
        // get subcategory
        $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=? AND status = 1');
        $getCategory->execute([$_POST['subcategory']]);
        while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
           $subcategory=$rowCat['slug'];  
        }
            $slug=$category."/".$subcategory;
            if (isset($_POST['category'])) {
                $insertCta = $conn->prepare('INSERT INTO deeplinks(image, title, details, category, subcategory, productLink, addby) VALUES(?,?,?,?,?,?,?)');
                $insertCta->execute([$_POST['img_id'], $_POST['name'], $_POST['details'], $_POST['category'], $_POST['subcategory'], $slug, $_SESSION['username']]);
            } else {
                $insertCta = $conn->prepare('INSERT INTO deeplinks(image, title, details, productLink ,addby) VALUES(?,?,?,?,?)');
                $insertCta->execute([$_POST['img_id'], $_POST['name'], $_POST['details'], $slug, $_SESSION['username']]);
            }
            // move_uploaded_file($imageTmp, '..' . $imagePath . $imageName);
            echo 'done';
        
    }
}


if ($_POST['btn'] == 'ctaOption') {
    if ($_POST['type'] == 'delete') {
        $totalProduct = count($_POST['category']);
        for ($i = 0; $i < $totalProduct; $i++) {
            $deleteCategory = $conn->prepare('DELETE FROM deeplinks WHERE id=?');
            $deleteCategory->execute([$_POST['category'][$i]]);
            if ($i == ($totalProduct - 1)) {
                echo 'done';
            }
        }
    } elseif ($_POST['type'] == 'edit') {
        $data = '';
        $totalProduct = count($_POST['category']);
        for ($i = 0; $i < $totalProduct; $i++) {
            $getProductData = $conn->prepare('SELECT * FROM deeplinks WHERE id=?');
            $getProductData->execute([$_POST['category'][$i]]);
            while ($row = $getProductData->fetch(PDO::FETCH_ASSOC)) {

                $category = $row['category'];
                $subcategory = $row['subcategory'];
                $link = $row['productLink'];
                if(empty($row['image'])){
                    $image_id = 1;
                }
                else{
                    $image_id = $row['image'];
                }
                $getcta_image = $conn->prepare("SELECT * FROM images WHERE id='$image_id'");
                $getcta_image->execute();
                while ($row1 = $getcta_image->fetch(PDO::FETCH_ASSOC)) {
                    $image_path=$row1['path'];
                }


                $data .= '
                
                    <input type="hidden" name="btn" value="editCta">
                    <input type="hidden" name="ctaId" value="' . $row['id'] . '">
                    <input type="hidden" name="uploadedImage" value="' . $row['image'] . '">
                    <div class="row">
                      
                        <div class="col-md-4 my-4">
                            <div class="col-lg-12 mb-3">
                            
                              
                                <img alt="" onclick="removeImg(this)" class="set_images d-block mx-auto my-4" style="width:140px">
                                <input type="hidden" class="image_id" name="img_id" value="'.$image_id.'"/>
                                    <span class="error img_idError"></span>
                            
                            </div>
                            <div class="text-center mt-2">
                            <img src="https://druggist.b-cdn.net/'.$image_path.'" style="width:80px;">
                        </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3 mt-4">
                                <label for="titleInput" class="form-label">TITLE</label>
                                <input  type="text" class="form-control" value="' . $row['title'] . '" id="name" name="name" placeholder="Title">
                                <span class="error nameError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mt-4 mx-3">
                                <label for="shortDetails" class="form-label">SHORT DETAILS</label>
                                <input  type="text" value="' . $row['details'] . '" class="form-control" id="details" name="details" placeholder="Enter details">
                                <span class="error detailsError"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    ';

                if (!empty($category) || empty($category)) {

                    $data .= '<div class="col-lg-3">
                            <div class="mb-3 mt-4">
                                <label for="selectCategory" class="form-label">SELECT CATEGORY</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productMainCategory" name="category">
                                        <option>Select Category</option>';
                    $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory=0 && status = 1 ');
                    $getCategory->execute();
                    while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                        if ($rowCat['id'] == $category) {
                            $status = "selected";
                        } else {
                            $status = "";
                        }
                        $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                    }

                    $data .= '</select>
                                </div>
                                <span class="error categoryError"></span>
                            </div>

                        </div>

                        <div class="col-lg-6" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 53px;">
                            <div class="mb-3 mt-4" style=" width: 61%; ">
                                <label for="selectCategory" class="form-label">SELECT SUBCATEGORY</label>
                                <select class="form-select" id="productSubCategory" name="subcategory">
                                    <option>Select category first</option>';
                                        $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory=? && status = 1 ');
                                        $getCategory->execute([$row['category']]);
                                        while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                                            if ($rowCat['id'] == $subcategory) {
                                                $status = "selected";
                                            } else {
                                                $status = "";
                                            }

                                            $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                                        }
                    $data .= '
                                </select>
                                <span class="error subcategoryError"></span>
                            </div>
                            
                            <b>OR</b>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3 mt-4">
                                <label for="productPageUrl" class="form-label">ADD PRODUCT PAGE URL</label>
                                <input  type="text" class="form-control" name="productPageUrl"
                                    id="productPageUrl" value="' . $link . '" placeholder="example: www.druggist.com">
                                <span class="error productPageUrlError"></span>
                            </div>
                        </div>
                    </div> ';
                }

                $data .= '
                    <div>
                        <input type="submit" class="btn btn-add w-md btn-warning" value="update">
                        
                    </div>
                ';
            }
        }
        echo $data;
    }
}

if ($_POST['btn'] == 'userOption') {
    if ($_POST['type'] == 'delete') {
        $totalProduct = count($_POST['user']);
        for ($i = 0; $i < $totalProduct; $i++) {
            $deleteCategory = $conn->prepare('UPDATE deeplinks SET status=? WHERE id=?');
            $deleteCategory->execute([0, $_POST['category'][$i]]);
            if ($i == ($totalProduct - 1)) {
                echo 'done';
            }
        }
    } elseif ($_POST['type'] == 'edit') {
        $data = '';
        $totalProduct = count($_POST['user']);
        for ($i = 0; $i < $totalProduct; $i++) {
            $getProductData = $conn->prepare('SELECT * FROM user WHERE id=?');
            $getProductData->execute([$_POST['user'][$i]]);
            while ($row = $getProductData->fetch(PDO::FETCH_ASSOC)) {

                $data .= '
                <form id="editCta" enctype="multipart/form-data">
                    <input type="hidden" name="btn" value="editUser">
                    <input type="hidden" name="userId" value="' . $row['id'] . '">
                    <div class="row">
                        <div id="productAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            User has been Updated!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3 mt-4">
                                <label for="titleInput" class="form-label">User Name</label>
                                <input  type="text" class="form-control" value="' . $row['username'] . '" id="username" name="username" placeholder="User Name">
                                <span class="error usernameError"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 mt-4 mx-3">
                                <label for="shortDetails" class="form-label">SHORT DETAILS</label>
                                <input  type="text" value="' . $row['details'] . '" class="form-control" id="details" name="details" placeholder="Enter details">
                                <span class="error detailsError"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    ';

                if (!empty($category) || empty($category)) {

                    $data .= '<div class="col-lg-3">
                            <div class="mb-3 mt-4">
                                <label for="selectCategory" class="form-label">SELECT CATEGORY</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="productMainCategory" name="category">
                                        <option>Select Category</option>';
                    $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory=0 && status = 1 ');
                    $getCategory->execute();
                    while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                        if ($rowCat['id'] == $category) {
                            $status = "selected";
                        } else {
                            $status = "";
                        }
                        $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                    }

                    $data .= '</select>
                                </div>
                                <span class="error categoryError"></span>
                            </div>

                        </div>

                        <div class="col-lg-6" style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 53px;">
                            <div class="mb-3 mt-4" style=" width: 61%; ">
                                <label for="selectCategory" class="form-label">SELECT SUBCATEGORY</label>
                                <select class="form-select" id="productSubCategory" name="subcategory">
                                    <option>Select category first</option>';
                    $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE parentCategory=? && status = 1 ');
                    $getCategory->execute([$row['category']]);
                    while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
                        if ($rowCat['id'] == $subcategory) {
                            $status = "selected";
                        } else {
                            $status = "";
                        }

                        $data .= '<option value="' . $rowCat['id'] . '" ' . $status . '>' . $rowCat['name'] . '</option>';
                    }
                    $data .= '
                                </select>
                                <span class="error subcategoryError"></span>
                            </div>
                            
                            <b>OR</b>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3 mt-4">
                                <label for="productPageUrl" class="form-label">ADD PRODUCT PAGE URL</label>
                                <input  type="text" class="form-control" name="productPageUrl"
                                    id="productPageUrl" value="' . $link . '" placeholder="example: www.druggist.com">
                                <span class="error productPageUrlError"></span>
                            </div>
                        </div>
                    </div> ';
                }

                $data .= '
                    <div>
                        <button type="submit" class="btn btn-add w-md btn-warning">
                            <span class="button__text">Update</span>
                        </button>
                    </div>
                
                </form>
                ';
            }
        }
        echo $data;
    }
}

if ($_POST['btn'] == 'editCta') {
    foreach ($_POST as $fieldName => $fieldValue) {
        $error = '';
        if (empty($fieldValue) || $fieldValue == 'Select Category' || $fieldValue == 'Select category first' || $fieldValue == 'Select Subcategory') {
            $error = "aaa";
            die($fieldName);
        }
    }

    if (!empty($_POST['img_id'])) {

        // $imageName = $_FILES['image']['name'];
        // $imageTmp = $_FILES['image']['tmp_name'];
        // $imageSize = $_FILES['image']['size'];
        // $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        // $extension  = array("jpg", "png", "JPG", "JPEG", "jpeg", "PNG", 'WEBP', 'webp', 'svg', 'SVG');
        // $imagePath = "/cta/";

        if (isset($_POST['category'])) {
            // if(strlen($_POST['uploadedImage'])>1){
            //     if(deleteImage('/cta/', $_POST['uploadedImage'])=='done'){
            //         if(uploadImage($imagePath, $imageName, $imageTmp)!='done'){
            //             die('image');
            //         }
            //     }else {
            //         die('image');
            //     }
            // }else {
            //     if(uploadImage($imagePath, $imageName, $imageTmp)!='done'){
            //         die('image');
            //     }
            // }
            $slug=$_POST['category']."/".$_POST['subcategory'];
                    // get category
        $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=? AND status = 1');
        $getCategory->execute([$_POST['category']]);
        while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
           $category=$rowCat['slug'];  
        }
        // get subcategory
        $getCategory = $conn->prepare('SELECT * FROM productcategories WHERE id=? AND status = 1');
        $getCategory->execute([$_POST['subcategory']]);
        while ($rowCat = $getCategory->fetch(PDO::FETCH_ASSOC)) {
           $subcategory=$rowCat['slug'];  
        }
        $slug=$category."/".$subcategory;


            $updateCta = $conn->prepare('UPDATE deeplinks SET image=?, title=?, details=?, category=?, subcategory=?, productLink=? WHERE id = ?');
            $updateCta->execute([$_POST['img_id'], $_POST['name'], $_POST['details'], $_POST['category'], $_POST['subcategory'], $slug, $_POST['ctaId']]);
        } else {
            // if(strlen($_POST['uploadedImage'])>1){
            //     if(deleteImage('/cta/', $_POST['uploadedImage'])=='done'){
            //         if(uploadImage($imagePath, $imageName, $imageTmp)!='done'){
            //             die('image');
            //         }
            //     }else {
            //         die('image');
            //     }
            // }else {
            //     if(uploadImage($imagePath, $imageName, $imageTmp)!='done'){
            //         die('image');
            //     }
            // }
            $updateCta = $conn->prepare('UPDATE deeplinks SET image=?, title=?, details=?, category=?, subcategory=?, productLink=? WHERE id = ?');
            $updateCta->execute([$_POST['img_id'], $_POST['name'], $_POST['details'], NULL, NULL, $_POST['productPageUrl'], $_POST['ctaId']]);
        }
        echo 'done';
    } else {
        if (isset($_POST['category'])) {
            $updateCta = $conn->prepare('UPDATE deeplinks SET title=?, details=?, category=?, subcategory=?, productLink=? WHERE id = ?');
            $updateCta->execute([$_POST['name'], $_POST['details'], $_POST['category'], $_POST['subcategory'], $_POST['productPageUrl'], $_POST['ctaId']]);
        } else {
            $updateCta = $conn->prepare('UPDATE deeplinks SET title=?, details=?, category=?, subcategory=?, productLink=? WHERE id = ?');
            $updateCta->execute([$_POST['name'], $_POST['details'], NULL, NULL, $_POST['productPageUrl'], $_POST['ctaId']]);
        }
        echo 'done';
    }
}


//Board Member Starts From Here

//This Condition check which form has been submitted
if ($_POST['btn'] == 'addBoardMember') {
    
    foreach ($_POST as $fieldName => $fieldValue) {
        $error = '';
        if (empty($fieldValue) && ($fieldName == 'username' || $fieldName == 'full_name' || $fieldName == 'deg_position' || $fieldName == 'email')) {
            $error = "aaa";
            die($fieldName);
        }
    }
    if (empty($error)) {
        if (!empty($_POST['img_id'])) {

                    $insertMember = $conn->prepare("UPDATE boardmember SET username=?, full_name=?, deg_position=?, email=?, degree_tag=?, seo_title=?, website=?, facebook=?, twitter=?, instagram=?, linkedin=?, youtube=?, image=?, experience=?, education=?, about=?, highlights=? WHERE id=?");
                    $insertMember->execute([$_POST['username'], $_POST['full_name'], $_POST['degree'], $_POST['email'], $_POST['degree_tag'], $_POST['seo_title'], $_POST['url'], $_POST['facebook'], $_POST['twitter'], $_POST['instagram'], $_POST['linkedin'], $_POST['youtube'], $_POST['img_id'], $_POST['experience'], $_POST['education'], $_POST['about'], $_POST['highlights'], $_POST['id']]);
                    echo 'done';
        }
    }
    
}

if ($_POST['btn'] == 'editBoardMember') {
    //This condition check if POST array have any empty field than send field name
    foreach ($_POST as $fieldName => $fieldValue) {
        $error = '';
        if (empty($fieldValue) && ($fieldName == 'username' || $fieldName == 'full_name' || $fieldName == 'deg_position' || $fieldName == 'email')) {
            $error = "aaa";
            die($fieldName);
        }
    }
    if (empty($error)) {
        if (!empty($_POST['img_id'])) {

                    $insertMember = $conn->prepare("UPDATE boardmember SET username=?, full_name=?, deg_position=?, email=?, degree_tag=?, seo_title=?, website=?, facebook=?, twitter=?, instagram=?, linkedin=?, youtube=?, image=?, experience=?, education=?, about=?, highlights=? WHERE id=?");
                    $insertMember->execute([$_POST['username'], $_POST['full_name'], $_POST['degree'], $_POST['email'], $_POST['degree_tag'], $_POST['seo_title'], $_POST['url'], $_POST['facebook'], $_POST['twitter'], $_POST['instagram'], $_POST['linkedin'], $_POST['youtube'], $_POST['img_id'], $_POST['experience'], $_POST['education'], $_POST['about'], $_POST['highlights'], $_POST['id']]);
                    echo 'done';
        }
    }
}

if ($_POST['btn'] == 'boardmemberOption') {
    if ($_POST['type'] == 'delete') {
        $totalProduct = count($_POST['member']);
        for ($i = 0; $i < $totalProduct; $i++) {
            $deleteCategory = $conn->prepare('DELETE FROM boardmember WHERE id=?');
            $deleteCategory->execute([$_POST['member'][$i]]);
            if ($i == ($totalProduct - 1)) {
                echo 'done';
            }
        }
    }
}



//Add Post Starts From Here
if ($_POST['btn'] == 'listCatToAddPost') {
    if ($_POST['catId'] == 'Select Category') {
        $getCta = $conn->prepare('SELECT * FROM deeplinks WHERE status = 1');
        $getCta->execute();
    } else {
        $catid = $_POST['catId'];
        $getCta = $conn->prepare('SELECT * FROM deeplinks WHERE category=? && status = 1');
        $getCta->execute([$catid]);
    }
    $data = "";

    $totalRecord = $getCta->rowCount();
    if ($totalRecord > 0) {
        while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
            $data .= '
            <div data-id="cta" class="col-lg-6 div" data-content="' . $row['title'] . '">
            <input name="cta[]" data-id="cta" value="' . $row['id'] . '" id="' . $row['id'] . '" type="checkbox">
            <label for="' . $row['id'] . '">
                <div class="cta-div mb-3">
                    <img src="http://192.168.0.113/druggist-admin' . $row['image'] . '"
                        alt="">


                    <div class="cta-content">
                        <h4>' . $row['title'] . '</h4>
                        <p>' . $row['details'] . '</p>
                    </div>
                </div>
            </label>
        </div>
            ';
        }
    } else {
        $data = "No Deep Links Found";
    }
    echo $data;
}

if ($_POST['btn'] == 'addPost') {
    if ($_POST['postStatus'] == "Publish") {
        if (!empty($_POST['img_id'])) {
            //This condition check if POST array have any empty field than send field name
            foreach ($_POST as $fieldName => $fieldValue) {
                $error = '';
                if (empty($fieldValue) && !empty($_POST['postSchedule'])) {
                    $error = "aaa";
                    die($fieldName);
                }
            }
        } else {
            $error = "aaa";
            die('image');
        }

        if (empty($error)) {
            // $imageName = $_FILES['image']['name'];
            // $imageTmp = $_FILES['image']['tmp_name'];
            // $imageSize = $_FILES['image']['size'];
            // $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
            // $extension  = array("jpg", "png", "JPG", "JPEG", "jpeg", "PNG", 'WEBP', 'webp');
            // $imagePath = "/assets/images/post/";

           // if (in_array($imageExt, $extension)) {

                if (empty($_POST['postSchedule'])) {
                    $status = "publish";
                } else {
                    $status = "draft";
                }
                if (empty($_POST['mainCategory'])) {
                    $mainCat = 20;
                } else {
                    $mainCat = $_POST['mainCategory'];
                }
                if (empty($_POST['subCategory'])) {
                    $subCat = 21;
                } else {
                    $subCat = $_POST['subCategory'];
                }
                if (empty($_POST['img_id'])) {
                    $img_id = 1;
                } else {
                    $img_id = $_POST['img_id'];
                }
                if (empty($_POST['image-alt'])) {
                    $imageAlt = 1;
                } else {
                    $imageAlt = $_POST['image-alt'];
                }
                if (empty($_POST['image-title'])) {
                    $imageTitle = 1;
                } else {
                    $imageTitle = $_POST['image-title'];
                }
                $lastDate = date("Y-m-d H:i:s", strtotime($_POST['lastPostDate']));
                if (!empty($_POST['tags'])) {
                    $tagsList = array();
                    $tags = json_decode($_POST['tags'], true);
                    $totalTags = count($tags);
                    for ($i = 0; $i < $totalTags; $i++) {
                        array_push($tagsList, $tags[$i]['value']);
                    }
                    $tags = implode(",", $tagsList);
                } else {
                    $tagsList = "";
                    $tags = "";
                }

                $insertPost = $conn->prepare('INSERT INTO post(title, summary, content, tableOfContent, cta, mainCategories, subCategories, products, tags, image, imageAlt, imageTitle, reviewed, written, disease, status, publishDate, metaTitle, slug, metaDescription, SeoSchema, postDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                $insertPost->execute([$_POST['title'], $_POST['summary'], $_POST['postContent'], $_POST['tableOfContent'], $_POST['cta'], $mainCat, $subCat, $_POST['product'], $tags, $img_id, $imageAlt, $imageTitle, $_POST['review'], $_POST['written'], $_POST['disease'], $_POST['postStatus'], $_POST['postSchedule'], $_POST['meta-title'], $_POST['meta-slug'], $_POST['meta-description'], $_POST['schema'], $lastDate]);
                //move_uploaded_file($imageTmp, '..' . $imagePath . $imageName);
                $last_id = $conn->lastInsertId();
                // if(!empty($last_id)){

                //             echo $totalfaq = count($_POST['faq_question']);
                            
                //             echo "<pre>";
                //             print_r($_POST['faq_question']);
                //             echo "</pre>";

                //             for($i=0;$i<=$totalfaq;$i++){
                //                     $faq_question = $_POST['faq_question'][$i];
                //                     $faq_answer =  $_POST['faq_answer'][$i];
                //                     echo $sql = "INSERT INTO faq_of_post(post_id, question, answer) VALUES($last_id, '$faq_question', '$faq_answer')";
                //                     $stmt = $conn->prepare("INSERT INTO faq_of_post(post_id, question, answer) VALUES(?,?,?)");
                //                     if($stmt->execute([$last_id, $faq_question, $faq_answer])){
                //                     //echo "faq inserted";              
                //                     }
                //                 }
                // }

                echo 'done' . $last_id;
            // } else {
            //     die('image');
            // }
        }
    } else {
        if (!empty($_POST['img_id'])) {
            // $imageName = $_FILES['image']['name'];
            // $imageTmp = $_FILES['image']['tmp_name'];
            // $imageSize = $_FILES['image']['size'];
            // $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
            // $extension  = array("jpg", "png", "JPG", "JPEG", "jpeg", "PNG", 'WEBP', 'webp');
            // $imagePath = "/assets/images/post/";

            //if (in_array($imageExt, $extension)) {

                if (empty($_POST['postSchedule'])) {
                    $status = "publish";
                } else {
                    $status = "draft";
                }
                if (empty($_POST['mainCategory'])) {
                    $mainCat = 20;
                } else {
                    $mainCat = $_POST['mainCategory'];
                }
                if (empty($_POST['subCategory'])) {
                    $subCat = 21;
                } else {
                    $subCat = $_POST['subCategory'];
                }
                if (empty($_POST['img_id'])) {
                    $img_id = 1;
                } else {
                    $img_id = $_POST['img_id'];
                }
                if (empty($_POST['image-alt'])) {
                    $imageAlt = 1;
                } else {
                    $imageAlt = $_POST['image-alt'];
                }
                if (empty($_POST['image-title'])) {
                    $imageTitle = 1;
                } else {
                    $imageTitle = $_POST['image-title'];
                }

                $lastDate = date("Y-m-d H:i:s", strtotime($_POST['lastPostDate']));

                if (!empty($_POST['tags'])) {
                    $tagsList = array();
                    $tags = json_decode($_POST['tags'], true);
                    $totalTags = count($tags);
                    for ($i = 0; $i < $totalTags; $i++) {
                        array_push($tagsList, $tags[$i]['value']);
                    }
                    $tags = implode(",", $tagsList);
                    } else {
                        $tagsList = "";
                        $tags = "";
                    }

                $insertPost = $conn->prepare('INSERT INTO post(title, summary, content, tableOfContent, cta, mainCategories, subCategories, products, tags, image, imageAlt, imageTitle, reviewed, written, disease, status, publishDate, metaTitle, slug, metaDescription, SeoSchema, postDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                $insertPost->execute([$_POST['title'], $_POST['summary'], $_POST['postContent'], $_POST['tableOfContent'], $_POST['cta'], $mainCat, $subCat, $_POST['product'], $tags, $img_id, $imageAlt, $imageTitle, $_POST['review'], $_POST['written'], $_POST['disease'], $_POST['postStatus'], $_POST['postSchedule'], $_POST['meta-title'], $_POST['meta-slug'], $_POST['meta-description'], $_POST['schema'], $lastDate]);
                //move_uploaded_file($imageTmp, '..' . $imagePath . $imageName);
                $last_id = $conn->lastInsertId();
                // if(!empty($last_id)){
                //     echo $last_id;   
                //             $totalfaq = count($_POST['faq_question']);
                //             for($i=0;$i<$totalfaq;$i++){
                //                     $faq_question = $_POST['faq_question'][$i];
                //                     $faq_answer =  $_POST['image_alt'][$i];
                //                     $stmt = $conn->prepare("INSERT INTO faq_of_post(post_id, question, answer) VALUES($last_id, $faq_question, $faq_answer)");
                //                     if($stmt->execute()){
                //                     echo "faq inserted";              
                //                     }
                //                 }
                // }

                echo 'done' . $last_id;
            // } else {
            //     die('image');
            // }

        } else {
            if (empty($_POST['mainCategory'])) {
                $mainCat = 20;
            } else {
                $mainCat = $_POST['mainCategory'];
            }

            if (empty($_POST['subCategory'])) {
                $subCat = 21;
            } else {
                $subCat = $_POST['subCategory'];
            }
            

            $lastDate = date("Y-m-d H:i:s", strtotime($_POST['lastPostDate']));
            if (!empty($_POST['tags'])) {
                $tagsList = array();
                $tags = json_decode($_POST['tags'], true);
                $totalTags = count($tags);
                for ($i = 0; $i < $totalTags; $i++) {
                    array_push($tagsList, $tags[$i]['value']);
                }
                $tags = implode(",", $tagsList);
            } else {
                $tagsList = "";
                $tags = "";
            }
            $insertPost = $conn->prepare('INSERT INTO post(title, summary, content, tableOfContent, cta, mainCategories, subCategories, products, tags,  reviewed, written, disease, status, publishDate, metaTitle, slug, metaDescription, SeoSchema, postDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $insertPost->execute([$_POST['title'], $_POST['summary'], $_POST['postContent'], $_POST['tableOfContent'], $_POST['cta'], $mainCat, $subCat, $_POST['product'], $tags, $_POST['review'], $_POST['written'], $_POST['disease'], $_POST['postStatus'], $_POST['postSchedule'], $_POST['meta-title'], $_POST['meta-slug'], $_POST['meta-description'], $_POST['schema'], $lastDate]);
            $last_id = $conn->lastInsertId();
            // if(!empty($last_id)){
            //     echo $last_id;   
            //             $totalfaq = count($_POST['faq_question']);
            //             for($i=0;$i<$totalfaq;$i++){
            //                     $faq_question = $_POST['faq_question'][$i];
            //                     $faq_answer =  $_POST['image_alt'][$i];
            //                     $stmt = $conn->prepare("INSERT INTO faq_of_post(post_id, question, answer) VALUES($last_id, $faq_question, $faq_answer)");
            //                     if($stmt->execute()){
            //                     echo "faq inserted";              
            //                     }
            //                 }
            // }
            echo 'done' . $last_id;
        }
    }
}


if ($_POST['btn'] == 'editPost') {
    if($_POST['postStatus'] == "Publish") {
        //This condition check if POST array have any empty field than send field name
        foreach ($_POST as $fieldName => $fieldValue) {
            $error = '';
            if (empty($fieldValue) && !empty($_POST['postSchedule'])) {
                $error = "aaa";
                die($fieldName);
            }
        }

        if (empty($error)) {
            
            if (!empty($_POST['img_id'])) {
                    if (empty($_POST['postSchedule'])) {
                        $status = "publish";
                    } else {
                        $status = "draft";
                    }
                    if (empty($_POST['mainCategory'])) {
                        $mainCat = 20;
                    } else {
                        $mainCat = $_POST['mainCategory'];
                    }
                    if (empty($_POST['subCategory'])) {
                        $subCat = 21;
                    } else {
                        $subCat = $_POST['subCategory'];
                    }

                    if (empty($_POST['img_id'])) {
                        $img_id = 1;
                    } else {
                        $img_id = $_POST['img_id'];
                    }
                    if (empty($_POST['image-alt'])) {
                        $imageAlt = 1;
                    } else {
                        $imageAlt = $_POST['image-alt'];
                    }
                    if (empty($_POST['image-title'])) {
                        $imageTitle = 1;
                    } else {
                        $imageTitle = $_POST['image-title'];
                    }
                    $lastDate = date("Y-m-d H:i:s", strtotime($_POST['lastPostDate']));
                    if(!empty($_POST['tags'])) {
                        $tagsList = array();
                        $tags = json_decode($_POST['tags'], true);
                        $totalTags = count($tags);
                        for ($i = 0; $i < $totalTags; $i++) {
                            array_push($tagsList, $tags[$i]['value']);
                        }
                        $tags = implode(",", $tagsList);
                    } else {
                        $tagsList = "";
                        $tags = "";
                    }
                    
                    
                    $updatePost = $conn->prepare("UPDATE post SET title=?, summary=?, content=?, tableOfContent=?, cta=?, mainCategories=?, subCategories=?, products=?, tags=?, image=?, imageAlt=?, imageTitle=?, reviewed=?, written=?, disease=?, status=?, publishDate=?, metaTitle=?, slug=?, metaDescription=?, SeoSchema=?, postDate=? WHERE id=?");
                    $updatePost->execute([$_POST['title'], $_POST['summary'], $_POST['postContent'], $_POST['tableOfContent'], $_POST['cta'], $mainCat, $subCat, $_POST['setCTA_selectedpro'], $tags, $img_id, $imageAlt, $imageTitle, $_POST['review'],$_POST['written'], $_POST['disease'], $_POST['postStatus'], $_POST['postSchedule'], $_POST['meta-title'], $_POST['meta-slug'], $_POST['meta-description'], $_POST['schema'], $lastDate, $_POST['postid']]);
                    echo 'done' . $_POST['postid'];
                // } else {
                //     die('image');
                // }
            } else {
                if (empty($_POST['postSchedule'])) {
                    $status = "publish";
                } else {
                    $status = "draft";
                }
                if (empty($_POST['mainCategory'])) {
                    $mainCat = 20;
                } else {
                    $mainCat = $_POST['mainCategory'];
                }

                if (empty($_POST['subCategory'])) {
                    $subCat = 21;
                } else {
                    $subCat = $_POST['subCategory'];
                }
                $lastDate = date("Y-m-d H:i:s", strtotime($_POST['lastPostDate']));
                if (!empty($_POST['tags'])) {
                    $tagsList = array();
                    $tags = json_decode($_POST['tags'], true);
                    $totalTags = count($tags);
                    for ($i = 0; $i < $totalTags; $i++) {
                        array_push($tagsList, $tags[$i]['value']);
                    }
                    $tags = implode(",", $tagsList);
                } else {
                    $tagsList = "";
                    $tags = "";
                }

                $updatePost = $conn->prepare("UPDATE post SET title=?, summary=?, content=?, tableOfContent=?, cta=?, mainCategories=?, subCategories=?, products=?, tags=?, reviewed=?, written=?, disease=?, status=?, publishDate=?, metaTitle=?, slug=?, metaDescription=?, SeoSchema=?, postDate=? WHERE id=?");

                $updatePost->execute([$_POST['title'], $_POST['summary'], $_POST['postContent'], $_POST['tableOfContent'], $_POST['cta'], $mainCat, $subCat, $_POST['setCTA_selectedpro'], $tags, $_POST['review'], $_POST['written'], $_POST['disease'], $_POST['postStatus'], $_POST['postSchedule'], $_POST['meta-title'], $_POST['meta-slug'], $_POST['meta-description'], $_POST['schema'], $lastDate, $_POST['postid']]);
                    echo 'done' . $_POST['postid'];
            }
        }
    } else {
        if (!empty($_POST['img_id'])) {
                if (empty($_POST['postSchedule'])) {
                    $status = "publish";
                } else {
                    $status = "draft";
                }
                if (!empty($_POST['tags'])) {
                    $tagsList = array();
                    $tags = json_decode($_POST['tags'], true);
                    $totalTags = count($tags);
                    for ($i = 0; $i < $totalTags; $i++) {
                        array_push($tagsList, $tags[$i]['value']);
                    }
                    $tags = implode(",", $tagsList);
                } else {
                    $tagsList = "";
                    $tags = "";
                }
                if (empty($_POST['mainCategory'])) {
                    $mainCat = 20;
                } else {
                    $mainCat = $_POST['mainCategory'];
                }
                if (empty($_POST['subCategory'])) {
                    $subCat = 21;
                } else {
                    $subCat = $_POST['subCategory'];
                }
                if (empty($_POST['img_id'])) {
                    $img_id = 1;
                } else {
                    $img_id = $_POST['img_id'];
                }
                if (empty($_POST['image-alt'])) {   
                    $imageAlt = 1;
                } else {
                    $imageAlt = $_POST['image-alt'];
                }
                if (empty($_POST['image-title'])) {
                    $imageTitle = 1;
                } else {
                    $imageTitle = $_POST['image-title'];
                }
                $lastDate = date("Y-m-d H:i:s", strtotime($_POST['lastPostDate']));
                $updatePost = $conn->prepare("UPDATE post SET title=?, summary=?, content=?, tableOfContent=?, cta=?, mainCategories=?, subCategories=?, products=?, tags=?, image=?, imageAlt=?, imageTitle=?, reviewed=?, written=?, disease=?, status=?, publishDate=?, metaTitle=?, slug=?, metaDescription=?, SeoSchema=?, postDate=? WHERE id=?");
                    $updatePost->execute([$_POST['title'], $_POST['summary'], $_POST['postContent'], $_POST['tableOfContent'], $_POST['cta'], $mainCat, $subCat, $_POST['setCTA_selectedpro'], $tags, $img_id, $imageAlt, $imageTitle, $_POST['review'], $_POST['written'], $_POST['disease'], $_POST['postStatus'], $_POST['postSchedule'], $_POST['meta-title'], $_POST['meta-slug'], $_POST['meta-description'], $_POST['schema'], $lastDate, $_POST['postid']]);
                    echo 'done' . $_POST['postid'];
            } else {
            if (empty($_POST['postSchedule'])) {
                $status = "publish";
            } else {
                $status = "draft";
            }

            if (!empty($_POST['tags'])) {
                $tagsList = array();
                $tags = json_decode($_POST['tags'], true);
                $totalTags = count($tags);
                for ($i = 0; $i < $totalTags; $i++) {
                    array_push($tagsList, $tags[$i]['value']);
                }
                $tags = implode(",", $tagsList);
            } else {
                $tagsList = "";
                $tags = "";
            }
            if (empty($_POST['mainCategory'])) {
                $mainCat = 20;
            } else {
                $mainCat = $_POST['mainCategory'];
            }

            if (empty($_POST['subCategory'])) {
                $subCat = 21;
            } else {
                $subCat = $_POST['subCategory'];
            }

            $lastDate = date("Y-m-d H:i:s", strtotime($_POST['lastPostDate']));
            $updatePost = $conn->prepare("UPDATE post SET title=?, summary=?, content=?, tableOfContent=?, cta=?, mainCategories=?, subCategories=?, products=?, tags=?, reviewed=?, written=?, disease=?, status=?, publishDate=?, metaTitle=?, slug=?, metaDescription=?, SeoSchema=?, postDate=? WHERE id=?");
                $updatePost->execute([$_POST['title'], $_POST['summary'], $_POST['postContent'], $_POST['tableOfContent'], $_POST['cta'], $mainCat, $subCat, $_POST['setCTA_selectedpro'], $tags, $_POST['review'], $_POST['written'], $_POST['disease'], $_POST['postStatus'], $_POST['postSchedule'], $_POST['meta-title'], $_POST['meta-slug'], $_POST['meta-description'], $_POST['schema'], $lastDate, $_POST['postid']]);
                echo 'done' . $_POST['postid'];
        }
    }
}



if ($_POST['btn'] == 'addUser') {
    //This condition check whether user select image or not
    //This condition check if POST array have any empty field than send field name
    foreach ($_POST as $fieldName => $fieldValue) {
        $error = '';
        if (empty($fieldValue) && ($fieldName == 'username' || $fieldName == 'firstname' || $fieldName == 'lastname' || $fieldName == 'email' || $fieldName == 'password')) {
            $error = "aaa";
            die($fieldName);
        }
    }

    $options = ['cost' => 12];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
    $insertMember = $conn->prepare("INSERT INTO user(username, firstname, lastname, email, password, addby, access, role) VALUE(?,?,?,?,?,?,?,?)");
    $insertMember->execute([$_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $password, $_SESSION['username'], 'None', $_POST['role']]);
    echo 'done';
}

if ($_POST['btn'] == 'editUser') {
    //This condition check if POST array have any empty field than send field name
    foreach ($_POST as $fieldName => $fieldValue) {
        $error = '';
        if (empty($fieldValue) && ($fieldName != 'password')) {
            $error = "aaa";
            die($fieldName);
        }
    }

    if (empty($error)) {
        if (!empty($_POST['password'])) {
            $options = ['cost' => 12];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
            $updateUser = $conn->prepare('UPDATE user SET username=?, firstname=?, lastname=?, email=?, password=?, role=? WHERE id=?');
            $updateUser->execute([$_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['role'], $_POST['userid']]);
            echo 'done';
        } else {
            $updateUser = $conn->prepare('UPDATE user SET username=?, firstname=?, lastname=?, email=?, role=?, WHERE id=?');
            $updateUser->execute([$_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['role'], $_POST['userid']]);
            echo 'done';
        }
    }
}

if ($_POST['btn'] == 'deleteUser') {
    $update = $conn->prepare('DELETE FROM user WHERE id=?');
    $update->execute([$_POST['id']]);
    echo 'done';
}



if ($_POST['btn'] == "loginUser") {
    foreach ($_POST as $fieldName => $fieldValue) {
        $error = '';
        if (empty($fieldValue)) {
            $error = "aaa";
            die($fieldName);
        }
    }

    $checkUser = $conn->prepare("SELECT * FROM user WHERE email=? limit 1");
    $checkUser->execute([$_POST['email']]);
    $totalUser = $checkUser->rowCount();
    if ($totalUser > 0) {
        while ($row = $checkUser->fetch(PDO::FETCH_ASSOC)) {
            $email = $row['email'];
            $password = $row['password'];
            
            if($_POST['password']==$password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['fname'] = $row['firstname'];
                $_SESSION['loginStatus'] = true;
                echo "done";            
            }
            else {
                echo "password";
            }


            // if (password_verify($_POST['password'], $password)) {
            //     $_SESSION['username'] = $row['username'];
            //     $_SESSION['fname'] = $row['firstname'];
            //     $_SESSION['loginStatus'] = true;
            //     echo "done";            
            // }
            // else {
            //     echo "password";
            // }

            
        }
    } else {
        echo "NotFound";
    }
}

function cleanData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkNumber($data)
{
    $pattern = '/^[1-9][0-9]{0,15}$/';
    return preg_match($pattern, $data);
}


// if ($_POST['btn'] == 'homeCat') {
//     if (!isset($_POST['cta'])) {
//         $cta = '';
//     } else {
//         $cta = $_POST['cta'];
//     }
//     if (empty($_FILES['image']['name'])) {
//         $updateHomeCat = $conn->prepare('UPDATE homestaticcat SET title=?, category=?, url=?, cta=?, updateby=? WHERE section=?');
//         $updateHomeCat->execute([$_POST['title'], $_POST['category'], $_POST['url'], $cta, $_SESSION['username'], $_POST['section']]);
//         echo 'done';
//     } else {
//         $imageName = $_FILES['image']['name'];
//         $imageTmp = $_FILES['image']['tmp_name'];
//         $imageSize = $_FILES['image']['size'];
//         $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
//         $extension  = array("jpg", "png", "JPG", "JPEG", "jpeg", "PNG", 'WEBP', 'webp');
//         $imagePath = "/assets/images/post/";

//         if (in_array($imageExt, $extension)) {
//             $updateHomeCat = $conn->prepare('UPDATE homestaticcat SET image=?, title=?, category=?, url=?, cta=?, updateby=? WHERE section=?');
//             $updateHomeCat->execute([$imagePath . $imageName, $_POST['title'], $_POST['category'], $_POST['url'], $cta, $_SESSION['username'], $_POST['section']]);
//             move_uploaded_file($imageTmp, '..' . $imagePath . $imageName);
//             echo 'done';
//         }
//     }
// }
if ($_POST['btn'] == 'homeCat') {
    if (!isset($_POST['cta'])) {
        $cta = '';
    } else {
        $cta = $_POST['cta'];
    }
    if (empty($_POST['img_id'])) {
        $updateHomeCat = $conn->prepare('UPDATE homestaticcat SET title=?, category=?, url=?, cta=?, updateby=? WHERE section=?');
        $updateHomeCat->execute([$_POST['title'], $_POST['category'], $_POST['url'], $cta, $_SESSION['username'], $_POST['section']]);
        echo 'done';
    } else {
            $updateHomeCat = $conn->prepare('UPDATE homestaticcat SET image=?, title=?, category=?, url=?, cta=?, updateby=? WHERE section=?');
            $updateHomeCat->execute([$_POST['img_id'], $_POST['title'], $_POST['category'], $_POST['url'], $cta, $_SESSION['username'], $_POST['section']]);
            echo 'done';
    }
}

if ($_POST['btn'] == 'homeCta') {

    $cta = $_POST['homeCta'];
    $updateCta = $conn->prepare('UPDATE deeplinks SET featured=0');
    $updateCta->execute();
    foreach ($cta as $x) {
        $updateCta = $conn->prepare('UPDATE deeplinks SET featured=1 WHERE id=?');
        $updateCta->execute([$x]);
    }
    echo 'done';
}

if ($_POST['btn'] == 'homeMember') {

    $member = $_POST['homeMember'];
    $updatemember = $conn->prepare('UPDATE boardmember SET featured=0');
    $updatemember->execute();
    foreach ($member as $x) {
        $updatemember = $conn->prepare('UPDATE boardmember SET featured=1 WHERE id=?');
        $updatemember->execute([$x]);
    }
    echo 'done';
}

if ($_POST['btn'] == 'addHomeTag') {
    $insertTag = $conn->prepare('INSERT INTO hometag (tag, url,updateBy) VALUES(?,?,?)');
    $insertTag->execute([$_POST['tag'], $_POST['url'], $_SESSION['username']]);
    echo 'done';
}

if ($_POST['btn'] == 'deleteTag') {
    $update = $conn->prepare('UPDATE hometag SET status=? WHERE id=?');
    $update->execute([0, $_POST['id']]);
    echo 'done';
}

if ($_POST['btn'] == 'lifeStylebtn') {
    $cat_id = $_POST['cat_id'];
    $condition_post = $_POST['post_id'];
    $str_condition = implode(',', $condition_post);
    $sql="UPDATE categories SET condition_check='$str_condition' WHERE id='$cat_id'";
    $updateCta_cat = $conn->prepare($sql);
    $updateCta_cat->execute();
    echo 'done';
}
if($_POST['btn'] == 'lifeStylebtn_cta') {
    $cta_id = $_POST['cta_id'];
    $str_cta_id = implode(',', $cta_id);
    $id = $_POST['id'];
    $sql="UPDATE categories SET cta='$str_cta_id' WHERE id='$id'";
    $updateCta_cat = $conn->prepare($sql);
    $updateCta_cat->execute();
    echo 'done';
}
if($_POST['btn'] == 'addCarousel') {
    if(!empty($_POST['img_id'])){
        $insertTag = $conn->prepare('INSERT INTO product_carousel (url, image) VALUES(?,?)');
        $insertTag->execute([$_POST['url'], $_POST['img_id']]);
        echo 'done';
        }

    // $imageName = $_FILES['proimage']['name'];
    // $imageTmp = $_FILES['proimage']['tmp_name'];
    // $imageSize = $_FILES['proimage']['size'];
    // $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
    // $extension  = array("jpg", "png", "JPG", "JPEG", "jpeg", "PNG", 'WEBP', 'webp');
    // $imagePath = "/assets/images/product/slider/";
    // move_uploaded_file($imageTmp, '..' . $imagePath . $imageName);
    // echo $url = $_POST['url']; 
    // echo $image_url = $imagePath . $imageName;

    // $insertTag = $conn->prepare('INSERT INTO product_carousel (url, image) VALUES(?,?)');
    // $insertTag->execute([$image_url, $url]);
    // echo 'done';    
}


if($_POST['btn'] == 'sethmAbout') {

    $member = $_POST['homeMember_about'];
    $updatemember = $conn->prepare('UPDATE boardmember SET about_us=0');
    $updatemember->execute();
    foreach ($member as $x) {
        $updatemember = $conn->prepare('UPDATE boardmember SET about_us=1 WHERE id=?');
        $updatemember->execute([$x]);
    }
    echo "done";


    // $member = $_POST['homeMember_about'];
    // $updatemember = $conn->prepare('UPDATE boardmember SET about_us=0');
    // $updatemember->execute();
    // foreach ($member as $x) {
    //     $updatemember = $conn->prepare('UPDATE boardmember SET about_us=1 WHERE id=?');
    //     $updatemember->execute([$x]);
    // }


    // $cta_id = $_POST['cta_id'];
    // $str_cta_id = implode(',', $cta_id);
    // $id = $_POST['id'];
    // $sql="UPDATE categories SET cta='$str_cta_id' WHERE id='$id'";
    // $updateCta_cat = $conn->prepare($sql);
    // $updateCta_cat->execute();
    //echo 'done';
}

// function uploadImage($serverPath, $fileName, $fileTempName) {
//     $ftp_server = "uk.storage.bunnycdn.com";
//     $ftp_user_name = "druggistzone";
//     $ftp_user_pass = 'f2644827-61d8-480e-a7c34508bb60-7bc2-490b';
//     $ftp_port = "21";
//     $destination_file = '/druggistzone'.$serverPath.$fileName;
//     $source_file = $fileTempName;

//     $conn_id = ftp_connect($ftp_server,$ftp_port);

//     $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
//     ftp_pasv($conn_id, true);

//     if ((!$conn_id) || (!$login_result)) { 
//         echo "FTP connection has failed!";
//         echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
//         exit; 
//     } else {
//         // echo "Connected to $ftp_server, for user $ftp_user_name";
//     }

//     $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

//     if (!$upload) { 
//         // echo "done";
//     } else {
//         // echo "Uploaded $source_file to $ftp_server as $destination_file";
//         return 'done';
//     }

//     ftp_close($conn_id);
// }

function uploadImage($serverPath, $fileName, $fileTempName) {
    $ftp_server = "uk.storage.bunnycdn.com";
    $ftp_user_name = "druggistzone";
    $ftp_user_pass = 'f2644827-61d8-480e-a7c34508bb60-7bc2-490b';
    $ftp_port = "21";
    $destination_file = '/druggistzone/'.$serverPath.$fileName;
    $source_file = $fileTempName;

    $conn_id = ftp_connect($ftp_server,$ftp_port);

    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
    ftp_pasv($conn_id, true);

    if ((!$conn_id) || (!$login_result)) { 
        echo "FTP connection has failed!<br>";
        echo "Attempted to connect to $ftp_server for user $ftp_user_name<br>"; 
        exit; 
    } else {
            echo "Connected to $ftp_server, for user $ftp_user_name<br>";
    }

    $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

    if (!$upload) { 
       echo "FTP upload has failed!<br>";
    } else {
        echo "Uploaded $source_file to $ftp_server as $destination_file<br>";
        // return 'done';
    }

    ftp_close($conn_id);
}


function deleteImage($path, $imageName) {
    $ftp_server = "uk.storage.bunnycdn.com";
    $ftp_username = "druggistzone";
    $ftp_userpass = 'f2644827-61d8-480e-a7c34508bb60-7bc2-490b';
    $ftp_port = "21";

    // set up basic connection
    $conn_id = ftp_connect($ftp_server,$ftp_port) or die("Could not connect to $ftp_server");

    // login with username and password
    ftp_login($conn_id, $ftp_username, $ftp_userpass);

    ftp_pasv($conn_id, true);

    //change dir
    ftp_chdir($conn_id, "/druggistzone".$path);

    // try to delete $file
    $file = "/druggistzone".$imageName;
    if (ftp_delete($conn_id, $file)) {
        return 'done';
    } else {

    }

    // close the connection
    ftp_close($conn_id);
}


