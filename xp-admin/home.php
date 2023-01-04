<?php
include('include/header.php');
include('include/sidebar.php');
?>



<div class="main-content">
            <div class="page-content">
                <!--container for category page starts here-->
                <div class="container-category">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Add Product</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
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
                                                    <div>
                                                        <select id="bulk-list"
                                                            class="form-control select2 select-bulk-cat">
                                                            <option value="" selected disabled>
                                                                Bulk Action
                                                            </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-primary mx-2 apply-btn">
                                                            Apply
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <select class="form-control select2 select-bulk-cat">
                                                            <option value="" selected disabled>
                                                                Select Category
                                                            </option>
                                                            <option value="11">1</option>
                                                            <option value="22">2</option>
                                                        </select>
                                                    </div>

                                                    <div class="mx-2 checkbox-select-date">
                                                        <label for="select-date">Select Date</label>
                                                        <input class="form-check-input" type="checkbox"
                                                            id="select-date" />
                                                    </div>
                                                </div>
                                                <table id="datatable"
                                                    class="table table-bordered dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="select-all" />
                                                            </th>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Slug</th>
                                                            <th>Count</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Garrett Winters</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>63</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Ashton Cox</td>
                                                            <td>Junior Technical Author</td>
                                                            <td>San Francisco</td>
                                                            <td>66</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Cedric Kelly</td>
                                                            <td>Senior Javascript Developer</td>
                                                            <td>Edinburgh</td>
                                                            <td>22</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Airi Satou</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>33</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Brielle Williamson</td>
                                                            <td>Integration Specialist</td>
                                                            <td>New York</td>
                                                            <td>61</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Herrod Chandler</td>
                                                            <td>Sales Assistant</td>
                                                            <td>San Francisco</td>
                                                            <td>59</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Rhona Davidson</td>
                                                            <td>Integration Specialist</td>
                                                            <td>Tokyo</td>
                                                            <td>55</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Colleen Hurst</td>
                                                            <td>Javascript Developer</td>
                                                            <td>San Francisco</td>
                                                            <td>39</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Sonya Frost</td>
                                                            <td>Software Engineer</td>
                                                            <td>Edinburgh</td>
                                                            <td>23</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Jena Gaines</td>
                                                            <td>Office Manager</td>
                                                            <td>London</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Quinn Flynn</td>
                                                            <td>Support Lead</td>
                                                            <td>Edinburgh</td>
                                                            <td>22</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Charde Marshall</td>
                                                            <td>Regional Director</td>
                                                            <td>San Francisco</td>
                                                            <td>36</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Haley Kennedy</td>
                                                            <td>Senior Marketing Designer</td>
                                                            <td>London</td>
                                                            <td>43</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Tatyana Fitzpatrick</td>
                                                            <td>Regional Director</td>
                                                            <td>London</td>
                                                            <td>19</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Michael Silva</td>
                                                            <td>Marketing Designer</td>
                                                            <td>London</td>
                                                            <td>66</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Paul Byrd</td>
                                                            <td>Chief Financial Officer (CFO)</td>
                                                            <td>New York</td>
                                                            <td>64</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Gloria Little</td>
                                                            <td>Systems Administrator</td>
                                                            <td>New York</td>
                                                            <td>59</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Bradley Greer</td>
                                                            <td>Software Engineer</td>
                                                            <td>London</td>
                                                            <td>41</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Dai Rios</td>
                                                            <td>Personnel Lead</td>
                                                            <td>Edinburgh</td>
                                                            <td>35</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Jenette Caldwell</td>
                                                            <td>Development Lead</td>
                                                            <td>New York</td>
                                                            <td>30</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Yuri Berry</td>
                                                            <td>Chief Marketing Officer (CMO)</td>
                                                            <td>New York</td>
                                                            <td>40</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center" class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Caesar Vance</td>
                                                            <td>Pre-Sales Support</td>
                                                            <td>New York</td>
                                                            <td>21</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Doris Wilder</td>
                                                            <td>Sales Assistant</td>
                                                            <td>Sidney</td>
                                                            <td>23</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Angelica Ramos</td>
                                                            <td>Chief Executive Officer (CEO)</td>
                                                            <td>London</td>
                                                            <td>47</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Gavin Joyce</td>
                                                            <td>Developer</td>
                                                            <td>Edinburgh</td>
                                                            <td>42</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Jennifer Chang</td>
                                                            <td>Regional Director</td>
                                                            <td>Singapore</td>
                                                            <td>28</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="category" />
                                                            </th>
                                                            <td>Brenden Wagner</td>
                                                            <td>Software Engineer</td>
                                                            <td>San Francisco</td>
                                                            <td>28</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- container-fluid -->
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
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            © Skote.
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