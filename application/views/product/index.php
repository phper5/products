<div>
	<h2><?php echo $title; ?></h2>

	<a href="<?php echo site_url('product/create');?>">add new product</a>

	<?php foreach ($products as $item): ?>

		<h3><?php echo $item['title']; ?></h3>


	<?php endforeach; ?>
</div>
