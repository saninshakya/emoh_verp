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
    <link href="/css/custom.css" rel="stylesheet" type="text/css">
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
    <div class="panel panel-default login-panel">
  
    <div class="panel-body">
		<?php echo form_open($this->uri->uri_string(), array('class'=>'form-horizontal','id'=>'login','name'=>'login')); ?>
              <div class="form-group form-nobottom">
                <!-- start first col-sm-12-->
                <div class="col-sm-12">
                
                  <a href="/auth_oa2/session/facebook" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i>Login with Facebook</a>
                  <a href="/auth_oa2/session/google" class="btn btn-block btn-social btn-google"><i class="fa fa-google"></i>Login with Google</a>
                  <div>
                    <div class="text-under-socialbtn">ล็อคอินด้วย facebook หรือ google account ไม่ต้องจำรหัสผ่าน</div>
				  </div>
                  <div class="form-group">
                  	 <div class="col-sm-12"><div class="signup-or"><span class="signup-or-text">หรือ</span></div></div>

                  </div>
				  <div class="form-group">
					<div class="col-sm-12"><h5>Login by email</h5></div>
					<div class="col-sm-12 has-feedback">
                		<i class="fa fa-at form-control-feedback"></i>
						<?php echo form_input($login); ?>
					</div>
				   </div>
				  <div class="form-group">
					<div class="col-sm-12 has-feedback">
                		<i class="fa fa-lock form-control-feedback"></i>
						<?php echo form_password($password); ?>
					</div>
				  </div>
				  <div class="form-group">
						<div class="col-sm-12">	<?php echo form_checkbox($remember); ?> Remember me on this computer.</div>
				  </div>
                  <div class="form-group">
             	  <div class="col-sm-12">
             	  <a href="javascript: submit();" class="btn btn-block btn-signup">Log in</a>
                  </div>
				</div>
				<div class="form-group form-nobottom">
             	  <div class="col-sm-12">
             	  <!--<a href="/auth/forgot_password/" >Forgot your password?</a>-->
             	  <!--Add New-->
							<div class=logbtn>
								<span id="down-r1" class="text-primary" style="cursor: pointer;">Forgot your password?</span>
							</div>

                 

				  <!--End Add New-->
                  </div>
				</div>
                  
                  
                </div>
				
                <!-- end first col-sm-12-->
                
			  </div>
		
		</form>
  </div>
  </div>

  <!--Add New-->
  <div class="display-none forgot-panel panel panel-warning">
	  <div class="panel-heading"> <h3 class="panel-title text-white">ตั้งรหัสผ่านใหม่ (Reset Password)</h3></div>
	  <div class="panel-body">
	  <p class="text-grey">กรุณากรอกอีเมลที่ผูกกับบัญชีของคุณ เพื่อลิ้งค์สำหรับตั้งรหัสผ่านใหม่</p>
      <p class="text-grey">Enter the email address associated with your account, and we'll email you a link to reset your password.</p>
      <input class="btn-block input-forgot-email" placeholder="@">
 
	  <hr>
	  <button id="up-r1" type="button" style="cursor: pointer;" class="btn btn-block btn-turquoise"><a href="#" class"text-white">ส่งลิ๊งค์ตั้งรหัสผ่านใหม่</a></button>
	  </div>
  </div>

  <div class="display-none result-panel panel panel-turquoise">
	  <div class="panel-heading2"> <h3 class="panel-title text-white text-center">ลิ๊งค์สำหรับตั้งรหัสผ่านใหม่ได้ถูกส่งไปที่__@__แล้ว<a href="http://zhome.aofdev.com/"><span style="width:1px; margin:0px; padding:0;" class="glyphicon glyphicon-remove btn-xs text-grey pull-right" aria-hidden="true"></span></a></h3></div>
	
	  
  </div>

  <!--End Add New-->


</div>
</div>
 <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
 <script type="text/javascript" src="/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
 <script type="text/javascript">
       $('#myModal').modal(options);
  
 </script>
 <script type="text/javascript" language="javascript">
       $(document).ready(function() {
            $("#down-r1").click(function(){
               $(".login-panel").hide('fast', function(){});
               $(".forgot-panel").show('fast', function(){});      
            });
           
            $("#up-r1").click(function(){
               $(".login-panel").hide( 'fast', function(){});
               $(".forgot-panel").hide( 'fast', function(){});  
               $(".result-panel").show('fast', function(){});
            });
         });
 </script>

     
</body>
</html>