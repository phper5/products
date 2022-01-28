
<div style="margin: 100px auto;text-align: center;">

	<?php
	if ($error_message){
		?>
		<div style="text-align: center;color: #f00"> <?php echo $error_message; ?></div>
		<?php
	}
	?>

<?php echo form_open('register/create'); ?>

<label for="username">username</label>
<input type="text" name="username" /><br />

	<label for="email">email</label>
	<input type="text" name="email" /><br />

<label for="email">password</label>
<input type="password" name="password" /><br />

	<label for="password2">password confirmation</label>
	<input type="password" name="password2" /><br />

<input type="submit" name="submit" value="register" />
	<a href ="<?php echo site_url('login/view'); ?>">login</a>
</form>
</div>
