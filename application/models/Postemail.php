<?php
class Postemail extends CI_Model {

    function __construct()
	{
         // Call the Model constructor
         parent::__construct();
	}

	public function get_email_from_userid($user_id)
	{
		$result=$this->db->query('Select email from users where id="'.$user_id.'"');
		$row=$result->row();
		$email=$row->email;
		$findme="facebook|";
		$pos=strpos($email,$findme);
		if ($pos!==false){
			$email=str_replace($findme,'',$email);
		}
		$findme="google|";
		$pos=strpos($email,$findme);
		if ($pos!==false){
			$email=str_replace($findme,'',$email);
		}
		return $email;

	}

	function header_email()
	{
		$msg='
		<html>
		<head>
			<title>ZmyHome</title>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<style type="text/css">
		@font-face {
		  font-family: "RSU";
		  src: url("http://www.zmyhome.com/fonts/RSU_Regular.eot"); /* IE9 Compat Modes */
		  src: url("http://www.zmyhome.com/fonts/RSU_Regular.eot?#iefix") format("embedded-opentype"), /* IE6-IE8 */
		       url("http://www.zmyhome.com/fonts/RSU_Regular.woff2") format("woff2"), /* Super Modern Browsers */
		       url("http://www.zmyhome.com/fonts/RSU_Regular.woff") format("woff"), /* Pretty Modern Browsers */
		       url("http://www.zmyhome.com/fonts/RSU_Regular.ttf")  format("truetype"), /* Safari, Android, iOS */
		       url("http://www.zmyhome.com/fonts/RSU_Regular.svg#svgFontName") format("svg"); /* Legacy iOS */
		  font-weight: normal;
		  font-style: normal;
		}

		html{
			font-family:"RSU",serif;

		}
		body{
			font-family:"RSU",sans-serif,serif,Helvetica;
		}
		</style>
		</head>
		';
		return $msg;
	}

	function approve_body_email($POID)
	{
		//Find Data insert into Email
		$query=$this->db->query('Select *, DATE_FORMAT(DateExpire,"%d/%m/%Y") as EDate from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$user_id=$row->user_id;
		$email=$row->Email1;
		if (($email=="") or ($email==null)){
			$email=$this->get_email_from_userid($user_id);
		}
		$TOAdvertising=$row->TOAdvertising;
		if ($TOAdvertising==1){
			$txtTOAdv='ขาย';
			$TotalPrice='ราคาขาย '.$row->TotalPrice.'บาท';
			$Address=$row->Address;
		};
		if ($TOAdvertising==2){
			$txtTOAdv='ขายดาวน์';
			$Address=$row->RoomNumber;
			$TotalPrice='ราคาขาย '.$row->TotalPrice.'บาท';
		};
		if ($TOAdvertising==5){
			$txtTOAdv='เช่า';
			$TotalPrice='ค่าเช่า '.$row->PRentPrice.'บาท/เดือน';
			$Address=$row->Address;
		};

		$ProjectName=$row->ProjectName;

		$EDate=$row->EDate;
		$AgreePostDay=$row->AgreePostDay;
		//Create Msg of Email
		$msg='
			<body style="color:#818285; padding:50px; font-size:20px;">
			<br><br>

			<table>
				<tr>
				  <td width="20%"></td>
				  <td width="60%">

				  	<div align="center"><a href="http://www.zmyhome.com"><img src="https://s3-ap-southeast-1.amazonaws.com/zmyhome/email/zmyhome-logo.png"></a></div><br/><br/>
			<div>สวัสดีคุณ '.$email.'</div><br/><br/>
			<div>ประกาศ “'.$txtTOAdv.'” บ้านเลขที่ '.$Address.' โครงการ '.$ProjectName.' '.$TotalPrice.' ของคุณ ได้รับการอนุมัติและจะแสดงอยู่จนถึงวันที่ '.$EDate.'('.$AgreePostDay.' วัน) ตามที่คุณได้กำหนดไว้ </div>
			<div>คุณสามารถดูประกาศของคุณได้ที่<a href="http://www.zmyhome.com/zhome/unitDetailEmail/'.$POID.'">ลิงค์นี้</a></div><br/>
			<div>คุณสามารถกด Share Facebook เพื่อให้เพื่อนๆ ได้เห็นประกาศของคุณ และแนะนำต่อ เพื่อให้คุณขาย/เช่า ได้เร็วยิ่งขึ้น</div>
			<br/><br/>
			';

		return $msg;
	}

	function block_body_email($POID)
	{
		//Find Data insert into Email
		$query=$this->db->query('Select *, DATE_FORMAT(DateExpire,"%d/%m/%Y") as EDate from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$query2=$this->db->query('Select * from BlockPostMsg Where POID="'.$POID.'" Order By ID DESC Limit 1');
		$row2=$query2->row();
		$user_id=$row->user_id;
		$email=$row->Email1;
		if (($email=="") or ($email==null)){
			$email=$this->get_email_from_userid($user_id);
		}
		$TOAdvertising=$row->TOAdvertising;
		if ($TOAdvertising==1){
			$txtTOAdv='ขาย';
			$TotalPrice='ราคาขาย '.$row->TotalPrice.'บาท';
			$Address=$row->Address;
		};
		if ($TOAdvertising==2){
			$txtTOAdv='ขายดาวน์';
			$Address=$row->RoomNumber;
			$TotalPrice='ราคาขาย '.$row->TotalPrice.'บาท';
		};
		if ($TOAdvertising==5){
			$txtTOAdv='เช่า';
			$TotalPrice='ค่าเช่า '.$row->PRentPrice.'บาท/เดือน';
			$Address=$row->Address;
		};

		$ProjectName=$row->ProjectName;

		$EDate=$row->EDate;
		$AgreePostDay=$row->AgreePostDay;
		//Create Msg of Email
		$msg='
			<body style="color:#818285; padding:50px; font-size:20px;">
			<br><br>

			<table>
				<tr>
				  <td width="20%"></td>
				  <td width="60%">

				  	<div align="center"><a href="http://www.zmyhome.com"><img src="https://s3-ap-southeast-1.amazonaws.com/zmyhome/email/zmyhome-logo.png"></a></div><br/><br/>
			<div>สวัสดีคุณ '.$email.'</div><br/><br/>
			<div>ประกาศ “'.$txtTOAdv.'” บ้านเลขที่ '.$Address.' โครงการ '.$ProjectName.' '.$TotalPrice.' ของคุณ ได้รับการตรวจสอบ แต่ถูกระงับการแสดงผลเนื่องจาก </div>
			<div>'.$row2->Msg.'</div>
			<div>คุณสามารถแก้ไขประกาศของคุณได้ที่ <a href="http://www.zmyhome.com">www.zmyhome.com</a></div><br/>
			<br/><br/>
			';

		return $msg;
	}

	function footer_email(){
		$msg='
			<br/>
			<br/>
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
			';
		return $msg;
	}

	public function approve_email($POID){
	 	$msg1=$this->header_email();
		$msg2=$this->approve_body_email($POID);
		$msg3=$this->footer_email();
		$msg=$msg1.$msg2.$msg3;
		$query=$this->db->query('Select * from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$user_id=$row->user_id;
		$toemail=$row->Email1;
		if (($toemail=="") or ($toemail==null)){
			$toemail=$this->get_email_from_userid($user_id);
		}
		$subj="ประกาศคุณได้รับตรวจสอบและแสดงใน www.zmyhome.com แล้ว";
		$this->sendemail($msg,$toemail,$subj);
		$Date=date("Y-m-d");
		$this->db->query('Insert into TmpEmailApprove Set POID="'.$POID.'", Date="'.$Date.'"');
	 }

	public function block_email($POID){
    //echo $POID;
	 	$msg1=$this->header_email();
		$msg2=$this->block_body_email($POID);
		$msg3=$this->footer_email();
		$msg=$msg1.$msg2.$msg3;
		$query=$this->db->query('Select * from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$user_id=$row->user_id;
		$toemail=$row->Email1;
    //echo "aaa".$toemail;
		if (($toemail=="") or ($toemail==null) or $toemail=="NULL"){
			$toemail=$this->get_email_from_userid($user_id);
      //echo "bbb".$toemail;
      //echo "zzz".$user_id;
		}
		$subj="ประกาศคุณได้รับตรวจสอบ แต่ถูกระงับการแสดง";
		$this->sendemail($msg,$toemail,$subj);
		$Date=date("Y-m-d");
		$this->db->query('Insert into TmpEmailBlock Set POID="'.$POID.'", Date="'.$Date.'"');
	 }

	public function sendemail($msg,$toemail,$subj)
	{
    //echo "111".$toemail;
		//Find Server Setting
		//$msg="<html><body>".$_POST['msg']."</body></html>";
		$query=$this->db->query('Select * from emailconfig where id=1');
		$row=$query->row();
		$subject=$subj;
		$email=$toemail;

		$mail = new PHPMailer();
		$mail->IsSMTP();                       // telling the class to use SMTP
		$mail->SMTPDebug = 0;
		// 0 = no output, 1 = errors and messages, 2 = messages only.

		$mail->SMTPAuth = true;                // enable SMTP authentication
		$mail->SMTPSecure = "ssl";              // sets the prefix to the servier
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    //$mail->SMTPDebug = 2;
		$mail->Host = $row->server;        // sets Gmail as the SMTP server
		$mail->Port = $row->port;                     // set the SMTP port for the GMAIL

		$mail->Username = $row->username;  // Gmail username
		$mail->Password = $row->password;      // Gmail password
		//$mail->Username = "jame@zmyhome.com";  // Gmail username
		//$mail->Password = "z181015aof";      // Gmail password

		//$mail->CharSet = 'windows-1250';
		$mail->CharSet = 'UTF-8';
		$mail->SetFrom ($row->fromemail, $row->txt_fromemail);
		$mail->ContentType = 'text/plain';
		$mail->IsHTML(true);
		$mail->Subject = $subject;
		//$mail->Body = $msg;
		$mail->MsgHTML($msg);
		$mail->AddAddress ($email);
		if(!$mail->Send())
		{
			$error_message = "Mailer Error: " . $mail->ErrorInfo;
		} else {
			$error_message = "Successfully sent!";
		}
		echo $error_message;
		//phpinfo();
		//$this->search2($error_message);
		//echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
	}

  function ToolAddDate($Day){
    $Date=date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+$Day, date("Y")));
    return $Date;
  }

	function renewpostbyemail($POID,$Token){
    $CheckDate=$this->ToolAddDate(30);
    $query=$this->db->query('Select * from Post Where DateExpire<"'.$CheckDate.'" and POID="'.$POID.'" and Token="'.$Token.'"');
    if ($query->num_rows()>0){
      $Date=date("Y-m-d");
  		$this->db->query('Update Post set DateExpire="'.$CheckDate.'", Active=1 Where POID="'.$POID.'" and Token="'.$Token.'"');
  		$this->db->query('Insert into ActivePostByEmail set POID="'.$POID.'", RenewPost=1, Date="'.$Date.'"');
      $this->db->query('Insert into LogRenewPost set POID="'.$POID.'", ByEmail=1, NewExpDate="'.$CheckDate.'", RenewDate="'.$Date.'"');
    }
	}

  function renewpostbymessenger($POID,$Token){
    $CheckDate=$this->ToolAddDate(30);
    $query=$this->db->query('Select * from Post Where DateExpire<"'.$CheckDate.'" and POID="'.$POID.'" and Token="'.$Token.'"');
    if ($query->num_rows()>0){
      $Date=date("Y-m-d");
  		$this->db->query('Update Post set DateExpire="'.$CheckDate.'", Active=1 Where POID="'.$POID.'" and Token="'.$Token.'"');
      $this->db->query('Insert into LogRenewPost set POID="'.$POID.'", ByMessenger=1, NewExpDate="'.$CheckDate.'", RenewDate="'.$Date.'"');
    }
	}

	function rentpostbyemail($POID,$Token){
		$Date=date("Y-m-d");
		$this->db->query('Update Post set Active=81, CloseDate="'.$Date.'" Where POID="'.$POID.'" and Token="'.$Token.'"');
		$this->db->query('Insert into ActivePostByEmail set POID="'.$POID.'", RentPost=1, Date="'.$Date.'"');
	}

	function hidepostbyemail($POID,$Token){
		$Date=date("Y-m-d");
		$this->db->query('Update Post set Active=93 Where POID="'.$POID.'" and Token="'.$Token.'"');
		$this->db->query('Insert into ActivePostByEmail set POID="'.$POID.'", HidePost=1, Date="'.$Date.'"');
	}

	function closepostbyemail($POID,$Token){
		$Date=date("Y-m-d");
		$this->db->query('Update Post set Active=82, CloseDate="'.$Date.'" Where POID="'.$POID.'" and Token="'.$Token.'"');
		$this->db->query('Insert into ActivePostByEmail set POID="'.$POID.'", ClosePost=1, Date="'.$Date.'"');
	}

	function updatelogviewbyemail($POID){
		$Date=date("Y-m-d");
		$this->db->query('insert into ViewByEmail set POID="'.$POID.'", Date="'.$Date.'"');
	}

  public function receipt_email($POID){
	 	$msg1=$this->header_email();
		$msg2=$this->approve_body_email($POID);
		$msg3=$this->footer_email();
		$msg=$msg1.$msg2.$msg3;
		$query=$this->db->query('Select * from Post Where POID="'.$POID.'"');
		$row=$query->row();
		$user_id=$row->user_id;
		$toemail=$row->Email1;
		if (($toemail=="") or ($toemail==null)){
			$toemail=$this->get_email_from_userid($user_id);
		}
		$subj="ประกาศคุณได้รับตรวจสอบและแสดงใน www.zmyhome.com แล้ว";
		$this->sendemail($msg,$toemail,$subj);
		$Date=date("Y-m-d");
		$this->db->query('Insert into TmpEmailApprove Set POID="'.$POID.'", Date="'.$Date.'"');
	 }
	
	function getEmailGroup($mail_group){
		$query=$this->db->query('select mail_to,mail_cc,mail_bcc from cfg_email where mail_group="'.$mail_group.'"');
		return $query;
	}

	public function sendMultipleEmail($msg,$toemail,$ccemail,$subj){
		$query=$this->db->query('Select * from emailconfig where id=1');
		$row=$query->row();
		$subject=$subj;

		$mail = new PHPMailer();
		$mail->IsSMTP();                       // telling the class to use SMTP
		$mail->SMTPDebug = 0;                  
		// 0 = no output, 1 = errors and messages, 2 = messages only.

		$mail->SMTPAuth = true;                // enable SMTP authentication 
		$mail->SMTPSecure = "ssl";              // sets the prefix to the servier
		$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		));
		$mail->Host = $row->server;        // sets Gmail as the SMTP server
		$mail->Port = $row->port;                     // set the SMTP port for the GMAIL 
		$mail->Username = $row->username;  // Gmail username
		$mail->Password = $row->password;      // Gmail password
		//$mail->Username = "jame@zmyhome.com";  // Gmail username
		//$mail->Password = "z181015aof";      // Gmail password
		
		//$mail->CharSet = 'windows-1250';
		$mail->CharSet = 'UTF-8';
		$mail->SetFrom ($row->fromemail, $row->txt_fromemail);
		$mail->ContentType = 'text/plain'; 
		$mail->IsHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $msg; 
		$mail->MsgHTML($msg);
		foreach($toemail as $recipient_to)
		{
			$mail->AddAddress($recipient_to);
		}
		foreach($ccemail as $recipient_cc)
		{
			$mail->AddCC($recipient_cc);
		}
		if($mail->Send()){
			$error_message = "Successfully sent!";
		}else{
			$error_message = "Mailer Error: " . $mail->ErrorInfo;
		}
		echo $error_message;
		return;

	}
}

?>
