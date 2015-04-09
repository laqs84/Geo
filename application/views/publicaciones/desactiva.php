<?php include_once('/../header.php') ;?>



<div id="siteframe">
    <div id="content">
        <div class="content-padding">
           <?php
           error_reporting(0);
           if($nopuede) { 
           echo $nopuede;    
           } else { ?>
            Esta Propiedad esta desactiva
            <?php }?>
        </div>
    </div>
</div>


<?php include_once('/../footer.php') ;?>