<?php
// Assign table name
$prod = "tbl_product";
$supplier = "tbl_supplier";
$category = "tbl_category";
$type = "tbl_type";
$unit = "tbl_unit";
$users = "tbl_users";
$user_lvl = "tbl_userlvl";
$tblTransaction = "tbl_transaction";
$tblOrder = "tbl_order";

// Create table query
$CreateTableSql = "CREATE TABLE IF NOT EXISTS `$prod` (
	`prod_id` INT(255) NOT NULL AUTO_INCREMENT,
	`barcode` VARCHAR(50) NOT NULL,
	`prod_img` LONGTEXT NOT NULL,
	`prod_name` VARCHAR(50) NOT NULL,
	`reg_price` VARCHAR(50) NOT NULL,
	`sale_price` VARCHAR(50) NOT NULL,
	`stock_qty` INT(11) NOT NULL DEFAULT '0',
	`type_id` VARCHAR(50) NOT NULL,
	`cat_id` VARCHAR(50) NOT NULL,
	`unit_id` VARCHAR(50) NOT NULL,
	`sup_id` VARCHAR(50) NOT NULL,
	`exprdate` DATE NOT NULL,
	`date_added` DATETIME NOT NULL,
	PRIMARY KEY (`prod_id`),
	UNIQUE INDEX `barcode` (`barcode`),
	INDEX `cat_id` (`cat_id`),
	INDEX `type_id` (`type_id`),
	INDEX `grms_id` (`unit_id`),
	INDEX `sup_id` (`sup_id`)
)";

$cat = "CREATE TABLE IF NOT EXISTS `$category` (
	`cat_id` INT(11) NOT NULL AUTO_INCREMENT,
	`cat_type` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`cat_id`)
)";

$sup = "CREATE TABLE IF NOT EXISTS `$supplier` (
	`sup_id` INT(11) NOT NULL AUTO_INCREMENT,
	`supplier_name` VARCHAR(50) NOT NULL,
	`supplier_cont` VARCHAR(50) NOT NULL,
	`supplier_address` TINYTEXT NOT NULL,
	`supplier_status` INT(1) NOT NULL DEFAULT '1',
	PRIMARY KEY (`sup_id`)
)";

$ty = "CREATE TABLE IF NOT EXISTS `$type` (
	`type_id` INT(11) NOT NULL AUTO_INCREMENT,
	`type_name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`type_id`)
)";

$un = "CREATE TABLE IF NOT EXISTS `$unit` (
	`unit_id` INT(11) NOT NULL AUTO_INCREMENT,
	`unit_type` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`unit_id`)
)";

$userLvl = "CREATE TABLE IF NOT EXISTS `$user_lvl` (
	`user_lvl_id` INT(11) NOT NULL AUTO_INCREMENT,
	`user_type` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`user_lvl_id`)
)
";

$user = "CREATE TABLE IF NOT EXISTS `$users` (
	`users_id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL,
	`password` VARCHAR(50) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`cont_number` VARCHAR(50) NOT NULL,
	`user_lvl_id` VARCHAR(50) NOT NULL,
	`users_status` INT(1) NOT NULL DEFAULT '1',
	`date_res` DATETIME NOT NULL,
	PRIMARY KEY (`users_id`),
	INDEX `user_type` (`user_lvl_id`)
)
";

$transaction = "CREATE TABLE IF NOT EXISTS `$tblTransaction` (
	`trans_id` INT(255) NOT NULL AUTO_INCREMENT,
	`users_id` VARCHAR(50) NOT NULL,
	`total_amount` DOUBLE(10,2) NOT NULL,
	`date_added` DATETIME NOT NULL,
	`trans_status` INT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`trans_id`),
	INDEX `users_id` (`users_id`)
)
";

$order = "CREATE TABLE IF NOT EXISTS `$tblOrder` (
	`order_id` INT(11) NOT NULL AUTO_INCREMENT,
	`trans_id` VARCHAR(255) NOT NULL,
	`prod_id` VARCHAR(255) NOT NULL,
	`price` INT(11) NOT NULL,
	PRIMARY KEY (`order_id`),
	INDEX `trans_id` (`trans_id`),
	INDEX `prod_id` (`prod_id`)
)
";

//Call Create Table
$obj->CreateTable($CreateTableSql);
$obj->CreateTable($cat);
$obj->CreateTable($sup);
$obj->CreateTable($ty);
$obj->CreateTable($un);
$obj->CreateTable($userLvl);
$obj->CreateTable($user);
$obj->CreateTable($transaction);
$obj->CreateTable($order);
?>