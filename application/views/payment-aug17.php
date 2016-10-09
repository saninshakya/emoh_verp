<div class="container ">
  <div class="margin-t50 hidden-sm hidden-xs"></div>



           <div class="clearfix"></div>
           <div class="height25"></div>
           <div class="clearfix"></div>
           <div class="height25"></div>
           <div class="col-xs-12 text-center">
             จำนวนเหรียญคงเหลือ
           </div>
           <div class="col-xs-12 text-center">
             <h1 class="text-red"> <?=$this->credit->CreditBanlance();?>  เหรียญ</h1>
           </div>
           <div class="clearfix"></div>
           <div class="height25"></div>
           <div class="col-xs-12">

                <a href="#"" class="promotioncode text-blue" onclick="promotioncode();"> <span class="glyphicon glyphicon-tag"></span> ป้อนรหัสคูปองหรือโปรโมชั่น</a>
                <div class="col-md-12 col-xs-12 display-none entercode padding-none">
                              <div class="col-md-8 col-xs-8 padding-none">
                                 <input type="text" class="form-control input-z padding-left-clear" placeholder="PROMOCODE (ถ้ามี)" style="padding:0; margin:0">
                              </div>
                              <div class="col-md-4 col-xs-4  padding-none">
                                <button class="btn btn-sm w100 btn-green2 cursor input-z  text-white col-xs-4 col-xs-12">ตกลง</button>
                              </div>
                </div>
           </div>



          <div class="clearfix"></div>
          <div class="height25"></div>
          <div class="clearfix"></div>
          <div class="col-xs-12 padding-l15">
                      <div class="pull-left">
                              <p class="text-black padding-none "> ซื้อเหรียญ</p>

                      </div>
          </div>
<?php
  $resultPayment=$this->credit->paymentcoin();
  $i=0;
  foreach ($resultPayment->result() as $row){
    $i++;
?>
<div class="clearfix"></div>
<div class="height15"></div>
<div class="col-xs-12"><hr class="padding-none"></div>
<div class="height15"></div>
      <div class="col-xs-12 radio padding-none">

    <div class="col-xs-7">
        <label class="padding-none vertical-center">

            <input type="radio" class="radioz" name="optionsRadios" id="optionsRadios<?=$i;?>" value="<?=$row->PType;?>" onclick="changePayment(this.value)">
            <span class="text-black"><?=$row->DisplayName1;?></span>
        </label>
    </div>
    <div class="col-xs-5 text-right"><?=$row->DisplayName2;?></div>
</div>

<?php
  }
?>
          <div class="clearfix"></div>
          <div class="height15"></div>

          <div class="row">
           <hr class="col-md-12 col-xs-12 full">
          </div>


          <div class="clearfix"></div>
          <div class="height15"></div>
          <div class="col-xs-12"><p class="text-black padding-none">การชำระเงิน </p></div>
          <div class="clearfix"></div>
          <div class="height15"></div>
          <div class="col-md-12 col-xs-12 padding-none">
            <div class="col-xs-6"> <p class="text-black padding-none">User Name :  </p></div>
            <?php
             $user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
            ?>
            <div class="col-xs-6 text-right"><?=$user_data->firstname;?> <?=$user_data->lastname;?></div>
          </div>
          <div class="clearfix"></div>
          <div class="height10"></div>
          <div class="col-xs-12 padding-none">
            <div class="col-xs-6"><p class="text-black padding-none">ซื้อเหรียญ :  </p></div>
            <div class="col-xs-6 text-right" id="div1"></div>
          </div>
          <div class="clearfix"></div>
          <div class="height10"></div>
          <div class="col-xs-12 padding-none">
            <div class="col-xs-7"><p class="text-black padding-none">ค่าบริการใช้ซอฟต์แวร์ :  </p></div>
            <div class="col-xs-5 text-right" id="div2"></div>
          </div>
           <div class="clearfix"></div>
          <div class="height10"></div>
          <div class="col-xs-12 padding-none">
            <div class="col-xs-6"><p class="text-black padding-none">ภาษีมูลค่าเพิ่ม :  </p></div>
            <div class="col-xs-6 text-right" id="div3"></div>
          </div>
          <div class="clearfix"></div>
          <div class="height10"></div>
          <div class="col-xs-12 padding-none">
            <div class="col-xs-6"><p class="text-black padding-none">รวม:  </p></div>
            <div class="col-xs-6 text-right text-red" id="div4"></div>
          </div>
          

          <div class="clearfix"></div>
          <div class="height15"></div>
          <div class="row">
           <hr class="col-md-12 col-xs-12 full">
          </div>
          <div class="clearfix"></div>
          <div class="height15"></div>


         
          <div class="col-xs-12 padding-none">
                <div class="col-xs-12">
                  <p class="text-black padding-none">ชำระเงินด้วยการโอนเงินเข้าบัญชีธนาคาร</p>
                  <div class="clearfix"></div>
                  <div class="height15"></div> 
                  <p class="text-black">บัญชีธนาคารทหารไทย<br> บริษัท แซท โฮม จำกัด เลขที่บัญชี 269-2-03742-3 <br>และถ่ายภาพสลิปธนาคารแล้วส่งมายัง</p>
                   <div class="clearfix"></div>
                   <div class="height15"></div>
                   <div><p class="text-black">- Line@ZmyHome</p></div>
                   <div><p class="text-black">- email : Sale@zmyhome.com</p></div>
                   <div><p class="text-black">- Fax : 02-661-5004</p></div>
                  
                </div>
          </div>
          <div class="clearfix"></div>
          <div class="height10"></div>
        
          
          <div class="row">
           <hr class="col-md-12 col-xs-12 full">
          </div>
          <div class="clearfix"></div>
           <div class="height15"></div>


                  <div class="col-md-12"><a class="text-black" href="#">ข้อตกลงในการชำระเงิน</a></div>
                  <div class="clearfix"></div>
                  <div class="height15"></div>
                   <div class="col-xs-12 checkbox padding-none">
                      <div class="col-xs-12 text-grey"> 
                      <label><input type="checkbox" name="optionsCondition" id="optionsCondition3" value="" onchange="checkCondition3();" >ข้าพเจ้าเข้าใจวิธีการใช้บริการและยอมรับที่จะไม่ขอคืนเงินสด หรือขอเปลี่ยนแปลงใดๆทั้งสิ้น  รวมทั้งยอมรับ<span class="text-green">กฎและข้อจำกัด  ข้อตกลงการใช้งาน </span> และ<span class="text-green">นโยบายความเป็นส่วนตัว</span>ทั้งหมดนี้</label>
                      </div>
          </div>
          <div class="clearfix"></div>
          <div class="height15"></div>
          <div class="text-blue col-md-12"><p class="text-blue">สอบถามคุณภาพภาพถ่ายที่ Line@ZmyHome เขียน "ตรวจสอบภาพถ่ายเพื่อโปรโมทประกาศ"</p></div>
          <div class="clearfix"></div>
          <div class="height10"></div>
         
          <div class="row">
               <hr class="col-md-12 col-xs-12 full">
          </div>
          <div class="clearfix"></div>
          <div class="height15"></div>

          <div class="clearfix"></div>
          <br><br><br><br>


           <!--payment bt-->
              <div class="col-md-12 bg-grey7 boost-map-height bg-grey " style="position:fixed; bottom:0; left:0; width:100%;">

                 <div class="clearfix"></div>
                 <div class="height15"></div>
                 <div align="center" class="btn btn-blue cursor text-white padding-none">
                   <form name="checkoutForm" method="POST" action="./checkout" class="padding-none checkCondition4" onclick="checkCondition4();"  disabled>
                     <input type="hidden" id="satang" name="satang">
                     <input type="hidden" id="PType" name="PType">
                     <script type="text/javascript" src="https://zhome.aofdev.com/js/zcard.js"
                       data-key="<?=$this->credit->OmiseToken("public");?>"
                       data-image="https://zhome.aofdev.com/img/ZmyHome_LogoHouse_orange400.svg"
                       data-frame-label="ZmyHome.com"
                       data-button-label="ชำระเงิน"
                       data-submit-label="ยื่นยันชำระ"
                       data-location="no"
                       data-currency="thb"
                       >
                     </script>
                     <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
                   </form>
                 </div>
                 <div class="clearfix"></div>
                 <div class="height5"></div>
                 <div class="text-black text-center">
                     <small class="text-black"><i class="glyphicon glyphicon-lock"></i> เราใช้การถ่ายโอนข้อมูลที่ปลอดภัย และการจัดเก็บข้อมูลที่มีการเข้ารหัส เพือปกป้องข้อมูลส่วนบุคคลของคุณ
                     </small>
                  </div>

                  <div class="clearfix"></div>
                  <div class="height5"></div>

              </div>
              <!--end payment bt-->
</div>
<!-- Modal Check Condition -->
<div class="modal modal-sm fade display-none" id="modalCondition4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto;">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-header bg-blue" style="padding:10px 15px 5px;">
        <div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
        <h4 class="text-white text-center padding-none padding-t3">กรุณาคลิกยอมรับข้อตกลง</h4>
      </div>
      <div class="modal-body" style="height:200px">
          <br><br>
        <h4>กรุณาคลิกยอมรับข้อตกลงในการชำระเงิน</h4>
        <br>
      </div>
    </div>
  </div>
</div>
<!--End-->
</body>
<script type="text/javascript">
function changePayment(Price){
    var amount;
<?php
  $resultPayment=$this->credit->paymentcoin();
  $i=0;
  foreach ($resultPayment->result() as $row){
    $i++;
?>
    if (Price=="<?=$row->PType;?>"){
      document.getElementById("button_id").innerHTML="<?=$row->DisplayName3;?>";
      document.getElementById("satang").value="<?=$row->ThaiBaht * 100;?>";
      document.getElementById("PType").value="<?=$row->PType;?>";
      document.getElementById("div1").innerHTML="<?=$row->DisplayName1;?>";
      document.getElementById("div2").innerHTML="<?=$row->ThaiBaht * 0.93;?> บาท";
      document.getElementById("div3").innerHTML="<?=$row->ThaiBaht * 0.07;?> บาท";
      document.getElementById("div4").innerHTML="<?=$row->ThaiBaht;?> บาท";
    }

<?php
  }
?>
}
</script>

<script type="text/javascript">
$(window).load(function(){
  $('.checkCondition4').addClass('disabled');
});

function checkButton()
  {  if (document.getElementById("optionsCondition3").checked==true){    
      document.getElementById("button_id").disabled=false;  } 
      else {    document.getElementById("button_id").disabled=true;  }
}
</script>
</html>
