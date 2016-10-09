</div>
<div class="row padding-none">
  <div class="cpl-lg-12 col-md-12 photographer-page photographer">
    <br>
    <h1 class="text-grey margin-t100 padding-l20 visible-xs visible-sm">ห้องสวย-น่าซื้อ ด้วยมืออาชีพ <br>เริ่ม 3,000 บาท</h1>
    <h1 class="text-grey margin-t100 visible-lg visible-md" style="padding-left: 270px;line-height: 60px;">ห้องสวย-น่าซื้อ ด้วยมืออาชีพ <br>เริ่ม 3,000 บาท</h1>
  </div>

</div>

<div class="container font18">

</br>

<div class="row">
 <div class="col-md-12 text-center photographer">
   <h2 class="text-orange">ขาย เช่า ไว ราคาดี ด้วยภาพถ่ายมืออาชีพ</h2>
 </div>
</div>
</br>
<div class="row">
 <div class="cpl-lg-10 col-lg-push-1 col-md-10 col-md-push-1 line-height1 photographer">
  <p class="text-grey font20 text-responsive">ภาพถ่ายที่ดีช่วยให้ห้องของคุณขาย-เช่าได้เร็วขึ้น และยังเพิ่มมูลค่าให้ทรัพย์สิน ลงทุนกับภาพถ่ายด้วยช่างภาพมืออาชีพ ซึ่งมีประสบการณ์ถ่ายภาพงานระดับโครงการ และ โรงแรม 5 ดาว</p>
</div>
</div>
<br>
<?php
$attributes = array('class' => 'form-inline', 'id' => 'photographer_form');
echo form_open('/zhome/savePhotographer', $attributes);
?>

<div class="row">
  <div class="col-lg-4 col-lg-push-1 col-md-4 col-md-push-1 photographer">
   <h2 class="text-grey">กรุณากรอกข้อมูล</h2>
   <br>

   แพคเกจถ่ายภาพที่ต้องการ*
 
    <select class="form-control selectpicker"  name="package" data-style="btn-zmyhome" data-width="100%">
                <option class="col-xs-12" value="0" selected="selected" disabled="disabled">โปรดเลือก</option>
               <option class="col-xs-12" value="1">สตูดิโอ - 2 ห้องนอน ( ไม่เกิน 1 ชม.)</option>
               <option class="col-xs-12" value="2">3 ห้องนอน/บ้าน ( 1-2 ชม.)</option>
               <option class="col-xs-12" value="3">ถ่ายภาพโครงการ (ครึ่งวัน)</option>
               <option class="col-xs-12" value="4">ถ่ายภาพโครงการ (เต็มวัน)</option>
    </select>
             <div class="clearfix"></div>
   <br>
   วันที่สะดวกนัดถ่ายภาพ*
   <div class="input-group date col-md-12 col-xs-12" data-provide="datepicker">
      <input type="text" class="form-control input-z" name="selected_date" id="datepicker" data-width="100%">
      <div class="input-group-addon padding-t5">
          <span class="glyphicon glyphicon-th"></span>
      </div>
   </div>

  <div class="clearfix"></div>
  <br>

  <div>เวลา*</div>
  <input class="form-control input-z w100p" placeholder="ระบุ" name="selected_time">
  <div class="clearfix"></div>
  <br>

  <div>บ้านเลขที่*</div>
  <input class="form-control input-z  w100p" name="house_number">
  <div class="clearfix"></div>
  <br>

  <div>โครงการ / ที่อยู่ (เลื่อนหมุดให้ถูกต้อง)*</div>
  <input class="form-control input-z  w100p" placeholder="ระบุ" name="project">
  <div class="clearfix"></div>
  <br>

  <div>ชื่อ-นามสกุล*</div>
  <input class="form-control input-z  w100p" name="fullname">
  <div class="clearfix"></div>
  <br>

  <div>เบอร์ติดต่อ*</div>
  <input class="form-control input-z w100p" placeholder="ระบุ" name="contact_no">
  <div class="clearfix"></div>
  <br>

  <div>อีเมลล์*</div>
  <input class="form-control input-z  w100p" name="email">
  <div class="clearfix"></div>
  <br>


  <button class="form-control input-z text-white bg-orange-hd  w100p" name="btn-photographer">ชำระค่าบริการ</button>
  <div class="clearfix"></div>
  <br>
</div>
<?php echo form_close(); ?>
<div class="col-lg-6 col-lg-push-1 col-md-6 col-md-push-1 padding-left-clear-mobile">

  <div class="col-md-12 padding-t5"><h3 class="text-grey">ค่าบริการ</h3></div>
  <div class="clearfix"></div>

  <ol>
   <li class="title-z">
    <div class="pull-left">สตูดิโอ - 2 ห้องนอน ( ไม่เกิน 1 ชม.)</div>   
    <div class="pull-right"> <span class="text-turq2"> 3,000</span> <span class="line-through">6,0000</span></div>
    <div class="clearfix"></div>

  </li>
  <li class="title-z">
   <div class="pull-left">3 ห้องนอน/บ้าน ( 1-2 ชม.)</div>
   <div class="pull-right"><span class="text-turq2"> 4,000</span> <span class="line-through">8,000</span></div>
   <div class="clearfix"></div>
 </li>
 <li class="title-z">
  <div class="pull-left">ถ่ายภาพโครงการ (ครึ่งวัน)</div>
  <div class="pull-right"><span class="text-turq2"> 6,500</span> <span class="line-through">14,000</span></div>
  <div class="clearfix"></div>
</li>
<li class="title-z">
  <div class="pull-left">ถ่ายภาพโครงการ (เต็มวัน)</div>
  <div class="pull-right"><span class="text-turq2"> 9,000</span> <span class="line-through">15,000</span></div>
  <div class="clearfix"></div>
</li>
</ol>

<div class="col-md-12 title-z">
 พิเศษ ถ่ายภาพด้วยกล้อง 360 องศา มูลค่า 3,000 บาท ถึง 31 ต.ค.
</div>
<div class="col-md-12 title-z">
 สอบถามเพิ่มเติม 081-173-7700, Line@zmyhome <br> ระหว่างวันจันทร์ - ศุกร์ 8.30-20.00 น.
</div>
<div class="clearfix"></div>
<br>
<div class="col-md-12 title-z"><h4 class="text-orange">วิธีชำระเงิน</h4></div>
<div class="clearfix"></div>
<ol>
  <li class="title-z">ด้วย credit ในระบบ</li>
  <li class="title-z">โอนเงินเข้าบัญชี <br><br>
    บัญชีธนาคารทหารไทย<br>
    บริษัท แซท โฮม จำกัด เลขที่บัญชี 269-2-03742-3 <br>
    และถ่ายภาพสลิปธนาคารแล้วส่งมายัง<br><br>

    - Line@ZmyHome<br>

    - email : Sale@zmyhome.com<br>

    - Fax : 02-661-5004<br>

  </li>

</ol>

<div class="clearfix"></div>

<div class="col-md-12 title-z"><h4 class="text-orange">เงื่อนไขในการใช้บริการ</h4></div>
<div class="clearfix"></div>
<ul>
  <li class="title-z">เก็บห้องชุดหรือบ้านให้เรียบร้อยโดยเฉพาะอย่างยิ่งของใช้ส่วนตัว</li>
  <li class="title-z">มาตรงเวลานัดหมาย</li>
  <li class="title-z">พื้นที่ให้บริการ กรุงเทพปริมณฑล</li>
</ul>


</div>
</div>



<br>

</div>




<div class="clearfix"></div>
<br>
<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">	
  $('#datepicker').datepicker();
</script>

<script type="text/javascript"> 
$('.selectpicker').selectpicker();
</script>
<script type='text/javascript' src='/js/quicksilver.js'></script>

<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>

<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
