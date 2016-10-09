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
<!-- 
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" >

<link rel="stylesheet" type="text/css" href="/css/jquery.quickselect.css" />
<?php if(isset($ipage)){ ?>
	<link href="/css/customUpImg.css" rel="stylesheet">
<link href="/css/custom.css" rel="stylesheet">
<?php }else{ ?>
<link href="/css/custom.css" rel="stylesheet">
<?php } ?>
<link type="text/css" media="screen" rel="stylesheet" href="/css/jquery.cropbox.css">
-->
<?php
$this->usermenu->inc_file('bootstrap-social.css','css');
$this->usermenu->inc_file('font-awesome.min.css','css');
$this->usermenu->inc_file('bootstrap.min.css','css');
$this->usermenu->inc_file('main.css','css');
$this->usermenu->inc_file('bootstrap-select.min.css','css');
$this->usermenu->inc_file('jquery.quickselect.css','css');
if(isset($ipage)){
	$this->usermenu->inc_file('customUpImg.css','css');
}
//$this->usermenu->inc_file('custom.min.css','css');
$this->usermenu->inc_file('custom.css','css');
$this->usermenu->inc_file('jquery.cropbox.css','css');
//$this->usermenu->inc_file('qdev.css','css');
$this->usermenu->inc_file('datepicker.css','css');
?>
<!--<link href="/css/loader.css" rel="stylesheet" />-->
<link rel="shortcut icon" href="/img/zmyhome.ico" >
<link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>
<script type="text/javascript">
  $('#loginModal').modal(options);
</script>
<script type='text/javascript'>
function submit(){
	 document.getElementById('login').submit();
}
</script>
</head>

<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<nav class="navbar navbar-default fixed">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
  
    
    <div class="navbar-header">
      
      <button type="button" style="padding-left:0; padding-right:5; margin-right:0; margin-left:0;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>
   <div class="zlogo pull-left" style="padding-left:5px;">
       <a href="/" class="hidden-xs"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
       <a href="/" class="visible-xs"><img src="/img/zmyhome-web-logo-m.png" alt="ZmyHome" class="img-responsive"></a>
   </div>

      <ul class="nav navbar-nav padding-none visible-xs visible-sm pull-left margint-r9 " style="width:80%">
        <li class="pull-left padding-t4" style="width:auto;"><a href="#" class="text-white"  data-toggle="modal" data-target="#loginModal">Sign Up</a></li>
        <li class="pull-left padding-t4 text-white margin-t8" style="width:auto;">|</li>
        <li class="pull-left padding-t4" style="width:auto;"><a href="/auth/login/" class="text-white">Log In</a></li>
        <li class="pull-right padding-t4" style="width:auto;"><a href="/auth/login2/" class="text-white padding-none">ลงประกาศ</a></li>
        <li class="pull-right padding-t4" style="width:auto;"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS-อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหา</a></li>
       

      </ul>
  
   
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <span class="navbar-brand-menu hidden-xs hidden-sm"><a href="#" class="text-white"  data-toggle="modal" data-target="#loginModal">Sign Up</a>&nbsp;<span class="text-white">|</span>&nbsp;<a href="/auth/login/" class="text-white">Log In</a></span>

   <ul class="nav navbar-nav navbar-right padding-none">
        <li class="btn-p2 pull-right hidden-xs hidden-sm margin-left5"><a href="/auth/login2/" class="btn-prakard">ลงประกาศ</a></li>
        <li class="pull-right padding-none padding-r15m hidden-xs hidden-sm"><a class="text-white padding-none" href="/Zhome/searchResult/0/BTS-อนุสาวรีย์ชัย/0/0/3000/1-2-/1-/0/0/0/1-0-/0">ค้นหาคอนโด</a></li>
        <li class="pull-right padding-t2m"><a class="padding20m1" href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="/img/line-contact.png" alt="Line Contact"></a></li>
				<li class="pull-right"> <a style="" class="text-white" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
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
<!-- under nav -->	
  <div class="container-fluid lunderNav display-none">
    <ul class="list-inline">
<!--        <li><a href="/zhome/searchResult">ค้นหาประกาศ</a></li>
-->
    </ul>
</div><!-- end under nav-->



<div id="loginModal" class="modal modal-sm3 fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="height:31vh;padding-top:5px;">
    <button type="button" class="close" style="margin:0;padding:0 5px 0px 0px" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" class="input-md"><big>&times;</big></span></button>

			<?//php echo form_open($this->uri->uri_string(), array('class'=>'form-horizontal','id'=>'login','name'=>'login')); ?>
			<div class="form-group">
        <div class="col-sm-12"><h5>ลงทะเบียน</h5></div>
				<div class="col-sm-12">
					<a href="/auth_oa2/session/facebook" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i>ลงทะเบียนด้วย Facebook</a>
					<a href="/auth_oa2/session/google" class="btn btn-block btn-social btn-google"><i class="fa fa-google"></i>ลงทะเบียนด้วย Google</a>
          <a href="/auth/register/" class="btn btn-social btn-block btn-signupEmail"><span class="glyphicon glyphicon-envelope"></span> ลงทะเบียนด้วยอีเมลล์</a>

					
          <div class="clearfix"></div>
		
         
				
				</div>
			</div>
		</div>
	</div>
</div>