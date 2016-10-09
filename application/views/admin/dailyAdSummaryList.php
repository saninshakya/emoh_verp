<style>
a {color: blue;}
</style>
<?php
$queryDay=$this->db->query('select datediff("'.$end_date.'","'.$start_date.'") as day_length');
$rowDay=$queryDay->row();
$day_length=$rowDay->day_length;
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Daily Ad Summary <b><?='วันที่ '.$start_date.' - '.$end_date;?></b></div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<td align="center" rowspan="2" width="20%">Date</td>
								<td align="center" colspan="3">Promoted Action</td>
								<td align="center" colspan="2">Promoted Users</td>
								<td align="center" colspan="2">Organic Action</td>
								<td align="center" colspan="2">Organic Users</td>
								<tr>
									<td align="center" width="8%">Reach</td>
									<td align="center" width="8%">Click</td>
									<td align="center" width="8%">Tel. View</td>
									<!--<td align="center" width="20%">Reach</td>-->
									<td align="center" width="8%">Click</td>
									<td align="center" width="8%">Tel. View</td>
									<td align="center" width="8%">Click</td>
									<td align="center" width="8%">Tel. View</td>
									<!--<td align="center" width="20%">Reach</td>-->
									<td align="center" width="8%">Click</td>
									<td align="center" width="8%">Tel. View</td>
								</tr>
							</tr>
						</thead>
						<tbody>
						<?php
						$i=0;
						for($d=0;$d<=$day_length;$d++){
							$queryDay2=$this->db->query('select date(adddate("'.$end_date.'",interval - '.$d.' day)) as operate_date');
							$rowDay2=$queryDay2->row();
							$sdate_array=explode("-",$rowDay2->operate_date);
							$DateShow=$sdate_array[2].'/'.$sdate_array[1].'/'.$sdate_array[0];
							$value=$this->backend->dailyAdSummary($rowDay2->operate_date,$rowDay2->operate_date);
						?>
							<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
								<td align="center"><a href="/admin/viewDailyAdSummaryListDetail/<?=$rowDay2->operate_date;?>" target="_blank"><?=$DateShow;?></a></td>
								<td align="right"><?=  empty($value[1])? 0 : $value[1];?></td>
								<td align="right"><?=$value[2];?></td>
								<td align="right"><?=$value[3];?></td>
								<!--<td align="right"><?=$value[4];?></td>-->
								<td align="right"><?=$value[5];?></td>
								<td align="right"><?=$value[6];?></td>

								<td align="right"><?=$value[8];?></td>
								<td align="right"><?=$value[9];?></td>
								<td align="right"><?=$value[10];?></td>
								<td align="right"><?=$value[11];?></td>
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
	/*$('#dataTables').DataTable({
		responsive: true,
		"scrollX": true,
		"order": [[ 0, "desc" ]],//sorting col,order type
		"language": {
            "lengthMenu": "แสดง _MENU_ รายการ ต่อหน้า",
            "zeroRecords": "ไม่พบข้อมูล",
            "info": "แสดงหน้าที่ _PAGE_ จาก _PAGES_",
            "info": "",
            "infoEmpty": "No records available",
            "infoFiltered": "(กรองข้อมูลจากทั้งหมด _MAX_ รายการ)"
        }
	});*/
});
</script>