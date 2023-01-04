<?php
include('include/header.php');
include('include/sidebar.php');
?>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Main Navigation Section</h4>
                </div>
            </div>
        </div>
        <h6 class="mx-3 mb-3  font-weigth-bolder">Sort Menu</h6>
        <div class="main-navigation-section">
            <div class="container">
                <form action="">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="category-select">
                                <h6>Select Category</h6>
                                <select class="form-control select2" id="Navi-select-cat" name="Navi-select-cat" required>
                                    <option>Select</option>
                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                    </optgroup>
                                    <optgroup label="Pacific Time Zone">
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </optgroup>
                                    <optgroup label="Mountain Time Zone">
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>


                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>


                                    </optgroup>
                                    <optgroup label="Eastern Time Zone">
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>


                                    </optgroup>
                                </select>
                                <span id="Navi-select-cat-span" name="Navi-select-cat-span"></span>
                            </div>
                            <div class="row">
                                <span>Select Sub Category</span>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor1" name="formCheckcolor1" required>
                                        <label class="form-check-label " for="formCheckcolor1">
                                            Checkbox
                                        </label>
                                    </div>
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor2" name="formCheckcolor2" required>
                                        <label class="form-check-label " for="formCheckcolor2">
                                            Checkbox
                                        </label>
                                    </div>
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor3" name="formCheckcolor3" required>
                                        <label class="form-check-label " for="formCheckcolor3">
                                            Checkbox
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor4" name="formCheckcolor4" required>
                                        <label class="form-check-label " for="formCheckcolor4">
                                            Checkbox
                                        </label>
                                    </div>
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor5" name="formCheckcolor5" required>
                                        <label class="form-check-label " for="formCheckcolor5">
                                            Checkbox
                                        </label>
                                    </div>
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor6" name="formCheckcolor6" required>
                                        <label class="form-check-label " for="formCheckcolor6">
                                            Checkbox
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor7" name="formCheckcolor7" required>
                                        <label class="form-check-label " for="formCheckcolor7">
                                            Checkbox
                                        </label>
                                    </div>
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor8" name="formCheckcolor8" required>
                                        <label class="form-check-label " for="formCheckcolor8">
                                            Checkbox
                                        </label>
                                    </div>
                                    <div class="form-check form-check-primary  mb-3 sub-check">
                                        <input class="form-check-input" type="checkbox" id="formCheckcolor9" name="formCheckcolor9" required>
                                        <label class="form-check-label " for="formCheckcolor9">
                                            Checkbox
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary mt-4 ml-3 mt-lg-0 mb-5 add-btn"><i class="fa-solid fa-circle-plus"></i> Add Menu</button>
                        </div>
                    </div>
                </form>
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