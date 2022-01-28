<?php
echo '<h2>'.$item['title'].'</h2>';
echo $item['description'];
if ($item['image']){?>
<img src="<?php echo $item['image']; ?>">
<?php } ?>
<div> time <?php echo date("Y-m-d H:i:s",$item['timestamps'])?>
</div>
<a href="<?php echo site_url('product/manage');?>"> back to index </a>
<br>
<a href="<?php echo site_url('product/edit/'.$item['id']);?>"> edit </a>

