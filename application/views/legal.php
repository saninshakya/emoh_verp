</div>
<div class="row padding-none">
  <div class="cpl-lg-12 col-md-12 legal-page photographer">
    <br>
    <h1 class="text-grey margin-t100 pull-right visible-xs visible-sm">ทำสัญญาด้วยทนาย มั่นใจกว่า<br>เริ่ม 3,000 บาท</h1>
    <h1 class="text-grey margin-t100 visible-lg visible-md pull-right" style="padding-right:200px; line-height: 60px;">ทำสัญญาด้วยทนาย มั่นใจกว่า<br>เริ่ม 3,000 บาท</h1>
  </div>

</div>

<div class="container font18">
<br class="hidden-xs hidden-sm">
</br>

<?php
$attributes = array('class' => 'form-inline', 'id' => 'legal_form');
echo form_open('/zhome/saveLegal', $attributes);
?>
<div class="row">
  <div class="col-lg-4 col-lg-push-1 col-md-4 col-md-push-1 photographer">
   <h2 class="text-grey">กรุณากรอกข้อมูล</h2>
   <br>

   <div>เลือกบริการที่ต้องการ*</div>

   <select class="form-control selectpicker"  name="package" data-style="btn-zmyhome" data-width="100%">
               <option class="col-xs-12" value="0" selected="selected" disabled="disabled">โปรดเลือก</option>
               <option class="col-xs-12" value="1">ทำสัญญาเช่า</option>
               <option class="col-xs-12" value="2">ทำเช็คลิสต์ เฟอร์นิเจอร์ และความเสียหาย</option>
               <option class="col-xs-12" value="3">ทำสัญญาจะซื้อจะขาย</option>
               <option class="col-xs-12" value="4">ตรวจสอบค่าโอน - ภาษี ณ กรมที่ดิน</option>
               <option class="col-xs-12" value="5">โอนกรรมสิทธิ ณ กรมที่ดิน</option>
               <option class="col-xs-12" value="6">ดำเนินการขอรังวัด</option>
               <option class="col-xs-12" value="7">คัดสำเนาโฉนด ตรวจสอบกรรมสิทธิ</option>
               <option class="col-xs-12" value="8">โอนมิเตอร์ไฟฟ้า</option>
               <option class="col-xs-12" value="9">โอนมิเตอร์ประปา</option>
    </select>
   <div class="clearfix"></div>
   <br>


   <div>วันที่ต้องการให้ดำเนินการ*</div>
   <div class="input-group date w100p" data-provide="datepicker">
    <input type="text" class="form-control input-z w100p" name="selected_date" id="datepicker" data-width="100%">
    <div class="input-group-addon padding-t5">
      <span class="glyphicon glyphicon-th"></span>
    </div>
  </div>

  <div class="clearfix"></div>
  <br>

  
  <div>บ้านเลขที่*</div>
  <input class="form-control input-z  w100p" name="house_number">
  <div class="clearfix"></div>
  <br>

  <div>โครงการ / ที่อยู่*</div>
  <input class="form-control input-z   w100p" placeholder="ระบุ" name="project">
  <div class="clearfix"></div>
  <br>

  <div>ชื่อ-นามสกุล*</div>
  <input class="form-control input-z  w100p" name="fullname">
  <div class="clearfix"></div>
  <br>


  <div>เบอร์ติดต่อ*</div>
  <input class="form-control input-z  w100p" placeholder="ระบุ" name="contact_no">
  <div class="clearfix"></div>
  <br>

  <div>อีเมลล์*</div>
  <input class="form-control input-z  w100p" name="email">
  <div class="clearfix"></div>
  <br>

  <button class="form-control input-z text-white bg-orange-hd w100p" name="btn-legal">ชำระค่าบริการ</button>
  <br>
</div>
<?php echo form_close(); ?>
<div class="col-lg-6 col-lg-push-1 col-md-6 col-md-push-1 padding-left-clear-mobile">
  <div class="pull-left"></div>   
  <div class="pull-right"> <span> thai</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="">eng</span></div>
  <div class="clearfix"></div>

  <ol>
   <li class="title-z">
    <div class="pull-left">ทำสัญญาเช่า</div>   
    <div class="pull-right"> <span> 3,000</span>&nbsp;&nbsp; <span class="">5,000</span></div>
    <div class="clearfix"></div>

  </li>
  <li class="title-z">
   <div class="pull-left">ทำเช็คลิสต์ เฟอร์นิเจอร์ และความเสียหาย</div>
   <div class="pull-right"><span> 4,000</span>&nbsp;&nbsp; <span class="">4,000</span></div>
   <div class="clearfix"></div>
 </li>
 <li class="title-z">
  <div class="pull-left">ทำสัญญาจะซื้อจะขาย</div>
  <div class="pull-right"><span> 3,000</span>&nbsp;&nbsp; <span class="">5,000</span></div>
  <div class="clearfix"></div>
</li>
<li class="title-z">
  <div class="pull-left">ตรวจสอบค่าโอน - ภาษี ณ กรมที่ดิน</div>
  <div class="pull-right"><span> 2,000</span></div>
  <div class="clearfix"></div>
</li>
<li class="title-z">
  <div class="pull-left">โอนกรรมสิทธิ ณ กรมที่ดิน</div>
  <div class="pull-right"><span>6,000</span></div>
  <div class="clearfix"></div>
  <div class="pull-left title-z">- ค่ารับส่งเอกสาร</div>
  <div class="pull-right title-z"><span>300</span></div>
  <div class="clearfix"></div>
  <div class="pull-left title-z">- ค่าเดินทาง</div>
  <div class="pull-right title-z"><span>500</span></div>
  <div class="clearfix"></div>
</li>
<li class="title-z">
  <div class="pull-left">ดำเนินการขอรังวัด</div>
  <div class="pull-right"><span>8,000</span></div>
  <div class="clearfix"></div>
</li>
<li class="title-z">
  <div class="pull-left">คัดสำเนาโฉนด ตรวจสอบกรรมสิทธิ</div>
  <div class="pull-right"><span>2,000</span></div>
  <div class="clearfix"></div>
  <div class="pull-left title-z">- ค่าเดินทาง</div>
  <div class="pull-right title-z"><span>500</span></div>
  <div class="clearfix"></div>
</li>
<li class="title-z">
  <div class="pull-left">โอนมิเตอร์ไฟฟ้า</div>
  <div class="pull-right"><span> 3,000</span></div>
  <div class="clearfix"></div>
</li>
<li class="title-z">
  <div class="pull-left">โอนมิเตอร์ประปา</div>
  <div class="pull-right"><span> 3,000</span></div>
  <div class="clearfix"></div>
</li>
</ol>

<div class="col-md-12 title-z">
 ค่าบริการยังไม่รวมค่าธรรมเนียม ภาษี และค่าใช้จ่ายอื่นๆที่เกิดขึ้นในกระบวนการทั้งหมด
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

<div class="col-md-12 title-z">
 สอบถามเพิ่มเติม 081-173-7700, Line@zmyhome <br> ระหว่างวันจันทร์ - ศุกร์ 8.30-20.00 น.
</div>


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
