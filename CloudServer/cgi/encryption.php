<?php
function AtB($A){
	$temp = array();
	for($x = 0; $x < strlen($A); $x++){
		array_push($temp,ord($A[$x]));
	}
	return $temp;
}

function encrypt($data){
	$key = "#fS1>:5hp3";
	$temp = "";
	while(strlen($temp) < 10){
		$temp .= $key;
	}
	$key = $temp;

	$keyArr = AtB($key);
	
	$dataArr = AtB($data);
	
	$result = "";
	foreach($dataArr as $dat){
		$f = rand(0,9);
		$t = intval($dat) - intval($keyArr[$f]);
		$s = strlen(Abs($t));
		if($t < 0){
			$s += 5;
			$t = Abs($t);
		}
		$result .= $f . $s . $t;
	}
	return shortener($result);
}

function decrypt($data){
	$key = "#fS1>:5hp3";
	$temp = "";
	while(strlen($temp) < 10){
		$temp .= $key;
	}
	$key = $temp;
	
	$keyArr = AtB($key);
	
	$dataArr = longer($data);
	$d = "";
	$f = 0;
	while($f < strlen($dataArr)){
		if(is_int(intval($dataArr[$f]))){
			$g = intval($dataArr[$f]);
			$f += 1;
			$h = intval($dataArr[$f]);
			$i = "";
			if($h > 5){
				$h -= 5;
				$i = "-";
			}
			for($x = 1; $x <= $h; $x++){
				$f += 1;
				$i .= $dataArr[$f];
			}
			$temp = chr(intval($i) + $keyArr[$g]);
			$d .= $temp;
			$f += 1;
		}else{
			return "Invalid Data";
		}
	}
	return $d;
}

function shortener($data){
	//$max = 127;
	$max = 122;
	//$min = 1;
	$min = 48;
	$temp = "";
	$i = 0;
	$c = 0;
	
	while($i < strlen($data)){
		$a = "";
		$y = 0;
		while($y < 3){
			if(($i + $y) <= strlen($data) - 1){
				$a = $a . $data[$i + $y];
				if(intval($a) == 0){
					$temp .= $a;
					$a = "";
					$i += 1;
				}else{
					$y += 1;
				}
			}else{
				break;
			}
		}
		
		$loop = true;
		while($loop){
			switch(strlen($a)){
				case 3:
					if($a <= $max){
						$i += 3;
						$temp .= chr($a);
						$loop = false;
					}else{
						$a = substr($a,0,strlen($a) - 1);
					}
				break;
				
				case 2:
					if($a >= $min){
						if(checkIllegal($a)){
							$a = substr($a,0,strlen($a) - 1);
						}else{
							$i += 2;
							$temp .= chr($a);
							$loop = false;
						}
					}else{
						$a = substr($a,0,strlen($a) - 1);
					}
				break;
					
				case 1:
					if($a >= $min){
						$i += 1;
						$temp .= chr($a);
						$loop = false;
					}else{
						$i += 1;
						$temp .= $a;
						$loop = false;
					}
				break;
					
				default:
					$loop = false;
			}
		}
	}
	return $temp;
}

function checkIllegal($char){
	$illegal = array(48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,91,92,93,94,95,96);
	foreach($illegal as $ic){
		if($ic == $char){
			return true;
		}
	}
	return false;
}

function longer($data){
	$temp = "";
	$i = 0;
	while($i < strlen($data)){
		if(is_numeric($data[$i])){
			$temp .= $data[$i];
		}else{
			$temp .= ord($data[$i]);
		}
		$i += 1;
	}
	return $temp;
}

























?>