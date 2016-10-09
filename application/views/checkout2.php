<?
require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
$PKey=$this->credit->OmiseToken("public");
$SKey=$this->credit->OmiseToken("secret");
define('OMISE_API_VERSION', '2015-11-17');
define('OMISE_PUBLIC_KEY', $PKey);
define('OMISE_SECRET_KEY', $SKey);
$user_id=$this->session->userdata('user_id');
$key_load=md5(time().$_POST['PType'].$user_id);
$PType=$_POST['PType'];
$PromoCode=$_POST['promotion_code'];
$PromoPoint=$_POST['promotion_point'];
$charge = OmiseCharge::create(array(
  'amount' => $_POST["satang"],
  'currency' => 'thb',
  'card' => $_POST["omiseToken"],
  'return_uri' => "https://zhome.aofdev.com/zhome/payment_success/".$key_load."/".$PromoCode."/".$PromoPoint
));
?>
<body>
<div class="container" style="margin-top:10%">
  <div class="row">
     <br class="visible-xs visible-sm"> <br class="visible-xs visible-sm">
     <hr class="zline padding-none">
     <div class="col-md-2">
     </div>
     <div class="col-md-8 col-xs-12 text-center padding-none">

<?php
if ($charge['status'] == 'successful' or $charge['status'] == 'pending') {
//  print_r($charge);
  $this->db->query('insert into cTempPayment set key_load="'.$key_load.'", user_id="'.$user_id.'", PType="'.$PType.'", charge_id="'.$charge['id'].'",PromoCode="'.$PromoCode.'"');
  $uri_redirect=$charge['authorize_uri'];
  redirect($uri_redirect,'refresh');
?>
<!--
       <div class="clearfix"></div>
       <div class="col-md-12" style="margin-top:22px;"><h3>ZmyHome.com</h3></div>
       <div class="col-md-12" style="margin-top:22px;">
          <span class="glyphicon glyphicon-ok text-green2" aria-hidden="true" style="color: #00541E; font-size:25px;padding:5px;border-radius: 50%;border:3px solid #00541E;"></span>
       </div>
        <div class="col-md-12"><h3>Thank you!</h3></div>
        <div class="col-md-12" style="margin-top:22px;">
              <div style="margin-top:10px;"> คุณได้ชำระเงินจำนวน ____ บาท ให้กับ ___ ID _____________ เรียบร้อยแล้ว  </div>
              <div style="margin-top:10px;">ระบบกำลังจัดส่งอีเมลล์ยืนยันการชำระเงินไปยัง _______ ตามที่ได้ลงทะเบียนไว้</div>
              <div style="margin-top:10px;">กรุณาเก็บหมายเลขอ้างอิง _______________ ไว้สำหรับการติดต่อกับบริษัท</div>
        </div>
      </div>
-->
<?php
} else {
?>
         <div class="clearfix"></div>
         <div class="col-md-12" style="margin-top:22px;"><h3>ZmyHome.com</h3></div>
         <div class="col-md-12" style="margin-top:22px;">
            <span class="glyphicon glyphicon-remove text-red" aria-hidden="true" style="color: #FF0000; font-size:25px;padding:5px;border-radius: 50%;border:3px solid #FF0000;"></span>
         </div>
         <div class="col-md-12"><h3 style="color:red">Fail !</h3></div>
         <div class="col-md-12" style="margin-top:22px;">
               <div style="margin-top:10px;"> ไม่สามารถชำระเงินได้ กรุณาลองใหม่อีกครั้ง  </div>
      </div>
<?php
}
?>

     <div class="col-md-2">
     </div>

     <div class="clearfix"></div>
     <br>
     <br>

  </div>
 </div>
</div>
</body>
