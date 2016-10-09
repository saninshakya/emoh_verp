<br>
<style>
a {color: blue;}
</style>
<?php
$month=array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');
$month_en=array('01' => 'Jan.', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'May', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Aug.', '09' => 'Sep.', '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.');
$date_conf_length=7;
$date_conf[1]=7;$date_conf[2]=14;$date_conf[3]=30;$date_conf[4]=60;$date_conf[5]=90;$date_conf[6]=120;$date_conf[7]=180;
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">User Analysis <b><?='เดือน '.$month[$SelMonth].' ปี '.$SelYear;?></b></div>
			<div class="panel-body" style="overflow-x:scroll;">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<td align="center" rowspan="2" style="background-color:#FF8000;">User Name/Email</td>
								<td align="center" rowspan="2" style="background-color:#FF8000;">First Name</td>
								<td align="center" rowspan="2" style="background-color:#FF8000;">Last Name</td>
								<td align="center" rowspan="2" style="background-color:#FF8000;">Line ID</td>
								<td align="center" rowspan="2" style="background-color:#0080C0;color:#FFFFFF;">Total Favorite Units</td>
								<td align="center" rowspan="2" style="background-color:#0080C0;color:#FFFFFF;">Total Follow Units</td>
								<td align="center" rowspan="2" style="background-color:#0080C0;color:#FFFFFF;">Total Share Units</td>
								<td align="center" rowspan="2" style="background-color:#0080C0;color:#FFFFFF;">Total Tel. Views</td>
								<td align="center" rowspan="2" style="background-color:#FFFF80;">Avg. Price of Tel. View Units</td>
								<td align="center" rowspan="2" style="background-color:#FFFF80;">Date Lastest Tel. View</td>
								<td align="center" colspan="14" style="background-color:#59FFAC;">Tel. View Statistic</td>
								<td align="center" colspan="7" style="background-color:#59FFAC;">Cumulative Tel. View Statistic</td>
								<td align="center" rowspan="2" style="background-color:#FFFF80;">Total Unit Views</td>
								<td align="center" rowspan="2" style="background-color:#FFFF80;">Date Lastest Unit View</td>
								<td align="center" colspan="7" style="background-color:#AEAEFF;">Cumulative Unit View Statistic</td>
								<td align="center" colspan="14" style="background-color:#AEAEFF;">Unit View Statistic</td>
								<tr>
									<?php for($d=1;$d<=14;$d++){?>
										<td align="center" style="background-color:#59FFAC;"><?=$d;?> Days Ago</td>
									<?}?>
									<?php for($d2=1;$d2<=$date_conf_length;$d2++){?>
										<td align="center" style="background-color:#59FFAC;">Last <?=$date_conf[$d2];?> Days</td>
									<?}?>
									<?php for($d2=1;$d2<=$date_conf_length;$d2++){?>
										<td align="center" style="background-color:#AEAEFF;">Last <?=$date_conf[$d2];?> Days</td>
									<?}?>
									<?php for($d=1;$d<=14;$d++){?>
										<td align="center" style="background-color:#AEAEFF;"><?=$d;?> Days Ago</td>
									<?}?>
								</tr>
							</tr>
						</thead>
						<tbody>
						<?php
						$i=0;
						foreach ($listUser->result() as $row){
							$i++;
						?>
							<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
								<td align="left"><?=$row->email;?></td>
								<td align="left"><?=$row->firstname;?></td>
								<td align="left"><?=$row->lastname;?></td>
								<td align="left">-</td>
								<td align="right"><?if($row->total_favorite>0){?><a href="/admin/userAnalysisListUnit/favorite/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>" target="_blank"><?}?><?=$row->total_favorite;?></a></td>
								<td align="right"><?if($row->total_follow>0){?><a href="/admin/userAnalysisListUnit/follow/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>" target="_blank"><?}?><?=$row->total_follow;?></a></td>
								<td align="right"><?if($row->total_share>0){?><a href="/admin/userAnalysisListUnit/share/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>" target="_blank"><?}?><?=$row->total_share;?></a></td>
								<td align="right"><?if($row->total_telview>0){?><a href="/admin/userAnalysisListUnit/telview/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>" target="_blank"><?}?><?=$row->total_telview;?></a></td>
								<td align="right"><?=number_format($row->avg_price,0);?></td>
								<td align="center"><?=$row->last_telview;?></td>
								<?php for($d=1;$d<=14;$d++){
									$telview[$d]=$this->backend->searchAnalysisTelView($row->id,$SelDate,$d,$d);
									//$telview[$d]=0;
								?>
									<td align="right"><?if($telview[$d]>0){?><a href="/admin/userAnalysisListUnit/telview/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>/<?=$d;?>/<?=$d;?>" target="_blank"><?}?><?=$telview[$d];?></a></td>
								<?}?>
								<?php for($d2=1;$d2<=$date_conf_length;$d2++){
									$telview2[$d2]=$this->backend->searchAnalysisTelView($row->id,$SelDate,0,$date_conf[$d2]);
									//$telview2[$d2]=0;
								?>
									<td align="right"><?if($telview2[$d2]>0){?><a href="/admin/userAnalysisListUnit/telview/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>/0/<?=$date_conf[$d2];?>" target="_blank"><?}?><?=$telview2[$d2];?></a></td>
								<?}?>
								<td align="right"><?if($row->total_view>0){?><a href="/admin/userAnalysisListUnit/unitview/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>" target="_blank"><?}?><?=$row->total_view;?></a></td>
								<td align="center"><?=$row->last_view;?></td>
								<?php for($d2=1;$d2<=$date_conf_length;$d2++){
									$unitview2[$d2]=$this->backend->searchAnalysisUnitView($row->id,$SelDate,0,$date_conf[$d2]);
									//$unitview2[$d2]=0;
								?>
									<td align="right"><?if($unitview2[$d2]>0){?><a href="/admin/userAnalysisListUnit/unitview/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>/0/<?=$date_conf[$d2];?>" target="_blank"><?}?><?=$unitview2[$d2];?></a></td>
								<?}?>
								<?php for($d=1;$d<=14;$d++){
									$unitview[$d]=$this->backend->searchAnalysisUnitView($row->id,$SelDate,$d,$d);
									//$unitview[$d]=0;
								?>
									<td align="right"><?if($unitview[$d]>0){?><a href="/admin/userAnalysisListUnit/unitview/<?=$row->id;?>/<?=$SelYear;?>/<?=$SelMonth;?>/<?=$SelDate;?>/<?=$d;?>/<?=$d;?>" target="_blank"><?}?><?=$unitview[$d];?></a></td>
								<?}?>
							</tr>
						<?
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<script src="<?=base_url('css/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')?>"></script>
<script language="javascript">
$(document).ready(function() {
	$('#dataTables').DataTable({
		responsive: true
	});
});
</script>