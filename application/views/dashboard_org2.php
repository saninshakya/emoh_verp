<div class="container">
        <div class="margin-t50"></div>
<!--
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4 btn-group" role="group" aria-label="...">
					<a href="/zhome/editProfile" target="_blank"><button type="button" class="btn btn-default">แก้ไขประวัติ</button></a>
				</div>
			</div>
			<hr>
		</div>
-->
		<aside class="col-md-2 hidden-xs">
            <ul class="nav">
              <li class="dashboard-active"><a><h4>ประกาศของคุณ</h4></a></li>
            </ul>
            <div class="h360 hidden-xs"></div> 
          </aside>
		  
<?php
	if ($ListPostType1->num_rows()==0){
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
	//loop ListPostType1 detail
	foreach ($ListPostType1->result() as $row){
		$POID=$row->POID;
		$Address=$row->Address;
		$RoomNumber=$row->RoomNumber;
		$ProjectName=$row->ProjectName;
		$OwnerName=$row->OwnerName;
		$Telephone=$row->Telephone1;
		$Active=$row->Active;
		$ActivePrefix="";
		if ($Active==81){
			$ActivePrefix="(ให้เช่าแล้ว)";
		}
		if ($Active==82){
			$ActivePrefix="(ขายแล้ว)";
		}
		if ($Active==92){
			$ActivePrefix="(ประกาศหมดอายุ)";
		}
		if ($Active==93){
			$ActivePrefix="(ซ่อนประกาศ)";
		}
		

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
		if ($TOAdvertising==1){
			$Price=$row->TotalPrice;
			$prefixTOAdv="ขาย";
		}
		$useArea=$row->useArea;
		$terraceArea=$row->terraceArea;
		$sumArea=$useArea;
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
                <a href="/zhome/unitDetailOwner/<?=$POID;?>" target="_blank"><img src="<?=$this->dashboard->imageList($POID)?>" class="img-responsive imgDashBoard"></a>
              </div>
              
              <div id="dash-list" class="col-md-4 col-xs-6 padding-l0">
                <div style="height:50px;">
                  <h4 class="text-grey"><?=$ActivePrefix." ".$prefix." ".$ProjectName?><h4>
				 <div class="text-grey padding-right">
				 	<span>ชั้น<?=$Floor?></span>
					<span> <?=$Bedroom?></span>  
					<span> <?=$sumArea?> ตร.ม.</span> 
				  </div>
                
                </div>
                <div class="padding-t7 visible-lg"></div>
                <div class="text-grey i5-paading-top8"> 
	                <!--<span class="glyphicon glyphicon-list-alt text-grey" aria-hidden="true"></span>&nbsp;-->
	                <?php
	                if ($Active==1 || $Active==92){
	                ?>	
	                <button type="button" class="btn btn-orange2 btn-dash pull-right">
					<?php
						if ($NumExpire<0){
					?>
					หมดอายุ
					<?php
					} else {
					?>
					เหลือ <?=$NumExpire?> วัน 
					<?php
					}
					?>
					<?php 
						if ($NumExpire<30){
					?>
						<span onclick="location.href='/zhome/AddDateExpire/<?=$Token?>'"> ต่อออายุ 2เดือนฟรี</span>
					<?php
						}
					?>
					</button>
					<?php
					};
					?>
				</div>               
              </div>

              <div id="dash-list2" class="col-md-4 col-xs-6 padding-lr0">
                <div style="height:60px;">
                    <div class="text-grey col-md-12 col-xs-12 padding-lr0">
                       <div class="pull-left w60 padding-lr0"><span><h4 class="text-grey"><?=$prefixTOAdv?></h4></span></div>
                       <div class="pull-left w35"><span class="text-blue padding-none h4s"><h4>฿ <?=number_format($Price,0,'.',',');?></h4></span></div>
                       <?php
                       		if ($Active==1){
						?>
                       <div class="pull-right w5 padding-t6"><span class="glyphicon glyphicon-remove input-sm text-grey2 padding-none " aria-hidden="true" onclick='if (confirm("คุณแน่ใจที่จะซ่อนประกาศนี้?")) window.location.href="/zhome/hpost/<?=$Token?>"'></span></div>
						<?php                       			
                       		} else {
                       	?>
                        <div class="pull-right w5 padding-t6"><span class="glyphicon glyphicon-remove input-sm text-grey2 padding-none" aria-hidden="true" onclick='if (confirm("คุณแน่ใจที่จะลบประกาศนี้?")) window.location.href="/zhome/dpost/<?=$Token?>"'></span></div>                       	
                       	<?php
                       		}
						?>                  
                    </div>
                
               
                 <div class="clearfix"></div>
                

                 <div class="text-blue padding-l1">
                    <span><img class="padding-l15 padding-none" src="/img/sun-s-icon.png"></span>
                    <span><?=$row->ActiveDay;?></span>
                    <span class="glyphicon glyphicon-eye-open text-blue padding-l15 padding-none"></span>
                    <span><?=$this->dashboard->countViewPost($POID);?></span>
                    <span class="glyphicon glyphicon-earphone text-blue padding-l15 padding-none"></span>
                    <span><?=$this->dashboard->countTelPost($POID);?></span>
                 </div>
                </div>

              <div class="padding-t7 visible-lg"></div>
				<?php
				if ($Active==1){
				?>
                 <div class="i5-paading-top8">
				  	<button type="button" class="btn btn-green2 btn-dash pull-right" onclick="location.href='/zhome/EditPost2/<?=$Token?>'">แก้ไขประกาศ</button>
                 </div>    				
				<?php	
				}
				?>
				<?php
				if ($Active==81 || $Active==82 || $Active==93){
				?>	
				<div class="i5-paading-top8"> 
					<button type="button" class="btn btn-green2 btn-dash pull-right"  onclick='if (confirm("คุณแน่ใจที่จะเลิกซ่อนประกาศนี้?")) window.location.href="/zhome/unhpost/<?=$Token?>"'>ยกเลิกซ่อนประกาศ/ต่ออายุ60วัน</button>
				</div>
				<?php	
				}
				?>				
              </div>

              
            <!--end col md4-->
            </div>
            <hr class="margin-t25">
<?php
	//end loop ListPostType1 detail
	}
?>
            <!--end row-->
           
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
		if ($TOAdvertising==1){
			$Price=$row->TotalPrice;
			$prefixTOAdv="ขาย";
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
                <a href="/zhome/unitDetailOwner/<?=$POID;?>" target="_blank"><img  height="90px" src="<?=$this->dashboard->imageList($POID)?>" class="img-responsive imgDashBoard"></a>
              </div>
              
              <div id="dash-list3"  class="col-md-4 col-xs-6 padding-top10 padding-l0">
               <div style="height:29px;"><h4 class="text-grey padding-none"><?=$prefix." ".$ProjectName?></h4><?if ($Active=="93"){ echo "<br>(ประกาศถูกซ่อน)";};?></div>
<?php
	$checkAdmin=$this->backend->checkAdmin();
	if ($checkAdmin==1){
?>		
				<!--<div><?=$OwnerName;?> Tel:<?=$Telephone;?></div>-->
<?php
	}
?>
				<div class="text-grey padding-right">
					<span>ชั้น <?=$Floor?> </span>
					<span>&nbsp;<?=$Bedroom?></span>  
					<span><?=$sumArea?> ตร.ม.</span> 
				</div>
				<br>
				<div class="padding-top32"><strong><font color="red"><?=$Msg;?></font></strong></div>
                 <?php
					
						if ($wStep ="0"){?>
                         <div><strong><font color="red">รอการตรวจสอบข้อมูลจากทีมงาน</font></strong></div>
                                 <?php }
				 ?>


              </div>

             <div id="dash-list4" class="col-md-4 col-xs-6 padding-lr0">
               <div>
                    <div class="text-grey col-md-12 col-xs-12 padding-lr0">
                    
                        <div class="pull-left w60 padding-lr0"><span><h4 class="text-grey"><?=$prefixTOAdv?></h4></span></div>
                        <div class="pull-left w35"><span class="text-blue padding-none h4s"><h4>฿ <?=number_format($Price,0,'.',',');?></h4></span></div>
                        <div class="pull-right w5 padding-t6"><span class="glyphicon glyphicon-remove input-sm text-grey2 padding-none" aria-hidden="true" onclick='if (confirm("คุณแน่ใจที่จะลบประกาศนี้?")) window.location.href="/zhome/dpost/<?=$Token?>"'></span></div>
                     </div>
                     <div class="clearfix"></div>
               </div>
             
                

             
                 <br>
                 
					 <?php
					if ($Active!=93){
						if ($wStep!="0"){
					  ?>
                    <div class="i5-paading-top8">
	                <!-- <div class="text-grey pull-right col-md-12 padding-right-clear padding-left-clear">
	                 	<button type="button" class="btn btn-green2 btn-dash pull-right" onclick='document.getElementById("Token").value="<?=$Token?>";document.getElementById("EditPost").submit();'> เหลือ <?=$wStep;?> ขั้นตอน</button>
					 </div>-->
					</div>
					 <?php
						} else {
					 ?>
					<div class="i5-paading-top8"> 
					 <!--<div class="text-grey pull-right col-md-12 padding-right-clear padding-left-clear">-->
					   <button type="button" class="btn btn-green2 btn-dash pull-right"  onclick='document.getElementById("Token").value="<?=$Token?>";document.getElementById("EditPost").submit();'>แก้ไขประกาศ</button>
					 <!--</div>-->
					</div>
					 <?php
					  };
					  } else {
					 ?>
					 <div class="i5-paading-top8"> 
					 <!--<div class="text-grey pull-right col-md-12 padding-right-clear padding-left-clear">-->
					   <button type="button" class="btn btn-green2 btn-dash pull-right"  onclick='if (confirm("คุณแน่ใจที่จะเลิกซ่อนประกาศนี้?")) window.location.href="/zhome/unhpost/<?=$Token?>"'>ยกเลิกซ่อนประกาศ</button>
					 <!-- </div>-->
					 </div>
					 <?php
					  };
					 ?>

<?php
	if ($Active==0){
?>
    				<div class="text-grey padding-right"><br>
					
					</div>
<?php
	};
?>
<?php
	if ($Active==93){
?>
    				<!--<div class="text-grey pull-right">
						<button type="button" class="btn btn-blue btn-dash"  onclick='if (confirm("คุณแน่ใจที่จะลบประกาศเนื่องจากตกลงการขายได้หรือมีผู้เช่าแล้ว?")) window.location.href="/zhome/epost/<?=$Token?>"'>
							ลบประกาศ (ขายได้/มีผู้เช่าแล้ว)
						</button>
					</div>-->
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
