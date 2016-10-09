<?php
$this->session->set_userdata('POID','null');
$this->session->set_userdata('clickTel','null');
$this->session->set_userdata('referred_from', current_url());
?>
<html lang="en">
<head>
<meta name="keywords" content="<?=$keyword;?>">
<meta name="description" content="<?=$description;?>">
<meta name="author" content="ZmyHome">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

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

$this->usermenu->inc_file('jquery-1.11.3.min.js','js');
$this->usermenu->inc_file('bootstrap.min.js','js');
$this->usermenu->inc_file('bootstrap-datepicker.js','js');
$distance_length=3000;
?>
<link rel="shortcut icon" href="/img/zmyhome.ico" >
<link rel="icon" href="/img/animated_zmyhome.gif" type="image/gif" >
<title><?=$title;?></title>

</head>

<body class="imgBG">
<?php include_once("analyticstracking.php") ?>
<nav id='header-navbar' class="navbar navbar-default fixed"> 
	<div class="container-fluid bg-orange-hd-mobile">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<div class="row">
				<div class="zlogo pull-left hidden-xs" style="margin-left:5px;">
					<a href="/" class="hidden-xs padding-t10"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
					<a href="/" class="visible-xs padding-t4"><img src="/img/zmyhome-web-logo-m.png" alt="ZmyHome" class="img-responsive"></a>
				</div>
				<div class="pull-left hidden-sm hidden-xs" style="padding:15px 0px 0px 15px;">
					<span class="hidden-xs hidden-sm"><a href="#" class="text-white" onclick="showSignup();">Sign Up</a>&nbsp;<span class="text-white">|</span>&nbsp;<a href="#" class="text-white" onclick="showLogin();">Log In</a></span>
				</div>
				<!--<div class="col-xs-2 visible-xs visible-sm">
					<button type="button" class="navbar-toggle collapsed pull-left padding-l15" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>-->
				<div class="col-xs-2 visible-xs">
					<button type="button" class="navbar_button navbar-toggle btn btn-default btn-lg collapsed pull-left clear-margin-padding" style="padding:12px 0px 0px 18px;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="navbar_icon glyphicon glyphicon-menu-hamburger text-white padding-none" style="font-size:20px;"></span>
						<span class="navbar_icon glyphicon glyphicon-remove text-white display-none"></span>
					</button>
				</div>
				<div class="col-sm-1 visible-sm padding-t2 border-red">
					<div class="btn-group pos-rlt text-white font16 margin-t10">
						<button type="button" class="button-distance btn dropdown-toggle padding-none padding-t2 font16" style="background-color:#f36b22;color:#FFFFFF;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ระยะห่าง <span class="caret"></span>
						</button>
						<ul class="dropdown-menu bg-orange-hd font16" style="z-index:10001;">
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="500" <?if($distance_length==500){echo "checked";}?> data-checkbox-text="0.5 km"> 0.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="1000" <?if($distance_length==1000){echo "checked";}?> data-checkbox-text="1.0 km"> 1.0 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="1500" <?if($distance_length==1500){echo "checked";}?> data-checkbox-text="1.5 km"> 1.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="3000" <?if($distance_length==3000){echo "checked";}?> data-checkbox-text="3.0 km"> 3.0 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="5000" <?if($distance_length==5000){echo "checked";}?> data-checkbox-text="5.0 km"> 5.0 km</label></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-1 visible-sm text-white font16 margin-t13 padding-t2">จาก</div>

				<div class="col-xs-8 col-sm-7 visible-xs visible-sm padding-t10 padding-left-clear">
					<div class="input-group" style="padding-right:10px">  
						<input type="text" value="" id="iRefPlace_mb" name="iRefPlace_mb" placeholder="รถไฟฟ้า, โครงการ, สถานที่สำคัญ" autocomplete="off" class="form-control pull-left visible-sm visible-xs pull-left font16 w100" style="z-index: 10000">
						<span class="input-group-btn">
							<button class="btn bg-white padding-t6 padding-b6" type="button" onclick="$('#iRefPlace_mb').val('');"><span class="glyphicon glyphicon-remove text-grey2" aria-hidden="true"></span></button>
						</span>
					</div>
				</div>
				<div class="col-sm-1 visible-sm">
					<button type="button" class="navbar_button navbar-toggle btn btn-default btn-lg collapsed" style="padding:5px 0px 0px 20px;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="navbar_icon glyphicon glyphicon-menu-hamburger text-white padding-none" style="font-size:1.25em;"></span>
						<span class="navbar_icon glyphicon glyphicon-remove text-white display-none"></span>
					</button>
				</div>
				<div class="col-xs-2 visible-xs padding-t10">
					<button id="show_list-btn" type="button" class="btn pull-right text-white   padding-t4 display-none" style="background-color: #f36b22;"><h5 class="text-white clear-margin-padding" style="margin:0px 0px 0px 20px;padding:0px 0px 0px 20px;">ดูลิสต์</h5>
					</button>
					<button id="show_map-btn" type="button" class="btn pull-right text-white   padding-t4" style="background-color: #f36b22;"><h5 class="text-white clear-margin-padding" style="margin:0px 0px 0px 20px;padding:0px 0px 0px 20px;">แผนที่</h5>
					</button>
				</div>
			</div>    
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<!--<div class="row">-->
			<div class="collapse navbar-collapse pull-right-m" id="bs-example-navbar-collapse-1" style="z-index: 10002; border:0px;" on>
				<ul class="nav navbar-nav navbar-right padding-none" style="z-index: 10002">
					<li class="padding-none z-index-top visible-xs">
						<a href="/" class="hidden-xs padding-t10"><img src="/img/zmyhome-web-logo.png" alt="ZmyHome" class="img-responsive"></a>
						<a href="/" class="visible-xs padding-t4 pull-left"><img src="/img/zmyhome-web-logo-m.png" alt="ZmyHome" class="img-responsive"></a>
					</li>
					<li class="clearfix"></li>
					<li class="padding-none  padding-t6"><a style="padding-top:13px;" class="text-white" href="http://blog.zmyhome.com" target="_blank">Blog</a></li>
					<li class="padding-none  padding-t4"><a class="line-link text-white" href="http://line.me/ti/p/%40zmyhome" target="_blank">LINE</a></li>
					<li class="padding-none visible-xs visible-sm"><a href="#" class="text-white" onclick="showSignup();">Sign Up</a></li>
					<li class="padding-none  visible-xs visible-sm"><a href="#" class="text-white" onclick="showLogin();">Log In</a></li>
					<li class="margin-right5 padding-t4"><a href="#" class="text-white" style="z-index: 10002" onclick="showLogin();">ลงประกาศ</a></li>
					<li class="padding-none visible-xs visible-sm">&nbsp;</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		<!---</div>-->
	</div><!-- /.container-fluid -->
 
</nav>
<div class="margin-t50 padding-0 height-0 hidden-xs hidden-sm"></div>
<div class="container-fluid lunderNav display-none">
    <ul class="list-inline"></ul>
</div>

<!-- loginModal-->
<div id="loginModal" class="modal modal-sm3 fade z-index-top" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="height:465px;padding-top:0px;">
			<div class="modal-header bg-blue" style="padding:5px 15px;">
				<div class="pull-left"><h4 class="modal-title text-white">เข้าสู่ระบบเพื่อใช้งาน</h4></div>
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
			</div>
			<!--new-->
			<!-- start first col-sm-12-->
			<div class="col-sm-12">
				<!--<div class="col-sm-12 padding-left-clear padding-right-clear"><h5>เข้าสู่ระบบแบบไม่ต้องจำรหัสผ่าน</h5></div>-->
				<br>
			
				<a id="facebook_login" href="/auth_oa2/session/facebook" class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i>เข้าสู่ระบบด้วย Facebook</a>
				<div class="clearfix margin-t10"></div>
				<a id="google_login" href="/auth_oa2/session/google" class="btn btn-block btn-social btn-google"><i class="fa fa-google"></i>เข้าสู่ระบบด้วย Google</a>
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
					<div class="col-sm-12 padding-left-clear padding-right-clear padding-t10" style="margin-top:10px;">
						<!--<a href="#" class="text-primary padding-t10" style="cursor: pointer;" onclick="showSignup();">"สมัครสมาชิก" ถ้าไม่เคย Signup?</a><br><br>-->
                        <a href="/auth/forgot_password/" class="text-grey" style="cursor: pointer;" >ลืมรหัสผ่านคลิกที่นี่</a>
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
<div id="signupemailModal" class="modal modal-sm3 fade modal-open z-index-top" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="height:467px;padding-top:5px;">
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

<div id="signupModal" class="modal modal-sm3 fade z-index-top" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="height:180px;padding-top:5px;">
			 <div class="modal-header" style="padding-bottom: 10px!important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button>
        <h4 class="modal-title">ลงทะเบียน</h4>
      </div>
			<?//php echo form_open($this->uri->uri_string(), array('class'=>'form-horizontal','id'=>'login','name'=>'login')); ?>
			<div class="form-group">
				
				<div class="col-sm-12">
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

function showSignup(){
	$('#signupModal').modal('show');
	$('#signupemailModal').modal('hide');
	$('#loginModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
	$('.navbar_button').click();
	$('.navbar_icon').toggle();
}

function showSignupEmail(){
	$('#signupemailModal').modal('show');
	$('#signupModal').modal('hide');
	$('#loginModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
}

function showLogin(){
	$('#loginModal').modal('show');
	$('#signupemailModal').modal('hide');
	$('#signupModal').modal('hide');
	$('#checklogin').modal('hide');
	$('#checklogin2').modal('hide');
	$('.modal-title').text('เข้าสู่ระบบเพื่อใช้งาน');
	$('#facebook_login').attr('href', '/auth_oa2/session/facebook');
	$('#google_login').attr('href', '/auth_oa2/session/google');
	$('.navbar_button').click();
	$('.navbar_icon').toggle();
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



</script>