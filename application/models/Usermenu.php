<?php
class Usermenu extends CI_Model {
 
    function __construct()
     {
         // Call the Model constructor
         parent::__construct();
     }
     
     function tmenu()
     {
        $ret="";
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
		$checkAdmin=$this->backend->checkAdmin();
		if ($checkAdmin==0){
			$query=$this->db->query('select * from Menu_Program Where Active=1 and Admin<>1 and MID>900');
		} else {
			$query=$this->db->query('select * from Menu_Program Where Active=1 and MID>900');
		}
        return $query;
     }
	 
	 function tmenuMap()
     {
        $ret="";
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
		$checkAdmin=$this->backend->checkAdmin();
		
			$query=$this->db->query('select * from Menu_Program Where Active=1 and MID<=900');
		
        return $query;
     }
 
 	public function inc_file($CssFile,$type)
	{
		if ($type=='css'){
			$pathname='./css/';
			$txt1='<style type="text/css">';
			$txt2='</style>';	
		} else {
			if ($type=='js'){
				$pathname='./js/';
				$txt1='<script type="text/javascript">';
				$txt2='</script>';
			}
		}
		$FileName=$pathname.$CssFile;
		$string = read_file($FileName);
		echo $txt1.$string.$txt2;						
	}

	public function check_robot(){
		if ($this->agent->is_robot())
		{
    		$agent = $this->agent->robot();
			$url=current_url();
			$timestamp = date('Y-m-d G:i:s');
			$this->db->query('insert into robot_income set robot_name="'.$agent.'", url="'.$url.'", date_income="'.$timestamp.'"');
			return 1;
		} else {
			return 0;
		};	
	}	
}
?>