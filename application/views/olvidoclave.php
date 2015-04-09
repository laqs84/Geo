<?php include ("header.php") ;?>
<script src=<?php echo base_url().'script/olvido.js'?> ></script>
<style>
   #content {
    background-color: #fff;
    border: 1px solid #c9c4c3;
    border-radius: 5px;
    box-shadow: 0 6px 10px -2px rgba(46, 45, 46, 1);
}
.content-padding {
    padding: 50px;
    text-align: justify;
}
.btn-primary{
        padding: 0 24px;
min-width: 150px; 
font-size: 16px;
height: 42px;
line-height: 42px;
border-radius: 0;
background: #439a00;
color: white;
    }
    .box {margin-top: 10px;border: 5px solid #439a00;border-radius: 8px;box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.7);display: block;font: 14px "Helvetica Neue" ,Helvetica,Arial,sans-serif;margin-bottom: 20px;padding: 6px 10px;position: relative;width: 320px;}
    legend{
font-family: "Symantec Sans","Helvetica Neue","Segoe UI","Lucida Grande","Lucida Sans",Lucida,Arial,sans-serif;
font-weight: 300;
color: #808080;
font-size: 36px;
margin-bottom: 20px;
}
#siteframe {
    background: none repeat scroll 0 0 #f0f0f0;
    min-height: 415px;
}
label{
    margin-bottom: 10px
}
</style>
<div id="siteframe">
	<div id="content">
            <div class="content-padding">
                <form class="form-horizontal well" method="post">
			<fieldset>
	          <legend>Restablecimiento de contraseña  <?=$count ?></legend>
			
				<div class="control-group">
					<label for="email">Email</label>
					<input class="box" type="text" id="email" name="email" />
				</div>
                  
				<div class="form-actions">
					<input onclick="OlvidoUser();" type="button" class="btn btn-primary" value="Reset" />
				</div>
				<?php if( isset($info)): ?>
					<div class="alert alert-success">
						<?php echo($info) ?>
					</div>
				<?php elseif( isset($error)): ?>
					<div class="alert alert-error">
						<?php echo($error) ?>
					</div>
				<?php endif; ?>
				
			</fieldset>
		</form>
            </div>
        </div>
</div>
<?php include ("footer.php") ;?>