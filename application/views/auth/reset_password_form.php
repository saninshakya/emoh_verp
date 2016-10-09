<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>ZmyHome | Buy or Rent Your Home by Owner Directly</title>
	
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap-select.min.css" rel="stylesheet">
<link href="/css/custom.css" rel="stylesheet">

   
</head>
<body class="log-in-bg" style="overflow:hidden;">

   <br><br><br>
   <div class="row col-md-offset-1">
    <div class="col-md-offset-4 col-md-3 col-xs-10 col-xs-offset-1">
	<?php echo form_open($this->uri->uri_string()); ?>  
	    <div class="panel panel-warning">
		  <div class="panel-heading"> 
		    <h3 class="panel-title text-white">ตั้งรหัสผ่านใหม่ (Reset Password)</h3>
		  </div>
		    <div class="panel-body">
			 <input type="password" name="new_password" value="" id="new_password" maxlength="20" size="30"  class="btn-block" placeholder="กรอกรหัสผ่านใหม่" /><br>
			 <input type="password" name="confirm_new_password" value="" id="confirm_new_password" maxlength="20" size="30"  class="btn-block" placeholder="ยืนยันรหัสผ่านใหม่" /><br>
			  <button name="change" type="submit" id="loginBtn" style="cursor: pointer;" class="btn btn-block btn-turquoise"><a class"text-white">บันทึกและยืนยัน</a></button>
			  <br>
			  <p class="text-grey">การ "บันทึกและยืนยัน เป็นการตกลงว่าคุณ ยอมรับ<span class="text-red">เงื่อนไขการใช้บริการ"</span>และ<span class="text-red">"นโยบายความเป็นส่วนตัว"</span></p>
		      <br>
		      <p class="text-grey">By clicking "Save & Continue" you confirm that you accept the <span class="text-red">Term of Service </span> & <span class="text-red">Pri-vacy Policy</span>.</p>
		  
		  </div>
      </div>
	</form>
 <br><br><br><br><br><br><br><br><br><br>


 </div>
</div>

</body></html>