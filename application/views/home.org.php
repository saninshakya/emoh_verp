<?php
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/searchResult', $attributes);
?>
<input type="hidden" name="TOAdvertising" id="TOAdvertising" value="4">

<div class="home-photo margin-t50">
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
     
    
    <div class="search-box">
      <div class="col-md-3"></div>
      <div class="col-md-6 text-center">
          <div id="b1" class="buy-button pull-left text-center" style="cursor:pointer;" onclick="document.getElementById('TOAdvertising').value='4';"><a href="#1"><strong>ซื้อ</strong></a></div>
          <div id="b2" class="rent-button pull-left text-center" style="cursor:pointer;" onclick="document.getElementById('TOAdvertising').value='5';"><a href="#2"><strong>เช่า</strong></a></div>
           <input name="namePoint" id="namePoint" class="form-control home-search pull-left margin-left1" type="text" value="" Placeholder="โครงการ,รถไฟฟ้า" onkeypress="return checkSearch();">
          <div class="pull-right" id="btnSubmit"><button type="button" class="btn btn-orange" style="width:auto;cursor:pointer;"><a class="home-white" href="#">ค้นหา</a></button></div>
      </div>
      <div class="col-md-3"></div>
     
    </div>

</div>

<br>
<div class="col-md-12 text-center home">
    <br><br>
    <div class="row padding-top1">
      <div class="col-md-2"></div>
      <div class="col-md-8">
       <div><a href="/zhome/howItWork" class="post-text2"><h1>ซื้อ ขาย เช่า กับ ZmyHome</h1></a></div> 
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
          <img src="/img/zhouse1.png" alt="ดูจากเว็บก็เกือบตัดสินใจซื้อได้เลย">
          <br><br>
              <div><h3 class="text-grey font-responsive"><strong>คนซื้อ</strong> “ดูจากเว็บก็เกือบตัดสินใจซื้อได้เลย”</h3></div>
              
              <div><h3 class="text-grey font-responsive"><strong>เจ้าของ</strong> “ลงข้อมูลครบ เปิดบ้านไม่กี่ครั้งก็ขายได้”</h3></div>
              
        </div>
        



        <div class="col-md-4 text-grey">

              <img src="/img/zhouse2.png" alt="ต้องโทรถามรายละเอียด">
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
           <img src="/img/how-it-works-symbols-02.png" alt="เครื่องมือมากมายช่วยคุณ" class="img-responsive center-block" />
           
         </div>
        
         <div class="col-md-4">
            <h3>บนความเข้าใจตลาด</h3>
            <img src="/img/how-it-works-symbols-04.png" alt="บนความเข้าใจตลาด" class="img-responsive center-block"/>
          
         </div>

        <div class="col-md-4">
           <h3>สำหรับเจ้าของขายเอง</h3>
           <img src="/img/how-it-works-symbols-06.png" alt="สำหรับเจ้าของขายเอง" class="img-responsive center-block" />
          
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
              <div><img class="img-responsive center-block" src="/img/h1-icon.png" alt="เจ้าของยืนยันข้อมูลทุกหลัง"></div>
               <br><br><br>
            </h3>
          </div>
          <div class="col-md-4">
            <h2 class="font-responsive">ราคาดี </h2>
            
            
             <h3 class="text-grey font-responsive">
                <div class="padding-top1"> ซื้อขายได้เอง</div>
                <div class="padding-top1"> ไม่ต้องผ่านคนกลาง</div><br><br>
                <div><img class="img-responsive center-block"  src="/img/h2-icon.png" alt="ซื้อขายได้เอง ไม่ต้องผ่านคนกลาง"></div>
                <br><br><br>
            </h3>
          </div>
          <div class="col-md-4">
            <h2 class="font-responsive">ตัดสินใจถูกต้อง</h2>
            
            <h3 class="text-grey font-responsive">
                <div class="padding-top1">ด้วยข้อมูล & ตัวชี้วัด</div>
                <div class="padding-top1">ที่มีประโยชน์บน ZmyHome</div><br><br>
                <div><img class="img-responsive center-block" src="/img/h3-icon.png" alt="ข้อมูล & ตัวชี้วัดที่มีประโยชน์"></div>
                <br><br><br>
            </h3>
          </div>
    </div>
    <div class="col-md-2"></div>
    
    <!--End 3columns-->
</div>


<br><br><br>

<div class="clearfix"></div>
<div class="bg-grey3">
<div class="clearfix"></div>
<div class="col-md-12">
  <br>
  <div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดขายและให้เช่าในกรุงเทพฯ ตามสถานีรถไฟฟ้าบีทีเอส</h2></div>
  <div class="clearfix"></div>
  <div class="col-md-2"></div>
  <div class="col-md-8 col-xs-12">
  <?php
    $Status="";
    foreach ($BTS->result() as $row){
      if($row->Status!=$Status){
        if($row->Status==1){
          $Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";
          $Status_color="text-blue";
        }else{
          $Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";
          $Status_color="text-red";
        }
        echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";
      }
      $KeyNameAnchor=str_replace(" ","-",$row->KeyName);
	  $KeyNameAnchor=str_replace("(","",$KeyNameAnchor);
	  $KeyNameAnchor=str_replace(")","",$KeyNameAnchor);
  ?>
      <div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>#<?$row->KeyName;?>" class="text-grey"><?=$row->KeyName;?></a></div>
  <?
      if($row->Status!=$Status){
        $Status=$row->Status;
      }
    }
  ?>
  </div>
  <div class="col-md-2"></div>
  <div class="clearfix"></div>
  <div class="col-md-2"></div>
  <div class="col-md-8 col-xs-12">
	<div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/BTS" class="text-blue">ดูรายชื่อโครงการใกล้ BTS</a></div>
  </div>
  <div class="col-md-2"></div>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
  <br>
  <div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดขายและให้เช่าในกรุงเทพฯ ตามสถานีรถไฟฟ้าเอ็มอาร์ที</h2></div>
  <div class="clearfix"></div>
  <div class="col-md-2"></div>
  <div class="col-md-8 col-xs-12">
  <?php
    $Status="";
    foreach ($MRT->result() as $row){
      if($row->Status!=$Status){
        if($row->Status==1){
          $Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";
          $Status_color="text-blue";
        }else{
          $Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";
          $Status_color="text-red";
        }
        echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";
      }
      $KeyNameAnchor=str_replace(" ","-",$row->KeyName);
	  $KeyNameAnchor=str_replace("(","",$KeyNameAnchor);
	  $KeyNameAnchor=str_replace(")","",$KeyNameAnchor);
  ?>
      <div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>#<?$row->KeyName;?>" class="text-grey"><?=$row->KeyName;?></a></div>
  <?
      if($row->Status!=$Status){
        $Status=$row->Status;
      }
    }

  ?>
  </div>
  <div class="col-md-2"></div>
  <div class="clearfix"></div>
  <div class="col-md-2"></div>
  <div class="col-md-8 col-xs-12">
	<div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/MRT" class="text-blue">ดูรายชื่อโครงการใกล้ MRT</a></div>
  </div>
  <div class="col-md-2"></div>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
  <br>
  <div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดขายและให้เช่าในกรุงเทพฯ ตามสถานีรถไฟแอร์พอร์ทลิ้งค์</h2></div>
  <div class="clearfix"></div>
  <div class="col-md-2"></div>
  <div class="col-md-8 col-xs-12">
    <?php
    $Status="";
    foreach ($ARL->result() as $row){
      if($row->Status!=$Status){
        if($row->Status==1){
          $Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";
          $Status_color="text-blue";
        }else{
          $Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";
          $Status_color="text-red";
        }
        echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";
      }
      $KeyNameAnchor=str_replace(" ","-",$row->KeyName);
	  $KeyNameAnchor=str_replace("(","",$KeyNameAnchor);
	  $KeyNameAnchor=str_replace(")","",$KeyNameAnchor);
  ?>
      <div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>#<?$row->KeyName;?>" class="text-grey"><?=$row->KeyName;?></a></div>
  <?
      if($row->Status!=$Status){
        $Status=$row->Status;
      }
    }
  ?>
  </div>
  <div class="col-md-2"></div>
  <div class="clearfix"></div>
  <div class="col-md-2"></div>
  <div class="col-md-8 col-xs-12">
	<div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/ARL" class="text-blue">ดูรายชื่อโครงการใกล้ ARL</a></div>
  </div>
  <div class="col-md-2"></div>
</div>
<div class="clearfix"></div>
<br>
<div class="col-md-12">
  <br>
  <div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดในกรุงเทพฯ ตามราคา</h2></div>
  <div class="clearfix"></div><br>
  <div class="col-md-2"></div>
  <div class="col-md-8 col-xs-12">
    <?php
    for($i=0;$i<10;$i++){
      $KeyNameAnchor="BTS-อนุสาวรีย์ชัย";
      $minPrice=$i*1000000;
      $maxPrice=($i+1)*1000000;
      $minPriceShow=$i."ล้าน";
      $maxPriceShow=($i+1)."ล้าน";
  ?>
      <div class="col-md-3 col-sm-6 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/<?=$minPrice;?>/<?=$maxPrice;?>#" class="text-grey"><?php echo "คอนโดราคา ".$minPriceShow."-".$maxPriceShow;?></a></div>
  <?
    }
  ?>
  <div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/10000000/20000000#" class="text-grey"><?php echo "คอนโดราคา 10ล้าน-20ล้าน";?></a></div>
  <div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/20000000/30000000#" class="text-grey"><?php echo "คอนโดราคา 20ล้าน-30ล้าน";?></a></div>
  <div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/30000000/50000000#" class="text-grey"><?php echo "คอนโดราคา 30ล้าน-50ล้าน";?></a></div>
  <div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/50000000#" class="text-grey"><?php echo "คอนโดราคามากกว่า 50ล้าน";?></a></div>
  </div>
  <div class="col-md-2"></div>
</div>
<div class="clearfix"></div>
<br><br>
<div class="home text-center">
  <div class="text-center orange-box center-block">
          <a class="post-text center-block " href="<?php if (!$this->tank_auth->is_logged_in()) {echo '/auth/login2';} else {echo '/zhome/post1/newpost';};?>">
          &nbsp;ลงประกาศทันที</a>
  </div>
</div>


<div class="clearfix">&nbsp;</div>
<br><br>






