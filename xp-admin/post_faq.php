<?php include('include/db.php');
?>
    <div id="accordionExample" class="accordion">
        <?php
                $totalfaq = count($_POST['faq_question']);
                if(!empty($totalfaq)){    
                
                for($i=0;$i<$totalfaq;$i++){ 
                     $faq_question = $_POST['faq_question'][$i];
                     $faq_answer =  $_POST['faq_answer'][$i];
                    ?>    
                        <div class="accordion-item">
                        <span id="heading<?php echo $i ?>" class="accordion-header" style="font-weight: 600; font-size: 18px">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse<?php echo $i ?>" aria-expanded="false" aria-controls="collapse<?php echo $i ?>">
                            <span class="me-3">0<?php echo $i+1; ?></span> <?php echo $faq_question ?><br /></button>
                        </span>
                    <div id="collapse<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $i ?>"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo $faq_answer; ?>
                        </div>
                    </div>
                </div>
        <?php } }else{ echo "no faq";} ?>

    </div>