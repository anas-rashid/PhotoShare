<?php
class DataAccessHelper {
	public static function executeQuery($sql){
		$conn = DataAccessHelper::getConnection();
		$rs = array();
		
		$result = $conn->query($sql);
		if($result->num_rows>0){
			while ($record = $result->fetch_assoc()) {
				 $row = array();
				 foreach ($record as $col => $value) {
					$row[$col] = $value;
				 }
				 $rs[] = $row;
			}
			return $rs;
		}
		else{
			
			echo $conn->error;
			return false;
		}
		$conn->close();
		return false;
	}
	
	public static function insertQuery($sql){
		$conn = DataAccessHelper::getConnection();
		if ($conn->query($sql)===true) {
			 $conn->close();
			return true;
		} else {
			echo $conn->error;
			echo "Query Couldn't Run.";
			 $conn->close();
			return false;
		}
	}
	
	public static function insertQuerySpecial($sql){
		$conn = DataAccessHelper::getConnection();
		if ($conn->query($sql)===true) {
			$last_id = $conn->insert_id;
			 $conn->close();
			return $last_id;
		} else {
			echo $conn->error;
			echo "Query Couldn't Run";
			 $conn->close();
			return false;
		}
	}
	
	private static function getConnection(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "photoshare";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		return $conn;
	}
}
?>