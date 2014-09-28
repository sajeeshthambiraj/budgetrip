<?php echo validation_errors(); ?>
<h1> Sign up - Step one</h1>
<?php echo form_open('registration/step_one') ?>
        <label for="firstname">First name: </label>
	<input type="input" name="firstname" /><br />
        
        <label for="lastname">Last name: </label>
	<input type="input" name="lastname" /><br />
        
         <label for="email">Email id: </label>
	<input type="email" name="email" /><br />
        
	<label for="password">Password:</label>
	<input type="password" name="password"/><br />
        
        <label for="repassword">Retype Password: </label>
	<input type="password" name="repassword"/><br />

	<input type="submit" name="signup" value="Signup" />
</form>
