<style>
a {color: blue;}
</style>
<?php
?>
<br>
<div class="row">
	<div class="col-lg-offset-1 col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">Promotion Code</div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<td align="center" width="10%">Promo Code</td>
								<td align="center" width="10%">Promo Type</td>
								<td align="center" width="10%">User Type</td>
								<td align="center" width="10%">User Quantity</td>
								<td align="center" width="10%">Reuse Type</td>
								<td align="center" width="10%">Reuse Quantity</td>
								<td align="center" width="10%">Value</td>
								<td align="center" width="10%">Start Date</td>
								<td align="center" width="10%">End Date</td>
							</tr>
						</thead>
						<tbody>
						<?php
						$i=0;
						foreach ($listDetail->result() as $row){
							$i++;
						?>
							<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
								<td align="center"><?=$row->PromoCode?></td>
								<td align="right"><?=$row->PromoTypeName;?></td>
								<td align="right"><?=$row->UserTypeName;?></td>
								<td align="right"><?=$row->user_quantity;?></td>
								<td align="right"><?=$row->ReuseTypeName;?></td>
								<td align="right"><?=$row->reuse_quantity;?></td>
								<td align="right"><?=$row->value;?></td>
								<td align="center"><?=$row->start_date;?></td>
								<td align="center"><?=$row->end_date;?></td>
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