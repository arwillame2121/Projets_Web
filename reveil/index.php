<?php 



require_once '../lib.php';
$times=file_get_contents('reveil.txt');
$datetime=explode('_', $times );
		
		
		
if(isset($_GET['time']) && $_GET['time']!=''){
	if (strpos($_GET['time'], ':') !== FALSE)
		$arraytime=explode(':',$_GET['time']);		
	if (strpos($_GET['time'], 'h') !== FALSE)
		$arraytime=explode('h',$_GET['time']);	
	if (strpos($_GET['time'], 'H') !== FALSE)
		$arraytime=explode('H',$_GET['time']);		
	
	file_put_contents('reveil.txt',$arraytime[0].'_'.$arraytime[1].'_on');
}

if(isset($_GET['off'])){
	// stop process
	exec("sudo killall -9 omxplayer.bin");
}

if(isset($_GET['desable'])){	
	//log in txt file
	if(isset($datetime[2]) && $datetime[2]=='on')
		file_put_contents('reveil.txt',substr($times, 0, -2).'off');	
}

$times=file_get_contents('reveil.txt');
$datetime=explode('_', $times );
// print_r($_SERVER);
if($_SERVER['REMOTE_ADDR']=='192.168.0.17' || $_SERVER['REMOTE_ADDR']=='192.168.0.16'){

	echo '
	<head>
	  <title>Reveil</title>
	</head>
	<div class="container">
		<h3>Reveil '.$datetime[2].' : '.$datetime[0].':'.$datetime[1].'</h3>
		<form method="get" action="index.php">
			<table class="table">
				<tr>
					<td class="col-md-1">Heure</td>
					<td><input type="text" id="time" name="time"></td>
				</tr>
			</table>
			 <input class="btn btn-primary" type="submit" value="Valider REVEIL">
		</form>
		
		<a href="index.php?desable" class="btn btn-warning" role="button">Désactiver</a>
		<a href="index.php?off" class="btn btn-danger" role="button">STOP !</a>
		
	</div>
	</div>
	<script>
	$("#time").focus();
	</script>
	';

}
else {
	
echo'
<head>
	  <title>OMG!!!</title>
	</head>
	<div class="container">
		<h3>Rearde jusqu\'au bout!!!</h3>
	</div>
' ;
}

	echo '<br>
	<div class="container" id="game">  
	  <div class="bar bar1"></div>
	  <div class="ball"></div>
	  <div class="bar bar2"></div>
	<div>


	';

echo"
<script>
var loop = true;
var easing = 'linear';
var direction = 'alternate';

anime({
  targets: '.ball',
  translateX: 450,
  translateY: 100,
  easing,
  loop,
  direction,
  background: [
    { value: '#573796' }, 
    { value: '#FB89FB' },
    { value: '#FBF38C' },
    { value: '#18FF92' },
    { value: '#5A87FF' }
  ]
})
var ballTimeline = anime.timeline({
  loop,
  direction
})
var bar2Timeline = anime.timeline({
  loop,
  direction
})
var bar1Timeline = anime.timeline({
  loop,
  direction
})
ballTimeline
.add({
  targets: '.ball',
  translateY: 100,
  translateX: 450,
  easing
}).add({
  targets: '.ball',
  translateY: 0,
  translateX: 0,
  easing
}).add({
  targets: '.ball',
  translateY: '-80',
  translateX: 450,
  easing
})
bar2Timeline
.add({
  targets: '.bar2',
  translateY: 100,
  easing,
  background: '#573796'
}).add({
  targets: '.bar2',
  translateY: 0,
  easing,
  background: '#FB89FB'
}).add({
  targets: '.bar2',
  translateY: '-100',
  easing,
  background: '#FBF38C'
})
bar1Timeline
.add({
  targets: '.bar1',
  translateY: '-80',
  easing,
  background: '#18FF92'
}).add({
  targets: '.bar1',
  translateY: 10,
  easing,
  background: '#5A87FF'
}).add({
  targets: '.bar1',
  translateY: 60,
  easing,
  background: '#FF1461'
})
</script>
";

 ?>
