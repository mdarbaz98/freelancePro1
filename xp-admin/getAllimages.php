<?php include('include/db.php');
            if($_POST['btn']=="get_Allimages"){ 
                    $images=$conn->prepare("SELECT * FROM images order by id desc");
                    $images->execute();
                    $i=0;
                    $total_images = $images->rowCount();
                    if ($total_images > 0) {
                        while ($row = $images->fetch(PDO::FETCH_ASSOC)){?>
                        <div class="col-3 img-checkbox">     
                            <input type="radio" id="cb<?php echo $i; ?>" name="images_id" value="<?php echo $row['id'] ?>" class="invisible">
                            <label for="cb<?php echo $i; ?>">
                            <button class="btn btn-danger float-right" onclick="deleteImage(<?php echo $row['id']; ?>)">Delete</button>
                            <img src="https://druggist.b-cdn.net/<?php echo $row['path']; ?>" alt="<?php echo $row['alt']; ?>" class="img-rounded custome_images" onclick="Selectimage(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')">
                            </label>
                        </div>
            <?php $i++; } }else{ ?>
        <p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
<?php } };

if($_POST['btn']=="get_Allimages_content"){ 
    $images=$conn->prepare("SELECT * FROM images order by id desc");
    $images->execute();
    $i=0;
    $total_images = $images->rowCount();
    if ($total_images > 0) {
        while ($row = $images->fetch(PDO::FETCH_ASSOC)){?>
        <div class="col-3 img-checkbox">     
            <input type="radio" id="cb<?php echo $i; ?>" name="images_id" value="<?php echo $row['id'] ?>" class="invisible">
            <label for="cb<?php echo $i; ?>">
            <button class="btn btn-danger float-right" onclick="deleteImagecontent(<?php echo $row['id']; ?>)">Delete</button>
            <img src="https://druggist.b-cdn.net/<?php echo $row['path']; ?>" alt="<?php echo $row['alt']; ?>" class="img-rounded custome_images" onclick="contenImage('<?php echo $row['path']; ?>')">
            </label>
        </div>
<?php $i++; } }else{ ?>
<p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
<?php } };

if($_POST['btn']=="get_Allproductimages"){ 
    $images=$conn->prepare("SELECT * FROM images where status=? order by id desc");
    $images->execute([1]);
    $i=0;
    $total_images = $images->rowCount();
    if ($total_images > 0) {
        while ($row = $images->fetch(PDO::FETCH_ASSOC)){?>
        <div class="col-3 img-checkbox">     
            <input type="radio" id="cb<?php echo $i; ?>" name="images_id" value="<?php echo $row['id'] ?>" class="invisible">
            <label for="cb<?php echo $i; ?>">
            <button class="btn btn-danger float-right" onclick="deleteproductImage(<?php echo $row['id']; ?>)">Delete</button>
            <img src="https://druggist.b-cdn.net/<?php echo $row['path']; ?>" alt="<?php echo $row['alt']; ?>" class="img-rounded custome_images" onclick="Selectimage(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')">
            </label>
        </div>
<?php $i++; } }else{ ?>
<p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
<?php } };

?>