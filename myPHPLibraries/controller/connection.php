<?php
// Create Connection
session_start();

include('db.class.php');
$obj = new Database("localhost","root","","rocketme_pos");
include('table.class.php');

?>