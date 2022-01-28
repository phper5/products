<div>
	<h2><?php echo $title; ?></h2>

	<a href="<?php echo site_url('product/create');?>">add new product</a>

	<?php foreach ($products as $item): ?>

		<h3><?php echo $item['title']; ?></h3>
		<div><a href="<?php echo site_url('product/view/'.$item['id']); ?>">View product</a></div>
		<div><a href="<?php echo site_url('product/edit/'.$item['id']); ?>">Edit product</a></div>

	     <?php echo form_open('product/delete'); ?>
			<input type="hidden" name="id" value="<?php echo $item['id'];?>">
			<input type="submit" value="Delete product">
		</form>
		</div>
		<br>
		<br>

	<?php endforeach; ?>
</div>
