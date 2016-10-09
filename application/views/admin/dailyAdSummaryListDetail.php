<br>
<div class="row">
	<div style="width: 100%;">
		<div class="panel panel-default">
			<div class="panel-heading"><b>วันที่ <?=$operate_date;?></b></div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
						<tr>
							<td align="center" rowspan="2" width="8%">Date</td>
							<td align="center" rowspan="2" width="8%">POID</td>
							<td align="center" rowspan="2" width="8%">User ID</td>
							<td align="center" rowspan="2" width="8%">Project</td>
							<td align="center" rowspan="2" width="8%">Bedroom</td>
							<td align="center" rowspan="2" width="8%">Size</td>
							<td align="center" rowspan="2" width="8%">Advertisement Type</td>
							<td align="center" rowspan="2" width="8%">Price</td>
							<td align="center" rowspan="2" width="8%">Price/sq.m.</td>

							<td align="center" colspan="3">Promoted Action</td>
							<td align="center" colspan="2">Promoted Users</td>
							<td align="center" colspan="2">Organic Action</td>
							<td align="center" colspan="2">Organic Users</td>
								<tr>
									<td align="center" width="4%">Reach</td>
									<td align="center" width="4%">Click</td>
									<td align="center" width="4%">Tel. View</td>
									<!--<td align="center" width="20%">Reach</td>-->
									<td align="center" width="4%">Click</td>
									<td align="center" width="4%">Tel. View</td>

									<!-- <td align="center" width="4%">Reach</td> -->
									<td align="center" width="4%">Click</td>
									<td align="center" width="4%">Tel. View</td>
									<!--<td align="center" width="20%">Reach</td>-->
									<td align="center" width="4%">Click</td>
									<td align="center" width="4%">Tel. View</td>
								</tr>

						</tr>
						</thead>
						<tbody>
						<?php
						$paReach=0; $paClick=0; $paTelView = 0;
						$puClick=0; $puTelView  = 0;
						$oaClick = 0; $oaTelView = 0;
						$ouClick = 0;
						$ouTelView = 0;
						foreach ($listDetail->result() as $row){
							$sdate_array=explode("-",$operate_date);
							$DateShow=$sdate_array[2].'/'.$sdate_array[1].'/'.$sdate_array[0];
							$value=$this->backend->dailyAdSummaryDetailUnit($operate_date,$row->POID);
						?>
							<tr onmouseover="this.style.backgroundColor='#ffff40';" onmouseout="this.style.backgroundColor='';">
								<td align="left"><?=$DateShow;?></td>
								<td align="center"><?=$row->POID;?></td>
								<td align="left"><?=$row->OwnerName;?></td>
								<td align="left"><?=$row->ProjectName;?></td>
								<td align="right"><?=$row->Bedroom;?></td>
								<td align="right"><?=$row->useArea;?></td>
								<td align="right"><?=$row->advertisement;?></td>
								<td align="right"><?=$row->TotalPrice;?></td>
								<td align="right"><?=$row->PricePerSq;?></td>

								<td align="right"><?=$value[1];?></td>
								<td align="right"><?=$value[2];?></td>
								<td align="right"><?=$value[3];?></td>
								<!--<td align="right"><?=$value[4];?></td>-->
								<td align="right"><?=$value[5];?></td>
								<td align="right"><?=$value[6];?></td>

								<!-- <td align="right"><?=$value[7];?></td> -->
								<td align="right"><?=$value[8];?></td>
								<td align="right"><?=$value[9];?></td>
								<td align="right"><?=$value[10];?></td>
								<td align="right"><?=$value[11];?></td>
							</tr>
						<?php
						$paReach = $paReach+$value[1];
						$paClick = $paClick+$value[2];
						$paTelView = $paTelView+$value[3];
						$puClick = $puClick+$value[5]; 
						$puTelView  = $puTelView+$value[6];
						$oaClick = $oaClick + $value[8]; 
						$oaTelView = $oaTelView + $value[9];
						$ouClick = $ouClick + $value[10];
						$ouTelView = $ouTelView +$value[11];
						}
						?>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td align="right"><strong><? echo $paReach; ?></strong></td>
						<td align="right"><strong><? echo $paClick; ?></strong></td>
						<td align="right"><strong><? echo $paTelView; ?></strong></td>
						<td align="right"><strong><? echo $puClick; ?></strong></td>  
						<td align="right"><strong><? echo $puTelView; ?></strong></td>
						<td align="right"><strong><? echo $oaClick; ?></strong></td> 
						<td align="right"><strong><? echo $oaTelView; ?></strong></td>
						<td align="right"><strong><? echo $ouClick; ?></strong></td>
						<td align="right"><strong><? echo $ouTelView; ?></strong></td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<script src="<?=base_url('css/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')?>"></script>
<script language="javascript">
$(document).ready(function() {
	/*$('#dataTables').DataTable({
		responsive: true,
		"scrollX": true,
		"order": [[ 3, "asc" ]],//sorting col,order type
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