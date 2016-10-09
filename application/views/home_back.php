<?php
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/searchResult', $attributes);
?>
<input type="hidden" value="1" name="TOAdvertising" id="TOAdvertising" value="1">

<div class="home-photo">
    <div class="col-md-12 slogan-word home">
      
       <div class="text-center margin-texthome"><span class="slogan-text" id="hMsg">ซื้อ / เช่า จากเจ้าของตัวจริง</span></div>
      <div class="text-center"><span class="slogan-text2" id="sMsg">มาตรฐานใหม่ของตลาดบ้านและคอนโดมิเนียม โดยคนไทยเพื่อคนไทย</span></div>
     <br>
    </div>
    <div class="col-md-12 text-center">  
      <div class="center-block text-center orange-box"><a class="post-text" href="<?php if (!$this->tank_auth->is_logged_in()) {echo '/auth/login2';} else {echo '/zhome/post1/newpost';};?>">
        &nbsp;ลงประกาศ</a></div>
     </div>

    <div class="col-md-12 search-box" style="visibility: hidden">
      <div class="col-md-4"></div>
      <div class="col-md-4">
          <div id="b1" class="buy-button pull-left text-center"><a href="#" onclick="document.getElementById('TOAdvertising').value='1';">ซื้อ</a></div>
          <div id="b2" class="rent-button pull-left text-center"><a href="#" onclick="document.getElementById('TOAdvertising').value='3';">เช่า</a></div>
           <input name="namePoint" id="namePoint" class="home-search pull-left margin-left1" type="text" value="" Placeholder="โครงการ, รถไฟฟ้า, เขต .......">
          
          <div class="search-button pull-left"><a class="white" href="#" onclick="document.getElementById('myform').submit()">ค้นหา</a></div>
      </div>
      <div class="col-md-4"></div>
    </div>

    <!ad text-->
    <div class="ad-box text-center">
      <div class="col-md-1"></div>
      <div class="col-md-10 text-center">
      <span class="text-turq2">ลงประกาศด่วน!</span> ก่อนเปิดตัว 30 ก.ย.นี้ รับสิทธิขาย/ให้เช่า <span class="text-turq2">ฟรีตลอดชีพ!*</span></div>
      </div>
      <div class="col-md-1"></div>
    </div>  
    <!end ad text->

</div>
<!--<br><br><br><br>-->
<!--<div class="col-md-12 bg-grey3 home">-->
<!--<br><br>-->
  <!--<div class="col-md-12 text-center"><h2>บ้าน คอนโดน่าลงทุน</h2></div>
  <div class="clearfix"></div>
  <br>-->
  <!--show details-->
  <!--
  <div class="col-md-12">
            <div class="col-md-4">
              <h4 class="text-grey">มิลเลเนียมเรสซิเดนซ์</h4>
              <img src="/img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><span class="text-grey">2 นอน 46 ม<sup>2</sup>. ชั้น 15</span></td>
                  <td><span class="text-primary">B  14.45M</span></td>
                  <td><span class="text-primary">B 138,000</span><span class="text-grey">/ม2.</span></td>
                </tr>
                <tr>
                  <td><span class="text-grey">800 ม. BTS อโศก</span></td>
                  <td><span class="text-blue">5 </span> <img src="/img/sun-icon3.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <h4 class="text-grey">มิลเลเนียมเรสซิเดนซ์</h4>
              <img src="/img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><span class="text-grey">2 นอน 46 ม<sup>2</sup>. ชั้น 15</span></td>
                  <td><span class="text-primary">B  14.45M</span></td>
                  <td><span class="text-primary">B 138,000</span><span class="text-grey">/ม2.</span></td>
                </tr>
                <tr>
                  <td><span class="text-grey">800 ม. BTS อโศก</span></td>
                  <td><span class="text-blue">5 </span> <img src="img/sun-icon3.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <h4 class="text-grey">มิลเลเนียมเรสซิเดนซ์</h4>
              <img src="/img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><span class="text-grey">2 นอน 46 ม<sup>2</sup>. ชั้น 15</span></td>
                  <td><span class="text-primary">B  14.45M</span></td>
                  <td><span class="text-primary">B 138,000</span><span class="text-grey">/ม2.</span></td>
                </tr>
                <tr>
                  <td><span class="text-grey">800 ม. BTS อโศก</span></td>
                  <td><span class="text-blue">5 </span> <img src="/img/sun-icon3.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
  </div>
  <div class="col-md-12">
            <div class="col-md-4">
              <h4 class="text-grey">Park 24 (ขายดาวน์)</h4>
              <img src="/img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><span class="text-grey">2 นอน 46 ม<sup>2</sup>. ชั้น 15</span></td>
                  <td><span class="text-primary">B  14.45M</span></td>
                  <td><span class="text-primary">B 138,000</span><span class="text-grey">/ม2.</span></td>
                </tr>
                <tr>
                  <td><span class="text-grey">800 ม. BTS อโศก</span></td>
                  <td><span class="text-blue">5 </span> <img src="/img/sun-icon3.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <h4 class="text-grey">Rythm Sukhumvit 38 (ขายดาวน์)</h4>
              <img src="/img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><span class="text-grey">2 นอน 46 ม<sup>2</sup>. ชั้น 15</span></td>
                  <td><span class="text-primary">B  14.45M</span></td>
                  <td><span class="text-primary">B 138,000</span><span class="text-grey">/ม2.</span></td>
                </tr>
                <tr>
                  <td><span class="text-grey">800 ม. BTS อโศก</span></td>
                  <td><span class="text-blue">5 </span> <img src="img/sun-icon3.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <h4 class="text-grey">Ashton Asoke (ขายดาวน์)</h4>
              <img src="/img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><span class="text-grey">2 นอน 46 ม<sup>2</sup>. ชั้น 15</span></td>
                  <td><span class="text-primary">B  14.45M</span></td>
                  <td><span class="text-primary">B 138,000</span><span class="text-grey">/ม2.</span></td>
                </tr>
                <tr>
                  <td><span class="text-grey">800 ม. BTS อโศก</span></td>
                  <td><span class="text-blue">5 </span> <img src="/img/sun-icon3.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
  </div>  -->
  <!--end details-->

<!--</div>-->

<br>
<div class="col-md-12 text-center home">
    <br><br>
    <div class="row padding-top1">
      <h2>เราคือใคร</h2>
      <div class="col-md-2"></div>
      <div class="col-md-8">
          <h3>“Z Home เป็นตลาดบ้านและคอนโดที่มุ่งมั่นจะเป็นฐานข้อมูลที่อยู่อาศัยให้กับคนไทย”</h3>
          <br>
          <h4 class="text-grey">ผู้ขายบน Z Home ลงประกาศอย่างครบถ้วน ตามมาตรฐานสากลเพื่อใหผู้ใช้ทุกคนซื้อ-ขายบ้านได้ง่าย</h4>
      </div>
      <div class="col-md-2"></div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 text-grey">
          <img src="/img/zhouse1.png">
              <div><strong>คนซื้อ</strong> “ดูจากเว็บก็เกือบตัดสินใจซื้อได้เลย”</div>
              <div><strong>เจ้าของ</strong> “ลงข้อมูลครบเปิดบ้านไม่กี่ครั้งก็ขายได้”</div>
        </div>
        <div class="col-md-4 text-grey">
              <img src="/img/zhouse2.png">
              <div><strong>คนซื้อ</strong> “ต้องโทรถามรายละเอียด กับขอดูรูปตลอด”</div>
              <div><strong>เจ้าของ</strong> “คนโทรกลับมาดูบ่อย แต่ดูแล้วเงียบหมด”</div>
        </div>
        <div class="col-md-2"></div>
    </div>
     <br><br><br>
</div>
    <!--3columns-->
    <div class="col-md-12 bg-grey3 home text-center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
          <br><br>
          <div class="col-md-4">
            <h3>ค้นหาง่าย </h3>
             <br>
            <h4 class="text-grey">ไม่ถูกขึ้นราคา / ขายไปแล้ว<br>
              เจ้าของยืนยันข้อมูลทุกหลัง<br><br><br>
              <div><img class-"img-responsive" src="/img/h1-icon.png"></div>
               <br><br><br>
            </h4>
          </div>
          <div class="col-md-4">
            <h3>ราคาดี </h3>
            <br>
            <h4 class="text-grey">ซื้อขายได้เอง<br>
                ไม่ต้องผ่านคนกลาง<br><br><br>
                <div><img class-"img-responsive" src="/img/h2-icon.png"></div>
                <br><br><br>
            </h4>
          </div>
          <div class="col-md-4">
            <h3>ตัดสินใจถูกต้อง</h3>
            <br>
            <h4 class="text-grey">ด้วยข้อมูล & ตัวชี้วัด<br>
                ที่มีประโยชน์บน ZHome<br><br><br>
                <div><img class-"img-responsive" src="/img/h3-icon.png"></div>
                <br><br><br>
            </h4>
          </div>
    </div>
    <div class="col-md-2"></div>
    
    <!--End 3columns-->
</div>

<div class="col-md-12 home text-center">
<br><br>

  <div class="thankz"><!--<a class="text-turq2 margin-right2" href="#" style="margin-right:80px" id="backbtn"><span class="glyphicon glyphicon-chevron-left text-grey2" aria-hidden="true"></span></a>-->   “ขอบคุณ Z Home ที่ช่วยให้เราขายบ้านที่ประกาศมานานกว่า 3 ปีได้สำเร็จ”  <!--<a class="text-turq2 margin-left2" href="#" id="nextbtn"><span class="glyphicon glyphicon-chevron-right text-grey2" aria-hidden="true"></span></a>--></div>

</div>
<br><br>

<div class="clearfix"></div>
<br><br><br>