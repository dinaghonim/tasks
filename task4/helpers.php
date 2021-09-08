<?php
function validate($input,$flag)
{
	$status = true;
	
	switch($flag)
	{
		case 1:
			if(empty($input))
			{
				$status  = false;
			}
			break;
			
			 case 2: 
			if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
				$status = false;
			}
			   break;

			 case 3: 
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $status = false;
        } 
        break; 
			
			case 4: 
			if(!filter_var($input,FILTER_VALIDATE_URL)){
				$status = false;
			} 
			break; 
			
	}
	 return $status;
	
}

function CleanInputs($input){
  
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

     return $input;
}









?>