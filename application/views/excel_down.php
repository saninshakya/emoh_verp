<?php

$file = './files/down.xlsx';

//load the excel library
//$this->load->library('excel');

//read file from path
$objPHPExcel = PHPExcel_IOFactory::load($file);

//get only the Cell Collection
$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

//extract to a PHP readable array format
foreach ($cell_collection as $cell) {
    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

    //header will/should be in row 1 only. of course this can be modified to suit your need.
    if($row == 1){
		$header[$row][$column] = $data_value;
    }else{
        $arr_data[$row][$column] = $data_value;

		if($column=='A'){
			$token=time().$data_value;
			$token=md5($token);
			echo $data_value."==".$token."<br>";
		}else{
			echo $data_value;
		}

		$this->db->query('Insert into Post set Token="'.$token.'", user_id="'.$user_id.'", DateCreate="'.$datecreate.'"');
    }
}

//send the data in an array format
$data['header'] = $header;
$data['values'] = $arr_data;

?>