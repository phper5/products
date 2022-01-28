
<div style="margin: 100px auto;text-align: center;">

	<?php
	if ($error_message){
		?>
		<div style="text-align: center;color: #f00"> <?php echo $error_message; ?></div>
		<?php
	}
	?>


<?php echo form_open('login/create'); ?>

<label for="email">email</label>
<input type="text" name="email" /><br />

<label for="email">password</label>
<input type="password" name="password" /><br />

<input type="submit" name="submit" value="Login" />
	<a href ="<?php echo site_url('register/view'); ?>">register</a>

</form>
</div>

