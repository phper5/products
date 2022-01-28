<div style="margin: 50px auto;">

	<h1 style="text-align: center"> Admin Panel</h1>
	<div>
		<a href="<?php echo site_url("product/create");?>">add product</a> <br>
		<a href="<?php echo site_url("product/manage");?>">manage product</a> <br>
	</div>
	<div>
		active user: <?php echo $active_user; ?> <br>
		verified user: <?php echo $verified_user; ?>
	</div>
</div>
