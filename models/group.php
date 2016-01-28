<?php
require_once("../models/DataAccessHelper.php");


class group{
	
	public static function insertGroup($name){
		 $query ="insert into groups(gname) values('$name')";
		 $result=DataAccessHelper::insertQuery($query);
		 if($result===TRUE)
		 {
				return true;		  
		}
		return false;
	}
	
	public static function insertMember($name,$username)
	{
		 $query ="insert into members(gname,username) values('$name','$username')";
		 $result=DataAccessHelper::insertQuery($query);
		 if($result===TRUE){
			return true;
		}
		return false;
	}
	
	public static function getAllUserGroups($username)
	{
		$query="select * from  groups join members on members.gname= groups.gname where members.username= '$username'";
		$result=DataAccessHelper::executeQuery($query);
		return $result;
	}
	public static function getAllUsers($groupId){
		$query="select * from members join groups on members.gname=groups.gname where groupId= $groupId";
		$result=DataAccessHelper::executeQuery($query);
		return $result;
	}
}

?>