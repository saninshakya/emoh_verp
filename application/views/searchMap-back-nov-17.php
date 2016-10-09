<?php
$attributes = array('id' => 'myform');
echo form_open('/zhome/unitDetail', $attributes);
if($TOAdvertising==3){
	$unit_baht="บาท";
}else{
	$unit_baht="ล้านบาท";
}
$nowyear=date('Y')+543;
$rowArea=$this->search->getArea($namePoint);
$AreaName=$rowArea->Area;
$AreaUnit=$rowArea->unit;
$ProjectUnit_now=$this->search->getProjectUnit($AreaName,$nowyear,1);
$ProjectUnit_future=$this->search->getProjectUnit($AreaName,$nowyear,0);
?>

<input type="hidden" id="namePoint" name="namePoint" <?php echo 'value="'.$namePoint.'"' ?>>
<input type="hidden" id="toAd" name="toAd" <?php echo 'value="'.$TOAdvertising.'"' ?>>
<input type="hidden" id="nowyear" name="nowyear" <?php echo 'value="'.$nowyear.'"' ?>>
<hr class="border-top-grey">
<div class="n-container">
        <div class="row">  
          <!--menu mobile Add Nov12-->
          <div class="padding-bottom5 container-fluid visible-sm visible-xs">
            <div class="col-md-12 hidebar">
              <div class="pull-left w50 border-right text-center">
                    <input type="text" value="" id="iRefPlace_mb" name="iRefPlace_mb"  placeholder=" รถไฟฟ้า, โครงการ" autocomplete="off" class="form-control">
              </div> 
              <div class="pull-left w25 text-center">
                <button id="showfilter" type="button" class="btn btn-sm2 btn-white-s"> <a id="showfilter" href="#" class="text-orange2">ตัวกรอง</a></button>
              </div>
              <div class="pull-left w25 text-center">
               <button id="show_idetail" type="button" class="btn btn-sm2 btn-white-s"> <a href="#" class="text-orange2">ข้อมูลหมุด</a></button>
              </div>
            </div>
           
            
             <!--Added on Nov17-->
            <div class="idetail display-none">

                    <div class="row">
                      <div class="col-md-12">
                       <div class="col-xs-6"><a id="hide_idetail" href="#" class="text-orange2">ตกลง</a></div>
                       
                       <div class="col-xs-6"><a id="hide_idetail2" href="#" class="text-orange2 pull-right">ยกเลิก</a></div>
                      </div>
                    </div>
                    <hr>
                    <ul class="list-inline">
                     <li class="hilight-on col-xs-6 text-white text-center" id="mprice"><?=$unit_baht;?></li>
                     <li class="hilight-off col-xs-6 text-center" id="mpricem">บาท/ม2.</li>
                    </ul>

              <br>
              <hr>
              <div class="col-md-12 text-center">
                    
                     <div><a href="#">อายุตึก</a></div>
                     <hr > 
                     <div><a href="#">ระยะทางจากรถไฟฟ้า</a></div>
                     <hr>
                     <div><a href="#">ค่าส่วนกลาง</a></div>
                     <hr>
                     <div><a href="#">ที่จอดรถ</a></div>
                     <hr>         
              </div>
            </div>
            <!--End added on Nov17-->
            <div class="filter display-none">
             <br class="hidebar">
             <hr class="hidebar">
             <div class="row">
                <div class="col-md-12">
                 <div class="col-xs-6"><a id="hidefilter" href="#" class="text-orange2">ตกลง</a></div>
                 
                 <div class="col-xs-6"><a id="hidefilter2" href="#" class="text-orange2 pull-right">ยกเลิก</a></div>
                </div>
             </div>
             <div class="clearfix"></div>
             <hr>

             <div class="row">
              <div class="col-md-12">
               <div class="col-xs-4">
                   
                     <label class="checkbox-inline">
                             <input type="checkbox" name="" value="1"><div class="padding-t2">ขาย</div>
                      </label>
                    
               </div>
               <div class="col-xs-4">
                    
                      <label class="checkbox-inline">
                             <input type="checkbox" id="" name="" value="2" > <div class="padding-t2">ขายดาวน์</div>
                      </label>
                    
               </div>
               <div class="col-xs-4">
                      <label class="checkbox-inline">
                             <input type="checkbox" id="" name="" value="3" > <div class="padding-t2">เช่า</div>
                      </label>
                    
               </div>
               </div>
            
             </div>
             <hr>


              <div class="row">
              <div class="col-md-12">
               <div class="col-md-12">ประเภทอาคาร</div>
               <div class="col-xs-4">
                     <label class="checkbox-inline">
                             <input type="checkbox"  checked="checked" value="" > <div class="padding-t2">คอนโด</div>
                      </label>
                   
               </div>
               
              
              </div>
             </div>
             <hr>

             <div class="row">

              <div class="col-md-12">
              <div class="col-md-12">ห้องนอน</div>
              <div class="col-md-12">
              <div class="w20 pull-left">
                    <label class="checkbox-inline">
                             <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">1</div>
                    </label>
                  
              </div>
               <div class="w20 pull-left">
                   <label class="checkbox-inline">
                            <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">2</div>
                   </label>
               </div>
               <div class="w20 pull-left">
                   <label class="checkbox-inline">
                            <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">3</div>
                   </label>
               </div>
               <div class="w20 pull-left">
                 <label class="checkbox-inline">
                            <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">4</div>
                 </label>
               </div>
        
               <div class="w20 pull-left">
                   <label class="checkbox-inline">
                             <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">> 4</div>
                    </label>
               </div>

               </div>
              
             </div>
             </div>
             <hr>

             <div class="row">

              <div class="col-md-12"> 
               <div class="col-md-12">อายุตึก(ไม่เกิน)</div>
               <div class="col-md-12">
               <div class="w20 pull-left">
                    <label class="radio-inline">
                             <input type="radio" name="inlineRadioOptions" value=""> <div class="padding-t2">< 1</div>
                    </label>
                  
              </div>
               <div class="w20 pull-left">
                   <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" value=""> <div class="padding-t2">< 3</div>
                   </label>
               </div>
               <div class="w20 pull-left">
                   <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" value=""> <div class="padding-t2">< 5</div>
                   </label>
               </div>
       
               <div class="w20 pull-left">
                   <label class="radio-inline">
                             <input type="radio" name="inlineRadioOptions" value=""> <div class="padding-t2">< 10</div>
                    </label>
               </div>
                <div class="w20 pull-left">
                   <label class="radio-inline">
                             <input type="radio" name="inlineRadioOptions" value=""> <div class="padding-t2">> 10</div>
                    </label>
               </div>

               </div>
              
             </div>
             </div>
             <hr>
             
              <div class="row">

               <div class="col-md-12"> 
                 <div class="col-md-12">ราคา</div>
                 <div class="col-xs-5 text-center">
                      <input type="text"  value="" id="minPrice" name="minPrice" placeholder="ต่ำสุด" class="form-control">  
                 </div>
                 <div class="col-xs-2 text-right padding-t3 text-center">
                      -
                 </div>
                 <div class="col-xs-5 text-center">
                      <input type="text"   value="" id="maxPrice" name="maxPrice" placeholder="สูงสุด" class="form-control">
                 </div>
               </div>
              </div>

              <hr>

              <div class="row">

              <div class="col-md-12">
              <div class="col-md-12">ห้องน้ำ</div>
              <div class="col-md-12">
              <div class="w20 pull-left">
                    <label class="checkbox-inline">
                             <input type="checkbox" name="inlineRadioOptions" value=""><div class="padding-t2">1</div>
                    </label>
                  
              </div>
               <div class="w20 pull-left">
                   <label class="checkbox-inline">
                            <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">2</div>
                   </label>
               </div>
               <div class="w20 pull-left">
                   <label class="checkbox-inline">
                            <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">3</div>
                   </label>
               </div>
               <div class="w20 pull-left">
                 <label class="checkbox-inline">
                            <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">4</div>
                 </label>
               </div>
               <div class="w20 pull-left">
                   <label class="checkbox-inline">
                             <input type="checkbox" name="inlineRadioOptions" value=""> <div class="padding-t2">5</div>
                    </label>
               </div>
               </div>
              
             </div>
             </div>
             <hr>

             <div class="row">

              <div class="col-md-12">
               <div class="col-md-12">ขนาด (ม2.)</div>
                <div class="col-xs-5 text-center">
                      <input type="text"  value="" id="minPrice" name="minPrice" placeholder="ต่ำสุด" class="form-control">  
                 </div>
                 <div class="col-xs-2 text-right padding-t3 text-center">
                      -
                 </div>
                 <div class="col-xs-5 text-center">
                      <input type="text"   value="" id="maxPrice" name="maxPrice" placeholder="สูงสุด" class="form-control">
                 </div>
              </div>
             </div>
           
             <hr>

              

              
                
              
           </div>
          </div>
          <!--end menu mobile Add Nov12-->
          <div class="padding-bottom5 container-fluid hidden-sm hidden-xs">
            <div class="col-md-4">
              <div class="pull-left w20">
                <input type="text" value="" id="iDistance" name="iDistance" placeholder="0" class="form-control"> 
              </div>
            
               <div class="pull-left w15 padding-t3 text-center">
                 ม. จาก
              </div>
              <div class="pull-left w65 border-right text-center">
                <input type="text" value="" id="iRefPlace" name="iRefPlace"  placeholder=" เขต, รถไฟฟ้า, โครงการ" autocomplete="off" class="form-control">
              </div>
              
            </div>



            <hr class="visible-xs blank">
           
            <div class="col-md-4 hidden-sm hidden-xs">
               <div class="pull-left w25 border-right text-center">
                <select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sPropType" name="sPropType">
                          <option value="1" selected="selected">คอนโด</option>
                          <!--<option value="2" disabled="disabled">หมู่บ้าน</option>
                          <option value="3" disabled="disabled">ตึกแถว</option>-->
                </select>
              </div>
              <div class="pull-left w25 border-right text-center">
                   <select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sNBdroom" name="sNBdroom">
                          <option value="0">นอน</option>
                          <option value="99">สตูดิโอ</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                   </select>
              </div>
              <div class="pull-left w25 border-right text-center">
                    <select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sPYear" name="sPYear">
                          <option value="0">อายุตึก</option>  
                          <option value="1"> <1ปี</option>
                          <option value="2"> <2ปี</option>
                          <option value="3"> <3ปี</option>
                          <option value="5"> <5ปี</option>
                          <option value="7"> <7ปี</option>
                          <option value="10"> <10ปี</option>
                          <option value="15"> <15ปี</option>
                    </select>
              </div>
              <div class="pull-left w25 border-right text-center">
                  <select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sTypeSale" name="sTypeSale">
                          <option value="1">ขาย</option>
                          <option value="2">ขายดาวน์</option>
                          <option value="3">เช่า</option>
                          <option value="4">ขาย+ขายดาวน์</option>
                  </select>

              </div>
            </div>

            <hr class="visible-xs blank">

            <div class="col-md-4 hidden-sm hidden-xs">
               
                
               <div class="pull-left w30 text-center">
                  <input type="text"  value="" id="minPrice" name="minPrice" placeholder=" ราคาต่ำสุด" class="form-control">  

               </div>
                <div class="pull-left w10 text-right padding-t3 text-center">
                  -
               </div>
               <div class="pull-left w30 border-right text-center">
                  <input type="text"   value="" id="maxPrice" name="maxPrice" placeholder=" ราคาสูงสุด" class="form-control">

               </div>
               
               <div class="pull-left w15 border-right text-center">
                  <input type="checkbox" value=""  data-toggle="modal" data-target=".bs-example-modal-sm"><img src="/img/phone-icon.png">
               </div>
               <div class="pull-left w15 border-right text-center">                   
                  <button id="down" type="button" class="btn btn-sm2 bg-white"><strong>อื่นๆ</strong></button>
               </div>

            </div>
            </div>
          </div>
        </div> 

      <!--end row-->


     
     
      <!--slider menu ---------------->
      <div class="target display-none hidden-sm hidden-xs">
           <div class="row">
                 <br>
                  <h3 class="text-orange text-center">  ฟังก์ชั่นนี้อยู่ในระหว่างการพัฒนา</h3>
                  <br>
                  
                  <br>
                <div class="col-md-2 col-xs-6"></div>
                <div class="col-md-3 col-xs-6"></div>
                <div class="col-md-3 col-xs-6"></div>
                <div class="col-md-3 col-xs-6">
                  <button id="up" type="button" class="bg-white btn-sm3">ยกเลิก</button> &nbsp;
                  <button id="up2" type="button" class="bg-green btn-sm6">บันทึก</button>
                </div>
                <div class="col-md-1"></div>
           </div>
           <div class="clearfix"></div>
           <br/>
           <!--end-row-->
           <div class="row col-md-12 hidden-sm hidden-xs">
               <div class="col-md-2 col-xs-6">
                  คุณสมบัติ
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ชั้น</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>+0</option>
                                <option>+1</option>
                                <option>+2</option>
                                <option>+3</option>
                                <option>+4</option>
                                <option>+5</option>
                                <option>+6</option>
                                <option>+7</option>
                                <option>+8</option>
                                <option>+9</option>
                                <option>+10</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ห้องน้ำ&nbsp;&nbsp;</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>+0</option>
                                <option>+1</option>
                                <option>+2</option>
                                <option>+3</option>
                                <option>+4</option>
                                <option>+5</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ขนาด (ม2.)</li>
                      <li><input type="text" size="8" value="" size="100">
                      </li>
                  </ul>
               </div>
               <div class="col-md-1"></div>
           </div>
          <!--end-row-->
           <div class="row col-md-12">
               <div class="col-md-2">

               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ทิศ</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>ตะวันออก</option>
                                <option>ตะวันออกเฉียงเหนือ</option>
                                <option>ตะวันออกเฉียงใต้</option>
                                <option>เหนือ</option>
                                <option>ใต้</option>
                                <option>ตะวันตกเฉียงเหนือ</option>
                                <option>ตะวันตกเฉียงใต้</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ที่จอดรถ</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>+0</option>
                                <option>+1</option>
                                <option>+2</option>
                                <option>+3</option>
                                <option>+4</option>
                                <option>+5</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-1"></div>
           </div>
           <hr>

           
          <!--end-row-->
          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">วิว</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">วิวแม่น้ำ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">วิวสวนสาธารณะ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">วิวสวนสาธารณะ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>   
               </div>
          </div>
          <!--end-row-->

          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">พื้นที่ใช้สอย</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ห้องมุม</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ฝ้าสูง 2 ชั้น</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ระเบียงใหญ่กว่า 8 ม2.</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>   
               </div>
          </div>
          <!--end-row-->
          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">การตกแต่ง</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">เฟอร์นิเจอร์ครบ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">บิลท์อิน</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ห้องเปล่า</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>   
               </div>
          </div>
          <!--end-row-->
          <hr/>
          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">โครงการ</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">เลี้ยงสัตว์ได้</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ความหนาแน่นต่ำ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ที่จอดรถเกิน 70%</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>

               </div>
          </div>
          <!--end-row-->
          <div class="row">
               <div class="col-md-2">
                  <div class="margin-top1">ลักษณะประกาศ</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ประกาศใหม่</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ลดราคา</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ขายด่วน</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>               
               </div>
          </div>
          <!--end-row-->
          <hr/>  
		<div class="clearfix"></div>
      </div>
      <!--End slider menu -->

        <div class="row">
        	<!-- start map -->
          <div class="col-md-12">
          	<?php echo $map['html']; ?>
          	<!--<div style="position:absolute;top:0px">
                <div class="text-grey text-center padding-top1">
                 <span class="text-primary big">253</span> ยูนิต &nbsp;ผู้ซื้อ <span class="text-primary big">45</span> &nbsp;เฉลี่ย <span class="text-primary big">B93,678</span>/ตร.ม. &nbsp;ประเมิน <span class="text-primary big">B45,321</span>/ม2. &nbsp;&nbsp;ค่าเช่า <span class="text-primary big">678</span>/ม2.&nbsp; Y <span class="text-primary big">7.8%</span>
                </div>
           </div>-->
	<div id="wrapper_map">
           
          	<div id="map_canvas"></div>
			<div id="float_menu">
				<!--<div class="text-grey text-center" style="vertical-align: middle;">
					<div style="vertical-align:top;display:table-cell;"> เขตคลองเตย คอนโด&nbsp; <span class="text-primary big-menumap">19,000</span> ยูนิต &nbsp; <span class="text-primary big-menumap">253</span> ประกาศขาย&nbsp; เฉลี่ย<span class="text-primary big-menumap">&#3647;8.6</span>ล้าน &nbsp; &nbsp;<span class="text-primary big-menumap">&#3647;93,678</span>/ตร.ม. &nbsp;</div>
				</div>-->
				<div id="market_cont" class="text-grey text-center" style="vertical-align:middle;">
					<div class="container" style="vertical-align:middle;display:table-cell;">&nbsp;เขต<?=$AreaName;?> คอนโด&nbsp; <span class="text-primary big-menumap"><?=$AreaUnit;?></span> ยูนิต &nbsp;ปี &nbsp;<?=$nowyear;?>&nbsp;: <span class="text-primary big-menumap"><?=$ProjectUnit_now;?></span> ยูนิต&nbsp; อนาคต&nbsp;: <span class="text-primary big-menumap"><?=$ProjectUnit_future;?></span> ยูนิต &nbsp;</div>
				</div>
			</div>
			<div id="float_menu2" class="hidden-xs">
				<span class="td-grey text-center" id="nprice"><?=$unit_baht;?></span><span class="text-center" id="npricem">บาท/ม2.</span>
			</div>

        <div id="float_menu3" class="text-center hidden-xs">
          
          <select class="form-control input-md no-border selectpicker text-center td-grey" data-style="btn-noborder" data-width="100%" id="nOptSearch">
                          <option value="0"  disabled="disabled" class="text-center text-blue">ข้อมูลโครงการ</option>
                          <option value="1" selected="selected">จำนวนยูนิตที่ลงประกาศ</option>
                          <option value="2">ปีที่สร้างเสร็จ</option>
                          <option value="3">จำนวนยูนิตทั้งหมด</option>
                          <option value="4">ค่าส่วนกลาง</option>
                          <option value="5"  disabled="disabled" class="text-danger" style="color:red">ราคาเฉลี่ย</option>
                          <option value="6"  disabled="disabled" class="text-danger" style="color:red">อัตราการเข้าพัก</option>

                      

          </select>
         
        </div>
          
          <br>
          <div class="visible-xs text-center" style="vertical-align:middle;display:table-cell;">&nbsp;เขต<?=$AreaName;?> คอนโด&nbsp; <span class="text-primary big-menumap"><?=$AreaUnit;?></span> ยูนิต &nbsp;ปี &nbsp;<?=$nowyear;?>&nbsp;: <span class="text-primary big-menumap"><?=$ProjectUnit_now;?></span> ยูนิต&nbsp; อนาคต&nbsp;: <span class="text-primary big-menumap"><?=$ProjectUnit_future;?></span> ยูนิต &nbsp;</div>
         

          <div class="col-md-12 text-center padding-none">
            
              <select class="form-control input-md no-border selectpicker clear-none text-center padding-none" data-style="btn-noborder" data-width="200">
                         <!-- <option>เรียงตามระยะรถไฟฟ้า</option>-->
                          <option selected="selected"><h3>เรียงตามราคา</option>
                         <!-- <option>เรียงตามปีสร้างเสร็จ</option>
                          <option>เรียงตามราคาต่อตารางเมตร </option>
                          <option>เรียงตามราคาพื้นที่ใช้สอย ใหญ่-เล็ก</option>
                          <option>เรียงตามราคาพื้นที่ใช้สอย เล็ก-ใหญ่</option>-->
              </select>
           

        </div>
        <input name="POID" id="POID" type="hidden" value="" >
        <div class="col-md-12" id='cImgUnits'>
        	
            <!--<div class="col-md-4" onclick="alert(imgUnits[0].Picture[0])">
              <img src="img/list01.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong</td>
                  <td><strong>B <span class="text-primary"> 14.45M</span></span></td>
                  <td><strong>B <span class="text-primary">138,000</span></span>/ม2.</td>
                </tr>
                <tr>
                  <td><span class="text-grey">2 นอน 150ม. ชั้น 15</span></td>
                  <td><span class="text-blue">5 </span> <img src="img/sun-icon.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><span class="text-blue">089-123-4567</span></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <img src="img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong</td>
                  <td><strong>B <span class="text-primary"> 14.45M</span></strong></td>
                  <td><strong>B <span class="text-primary">138,000</span>/ม2.</strong></td>
                </tr>
                <tr>
                  <td><span class="text-grey">2 นอน 150ม. ชั้น 15</span></td>
                  <td><span class="text-blue">5 </span> <img src="imgUnits[0].Picture[0]"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <img src="img/list03.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong></td>
                  <td><strong>B <span class="text-primary"> 14.49M</span></strong></td>
                  <td><strong>B <span class="text-primary">138,000</span>/ม2.</strong></td>
                </tr>
                <tr>
                  <td>2 นอน 150ม. ชั้น 15</td>
                  <td><span class="text-blue">78% REPLY</span></td>
                  <td><a class="text-blue" href="#">คุยกับเจ้าของ</a></td>
                </tr>
              </table>
            </div>-->
		</div>
    </div>
</div>



<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    
    <div class="modal-content">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
      <br>
      <h3 class="text-orange text-center">ฟังก์ชั่นนี้อยู่ในระหว่างการพัฒนา</h3>
      <br>
      <br>
    </div>
  </div>
</div>



     <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
     <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
     <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
      <script type="text/javascript" src="/js/markerwithlabel.js"></script>
      <script type="text/javascript" src="/js/markerclusterer_compiled.js"></script>
	 <script type='text/javascript' src='/js/quicksilver.js'></script>
	 <script type='text/javascript' src='/js/jquery.quickselect.js'></script>

     <script type="text/javascript">
      // $('.selectpicker').selectpicker();
       
       
     </script>
     <script type="text/javascript">
       $('#myModal').modal(options);
     </script>
     <script type="text/javascript">

         $(document).ready(function() {

            $("#down").click(function(){
               $(".target").slideDown( 'slow', function(){ 
                  $(".log").text('');
               });
            });
            $("#showfilter").click(function(){
               $(".filter").slideDown( 'slow', function(){ 
                  $(".log").text('');
               });
               $( "#wrapper_map" ).hide();
               $( ".lunderNav" ).hide();
               $( ".navbar" ).hide();
               $( ".hidebar" ).hide();
               
            });
            $("#show_idetail").click(function(){
               $(".idetail").slideDown( 'slow', function(){ 
                  $(".log").text('');
               });
               $( ".lunderNav" ).hide();
               $( ".navbar" ).hide();
               $( ".hidebar" ).hide();
               
            });


            $("#hidefilter").click(function(){
               $(".filter").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
               $( "#wrapper_map" ).show();
               $( ".navbar" ).show();
               $( ".hidebar" ).show();

            });

            $("#hidefilter2").click(function(){
               $(".filter").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
               $( "#wrapper_map" ).show();
               $( ".navbar" ).show();
               $( ".hidebar" ).show();
            });

            $("#hide_idetail").click(function(){
               $(".idetail").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
               $( "#wrapper_map" ).show();
               $( ".navbar" ).show();
               $( ".hidebar" ).show();

            });
            $("#hide_idetail2").click(function(){
               $(".idetail").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
               $( "#wrapper_map" ).show();
               $( ".navbar" ).show();
               $( ".hidebar" ).show();

            });

           
            $("#up").click(function(){
               $(".target").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
            });

             $("#up2").click(function(){
               $(".target").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
            });

            /*$(".hilight-on").click(function(){
              $("#mprice, #mpricem").toggleClass("hilight-on", 1000,"hilight-off");
              $("#mpricem, #mprice").toggleClass("hilight-off", 1000,"hilight-on");
            });

            $(".hilight-off").click(function(){
              $("#mpricem, #mprice").toggleClass( "hilight-off", 1000,"hilight-on");
              $("#mprice, #mpricem").toggleClass( "hilight-on", 1000,"hilight-off");
            });*/

            var options = [];

            $( '.dropdown-menu a' ).on( 'click', function( event ) {

               var $target = $( event.currentTarget ),
                   val = $target.attr( 'data-value' ),
                   $inp = $target.find( 'input' ),
                   idx;

               if ( ( idx = options.indexOf( val ) ) > -1 ) {
                  options.splice( idx, 1 );
                  setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
               } else {
                  options.push( val );
                  setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
               }

               $( event.target ).blur();
                  
               console.log( options );
               return false;
            });

         });
/// array to keep data return for marker ////         
var returnSearch=[];  

$(function(){
	
	
	var np = $('#namePoint').val();
	var tad = $('#toAd').val();
	tad = parseInt(tad);
	
	if(np){
		$('#iRefPlace').val(np);
		$('#iRefPlace_mb').val(np);
	}
	if(tad&&tad<=4){
		
		$('#sTypeSale').val(tad);
		$('#sTypeSale option[value="'+tad+'"]').attr('selected', 'selected'); 
		
	}
	
	$('#iDistance').val(10000);
	firstSearch();
	$('.selectpicker').selectpicker();
	/**/
	
});         
         //alert(map);
 var markerArray=[];
 var iw=[];
 var markerClusterer = null;
var zmapIconH = {
    
    path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
    fillColor: '#de761b',
    fillOpacity: 0.9,
    scale: 1.8,
   
    strokeWeight: 0,
  
  };
  var zmapIcon = {
    
    path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
    fillColor: '#4682B4',
    fillOpacity: 0.9,
    scale: 1.8,
   
    strokeWeight: 0,
  
  };

function initMap() {
  	//alert(returnSearch[0]+"proj 1 : "+returnSearch[1].ProjectName+" total :"+returnSearch.length);
  	var grayStyles = [
        {
          featureType: "all",
          stylers: [
            { saturation: -90 },
            { lightness: 20 }
          ]
        },
      ];
  
	var latLng = new google.maps.LatLng(13.71307945, 100.53356171);
	//var homeLatLng = new google.maps.LatLng(13.71307945, 100.53356171);
	//alert("return [0] : "+returnSearch[0]);
	var cLatLng = new google.maps.LatLng(returnSearch[0].Lat,returnSearch[0].Lng);
	//alert(map);
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
		zoom: 12,
		center: cLatLng,
		styles:grayStyles,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
     
	var goldStar = {
		//path: 'M 0,0 40,0 40,20 25,20 20,25 15,20 0,20 z',
		path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
		fillColor: '#4682B4',
		fillOpacity: 0.9,
		scale: 1.8,
		//strokeColor: '#48D1CC',
		strokeWeight: 0,
		//offsetT:-50,
		//offsetL:-40
	};

	//var marker;
	var checkP = $("#nprice").attr('class');

	for(var i=0;i<returnSearch.length;i++){
		var pLatLng = new google.maps.LatLng(returnSearch[i].Lat, returnSearch[i].Lng);
		var lunit = returnSearch[i].NumUnit;
		var lprice = returnSearch[i].MinPrice;
		
		var lcontent;
		
		var content = checkRSContent(returnSearch[i]);
		if(!content){content="-";}
		content = content.toString();
		

		
		if(checkP=="td-grey text-center"){
		   lcontent = "<div class='line-map'>"+content+"</div>"+lprice;
		}else{
		   lcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPricePerSq;
		}
		var pos = new google.maps.LatLng(returnSearch[i].Lat,returnSearch[i].Lng);
		//alert("pos : "+pos);
		//alert("i : "+i+"..... if : "+(i==0&&returnSearch[i].ProjectName));
		//console.log("c name : "+returnSearch[i].CenterName);
		//console.log("p name : "+returnSearch[i].ProjectName);
		if(returnSearch[i].ProjectName){
			var marker = new MarkerWithLabel({
				position: pLatLng,
				icon:goldStar,
				map: map,
				draggable: false,
				raiseOnDrag: true,
				labelContent: lcontent,
				labelAnchor: new google.maps.Point(15, 45),
				labelClass: "labels", // the CSS class for the label
				labelInBackground: false
			});
		   
		}else{
			var marker = new google.maps.Marker({
				position: cLatLng,
				map: map,
				icon: '/img/blank.png',
				title: 'Your search location point'
			});
		
		}
		markerArray.push(marker);
					
		//var msg = "โครงการ "+returnSearch[i].ProjectName+" มี "+lunit+" unit";			
		//msg += " ราคาต่ำ "+lprice;	
		if(returnSearch[i].ProjectName){
			attachProjectDetail(markerArray[i], returnSearch[i].ProjectName,i);
			/// show img on load page : remove this if show only map until click marker ///
			mSendPIDToGetImg(i);
		}else{
			attachProjectDetail(markerArray[i], returnSearch[i].CenterName,i);
		}
	}
	
	var style = [{
        url: '/img/clusterIcon.png',
        height: 35,
        width: 35,
        anchor: [0, 0],
        textColor: '#ffffff',
        textSize: 14
	}];
	markerClusterer = new MarkerClusterer(map, markerArray,{styles:style});
	//markerClusterer = g MarkerClusterer(map, markerArray);
}
  // initMap();
function attachProjectDetail(marker,message,i){
	
	var infowindow = new google.maps.InfoWindow({
		content:message
	});
	marker.addListener('mouseover',function(){
		infowindow.open(marker.get('map'),marker);
	});
	marker.addListener('mouseout',function(){
		infowindow.close();
	});
	
	marker.addListener('click',function(evt){
		
		//mSendPIDToGetImg(i);
		sortSearchResult(i);
		changeColorIcon(this,i);
	});
}
function changeColorIcon(obj,num){
	
	for(var i=0;i<markerArray.length;i++){
		if(i!=0&&i==num){
			
			markerArray[i].setIcon(zmapIconH);
		}else{
			
			if(i!=0){
				
			
			markerArray[i].setIcon(zmapIcon);
			}
		}
	}
}
function showProjectDetail(){
	
}
 function deleteMarkers() {
  if (markerArray) {
  	//alert("mrry : "+markerArray);
  	for (i in markerArray) {
  		markerArray[i].setMap(null);
  	}
		markerArray.length = 0;
  }
}



$('#iDistance').change(updateSearch);
$('#iDistance').keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
  //console.log( "Handler for .keypress() called."+e.keyCode );
});

$('#iRefPlace').change(updateSearch);
$('#iRefPlace').keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
  //console.log( "Handler for .keypress() called."+e.keyCode );
});

$('#iRefPlace_mb').change(updateSearch);
$('#iRefPlace_mb').keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
  //console.log( "Handler for .keypress() called."+e.keyCode );
});
//$("#iRefPlace").blur(updateSearch);

$('#sPropType').change(updateSearch);
$('#sNBdroom').change(updateSearch);
$('#sPYear').change(updateSearch);
$('#sTypeSale').change(updateSearch);
$('#minPrice').change(updateSearch);
$( '#minPrice' ).keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
});
$('#maxPrice').change(updateSearch);
$( '#maxPrice' ).keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
});
function firstSearch(){
	var dist = $('#iDistance').val();
	if($('#iRefPlace_mb').val()){
		var refPl = $('#iRefPlace_mb').val();
	}else{
		var refPl = $('#iRefPlace').val();
	}
	var propType = $("#sPropType option:selected").val();
	var nBed = $('#sNBdroom option:selected').val();
	var nYear = $('#sPYear option:selected').val();
	var tSale = $('#sTypeSale option:selected').val();
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
	
				
	var createMarker = $.getJSON("/zhome/getUpdateMarker",{ distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Year:nYear, TOAdvertising:tSale,minPrice:minP,maxPrice:maxP }, function(json) {
  				console.log( "success" );
				})
  				.done(function() {
    			console.log( "second success" );
  				})
  				.fail(function() {
    			console.log( "error" );
  				})
  				.always(function(json) {
    				
    				returnSearch = json;
    				
    				console.log( "complete" );
  				});

// Set another completion function for the request above
createMarker.complete(function(json) {
 
  initMap();
});
	
}
function updateSearch(){
	
	var dist = $('#iDistance').val();
	if($('#iRefPlace_mb').val()){
		var refPl = $('#iRefPlace_mb').val();
	}else{
		var refPl = $('#iRefPlace').val();
	}
	if(!refPl)return false;
	var propType = $("#sPropType option:selected").val();
	var nBed = $('#sNBdroom option:selected').val();
	var nYear = $('#sPYear option:selected').val();
	var tSale = $('#sTypeSale option:selected').val();
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
				
	var updateMarker = $.getJSON("/zhome/getUpdateMarker",{ distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Year:nYear, TOAdvertising:tSale,minPrice:minP,maxPrice:maxP }, function(json) {
  				console.log( "success" );
				})
  				.done(function() {
    			console.log( "second success" );
  				})
  				.fail(function() {
    			console.log( "error" );
  				})
  				.always(function(json) {
    				
    				returnSearch = json;
    				
    				console.log( "complete" );
  				});

	// Set another completion function for the request above
	updateMarker.complete(function(json) {
		console.log( "second complete" );	 
		if(tSale==3){
			$("#nprice").text('บาท');
		}else{
			$("#nprice").text('ล้านบาท');
		}
		$('#cImgUnits').empty();
		getMarketCont();
		deleteMarkers();
		initMap();
	});
}

var market_cont = [];
function getMarketCont(){
	
	var namepoint = $('#iRefPlace').val();
	var nowyear = $('#nowyear').val();
	
	var MarketCont = $.getJSON("/zhome/getMarketCont",{ namepoint:namepoint,nowyear:nowyear }, function(json) {
  				console.log( "success" );
				})
  				.done(function() {
    			console.log( "second success" );
  				})
  				.fail(function() {
    			console.log( "error" );
  				})
  				.always(function(json) {
  					
    				market_cont = json;
    				console.log( "complete" );
  				});

	// Set another completion function for the request above
	MarketCont.complete(function() {
	  console.log( "second complete" );
	  displayMarketCont();
	});
}

function displayMarketCont(){
	$('#market_cont').empty();
	var cont = "";
	cont +=	'<div class="container" style="vertical-align:middle;display:table-cell;">&nbsp;'+market_cont.AreaName+' คอนโด&nbsp;';
	cont +=	'<span class="text-primary big-menumap">'+market_cont.AreaUnit+'</span> ยูนิต &nbsp;ปี &nbsp;'+market_cont.NowYear+'&nbsp;: ';
	cont +=	'<span class="text-primary big-menumap">'+market_cont.ProjectUnit_now+'</span> ยูนิต &nbsp;อนาคต &nbsp;';
	cont +=	'<span class="text-primary big-menumap">'+market_cont.ProjectUnit_future+'</span> ยูนิต &nbsp;';
	cont +=	'</div>';
	$('#market_cont').append(cont);
}

var imgUnits = [];
/// end update search ///
function mSendPIDToGetImg(i){
	//alert(this)
	//alert("msend : "+i)
	//($PID,$TOProperty,$Bedroom,$Year,$TOAdvertising,$minPrice,$maxPrice);
	var pid = returnSearch[i].PID;
	
	var propType = $("#sPropType option:selected").val();
	var nBed = $('#sNBdroom option:selected').val();
	var nYear = $('#sPYear option:selected').val();
	var tSale = $('#sTypeSale option:selected').val();
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
	
	var getImgUnits = $.getJSON("/zhome/getImgUnit",{ PID:pid,TOProperty:propType,Bedroom:nBed,Year:nYear, TOAdvertising:tSale,minPrice:minP,maxPrice:maxP }, function(json) {
  				console.log( "success" );
				})
  				.done(function() {
    			console.log( "second success" );
  				})
  				.fail(function() {
    			console.log( "error" );
  				})
  				.always(function(json) {
  					
    				imgUnits = json;
    				console.log( "complete" );
  				});

	// Set another completion function for the request above
	getImgUnits.complete(function() {
	  console.log( "second complete" );
	  displayImgUnits();
	});
}

function displayImgUnits(){
	var imgNode = "";
	for(var i=0;i<imgUnits.length;i++){
		
		if($('#'+imgUnits[i].POID).length==0){
		   // imgNode +=  '<div>';
        imgNode +=  '<div class="col-md-4 col-sm-6" style="margin-bottom:10px;" id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'" onclick=setPOID(this);>';
		   
        imgNode +=  '<div><div class="unit-show" style="margin-top:0px; padding-top:0px;""><div style="padding-left:13px;cursor:pointer;"><h3 class="padding-none s-name; padding-top:0px;" onmouseover=this.style.color="#ff8000"; onmouseout=this.style.color="";> '+imgUnits[i].ProjectName+'</h3></div></div>';
        imgNode +=  '<div class="bg-grey2 text-center" style="position:relative;background-color:#87CED5;height:auto;cursor:pointer;"><img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive center-block"><h4  class="text-center" style="color:#ffffff; position:absolute; width:160px; bottom:0;right:0; margin-bottom:0; padding-top:8px; background-color: #2190ab;">ZmyHome เท่านั้น</h4></div></div>';
        imgNode +=	'<table class="table borderless2 fsize-unitsearch unit-table" style="padding:0;margin:0;cursor:pointer;">';
        imgNode +=	'<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;">';
        imgNode +=	'<td style="padding-left:13px;"> <strong><span class="text-grey">'+imgUnits[i].Bedroom+' นอน '+imgUnits[i].useArea+'ม&sup2;  ชั้น '+imgUnits[i].Floor+'</span></strong</td>';
        imgNode +=  '<td class="s-padding-left"><strong class="s-price">&#3647; <span class="text-primary">'+imgUnits[i].Price+'</span></strong></td>';
        imgNode +=  '<td class="text-right"><strong class="s-price">&#3647; <span class="text-primary text-right">'+imgUnits[i].PricePerSq+'</span>/ม&sup2;</strong></td>';
        imgNode +=  '</tr>';
        imgNode +=  '<tr style="border-bottom: 1px solid #dbdbdb">';
        imgNode +=  '<td style="padding-left:13px;">'+imgUnits[i].DistName+'</td>';
        imgNode +=  '<td class="s-padding-left"><span class="text-blue">'+imgUnits[i].DateShow+' </span> <img src="/img/sun-s-icon.png"> <span class="text-blue"> '+imgUnits[i].ViewTel+' </span> <span width="3px" class="glyphicon glyphicon-earphone text-blue input-sm3"></span></td>';
        imgNode +=  '<td class="text-right"><span class="text-blue text-right">'+imgUnits[i].Tel+'</span></td>';
        imgNode +=	'</tr>';
        imgNode +=	'</table>';
        imgNode +=	'</div></div></div></div>';
        //imgNode +=   '</div>';
             
        }
	}
	
	$('#cImgUnits').append(imgNode);
}

$("#nprice").click({param1: "p"}, updatePriceMarker);
$("#npricem").click({param1: "psqm"}, updatePriceMarker);
$("#mprice").click({param1: "p"}, updatePriceMarker);
$("#mpricem").click({param1: "psqm"}, updatePriceMarker);
$('#nOptSearch').change(updateContentMarker);

function setPOID(obj){
	    $('#POID').val(obj.id);
	    $("#myform").attr('target','_blank');
      $("#myform").submit();
}

function sortSearchResult(n){
	$('#cImgUnits').children('div').each(function(){
		
		if(returnSearch[n].ProjectName==$(this).attr('data-project')){
			swapToFirst($(this));
			setUnitClick($(this));
		}else{
			setUnitShow($(this));
		}
	});
		//alert(" j : "+j+"..."+JSON.stringify(allDisplayUnits[j]));
}

function setUnitClick(elem){
	elem.removeClass('unit-show');
	elem.addClass('unit-click');
}

function setUnitShow(elem){
	elem.removeClass('unit-click');
	elem.addClass('unit-show');
}

function swapToFirst(elem){
		hilightImgUnit(elem);
		elem.insertBefore($("#cImgUnits").children().first() );
}

function hilightImgUnit(elem){
		elem.effect( "highlight", {color:"#87CED5"}, 3000 );
}

function updatePriceMarker(evt){
	var p = evt.data.param1;
	updateMarkerLabelBottom(p);
	
	if(evt.target.id=="nprice"){
		$("#nprice").attr('class','td-grey text-center');
		$("#npricem").attr('class','text-center');
	}else{
		$("#npricem").attr('class','td-grey text-center');
		$("#nprice").attr('class','text-center');
	}


  if(evt.target.id=="mprice"){
    $("#mprice").attr('class','hilight-on col-xs-6 text-center text-white');
    $("#mpricem").attr('class','hilight-off col-xs-6 text-center');
  }else{
    $("#mprice").attr('class','hilight-off col-xs-6 text-center');
    $("#mpricem").attr('class','hilight-on col-xs-6 text-center text-white');
  }

}

function updateMarkerLabelBottom(ptype){

	for(var i=0;i<markerArray.length;i++){
		if(returnSearch[i].ProjectName){
			var price;
			var content = checkRSContent(returnSearch[i]);
			if(!content)content="-";
			content = content.toString();
			//alert(content);
			if(ptype=="psqm"){
			 	//price = "<div class='line-map'>"+returnSearch[i].NumUnit+"</div>"+returnSearch[i].MinPricePerSq;
			 	price = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPricePerSq;
			}else{
			 	//price = "<div class='line-map'>"+returnSearch[i].NumUnit+"</div>"+returnSearch[i].MinPrice;
			 	price = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPrice;
			}
			
			markerArray[i].set("labelContent",price);
		}
	}
}

function updateContentMarker(){
 //alert("update");
	for(var i=0;i<markerArray.length;i++){
		if(returnSearch[i].ProjectName){
			var allcontent;
			var content = checkRSContent(returnSearch[i]);
			if(!content){content="-";}
			content = content.toString();
			
			var checkP = $("#nprice").attr('class');
			if(checkP=="td-grey text-center"){
	   			allcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPrice;
			}else{
	   			allcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPricePerSq;
			}
			markerArray[i].set("labelContent",allcontent);
			
		}
	}
}

function checkRSContent(obj){
	var opt = $('#nOptSearch').val();
	
    var type;
    
	switch(opt){
		case "1":
    		return obj.NumUnit;
        break;
		case "2":
   
        	return obj.YearEnd;
        break;
		case "3":
    	
        	return obj.CondoUnit;
        break;
		case "4":
        	return parseInt(obj.CamFee);
        break;
		/*case 5:
        	
        break;
		case 6:
        
        break;*/
		default:
    
    	return obj.NumUnit;
    	break;
	}
}


</script>    
<?php $qMarker=$this->search->qMarker();
?>
<script>

$('#iRefPlace').quickselect({
  maxItemsToShow:10,
  exactMatch:true,
  data:[
	  
<?php
	$endLine=sizeof($qMarker); 
	$i=0;
	While ($i<$endLine)
	{
		if ($i!=$endLine){
			echo '"'.$qMarker[$i].'",';
		} else {
			echo '"'.$qMarker[$i].'"';
		}
		$i++;
	}
?>
  ],
  onItemSelect:function(){updateSearch();}
  
});

$('#iRefPlace_mb').quickselect({
  maxItemsToShow:10,
  exactMatch:true,
  data:[
	  
<?php
	$endLine=sizeof($qMarker); 
	$i=0;
	While ($i<$endLine)
	{
		if ($i!=$endLine){
			echo '"'.$qMarker[$i].'",';
		} else {
			echo '"'.$qMarker[$i].'"';
		}
		$i++;
	}
?>
  ],
  onItemSelect:function(){updateSearch();}
  
});	
</script>

<script type="text/javascript">
  
$('#myModal').modal(options);
</script>
<div class="clearfix"></div>         

<?php include 'footerstandard.php';?>
</body>
</html>