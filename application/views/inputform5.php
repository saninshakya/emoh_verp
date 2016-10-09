<?php
$this->session->set_userdata('last_page','5');
$unit_token=$this->session->userdata('token');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
$email=$user_data->email;
$email=str_replace("facebook|","",$email);
$email=str_replace("google|","",$email);
$Email1=$this->post->checkPost('Email1');
if ($Email1!=null or $Email1!=""){
  $email=$Email1;
  $Token=$this->session->userdata('token');
  $this->db->query('Update Post set Email1="'.$email.'" Where Token="'.$Token.'"');
}
?>

<input type="hidden" name="key_change" id="key_change" value="6">
<input type="hidden" name="last_page" id="last_page" value="5">
<input type="hidden" name="unit_token" id="unit_token" value="<?=$unit_token;?>">
<div class="container">
        <div class="row">
 
          
          <div class="col-md-7 col-xs-12 col-md-push-2">
          
         
            <h3 class="text-primary">รายละเอียดการติดต่อ</h3>
            <div class="text-primary big2">กรอกหมายเลขโทรศัพท์มือถือและอีเมลล์ให้มากที่สดเพื่อไม่พลาดการติดต่อ<br/>ยืนยันอย่างน้อย 1 เบอร์โทร และ 1 อีเมลล์ หรือทุกรายการ เพื่อให้ผู้ซื้อติดต่อท่านได้</div><hr>
            <ul class="list-inline padding-top1m">
              <li class="width-100"><h5 id="showTelephone1"><?=$qLabel['telephone1'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="Telephone1" id="Telephone1" type="text" placeholder="081xxxxxxx" value="<?=$this->post->checkPost('Telephone1')?>" onchange="updatePost('Telephone1')" OnKeyPress="return chkNumber(this)"></li>
             
            </ul>
            <ul class="list-inline padding-top1m" onmouseover="show_title('<?=$qLabel['telephone2_title'][0];?>');" onmouseout="hide_title();">
              <li class="width-100"><h5><?=$qLabel['telephone2'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" type="text" name="Telephone2" id="Telephone2" placeholder="089xxxxxxx" value="<?=$this->post->checkPost('Telephone2')?>" onchange="updatePost('Telephone2')" OnKeyPress="return chkNumber(this)"></li>
              <li>
                <label>
                  <input type="checkbox" name="AgreeTelephone2" class="display-none" id="AgreeTelephone2"  value="<?=$this->post->checkPost('AgreeTelephone2')?>" <?php if ($this->post->checkPost('AgreeTelephone2')==1){echo "checked";};?> onclick="changeValue2('AgreeTelephone2')">
                </label>
              </li>
            </ul>
            <ul class="list-inline padding-top1m">
              <li class="width-100"><h5 id="showEmail1"><?=$qLabel['email1'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="Email1" id="Email1" type="text" placeholder="Email@hotmail.com"  onchange="updatePost('Email1')" value="<?=$email;?>"></li>
              
            </ul>
          
            <ul class="list-inline padding-top1m">
              <li class="width-100"><h5><?=$qLabel['email2'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="Email2" id="Email2" type="text" placeholder="Email@gmail.com" value="<?=$this->post->checkPost('Email2')?>" onchange="updatePost('Email2')"></li>
              
            </ul>
             <ul class="list-inline padding-top1m">
              <li class="width-100"><h5><?=$qLabel['line_id'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="LineID" id="LineID" type="text" placeholder="Line ID" value="<?=$this->post->checkPost('LineID')?>" onchange="updatePost('LineID')"></li>
              <li>
                <label>
          &nbsp;
        </label>
              </li>
            </ul>

            
             <div class="clearfix"></div>
             <div class="height20 visible-xs visible-sm"></div>
             <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
                 <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
             </div>
            <hr>
            <div class="row">

              <div class="col-xs-6 col-md-5 col-lg-3">
                <button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1(4)">ก่อนหน้า</button> 
              </div>              
              <div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
                <button type="button" class="btn btn-warning col-xs-12 text-white" data-toggle="modal" data-target="#addLine">ถัดไป</button>
              </div>
            </div>

            
            <div class="clearfix"></div>
            <br>
          </div>
          <div class="col-md-3 col-md-push-2 property-info hidden-xs">
              <div class="text-center">
              <h3 class="z-tip">เบอร์ติดต่อ&ไลน์ครบ<div class="padding-tip-top">ไม่พลาดโอกาส</div>
              </h3>
                 <br>
                <div class="savetime">ประหยัดเวลาขึ้น</div>
                 
            
            
                <div><img src="/img/clock-60.png" class="img-responsive center-block"></div>
                <div id="title_panel" class="center-block display-none" style="width:85%;">
                  <br/>
                  <div><img src="/img/tip.png"></div>
                  <h2 class="z-tip"><?=$qLabel['description'][0];?></h3>
                  <h3 class="z-tip" id="title_detail"></h3>
                </div>
              <div class="display-none">
                <hr/>
                <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                <h5>Download App</h5>
                <p>ไม่พลาดโอกาสสื่อสารกับผู้ซื้อ<br/>
    และอัพเดดราคาทรัพย์สินได้ทันที</p>
              </div>
            </div>

          
          </div>
          <aside class="col-md-2 col-md-pull-10 hidden-xs">
            <ul class="nav padding-top8">
              <li><a>เริ่มต้น</a></li>
              <li><a>พื้นฐาน</a></li>
              <li><a>ตั้งราคา</a></li>
              <li><a>รูปถ่าย</a></li>
              <li class="active"><a>การสื่อสาร</a></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="padding-l15"><div><span class="green">ขั้นตอนสุดท้าย</span></div></li>
            </ul>
            <img src="/img/ZmyHome_BoostPostAds_SideBanner_pc.jpg" class="img-responsive">
            
          </aside>

          </div>
      </div>
    </div>

	<!-- Modal -->
	<div id="addLine" class="modal modal-sm fade display-none" style="width:320px;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="text-white padding-none text-center" id="myModalLabel">เพิ่ม ZmyHome เป็นเพื่อน</h4>
				</div>
				<div class="modal-body row text-left">
					<div class="col-md-12 z-line text-center clear-none">
						<span class="text-turq">ขอบคุณที่ลงประกาศกับ ZmyHome</span>
						<br>
						<span class="text-orange">ประกาศจะถูกตรวจสอบและอนุมัติภายใน 1 วัน</span>
						<br><br>
						<span class="text-orange">"ประกาศจะถูกตรวจสอบด่วนภายใน 60 นาที"</span>
						<!--<span class="text-orange">ตรวจสอบและอนุมัติประกาศภายใน 1 วัน</span>
						<br><br>
						<span class="text-orange">"ตรวจสอบด่วนภายใน 60 นาที"</span>-->
						<br>
						<span class="text-turq">เพียงถ่ายรูปโฉนด สัญญาซื้อขาย ฯลฯ ที่แสดงว่าคุณเป็นเจ้าของแล้วส่งมาที่ Line@ZmyHome</span>
					</div>
					<div id="line_add" class="col-md-12 z-line2">
						<img src="/img/zmyhome-qrcode.png" class="img-responsive"></img>
						<div id="line_add_pc" class=""><h5 class="text-center">สแกนด้วย QR Code</h5></div>
						<div id="line_add_mb" class=""><h3 class="text-center"><a href="http://line.me/ti/p/%40zmyhome" title="คลิกเพื่อ Add Line"><span class="text-red">เพิ่ม  ZmyHome เป็นเพื่อน</span></a></h3></div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12 col-xs-12 padding-top1m0"><button id="line-bt" type="button" class="btn btn-orange btn-block text-white font16" onclick="submitForm();">ยืนยันการบันทึกข้อมูล</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<!--End Modal-->
