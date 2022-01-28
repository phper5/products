<html>
<head>
	<title><?php echo $title; ?></title>
	<?php
	$CI =& get_instance();
	$CI->load->library('product_user_library');
	$is_guest = $CI->product_user_library->isGuest();
	if ($is_guest){
		?>
		<a href ="<?php echo site_url('login/view'); ?>">login</a>
		<?php
	}else{
		?>
		Hi <?php echo $CI->product_user_library->getUsername(); ?>
		<?php
		if ($CI->product_user_library->isAdmin()){
			?>
			<a href ="<?php echo site_url('panel/view'); ?>">panel</a>
			<?php
		}
		?>
		<a href ="<?php echo site_url('product/index'); ?>">products</a>
		<a href ="<?php echo site_url('logout/logout'); ?>">logout</a>
		<?php
	}

	?>

</head>
<body>
