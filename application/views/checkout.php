<?php
require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
$PKey=$this->credit->OmiseToken("public");
$SKey=$this->credit->OmiseToken("secret");
define('OMISE_API_VERSION', '2015-11-17');
define('OMISE_PUBLIC_KEY', $PKey);
define('OMISE_SECRET_KEY', $SKey);
$query=$this->db->query('select charge_id from cTempPayment where key_load="'.$key_load.'"');
$charge_id=$query->row()->charge_id;
$charge = OmiseCharge::retrieve($charge_id);
print_r($charge);
//echo "5678";
if ($charge['status']=="successful"){
  $result=$this->credit->checkKeyLoad($key_load,$PromoCode,$PromoPoint);
  if($result[0]!='0'){
    $document_no=$result[0];
  	$ThaiBaht=$result[1]->ThaiBaht;
  }
?>
<body>
<div class="container" style="margin-top:10%">
  <div class="row">
     <br class="visible-xs visible-sm"> <br class="visible-xs visible-sm">
     <hr class="zline padding-none">
     <div class="col-md-2">
     </div>
     <div class="col-md-8 col-xs-12 text-center padding-none">
       <div class="clearfix"></div>
       <div class="col-md-12" style="margin-top:22px;"><h3>ZmyHome.com</h3></div>
       <div class="col-md-12" style="margin-top:22px;">
          <span class="glyphicon glyphicon-ok text-green2" aria-hidden="true" style="color: #00541E; font-size:25px;padding:5px;border-radius: 50%;border:3px solid #00541E;"></span>
       </div>
        <div class="col-md-12"><h3>Thank you!</h3></div>
        <div class="col-md-12" style="margin-top:22px;">
              <div style="margin-top:10px;"> คุณ <?=$username;?> ได้ชำระเงินจำนวน <?=$ThaiBaht;?> บาท ให้กับ ZmyHome  เรียบร้อยแล้ว  </div>
              <div style="margin-top:10px;">ระบบกำลังจัดส่งอีเมลล์ยืนยันการชำระเงินไปยัง <?=$email;?> ตามที่ได้ลงทะเบียนไว้</div>
              <div style="margin-top:10px;">กรุณาเก็บหมายเลขอ้างอิง <?=$document_no;?> ไว้สำหรับการติดต่อกับบริษัท</div>
        </div>
      </div>
     <div class="col-md-2">
     </div>

     <div class="clearfix"></div>
     <br>
     <br>

  </div>
 </div>
</div>
</body>
<?php
} else {
?>
<body>
<div class="container" style="margin-top:10%">
  <div class="row">
     <br class="visible-xs visible-sm"> <br class="visible-xs visible-sm">
     <hr class="zline padding-none">
     <div class="col-md-2">
     </div>
     <div class="col-md-8 col-xs-12 text-center padding-none">
       <div class="clearfix"></div>
       <div class="col-md-12" style="margin-top:22px;"><h3>ZmyHome.com</h3></div>
       <div class="col-md-12" style="margin-top:22px;">
          <span class="glyphicon glyphicon-remove text-red" aria-hidden="true" style="color: #FF0000; font-size:25px;padding:5px;border-radius: 50%;border:3px solid #FF0000;"></span>
       </div>
       <div class="col-md-12"><h3 style="color:red">Fail !</h3></div>
       <div class="col-md-12" style="margin-top:22px;">
             <div style="margin-top:10px;"> ไม่สามารถชำระเงินได้ กรุณาลองใหม่อีกครั้ง  </div>
    </div>

         <div class="col-md-2">
         </div>

         <div class="clearfix"></div>
         <br>
         <br>

      </div>
     </div>
    </div>
    </body>
<?php
}
?>
