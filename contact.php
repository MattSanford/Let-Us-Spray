<?php
//init variables
$cf = array();
$sr = false;
 
if(isset($_SESSION['cf_returndata'])){
    $cf = $_SESSION['cf_returndata'];
    $sr = true;
}
?>					
<ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
	<li id="info">These were some of the problems with your submission:</li>
    <?php 
    if(isset($cf['errors']) && count($cf['errors']) > 0) :
        foreach($cf['errors'] as $error) :
    ?>
    <li><?php echo $error ?></li>
    <?php
        endforeach;
    endif;
    ?>						
</ul>
<p id="success" class="<?php echo ($sr && $cf['form_ok']) ? 'visible' : ''; ?>">Thanks for your message!</p>
<form action="/database.php" method="post" id="contact">
	<div class="top third">
		<div class="f-name">
			<label>First Name: </label><span class="required">*</span>
			<input type="text" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['firstName'] : '' ?>"  name="firstName" placeholder="Johnny" required="required" autofocus="autofocus">
		</div>
		<div class="l-name">
			<label>Last Name: </label><span class="required">*</span>
			<input type="text" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['lastName'] : '' ?>"  name="lastName" placeholder="Appleseed" required="required">
		</div>
		<div class="clear-fix"></div>
	</div>
	<div class="middle third">
		<div class="email">
					<label>Email Address: </label><span class="required">*</span>
					<input type="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" name="email" placeholder="johnny@email.com" required="required">
		</div>
		<div class="address">
			<label>Street Address: </label><span class="required">*</span>				
			<input type="text" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['address'] : '' ?>"  name="address" placeholder="123 Applegrove Rd." required="required">
		</div>
		<div class="clear-fix"></div>
	</div>
	<div class="middle third">
		<div class="city">
			<label>City: </label><span class="required">*</span>
			<input type="text" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['city'] : '' ?>" name="city" placeholder="Appletown" required="required">
		</div>			
		<div class="zip">
			<label>Zip Code: </label><span class="required">*</span>
			<input type="text" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['zip'] : '' ?>" name="zip_code" placeholder="12345" required="required">
		</div>
				<div class="clear-fix"></div>

	</div>		
		
		<div class="bottom third">
				<div class="job">
					<label>What's Dirty? </label><span class="required">*</span>
					<select name="job" id="selectme" required="required">
						<option></option>
						<option value="house" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['job'] == 'house') ? "selected='selected'" : ''?>>House</option>
						<option value="roof" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['job'] == 'roof') ? "selected='selected'" : '' ?>>Roof</option>
						<option value="garage-shed" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['garage-shed'] == 'garage-shed') ? "selected='selected'" : '' ?>>Garage/shed</option>
						<option value="rust-removal" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['rust-removal'] == 'rust') ? "selected='selected'" : '' ?> >Rust-Removal</option>
						<option value="other" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['job'] == 'other') ? "selected='selected'" : '' ?>>Other</option>
					</select>
				</div>
				
				
				<div class="message">
					<label>Message: </label><span class="required">*</span>
					<textarea name="message" cols="80" rows="5" placeholder="Mark, Let me tell you about my filthy roof! I need help!" required="required"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>				
					<div class="appear">
						<a href="http://facebook.com/letusspray" target="blank"><img src="/images/FB_FindUsOnFacebook-320.png" alt="Find Us On Facebook"></a>
					</div>
					<div class="clear-fix"></div>
				</div>	
				
				
				<div class="submit">
						<input type="submit" id="submit" class="send-button" value="Submit">
						<input type="email" name="email2" style="display: none;">
				</div>
					<p id="req-field-desc"><span class="required">*</span> indicates a required field</p>

	</div>	
<div class="clear-fix"></div>
</form>
<?php unset($_SESSION['cf_returndata']); ?>