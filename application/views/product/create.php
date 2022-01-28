<h2><?php echo $title; ?></h2>

<div style="color: red"> <?php echo validation_errors(); ?></div>

<?php echo form_open('product/create'); ?>

<label for="title">Title</label>
<input type="text" name="title" /><br />

<label for="description">Description</label>
<textarea name="description"></textarea><br />

<label for="image">Image Url</label>
<input type="text" name="image" /><br />

<input type="submit" name="submit" value="Create news item" />

</form>
