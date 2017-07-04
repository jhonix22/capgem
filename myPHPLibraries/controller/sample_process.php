<?php
header('content-type: application/json; charset=utf-8');
include('../../controller/connection.php');

$action = $_GET["action"];

if($action == 'newproduct'){
	$row = array("*");
	$view_prod = $obj->read($category, $row, "cat_id", $_POST['category']);
	foreach($view_prod as $key=>$value){
		$sku = strtoupper($value["sku"]);
	}
	
	$InsColumnVal = array(
					"barcode"=>$sku.''.$_POST['prod_code'],
					"prod_name"=>$_POST['prod_name'],
					"reg_price"=>$_POST['reg_price'],
					"sale_price"=>$_POST['sale_price'],
					"stock_qty"=>$_POST['stck_qty'],
					"sup_id"=>$_POST['supplier'],
					"cat_id"=>$_POST['category'],
					"type_id"=>$_POST['type'],
					"unit_id"=>$_POST['unit_type'],
					"date_added"=>date("Y-m-d H:i"),
					"exprdate"=>$_POST['exprdate'],
				);
				
	//if($InsColumnVal){
		//Call insert function to insert record
		$obj->insert($prod, $InsColumnVal, '../../index.php?module=addnew-product', 'Product successfully added!', "", 'true');
	//}
}

if($action == 'addunit'){
	$type = $_POST["unit_type"];
	
	$InsColumnVal = array("unit_type"=>$type);
	//Call insert function to insert record
	$obj->insert($unit, $InsColumnVal, 'Array', "Unit successfully added!", "", "true");
}

if($action == 'addcat'){
	$type = $_POST["cat_type"];
	$subs = substr($type, 0, 2);
	
	$InsColumnVal = array("cat_type"=>$type,"sku"=>strtoupper($subs));
	//Call insert function to insert record
	$obj->insert($category, $InsColumnVal, 'Array', 'Category successfully added!', "", 'true');
}
if($action == 'addprod'){
	$p_type = $_POST["prod_type"];
	
	$InsColumnVal = array("type_name"=>$p_type);
	//Call insert function to insert record
	$obj->insert($type, $InsColumnVal, 'Array', 'Product type successfully added!', "", 'true');
}
if($action == 'addusers'){	
	$name = explode(" ", $_POST['name']);
	$username = $name[0];
	$InsColumnVal = array(
					"username"=>$username,
					"name"=>$_POST['name'],
					"password"=>$_POST['password'],
					"cont_number"=>$_POST['contact'],
					"user_lvl_id"=>$_POST['role'],
					"date_res"=>date("Y-m-d h:i"),
				);
				
	//if($InsColumnVal){
		//Call insert function to insert record
		$obj->insert($users, $InsColumnVal, '../../index.php?module=settings', 'User successfully added!', "", 'true');
	//}
}
if($action == 'orderTrans'){	
	$trans_id = '1';
	
	$row = array("*, COUNT(prod_id) as unit");
	$get_prod = $obj->read($prod, $row, "barcode", $_POST['barcode']);
	foreach($get_prod as $key=>$value){
		$prod_id = $value["prod_id"];
		$prod_name = $value["prod_name"];
		$prod_price = $value["sale_price"];
		$qty = $value["unit"];
	}
	
	$InsColumnVal = array(
			"trans_id"=>$trans_id,
			"prod_id"=>$prod_id,
			"price"=>$prod_price
			);
			
	$content = "
	<tr>
		<td>".$prod_name."</td><td>".$qty."</td><td>".$prod_price."</td>
	</tr>
	";
	if($qty >= 1){
		//Call insert function to insert record
		$obj->insert($tblOrder, $InsColumnVal, 'Array', 'Product type successfully added!', $content, 'false');
	}
}

if($action == 'keyword') {
	$array = array();
	$content = '';
	
	$row = array("*");
	$get_prod = $obj->search($prod, $row, "prod_name", $_POST['keyword'], "LIKE");

	if(!empty($get_prod)) {
	$content .= '<ul id="productOrder-list">';
		foreach($get_prod as $res) {
		$content .= '<li onClick="selectCountry('."'".$res["prod_name"]."'".');">'.$res["prod_name"].'</li>';
		}
	$content .= '</ul>';
	}
	if(!empty($_POST['keyword'])){
		$array["status"] = TRUE;
		$array["content"] = $content;
	}else{
		$array["status"] = FALSE;
	}
	
	echo json_encode($array);
}
?>