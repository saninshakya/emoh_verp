<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class'	=> 'small input-text',
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}

$error_message = '';
if( form_error($login['name']) !=''){
$error_message = "<small class=\"error\">".str_replace("Login field", "Email field", form_error($login['name']) )."</small>";
}

if(isset($errors[$login['name']])){
$error_message .= "<small class=\"error\">".str_replace("Login", "Email", $errors[$login['name']] )."</small>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Language" content="en-us"/>
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta http-equiv="imagetoolbar" content="no"/>

<title>ZmyHome | Buy or Rent Your Home by Owner Directly</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" >
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/custom.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" > 

</head>
<body  class="log-in-bg">
	<div class="container popup-signup">
    <div class="col-md-offset-4 col-md-4">

	<div class="form-group">
		<div class="row">
			<div>
				<div class="login-window">

<!--
						<h1>Reset Password</h1>
					</div>
					
					<?php echo $error_message; ?>

					<div class="form-group">

						<?php echo form_open($this->uri->uri_string(), array('class'=>'nicely')); ?>
						<div class="form-group">
							<?php echo form_label($login_label, $login['id']); ?>
							<?php echo form_input($login); ?>
						</div>
						<div class="logbtn">
								<button type="submit" id="loginBtn" class="btn btn-warning btn-block">Reset Password</button>
							</div>
						</form>
-->
						<form action="/index.php/auth/forgot_password" class="nicely" method="post" accept-charset="utf-8">
<!--
						<div class="form-group">
							<label for="login">Email</label>							
							<input type="text" name="login" value="" id="login" maxlength="80" class="small input-text"  />
						</div>
						<div class="logbtn">
								<button type="submit" id="loginBtn" class="btn btn-warning btn-block">Reset Password</button>
						</div>
-->
	  <div class="forgot-panel panel panel-warning">
	  <div class="panel-heading"> <h3 class="panel-title text-white">ตั้งรหัสผ่านใหม่ (Reset Password)</h3></div>
	  <div class="panel-body ">
	  <p class="text-grey">กรุณากรอกอีเมลที่ผูกกับบัญชีของคุณ เพื่อลิ้งค์สำหรับตั้งรหัสผ่านใหม่</p>
      <p class="text-grey">Enter the email address associated with your account, and we'll email you a link to reset your password.</p>
	  <input type="text" name="login" value="" id="login" class="btn-block input-forgot-email" placeholder="@"  />
      <hr>
	  <button type="submit" id="loginBtn" style="cursor: pointer;" class="btn btn-block btn-turquoise"><a class="text-white">ส่งลิ๊งค์ตั้งรหัสผ่านใหม่</a></button>
	  </div>
	  </div>						
	  </form>


				</div>


			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>