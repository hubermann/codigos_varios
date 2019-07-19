<?php  



	 function getAnos($selected="")
	{	
		echo $selected;
		$inicio = date("Y") - 90;
		$fin = date("Y")  -17;
		$anos = [];
		for ($i=$inicio; $i <= $fin; $i++) { 
			!($i > 0) ?: ($i < 10 ? $anos[$i] = "0".$i : $anos[$i] = $i);
		}
		$dev ="";
		foreach ( $anos as $value) {
			(intval($selected)===$value) ? $sel = "selected" : $sel="";
			$dev .= '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';	
		}
		return $dev;
	}

function getMeses($selected="")
	{	
		$meses = [];
		for ($i=1; $i <= 12; $i++) { 
			!($i > 0) ?: ($i < 10 ? $meses[$i] = "0".$i : $meses[$i] = $i);
		}
		$dev ="";
		foreach ( $meses as $value) {
			(intval($selected)===$value) ? $sel = "selected" : $sel="";
			$dev .= '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';	
		}
		return $dev;
	}

function getDias($selected="")
	{	
		$dia = [];
		for ($i=1; $i <= 31; $i++) { 
			!($i > 0) ?: ($i < 10 ? $dia[$i] = "0".$i : $dia[$i] = $i);
		}
		$dev ="";
		foreach ( $dia as $value) {
			(intval($selected)===$value) ? $sel = "selected" : $sel="";
			$dev .= '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';	
		}
		return $dev;
	}





?>
