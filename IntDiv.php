<?php 
// Integer division without using the division operator. 
// Division is achieved using the Binary Search Algorithm.

function division($num, $den){
	
	//Handles divisibility by 0.
	//Returns an error when the denominator is zero.
	if ($den == 0) 
        return "Error: Denominator (Divisor) should not be 0.";

		// set range for our result as [left, right].
		// right is set to infinity to handle the case 
		// when den < 1, num < result < PHP_INT_MAX
		$left = 0; 
		$right = PHP_INT_MAX;
	
		// store sign of the result
		$sign = 1;
		if ($num * $den < 0) {
			$sign = -1;
		}
		
		// set accuracy of the result
		$precision = 0.0001;
		
		// make both input numbers positive
		$num = abs($num);
		$den = abs($den);
		
		while (true) {
			
			// We calculate mid
			$mid = $left + (($right - $left) / 2);
			
			// if den*mid is almost equal to num, we return mid
			if (abs($den * $mid - $num) <= $precision) {
				return $mid * $sign;
			}
			
			// if den*mid is less than num, update left to mid
			if ($den * $mid < $num) {
				$left = $mid;
			}
			
			else {
				
				// if den*mid is more than num, update right to mid
				$right = $mid;
			}
			
		}
	
}

// Driver program
$num = -6; $den = 5 ; 
echo "Exercise to to implement integer division without the use of the division operator.<br/>";
echo "Qotient is: ".intval(division($num, $den))."<br/>Remainder is: " ; 
?> 