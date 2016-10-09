<html>
<head>
	<title>ZmyHome</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<style type="text/css">
@font-face {
  font-family: 'RSU';
  src: url('http://www.zmyhome.com/fonts/RSU_Regular.eot'); /* IE9 Compat Modes */
  src: url('http://www.zmyhome.com/fonts/RSU_Regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
       url('http://www.zmyhome.com/fonts/RSU_Regular.woff2') format('woff2'), /* Super Modern Browsers */
       url('http://www.zmyhome.com/fonts/RSU_Regular.woff') format('woff'), /* Pretty Modern Browsers */
       url('http://www.zmyhome.com/fonts/RSU_Regular.ttf')  format('truetype'), /* Safari, Android, iOS */
       url('http://www.zmyhome.com/fonts/RSU_Regular.svg#svgFontName') format('svg'); /* Legacy iOS */
  font-weight: normal;
  font-style: normal;
}

html{
	font-family:'RSU',serif;
	
}
body{
	font-family:'RSU',sans-serif,serif,Helvetica;
}
</style>
</head>
<body style="color:#818285; padding:50px; font-size:20px;">
<br><br>

<table>
	<tr>
	  <td width="20%"></td>
	  <td width="60%">
	  	
	  	<div align="center"><a href="http://www.zmyhome.com"><img src="https://s3-ap-southeast-1.amazonaws.com/zmyhome/email/zmyhome-logo.png"></a></div><br/><br/>
<div>สวัสดีคุณ <?php if (strlen($email) > 0) { ?> <?php echo $email; ?><?php } ?></div><br/><br/>
<div>เพื่อยืนยันการใช้อีเมลล์ของคุณลงทะเบียนกับ ZmyHome  กรุณากดปุ่มยืนยันด้านล่าง</div>
<br/><br/>
<div align="center">
   <div style="background-color:#f8a234;color:#ffffff;text-align:center; padding:10px;width:50%"><h3 style="color:#ffffff; padding:0; margin:0;"> <a href="<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>" style="color:#ffffff; text-decoration:none;">คลิกที่นี่เพื่อยืนยัน</a> </h3></div>
</div>
<br/><br/>
<div>ขอบคุณ</div>
<br/><br/>
<div>ทีมงาน ZmyHome</div>
<br/><br/>
<div align="center">
  <div style="margin-left: auto; margin-right: auto; width: 10em;">
    <a href="http://www.facebook.com/zmyhome" target="_blank"><img src="https://s3-ap-southeast-1.amazonaws.com/zmyhome/email/fb-icon.png"></a> <a href="https://plus.google.com/108343048089119098219" target="_blank"><img src="https://s3-ap-southeast-1.amazonaws.com/zmyhome/email/gg-icon.png"></a>
    <a href="http://line.me/ti/p/%40zmyhome" target="_blank"><img src="https://s3-ap-southeast-1.amazonaws.com/zmyhome/email/line-icon.png"></a>
    <a href="https://twitter.com/zmyhome" target="_blank"><img src="https://s3-ap-southeast-1.amazonaws.com/zmyhome/email/twitter-icon.png"></a>
  </div>
</div>
<div style="clear:both;"></div>
<br>
<div align="center" style="margin-right:10px;">ส่งโดย ZmyHome HQ</div>
    </td>
    <td width="20%"></td>
  </tr>
</table>
</body>
</html>