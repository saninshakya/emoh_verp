<style>
a {color: blue;}
</style>
<?php
?>
<div class="row">
	<div class="col-lg-offset-3 col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Credit Use <b><?='วันที่ '.$start_date.' - '.$end_date;?></b></div>
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<td align="center" width="20%">Date</td>
								<td align="center" width="20%">Coin Use</td>
								<td align="center" width="20%">User Count</td>
								<td align="center" width="20%">Unit Count</td>
							</tr>
						</thead>
						<tbody>
						<?php
						$i=0;
						foreach ($listCredit->result() as $row){
							$i++;
							$sdate_array=explode("-",$row->operate_date);
							$DateShow=$sdate_array[2].'/'.$sdate_array[1].'/'.$sdate_array[0];
						?>
							<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
								<td align="center"><a href="/admin/viewCreditUseListDetail/<?=$row->operate_date;?>" target="_blank"><?=$DateShow;?></a></td>
								<td align="right"><?=$row->credit_use;?></td>
								<td align="right"><?=$row->count_user;?></td>
								<td align="right"><?=$row->count_unit;?></td>
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