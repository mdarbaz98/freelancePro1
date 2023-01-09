<?php include('include/config.php');
date_default_timezone_set('Asia/Kolkata');
session_start();
if($_POST['btn']=='loginUser'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE username=? AND password=?");
    $stmt->execute([$username, $password]);
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $id= $user_data[0]['id'];
    $userCount=$stmt->rowCount();
    if($userCount > 0){
        echo "login";
        $_SESSION['admin_is_login'] = $username;
        $_SESSION['admin_is_login_id'] = $id;
    }
  }
if($_POST['btn']=='image_update'){
  $id = $_POST['img_id'];
  $alt = $_POST['alt'];
  $title = $_POST['title'];
  $stmt = $conn->prepare("UPDATE images SET alt=?, title=? WHERE id=?");
  if($stmt->execute([$alt, $title, $id])){
    echo "updated";
  }
}

if($_POST['btn']=='setFrontimage_id'){
    $id = $_POST['setFrontimage_id'];
    $stmt = $conn->prepare("UPDATE images SET status=2 WHERE id=?");
    if($stmt->execute([$id])){
      echo "updated";
    }
  }



if($_POST['btn']=='addCategory'){
  $cat_name="";
  if(isset($_POST['cat_name'])){
      $cat_name = trim_data($_POST['cat_name']);
  }else{
      $cat_name="";
  }
  $title="";
  if(isset($_POST['title'])){
      $title = trim_data($_POST['title']);
  }else{
      $title="";
  }
  $slug="";
  if(isset($_POST['slug'])){
      $slug = trim_data($_POST['slug']);
  }else{
      $slug="";
  }
  $content="";
  if(isset($_POST['content'])){
      $content = ($_POST['content']);
  }else{
      $content="";
  }
  $desc = $_POST['desc'];
  $desc="";
  if(isset($_POST['desc'])){
      $desc = trim_data($_POST['desc']);
  }else{
      $desc="";
  }
  $img_id="";
  if(isset($_POST['img_id'])){
      $img_id = trim_data($_POST['img_id']);
  }else{
      $img_id="";
  }
  $stmt = $conn->prepare("INSERT INTO category(img_id, name, title, slug, content, description, status) VALUES(?,?,?,?,?,?,?)");
  if($stmt->execute([$img_id, $cat_name, $title, $slug, $content, $desc, 1])){
    echo "category inserted sucessfully";
  }
}
if($_POST['btn']=='updateCategory'){
  $cat_id="";
  if(isset($_POST['cat_id'])){
      $cat_id = trim_data($_POST['cat_id']);
  }else{
      $cat_id="";
  }
  $cat_name="";
  if(isset($_POST['cat_name'])){
      $cat_name = trim_data($_POST['cat_name']);
  }else{
      $cat_name="";
  }
  $title="";
  if(isset($_POST['title'])){
      $title = trim_data($_POST['title']);
  }else{
      $title="";
  }
  $slug="";
  if(isset($_POST['slug'])){
      $slug = trim_data($_POST['slug']);
  }else{
      $slug="";
  }
  $content="";
  if(isset($_POST['content'])){
      $content = ($_POST['content']);
  }else{
      $content="";
  }
  $desc = $_POST['desc'];
  $desc="";
  if(isset($_POST['desc'])){
      $desc = trim_data($_POST['desc']);
  }else{
      $desc="";
  }
  $img_id="";
  if(isset($_POST['img_id'])){
      $img_id = trim_data($_POST['img_id']);
  }else{
      $img_id="";
  }
  $stmt = $conn->prepare("UPDATE category SET img_id=?, name=?, title=?, slug=?, content=?, description=?, status=? WHERE id=?");
  if($stmt->execute([$img_id, $cat_name, $title, $slug, $content, $desc, 1, $cat_id])){
    echo "updated";
  }

}
if($_POST['btn']=='deleteCategory_id'){
    $update = $conn->prepare('DELETE FROM category WHERE id=?');
    $update->execute([$_POST['deleteCategory_id']]);
    echo 'deleted';
    }
// cta 
if($_POST['btn']=='addCta'){
    $title = $_POST['title'];
    $shrt_detail = $_POST['shrt_dtl'];
    $cat = $_POST['category'];
    $url = $_POST['field'];
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("INSERT INTO cta(img_id,title ,short_detail, cat, url,status) VALUES(?,?,?,?,?,?)");
    if($stmt->execute([$img_id, $title, $shrt_detail, $cat, $url,1])){
      echo "inserted";
    }
  }
   //   UPDATE
   if($_POST['btn']=='updateCta'){
    $cta_id=$_POST['cta_id'];
    $title = $_POST['title'];
    $shrt_detail = $_POST['shrt_dtl'];
    $cat = $_POST['category'];
    $url = $_POST['url'];
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("UPDATE cta SET img_id=?, title=?, short_detail=?, cat=?, url=?, status=? WHERE id=?");
    if($stmt->execute([$img_id, $title, $shrt_detail, $cat, $url, 1, $cta_id])){
      echo "updated";
    }
  }
  if($_POST['btn']=='deleteCta_id'){
      $update = $conn->prepare('DELETE FROM cta WHERE id=?');
      $update->execute([$_POST['deleteCta_id']]);
      echo "deleted";
  }
//   cta ends here
//product
if($_POST['btn']=='addProduct'){
    $name="";
    if(isset($_POST['pro_name'])){
        $name = trim_data($_POST['pro_name']);
    }else{
        $name="";
    }
    $title="";
    if(isset($_POST['title'])){
        $title = trim_data($_POST['title']);
    }else{
        $title="";
    }
    $seo_title="";
    if(isset($_POST['seo_title'])){
        $seo_title = trim_data($_POST['seo_title']);
    }else{
        $seo_title="";
    }
    $descri="";
    if(isset($_POST['description'])){
        $descri = trim_data($_POST['description']);
    }else{
        $descri="";
    }
    $content="";
    if(isset($_POST['content'])){
        $content = $_POST['content'];
    }else{
        $content="";
    }
    $shrt_descri="";
    if(isset($_POST['shrt_desc'])){
        $shrt_descri = $_POST['shrt_desc'];
    }else{
        $shrt_descri="";
    }
    $slug="";
    if(isset($_POST['slug'])){
        $slug = trim_data($_POST['slug']);
    }else{
        $slug="";
    }
    $strn="";
    if(isset($_POST['strn'])){
        $strn = trim_data($_POST['strn']);
    }else{
        $strn="";
    }
    $prc="";
    if(isset($_POST['prc'])){
        $prc = trim_data($_POST['prc']);
    }else{
        $prc="";
    }
    $link="";
    if(isset($_POST['link'])){
        $link = trim_data($_POST['link']);
    }else{
        $link="";
    }
    $cat="";
    if(isset($_POST['category'])){
        $cat = trim_data($_POST['category']);
    }else{
        $cat="";
    }  
    $img_id = $_POST['img_id'];
    $img_id="";
    if(isset($_POST['img_id'])){
        $img_id = trim_data($_POST['img_id']);
    }else{
        $img_id="";
    }  
    $draft=0;
    if(isset($_POST['draft'])){
        $draft = $_POST['draft'];
    }else{
        $draft = 1;
    }
    $PostDate="";
    if(isset($_POST['PostDate'])){
        $PostDate = date("Y-m-d H:i", strtotime($_POST['PostDate']));
    }else{
        $PostDate = "";
    }

    
    $stmt = $conn->prepare("INSERT INTO product(img_id, name ,title,seo_title, content,shrt_desc, strnt, prc, slug, link, cat_id, description, PostDate, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    if($stmt->execute([$img_id, $name,  $title, $seo_title, $content, $shrt_descri, $strn, $prc, $slug, $link, $cat,$descri, $PostDate, $draft])){
      echo "Product Inserted Sucessfully";
    }
  }

  if($_POST['btn']=='updateProduct'){
    $product_id="";
    if(isset($_POST['product_id'])){
        $product_id = trim_data($_POST['product_id']);
    }else{
        $product_id="";
    }
    $name="";
    if(isset($_POST['pro_name'])){
        $name = trim_data($_POST['pro_name']);
    }else{
        $name="";
    }
    $title="";
    if(isset($_POST['title'])){
        $title = trim_data($_POST['title']);
    }else{
        $title="";
    }
    $seo_title="";
    if(isset($_POST['seo_title'])){
        $seo_title = trim_data($_POST['seo_title']);
    }else{
        $seo_title="";
    }
    $description="";
    if(isset($_POST['description'])){
        $description = trim_data($_POST['description']);
    }else{
        $description="";
    }
    $content="";
    if(isset($_POST['content'])){
        $content = $_POST['content'];
    }else{
        $content="";
    }
    $shrt_descri="";
    if(isset($_POST['shrt_desc'])){
        $shrt_descri = $_POST['shrt_desc'];
    }else{
        $shrt_descri="";
    }
    $slug="";
    if(isset($_POST['slug'])){
        $slug = trim_data($_POST['slug']);
    }else{
        $slug="";
    }
    $strn="";
    if(isset($_POST['strn'])){
        $strn = trim_data($_POST['strn']);
    }else{
        $strn="";
    }
    $prc="";
    if(isset($_POST['prc'])){
        $prc = trim_data($_POST['prc']);
    }else{
        $prc="";
    }
    $link="";
    if(isset($_POST['link'])){
        $link = trim_data($_POST['link']);
    }else{
        $link="";
    }
    $cat="";
    if(isset($_POST['category'])){
        $cat = trim_data($_POST['category']);
    }else{
        $cat="";
    }  
    $img_id="";
    
    if(isset($_POST['img_id'])){
        $img_id = $_POST['img_id'];
    }else{
        $img_id="";
    }

    $img_id_val="";
    if(isset($_POST['img_id_val'])){
        $img_id_val = $_POST['img_id_val'];
    }else{
        $img_id_val="";
    }  
    $front_img = "";
    if(isset($_POST['front_img'])){
        $front_img = $_POST['front_img'];
    }else{
        $front_img="";
    }  

    if(!empty($img_id)){
        $img_id= $img_id;
    }else{
        $img_id="";
    }

    if(!empty($img_id_val)){
        $img_id_val = $img_id_val.",".$img_id; 
    }else{
        $img_id_val = $img_id; 
    }
        $img_id_val = rtrim($img_id_val,',');

        //echo $img_id_val = substr(trim($img_id_val), 0,-1);


    // echo $img_id_val = $img_id_val.",".$img_id; 
    // echo "<br>";


        // if(empty($img_id_val)){
        //     $img_id_val = $img_id; 
        // }else{
        //     $img_id_val = $img_id_val.",".$img_id;
        // }
    $stmt = $conn->prepare("UPDATE product SET img_id=?, front_img=?, name=?, title=?, seo_title=?, content =?, shrt_desc=?, strnt=?, prc=?, slug=?, link=?, cat_id=?, description=?, status=? WHERE id=?");
    if($stmt->execute([$img_id_val, $front_img, $name, $title, $seo_title, $content, $shrt_descri, $strn, $prc, $slug, $link, $cat, $description, 1, $product_id])){
      echo "updated";
    }
  }
//   upload product
if($_POST['btn']=='uploadProduct_id'){
    $update = $conn->prepare('UPDATE product SET status=1 WHERE id=?');
    $update->execute([$_POST['uploadProduct_id']]);
    echo 'uploaded';
    }
  // Trash product
  if($_POST['btn']=='trashProduct_id'){
    $update = $conn->prepare('UPDATE product SET status=0 WHERE id=?');
    $update->execute([$_POST['trashProduct_id']]);
    echo 'trashed';
    }

    // Permanent delete product
    if($_POST['btn']=='deleteProduct_id'){
        $update = $conn->prepare('DELETE FROM product WHERE id=?');
        $update->execute([$_POST['deleteProduct_id']]);
        echo 'deleted';
        }
//   product ends here
//user
if($_POST['btn']=='addUser'){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];  
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("INSERT INTO user(img_id,name ,username,password,status) VALUES(?,?,?,?,?)");
    if($stmt->execute([$img_id, $name, $username,  $pwd,1])){
      echo "User Inserted Sucessfully";
    }
  }
//   UPDATE
  if($_POST['btn']=='updateUser'){
    $user_id=$_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];  
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("UPDATE user SET img_id=?, name=?, username=?, password=?, status=? WHERE id=?");
    if($stmt->execute([$img_id, $name, $username,  $pwd, 1, $user_id])){
      echo "User updated Sucessfully";
    }
  }


//   DELETE
  if($_POST['btn']=='deleteUser_id'){
    $update = $conn->prepare('DELETE FROM user WHERE id=?');
    $update->execute([$_POST['deleteUser_id']]);
    echo 'deleted';
    }
//   user ends here
 // Trash enquiry
 if($_POST['btn']=='trashEnquiry_id'){
    $update = $conn->prepare('UPDATE enquiry SET status=0 WHERE id=?');
    $update->execute([$_POST['trashEnquiry_id']]);
    echo 'trashed';
    }
//   DELETE enquiry
if($_POST['btn']=='deleteEnquiry_id'){
    $update = $conn->prepare('DELETE FROM  enquiry WHERE id=?');
    $update->execute([$_POST['deleteEnquiry_id']]);
    echo 'deleted';
    }
 // post start here
// delete post
if($_POST['btn']=='deletePost_id'){
    $update = $conn->prepare('DELETE FROM post WHERE id=?');
    $update->execute([$_POST['deletePost_id']]);
    echo 'deleted';
    }
 //   upload post
if($_POST['btn']=='uploadPost_id'){
    $update = $conn->prepare('UPDATE post SET status=1 WHERE id=?');
    $update->execute([$_POST['uploadPost_id']]);
    echo 'uploaded';
    }

   
// trash post
if($_POST['btn']=='trashPost_id'){
    $update = $conn->prepare('UPDATE post SET status=0 WHERE id=?');
    $update->execute([$_POST['trashPost_id']]);
    echo 'trashed';
    }

    
    if($_POST['btn']=="addPost"){
        $title="";
        if(isset($_POST['title'])){
            $title = trim_data($_POST['title']);
        }
        else{
            $title="";
        }
        $seo_title="";
        if(isset($_POST['seo_title'])){
            $seo_title = trim_data($_POST['seo_title']);
        }
        else{
            $seo_title="";
        }
        $slug="";
        if(isset($_POST['slug'])){
            $slug = strtolower(str_replace(" ","-",$_POST['slug']));
        }
        else{
            $slug="";
        }
        $meta_desc="";
        if(isset($_POST['meta_desc'])){
            $meta_desc = trim_data($_POST['meta_desc']);
        }
        else{
            $meta_desc="";
        }
        $content="";
        if(isset($_POST['content'])){
            $content = $_POST['content'];
        }else{
            $content="";
        }
        if(isset($_POST['bot_robot'])){
            $bot_robot = ($_POST['bot_robot']);
        }
        $bot_robot_value="";
        if(!empty($bot_robot)){
            $bot_robot_value  = implode(", ",$bot_robot);            
        }
        else{
            $bot_robot_value = "0";
        }
        if(isset($_POST['max_snippet'])){
            $max_snippet = $_POST['max_snippet'];
        }
        else{
             $max_snippet = "max-snippet:";
        }
        if(isset($_POST['max_video'])){
        $max_video =($_POST['max_video']);
        }
        else{
            $max_video = "max-video:";
        }

        if(isset($_POST['max_image'])){
        $max_image=$_POST['max_image'];
        }
        else{
            $max_image="max-image:";
        }
            $max_snippet_value =$_POST['max_snippet_value'];   
            $concat_snippet = $max_snippet.$max_snippet_value;
            $max_video_value =$_POST['max_video_value'];
            $concat_video = $max_video.$max_video_value;    
            $max_image_value =$_POST['max_image_value'];
            $concat_image = $max_image.$max_image_value;
            $advance_bot = $bot_robot_value.", ".$concat_snippet.", ".$concat_video.", ".$concat_image;
            
            $img_id="";
            if(isset($_POST['img_id'])){
                $img_id = $_POST['img_id'];
            }
            else{
                $img_id="";
            }
            $cat_id="";
            if(isset($_POST['category'])){
                $cat_id = $_POST['category'];
            }
            else{
                $cat_id="";
            }

            $description="";
            if(isset($_POST['description'])){
                $description = trim_data($_POST['description']);
            }
            else{
                $description="";
            }
            $PostDate="";
            if(isset($_POST['PostDate'])){
                $PostDate = date("Y-m-d H:i", strtotime($_POST['PostDate']));
            }
            else{
                $PostDate="";
            }
            $draft=1;
            if(isset($_POST['draft'])){
                $draft = $_POST['draft'];
            }
            else{
                $draft = 1;
            }
                $stmt1 = $conn->prepare("INSERT INTO post(title, seo_title, slug, meta_desc, content, img_id, cat_id, bot_rank, description, uploaded_on, status) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                if($stmt1->execute([$title, $seo_title, $slug, $meta_desc, $content, $img_id, $cat_id, $advance_bot, $description, $PostDate, $draft]))
                {
                            echo "inserted";
                }
            
    }//add post end

    // trash 

    // update post start
    if($_POST['btn']=="updatePost"){
        $post_id=$_POST['post_id'];
        $title="";
        if(isset($_POST['title'])){
            $title = trim_data($_POST['title']);
        }
        else{
            $title="";
        }
        $seo_title="";
        if(isset($_POST['seo_title'])){
            $seo_title = trim_data($_POST['seo_title']);
        }
        else{
            $seo_title="";
        }
        $slug="";
        if(isset($_POST['slug'])){
            $slug = strtolower(str_replace(" ","-",$_POST['slug']));
        }
        else{
            $slug="";
        }
        $meta_desc="";
        if(isset($_POST['meta_desc'])){
            $meta_desc = trim_data($_POST['meta_desc']);
        }
        else{
            $meta_desc="";
        }
        $content="";
        if(isset($_POST['content'])){
            $content = $_POST['content'];
        }else{
            $content="";
        }
        if(isset($_POST['bot_robot'])){
            $bot_robot = ($_POST['bot_robot']);
        }
        $bot_robot_value="";
        if(!empty($bot_robot)){
            $bot_robot_value  = implode(", ",$bot_robot);            
        }
        else{
            $bot_robot_value = "0";
        }
        if(isset($_POST['max_snippet'])){
            $max_snippet = $_POST['max_snippet'];
        }
        else{
             $max_snippet = "max-snippet:";
        }
        if(isset($_POST['max_video'])){
        $max_video =($_POST['max_video']);
        }
        else{
            $max_video = "max-video:";
        }
        if(isset($_POST['max_image'])){
        $max_image=$_POST['max_image'];
        }
        else{
            $max_image="max-image:";
        }
            $max_snippet_value =$_POST['max_snippet_value'];   
            $concat_snippet = $max_snippet.$max_snippet_value;
            $max_video_value =$_POST['max_video_value'];
            $concat_video = $max_video.$max_video_value;    
            $max_image_value =$_POST['max_image_value'];
            $concat_image = $max_image.$max_image_value;
            $advance_bot = $bot_robot_value.", ".$concat_snippet.", ".$concat_video.", ".$concat_image;
            $img_id=0;
            if(isset($_POST['img_id'])){
                $img_id = $_POST['img_id'];
            }
            else{
                $img_id=0;
            }
            $cat_id="";
            if(isset($_POST['category'])){
                $cat_id = $_POST['category'];
            }
            else{
                $cat_id="";
            }
            $description="";
            if(isset($_POST['description'])){
                $description = trim_data($_POST['description']);
            }
            else{
                $description="";
            }
            $PostDate="";
            if(isset($_POST['PostDate'])){
                $PostDate = date("Y-m-d H:i", strtotime($_POST['PostDate']));
            }
            else{
                $PostDate="";
            }
            $draft=1;
            if(isset($_POST['draft'])){
                $draft = $_POST['draft'];
            }
            else{
                $draft = 1;
            }

  $stmt = $conn->prepare("UPDATE post SET title=?, seo_title=?, slug=?, meta_desc=?, content=?, img_id=?, cat_id=?, bot_rank=?, description=?, uploaded_on=?, status=? WHERE id=?");
  if($stmt->execute([$title, $seo_title, $slug, $meta_desc, $content, $img_id, $cat_id, $advance_bot, $description, $PostDate, $draft, $post_id])){
    echo "updated";
  }

//   $stmt = $conn->prepare("UPDATE category SET img_id=?, name=?, title=?, slug=?, content=?, description=?, status=? WHERE id=?");
//   if($stmt->execute([$img_id, $cat_name, $title, $slug, $content, $desc, 1, $cat_id])){
//     echo "updated";
//   }

                // $stmt1 = $conn->prepare("INSERT INTO post(title, seo_title, slug, meta_desc, content, img_id, cat_id, bot_rank, description, uploaded_on, status) 
                // VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                // if($stmt1->execute([$title, $seo_title, $slug, $meta_desc, $content, $img_id, $cat_id, $advance_bot, $description, $PostDate, $draft]))
                // {
                //             echo "inserted";
                // }
            
    }//update post end

//Remove features image
if($_POST['btn']=="removeFeatureimage_id"){
            $id = $_POST['removeFeatureimage_id'];
            $sql=$conn->prepare("UPDATE `images` SET `status`=0 WHERE `id`=?");            
            $sql->execute([$id]);
            echo "removed";
    }

    //Remove product image
if($_POST['btn']=="removeproductimage_id"){
    $rmid = $_POST['removeproductimage_id'];
    $removepro_id = $_POST['removepro_id'];     
    $sql = "SELECT * FROM product WHERE id=?";
    $selectimage=$conn->prepare($sql);
    $selectimage->execute([$removepro_id]);
    $result = $selectimage->fetchAll(PDO::FETCH_ASSOC);
    $pro_imgs = $result[0]['img_id'];
    $imgArray = explode(',',$pro_imgs);
    $updatedid = array_diff($imgArray, explode(',',$rmid));
    $updatedid = implode(',',$updatedid);
    //update blog set img_id=$updatedid WHERE
    $updatedid;
    $sql1=$conn->prepare("UPDATE product SET img_id=? WHERE id=?");            
    $sql1->execute([$updatedid,$removepro_id]);
    echo "removed";


    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";


}
// remove category
if($_POST['btn']=="removecategoryimage_id"){
    $rmid_img = $_POST['removecategoryimage_id'];
    //$removecat_id = $_POST['removecat_id']; 
    // $sql = "SELECT * FROM category WHERE id=?";
    // $selectimage=$conn->prepare($sql);
    // $selectimage->execute([$removecat_id]);
    // $result = $selectimage->fetchAll(PDO::FETCH_ASSOC);
    // echo $cat_img = $result[0]['img_id'];

// $imgArray = explode(',',$pro_imgs);
// $updatedid = array_diff($imgArray, explode(',',$rmid));
// $updatedid = implode(',',$updatedid);
//update blog set img_id=$updatedid WHERE
//echo $updatedid;

    $sql1=$conn->prepare("UPDATE category SET img_id=? WHERE id=?");            
    $sql1->execute([0,$rmid_img]);
    echo "removed";


    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";


}

    
//Delete features image
if($_POST['btn']=="deleteFeatureimage_id"){
    $id = $_POST['deleteFeatureimage_id'];
    $selectimage=$conn->prepare("SELECT * FROM images WHERE id = '$id'");
    $selectimage->execute();
    while($row=$selectimage->fetch(PDO::FETCH_ASSOC)){
         $path = $row['path'];
         unlink($path);
         $sql=$conn->prepare("DELETE FROM images WHERE id=?");            
         $sql->execute([$id]);
         echo "deleted";
    }
}
    function trim_data($text) {
      // $text = trim($data); //<-- LINE 31
       if(is_array($text)) {
           return array_map('trim_data', $text);
       }

       $text = preg_replace("/(\r\n|\n|\r)/", "\n", $text); // cross-platform newlines
       $text = preg_replace("/\n\n\n\n+/", "\n", $text); // take care of duplicates 
      
       $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
       $text = stripslashes($text);
      
       $text = str_replace ( "\n", " ", $text );
       $text = str_replace ( "\t", " ", $text );
      
       return $text;
   }
?>