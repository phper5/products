<div>
	<h2><?php echo $title; ?></h2>

	<a href="<?php echo site_url('product/create');?>">add new product</a>

	<?php foreach ($products as $item): ?>

		<h3><?php echo $item['title']; ?></h3>
		<div><a href="<?php echo site_url('product/attach/'.$item['id']); ?>">Attach product</a></div>

	<?php endforeach; ?>
</div>
