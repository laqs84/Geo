<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$logo = array(
          'src' => 'images/top-lock.png',
          'alt' => '',
          'class' => '',
          
          'title' => '',
          
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title?></title>
    <?php // link_tag("css/reset.css");  ?>
    <?php echo link_tag("css/loginadmin.css");  ?>
    <script type="text/javascript" src="<?php echo base_url().'script/jquery-1.10.2.min.js' ?>"></script>
    <script src=<?php echo base_url().'script/loginsuper.js'?> ></script>
</head>
<body>
<div class="login-01">
		<div class="one-login  hvr-float-shadow">
			<div class="one-login-head">
					<?php echo img($logo);?>
					<h1>LOGIN</h1>
					<span></span>
			</div>
                    <form method="post">
				<li>
                                    <input id="username" type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" ><a href="#" class=" icon user"></a>
				</li>
				<li>
                                    <input id="password" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
				</li>
				<div class="p-container">
						
						
							<div class="clear"> </div>
				</div>
				<div class="submit">
                                    <input type="button" onclick="loginUser()" value="Inicio Sesion" >
				</div>
				
					
				</form>
		</div>
	</div>
</body>
</html>