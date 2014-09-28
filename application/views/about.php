 
<h2>Create a user</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('pages/create') ?>

	<label for="title">User</label>
	<input type="input" name="title" /><br />

	<label for="text">Password</label>
	<textarea name="text"></textarea><br />

	<input type="submit" name="submit" value="Create a user" />

</form>

