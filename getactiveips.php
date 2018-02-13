<?php
for($i=1;$i<30;$i++){
	// $ip='192.168.0.18';
	// $ping = exec("ping -n 2 $ip",$return,$return2);
	// print_r($ping);
	// echo	
	
	if(ping("192.168.0.$i"))
		echo "192.168.0.$i".'<br>';
	// echo($return2);
}



function ping($host, $timeout = 1) 
{ 
    $output = array(); 
    $com = 'ping -n -w ' . $timeout . ' -c 1 ' . escapeshellarg($host); 
    $exitcode = 0; 
    exec($com, $output, $exitcode); 
    if ($exitcode == 0 || $exitcode == 1) 
    {
        foreach($output as $cline) 
        { 
            if (strpos($cline, ' bytes from ') !== FALSE) 
            { 
                $out = (int)ceil(floatval(substr($cline, strpos($cline, 'time=') + 5))); 
                return $out; 
            } 
        } 
    } 

    return FALSE; 
}


?>