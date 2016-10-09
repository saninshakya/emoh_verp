<?
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/searchResult', $attributes);
?>
<input type="hidden" name="TOAdvertising" id="TOAdvertising" value="1,2,8,">
<div class="home-photo margin-t50">
	<div class="col-xs-12 slogan-word home">

		<div class="text-center margin-texthome"><span class="slogan-text" id="hMsg">บ้าน คอนโด เจ้าของขายเอง</span></div>
		<div class="text-center"><span class="slogan-text2" id="sMsg">แนวคิดใหม่ของการซื้อ-เช่า บ้าน คอนโด เพื่อคนไทย</span></div>
		<br>
	</div>
	<div class="col-xs-12 text-center">  
		<div class="text-grey text-center">(Beta Version ซื้อ ขาย เช่า คอนโดมิเนียมเท่านั้น)</div>

		<div class="center-block text-center orange-box"><a class="post-text" href="<?if (!$this->tank_auth->is_logged_in()) {echo '/auth/login2';} else {echo '/zhome/post1/newpost';};?>">
			&nbsp;ลงประกาศฟรี</a></div>
		</div>

		<div class="search-box"">
			<div class="col-xs-12 col-md-6 col-md-push-3 nopadding text-center">
				<div class="col-xs-4 col-sm-2 col-md-3 col-lg-2 nopadding">
					<div id="b1" class="buy-button q-sooth noselect text-center" style="cursor:pointer;" onclick="$('#TOAdvertising').val('1,2,8,');"><a href="#1">ซื้อ</a></div>
					<div id="b2" class="rent-button q-sooth noselect text-center" style="cursor:pointer;" onclick="$('#TOAdvertising').val('5');"><a href="#2">เช่า</a></div>
				</div>
				<div class="col-xs-6 col-sm-9 col-md-7 col-lg-8 search-input">
					<input type="text" id="namePoint" name="namePoint" value="" Placeholder="โครงการ,รถไฟฟ้า" onkeypress="return checkSearch();">
				</div>
				<div class="col-xs-2 col-sm-1 col-md-2 col-lg-2 search-btn" id="btnSubmit">
					<span class="hidden-xs noselect pointer">ค้นหา</span>
					<span class="visible-xs glyphicon glyphicon-search search-btn-symbol"></span>
				</div>
			</div>
		</div>

	</div>

	<div class="col-xs-12 home q-stat-div">

		<div class="col-xs-12 col-md-8 col-md-push-2 q-stat-stage">
			<div class="col-xs-12 col-sm-4 nopadding stat-box">
				<div class="stat-number"><?=number_format($Unit,0);?></div>
				<div class="stat-subtext">ยูนิต</div>
			</div>


			<div class="col-xs-12 col-sm-4 nopadding stat-box">
				<div class="stat-number"><?=number_format($Sale+$Rent,0);?></div>
				<div class="stat-subtext">ขาย-เช่าแล้ว</div>
			</div>


			<div class="col-xs-12 col-sm-4 nopadding stat-box">
				<div class="stat-number"><?=number_format($Project,0);?></div>
				<div class="stat-subtext">โครงการ</div>
			</div>

		</div>
	</div>
	<div class="col-xs-12 text-center home q-maindiv">
		<div class="col-xs-12 q-header text-center hidden-xs">
			<a href="/zhome/howItWork">
				<h1>ซื้อ ขาย เช่า กับ ZmyHome</h1>
			</a>
		</div>
		<div class="col-xs-12">
			<h2>ZmyHome แตกต่างจากเว็บอสังหาอื่นๆอย่างไร?</h2>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-12 col-md-8 col-md-push-2 nopadding">
				<h3 class="justify">&nbsp;&nbsp;&nbsp;ZmyHome เว็บคอนโดเจ้าของขายเอง มุ่งมั่นที่จะทำให้คนไทยซื้อ ขาย หรือเช่าบ้าน ได้อย่างสะดวก รวดเร็ว และประหยัด โดยให้ผู้ลงประกาศให้ข้อมูลที่จำเป็นอย่างครบถ้วน และผู้ซื้อได้ใช้เครื่องมือต่างๆบน ZmyHome เพื่อให้ทั้งผู้ซื้อและผู้ขายเห็นภาพที่แท้จริงของตลาด และตัดสินใจได้ถูกต้อง</h3>
			</div>
		</div>
		<div class="col-xs-12 q-compare-div">
			<div class="col-md-1 hidden-xs"></div>		
			<div class="col-xs-12 col-md-5 text-grey q-infopic-div">
				<img src="/img/zhouse2.png" alt="ต้องโทรถามรายละเอียด">
				<div class='q-infotext'>
					<h3 class="text-grey" style="text-align:center;">
						<strong>คนซื้อ</strong> 
						<span>“ต้องโทรถามรายละเอียด กับขอดูรูปตลอด”</span>
						<br>
						<strong>เจ้าของ</strong> 
						<span>“มีคนติดต่อหรือมาดูบ่อย แต่ดูแล้วเงียบ”</span>
					</h3>
				</div>
			</div>
			<div class="col-xs-12 col-md-5 text-grey q-infopic-div">
				<img src="/img/zhouse1.png" alt="ดูจากเว็บก็เกือบตัดสินใจซื้อได้เลย">
				<div class='q-infotext'>
					<h3 class="text-grey" style="text-align:center;">
						<strong>คนซื้อ</strong>
						<span>“ดูจากเว็บก็เกือบตัดสินใจซื้อได้เลย”</span>
						<br>
						<strong>เจ้าของ</strong> 
						<span>“ลงข้อมูลครบ เปิดบ้านไม่กี่ครั้งก็ขายได้”</span>
					</h3>
				</div>        
				<!-- <div><h3 class="text-grey "><strong>เจ้าของ</strong> “ลงข้อมูลครบ เปิดบ้านไม่กี่ครั้งก็ขายได้”</h3></div>               -->
			</div>
		</div>
	</div>

	<!--3columns-->
	<div class="col-xs-12 bg-grey3 home text-center q-maindiv">	
		<div class="col-xs-12 ">
			<div class="col-xs-12 q-header text-center">
				<h2>ทำไมต้อง ZmyHome?</h2>
			</div>
		</div>
		<div class="col-xs-12 col-md-8 col-md-push-2">
			<div class="col-xs-12 col-md-4 q-aventage">
				<img src="/img/how-it-works-symbols-02.png" alt="เครื่องมือมากมายช่วยคุณ" class="img-responsive center-block" />     
				<div><h4>เครื่องมือมากมายช่วยคุณ</h4></div>      
			</div>

			<div class="col-xs-12 col-md-4 q-aventage">
				<img src="/img/how-it-works-symbols-04.png" alt="บนความเข้าใจตลาด" class="img-responsive center-block"/>
				<div><h4>บนความเข้าใจตลาด</h4></div>
			</div>

			<div class="col-xs-12 col-md-4 q-aventage">
				<img src="/img/how-it-works-symbols-06.png" alt="สำหรับเจ้าของขายเอง" class="img-responsive center-block" />
				<div><h4>สำหรับเจ้าของขายเอง</h4></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<!--End 3columns-->
<div class="clearfix"></div>

<!--3columns-->
<div class="col-xs-12  home text-center q-maindiv">
	<div class="col-xs-12 col-md-8 col-md-push-2">
		<div class="col-xs-12">
			<h2 class=" ">ทำไมต้องเจ้าของขายเอง?</h2>
		</div>
		<div class="clearfix"></div>
		<div class="col-xs-12 col-md-4 q-col3-content">
			<div class="col-xs-12 text-grey ">
				<img class="img-responsive center-block q-col3-pic" src="/img/h1-icon.png" alt="เจ้าของยืนยันข้อมูลทุกหลัง">
			</div>
			<div class="col-xs-12">
				<h4 class="q-col3-label ">ค้นหาง่าย </h4>
				<h5> ไม่ถูกขึ้นราคา / ขายไปแล้ว เจ้าของยืนยันข้อมูลทุกหลัง</h5>
			</div>
		</div>
		<div class="col-xs-12 col-md-4 q-col3-content">   
			<div class="col-xs-12 text-grey ">
				<img class="img-responsive center-block q-col3-pic"  src="/img/h2-icon.png" alt="ซื้อขายได้เอง ไม่ต้องผ่านคนกลาง">
			</div>
			<div class="col-xs-12">
				<h4 class="q-col3-label ">ราคาดี </h4>  
				<h5> ซื้อขายได้เอง ไม่ต้องผ่านคนกลาง</h5>
			</div>
		</div>
		<div class="col-xs-12 col-md-4 q-col3-content">

			<div class="col-xs-12 nopadding text-grey ">
				<img class="img-responsive center-block q-col3-pic" src="/img/h3-icon.png" alt="ข้อมูล & ตัวชี้วัดที่มีประโยชน์">
			</div>
			<div class="col-xs-12 nopadding">
				<h4 class="q-col3-label ">ตัดสินใจถูกต้อง</h4>
				<h5>ด้วยข้อมูล & ตัวชี้วัด ที่มีประโยชน์บน ZmyHome</h5>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>

	<!--End 3columns-->
</div>

<div class="clearfix"></div>
<div class="col-xs-12 nopadding bg-grey3 hidden-sm hidden-xs">
	<div class="clearfix"></div>
	<div class="col-xs-12 col-xs-12 home text-center">
		<h2 class="font-responsive2">ขายคอนโด ใกล้รถไฟฟ้า</h2></div>
		<div class="col-xs-12 nopadding">
			<div class="clearfix"></div>
			<div class="col-md-2"></div>
			<div class="col-md-8 col-xs-12">
				<?$Status="";$count_bts=0;foreach ($BTS->result() as $row){$count_bts++;if($row->Status!=$Status){if($row->Status==1){$Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";$Status_color="text-blue";}else{$Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";$Status_color="text-red";}echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";}$KeyNameAnchor=str_replace(" ","-",$row->KeyName);$KeyNameAnchor=str_replace("(","",$KeyNameAnchor);$KeyNameAnchor=str_replace(")","",$KeyNameAnchor);?>
				<div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>/0/0/3000/1-2-" class="text-grey" title="คอนโดใกล้รถไฟฟ้า <?=$row->KeyName;?>  "><?=$row->KeyName;?></a></div>
				<?if($row->Status!=$Status){$Status=$row->Status;}if($count_bts==16){echo "</div><div class='clearfix'></div><div class='col-md-2'></div><div class='moreshow col-md-8 col-xs-12 display-none'>";}}?></div>
				<div class="col-md-2"></div>
				<!--<div class="clearfix"></div><div class="col-md-2"></div><div class="col-md-8 col-xs-12"><div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/BTS" class="text-blue">ดูรายชื่อโครงการใกล้ BTS</a></div></div><div class="col-md-2"></div>--></div>
				<div class="clearfix"></div>
				<div class="moreshow col-xs-12 nopadding display-none">
					<!--<div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดขาย ตามสถานีรถไฟฟ้าเอ็มอาร์ที</h2></div>-->
					<div class="clearfix"></div>
					<div class="col-md-2"></div>
					<div class="col-md-8 col-xs-12">
						<?$Status="";$count_mrt=0;foreach ($MRT->result() as $row){$count_mrt++;if($row->Status!=$Status){if($row->Status==1){$Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";$Status_color="text-blue";}else{$Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";$Status_color="text-red";}echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";}$KeyNameAnchor=str_replace(" ","-",$row->KeyName);$KeyNameAnchor=str_replace("(","",$KeyNameAnchor);$KeyNameAnchor=str_replace(")","",$KeyNameAnchor);?>
						<div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>/0/0/3000/1-2-" class="text-grey" title="คอนโดใกล้รถไฟฟ้า <?=$row->KeyName;?>  "><?=$row->KeyName;?></a></div>
						<?if($row->Status!=$Status){$Status=$row->Status;}}?>
					</div>
					<div class="col-md-2"></div>
					<!--<div class="clearfix"></div><div class="col-md-2"></div><div class="col-md-8 col-xs-12"><div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/MRT" class="text-blue">ดูรายชื่อโครงการใกล้ MRT</a></div></div><div class="col-md-2"></div>--></div>
					<div class="clearfix"></div>
					<div class="moreshow col-xs-12 nopadding display-none">
						<!--<div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดขาย ตามสถานีรถไฟแอร์พอร์ทลิ้งค์</h2></div>-->
						<div class="clearfix"></div>
						<div class="col-md-2"></div>
						<div class="col-md-8 col-xs-12">
							<?$Status="";$count_arl=0;foreach ($ARL->result() as $row){$count_arl++;if($row->Status!=$Status){if($row->Status==1){$Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";$Status_color="text-blue";}else{$Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";$Status_color="text-red";}echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";}$KeyNameAnchor=str_replace(" ","-",$row->KeyName);$KeyNameAnchor=str_replace("(","",$KeyNameAnchor);$KeyNameAnchor=str_replace(")","",$KeyNameAnchor);?>
							<div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>/0/0/3000/1-2-" class="text-grey" title="คอนโดใกล้รถไฟฟ้า <?=$row->KeyName;?>  "><?=$row->KeyName;?></a></div>
							<?if($row->Status!=$Status){$Status=$row->Status;}}?>
						</div>
						<div class="col-md-2"></div>
						<!--<div class="clearfix"></div><div class="col-md-2"></div><div class="col-md-8 col-xs-12"><div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/ARL" class="text-blue">ดูรายชื่อโครงการใกล้ ARL</a></div></div><div class="col-md-2"></div>--></div>
						<div class="col-xs-12 nopadding">
							<div class="clearfix"></div>
							<div class="col-md-2"></div>
							<div class="col-md-8 col-xs-12">
								<div class='col-md-12 col-xs-12 text-right'>
									<button id="dp-show" type="button" class="btn btn-default btn-lg bg-grey3 text-red" style="border-width:0px;" aria-label="Left Align">ดูเพิ่มเติม ...</button>
									<button id="dp-hide" type="button" class="btn btn-default btn-lg bg-grey3 text-red display-none" style="border-width:0px;" aria-label="Left Align">ซ่อน</button>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 col-xs-12 home text-center">
							<h2 class="font-responsive2">ขายคอนโด ตามราคา</h2></div>
							<div class="col-xs-12 nopadding">
								<div class="clearfix">&nbsp;</div>
								<div class="col-md-2"></div>
								<div class="col-md-8 col-xs-12">
									<?for($i=0;$i<10;$i++){$KeyNameAnchor="BTS-อนุสาวรีย์ชัย";$minPrice=$i*1000000;$maxPrice=($i+1)*1000000;$minPriceShow=$i."ล้าน";$maxPriceShow=($i+1)."ล้าน";?>
									<div class="col-md-3 col-sm-6 col-xs-6 text-left">
										<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/<?=$minPrice;?>/<?=$maxPrice;?>#" class="text-grey" title="<?echo "ขายคอนโดราคา ".$minPriceShow."-".$maxPriceShow;?>">
											<?echo "คอนโดราคา ".$minPriceShow."-".$maxPriceShow;?>
										</a>
									</div>
									<?}?>
									<div class="col-md-3 col-xs-6 text-left">
										<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/10000000/20000000/<?=$distanceCenter;?>/1-2-" class="text-grey" title="<?echo "ขายคอนโดราคา 10ล้าน-20ล้าน";?>">
											<?echo "คอนโดราคา 10ล้าน-20ล้าน";?>
										</a>
									</div>
									<div class="col-md-3 col-xs-6 text-left">
										<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/20000000/30000000<?=$distanceCenter;?>/1-2-" class="text-grey" title="<?echo "ขายคอนโดราคา 10ล้าน-20ล้าน";?>">
											<?echo "คอนโดราคา 10ล้าน-20ล้าน";?>
										</a>
									</div>
									<div class="col-md-3 col-xs-6 text-left">
										<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/30000000/50000000<?=$distanceCenter;?>/1-2-" class="text-grey" title="<?echo "ขายคอนโดราคา 30ล้าน-50ล้าน";?>">
											<?echo "คอนโดราคา 30ล้าน-50ล้าน";?>
										</a>
									</div>
									<div class="col-md-3 col-xs-6 text-left">
										<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/50000000/0/<?=$distanceCenter;?>/1-2-" class="text-grey" title="<?echo "ขายคอนโดราคามากกว่า 50ล้าน";?>">
											<?echo "คอนโดราคามากกว่า 50ล้าน";?>
										</a>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<div class="clearfix">&nbsp;</div>
							<div class="clearfix">&nbsp;</div>
						</div>
						<div class="clearfix">&nbsp;</div>
						<div class="col-xs-12 nopadding bg-white hidden-sm hidden-xs">
							<div class="col-md-12 col-xs-12 home text-center">
								<h2 class="font-responsive2">คอนโดให้เช่า ใกล้รถไฟฟ้า</h2></div>
								<div class="col-xs-12 nopadding">
									<div class="clearfix"></div>
									<div class="col-md-2"></div>
									<div class="col-md-8 col-xs-12">
										<?$Status="";$count_bts=0;foreach ($BTS->result() as $row){$count_bts++;if($row->Status!=$Status){if($row->Status==1){$Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";$Status_color="text-blue";}else{$Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";$Status_color="text-red";}echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";}$KeyNameAnchor=str_replace(" ","-",$row->KeyName);$KeyNameAnchor=str_replace("(","",$KeyNameAnchor);$KeyNameAnchor=str_replace(")","",$KeyNameAnchor);?>
										<div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>/0/0/3000/5" class="text-grey" title="คอนโดให้เช่า ใกล้รถไฟฟ้า <?=$row->KeyName;?>"><?=$row->KeyName;?></a></div>
										<?if($row->Status!=$Status){$Status=$row->Status;}if($count_bts==16){echo "</div><div class='clearfix'></div><div class='col-md-2'></div><div class='moreshow2 col-md-8 col-xs-12 display-none'>";}}?></div>
										<div class="col-md-2"></div>
										<!--<div class="clearfix"></div><div class="col-md-2"></div><div class="col-md-8 col-xs-12"><div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/BTS" class="text-blue">ดูรายชื่อโครงการใกล้ BTS</a></div></div><div class="col-md-2"></div>--></div>
										<div class="clearfix"></div>
										<div class="moreshow2 col-xs-12 nopadding display-none">
											<!--<div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดให้เช่า ตามสถานีรถไฟฟ้าเอ็มอาร์ที</h2></div>-->
											<div class="clearfix"></div>
											<div class="col-md-2"></div>
											<div class="col-md-8 col-xs-12">
												<?$Status="";$count_mrt=0;foreach ($MRT->result() as $row){$count_mrt++;if($row->Status!=$Status){if($row->Status==1){$Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";$Status_color="text-blue";}else{$Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";$Status_color="text-red";}echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";}$KeyNameAnchor=str_replace(" ","-",$row->KeyName);$KeyNameAnchor=str_replace("(","",$KeyNameAnchor);$KeyNameAnchor=str_replace(")","",$KeyNameAnchor);?>
												<div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>/0/0/3000/5" class="text-grey" title="คอนโดให้เช่า ใกล้รถไฟฟ้า <?=$row->KeyName;?>"><?=$row->KeyName;?></a></div>
												<?if($row->Status!=$Status){$Status=$row->Status;}}?>
											</div>
											<div class="col-md-2"></div>
											<!--<div class="clearfix"></div><div class="col-md-2"></div><div class="col-md-8 col-xs-12"><div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/MRT" class="text-blue">ดูรายชื่อโครงการใกล้ MRT</a></div></div><div class="col-md-2"></div>--></div>
											<div class="clearfix"></div>
											<div class="moreshow2 col-xs-12 nopadding display-none">
												<!--<div class="col-md-12 home text-center"><h2 class="font-responsive2">คอนโดให้เช่า ตามสถานีรถไฟแอร์พอร์ทลิ้งค์</h2></div>-->
												<div class="clearfix"></div>
												<div class="col-md-2"></div>
												<div class="col-md-8 col-xs-12">
													<?$Status="";$count_arl=0;foreach ($ARL->result() as $row){$count_arl++;if($row->Status!=$Status){if($row->Status==1){$Status_txt=$row->Type." ที่เปิดใช้งานปัจจุบัน";$Status_color="text-blue";}else{$Status_txt=$row->Type." ที่เปิดใช้งานในอนาคต";$Status_color="text-red";}echo "<div class='col-md-12 col-xs-12 text-left'><h5 class='".$Status_color."'>".$Status_txt."</h5></div>";}$KeyNameAnchor=str_replace(" ","-",$row->KeyName);$KeyNameAnchor=str_replace("(","",$KeyNameAnchor);$KeyNameAnchor=str_replace(")","",$KeyNameAnchor);?>
													<div class="col-md-3 col-xs-6 text-left"><a href="<?=base_url();?>Zhome/searchResult/<?=$row->ID;?>/<?=$KeyNameAnchor;?>/0/0/3000/5" class="text-grey" title="คอนโดให้เช่า ใกล้รถไฟฟ้า <?=$row->KeyName;?>"><?=$row->KeyName;?></a></div>
													<?if($row->Status!=$Status){$Status=$row->Status;}}?>
												</div>
												<div class="col-md-2"></div>
												<!--<div class="clearfix"></div><div class="col-md-2"></div><div class="col-md-8 col-xs-12"><div class='col-md-12 col-xs-12 text-left'><a href="<?=base_url();?>Zhome/listViewProject/ARL" class="text-blue">ดูรายชื่อโครงการใกล้ ARL</a></div></div><div class="col-md-2"></div>--></div>
												<div class="col-xs-12 nopadding">
													<div class="clearfix"></div>
													<div class="col-md-2"></div>
													<div class="col-md-8 col-xs-12">
														<div class='col-md-12 col-xs-12 text-right'>
															<button id="dp-show2" type="button" class="btn btn-default btn-lg text-red" style="border-width:0px;" aria-label="Left Align">ดูเพิ่มเติม ...</button>
															<button id="dp-hide2" type="button" class="btn btn-default btn-lg text-red display-none" style="border-width:0px;" aria-label="Left Align">ซ่อน</button>
														</div>
													</div>
													<div class="col-md-2"></div>
												</div>
												<div class="clearfix"></div>
												<div class="col-md-12 col-xs-12 home text-center">
													<h2 class="font-responsive2">คอนโดให้เช่า ตามค่าเช่า</h2></div>
													<div class="col-xs-12 nopadding">
														<div class="clearfix">&nbsp;</div>
														<div class="col-md-2"></div>
														<div class="col-md-8 col-xs-12">
															<?for($i=0;$i<10;$i++){$KeyNameAnchor="BTS-อนุสาวรีย์ชัย";$minPrice=$i*10000;$maxPrice=($i+1)*10000;$minPriceShow=number_format($minPrice);$maxPriceShow=number_format($maxPrice);?>
															<div class="col-md-3 col-sm-6 col-xs-6 text-left">
																<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/<?=$minPrice;?>/<?=$maxPrice;?>/<?=$distanceCenter;?>/5" class="text-grey" title="<?echo "คอนโดให้เช่า ".$minPriceShow."-".$maxPriceShow;?>">
																	<?echo "คอนโดให้เช่า ".$minPriceShow."-".$maxPriceShow;?>
																</a>
															</div>
															<?}?>
															<div class="col-md-3 col-xs-6 text-left">
																<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/100000/200000/<?=$distanceCenter;?>/5" class="text-grey" title="<?echo "คอนโดให้เช่า 100,000-200,000";?>">
																	<?echo "คอนโดให้เช่า 100,000-200,000";?>
																</a>
															</div>
															<div class="col-md-3 col-xs-6 text-left">
																<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/200000/300000/<?=$distanceCenter;?>/5" class="text-grey" title="<?echo "คอนโดให้เช่า 200,000-300,000";?>">
																	<?echo "คอนโดให้เช่า 200,000-300,000";?>
																</a>
															</div>
															<div class="col-md-3 col-xs-6 text-left">
																<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/300000/500000/<?=$distanceCenter;?>/5" class="text-grey" title="<?echo "คอนโดให้เช่า 300,000-500,000";?>">
																	<?echo "คอนโดให้เช่า 300,000-500,000";?>
																</a>
															</div>
															<div class="col-md-3 col-xs-6 text-left">
																<a href="<?=base_url();?>Zhome/searchResult/324/<?=$KeyNameAnchor;?>/500000/0/<?=$distanceCenter;?>/5" class="text-grey" title="<?echo "คอนโดให้เช่ามากกว่า 500,000";?>">
																	<?echo "คอนโดให้เช่ามากกว่า 500,000";?>
																</a>
															</div>
														</div>
														<div class="col-md-2"></div>
													</div>
													<div class="clearfix">&nbsp;</div>
													<div class="clearfix">&nbsp;</div>
												</div>
												<div class="col-xs-12 nopadding bg-grey3">
													<div class="home text-center q-quickpost-btn">
														<div class="text-center orange-box center-block"><a class="post-text center-block " href="<?if (!$this->tank_auth->is_logged_in()) {echo '/auth/login2';} else {echo '/zhome/post1/newpost';}?>">ลงประกาศทันที</a></div>
													</div>
													<div class="clearfix"></div>
												</div>