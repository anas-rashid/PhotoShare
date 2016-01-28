<?php
require_once("../models/DataAccessHelper.php");
class album{
	
	public static function insertAlbum($name,$username){
		 $query ="insert into album(name,username) values('$name','$username')";
		 $result=DataAccessHelper::insertQuery($query);
		 if($result===TRUE){
			return true;
		}
		return false;
	}
	
	public static function insertImg($albumId,$imgId){
		 $query ="insert into albumdata(imgId,albumId) values($imgId,$albumId)";
		 $result=DataAccessHelper::insertQuery($query);
		 if($result===TRUE){
			return true;
		}
		return false;
	}
	
	public static function getAllUserAlbum($username){
		$query="select * from album where username= '".$username."'";
		$result=DataAccessHelper::executeQuery($query);
		return $result;
	}
	
	public static function getimgIds($albumId){
		$query="select * from albumdata where albumId=$albumId";
		$result=DataAccessHelper::executeQuery($query);
		$result2=array();
		foreach($result as $i){
			$result2[$i]=$result[$i]['imgId'];
		}
		return $result2;
	}
	
	public static function getalbumdata($albumId, $username){
		$query="select * from photos where albumId=$albumId and username='".$username."'";
		$result=DataAccessHelper::executeQuery($query);
		return $result;
	}
	public static function getotheralbumdata($username){
		$query="select * from photos where username='".$username."' and albumId is NULL ";
		$result=DataAccessHelper::executeQuery($query);
		return $result;
	}
}

?>