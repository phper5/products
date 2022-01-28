<div style="text-align: center;margin: 100px auto">
	<p>login success</p>
<?php
if ($is_admin){
	?>
		go to <a href="<?php echo site_url('panel/view'); ?>">panel</a>
	<?php
}else{
	?>
	go to <a href="<?php echo site_url('product/index'); ?>">home page</a>
	<?php
}

?>
</div>
