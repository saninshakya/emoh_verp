<?php
$this->session->set_userdata('POID','null');
$this->session->set_userdata('clickTel','null');
$this->session->set_userdata('referred_from', current_url());
$login = array(
  'name'  => 'login',
  'id'  => 'login',
  'value' => set_value('login'),
  'class' => 'form-control',
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
  'name'  => 'password',
  'id'  => 'password',
  'class' => 'form-control',
  'placeholder' => 'Password',
);
$remember = array(
  'name'  => 'remember',
  'id'  => 'remember',
  'value' => 1,
  'checked' => set_value('remember'),
);
$captcha = array(
  'name'  => 'captcha',
  'id'  => 'captcha',
  'maxlength' => 8,
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
<!--copy from signup_1-->
<?php
$login = array(
  'name'  => 'login',
  'id'  => 'login',
  'value' => set_value('login'),
  'class' => 'form-control',
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
  'name'  => 'password',
  'id'  => 'password',
  'class' => 'form-control',
  'placeholder' => 'Password',
);
$remember = array(
  'name'  => 'remember',
  'id'  => 'remember',
  'value' => 1,
  'checked' => set_value('remember'),
);
$captcha = array(
  'name'  => 'captcha',
  'id'  => 'captcha',
  'maxlength' => 8,
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
<!--end copy from signup_1-->

<!--copy from signup_email-->
<?php
$email = array(
  'name'  => 'email',
  'id'  => 'email',
  'value' => set_value('email'),
  'maxlength' => 80,
  'class' => 'form-control',
  'placeholder' => 'Email address',
);
$firstname = array(
  'name'  => 'firstname',
  'id'  => 'firstname',
  'value' => set_value('firstname'),
  'maxlength' => 20,
  'class' => 'form-control',
  'placeholder' => 'First Name',
);
$lastname = array(
  'name'  => 'lastname',
  'id'  => 'lastname',
  'value' => set_value('lastname'),
  'maxlength' => 20,
  'class' => 'form-control',
  'placeholder' => 'Last Name',
);
$password = array(
  'name'  => 'password',
  'id'  => 'password',
  'value' => set_value('password'),
  'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
  'class' => 'form-control',
  'placeholder' => 'Password',
);
$confirm_password = array(
  'name'  => 'confirm_password',
  'id'  => 'confirm_password',
  'value' => set_value('confirm_password'),
  'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
  'class' => 'form-control',
  'placeholder' => 'Confirm Password',
);
$captcha = array(
  'name'  => 'captcha',
  'id'  => 'captcha',
  'maxlength' => 8,
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
<!--end copy from signup_email-->

<html lang="en">
<head>
<meta name="keywords" content="<?=$keyword;?>">
<meta name="description" content="<?=$description;?>">
<meta name="author" content="ZmyHome">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:site_name" content="ZmyHome">
<meta property="og:image" content="<?=$imageOG;?>" />
<meta property="og:title" content="<?=$title;?>" />
<meta property="og:description" content="<?=$description;?>" />
<?php
$checkRobot=$this->usermenu->check_robot();
if ($checkRobot==1){
?>
    <a href="http://zmyhome.com/zhome/listallunit/sell" target="new">คอนโดขายทั้งหมด</a><br>
    <a href="http://zmyhome.com/zhome/listallunit/rent" target="new">คอนโดเช่าทั้งหมด</a><br>
<?
}
?>
<?php
$this->usermenu->inc_file('bootstrap-social.css','css');
$this->usermenu->inc_file('font-awesome.min.css','css');
$this->usermenu->inc_file('bootstrap.min.css','css');
$this->usermenu->inc_file('main.css','css');
$this->usermenu->inc_file('bootstrap-select.min.css','css');
$this->usermenu->inc_file('jquery.quickselect.css','css');
$this->usermenu->inc_file('bootstrap-datetimepicker.min.css','css');
if(isset($ipage)){
	$this->usermenu->inc_file('customUpImg.css','css');
}
//$this->usermenu->inc_file('custom.min.css','css');
$this->usermenu->inc_file('custom.css','css');
$this->usermenu->inc_file('jquery.cropbox.css','css');
//$this->usermenu->inc_file('qdev.css','css');
$this->usermenu->inc_file('datepicker.css','css');

$this->usermenu->inc_file('jquery-1.11.3.min.js','js');
$this->usermenu->inc_file('jquery-ui.min.js','js');
$this->usermenu->inc_file('bootstrap.min.js','js');
?>
<!--<link href="/css/loader.css" rel="stylesheet" />-->
<link rel="shortcut icon" href="/img/zmyhome.ico" >
<link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>
<script type="text/javascript">
  $('#loginModal').modal(options);
  $('#signupModal').modal(options);
  $('signupemailModal').modal(options);
</script>
<script type='text/javascript'>
function submit(){
	 document.getElementById('login').submit();
}
</script>
</head>

<body class="imgBG padding-left-clear">
<?php include_once("analyticstracking.php") ?>
<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-default header-fixed col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<div class="row">
						<!--<button type="button" class="navbar-toggle collapsed" style="padding-left:0; padding-right:5; margin-right:0; margin-left:0;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>-->
						<div class="zlogo pull-left" style="margin-left:5px;">
							<a href="/" class="hidden-xs"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
							<!--<a href="/" class="visible-xs"><img src="/img/zmyhome-web-logo-m.png" alt="ZmyHome" class="img-responsive"></a>-->
              <a href="/" class="visible-xs hidden-sm hidden-md hidden-lg padding-t4"><img src="/img/zmyhome-web-logo-m.png" alt="ZmyHome" class="img-responsive hidden-sm hidden-md hidden-lg "></a>
						</div>
						<div class="pull-left padding-t1">
							<span class="navbar-brand-menu"><a href="#" class="text-white" onclick="showSignup();">Sign Up</a>&nbsp;<span class="text-white">|</span>&nbsp;<a href="#" class="text-white" onclick="showLogin();">Log In</a></span>
						</div>
						<div class="pull-right">
							<button type="button" class="navbar_button navbar-toggle btn btn-default btn-lg collapsed clear-margin-padding" style="padding:13px 10px 0px 0px;margin-right:15px; margin-left:4px;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" onclick="$('.navbar_icon').toggle();">
								<span class="navbar_icon glyphicon glyphicon-menu-hamburger text-white padding-none" style="font-size:1.25em;"></span>
								<span class="navbar_icon glyphicon glyphicon-remove text-white display-none" style="font-size:1.25em;"></span>
							</button>
						</div>
						<ul class="nav navbar-nav navbar-right padding-none visible-xs visible-sm pull-right">
							<li class="pull-right">&nbsp;</li>
							<!--<li class="pull-right"><button class="form-control input-sm margin-t10 no-border"><a href="#" style="padding-bottom:3px;" class="text-orange2 font16" onclick="showSignup();">ลงประกาศ</a></button></li>-->
							<li class="pull-right padding-t7" style="width:auto;"><a href="#" class="text-white padding-none" onclick="showLogin();">ลงประกาศ</a></li>
							<li class="pull-right padding-t7" style="width:auto;"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS_อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหา</a></li>
						</ul>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="pull-right hidden-xs hidden-sm margin-left5"><a href="#" class="text-white padding-none" onclick="showLogin();">ลงประกาศ</a></li>
						<li class="pull-right padding-none padding-r15m hidden-xs hidden-sm"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS_อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหาคอนโด</a></li>
						<li class="padding-t2m"> <a style="" class="text-white" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
						<li class=""><a class="padding20m1 text-white" href="http://line.me/ti/p/%40zmyhome" target="_blank">LINE</a></li>
						<!--<li class="dropdown">
							<a href="#" style="padding-top:13px;" class="dropdown-toggle pull-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ช่วยเหลือ&nbsp;<span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdownMenu1">
							<li><a href="http://blog.zmyhome.com" target="_blank">Blog</a></li>			
							</ul>
						</li>-->
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		<div class="margin-t50 padding-0 height-0"></div>
	</div>

<!-- loginModal-->
<div id="loginModal" class="modal modal-sm3 fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="height:auto; min-height:485px;">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-left"><h4 class="modal-title text-white">เข้าสู่ระบบเพื่อใช้งาน</h4></div>
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
			</div>
			<!--new-->
			<!-- start first col-sm-12-->
			<div class="col-sm-12">
				<!--<div class="col-sm-12 padding-left-clear padding-right-clear"><h5>เข้าสู่ระบบแบบไม่ต้องจำรหัสผ่าน</h5></div>-->
				<br>
				<a id="facebook_login" href="/auth_oa2/session/facebook" class="btn btn-block btn-social btn-facebook btn-z"><i class="fa fa-facebook margin-t5"></i>เข้าสู่ระบบด้วย Facebook</a>
				<div class="clearfix margin-t10"></div>
				<a id="google_login" href="/auth_oa2/session/google" class="btn btn-block btn-social btn-google btn-z"><i class="fa fa-google margin-t5"></i>เข้าสู่ระบบด้วย Google</a>
				<!--<a href="/auth_oa2/session/line" class="btn btn-block btn-social btn-line"><i class="line"></i>ล็อกอินด้วย LINE</a>-->
				<br>
				<div class="form-group">
					<div class="col-sm-12 padding-left-clear padding-right-clear"><div class="signup-or"><span class="signup-or-text">หรือ</span></div></div>
				</div>
				<div class="col-sm-12 padding-left-clear padding-right-clear padding-t10"><h5>เข้าสู่ระบบด้วยอีเมลล์</h5></div>
				<?php echo form_open('/auth/login/',array('id'=>'login','name'=>'login')); ?>
					<div class="form-group">
						<div class="col-sm-12 has-feedback padding-left-clear padding-right-clear">
							<i class="fa fa-at form-control-feedback"></i>
							<input type="text" id="user_login" name="login" class="form-control input-z col-md-12 col-xs-12" placeholder="Email Login">
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group padding-t5">
						<div class="col-sm-12 has-feedback padding-left-clear padding-right-clear">
							<i class="fa fa-lock form-control-feedback"></i>
							<input type="password" id="password_login" name="password" class="form-control input-z col-md-12 col-xs-12" placeholder="Password" onchange="checkLoginPassword();">
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="margin-t10">     
						<div class="col-md-12 col-xs-12 padding-left-clear">
								<div class="pull-left padding-t2"><?php echo form_checkbox($remember); ?></div>
								<div class="text-under-socialbtn pull-left">จำรหัสผ่าน</div>
						</div>
					</div>
					<div class="clearfix margin-t10"></div>
					<div class="form-group">
						<div class="col-sm-12 padding-left-clear padding-right-clear padding-t10">
							<a href="#" class="btn btn-block btn-signup" onclick="$('#login').submit();">OK</a>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
				<div class="form-group form-nobottom">
					<div class="col-sm-12 padding-left-clear padding-right-clear padding-t10" style="margin-top:5px;">
						<a href="#" class="text-blue padding-t10" style="cursor: pointer;" onclick="showSignup();"><u>ยังไม่เป็นสมาชิกคลิกที่นี่เพื่อลงทะเบียน</u></a>
					</div>
					<div class="col-sm-12 padding-left-clear padding-right-clear padding-t5" style="margin-top:5px;">
                        <a href="/auth/forgot_password/" class="text-grey" style="cursor: pointer;" ><u>ลืมรหัสผ่านคลิกที่นี่</u></a>
					</div>
				</div>
			</div>
			<!-- end first col-sm-12-->
			<!--end--> 
		</div>
	</div>
</div>
<!-- end login Modal-->

<!-- signup email Modal-->
<div id="signupemailModal" class="modal modal-sm3 fade modal-open" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="height:480px;padding-top:5px;">
			<div class="modal-header" style="padding-bottom: 0px!important;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button>
				<h4 class="modal-title">ลงทะเบียนด้วยอีเมลล์</h4>
			</div>
			<!--new-->
    
			<?php echo form_open('/auth/register/',array('id'=>'register','name'=>'register')); ?>
            <div class="form-group">
				<div class="col-md-12 col-xs-12 has-feedback">
					<i class="glyphicon glyphicon-user form-control-feedback margin-r10"></i>
					<input type="text" id="firstname" name="firstname" class="form-control input-z" placeholder="ชื่อ / First Name" maxlength="20">
				</div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-xs-12 has-feedback margin-t10">
					<i class="glyphicon glyphicon-user form-control-feedback margin-r10"></i>
					<input type="text" id="lastname" name="lastname" class="form-control input-z" placeholder="นามสกุล / Last Name" maxlength="30">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-xs-12 has-feedback margin-t10">
					<i class="fa fa-at form-control-feedback margin-r10"></i>
                    <input type="text" id="email" name="email" class="form-control input-z" placeholder="อีเมล์ / Email" maxlength="40" onchange="checkEmail($(this).val());">
                </div>
            </div>
            <div class="form-group">
				<div class="col-md-12 col-xs-12 has-feedback margin-t10">
					<i class="fa fa-lock form-control-feedback margin-r10"></i>
					<input type="password" id="password" name="password" class="form-control input-z" placeholder="รหัส / Password" maxlength="20">
				</div>
            </div>
            <div class="form-group">
				<div class="col-md-12 col-xs-12 has-feedback margin-t10">
                    <i class="fa fa-lock form-control-feedback margin-r10"></i>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control input-z" placeholder="ยืนยันรหัส / Confirm Password" maxlength="20" onchange="checkPassword();">
				</div>
            </div>
            <div class="form-group">
				<div class="col-md-12 col-xs-12 margin-t10">
					<div class="pull-left padding-t2"><input type="checkbox"></div>
					<div class="text-under-socialbtn pull-left">I’d like to receive coupons and news.</div>
				</div>
            </div>
            <div class="form-group"></div>
            <div class="form-group">
				<div class="col-md-12 col-xs-12 margin-t10">
					<div class="text-under-socialbtn">
						By clicking “Sign up” you confirm that you accept the Term of Service and Privacy Policy.
					</div>
				</div>
				<!-- end first col-sm-12-->
            </div>
			<div id="showAlert" class="form-group display-none">
				<div class="col-md-12 col-xs-12 margin-t10">
					<span id="showTxtAlert" class="text-danger"></span>
				</div>
			</div>
			<div class="form-group">
                <div class="col-md-12 col-xs-12 margin-t10">
					<a href="#" class="btn btn-block btn-signup" onclick="submit();">Sign up</a>
                </div>
			</div>
			</form>
			<!--end--> 
		</div>
	</div>
</div>
<!-- end signup email Modal-->

<div id="signupModal" class="modal modal-sm3 fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="height:auto; min-height:200px;">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-left"><h4 class="modal-title text-white">ลงทะเบียน</h4></div>
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
			</div>
			<?//php echo form_open($this->uri->uri_string(), array('class'=>'form-horizontal','id'=>'login','name'=>'login')); ?>
			<div class="form-group">
				<div class="col-sm-12">
					<br>
					<a href="/auth_oa2/session/facebook" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i>ลงทะเบียนด้วย Facebook</a>
					<div class="clearfix margin-t10"></div>
					<a href="/auth_oa2/session/google" class="btn btn-block btn-social btn-google"><i class="fa fa-google"></i>ลงทะเบียนด้วย Google</a>
					<!--<a href="/auth/register/" class="display-none btn btn-social btn-block btn-signupEmail"><span class="glyphicon glyphicon-envelope"></span> ลงทะเบียนด้วยอีเมลล์</a>
          <div class="clearfix margin-t10"></div>
					<a href="#" class="btn btn-social btn-block btn-signupEmail" onclick="showSignupEmail();"><span class="glyphicon glyphicon-envelope"></span> ลงทะเบียนด้วยอีเมลล์</a>-->
					<div class="clearfix"></div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function checkEmail(email){
	$.ajax({
		type:'POST',
		url:'/zhome/checkSignupEmail',
		data:{email:email},
		dataType:'html',
		success:function(data){
			if(data==1){
				$('#showTxtAlert').text('Email: '+email+' นี้มีการใช้งานแล้ว');
				$('#showAlert').removeClass('display-none');
				$('#email').val('');
			}else{
				$('#showTxtAlert').text('');
				$('#showAlert').addClass('display-none');
			}
		}
	});
}

function checkLoginPassword(){
	var user_id=$('#user_login').val();
	var password=$('#password_login').val();
	$.ajax({
		type:'POST',
		url:'/zhome/checkLoginPassword',
		data:{user_id:user_id,password:password},
		dataType:'html',
		success:function(data){
			if(data==1){
				$('#showTxtAlert').text('Password ไม่ถูกต้อง');
				$('#showAlert').removeClass('display-none');
				$('#email').val('');
			}else{
				$('#showTxtAlert').text('');
				$('#showAlert').addClass('display-none');
			}
		}
	});
}

function showSignup(){
	$('#signupemailModal').modal('hide');
	$('#loginModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
	$('#signupModal').modal('show');
}

function showSignupEmail(){
	$('#signupModal').modal('hide');
	$('#loginModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
	$('#signupemailModal').modal('show');
}

function showLogin(){
	$('#signupemailModal').modal('hide');
	$('#signupModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
	$('#loginModal').modal('show');
	$('.modal-title').text('เข้าสู่ระบบเพื่อใช้งาน');
	$('#facebook_login').attr('href', '/auth_oa2/session/facebook');
	$('#google_login').attr('href', '/auth_oa2/session/google');
}

function checkPassword(){
	if($('#confirm_password').val()==''){
		$('#showTxtAlert').text('');
		$('#showAlert').addClass('display-none');
		//$('#confirm_password').attr('placeholder','ยืนยันรหัส / Confirm Password');
	}
	if($('#confirm_password').val()!=$('#password').val()){
		$('#showTxtAlert').text('รหัสยืนยันไม่ถูกต้อง กรุณาตรวจสอบ');
		$('#showAlert').removeClass('display-none');
		//$('#confirm_password').attr('placeholder','Re Confirm Password').val('').focus();
	}
}

function submit(){
	if($('#firstname').val()=='' || $('#lastname').val()=='' || $('#email').val()=='' || $('#password').val()=='' || $('#confirm_password').val()==''){
		if($('#firstname').val()==''){var txt_alert='กรุณาระบุชื่อ';$('#firstname').focus();}
		else if($('#lastname').val()==''){var txt_alert='กรุณาระบุนามสกุล';$('#lastname').focus();}
		else if($('#email').val()==''){var txt_alert='กรุณาระบุ Email';$('#email').focus();}
		else if($('#password').val()==''){var txt_alert='กรุณาระบุ Password';$('#password').focus();}
		else if($('#confirm_password').val()==''){var txt_alert='กรุณาระบุ Confirm Password';$('#confirm_password').focus();}
		$('#showTxtAlert').text(txt_alert);
		$('#showAlert').removeClass('display-none');
	}else{
		$('#showAlert').addClass('display-none');
		$('#register').submit();
	}
}

$(".close").click(function(){
  $("#signupemailModal").hide();
});
</script>

<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>

<script type="text/javascript"> 
$('.datepicker').datepicker();
</script>

