<?php
class Testlog extends CI_Model {
 
    function __construct()
     {
         // Call the Model constructor
         parent::__construct();
     }
     
     function savelogstart($process_id)
     {
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
		$starttime=time();
		$record_date_time=date("Y-m-d H:i:s");
		$this->db->query('insert into testlog set process_id="'.$process_id.'", starttime="'.$starttime.'", record_date_time="'.$record_date_time.'"');
     }
	 
	 function savelogend($process_id)
     {
        $this->db->query('SET NAMES utf8');
        $this->db->query('SET character_set_results=utf8');
		$endtime=time();
		$this->db->query('update testlog set endtime="'.$endtime.'" where process_id="'.$process_id.'"');
		$this->db->query('update testlog set process_time=endtime-starttime where process_id="'.$process_id.'"');
     }
 	
	function genprocessid()
	{
		$process_id=md5(uniqid(rand(), true));
		return $process_id;
	}
 
}
?>
