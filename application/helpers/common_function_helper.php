<?php
function extract_int($str){
	$str=str_replace(",","",$str);
	if(preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs)){
		return (intval($regs[1]));
	}else{
		return "";
	}
}

function extract_char($str){
	$str=str_replace(",","",$str);
	if(preg_match('/[^ก-๘]*([ก-๘]+)[^ก-๘]*/', $str, $regs)){
		return $regs[0];
	}else{
		return "";
	}
}

function utf8_wordwrap($string, $width=75, $break="\n", $cut=false)
{
	if($cut){
		// Match anything 1 to $width chars long followed by whitespace or EOS,
		// otherwise match anything $width chars long
		$search = '/(.{1,'.$width.'})(?:\s|$)|(.{'.$width.'})/uS';
		$replace = '$1$2'.$break;
	}else{
		// Anchor the beginning of the pattern with a lookahead
		// to avoid crazy backtracking when words are longer than $width
		$pattern = '/(?=\s)(.{1,'.$width.'})(?:\s|$)/uS';
		$replace = '$1'.$break;
	}
	return preg_replace($search, $replace, $string);
}

function pretty($myarray) {
    echo "<pre>", htmlspecialchars(print_r($myarray, true)), "</pre>";
}
?>