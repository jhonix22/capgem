<?php
$UpdateColumnVal = array("verified"=>'1');
$where = array("user_id"=>$_GET["codeid"]);

	$obj->update("tbl_user", $UpdateColumnVal, $where, "Profile Verified Successfuly!");
?>