<?php
class Developer extends CI_Model {

    function __construct()
     {
         // Call the Model constructor
         parent::__construct();
     }

     public function ListRoomName($PID){
       $query=$this->db->query('Select * from ProjectDeveloperRoom Where PID="'.$PID.'"');
       return $query;
     }

     function DeveloperName($user_id){
       $query=$this->db->query('select * from users where id="'.$user_id.'"');
       $rowDeveloper=$query->row();
       $DeveloperName=$rowDeveloper->firstName." ".$rowDeveloper->lastname;
       return $DeveloperName;
     }

     function ListDataProject($PID,$Type){
       $query=$this->db->query('Select * from Project Where PID="'.$PID.'"');
       $rowProject=$query->row();
       return $rowProject->$Type;
     }

     function TelephoneProject($PID,$user_id){
       $query=$this->db->query('Select Telephone from ProjectDeveloper Where PID="'.$PID.'" and user_id="'.$user_id.'"');
       $row=$query->row();
       return $row->Telephone;
     }

     public function add_unit($data){
       $user_id=$this->session->userdata('user_id');
       $token=time().$user_id;
       $token=md5($token);
       $PID=$data['PID'];
       $Agree_Owner=1;
       $TOOwner=1;
       $Developer=1;
       $OwnerName=$this->DeveloperName($user_id);
       $TOProperty=1;
       $Lat=$this->ListDataProject($PID,"Lat");
       $Lng=$this->ListDataProject($PID,"Lng");
       $DTransfer=$data['TotalPrice']-$data['DepositPrice']-$data['DContractPrice1']-$data['DDownTotalPrice'];
       $AgreePostDay=180;
       $Telephone=$this->TelephoneProject($PID,$user_id);
       $dataSQL=array(
         $token,
         $user_id,
         $Agree_Owner,
         $TOOwner,
         $OwnerName,
         $Developer,
         $TOProperty,
         $PID,
         $data['ProjectName'],
         $Lat,
         $Lng,
         $data['Tower'],
         $data['RoomNumber'],
         $data['Floor'],
         $data['Bedroom'],
         $data['Bathroom'],
         $data['Direction'],
         $data['useArea'],
         $data['TotalPrice'],
         $data['DepositPrice'],
         $data['DContractPrice1'],
         $data['DDownTotalPrice'],
         $DTransfer,
         $AgreePostDay,
         $Telephone
       );
       $query=$this->db->query('insert into Post set Token=?, user_id=?, Agree_Owner=?, TOOwner=?, OwnerName=?, Developer=?, TOProperty=?, PID=?, ProjectName=?, Lat=?,
       Lng=?, Tower=?, RoomNumber=?, Floor=?, Bedroom=?, Bathroom=?, Direction=?, useArea=?, TotalPrice=?, DepositPrice=?, DContractPrice1=?, DDownTotalPrice=?, DTransfer=?,
       AgreePostDay=?, Telephone1=?',$dataSQL);
     }
}

?>
