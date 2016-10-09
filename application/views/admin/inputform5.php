<?php
$this->session->set_userdata('last_page','5');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/admin/changePage1', $attributes);
//$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
//$email=$user_data->email;
//echo $email;
$user_id=$this->post->AdminCheckPost('user_id');
$query=$this->db->query('select email from users where id="'.$user_id.'"');
$rowEmail=$query->row();
$email=$rowEmail->email;
$email=str_replace("facebook|","",$email);
$email=str_replace("google|","",$email);
$Email1=$this->post->AdminCheckPost('Email1');
$Token=$this->session->userdata('token');
$query=$this->db->query('select POID from Post Where Token="'.$Token.'"');
$row=$query->row();
$POID=$row->POID;
if ($Email1!=null or $Email1!=""){
	$email=$Email1;
	$this->db->query('Update Post set Email1="'.$email.'" Where Token="'.$Token.'"');
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
              <li><input class="form-control" name="Telephone1" id="Telephone1" type="text" placeholder="081xxxxxxx" value="<?=$this->post->AdminCheckPost('Telephone1')?>" onchange="updatePost('Telephone1')" OnKeyPress="return chkNumber(this)"></li>
              <li>
                <label>
                  &nbsp;
                </label>
              </li>
            </ul>
            <ul class="list-inline padding-top1">
              <li class="width-100"><h5>มือถือ 2 </h5></li>
              <li><input class="form-control" type="text" name="Telephone2" id="Telephone2" placeholder="089xxxxxxx" value="<?=$this->post->AdminCheckPost('Telephone2')?>" onchange="updatePost('Telephone2')" OnKeyPress="return chkNumber(this)"></li>
              <li>
                <label>
                  <input type="checkbox" name="AgreeTelephone2" class="display-none" id="AgreeTelephone2"  value="<?=$this->post->AdminCheckPost('AgreeTelephone2')?>" <?php if ($this->post->AdminCheckPost('AgreeTelephone2')==1){echo "checked";};?> onclick="changeValue2('AgreeTelephone2')"> เบอร์สำรองหากหมายเลขแรกไม่สามารถติดต่อได้
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
              <li><input class="form-control " name="Email2" id="Email2" type="text" placeholder="Email@gmail.com" value="<?=$this->post->AdminCheckPost('Email2')?>" onchange="updatePost('Email2')"></li>
              <li>
                <label>
					&nbsp;
				</label>
              </li>
            </ul>
             <ul class="list-inline padding-top1">
              <li class="width-100"><h5>ไลน์ ID  </h5></li>
              <li><input class="form-control " name="LineID" id="LineID" type="text" placeholder="Line ID" value="<?=$this->post->AdminCheckPost('LineID')?>" onchange="updatePost('LineID')"></li>
              <li>
                <label>
					&nbsp;
				</label>
              </li>
            </ul>
         
            <br/>
            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="val1('4')" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="location.href = '/zhome/adminViewUnitDetail/<?=$POID;?>'" > สิ้นสุด</button>
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

    
    
