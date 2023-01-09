<?php include('include/config.php');?>
<div class="container" id="getall_images">
  <div class="row">
    <div class="col-sm-8">
    <div class="row m-auto mt-5">
            <div class="col img-checkbox">     
                <ul style="overflow-y: scroll;height: 500px;">
                <?php 
                    $images=$conn->prepare("SELECT * FROM images WHERE status=?");
                    $images->execute([1]);
                    $i=0;
                    $total_images = $images->rowCount();
                    if ($total_images > 0) {
                        while ($row = $images->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                 <li><input type="checkbox" id="cb<?php echo $i; ?>" onclick="imageCheckbox()" name="images_id" value="<?php echo $row['id'] ?>"/>
                      <label for="cb<?php echo $i; ?>">
                      <img src="<?php echo $row['path']; ?>" alt="<?php echo $row['alt']; ?>" class="img-rounded custome_images" onclick="imageChahge(<?php echo $row['id']; ?>,'<?php echo $row['path']; ?>')">
                      </label>
                 </li>
                
            
                      <?php $i++; } }else{ ?>
                      <p class="alert alert-danger text-center mx-auto my-5">No Images Found</p>
                      <?php }?>
											<ul>
                </div>
              </div>
    </div>
    <div class="col-sm-4">
        <div class="card mt-3" id="for_dynamicImage"></div>
    </div>
  </div>
</div>