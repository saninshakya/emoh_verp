<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'class'	=> 'form-control',
	'placeholder' => 'Email address',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class'	=> 'form-control',
	'placeholder' => 'Password',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);


$error_message = '';
if( form_error($login['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($login['name']) )."</small>";
}

if(isset($errors[$login['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$login['name']] )."</small>";
}

if( form_error($password['name']) !='' ){
$error_message .= "<small class=\"error\">".form_error($password['name'])."</small>";
}

if(isset($errors[$password['name']])){
$error_message .= "<small class=\"error\">".$errors[$password['name']]."</small>";
}

$captcha_content = '';
if ($show_captcha) {
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
    <link href="/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" > 
   
</head>
<script type='text/javascript'>
     function submit()
      {
         document.getElementById('login').submit();
      }
</script>

<body class="log-in-bg">
	
	<div class="container popup-signup">
    <div class="col-md-offset-4 col-md-4">
    <div class="panel panel-default">
  
  <div class="panel-body">
		<?php echo form_open($this->uri->uri_string(), array('class'=>'form-horizontal','id'=>'login','name'=>'login')); ?>
              <div class="form-group form-nobottom">
                <!-- start first col-sm-12-->
                <div class="col-sm-12">
                
                  <a href="/auth_oa2/session/facebook" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i>Sign up with Facebook</a>
                  <a href="/auth_oa2/session/google" class="btn btn-block btn-social btn-google"><i class="fa fa-google"></i>Sign up with Google</a>
                  <div><!--No need to remember password, we will not post anything on you.-->
                    <div class="text-under-socialbtn">ไม่ต้องจำรหัสผ่าน เมื่อ sign up ด้วย facebook หรือ google account</div>
				  </div>
                  <div class="form-group">
                  	 <div class="col-sm-12"><div class="signup-or"><span class="signup-or-text">หรือ</span></div></div>

                  </div>
                  <div class="form-group">
                  	<div class="col-sm-12">
                   <a href="/auth/register/" class="btn btn-social btn-block btn-signupEmail"><span class="glyphicon glyphicon-envelope"></span> Sign up with Email</a>
                	</div>
                  </div>
  			<div class="form-group form-nobottom">
            	<div class="col-sm-12">
            	<div class="text-under-socialbtn">เมื่อคลิกปุ่ม Sign up ข้าพเจ้ายอมรับเงื่อนไข และนโยบายความเป็นส่วนตัวของ ZmyHome</div>
   				<!--By clicking “Sign up” you confirm that you accept the Term of Service and Privacy Policy.-->             

                </div>
            	<!-- end first col-sm-12-->
                
               
            </div>
		
		</form>
  </div>
</div>
</div>
</div>


</body>
</html>