<h2><?php echo $title; ?></h2>

<div style="color: red"> <?php echo validation_errors(); ?></div>

<?php echo form_open('product/attach/'.$item['id']); ?>

<label for="title">Product:</label>
<?php echo $item['title'];?> <br/>


<label for="description">Num</label>
<input type="text" name="num" /><br />

<label for="image">price</label>
<input type="text" name="price" /><br />

<input type="submit" name="submit" value="attach product" />

</form>
