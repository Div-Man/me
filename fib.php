<?php

error_reporting(-1);

function checking(){
	$x = rand(-10, 200);
	$num1 = 1;
	$num2 = 1;

	while(true){
		 echo $x, ' ', $num1, ' ', $num2, '<br>';
		 
		if($x < 0){
			 return 'Слишком мало' . '<br>';
		}
		
		elseif($num1 > $x){
			return 'Задуманное число не входит в числовой ряд' . '<br>';
		}
		
		elseif($x > 100){
			return 'Слишком много';
		}
		
		else{
			if($num1 == $x){
				return 'Задуманное число входит в числовой ряд' . '<br>';
			}
			else{
				$num3 = $num1;
				$num1 = $num1 + $num2;
				$num2 = $num3;
			}
		}
	}
} 

echo checking();
