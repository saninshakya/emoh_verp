<?php
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/searchResult', $attributes);
?>
<input type="hidden" value="1" name="TOAdvertising" id="TOAdvertising" value="1">

<div class="home-photo">
    <div class="col-md-12 slogan-word home">
      
       <div class="text-center margin-texthome"><span class="slogan-text" id="hMsg">บ้าน คอนโด เจ้าของขายเอง</span></div>
      <div class="text-center"><span class="slogan-text2" id="sMsg">แนวคิดใหม่ของการซื้อ-เช่า บ้าน คอนโด เพื่อคนไทย</span></div>
     <br>
    </div>
    <div class="col-md-12 text-center">  
      <div class="text-grey text-center">(Beta Version ซื้อ ขาย เช่า คอนโดมิเนียมเท่านั้น)</div>
      
      <div class="center-block text-center orange-box"><a class="post-text" href="<?php if (!$this->tank_auth->is_logged_in()) {echo '/auth/login2';} else {echo '/zhome/post1/newpost';};?>">
        &nbsp;ลงประกาศฟรี</a></div>
    </div>
     
     

     


    <!ad text-->
    
    <div class="search-box">
      <div class="col-md-3"></div>
      <div class="col-md-6 text-center">
          <div id="b1" class="buy-button pull-left text-center"><a href="#" onclick="document.getElementById('TOAdvertising').value='1';">ซื้อ</a></div>
          <div id="b2" class="rent-button pull-left text-center"><a href="#" onclick="document.getElementById('TOAdvertising').value='3';">เช่า</a></div>
           <input name="namePoint" id="namePoint" class="form-control home-search pull-left margin-left1" type="text" value="" Placeholder=" โครงการ, รถไฟฟ้า, เขต .......">
          <div class="pull-right"><button type="button" class="btn btn-orange" style="width:auto"><a class="white" href="#" onclick="document.getElementById('myform').submit()">ค้นหา</a></button></div>
      </div>
      <div class="col-md-3"></div>
     
    </div>

  
    <!end ad text->

</div>

<br>
<div class="col-md-12 text-center home">
    <br><br>
    <div class="row padding-top1">
      <div class="col-md-2"></div>
      <div class="col-md-8">
	     <div><a href="/zhome/howItWork" class="post-text2">ซื้อ ขาย เช่า กับ ZmyHome </a></div> 
      </div>
      <div class="col-md-2"></div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
       <h2 class="font-responsive">เราแตกต่างจากเว็บอสังหาอื่นๆอย่างไร?</h2>
      </div>
      <div class="col-md-2"></div>
     </div>
     <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
          <h3 class="font-responsive">ZmyHome มุ่งมั่นที่จะทำให้คนไทยซื้อ ขาย หรือเช่าบ้าน ได้อย่างสะดวก รวดเร็ว และประหยัด โดยให้ผู้ลงประกาศให้ข้อมูลที่จำเป็นอย่างครบถ้วน และผู้ซื้อได้ใช้เครื่องมือต่างๆบน ZmyHome เพื่อให้ทั้งผู้ซื้อและผู้ขายเห็นภาพที่แท้จริงของตลาด และตัดสินใจได้ถูกต้อง</h3>
      </div>
      <div class="col-md-2"></div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 text-grey">
          <img src="/img/zhouse1.png">
          <br><br>
              <div><h3 class="text-grey font-responsive"><strong>คนซื้อ</strong> “ดูจากเว็บก็เกือบตัดสินใจซื้อได้เลย”</h3></div>
              
              <div><h3 class="text-grey font-responsive"><strong>เจ้าของ</strong> “ลงข้อมูลครบ เปิดบ้านไม่กี่ครั้งก็ขายได้”</h3></div>
              
        </div>
        



        <div class="col-md-4 text-grey">

              <img src="/img/zhouse2.png">
              <br><br>
              <div><h3 class="text-grey font-responsive"><strong>คนซื้อ</strong> “ต้องโทรถามรายละเอียด กับขอดูรูปตลอด”</h3></div>
              
              <div><h3 class="text-grey font-responsive"><strong>เจ้าของ</strong> “มีคนติดต่อหรือมาดูบ่อย แต่ดูแล้วเงียบ”</h3></div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>
     
</div>

    <!--3columns-->
    <div class="col-md-12 home text-center bg-grey3">
    <div class="clearfix"></div><br>  <br> <br>
    <div class="col-md-2"></div>
    <div class="col-md-8">
         <div class="col-md-12"><h2 class="font-responsive">ทำไมต้อง ZmyHome?</h2></div>
          <div class="clearfix"></div> <br>
         <div class="col-md-4">
           <h3>เครื่องมือมากมายช่วยคุณ</h3>
           <img src="http://blog.zmyhome.com/wp-content/uploads/2015/09/how-it-works-symbols-v4-02.png" alt="เครื่องมือมากมายช่วยคุณ" class="img-responsive" />
           
         </div>
        
         <div class="col-md-4">
            <h3>บนความเข้าใจตลาด</h3>
            <img src="http://blog.zmyhome.com/wp-content/uploads/2015/09/how-it-works-symbols-v4-04.png" alt="บนความเข้าใจตลาด" class="img-responsive"/>
          
         </div>

        <div class="col-md-4">
           <h3>สำหรับเจ้าของขายเอง</h3>
           <img src="http://blog.zmyhome.com/wp-content/uploads/2015/09/how-it-works-symbols-v4-06.png" alt="สำหรับเจ้าของขายเอง" class="img-responsive" />
          
        </div>
        <div class="clearfix"></div><br><br><br><br> <br>
    </div>
    <div class="col-md-2"></div>
     </div>
    <br>
    <!--End 3columns-->
    <div class="clearfix"></div>
   
    <!--3columns-->
    <div class="col-md-12  home text-center">
    <br>
    <div class="col-md-2"></div>
    <div class="col-md-8">
          <br><br><br>
          <div class="col-md-4">
            <h2 class="font-responsive">ค้นหาง่าย </h2>
             
            <h3 class="text-grey font-responsive">
               <div class="padding-top1"> ไม่ถูกขึ้นราคา / ขายไปแล้ว</div>
               <div class="padding-top1"> เจ้าของยืนยันข้อมูลทุกหลัง</div><br><br>
              <div><img class-"img-responsive" src="/img/h1-icon.png"></div>
               <br><br><br>
            </h3>
          </div>
          <div class="col-md-4">
            <h2 class="font-responsive">ราคาดี </h2>
            
            
             <h3 class="text-grey font-responsive">
                <div class="padding-top1"> ซื้อขายได้เอง</div>
                <div class="padding-top1"> ไม่ต้องผ่านคนกลาง</div><br><br>
                <div><img class-"img-responsive" src="/img/h2-icon.png"></div>
                <br><br><br>
            </h3>
          </div>
          <div class="col-md-4">
            <h2 class="font-responsive">ตัดสินใจถูกต้อง</h2>
            
            <h3 class="text-grey font-responsive">
                <div class="padding-top1">ด้วยข้อมูล & ตัวชี้วัด</div>
                <div class="padding-top1">ที่มีประโยชน์บน ZmyHome</div><br><br>
                <div><img class-"img-responsive" src="/img/h3-icon.png"></div>
                <br><br><br>
            </h3>
          </div>
    </div>
    <div class="col-md-2"></div>
    
    <!--End 3columns-->
</div>

<div class="col-md-12 home text-center">
       
      <br>
      <br>
      <div class="center-block text-center orange-box">
        <a class="post-text" href="<?php if (!$this->tank_auth->is_logged_in()) {echo '/auth/login2';} else {echo '/zhome/post1/newpost';};?>">
        &nbsp;ลงประกาศทันที</a>
      </div>
</div>
<br><br><br>

<div class="clearfix"></div>



<br><br><br>