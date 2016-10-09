<?php
class Debug extends CI_Model {

    function __construct()
	{
         // Call the Model constructor
         parent::__construct();
	}
  function var_error_log( $object=null ){
      ob_start();                    // start buffer capture
      var_dump( $object );           // dump the values
      $contents = ob_get_contents(); // put the buffer into a variable
      ob_end_clean();                // end capture
      error_log( $contents );        // log contents of the result of var_dump( $object )
  }

}
?>
