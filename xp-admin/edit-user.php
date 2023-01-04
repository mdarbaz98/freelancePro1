<?php
    include('include/header.php');
    include('include/sidebar.php');
    $userid = $_GET['user-id'];
    $boardMember = $conn->prepare('SELECT * FROM user where id=?');
    $boardMember->execute([$userid]);
    while($row=$boardMember->fetch(PDO::FETCH_ASSOC)){
        $username = $row['username'];
        $firstName = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $password = $row['password'];
        $role = $row['role'];
    }
?>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add User</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Personal Detail</h4>
                        <div id="userAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-check-all me-2"></i>
                            User has been added!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <form id="editUser">
                            <input type="hidden" value="editUser" name="btn">
                            <input type="hidden" value="<?php echo $userid; ?>" name="userid">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-username" class="form-label">User Name</label>
                                        <input type="text" class="form-control" value="<?php echo $username; ?>" id="username" name="username"
                                            for="formrow-username" placeholder="User Name" >
                                        <span class="error usernameError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstname" value="<?php echo $firstName; ?>" name="firstname"
                                            for="formrow-firstname" placeholder="First Name" >
                                        <span class="error firstnameError"></span>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" value="<?php echo $lastname; ?>" name="lastname"
                                            for="formrow-lastname" placeholder="Last Name" >
                                        <span class="error lastnameError"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-email" class="form-label">Email </label>
                                        <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email"
                                            placeholder="Email" >
                                        <span class="error emailError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-newpassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="" name="password"
                                            for="formrow-newpassword" placeholder="New Password" >
                                        <span style="color: #000000; font-size: 9px; background: #efaa33; padding: 0 7px; font-weight: 700;">Leave it blank! If you don't have new password to update</span>
                                        <span class="error passwordError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="formrow-email" class="form-label">Role </label>
                                        <input type="text" class="form-control" value="<?php echo $role; ?>" id="role" name="role"
                                            placeholder="Role" >
                                        <span class="error roleError"></span>
                                    </div>
                                </div>

                            <div class="row">

                            </div>

                            <div class="row">
                                <div class="col-sm-9">
                                                <div id="submitBtn">
                                                    <button type="submit" class="btn btn-add w-md btn-warning" id=editMemberBtnUser">
                                                        Update User
                                                    </button>
                                                </div>
                                </div>
                            </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
    

        </form>

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