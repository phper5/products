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
		6.3 active products: <?php echo $active_product; ?><br>
		6.4 active products which don't belong to any user.: <?php echo $active_product_not_attched; ?><br>
		6.5 Amount of all active attached products: <?php echo $active_attached_products; ?><br>
		6.6 Summarized price of all active attached products: <?php echo $summarized_active_attached_products; ?><br>
	</div>
</div>
