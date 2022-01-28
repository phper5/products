<h2><?php echo $title; ?></h2>

<div style="color: red"> <?php echo validation_errors(); ?></div>

<?php echo form_open('product/edit/'.$item['id']); ?>

<label for="title">Title</label>

<input type="text" name="title"  value="<?php echo $item['title'];?>"/><br />

<label for="description">Description</label>
<textarea name="description"> <?php echo $item['description'];?></textarea><br />

<label for="image">Image Url</label>
<input type="text" name="image"  value="<?php echo $item['image'];?>"/><br />

<input type="submit" name="submit" value="Create news item" />

</form>
