<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class'	=> 'form-control',
	'placeholder' => 'Email address',
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
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>ZHome | Buy or Rent Your Home by Owner Directly</title>
	
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
   
</head>

<body class="imgBG">
	
	<div class="container popup-signup">
    <div class="col-md-offset-4 col-md-4">
    <div class="panel panel-default">
  
  <div class="panel-body">
    	<form class="form-horizontal">
              <div class="form-group">
                <!-- start first col-sm-12-->
                <div class="col-sm-12">
                    <div class="text-under-socialbtn">
						<h1>Reset Password</h1>
						<?php echo $error_message; ?>
						<?php echo form_open($this->uri->uri_string(), array('class'=>'form-horizontal theme-signup-color')); ?>
							<?php echo form_label($login_label, $login['id']); ?>
							<?php echo form_input($login); ?>

							<div class="logbtn resetbtn_margin">
								<button type="submit" id="loginBtn" class="nice radius button white">Reset Password</button>
							</div>
						</form>
					</div>
				</div>
			   </div>
				 <div class="form-group">
             	   <div class="col-sm-12">
             	     <a href="/" class="btn btn-block btn-signup">Back to ZmyHome</a>
                   </div>
                 </div>
		</form>
               </div>		
  </div>
</div>
</div>
</div>


	
     <script type="text/javascript" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
