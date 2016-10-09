<?php
/**
* Generate promotion code
*/
class Promotion extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	CONST MIN_LENGTH = 8;

	static public function randomString(){
		$uppercase    = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];
		$lowercase    = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
		$numbers      = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

		$characters   = [];
		$coupon = '';

		$characters = array_merge($characters, $numbers, $uppercase, $lowercase);

		for ($i = 0; $i < self::MIN_LENGTH; $i++) {
			$coupon .= $characters[mt_rand(0, count($characters) - 1)];
		}
		return $coupon;

	}

	static public function generatePromotionCode(){
		return $temp = self::randomString();
	} 

	
}
?>