<?php
class Upload extends CI_Model {
 
    function __construct()
	{
         // Call the Model constructor
         parent::__construct();
	}
     
    function excelData($filename,$filetype)
	{
		$file = './files/'.$filename;

		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		//get only the Cell Collection
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
		$highestColumn = $objWorksheet->getHighestColumn();
		$highestRow = $objWorksheet->getHighestRow();

		$toproperty=1;//condomenium

		//extract to a PHP readable array format
		foreach ($cell_collection as $cell) {
			$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

			//header will/should be in row 1 only. of course this can be modified to suit your need.
			if($row > 1){
				if($filetype==1){//สำหรับให้เช่า
					$statusprent=1;
					if($column=='B'){
						$projectname[$row]=$data_value;
						$query=$this->db->query('Select pid,lat,lng from project Where pname_th="'.$data_value.'" ');
						if($query->num_rows()>0){
							$fetch=$query->row();
							$projectid[$row]=$fetch->pid;
							$projectlat[$row]=$fetch->lat;
							$projectlong[$row]=$fetch->lng;
						}else{
							$projectid[$row]="";
							$projectlat[$row]="";
							$projectlong[$row]="";
						}
					}
					if($column=='D'){
						$ownername[$row]=$data_value;
					}
					if($column=='I'){
						$roomnumber[$row]=$data_value;
					}
					if($column=='J'){
						$address[$row]=$data_value;
					}
					if($column=='K'){
						$floor[$row]=$data_value;
					}
					if($column=='L'){
						if($data_value=='สตูดิโอ' or $data_value=='studio'){
							$number=99;
						}else{
							$number=$data_value;
						}
						$bedroom[$row]=$number;
					}
					if($column=='M'){
						$bathroom[$row]=$data_value;
					}
					if($column=='N'){
						$direction[$row]=$data_value;
					}
					if($column=='O'){
						$usearea[$row]=$data_value;
					}
					if($column=='P'){
						$terracearea[$row]=$data_value;
					}
					if($column=='AM'){
						$dateexpire[$row]=PHPExcel_Shared_Date::ExcelToPHPObject($data_value)->format('Y-m-d');
					}
					if($column=='AN'){
						$prentprice[$row]=$data_value;
					}
					if($column=='BR'){
						$telephone1[$row]=$data_value;
					}
					if($column=='BT'){
						$telephone2[$row]=$data_value;
					}
					if($column=='BV'){
						$email1[$row]=$data_value;
					}
					if($column=='BW'){
						$email2[$row]=$data_value;
					}

				}else if($filetype==2){//สำหรับขายดาวน์
					$statusprent=0;
					if($column=='B'){
						$toowner[$row]=$data_value;
					}
					if($column=='C'){
						$ownername[$row]=$data_value;
					}
					if($column=='E'){
						$projectname[$row]=$data_value;
						$query=$this->db->query('Select pid,lat,lng from project Where pname_th="'.$data_value.'" ');
						if($query->num_rows()>0){
							$fetch=$query->row();
							$projectid[$row]=$fetch->pid;
							$projectlat[$row]=$fetch->lat;
							$projectlong[$row]=$fetch->lng;
						}else{
							$projectid[$row]="";
							$projectlat[$row]="";
							$projectlong[$row]="";
						}
					}
					if($column=='F'){
						$query=$this->db->query('Select toaid from toadvertising Where aname_th="'.$data_value.'" and active=1 ');
						if($query->num_rows()>0){
							$fetch=$query->row();
							$adv_id=$fetch->toaid;
						}else{
							$adv_id="";
						}
						$toadvertising[$row]=$adv_id;
					}
					if($column=='G'){
						$tower[$row]=$data_value;
					}
					if($column=='H'){
						$roomnumber[$row]=$data_value;
					}
					if($column=='I'){
						$floor[$row]=$data_value;
					}
					if($column=='J'){
						if($data_value=='สตูดิโอ' or $data_value=='studio'){
							$number=99;
						}else{
							$number=extract_int($data_value);
						}
						$bedroom[$row]=$number;
					}
					if($column=='K'){
						$bathroom[$row]=extract_int($data_value);
					}
					if($column=='L'){
						$query=$this->db->query('Select did from direction Where dname="'.$data_value.'" ');
						if($query->num_rows()>0){
							$fetch=$query->row();
							$direct_id=$fetch->did;
						}else{
							$direct_id="";
						}
						$direction[$row]=$direct_id;
					}
					if($column=='M'){
						$usearea[$row]=$data_value;
					}
					if($column=='N'){
						$terracearea[$row]=$data_value;
					}
					if($column=='R'){
						$area=explode(',',$data_value);
						$spec_id="";
						for($i=0;$i<count($area);$i++){
							$query=$this->db->query('Select tocsid from tocondospec Where csname_th="'.$area[$i].'" ');
							if($query->num_rows()>0){
								$fetch=$query->row();
								$spec_id=$fetch->tocsid.",";
							}
						}
						$condospec[$row]=$spec_id;
					}
					if($column=='S'){
						$dnetprice[$row]=$data_value;
						$dtotalprice[$row]=$data_value;
						$dtransferpayment[$row]=$data_value;
					}
					if($column=='T'){
						$agreepostday[$row]=extract_int($data_value);
					}
					if($column=='U'){
						if($data_value=='ต้องการกำไร'){
							$prefixdprofitprice[$row]=1;
						}else if($data_value=='ยอมขาดทุน'){
							$prefixdprofitprice[$row]=2;
						}else{
							$prefixdprofitprice[$row]=3;
						}
					}
					if($column=='V'){
						$dprofitprice[$row]=$data_value;
					}
					if($column=='W'){
						$dchangecontractprice[$row]=$data_value;
					}
					if($column=='X'){
						$dallpayment[$row]=$data_value;
						$dtransferpayment[$row]=$dnetprice[$row]-$dallpayment[$row];
					}
					if($column=='Y'){
						$dreadypayment[$row]=$data_value;
					}
					if($column=='Z'){
						$dstalepayment[$row]=$data_value;
					}
					if($column=='AA'){
						if($data_value=='ชำระตรงตามเวลา'){
							$historydpayment[$row]=0;
						}else if($data_value=='ค้างชำระ'){
							$historydpayment[$row]=2;
						}else{
							$historydpayment[$row]=1;
						}
					}
					if($column=='AB'){
						$dstalepaymentmonth[$row]=$data_value;
					}
					if($column=='AK'){
						$dfreefurniture[$row]=$data_value;
					}
					if($column=='AL'){
						$dfreeetc[$row]=$data_value;
					}
					if($column=='AM'){
						$dfreeelectric[$row]=$data_value;
					}
					if($column=='AN'){
						$ddiscount[$row]=extract_int($data_value);
					}
					if($column=='AO'){
						$dfreevoucher[$row]=str_replace(",","",$data_value);
					}
					if($column=='AQ'){
						$telephone1[$row]=$data_value;
					}
					if($column=='AR'){
						$email1[$row]=$data_value;
					}
					if($column=='AS'){
						$lineid[$row]=$data_value;
					}
				}
			}
		}

		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($column);

		for($i=2;$i<=$highestRow;$i++){
			if(!isset($toowner[$i])){
				$toowner[$i]="";
			}
			if(!isset($ownername[$i])){
				$ownername[$i]="";
			}
			if(!isset($projectname[$i])){
				$projectname[$i]="";
			}
			if(!isset($projectid[$i])){
				$projectid[$i]="";
			}
			if(!isset($projectlat[$i])){
				$projectlat[$i]="";
			}
			if(!isset($projectlong[$i])){
				$projectlong[$i]="";
			}
			if(!isset($toadvertising[$i])){
				$toadvertising[$i]="";
			}
			if(!isset($tower[$i])){
				$tower[$i]="";
			}
			if(!isset($address[$i])){
				$address[$i]="";
			}
			if(!isset($floor[$i])){
				$floor[$i]="";
			}
			if(!isset($roomnumber[$i])){
				$roomnumber[$i]="";
			}
			if(!isset($bedroom[$i])){
				$bedroom[$i]="";
			}
			if(!isset($bathroom[$i])){
				$bathroom[$i]="";
			}
			if(!isset($direction[$i])){
				$direction[$i]="";
			}
			if(!isset($usearea[$i])){
				$usearea[$i]="";
			}
			if(!isset($direction[$i])){
				$direction[$i]="";
			}
			if(!isset($terracearea[$i])){
				$terracearea[$i]="";
			}
			if(!isset($condospec[$i])){
				$condospec[$i]="";
			}
			if(!isset($prentprice[$i])){
				$prentprice[$i]="";
			}
			if(!isset($dnetprice[$i])){
				$dnetprice[$i]="";
			}
			if(!isset($dtotalprice[$i])){
				$dtotalprice[$i]="";
			}
			if(!isset($agreepostday[$i])){
				$agreepostday[$i]="";
			}
			if(!isset($prefixdprofitprice[$i])){
				$prefixdprofitprice[$i]="";
			}
			if(!isset($dprofitprice[$i])){
				$dprofitprice[$i]="";
			}
			if(!isset($dchangecontractprice[$i])){
				$dchangecontractprice[$i]="";
			}
			if(!isset($dallpayment[$i])){
				$dallpayment[$i]="";
			}
			if(!isset($dtransferpayment[$i])){
				$dtransferpayment[$i]="";
			}
			if(!isset($dreadypayment[$i])){
				$dreadypayment[$i]="";
			}
			if(!isset($dstalepayment[$i])){
				$dstalepayment[$i]="";
			}
			if(!isset($historydpayment[$i])){
				$historydpayment[$i]="";
			}
			if(!isset($dstalepaymentmonth[$i])){
				$dstalepaymentmonth[$i]="";
			}
			if(!isset($dfreefurniture[$i])){
				$dfreefurniture[$i]="";
			}
			if(!isset($dfreeetc[$i])){
				$dfreeetc[$i]="";
			}
			if(!isset($dfreeelectric[$i])){
				$dfreeelectric[$i]="";
			}
			if(!isset($ddiscount[$i])){
				$ddiscount[$i]="";
			}
			if(!isset($dfreevoucher[$i])){
				$dfreevoucher[$i]="";
			}
			if(!isset($telephone1[$i])){
				$telephone1[$i]="";
			}
			if(!isset($telephone2[$i])){
				$telephone2[$i]="";
			}
			if(!isset($email1[$i])){
				$email1[$i]="";
			}
			if(!isset($email2[$i])){
				$email2[$i]="";
			}
			if(!isset($dateexpire[$i])){
				$dateexpire[$i]="";
			}

			$token="";
			$query=$this->db->query('Select id from users Where email="'.$email1[$i].'" ');
			if($query->num_rows()>0){
				$fetch=$query->row();
				$user_id=$fetch->id;
				$token=time().$user_id;
				$token=md5($token);
			}

			/*if($projectname[$i]!=''){
				$query=$this->db->query('Select poid from post Where projectname="'.$projectname[$i].'" and ownername="'.$ownername[$i].'" and address="'.$address[$i].'" and floor="'.$floor[$i].'" ');
				if($query->num_rows()==0){
					$this->db->query('Insert into post set token="'.$token.'", user_id="'.$user_id.'", toowner="'.$toowner[$i].'", ownername="'.$ownername[$i].'", pid="'.$projectid[$i].'", projectname="'.$projectname[$i].'", lat="'.$projectlat[$i].'", lng="'.$projectlong[$i].'", toadvertising="'.$toadvertising[$i].'", tower="'.$tower[$i].'", roomnumber="'.$roomnumber[$i].'", address="'.$address[$i].'", floor="'.$floor[$i].'", bedroom="'.$bedroom[$i].'", bathroom="'.$bathroom[$i].'", direction="'.$direction[$i].'", usearea="'.$usearea[$i].'", terracearea="'.$terracearea[$i].'", statusprent="'.$statusprent.'", prentprice="'.$prentprice[$i].'", dnetprice="'.$dnetprice[$i].'", dtotalprice="'.$dtotalprice[$i].'",agreepostday="'.$agreepostday[$i].'", prefixdprofitprice="'.$prefixdprofitprice[$i].'", dprofitprice="'.$dprofitprice[$i].'", dchangecontractprice="'.$dchangecontractprice[$i].'", dallpayment="'.$dallpayment[$i].'", dtransferpayment="'.$dtransferpayment[$i].'", dreadypayment="'.$dreadypayment[$i].'", dstalepayment="'.$dstalepayment[$i].'", dfreefurniture="'.$dfreefurniture[$i].'", dfreeetc="'.$dfreeetc[$i].'", dfreeelectric="'.$dfreeelectric[$i].'", ddiscount="'.$ddiscount[$i].'", dfreevoucher="'.$dfreevoucher[$i].'", telephone1="'.$telephone1[$i].'", telephone2="'.$telephone2[$i].'",  email1="'.$email1[$i].'", email2="'.$email2[$i].'", dateexpire="'.$dateexpire[$i].'" ');
					$poid=$this->db->insert_id();
				}else{
					$fetch=$query->row();
					$poid=$fetch->poid;
					$this->db->query('Update post set token="'.$token.'", user_id="'.$user_id.'", toowner="'.$toowner[$i].'", ownername="'.$ownername[$i].'", pid="'.$projectid[$i].'", projectname="'.$projectname[$i].'", lat="'.$projectlat[$i].'", lng="'.$projectlong[$i].'", toadvertising="'.$toadvertising[$i].'", tower="'.$tower[$i].'", roomnumber="'.$roomnumber[$i].'", address="'.$address[$i].'", floor="'.$floor[$i].'", bedroom="'.$bedroom[$i].'", bathroom="'.$bathroom[$i].'", direction="'.$direction[$i].'", usearea="'.$usearea[$i].'", terracearea="'.$terracearea[$i].'", statusprent="'.$statusprent.'", prentprice="'.$prentprice[$i].'", dnetprice="'.$dnetprice[$i].'", dtotalprice="'.$dtotalprice[$i].'",agreepostday="'.$agreepostday[$i].'", prefixdprofitprice="'.$prefixdprofitprice[$i].'", dprofitprice="'.$dprofitprice[$i].'", dchangecontractprice="'.$dchangecontractprice[$i].'", dallpayment="'.$dallpayment[$i].'", dtransferpayment="'.$dtransferpayment[$i].'", dreadypayment="'.$dreadypayment[$i].'", dstalepayment="'.$dstalepayment[$i].'", dfreefurniture="'.$dfreefurniture[$i].'", dfreeetc="'.$dfreeetc[$i].'", dfreeelectric="'.$dfreeelectric[$i].'", ddiscount="'.$ddiscount[$i].'", dfreevoucher="'.$dfreevoucher[$i].'", telephone1="'.$telephone1[$i].'", telephone2="'.$telephone2[$i].'",  email1="'.$email1[$i].'", email2="'.$email2[$i].'", dateexpire="'.$dateexpire[$i].'" Where poid="'.$poid.'" ');
					$row=$query->row();
					$poid=$row->poid;
				}

				if($condospec[$i]<>''){
					$spec_array=explode(',',$condospec[$i]);
					for($s=0;$s<count($spec_array);$s++){
						$query=$this->db->query('Select poid from postcondospec Where poid="'.$poid.'" and tocsid="'.$spec_array[$s].'" ');
						if($query->num_rows()==0 and $spec_array[$s]<>''){
							$this->db->query('Insert into postcondospec set poid="'.$poid.'", tocsid="'.$spec_array[$s].'" ');
						}
					}
				}
			}*/
		}
	}
}
?>