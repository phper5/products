<div>
	<h2><?php echo $title; ?></h2>



	<?php foreach ($products as $item): ?>

		<h3><?php echo $item['title']; ?></h3>
		<div><a href="<?php echo site_url('product/attach/'.$item['id']); ?>">Attach product</a></div>
		<br>
		<br>
	<?php endforeach; ?>
</div>
