<?php 
include('admin/include/config.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$page_url=$actual_link;
$post_slug = $_GET['title'];
$post_slug_slash = $post_slug."/";

$selectPost=$conn->prepare("SELECT * FROM post WHERE slug = '$post_slug' OR slug = '$post_slug_slash' AND status='1'");
$selectPost->execute(); 

$countpost = $selectPost->rowCount(); 
if($countpost>0){
        while($row=$selectPost->fetch(PDO::FETCH_ASSOC)){ 
            $post_id = $row['id'];
            $content= $row['content'];
            $seo_title=$row['meta_desc'];  
            $title = $row['title'];
            $description = $row['description'];
    //         $meta_desc = $row['metaDescription'];
    //         if(!empty($row['subcategories'])){
    //           $subcat_id = $row['subcategories'];
    //         }else{
    //           $subcat_id=1;
    //         }
    //         if(!empty($row['cta'])){
    //           $cta_id = $row['cta'];
    //         }else{
    //           $cta_id=1;
    //         }
    //         if(!empty($row['written'])){
    //          $written_id = $row['written'];
    //         }

    //         if(!empty($row['reviewed'])){
    //          $reviewed_id = $row['reviewed'];
    //         }

    //         $boardMember = $conn->prepare('SELECT * FROM boardmember WHERE id=?');
    //         $boardMember->execute([$written_id]);
    //         while ($rowWrite = $boardMember->fetch(PDO::FETCH_ASSOC)) {
    //             $written = $rowWrite['full_name'];
    //             $written_slug=$rowWrite['username'];
    //             $image_written_id=$rowWrite['image'];
    //         }
    //         $select_stmtwrriten_img=$conn->prepare("SELECT * FROM images WHERE id='".$image_written_id."'");
    //         $select_stmtwrriten_img->execute();
    //         $written_data_image=$select_stmtwrriten_img->fetch(PDO::FETCH_ASSOC);
    //         if(!empty($written_data_image['path'])){
    //           $written_image="https://druggist.b-cdn.net/".$written_data_image['path'];
    //           }else{
    //           $written_image="https://i.ibb.co/yntBmCx/Getty-Images-1304561534.jpg";
    //           }
            
    //           $boardMember_rev = $conn->prepare('SELECT * FROM boardmember WHERE id=?');
    //         $boardMember_rev->execute([$reviewed_id]);
    //         while ($row_rev = $boardMember_rev->fetch(PDO::FETCH_ASSOC)) {
    //             $review = $row_rev['full_name'];
    //             $review_slug=$row_rev['username'];
                
    //             if(!empty($row_rev['image'])){
    //                 $image_review_id=$row_rev['image'];    
    //             }else{
    //                 $image_review_id=1;
    //             }
    //         }
    //         $select_stmtreview_img=$conn->prepare("SELECT * FROM images WHERE id='".$image_review_id."'");
    //         $select_stmtreview_img->execute();
    //         $review_data_image=$select_stmtreview_img->fetch(PDO::FETCH_ASSOC);
    //         if(!empty($review_data_image['path'])){
    //           $review_image="https://druggist.b-cdn.net/".$review_data_image['path'];
    //           }else{
    //           $review_image="https://i.ibb.co/yntBmCx/Getty-Images-1304561534.jpg";
    //           }
            
    //         $postDate = $row['postDate'];
    //         $filter_postDate = date('F d, Y', strtotime($postDate));

    //         $select_stmtPost_cat=$conn->prepare("SELECT * FROM categories WHERE id='".$subcat_id."'");
    //         $select_stmtPost_cat->execute();
    //         $post_data_cat=$select_stmtPost_cat->fetch(PDO::FETCH_ASSOC);
    //         $cat_name = $post_data_cat['name'];
            
    //      //   for image get
    //      if(!empty($row['image'])){
    //       $img_id = $row['image'];
    //     }else{
    //       $img_id=1;
    //     }
    //       $select_stmtPost_img=$conn->prepare("SELECT * FROM images WHERE id='".$img_id."'");
    //       $select_stmtPost_img->execute();
    //       $post_data_image=$select_stmtPost_img->fetch(PDO::FETCH_ASSOC);
    //       if(!empty($post_data_image['path'])){
    //         $post_image="https://druggist.b-cdn.net/".$post_data_image['path'];
    //         }else{
    //         $post_image="https://i.ibb.co/yntBmCx/Getty-Images-1304561534.jpg";
    //         }
            
    // $page="blog";
    // $seoTitle = $seo_title;
    // $seoDescription = $meta_desc;
    // $canonical = $actual_link;
    // $ogtype = "article";
    // $ogtitle = $seoTitle;
    // $ogdescription = $meta_desc;
    // $ogcurrenturl = $actual_link;
    // $lastupdate = $post_date;
    // $ogimage = $post_image;
    // $sogimage = $post_image;
    // $ogimagealt = $image_alt;
    
    }// loop close



    include ('./include/header.php');
?>
    <section class="blog__page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="pe-lg-5">
                        <div class="banner">
                            <p class="line"><strong class="cat">Education</strong> <strong class="duration bf">18 min
                                    Read</strong> <strong class="post-date bf">Wednesday, October 11, 2022 </strong></p>
                            <h2><?php echo $title ?></h2>

                        </div>
                        <div class="content">
                            <div class="author d-flex align-items-center gap-3">
                                <img src="/images/img1.png" alt="">
                                <p class="mb-0 d-flex flex-column gap-2"><strong><?php //echo $written ?></strong>
                                    <small>Consumer experience </small>
                                </p>
                            </div>
                                <p><?php echo $content ?></p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis voluptatibus itaque
                                vero ab aliquid repudiandae!</p>
                            <img src="/images/img1.png" alt="">

                        </div>
                    </article>
                </div>
                <div class="col-lg-4 side">
                    <div class="side-bar">
                        <div class="heading">Read more blog like this</div>
                        <ul class="ps-0">
                            
                        <?php
                        	$stmt_blog = $conn->prepare("SELECT * FROM `post` WHERE status=1");
                            $stmt_blog->execute();
                            while($blog_data = $stmt_blog->fetch(PDO::FETCH_ASSOC)){
                                $img_id = $blog_data['img_id'];
                        
                        ?>
                            <li>
                                <p class="line"><strong class="cat">Education</strong> <strong class="duration bf">18
                                        min Read</strong> <strong class="post-date bf">October 11 </strong></p>
                                <div class="b-head"><?php echo $blog_data['title'] ?></div>
                                <a href="<?php echo $blog_data['slug'] ?>">Read more<i class="ms-3 fa-solid fa-chevron-up"></i></a>
                            </li>
                        <?php } ?>

                            <!-- <li>
                                <p class="line"><strong class="cat">Education</strong> <strong class="duration bf">18
                                        min Read</strong> <strong class="post-date bf">October 11 </strong></p>
                                <div class="b-head">Lorem ipsum dolor sit amet consectetur. Feugiat.</div>
                                <a href="">Read more<i class="ms-3 fa-solid fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <p class="line"><strong class="cat">Education</strong> <strong class="duration bf">18
                                        min Read</strong> <strong class="post-date bf">October 11 </strong></p>
                                <div class="b-head">Lorem ipsum dolor sit amet consectetur. Feugiat.</div>
                                <a href="">Read more<i class="ms-3 fa-solid fa-chevron-up"></i></a>
                            </li> -->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
    include ('./include/footer.php');
}else{
    echo "not found";
}
    ?>