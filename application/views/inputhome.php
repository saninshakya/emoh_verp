
<input type="hidden" id="unitToken" name="unitToken" value="">

<form action="http://zhome.aofdev.com/zhome/changePage1" class="email" id="myform" method="post" accept-charset="utf-8">
<input type="hidden" name="key_change" id="key_change" value="2">
<input type="hidden" name="last_page" id="last_page" value="2">
<input type="hidden" name="unit_token" id="unit_token" value="860337b046f4e0987c6b1edca56b0e32">
<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-push-2">
            <!--inputhome1-->
			<div class="inputhome1">
	            
	             input1
	            <div class="clearfix"></div>
				<br>
		        



	            <div class="row">
					<div class="col-xs-6 col-md-5 col-lg-3">
						
					</div> 
					<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
						<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome2()">ถัดไป</button>
					</div>
				</div>
				<br>

			</div>
			<!--end inputhome1-->

		    <!--inputhome2-->
		    <div class="inputhome2 display-none">
			<h3 class="text-primary">ข้อมูลพื้นฐาน</h3>
			<div class="checkbox">
				<p class="text-primary big2">ระบุข้อมูลให้ถูกต้อง หากไม่แน่ใจ สามารถตรวจสอบโฉนดหรือเอกสารโครงการแล้วกลับมาแก้ไขได้</p>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<h5>ข้อมูลกายภาพ</h5>
				</div>
			</div>
            
			<div class="row">
				<div class="col-md-4 col-sm-7">
					<div class='title-z'>ขนาดที่ดิน (ตร.วา)</div>
					<input class="form-control input-z" data-toggle="tooltip" data-placement="bottom" title="โปรดระบุ" type="text" placeholder="โปรดระบุ" name="Tower" id="Tower" onchange="updatePost('')" value="" onmouseover="show_title('');" onmouseout="hide_title();">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class='title-z' id="">หน้ากว้าง (ม.)</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id="r" onchange="updatePost('RoomNumber')" value="" onmouseover="show_title('');" onmouseout="hide_title();">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z" id="">จำนวนชั้น</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id="" onchange="updatePost('')" value="" onmouseover="show_title('');" onmouseout="hide_title();">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4 col-sm-7">
					<div class="title-z" id="">พื้นที่ใช้สอย(ตร.ม.)</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id="" onchange="updatePost('')" value="">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z"  id="ShowBedroom">จำนวนห้องนอน *<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องนอนที่ไม่มีห้องน้ำนับเป็น 0.5"><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
					<select class="form-control input-z" name="Bedroom" id="Bedroom" onchange="" data-toggle="tooltip" data-placement="bottom" title="" onmouseover="" onmouseout="hide_title();">
						<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
						<option value="99" selected>สตูดิโอ</option>
													<option value="1" >1 ห้องนอน</option>
													<option value="1.5" >1.5 ห้องนอน</option>
													<option value="2" >2 ห้องนอน</option>
													<option value="2.5" >2.5 ห้องนอน</option>
													<option value="3" >3 ห้องนอน</option>
													<option value="3.5" >3.5 ห้องนอน</option>
													<option value="4" >4 ห้องนอน</option>
													<option value="4.5" >4.5 ห้องนอน</option>
													<option value="5" >5 ห้องนอน</option>
													<option value="5.5" >5.5 ห้องนอน</option>
													<option value="6" >6 ห้องนอน</option>
													<option value="6.5" >6.5 ห้องนอน</option>
													<option value="7" >7 ห้องนอน</option>
											</select>
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="q-formtitle" id="ShowBathroom">จำนวนห้องน้ำ *<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องน้ำที่ไม่มีส่วนอาบน้ำนับเป็น 0.5 ห้องน้ำ"><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
					<select class="form-control q-input" name="Bathroom" id="Bathroom" onchange="updatePost('Bathroom')" data-toggle="tooltip" data-placement="bottom" title="ห้องน้ำที่ไม่มีส่วนอาบน้ำ ให้นับเป็น 0.5 ห้อง" onmouseover="show_title('ห้องน้ำที่ไม่มีส่วนอาบน้ำ ให้นับเป็น 0.5 ห้อง');" onmouseout="hide_title();">
						<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
													<option value="1" selected>1 ห้องน้ำ</option>
													<option value="1.5" >1.5 ห้องน้ำ</option>
													<option value="2" >2 ห้องน้ำ</option>
													<option value="2.5" >2.5 ห้องน้ำ</option>
													<option value="3" >3 ห้องน้ำ</option>
													<option value="3.5" >3.5 ห้องน้ำ</option>
													<option value="4" >4 ห้องน้ำ</option>
													<option value="4.5" >4.5 ห้องน้ำ</option>
													<option value="5" >5 ห้องน้ำ</option>
													<option value="5.5" >5.5 ห้องน้ำ</option>
													<option value="6" >6 ห้องน้ำ</option>
													<option value="6.5" >6.5 ห้องน้ำ</option>
													<option value="7" >7 ห้องน้ำ</option>
													<option value="7.5" >7.5 ห้องน้ำ</option>
													<option value="8" >8 ห้องน้ำ</option>
													<option value="8.5" >8.5 ห้องน้ำ</option>
													<option value="9" >9 ห้องน้ำ</option>
													<option value="9.5" >9.5 ห้องน้ำ</option>
													<option value="10" >10 ห้องน้ำ</option>
						 
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4 col-sm-7">
					<div class="title-z">ทิศ (ประตูหน้าบ้าน)</div>
					<select class="form-control input-z" name="Direction" id="Direction" onchange="updatePost('Direction')" onmouseover="show_title('ระบุทิศให้ถูกต้อง เพราะมีผลต่อการพิจารณาของผู้ซื้ออย่างมาก');" onmouseout="hide_title();">
						<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
												  <option value="1" >ทิศตะวันออก</option>
												  <option value="2" >ทิศตะวันออกเฉียงเหนือ</option>
												  <option value="3" >ทิศตะวันออกเฉียงใต้</option>
												  <option value="4" >ทิศเหนือ</option>
												  <option value="6" >ทิศใต้</option>
												  <option value="7" >ทิศตะวันตกเฉียงเหนือ</option>
												  <option value="8" >ทิศตะวันตกเฉียงใต้</option>
												  <option value="9" >ทิศตะวันตก</option>
											</select>               
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z"  id="">ที่จอดรถ (คัน)</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id=""  data-toggle="tooltip" data-placement="bottom" title="" onmouseover="" onmouseout="h">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z" >ปีสร้างเสร็จ/ปรับปรุงทั้งหลัง</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="terraceArea" id="" onchange="" value=""  OnKeyPress="" data-toggle="tooltip" data-placement="bottom" title="" onmouseover="" onmouseout="">
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<h5>ลักษณะพิเศษของบ้าน (เลือกได้มากกว่า 1 ข้อ)</h5>
				</div>
			</div>
			<div class="row">
			  <div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวแม่น้ำ/ทะเล/บึง/สระ</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
						<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวสวนสาธารณะ</p>
						</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวสระว่ายน้ำ</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวสวนในโครงการ</p>
							</label>
						</label>
                 </div>
                 
                 <div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ติดถนนใหญ่ 6 เลนส์ขึ้นไป</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">หลังมุม</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องแม่บ้านและห้องน้ำ</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องครัวปิด</p>
							</label>
						</label>
                        <label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องเก็บของ</p>
							</label>
						</label>
                 </div>
                 
                 <div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องเปล่า</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
						<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">บิลท์อิน</p>
						</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">เครื่องปรับอากาศทุกห้อง</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">เฟอร์นิเจอร์ครบ</p>
							</label>
						</label>
                        <label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" >
								<p class="text-grey">เครื่องใช้ไฟฟ้า</p>
							</label>
						</label>
                 </div>         
				
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-12">
					<h5>สิ่งอำนวยความสะดวกในโครงการ (เลือกได้มากกว่า 1 ข้อ)</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">เดินสายไฟฟ้าใต้ดิน</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
						<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">รปภ. 24 ชม.</p>
						</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">CCTV ทั้งโครงการ</p>
							</label>
						</label>
						
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
							<label class="checkbox bg-warning padding-pro noselect pointer">
                                <label>
                                    <input type="checkbox" value="" onClick="" ><p class="text-grey">ร้านสะดวกซื้อ</p>
                                </label>
						    </label>
					 		<label class="checkbox bg-warning padding-pro noselect pointer">
                                <label>
                                    <input type="checkbox" value="" onClick="" ><p class="text-grey">ร้านอาหาร</p>
                                </label>
						    </label>
					 		<label class="checkbox bg-warning padding-pro noselect pointer">
                                <label>
                                    <input type="checkbox" value="" onClick="" ><p class="text-grey">ร้านเสริมสวย</p>
                                </label>
						    </label>
					 		
					 	
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					    <label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">สระว่ายน้ำ</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ฟิตเนส</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">สนามเทนนิส</p>
							</label>
						</label>
				</div>
			</div>
			<br>
			<hr>
            
			<div class="row">
				<div class="col-md-12">
					<h5>ข้อมูลอื่นๆ (ระบุ ชื่อ เบอร์โทร อีเมลล์ LineID FB ในพื้นที่ที่จัดให้เท่านั้น ห้ามกรอกในช่องข้างล่างนี้</h5>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea class="form-control bg-grey2  border-green" rows="7" ></textarea>
                </div>
            </div>
            <div class="clearfix"></div><br>
            <hr>
            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome1()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome3()">ถัดไป</button>
				</div>
			</div>
			<br>
		</div>
		<!--end inputhome2-->

		<!--inputhome3-->
		<div class="inputhome3 display-none">
		   <h3 class="text-primary">ตั้งราคาขาย</h3>

		   <div class="checkbox">
				<p class="text-primary">เพื่อป้องกันความสับสน ราคาที่ประกาศให้ผู้ขายรวมค่าใช้จ่ายทุกอย่างแล้ว <small class="text-primary">ยกเว้นค่าจดจํานอง</small></p>
				<p class="text-grey">
					1. ปรับราคาประกาศขาย เพื่อให้ได้ราคาสุทธิที่ท่านต้องการ<br/>
					2. กำหนดเวลายืนยันราคาขาย<br/>
					3. ยืนยันการใช้บริการ<span class="text-danger">นายหน้า</span>เพื่อให้คุณได้ลูกค้าเร็วขึ้น (คุณยังได้ราคาสุทธิเท่าเดิม)<br/>
					4. กรอกปีที่เริ่มถือครองทรัพย์
				</p>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-12">
					<h5>กำหนดราคาและการชำระเงิน</h5>
				</div>

				<div class="col-md-8">
					<div class="title-z"><span id="showNetPrice">ราคาสุทธิที่ต้องการ (บาท) *</span></div>
					<ul class="list-inline">
						<li class="col-md-6"><input class="form-control input-z" type="text" placeholder="ราคาบาท" name="NetPrice" id="NetPrice" onclick="this.value=document.getElementById('HNetPrice').value;" onchange="updatePost('NetPrice');changeformat();" value="<?php echo '฿'.number_format($this->post->checkPost('NetPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['netprice_title'][0];?>');" onmouseout="hide_title();"></li>  
						<li class="col-md-6"><div class="input-z"><span id="avg">฿<?php echo number_format((($this->post->checkPost('NetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></div></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="title-z">ยืนยันราคาขาย (วัน) *</div>
					<select class="form-control input-z" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')" onmouseover="show_title('<?=$qLabel['agreepostday_title'][0];?>');" onmouseout="hide_title();">
						<?php
						$i=30;
						while ($i<=180){
							?>
							<option value="<?php echo $i;?>" <?php if ($AgreePostDay==$i){echo "selected";};?>><?php echo $i;?>วัน</option>
							<?php
							$i=$i+30;
						}
						?>
					</select>

				</div>
			</div>

			<div class="clearfix"></div><br class="hidden-xs"><br>

			<div class="col-md-12 padding-none">
				<div class="checkbox">
						<label class="padding-none">
							<input type="checkbox" name="" id=""><div class="padding-t3"><h5 class="padding-none">ขายพร้่อมผู้เช่า</h5></div>
						</label>
			    </div>	
			</div>



		  
            
            <div class="row">
            	<div class="col-md-4">
					<div class="title-z">ค่าเช่าสุทธิที่ได้(บาท/เดือน)</div>
					<input class="form-control input-z" type="text" name="">
					
				</div>
				
				
				<div class="col-md-4">
					<div class="title-z">สัญชาติของผู้เช่า</div>
					<select class="form-control input-z" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_nation_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected>ระบุสัญชาติผู้เช่ากรณีมีผู้เช่าอยู่</option>
						<?php
						$query=$this->post->qRentNational();
						foreach ($query->result() as $row){
							$i=$row->RNID;
							$name=$row->Name_th;
							?>
							<option value="<?php echo $i;?>" <?php if ($this->post->checkPost('PRentNational')==$i){echo "selected";};?>><?php echo $name;?></option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="col-md-4">
					<div class="title-z">วันสิ้นสุดสัญญา</div>
					<input class="form-control input-z" type="text" name="PRentEnd" id="PRentEnd">
				</div>
		    </div>
		   
            <hr>
            <div class="clearfix"></div>
           

            
			<div class="col-md-12 padding-none">
					<h5>เพิ่มโอกาสในการขายด้วยนายหน้า (ไม่ต้องเลือก หากไม่ต้องการใช้นายหน้า)</h5>
				
					<div class="col-md-4 col-xs-4 padding-none">
							<div class="checkbox">
								<label class="padding-none">
									<input type="checkbox" name="Broker" id="Broker" value="" onclick=""><span class="text-grey">ตกลง</span>
								</label>
							</div>
					</div>
					<div class="col-md-8 col-xs-8">
					    <div class="text-danger padding-t10">
					      ค่าบริการ 2.0% ฿0 
					    </div>
					</div>
				
					<div class="clearfix"></div>
					<p class="text-grey">ราคาสำหรับนายหน้านำไปเสนอขาย <span class="text-green" id="showTotalPriceBroker">฿<?php echo number_format($this->post->checkPost('TotalPriceBroker'),0,'.',',');?></span> หรือ <span class="text-green" id="showTotalPriceBroker2">฿<?php echo number_format((($this->post->checkPost('TotalPriceBroker'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></p> 
			</div>
			
			<hr/>
			<div class="clearfix"></div><br class="hidden-xs">

			<div class="col-md-12 padding-none">
				<div class="checkbox">
						<label class="padding-none">
							<input type="checkbox" name="" id=""><div class="padding-t3"><h5 class="margin-top-clear">ยืนยันค่าใช้จ่าย ณ กรมที่ดินตามรายละเอียดด้านล่าง (ประกาศจะไม่แสดงหากไม่ยืนยัน)</h5><p class="text-grey">เพื่อให้ผู้ซื้อเปรียบเทียบค่าใช้จ่ายในการซื้อทรัพย์สินได้ง่าย ผู้ขายบน ZmyHome จึงต้องขายบนเงื่อนไขเรื่องค่าธรรมเนียมเหมือนกัน ผู้ขายปรับราคาขายขึ้นได้เพื่อให้ได้ราคาสุทธิที่ต้องการ</p></div>
						</label>
			    </div>	
			</div>

            <div class="clearfix"></div>
			<div class="col-md-12 bg-grey3">
              <br>
			  <div class="col-md-9 col-xs-9">- ค่าธรรมเนียมการทำนิติกรรม (2% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน)</div>
			  <div class="col-md-3 col-xs-3">ผู้ซื้อ - ผู้ขาย 50:50</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- ภาษีธุรกิจเฉพาะ (3.3% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน)<br>(ไม่ต้องเสียถ้าถือครองทรัพย์สินเกิน 5ปี หรือมีชื่อเจ้าของในทะเบียนบ้านเกิน 1 ปี)</div>
			  <div class="col-md-3 col-xs-3">ผู้ขายจ่าย</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- อากรสแตมป์ 0.5% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน <br>(ชำระเฉพาะกรณีไม่ต้องเสียภาษีธุรกิจเฉพาะ)</div>
			  <div class="col-md-3 col-xs-3">ผู้ขายจ่าย</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- ภาษีเงินได้บุคคลธรรมดา <br>(ขึ้นอยู่กับราคาประเมิน และระยะเวลาในการถือครอง)</div>
			  <div class="col-md-3 col-xs-3">ผู้ขายจ่าย</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- ค่าจดจำนอง</div>
			  <div class="col-md-3 col-xs-3">ผู้ซื้อจ่าย</div>
			  <div class="clearfix"></div><br>          
			</div>


       
		    <div class="clearfix"></div>
		    <br>
            <hr>



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome2back()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome4()">ถัดไป</button>
				</div>
			</div>
			<br>
		</div>

		<!--end inputhome3-->

		<!--inputhome4-->
		<div class="inputhome4 display-none">
		      
		          <h3 class="text-primary">มาตรฐานการลงภาพถ่าย</h3><br>
		          <div class="text-primary">ZmyHome ขอสงวนสิทธิ์ในการอนุมัติประกาศ ที่ใช้รูปประกอบที่มีลักษณะดังต่อไปนี้</div><br>
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_01.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary padding-none">มีชื่อเบอร์โทรศัพท์หรือช่องทางติดต่ออื่นๆ</div>
			      </div>
			      <br class="visible-xs">
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_02.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary  padding-none">ชื่อบริษัทหรือเว็บไซท์มีการตัดต่อหรือดัดแปลงรูปถ่าย</div>
			      </div>
			      <br class="visible-xs">
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_03.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary padding-none">มีลายน้ำตราสัญลักษณ์</div>
			      </div>
			      <div class="clearfix"></div><br>
			      
			      <div class="clearfix"></div>  <br>
			      <h5>เพิ่มรูปภายนอกบ้าน (ต้องมีภาพด้านหน้าบ้าน ถ้ามีบ้านหลายหลังในภาพให้วงภาพทรัพย์สิน)</h5>

			        <div class="col-md-6 col-sm-6 padding-left-clear">
			            <div class="thumbnail drop-shadow2 imgContainer nclick">
			               <span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="true"></span>
			               <img  style="height:180px; width:auto;" alt="" src="http://static.zmyhome.com/projImg/838/Picture/2.jpg"/>
			                  <div>
			                    <textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3"></textarea> 
			                  </div>
			            </div>
			        </div>
			        <div class="col-md-6 col-sm-6 padding-left-clear">
			            <div class="thumbnail drop-shadow2 imgContainer nclick">
			               <span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="true"></span>
			               <img  style="height:180px; width:auto;" alt="" src="http://static.zmyhome.com/userImg/2936/56ce810edbe89.jpg"/>
			                  <div>
			                    <textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3" ></textarea> 
			                  </div>
			            </div>
			        </div> 

			         <div class="clearfix"></div>        
		             <div class="col-md-6 col-sm-6 clicker  padding-left-clear">
		            	<div class="thumbnail drop-shadow2 vclick" onmouseover="show_title('...');" onmouseout="hide_title();">
							<img src="/img/add-photo.png" alt="...">
							<div align="center">
							   <div id="waiting4"></div>
						    </div>

							<div class="caption text-left">
								<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
								    <!--Added Dec7-->
				                    <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปห้อง<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></a></h5>
				                    </div>
				                 
								</form>
							</div>
		                </div>
			         </div>
			         <div class="clearfix"></div><br>
			         
			         <h5>เพิ่มรูปห้องต่างๆในบ้าน (ควรเห็นครบทุกห้อง รวมถึงพื้นที่ระเบียง)</h5>
			         <div class="col-md-6 col-sm-6 clicker padding-left-clear">
		            	<div class="thumbnail drop-shadow2 vclick" onmouseover="show_title('...');" onmouseout="hide_title();">
							<img src="/img/add-photo.png" alt="...">
							<div align="center">
							   <div id="waiting4"></div>
						    </div>
					         <div class="caption text-left">
										<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
										    <!--Added Dec7-->
						                    <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปห้อง<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></a></h5>
						                    </div>         
							 	</form>
							</div>
		                </div>
			         </div>
					 <div class="clearfix"></div><br>
			         
                     <h5>เพิ่มรูปสภาพแวดล้อมรอบๆบ้าน (ถ้ามี)</h5>
			         <div class="col-md-6 clicker col-sm-6 padding-left-clear">
		            	<div class="thumbnail drop-shadow2 vclick" onmouseover="show_title('...');" onmouseout="hide_title();">
							<img src="/img/add-photo.png" alt="...">
							<div align="center">
							   <div id="waiting4"></div>
						    </div>
					         <div class="caption text-left">
										<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
										    <!--Added Dec7-->
						                    <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปห้อง<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></a></h5>
						                    </div>         
							 	</form>
							</div>
		                </div>
			         </div>
					 <div class="clearfix"></div><br>

			         <h5>เพิ่มรูปสิ่งอำนวยความสะดวกภายในโครงการ (ถ้ามี)</h5>
			         <div class="col-md-6 col-sm-6 clicker padding-left-clear">
		            	<div class="thumbnail drop-shadow2 vclick" onmouseover="show_title('...');" onmouseout="hide_title();">
							<img src="/img/add-photo.png" alt="...">
							<div align="center">
							   <div id="waiting4"></div>
						    </div>
					         <div class="caption text-left">
										<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
										    <!--Added Dec7-->
						                    <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปห้อง<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></a></h5>
						                    </div>         
							 	</form>
							</div>
		                </div>
			         </div>
					 <div class="clearfix"></div><br>

			         <h5>เพิ่มรูปชุมชนหรือสิ่งอำนวยความสะดวกรอบๆ (ถ้ามี)</h5>
			         <div class="col-md-6 col-sm-6 clicker  padding-none">
		            	<div class="thumbnail drop-shadow2 vclick" onmouseover="show_title('...');" onmouseout="hide_title();">
							<img src="/img/add-photo.png" alt="...">
							<div align="center">
							   <div id="waiting4"></div>
						    </div>
					         <div class="caption text-left">
										<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
										    <!--Added Dec7-->
						                    <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปห้อง<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></a></h5>
						                    </div>         
							 	</form>
							</div>
		                </div>
			         </div>
					
          
           
           

             
           
            <div class="clearfix"></div>
			<br>
	        <hr>



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome3back()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome4()">ถัดไป</button>
				</div>
			</div>
			<br>

		</div>

		<!--end inputhome4-->

		<!--inputhome5-->
		<div class="inputhome5 display-none">
            
        
            <div class="clearfix"></div>
			<br>
	        



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome4back()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12" onclick="submitInputHome5()">ถัดไป</button>
				</div>
			</div>
			<br>

		</div>
		<!--end inputhome5-->



       
		</div><!--end col-md-7-->
		

		<br>


		<div class="col-md-3 col-md-push-2 property-info hidden-xs">
					<div class="text-center">
						<h3 class="z-tip">"ผู้ซื้อได้ข้อมูลครบ<div class="padding-tip-top">ประหยัดเวลาตอบซ้ำ"</div></h3>
						<br>
						<div class="savetime">ประหยัดเวลาขึ้น</div>
						<div><img src="/img/clock-05.png" class="img-responsive center-block"></div>
						<div id="title_panel" class="center-block display-none" style="width:85%;">
						  <br/>
						  <div><img src="/img/tip.png"></div>
						  <h2 class="z-tip">คำแนะนำ</h2>
						  <h3 class="z-tip" id="title_detail"></h3>
						</div>
						<div class="display-none">
							<hr/>
							<div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
							<h5>ห้องนอน</h5>
							<p>ห้องนอนที่ไม่มีห้องน้ำในตัว<br/>ให้นับเป็นครึ่งห้อง</p>
						</div>
						<div class="display-none" id="show_tooltip">
							<hr>
							<h5><div id="text_tooltip"></div></h5>
						</div>
					</div>
			<br/>
		</div>
		<aside class="col-md-2 col-md-pull-10 hidden-xs">
			<ul class="nav padding-top8">
				<li class="step1 active"><a class="cursor" href="#" onclick="submitInputHome1()">เริ่มต้น</a></li>
				<li class="step2"><a class="cursor"href="#" onclick="submitInputHome2()">พื้นฐาน</a></li>
				<li class="step3"><a class="cursor" href="#" onclick="submitInputHome3()">ตั้งราคา</a></li>
				<li class="step4"><a class="cursor" href="#" onclick="submitInputHome4()">รูปถ่าย</a></li>
				<li class="step5"><a class="cursor" href="#" onclick="submitInputHome5()">การสื่อสาร</a></li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li class="padding-l15"><div>เหลือ <span class="green">3 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
			</ul>
		</aside>
	</div>
	<!-- Modal -->
	<div class="modal modal-sm fade display-none" id="myModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<h4 class="text-white text-center padding-none padding-t3" id="myModalLabel" style="">Confirm</h4>
				</div>
				<div class="modal-body row">
					<div class="col-md-12 text-center padding-t120 padding-b120"><h4 class="text-grey">คุณกรอกข้อมูลไม่ครบถ้วน ต้องการไปยังหน้าถัดไป</h4></div>
					<div id="modal_submit" class="col-md-12 padding-top10">
						<button type="button" class="btn btn-orange4 btn-block text-white" onclick="$('#myModalConfirm').modal('hide');$('#myform').submit();">ตกลง</button>
					</div>
					<div class="col-md-12 padding-top10">
						<button type="button" class="btn btn-grey btn-block text-white" data-dismiss="modal" aria-label="Close" onclick="$('#myModalConfirm').modal('hide');">ยกเลิก</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>