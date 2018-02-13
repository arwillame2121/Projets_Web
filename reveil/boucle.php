<?php
//Put crontab who calling this script every minute


		$times=file_get_contents('/var/www/html/reveil/reveil.txt');
		$datetime=explode('_', $times );
		$Hours=$datetime[0];
		$Minutes=$datetime[1];
		$state=$datetime[2];
		
	 
		if(date("H") == $Hours && (date("i") == $Minutes || date("i") == $Minutes) && $state=='on') 
		{	
				exec("sudo -S /usr/bin/omxplayer --loop /var/www/html/reveil/song/reveil.mp3");
		}

 ?>
