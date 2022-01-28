<div style="margin: 50px auto;">

	<h1 style="text-align: center"> Admin Panel</h1>
	<div>
		<a href="<?php echo site_url("product/create");?>">add product</a> <br>
		<a href="<?php echo site_url("product/manage");?>">manage product</a> <br>
	</div>
	<div>
		6.1 active user: <?php echo $active_user; ?> <br>
		6.1 verified user: <?php echo $verified_user; ?><br>
		6.2 active and verified user who attached active products: <?php echo $active_user_active_product; ?><br>
	</div>
</div>
