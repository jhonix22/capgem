<?php
	/* HOW TO USE */
	/*
		insert and refresh page and "true" stands for checking the duplicate value - $obj->insert($users, $InsColumnVal, '../../index.php?module=settings', 'User successfully added!', "", 'true');
		
		insert and return object w/o refreshin the page using ajax and w/o checking the duplicate value - $obj->insert($users, $InsColumnVal, 'Array', 'User successfully added!', $content, 'true');  
		
		Search object autocomplete - $obj->search($prod, $row, "prod_name", $_POST['keyword'], "LIKE"); 
		
		Read or display specific value - $obj->read($category, $row, "cat_id", $_POST['category']);
		
		Featch and displays value - $row = array("unit_id","unit_type");
								$show = $obj->fetch($unit, $row);
		
	*/
	
class Database{
	
	public $connection;

	//Connect with database for mysql database
	public function __construct($host, $user, $pass, $db)
	{
		$this->connection = new mysqli($host,$user,$pass);

		$CreateDBsql = "CREATE DATABASE IF NOT EXISTS $db";
		
		// Create Database
		if($this->connection->query($CreateDBsql) === TRUE){
			// echo "Database Created succefully! <br>";
		}else{
			echo "Error creating database:".$this->connection->error;
		}

		$this->connection->select_db($db);

		//Check Connection
		if($this->connection->connect_errno){
			die("Connection Fail ".$this->connection->connect_error);
		}
		else{
			// echo "Connection is ok <br>";
		}
	}// End of constructor


	//Function to Create Table
	public function CreateTable($sql){
		//Create Table
		if ($this->connection->query($sql) === TRUE) {
		    // echo "Table has been created successfully";
		} else {
		    echo "Error to creating table: ".$this->connection->error;
		}
	}//End of function CreateTable


	//Function select specific for LOGIN {table,returned columns, column conditions}
	public function select($table, array $columns,array $conditions)
    {
        $i = 0;
		foreach($conditions as $key=>$value){
            $con[$i] = $key." = '".$value."'";
            $i++;
		}

        $condi = implode(' AND ', $con);
		$col = implode(', ',$columns);
		$result = $this->connection->query("SELECT $col FROM $table WHERE $condi");

		if ($this->connection->errno) {
			die("Fail Select " . $this->connection->error);
		}

		//return tow dimentional array as required columns result
		return $result->fetch_all(MYSQLI_ASSOC);
	}//end function select

	//Fetch data by accepting table name and columns(1 dimentional array) name
	public function fetch($table, array $columns){
		$columns=implode(",",$columns);
		$result=$this->connection->query("SELECT $columns FROM $table");

		if($this->connection->errno){
			die("Fail Select ".$this->connection->error);
		}

		//return tow dimentional array as required columns result
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	//Fetch data by accepting table name and columns(1 dimentional array) name
	public function read($table, array $columns, $field_id, $id){
		$columns=implode(",",$columns);
		$result=$this->connection->query("SELECT $columns FROM $table WHERE $field_id = '$id'");
		
		if($this->connection->errno){
			die("Fail Select ".$this->connection->error);
		}

		//return tow dimentional array as required columns result
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	//Fetch data by accepting table name and columns(1 dimentional array) name
	public function search($table, array $columns, $field_id, $id, $type){
		if(!empty($type) || $type == NULL){
			$ret_type = $type;
		}else{
			$ret_type = "=";
		}
		$columns=implode(",",$columns);
		$result= $this->connection->query("SELECT $columns FROM $table WHERE $field_id $ret_type '$id%'");
		
		if($this->connection->errno){
			die("Fail Select ".$this->connection->error);
		}

		//return tow dimentional array as required columns result
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	
	# Insert Data within table by accepting TableName and Table column => Data as associative array
	public function insert($tblname, array $val_cols, $loc, $message, $content, $check_duplicate){

		$keysString = implode(", ", array_keys($val_cols));
		
		$i=0;
		foreach($val_cols as $key=>$value) {
			 $StValue[$i] = "'".$value."'";
		    $i++;
		}

		$StValuestoInsert = implode(", ",$StValue);
		
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		foreach($val_cols as $key=>$value) {
			 $StValuetoCheck[$i] = $key.' = '."'".$value."'";
		    $i++;
		}

		$StValues = implode(" AND ",$StValuetoCheck);
		
		if($check_duplicate == 'true'){
			
			$result=$this->connection->query("SELECT COUNT(*) as cnt FROM $tblname WHERE $StValues");
			$r = $result->fetch_all(MYSQLI_ASSOC);
			foreach($r as $key=>$value){
				$count = $value['cnt'];
			}
			// echo $count;
			if($count >= 1){
				if($loc == 'Array'){
					$array = array();
					$array["status"] = FALSE;
					$array["message"] = 'Record Exist!';
					echo json_encode($array);
				}else{
					$_SESSION['added']['alert'] = 'alert-danger';
					$_SESSION['added']['type'] = 'Error';
					$_SESSION['added']['message'] = 'Record Exist!';
					header("Location: {$loc}");
				}
			}else{
				//Perform Insert operation
				if($this->connection->query("INSERT INTO $tblname ($keysString) VALUES ($StValuestoInsert)") === TRUE){
					//echo "<script> alert('New record has been inserted successfully!'); </script>";

					if($loc == 'Array'){
						$array = array();
						$array["status"] = TRUE;
						$array["message"] = $message;
						echo json_encode($array);
					}else{
						$_SESSION['added']['alert'] = 'alert-success';
						$_SESSION['added']['type'] = 'Success';
						$_SESSION['added']['message'] = $message;
						header("Location: {$loc}");
					}
				}else{
					if($loc == 'Array'){
						$array = array();
						$array["status"] = FALSE;
						$array["message"] = 'Error Saving data!';
						echo json_encode($array);
					}else{
						$_SESSION['added']['alert'] = 'alert-danger';
						$_SESSION['added']['type'] = 'Error';
						$_SESSION['added']['message'] = 'Error Saving data!';
						header("Location: {$loc}");
					}
				}
			}
		}else{
			if($this->connection->query("INSERT INTO $tblname ($keysString) VALUES ($StValuestoInsert)") === TRUE){
				//echo "<script> alert('New record has been inserted successfully!'); </script>";

				if($loc == 'Array'){
					$array = array();
					$array["status"] = TRUE;
					$array["message"] = $message;
					$array["content"] = $content;
					echo json_encode($array);
				}else{
					$_SESSION['added']['alert'] = 'alert-success';
					$_SESSION['added']['type'] = 'Success';
					$_SESSION['added']['message'] = $message;
					header("Location: {$loc}");
				}
			}
		}
	}//End of function insert

	//Delete data form table; Accepting Table Name and Keys=>Values as associative array
	public function delete($tblname, array $val_cols){
		//Append each element of val_cols associative array 
		$i=0;
		foreach($val_cols as $key=>$value) {
			$exp[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stexp = implode(" AND ",$exp);

		//Perform Delete operation
		if($this->connection->query("DELETE FROM $tblname WHERE $Stexp") === TRUE){
			if(mysqli_affected_rows($this->connection)){
				echo "<script> alert('Record has been deleted successfully'); </script>";
				echo "<script> window.location.href = 'index.php'; </script>";
			}
			else{
				echo "The Record you want to delete is no loger exists";
				echo '<a href="index.php"><< Back</a>';
			}
		}
		else{
			echo "Error to delete".$this->connection->error;
		}
		echo "<br>";	
	}




	//Update data within table; Accepting Table Name and Keys=>Values as associative array
	public function update($tblname, array $set_val_cols, array $cod_val_cols){
		
		//append set_val_cols associative array elements 
		$i=0;
		foreach($set_val_cols as $key=>$value) {
			$set[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stset = implode(", ",$set);

		//append cod_val_cols associative array elements
		$i=0;
		foreach($cod_val_cols as $key=>$value) {
			$cod[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stcod = implode(" AND ",$cod);

		//Update operation
		// echo "UPDATE $tblname SET $Stset WHERE $Stcod";
		if($this->connection->query("UPDATE $tblname SET $Stset WHERE $Stcod") === TRUE){
			if(mysqli_affected_rows($this->connection)){
				echo "<script> alert('Record updated successfully'); </script>";
				echo "<script> window.location.href = 'index.php'; </script>";
			}
			else{
				echo "The Record you want to update is no loger exists";
				echo '<a href="index.php"><< Back</a>';
			}
		}else{
			echo "Error to update".$this->connection->error;
		}
	}

	//Call destructor function 
	public function __destruct() {
		if($this->connection){
			// Close the connection
        	$this->connection->close();
        	// echo "Connection is release";
        }	
	}
}//end of class
?>