<?php
require_once("../models/DataAccessHelper.php");
class User {
 private $email="";
 private $username;
 private $fullname;

 public function __construct($username){
	 $this->username = $username;
	 $this->username=$this->load();
 }
 public static function loadAll()
 {
	  $query = "select username, fullname from users";
	  $rs = DataAccessHelper::executeQuery($query);
	  return $rs;
 }

 private function load(){
	 $query = "select * from users where username='" . $this->username . "'";
	 $rs = DataAccessHelper::executeQuery($query);

	 if (sizeof($rs) > 0){
		return $rs[0]["username"];
	 }
	 else
		 echo "User Not Found!";
 }
 
 public function getusername()
 {
	 return $this->username;
 }
 public function get_values(){
	 $query = "select * from users where username='" . $this->username . "'";
	 $rs = DataAccessHelper::executeQuery($query);
	 
	 if (sizeof($rs) > 0){
			var_dump($rs[0]);
			$tusername=$rs[0]["username"];
			$tfullname=$rs[0]["fullname"];
			$temail=$rs[0]["email"];
		 }
	$temp=array('username'=>$tusername,'fullname'=>$tfullname,'email'=>$temail);
	return $temp;
 }
 
 public function echoevery(){
	 echo $this->email;
 }
 
 

 public static function validate($uname,$pass)
 {
	 $query = "select * from users where username='" . $uname . "' and pass = '".$pass."'";
	 $rs = DataAccessHelper::executeQuery($query);
	 if(!$rs)
		 return false;
	 return true;
 }

 public static function signup($username, $fullname,$email,$password){
	 $query ="insert into users(username,fullname,email,pass)"."VALUES('$username','$fullname', '$email',  '$pass')";
	 $result=DataAccessHelper::insertQuery($query);
	 if($result===TRUE){
		return true;
	 }
	 
 }
} 
?>