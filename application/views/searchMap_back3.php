<?php
$attributes = array('id' => 'myform');
echo form_open('/zhome/unitDetail', $attributes);
?>
 
<input type="hidden" id="namePoint" name="namePoint" <?php echo 'value="'.$namePoint.'"' ?>>
<input type="hidden" id="toAd" name="toAd" <?php echo 'value="'.$TOAdvertising.'"' ?>>
<hr class="border-top-grey">
<div class="n-container">
        <div class="row">  
          <div class="padding-bottom5 container-fluid">
            <div class="col-md-4">
              <div class="pull-left w20">
                <input type="text"  value="" id="iDistance" name="iDistance" placeholder="0"> 
              </div>
            
               <div class="pull-left w15  padding-t3 text-center">
                 ม. จาก
              </div>
              <div class="pull-left w65 border-right text-center">
                <input type="text" value=""    id="iRefPlace" name="iRefPlace"  placeholder=" เขต, รถไฟฟ้า, โครงการ" autocomplete="off">
              </div>
              
            </div>



            <hr class="visible-xs blank">
           
            <div class="col-md-4">
               <div class="pull-left w25 border-right text-center">
                <select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sPropType" name="sPropType">
                          <option value="1">คอนโด</option>
                          <option value="2">หมู่บ้าน</option>
                          <option value="3">ตึกแถว</option>
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
                    </select>
              </div>
              <div class="pull-left w25 border-right text-center">
                  <select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sTypeSale" name="sTypeSale">
                          <option value="1">ขาย</option>
                          <option value="2" selected="selected">ขายดาวน์</option>
                          <option value="3">เช่า</option>
                  </select>

              </div>
            </div>

            <hr class="visible-xs blank">

            <div class="col-md-4">
               
                
               <div class="pull-left w30 text-center">
                  <input type="text"  value="" id="minPrice" name="minPrice" placeholder=" ราคาต่ำสุด">  

               </div>
                <div class="pull-left w10 text-right padding-t3 text-center">
                  -
               </div>
               <div class="pull-left w30 border-right text-center">
                  <input type="text"   value="" id="maxPrice" name="maxPrice" placeholder=" ราคาสูงสุด">

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
      <div class="target display-none">
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
           <div class="row col-md-12">
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
          <div class="row col-md-12">
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
          	<!--<?php echo $map['html']; ?>-->
          	<!--<div style="position:absolute;top:0px">
                <div class="text-grey text-center padding-top1">
                 <span class="text-primary big">253</span> ยูนิต &nbsp;ผู้ซื้อ <span class="text-primary big">45</span> &nbsp;เฉลี่ย <span class="text-primary big">B93,678</span>/ตร.ม. &nbsp;ประเมิน <span class="text-primary big">B45,321</span>/ม2. &nbsp;&nbsp;ค่าเช่า <span class="text-primary big">678</span>/ม2.&nbsp; Y <span class="text-primary big">7.8%</span>
                </div>
           </div>-->
           <div id="wrapper_map">
           
          	<div id="map_canvas"></div>
          	<div id="float_menu">
          		<div class="text-grey text-center" style="vertical-align: middle;">
                 <div sytle="vertical-align:middle;display:table-cell;"> เขตคลองเตย คอนโด&nbsp; <span class="text-primary big-menumap">19,000</span> ยูนิต &nbsp; <span class="text-primary big-menumap">253</span> ประกาศขาย&nbsp; เฉลี่ย<span class="text-primary big-menumap">&#3647;8.6</span>ล้าน &nbsp; &nbsp;<span class="text-primary big-menumap">&#3647;93,678</span>/ตร.ม. &nbsp;</div>
              </div>
			     </div>
				<div id="float_menu2" class="hidden-xs">
					
          <span class="td-grey text-center" id="nprice">ล้านบาท</span><span class="text-center" id="npricem">บาท/ม2.</span>
      	 
        </div>
        <div id="float_menu3" class="text-center hidden-xs">
          
          <select class="form-control input-md no-border selectpicker text-center" data-style="btn-noborder" data-width="100%">
                          <option value="0" selected="selected" disabled="disabled" class="text-center text-blue">ดูข้อมูลเปรียบเทียบ</option>
                          <option value="1">ปีที่สร้างเสร็จ</option>
                          <option value="2">จำนวนยูนิต</option>
                          <option value="3">ค่าส่วนกลาง</option>
                          <option value="4"  disabled="disabled" class="text-danger" style="color:red">ราคาเฉลี่ย</option>
                          <option value="5"  disabled="disabled" class="text-danger" style="color:red">อัตราการเข้าพัก</option>

                      

          </select>
         
        </div>

        <div class="col-md-12 text-center">
            
              <select class="form-control input-md no-border selectpicker clear-none text-center" data-style="btn-noborder" data-width="200" style="padding:0; margin:0">
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



<!--modal1-->
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
<!--endmodal1-->



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
       $('.selectpicker').selectpicker();
     </script>
     <script type="text/javascript">
       $('#myModal').modal(options);
     </script>
     <script type="text/javascript">
         /*$(".target").hide( '', function(){});*/

         $(document).ready(function() {

            $("#down").click(function(){
               $(".target").slideDown( 'slow', function(){ 
                  $(".log").text('');
               });
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

         });
/// array to keep data return for marker ////         
var returnSearch=[];  

$(function(){
	
	//alert("return :"+returnSearch)
	var np = $('#namePoint').val();
	var tad = $('#toAd').val();
	tad = parseInt(tad);
	
	// for test //
	np = "MRT พระราม 9";
	tad = 1;
	//$.getJSON("/zhome/getFirstPoint",{ namePoint:np,TOAdvertising:tad },initMap);
	
	
	var jqxhr = $.getJSON("/zhome/getFirstPoint",{ namePoint:np,TOAdvertising:tad }, function(json) {
  				console.log( "success" );
				})
  				.done(function() {
    			console.log( "second success" );
  				})
  				.fail(function() {
    			console.log( "error" );
  				})
  				.always(function(json) {
    				//alert(json);
    				//alert(json.length);
    				
    				returnSearch = json;
    				console.log( "complete" );
  				});
 
// Perform other work here ...
 
// Set another completion function for the request above
jqxhr.complete(function() {
  console.log( "second complete" );
  initMap();
});
	
});         
         //alert(map);
 var markerArray=[];
 var iw=[];
 var markerClusterer = null;
/*
 $centerMap=array("CenterName" => $namePoint,			
 "Lat" => $Lat,			
 "Lng" => $Lng,		);
 $Point=array("PID" => $PID,
 						"ProjectName" => $ProjectName,
 						"Lat" => $Lat,						
 						"Lng" => $Lng,						
 						"NumUnit" => $NumUnit,						
 						"MinPrice" => $MinPrice	);
 */
/// for test 
var returnSearchTest=[
 	{
    "CenterName":'อนุเสาวรีย์',
    "Lat":13.038,
    "Lng":100.97890
    }, 
    {
    	"PID":2,
    	"ProjectName":"The Address",
    	"Lat":13.713,
    	"Lng":100.53,
    	"NumUnit":3,
    	"MinPrice":"3.5M"
    },
    {
    	"PID":5,
    	"ProjectName":"Centric",
    	"Lat":13.1112,
    	"Lng":101.12,
    	"NumUnit":9,
    	"MinPrice":"2.5M"
    },
    {
    	"PID":6,
    	"ProjectName":"City",
    	"Lat":11.1123,
    	"Lng":100.987,
    	"NumUnit":12,
    	"MinPrice":"5.5M"
    },
    {
    	"PID":4,
    	"ProjectName":"The Room",
    	"Lat":12.765,
    	"Lng":101.4563,
    	"NumUnit":22,
    	"MinPrice":"7.5M"
    }

 ]; /**/
 
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
	//alert(checkP);
	if(checkP=="td-grey text-center"){
	   lcontent = "<div class='line-map'>"+lunit+"</div>"+lprice;
	}else{
	   lcontent = "<div class='line-map'>"+lunit+"</div>"+returnSearch[i].MinPricePerSq;
	}
	var pos = new google.maps.LatLng(returnSearch[i].Lat,returnSearch[i].Lng);
	//alert("pos : "+pos);
	if(i!=0){
     var marker = new MarkerWithLabel({
       position: pLatLng,
       icon:goldStar,
       map: map,
       draggable: true,
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
    	title: 'Your search location point'
 		 });
	}
	
   markerArray.push(marker);
				
	//var msg = "โครงการ "+returnSearch[i].ProjectName+" มี "+lunit+" unit";			
	//msg += " ราคาต่ำ "+lprice;	
	if(i!=0){	
		attachProjectDetail(markerArray[i], returnSearch[i].ProjectName,i);
		/// show img on load page : remove this if show only map until click marker ///
		mSendPIDToGetImg(i);
	}else{
		attachProjectDetail(markerArray[i], returnSearch[i].CenterName,i);
	}
	//attachProjectDetail(markerArray[i], msg);
    
	}
	var style = [{
        url: '/img/clusterIcon.png',
        height: 50,
        width: 50,
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
	});
}
function showProjectDetail(){
	
}
 function deleteMarkers() {
  if (markerArray) {
  	for (i in markerArray) {
  		markerArray[i].setMap(null);
  	}
		markerArray.length = 0;
  }
}



$('#iDistance').change(updateSearch);
$('#iRefPlace').change(updateSearch);
$( "#iRefPlace" ).keypress(function(e) {
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
$('#maxPrice').change(updateSearch);


function updateSearch(){
	//e.preventDefault();
	var dist = $('#iDistance').val();
	var refPl = $('#iRefPlace').val();
	var propType = $("#sPropType option:selected").val();
	var nBed = $('#sNBdroom option:selected').val();
	var nYear = $('#sPYear option:selected').val();
	var tSale = $('#sTypeSale option:selected').val();
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
	
	//console.log(refPl);
	//'dist : '+dist+'... refPl'+refPl+'.... propType : '+propType+'....nBed : '+nBed+'....nYear : '+nYear+'....tSale : '+tSale+'...... minP : '+minP+'.... maxP : '+maxP+(maxP=='')
	 
				
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
    				//alert("json : "+json[1].MinPricePerSq);
    				//alert("json length : "+json.length);
    				//alert("return search : "+returnSearch.length);
    				console.log( "complete" );
  				});

// Set another completion function for the request above
updateMarker.complete(function(json) {
  console.log( "second complete" );
  $('#cImgUnits').empty();
  
  deleteMarkers();
  initMap();
});
	

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
        imgNode +=  '<div class="col-md-4" id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'" onclick=setPOID(this);>';
		   
        imgNode +=  '<div class="unit-show"><div style="padding-left:13px;"><h3 class="padding-none"> '+imgUnits[i].ProjectName+'</h3></div>';
        imgNode +=  '<div class="bg-grey2 text-center" style="position:relative; width:100%; background-color:#87CED5;height:257px;"><img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive"><h4  class="text-center" style="color:#ffffff; position:absolute; width:160px; bottom:0;right:0; margin-bottom:0; padding-top:8px; background-color: #2190ab;">ZmyHome เท่านั้น</h4></div></div>';//width="360px" height="172px"
        imgNode +=	 '<table class="table fsize-unitsearch">';
        imgNode +=	 '<tr>';
        imgNode +=	 '<td style="padding-left:13px;> <strong><span class="text-grey">'+imgUnits[i].Bedroom+' นอน '+imgUnits[i].useArea+'ม&sup2;. ชั้น '+imgUnits[i].Floor+'</span></strong</td>';
        imgNode +=  '<td><strong>B <span class="text-primary">'+imgUnits[i].Price+'</span></strong></td>';
        imgNode +=  '<td class="text-right"><strong>B <span class="text-primary text-right">'+imgUnits[i].PricePerSq+'</span>/ม&sup2;.</strong></td>';
        imgNode +=  '</tr>';
        imgNode +=  '<tr>';
        imgNode +=  '<td style="padding-left:13px;">เจ้าของขายเอง</td>';
        imgNode +=  '<td><span class="text-blue">'+imgUnits[i].DateShow+' </span> <img src="/img/sun-icon.png"> <span class="text-blue"> '+imgUnits[i].ViewTel+' </span> <span class="glyphicon glyphicon-earphone text-blue input-sm3"></span></td>';
        imgNode +=  '<td class="text-right"><span class="text-blue text-right">'+imgUnits[i].Tel+'</span></td>';
        imgNode +=	 '</tr>';
        imgNode +=	 '</table>';
        imgNode +=	 '</div>';
        imgNode +=   '';
        //imgNode +=   '</div>';     
             
        }
	}
	
	$('#cImgUnits').append(imgNode);
}
$("#nprice").click({param1: "p"}, updatePriceMarker);
$("#npricem").click({param1: "psqm"}, updatePriceMarker);

function setPOID(obj){
	    $('#POID').val(obj.id);
	    $("#myform").attr('target','_blank');
      $("#myform").submit();


}
function sortSearchResult(n){
	
	
	$('#cImgUnits').children('div').each(function(){
		
		if(returnSearch[n].ProjectName==$(this).attr('data-project')){
			swapToFirst($(this));
		}
	});
	
	
		//alert(" j : "+j+"..."+JSON.stringify(allDisplayUnits[j]));
	
	
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
	
}
function updateMarkerLabelBottom(ptype){

	for(var i=0;i<markerArray.length;i++){
		if(i!=0){
			var price;
			if(ptype=="psqm"){
			 	price = "<div class='line-map'>"+returnSearch[i].NumUnit+"</div>"+returnSearch[i].MinPricePerSq;
			}else{
			 	price = "<div class='line-map'>"+returnSearch[i].NumUnit+"</div>"+returnSearch[i].MinPrice;
			}
			
			markerArray[i].set("labelContent",price);
		}
	}
}

/// function for test form ////
function showValues() {
    var str = $( "form" ).serialize();
    alert(str);
 }

</script>    
<?php 	$qMarker=$this->search->qMarker();
?>
    <script>

    $('#iRefPlace').quickselect({
      maxItemsToShow:10,
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
<div class="clearfix"></div>         

<?php include 'footerstandard.php';?>
</body>
</html>