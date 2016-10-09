<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'class'	=> 'form-control',
	'placeholder' => 'Email address',
);
$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
	'value'	=> set_value('firstname'),
	'maxlength'	=> 20,
	'class'	=> 'form-control',
	'placeholder' => 'First Name',
);
$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
	'value'	=> set_value('lastname'),
	'maxlength'	=> 20,
	'class'	=> 'form-control',
	'placeholder' => 'Last Name',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'form-control',
	'placeholder' => 'Password',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'form-control',
	'placeholder' => 'Confirm Password',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);


$error_message = '';
if( form_error($email['name']) !=''){
$error_message = "<small class=\"btn btn-block btn-signup\">".str_replace("Login field", "Email field", form_error($email['name']) )."</small>";
}

if(isset($errors[$email['name']])){
$error_message .= "<small class=\"btn btn-block btn-signup\">".str_replace("Login", "Email", $errors[$email['name']] )."</small>";
}

if( form_error($firstname['name']) !='' ){
$error_message .= "<small class=\"btn btn-block btn-signup\">".form_error($firstname['name'])."</small>";
}

if(isset($errors[$firstname['name']])){
$error_message .= "<small class=\"btn btn-block btn-signup\">".$errors[$firstname['name']]."</small>";
}

if( form_error($lastname['name']) !='' ){
$error_message .= "<small class=\"btn btn-block btn-signup\">".form_error($lastname['name'])."</small>";
}

if(isset($errors[$lastname['name']])){
$error_message .= "<small class=\"btn btn-block btn-signup\">".$errors[$lastname['name']]."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"btn btn-block btn-signup\">".form_error($password['name'])."</small>";
}

if( form_error($confirm_password['name']) !='' ){
$error_message .= "<small class=\"btn btn-block btn-signup\">".form_error($confirm_password['name'])."</small>";
}

$captcha_content = '';
if ($captcha_registration) {
	if ($use_recaptcha) {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<div id="recaptcha_image"></div>
		<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
		<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type(\'audio\')">Get an audio CAPTCHA</a></div>
		<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type(\'image\')">Get an image CAPTCHA</a></div>

		<div class="recaptcha_only_if_image">Enter the words above</div>
		<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

		<div id="account-signup-divider" class="shared-divider"></div>
		';

		$captcha_content .= $recaptcha_html;
	} else {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<p>Enter the code exactly as it appears:</p>
		'.$captcha_html.'
		<p>'.form_label('Confirmation Code', $captcha['id']).'</p>
		<p>'.form_input($captcha).'</p>

		<div id="account-signup-divider" class="shared-divider"></div>
		';
	}
}

if( form_error('recaptcha_response_field') !=''){
$error_message = "<small class=\"error\">".form_error('recaptcha_response_field')."</small>";
}

if( form_error($captcha['name']) !=''){
$error_message = "<small class=\"error\">".form_error($captcha['name'])."</small>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>ZHome | Buy or Rent Your Home by Owner Directly</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    
</head>
	<script type='text/javascript'>
     function submit()
      {
         document.getElementById('register').submit();
      }
   </script>

<body class="imgBG">
	 <!--<i class="glyphicon glyphicon-user form-control-feedback"></i>
    			<input type="text" class="form-control" placeholder="Username" />-->
	<div class="container popup-signup">
    <div class="col-md-offset-4 col-md-4">
    <div class="panel panel-default">
  
  <div class="panel-body">
			
 			<?php echo form_open($this->uri->uri_string(),array('id'=>'register','name'=>'register','class'=>'form-horizontal theme-signup-color')); ?>
            <?php echo $error_message; ?>
			  <div class="form-group">
                <div class="col-sm-12">
                	<h4 class="text-center">Sign up with <a class="btnlogin"  href="/auth_oa2/session/facebook">Facebook</a> or <a class="btnlogin" href="/auth_oa2/session/google">Google</a></h4>
                  
                </div>
                
                
              </div>
              <div class="form-group">
              <div class="col-sm-12">
                	<div class="signup-or"><span class="signup-or-text">or</span></div>
                </div>
              </div>
              <div class="form-group"></div>

            <div class="form-group">
            	<div class="col-sm-12 has-feedback">
                 	<i class="glyphicon glyphicon-user form-control-feedback"></i>
    				<?php echo form_input($firstname); ?>                 
               	</div>
               
            </div>
  			<div class="form-group">
            
             <div class="col-sm-12 has-feedback">
                	<i class="glyphicon glyphicon-user form-control-feedback"></i>
    				<?php echo form_input($lastname); ?>
                </div>
            
            </div>
            <div class="form-group">
            
             <div class="col-sm-12 has-feedback">
                	<i class="fa fa-at form-control-feedback"></i>
    				<?php echo form_input($email); ?>
                </div>
            
            </div>
            
            <div class="form-group">
            
             <div class="col-sm-12 has-feedback">
                	<i class="fa fa-lock form-control-feedback"></i>
    				<?php echo form_password($password); ?>
                </div>
       
            </div>

            
            <div class="form-group">
            
             <div class="col-sm-12 has-feedback">
                	<i class="fa fa-lock form-control-feedback"></i>
    				<?php echo form_password($confirm_password); ?>
                </div>
       
            </div>
            <div class="form-group">
            	<div class="col-sm-12">
            		<input type="checkbox">
    				<span class="text-under-socialbtn">I’d like to receive coupons and news.</span>
                </div>
            </div>
			<!-- test -->
           
            
            <!-- end test-->
            <div class="form-group"></div>
            <div class="form-group">
            	<div class="col-sm-12">
            	<div class="text-under-socialbtn">By clicking “Sign up” you confirm that you accept the Term of Service and Privacy Policy.</div>
                
                
                </div>
            	<!-- end first col-sm-12-->
            </div>
			
             <div class="form-group">
             	  <div class="col-sm-12">
             	  <a href="javascript: submit();" class="btn btn-block btn-signup">Sign up </a>
                  </div>
             </div>
		</form>
  </div>
</div>
</div>
</div>


	

</body>
</html>