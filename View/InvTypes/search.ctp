<?php
$r = null;
if(!empty($inv_types)){
	foreach($inv_types as $c){
		$r[] = array('label'=>$c['InvType']['typeName'],'id'=>$c['InvType']['typeID']);
	}
}
else{
	$r[] = array('label'=>__('keine Treffer'),'id'=>null);
}
echo json_encode($r);