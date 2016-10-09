<?php
$this->session->set_userdata('last_page','4');
$unit_token=$this->session->userdata('token');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
?>
<p id="testwidth"></p>
<input type="hidden" name="key_change" id="key_change" value="5">
<input type="hidden" name="last_page" id="last_page" value="4">
<input type="hidden" name="unit_token" id="unit_token" value="<?=$unit_token;?>">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $this->tank_auth->get_user_id(); ?>" >
<input type="hidden" id="poid" name="poid" value="<?php echo $POID; ?>" >
<input type="hidden" id="imgType" name="imgType">
<!-- popup to crop image -->
<input id="file" type="file"/>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:1300px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
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
<?php
	 if ($this->agent->is_mobile()){
?>
<div class="col-md-7 col-md-push-2">
<h3 class="text-primary">คุณใช้โทรศัพท์ในการส่งรูปกรุณารอจนกว่ารูปจะแสดงผล</h3>
</div>
<?php
	}
?>
<div class="container">
        <div class="row">
          <div class="col-md-7 col-md-push-2">
            <h3 class="text-primary">รูปถ่าย</h3>
            <div>
                <div class="text-primary big2">ภาพถ่ายที่ดีทำให้ขายได้เร็ว และภาพถ่ายแนวกว้าง (Pano) แสดงที่ว่างในห้องได้ชัดเจน</div>

        <hr/>

            <div class="row">
              <div class="col-md-12">
                <ul class="list-inline">
                          <li><h5><?=$qLabel['room_picture'][0];?></h5></li>
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
					echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
					echo '<img  style="height:180px; width:auto;" alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>';
					echo '<div>';
					echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					//echo $elem;
				}

            ?>
         
            <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
             <div class="col-md-6 col-xs-12 clicker pull-left ">
		           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
		           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
		                        <div class="" style="position:relative; height:200px">
		                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
		                            <div id="waiting4"></div>   
		                            <!--<div class="col-md-12 col-xs-12">
                                     <h5 class="text-red"><?=$qLabel['room_picture_add'][0];?></h5>
		                            </div>-->
		                             
		                          </div>
		                          <div class="col-md-12 col-xs-12">
		                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
		                           </div>
		                        </div>

						
						
					
						 </a>
                    </div>
		     
			 </div>
		    </form>



            </div>
            <hr/>


            <div class="row">
              <div class="col-md-12">
                <ul class="list-inline">
                          <li><h5><?=$qLabel['central_picture'][0];?></h5></li>
                          <li></li>
                </ul>
              </div>
        
             <?php
            	foreach ($imgFac->result() as $row)
				{
					//echo $row->file;

					$imgid = $row->ImgID;
					echo  '<div class="col-md-6" id="'."img".$imgid.'">';
					echo '<div class="thumbnail drop-shadow imgContainer nclick">';
					echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="false" id="'."delImg".$imgid.'"></span>';
					echo '<img height="130px" style="height:200px; width:auto;" alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>';
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

      


          <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
             <div class="col-md-6 col-xs-12 clicker pull-left">
                <div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto3" onmouseover="show_title('<?=$qLabel['central_picture_title'][0];?>');" onmouseout="hide_title();">
                   <a href="#" class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none cursor" style="position: relative;overflow: hidden;  "> 
                            <div class="" style="position:relative; height:200px">
                                <div class="col-md-12 col-xs-12" style="position:absolute;  top:135px; position: absolute;position: absolute; left: 35%;"> 
                                     <div id="waiting6"></div>   
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload3[]" id="filesToUpload3" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "facilities";'/>
                                </div>
                            </div>

            
            
          
                   </a>
                </div>
         
            </div>
          </form>

          </div>

                

          		
       
            <hr>
            <div class="row">

              <div class="col-md-12"><h5><?=$qLabel['select_picture'][0];?></h5>
              </div>

           

            </div>
            <br/>
          


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
       <div class="height20 visible-xs visible-sm"></div>
       <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
           <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
       </div>
      <hr>
      <div class="row">

        <div class="col-xs-6 col-md-5 col-lg-3">
          <button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1(3)">ก่อนหน้า</button>
        </div>
        <div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
          <button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1(5)">ถัดไป</button>
        </div>
      </div>
      <br>

        <!--move-->

             <hr class="hidden-xs hidden-sm">
            <div class="row hidden-xs hidden-sm">

              <div class="col-md-12 "><h5> คำแนะนำในการถ่ายภาพ Panorama</h5></div>
             </div>
             <div class="text-grey hidden-xs hidden-sm">
                   ถ่ายภาพห้องทุกห้องในบ้านด้วยโหมด Pano ณ หัวมุมห้องที่ทแยงกัน คุณจะได้ผู้ซื้อ/ เช่าที่สนใจจริงจากภาพถ่ายที่ดี<br/>
                    1. ยืนให้ชิดมุมห้องที่สุด<br/>
                    2. ตั้งกล้องโทรศัพท์มือถือให้ถ่ายด้วยระบบ Pano โดยถือกล้องแนวตั้ง<br/>
                    3. ถ่ายภาพโดยเริ่มจากผนังที่ชิดหัวไหล่ซ้าย แพนไปจนเห็นถึงผนังที่ชิดหัวไหล่ขวา<br/>
                    4. ทำซ้ำขั้นตอนกับทุมที่ทแยงกัน<br/>
                    5. ถ่ายภาพวิวของแต่ละห้อง (ถ้ามี)
                    <br><br>
             </div>
                <br/>
                <ul class="list-inline hidden-xs hidden-sm">
                    <li class="pull-left"><img class="img-responsive" src="/img/room-normal.png"></li>
                    <li class="pull-right"><img class="img-responsive" src="/img/room-pano.png"></li>
                </ul>
                <div class="clearfix"></div>
        </div>
            <hr class="hidden-xs hidden-sm">
        <div class="row hidden-xs hidden-sm">
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


        <div class="col-md-12 text-center hidden-xs hidden-sm">
          <button type="button" class="btn btn-green btn-lg"><a href="#">จ้างถ่ายภาพ Pano โทร 02-661-5001<br>ค่าบริการ 500บาท ต่อ 1 ห้องนอน </a></button>
        </div>

        <!--end move-->
        <div class="clearfix"></div>


        <br>
      </div>

      <div class="col-md-3 col-md-push-2 property-info hidden-xs hidden-sm">
              <div class="text-center">
                 <h3 class="z-tip">รูปถ่ายครบ-สวย<div class="padding-tip-top">
     ได้ผู้ซื้อที่สนใจจริง</div></h3>
                 <br>
                <div class="savetime">ประหยัดเวลาขึ้น</div>


                <div><img src="/img/clock-25.png" class="img-responsive center-block"></div>
                <div id="title_panel" class="center-block display-none" style="width:85%;">
                  <br/>
                  <div><img src="/img/tip.png"></div>
                  <h2 class="z-tip"><?=$qLabel['description'][0];?></h3>
                  <h3 class="z-tip" id="title_detail"></h3>
                </div>
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
            <ul class="nav padding-top8">
              <li><a>เริ่มต้น</a></li>
              <li><a>พื้นฐาน</a></li>
              <li><a>ตั้งราคา</a></li>
              <li class="active"><a>รูปถ่าย</a></li>
              <li><a>การสื่อสาร</a></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="padding-l15"><div>เหลือ <span class="green">1 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
            </ul>
            <img src="/img/ZmyHome_BoostPostAds_SideBanner_pc.jpg" class="img-responsive">
          </aside>
         

          </div>
      </div>
    </div>

    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs display-none">
