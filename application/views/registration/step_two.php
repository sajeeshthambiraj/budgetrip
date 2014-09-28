<?php echo validation_errors(); ?>
<h1> Sign up - Step two</h1>
<?php echo form_open('registration/step_two') ?>
    <label for="dob">Date of Birth: </label>
    <input type="date" name="dob" /> <br/>
    
    <label for="address">Address: </label>
    <input type="textarea" name="address" /> <br/>
    
    <label for="pincode">Pin code: </label>
    <input type="text" name="pincode" /> <br/>
    
    <label for="mobile">Mobile: </label>
    <input type="number" name="mobile" /> <br/>

    <label for="sq1">Select One question from list: </label> <br/>
    <select name="sq1">
        <option value="one">What is the home town of your mother?</option>
        <option value="two"> Favourite tourist place?</option>    
    </select> <br/>
    <input type="text" name="sa1" /> <br/>
    
    <select name="sq2">
        <option value="three"> Favourite food? </option>
        <option value="four"> Facourite cricketer? </option>
    </select><br/>
    <input type="text" name="sa1" /> <br/>
    
    <input type="submit" name="tostepthree" value="NEXT" >
    <input type="submit" name="tostepthree" value="SKIP" >
        

</form>
