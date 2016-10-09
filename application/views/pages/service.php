<div class="container">
<h1><?echo $title_h1;?></h1>
</div>

<table>
<?php
$query=$this->db->query('Select id,firstname,lastname,email from users Where admin_group=0 ');
foreach ($query->result_array() as $row)
{
?>
	<tr>
		<td class="text-right"><?php echo $row['id'];?></td>
		<td><?php echo $row['firstname'];?></td>
		<td><?php echo $row['lastname'];?></td>
	</tr>
<?php
}
?>
</table>