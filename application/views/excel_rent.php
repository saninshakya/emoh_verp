<?php

$file = './files/test2.xlsx';

//load the excel library
//$this->load->library('excel');

//read file from path
$objPHPExcel = PHPExcel_IOFactory::load($file);

//get only the Cell Collection
$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
$highestColumm = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
$highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

//extract to a PHP readable array format
foreach ($cell_collection as $cell) {
    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

    //header will/should be in row 1 only. of course this can be modified to suit your need.
    if($row > 1){
        //$arr_data[$row][$column] = $data_value;

		if($column=='B'){
			$projectname=$data_value;
		}
		if($column=='D'){
			$ownername=$data_value;
		}
		if($column=='I'){
			$roomnumber=$data_value;
		}
		if($column=='J'){
			$address=$data_value;
		}
		if($column=='K'){
			$floor=$data_value;
		}
		if($column=='L'){
			$bedroom=$data_value;
		}
		if($column=='M'){
			$bathroom=$data_value;
		}
		if($column=='N'){
			$direction=$data_value;
		}
		if($column=='O'){
			$usearea=$data_value;
		}
		if($column=='P'){
			$terracearea=$data_value;
		}
		if($column=='AK'){
			$statusprent='3';
		}
		if($column=='AM'){
			$dateexpire=$data_value;
		}

		//$this->db->query('Insert into Post set projectname="'.$projectname.'", OwnerName="'.$ownername.'", roomnumber="'.$roomnumber.'", address="'.$address.'", floor="'.$floor.'", bedroom="'.$bedroom.'", bathroom="'.$bathroom.'", direction="'.$direction.'", usearea="'.$usearea.'" ');
    }
	if($column=='B' and $data_value==''){
		break;
	}
}

//send the data in an array format
$data['header'] = $header;
$data['values'] = $arr_data;

?>