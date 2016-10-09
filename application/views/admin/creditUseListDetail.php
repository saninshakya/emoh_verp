<br>
<div class="row">
	<div class="col-lg-offset-2 col-lg-8">
		<div class="panel panel-default">
			<div class="panel-heading"><b>วันที่ <?=$operate_date;?></b></div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
						<tr>
							<th align="center">Owner</th>
							<th align="center">POID</th>
							<th align="center">Project</th>
							<th align="center">Advertising</th>
							<th align="center">Expire</th>
							<th align="center">Credit Use</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($listDetail->result() as $row){
							if($row->TOAdvertising==1){
								$AdvertisingName='ขาย';
							}else if($row->TOAdvertising==2){
								$AdvertisingName='ขายดาวน์';
							}else if($row->TOAdvertising==5){
								$AdvertisingName='เช่า';
							}else{
								$AdvertisingName='';
							}
						?>
							<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
								<td align="left"><?=$row->OwnerName;?></td>
								<td align="center"><?=$row->POID;?></td>
								<td align="left"><?=$row->ProjectName;?></td>
								<td align="left"><?=$AdvertisingName;?></td>
								<td align="left"><?=$row->DateExpire;?></td>
								<td align="right"><?=$row->credit_use;?></td>
							</tr>
						<?php
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