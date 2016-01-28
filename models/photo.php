<?php
	require_once("../models/DataAccessHelper.php");
	class photo {
	private $id;
	public function __construct($id){
	 $this->id=$id;
	}
	
	public static function getImage($id){
		$query="select * from photos where imgId='".$id."'";
		$rs = DataAccessHelper::executeQuery($query);
		if (sizeof($rs) > 0){
			return $rs;
		}
		return false;
	}
	
	public static function getComments($imgId){
		$query='select fullname,commentstr from imgcomments join users on users.username=imgcomments.username where imgId="'.$imgId.'"';
		$rs = DataAccessHelper::executeQuery($query);
		if (sizeof($rs) > 0){
			return $rs;
		}
		return false;
	}
	
	public static function insertComment($imgId,$username,$commentstr){
		$query="insert into imgcomments (username,commentstr,imgId)values('$username','$commentstr','$imgId')";
		$rs = DataAccessHelper::insertQuery($query);
		if($rs){
			return true;
		}
		return false;
	}
	
	public static function getImageusername($username){
		$query="select * from photos where username='".$username."'";
		$rs = DataAccessHelper::executeQuery($query);
		if ($rs > 0){
			return $rs;
		}
		return false;
	}
	
	public static function getImagePublic(){
		$query='select * from photos where shareStatus=1';
		$rs = DataAccessHelper::executeQuery($query);
		if ($rs > 0)
		{
			return $rs;
		}
		return false;
	}
	
	
	public static function getShared($username){
		$query='select * from sharedto join photos on photos.imgId=sharedto.imgId and sharedto.username="'.$username.'"';
		$rs = DataAccessHelper::executeQuery($query);
		if (sizeof($rs) > 0){
			return $rs;
		}
		return false;
	}
	
	public static function insertImage($image,$name,$description,$access,$username,$label, $albumId){
		$query="insert into photos (name,imageFile,shareStatus,description,username,label, albumId)values('$name','$image','$access','$description','$username','$label','$albumId')";
		$rs = DataAccessHelper::insertQuerySpecial($query);
		if($rs){
			$string = $label;
			$token = strtok($string, "");
			  
			while ($token !== false)
				{
					echo $rs;
					$query="insert into imagetags(imgId,str) values('$rs','$token')";
					DataAccessHelper::insertQuerySpecial($query);
					$token = strtok(" ");
				}
				return true;
		}
		return false;
	}
	
	public static function sharephoto($imgId,$username){
		$query="insert into sharedto (imgId,username)values('$imgId','$username')";
		$rs = DataAccessHelper::insertQuery($query);
		if($rs){
			return true;
		}
		return false;
	}
	public static function imageId($imageName){
		$query="select * from photos where name ='".$imageName."'";
		$rs = DataAccessHelper::executeQuery($query);
		if($rs){
			return $rs;
		}
		return false;
	}
		
}
	
	
	
?>