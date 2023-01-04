<?php
include('include/header.php');
include('include/sidebar.php');
?>
<!-- Start right Content here -->
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">About Us</h4>
                </div>
            </div>
        </div>
        <div class="row">


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
                     <form id="setHmeMemberAboutus">
                        <div class="row cta-check">
                           <?php
                              $getCta = $conn->prepare("SELECT * FROM boardmember");
                              $getCta->execute();
                              while ($row = $getCta->fetch(PDO::FETCH_ASSOC)) {
                                  if ($row['about_us'] == 1) {
                                      $status = "checked";
                                  } else {
                                      $status = '';
                                  }
                                  if(!empty($row['image'])){
                                    $img_id = $row['image'];
                                  }else{
                                    $img_id=1;
                                  }

                                  $select_stmtPost_img=$conn->prepare("SELECT * FROM images WHERE id='".$img_id."'");
                                  $select_stmtPost_img->execute();
                                  $post_data_image=$select_stmtPost_img->fetch(PDO::FETCH_ASSOC);
                                  if(!empty($post_data_image['path'])){
                                      $author_image="https://druggist.b-cdn.net/".$post_data_image['path'];
                                      }else{
                                      $author_image="https://i.ibb.co/4fz1F7f/Getty-Images-974371976.jpg";
                                      }

                              ?>
                           <div class="col-lg-4 div" data-content="<?php echo $row['full_name']; ?>">
                              <input data-id="cta" name="homeMember_about[]" <?php echo $status; ?> data-field="cta" value="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" type="checkbox">
                              <label for="<?php echo $row['id']; ?>">
                                 <div class="cta-div mb-3">
                                    <img src="<?php echo $author_image; ?>" alt="">
                                    <div class="cta-content">
                                       <h4><?php echo $row['full_name'] ?></h4>
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
                            <input type="hidden" name="btn" value="sethmAbout"/>
                           <button type="submit" class="btn btn-primary w-md">
                           Update</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
<!-- end main content-->
<?php
include('include/footer.php');
?>