

<h2>Create a user</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('login/auth') ?>
User name: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Login" name="login" />
</form> 