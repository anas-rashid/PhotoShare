<?php
require_once("../models/DataAccessHelper.php");
class comment
{
	public static function insertComment($imgId,$username, $str)
	{
		
		$query ="insert into imgcomments(imgId,username, commentstr) values('$imgId','$username', '$str')";
		$result=DataAccessHelper::insertQuery($query);
		if($result===TRUE)
	    {
			return true;
		}
		return false;
	}	
	public static function getComments($imgId)
	{
		$query="select * from imgcomments  where imgId=".$imgId;
		$result=DataAccessHelper::executeQuery($query);
		return $result;
	}
}
?>