<?php
$r = null;
if(!empty($sta_stations)){
	foreach($sta_stations as $c){
		$r[] = array('label'=>$c['StaStation']['stationName'],'id'=>$c['StaStation']['stationID']);
	}
}
else{
	$r[] = array('label'=>__('keine Treffer'),'id'=>null);
}
echo json_encode($r);