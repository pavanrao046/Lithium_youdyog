<?php 
namespace app\controllers;

class Constants {
   const ROLE_ADMIN = 0;
   const ROLE_MEMBER = 1;
   const ROLE_PARTNER = 2;
   const ROLE_PROVIDER = 3;
   
   public static $roles = array(self::ROLE_ADMIN => "Administrator",
   								self::ROLE_MEMBER => "Member",
   								self::ROLE_PARTNER => "Partner", 
   								self::ROLE_PROVIDER => "Provider");

	const STATUS_DELETED = 0;
	const STATUS_APPROVED = 1;
	const STATUS_UNAPPROVED = 2;
	public static $status = array(self::STATUS_DELETED => "Deleted",
											self::STATUS_APPROVED => "Approved",
   										self::STATUS_UNAPPROVED => "Unapproved");
}

?>
