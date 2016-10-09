<div class="container">
        <aside class="col-md-2 hidden-xs">
            <ul class="nav">
              <li class="dashboard-active"><a><h4>ประกาศของคุณ</h4></a></li>
            </ul>
            <div class="h360 hidden-xs"></div> 
          </aside>
<?php	
	if ($clist->num_rows()==0){
?>
          <div class="col-md-10">
            <h3 class="text-primary">ไม่มีประกาศ</h3>
			<hr>
<?php
	} else {
?>
          <div class="col-md-10">
            <h3 class="text-primary">ประกาศ</h3>
            <hr>
<?php
	//loop unlist detail
	foreach ($clist->result() as $row){
		$POID=$row->POID;
		$Address=$row->Address;
		$RoomNumber=$row->RoomNumber;
		$ProjectName=$row->ProjectName;
		$OwnerName=$row->OwnerName;
		$Telephone=$row->Telephone1;
		if ($Address!=null and $Address!=''){ 
			$prefix=$Address;
		} else {
			$prefix=$RoomNumber;
		};
		$TOAdvertising=$row->TOAdvertising;
		if ($TOAdvertising==2){
			$Price=$row->DTotalPrice;
			$prefixTOAdv="ขายดาวน์";
		}
		if ($TOAdvertising==5){
			$Price=$row->PRentPrice;
			$prefixTOAdv="เช่า";
		}
		$useArea=$row->useArea;
		$terraceArea=$row->terraceArea;
		$sumArea=$useArea+$terraceArea;
		if ($sumArea!=0){
			$PricePerSq=$Price/$sumArea;
		} else {
			$PricePerSq=0;
		};
		$Token=$row->Token;
		$Floor=$row->Floor;
		$Bedroom=$row->Bedroom;
		if ($Bedroom=="99"){
			$Bedroom="ห้องสตูดิโอ";
		} else {
			$Bedroom=$Bedroom." นอน";
		}
		$NumExpire=$this->dashboard->DateExpireNum($Token);
?>
            
            <div class="row">
              <div class="col-md-4">
                <a href="/zhome/unitDetailOwner/<?=$POID;?>" target="_bank"><img src="<?=$this->dashboard->imageList($POID)?>" class="img-responsive imgDashBoard"></a>
              </div>
              
              <div class="col-md-4">
                <div><strong><?=$prefix?> <?=$ProjectName?></strong></div>
<?php
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
?>
				<div><?=$OwnerName;?> Tel:<?=$Telephone;?></div>
<?php
	};
?>
				<div class="text-grey padding-right">
					<span>ชั้น <?=$Floor?> </span>
					<span>&nbsp;<?=$Bedroom?></span>  
					<span><?=$sumArea?> ม<sup>2</sup></span> 
				</div>
                <br>
                <div class="text-grey"> <span class="glyphicon glyphicon-list-alt text-grey" aria-hidden="true"></span>  เหลือ <?=$NumExpire?> วัน 
				<?php 
					if ($NumExpire<30){
				?>
					<a class="text-blue underline" href="/zhome/AddDateExpire/<?=$Token?>">เพิ่ม 2 เดือนฟรี </a>
				<?php
					}
				?>
				</div>
               
              </div>

              <div class="col-md-4">
                 <div class="text-grey padding-right"><b><?=$prefixTOAdv?></b>&nbsp;&nbsp;&nbsp;<span>฿ <?=number_format($Price,0,'.',',');?></div>
                 <br>
                 <div class="text-blue padding-right">
                    <span class="glyphicon glyphicon-eye-open text-blue"></span>
                    <span><?=$this->dashboard->countViewPost($POID);?></span>
                    <span class="glyphicon glyphicon-earphone text-blue"></span>
                    <span><?=$this->dashboard->countTelPost($POID);?></span>
                 </div>
                 <div><a class="text-red underline" href="#" title="ยังไม่เปิดใหัใช้งาน"><span class="glyphicon glyphicon-earphone text-blue"></span> ขายด่วน 90วัน</a>&nbsp;&nbsp;&nbsp;
				 <a class="text-blue underline" href="/zhome/EditPost2/<?=$Token?>">แก้ไขประกาศ</a>
                 </div>
    				<div class="text-grey padding-right"><br>
					<button type="button" class="btn btn-blue btn-dash"  onclick='if (confirm("คุณแน่ใจที่จะซ่อนประกาศนี้?")) window.location.href="/zhome/hpost/<?=$Token?>"'>
					ซ่อนประกาศ <br>(กำลังตกลงราคา/ไม่ต้องการแสดง)
					</button>
					</div>
              </div>

            
            
            <!--end col md4-->
            </div>
            <hr>
<?php
	//end loop clist detail
	}
?>
            <!--end row-->
            <br><br>
<?php
	};
?>
<?php	
	if ($unlist->num_rows()>0){
?>
             <h3 class="text-warning">รอประกาศ</h3>
            <hr>
<?php
	$attributes = array('class' => 'email', 'id' => 'EditPost');
	echo form_open('/zhome/EditPost', $attributes);
?>
	<input type="hidden" name="Token" id="Token">
<?php
	//loop unlist detail
	foreach ($unlist->result() as $row){
		$POID=$row->POID;
		if ($row->Active=="3"){
			$Msg=$this->dashboard->checkMsg($POID);
		} else {
			$Msg="";
		};
		$Address=$row->Address;
		$RoomNumber=$row->RoomNumber;
		$ProjectName=$row->ProjectName;
		$OwnerName=$row->OwnerName;
		$Telephone=$row->Telephone1;
		$Active=$row->Active;
		if ($Address!=null and $Address!=''){ 
			$prefix=$Address;
		} else {
			$prefix=$RoomNumber;
		};
		$TOAdvertising=$row->TOAdvertising;
		if ($TOAdvertising==2){
			$Price=$row->DTotalPrice;
			$prefixTOAdv="ขายดาวน์";
		};
		if ($TOAdvertising==5){
			$Price=$row->PRentPrice;
			$prefixTOAdv="เช่า";
		};
		$useArea=$row->useArea;
		$terraceArea=$row->terraceArea;
		$sumArea=$useArea+$terraceArea;
		if ($sumArea!=0){
			$PricePerSq=$Price/$sumArea;
		} else {
			$PricePerSq=0;
		};
		$Token=$row->Token;
		$wStep=5-($row->Step1)-($row->Step2)-($row->Step3)-($row->Step4)-($row->Step5);
		$Floor=$row->Floor;
		$Bedroom=$row->Bedroom;
		if ($Bedroom=="99"){
			$Bedroom="ห้องสตูดิโอ";
		} else {
			$Bedroom=$Bedroom." นอน";
		}
		$NumExpire=$this->dashboard->DateExpireNum($Token);

?>
            <div class="row">
              <div class="col-md-4">
                <a href="/zhome/unitDetailOwner/<?=$POID;?>" target="_bank"><img  height="90px" src="<?=$this->dashboard->imageList($POID)?>" class="img-responsive imgDashBoard"></a>
              </div>
              
              <div class="col-md-4">
                <div><strong><?=$prefix?> <?=$ProjectName?></strong><?if ($Active=="91"){ echo "<br>(ประกาศถูกซ่อน)";};?></div>
<?php
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
?>		
				<div><?=$OwnerName;?> Tel:<?=$Telephone;?></div>
<?php
	}
?>
				<div class="text-grey padding-right">
					<span>ชั้น <?=$Floor?> </span>
					<span>&nbsp;<?=$Bedroom?></span>  
					<span><?=$sumArea?> ม<sup>2</sup></span> 
				</div>
				<br>
				<div><strong><font color="red"><?=$Msg;?></font></strong></div>
              </div>

              <div class="col-md-4">
                 <div class="text-grey padding-right"><b><?=$prefixTOAdv?></b>&nbsp;&nbsp;&nbsp;<span>฿ <?=number_format($Price,0,'.',',');?> </div>
                 <br>
                 <br>
				 <?php
				if ($Active!=91){
					if ($wStep!="0"){
				  ?>
                 <button type="button" class="btn btn-green btn-dash" onclick='document.getElementById("Token").value="<?=$Token?>";document.getElementById("EditPost").submit();'> เหลือ <?=$wStep;?> ขั้นตอน</button>
				 <?php
					} else {
				 ?>
				<button type="button" class="btn btn-red btn-dash"  onclick='document.getElementById("Token").value="<?=$Token?>";document.getElementById("EditPost").submit();'>รอการตรวจสอบข้อมูลจากทีมงาน<br>แก้ไขประกาศ</button>
				 <?php
				  };
				  } else {
				 ?>
				 <button type="button" class="btn btn-blue btn-dash"  onclick='if (confirm("คุณแน่ใจที่จะเลิกซ่อนประกาศนี้?")) window.location.href="/zhome/unhpost/<?=$Token?>"'>ยกเลิกซ่อนประกาศ</button>
				 <?php
				  };
				 ?>
<?php
	if ($Active==0){
?>
    				<div class="text-grey padding-right"><br>
					<button type="button" class="btn btn-blue btn-dash"  onclick='if (confirm("คุณแน่ใจที่จะลบประกาศนี้?")) window.location.href="/zhome/dpost/<?=$Token?>"'>
						ลบประกาศ
					</button>
					</div>
<?php
	};
?>
<?php
	if ($Active==91){
?>
    				<div class="text-grey padding-right"><br>
					<button type="button" class="btn btn-blue btn-dash"  onclick='if (confirm("คุณแน่ใจที่จะลบประกาศเนื่องจากตกลงการขายได้หรือมีผู้เช่าแล้ว?")) window.location.href="/zhome/epost/<?=$Token?>"'>
						ลบประกาศ (ขายได้/มีผู้เช่าแล้ว)
					</button>
					</div>
<?php
	};
?>
			  </div>
			  

            <!--end col md4-->
            </div>
            <hr>
<?php
	//end loop unlist detail
	}
?>
            <br>
<?php
	//end loop unlist
	};
?>
</form>

  </div>
</div>
