<?php 
include('include/config.php');
if($_POST['btn']=="post_title")
{
   $title = $_POST['post_title'];
   $sql = "SELECT * FROM post WHERE status='1' AND title LIKE '%$title%'";   
   $stmt= $conn->prepare($sql);                               
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo '<table id="datatable" class="table table-bordered dt-responsive">
    <thead>
        <tr role="row">
        <th>Sr No.</th>
        <th>Image</th>
        <th>Title</th>
        <th>Category</th>
        <th>Description</th>
        <th>Uploaded</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
    <tbody>';
    $i=1;
    if(!empty($result))
    {
        foreach($result as $row)
            {
                echo "<tr>";
                $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                $stmt_img->execute([$row['img_id']]);
                $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
								if (!empty($img_data)) 
                                    {
											$image = $img_data[0]['path']; 
											$alt = $img_data[0]['alt'];
									}else{
											$image="Not Found";
											$alt="Not Found";
										 }
                echo "<td>$i</td>";    
                echo "<td><img src='".$image."' class='custome_img' alt='".$alt."'></td>";
                echo "<td>".$row['title']."</td>";
                $stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
                $stmt_cat->execute([$row['cat_id']]);
                $cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($cat_data)) 
                    {
                        $cat_name = $cat_data[0]['name']; 
                    }else{
                        $cat_name="Not Found";
                         }
                echo "<td>" .$cat_name. "</td>";
                echo "<td>" .$row['description']. "</td>";
                echo "<td>" .$row['uploaded_on']. "</td>";
                echo "<td><a target='_blank' href='https://practicalanxietysolutions.com/".$row['slug']."' class='btn btn-success'><i class='fas fa-solid fa-eye'
					            style='margin-left:-2px;color: white;font-size: 15px;margin-top:1px;'></i>
						        </td>";    
                echo "<td><a href='update_post.php?id=".$row["id"]."' class='btn btn-success' style='color: white;background: blueviolet'><i class='fas fa-edit'></i></td>";
                echo "<td><a href='javascript:void(0)' class='btn btn-danger' onclick='trashPost(".$row['id'].")'><i class='fas fa-trash-alt'></i></td>";
                echo "</tr>";
                $i++;
            }
    }
     else{
            echo "<tr>No Data Found</tr>";
         }
        echo "</table>";
}

// Product search table 
if($_POST['btn']=="pro_name")
{
   $pro_name = $_POST['pro_name'];
   $sql = "SELECT * FROM product WHERE status='1' AND name LIKE '%$pro_name%'";   
   $stmt= $conn->prepare($sql);                               
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo '<table id="datatable" class="table table-bordered dt-responsive">
    <thead>
        <tr role="row">
        <th>Sr No.</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Description</th>
        <th>Uploaded</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
    <tbody>';
    $i=1;
    if(!empty($result))
    {
            foreach($result as $row)
            {
                echo "<tr>";
                $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                $stmt_img->execute([$row['img_id']]);
                $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
								if (!empty($img_data)) {
											$image = $img_data[0]['path']; 
											$alt = $img_data[0]['alt'];
											}else{
											$image="Not Found";
											$alt="Not Found";
										}
                echo "<td>$i</td>";    
                echo "<td><img src='".$image."' class='custome_img' alt='".$alt."'></td>";
                echo "<td>".$row['name']."</td>";
                $stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
                $stmt_cat->execute([$row['cat_id']]);
                $cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($cat_data)) {
                 $cat_name = $cat_data[0]['name']; 
                 }else{
                 $cat_name="Not Found";
                }
                echo "<td>" .$cat_name. "</td>";
                echo "<td>" .$row['pro_desc']. "</td>";
                echo "<td>" .$row['PostDate']. "</td>";

                echo "<td><a target='_blank' href='https://practicalanxietysolutions.com/".$row['slug']."' class='btn btn-success'><i class='fas fa-solid fa-eye'
					            style='margin-left:-2px;color: white;font-size: 15px;margin-top:1px;'></i>
						        </td>";    
                echo "<td><a href='product_update.php?id=".$row["id"]."' class='btn btn-success' style='color: white;background: blueviolet'><i class='fas fa-edit'></i></td>";
                echo "<td><a href='javascript:void(0)' class='btn btn-danger' onclick='trashProduct(".$row['id'].")'><i class='fas fa-trash-alt'></i></td>";
                echo "</tr>";
                $i++;
            }

        }
        else{
            echo "<tr>No Data Found</tr>";
        }

        echo "</table>";
}
?>