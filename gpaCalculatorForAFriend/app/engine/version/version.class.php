<?php 
namespace Engine\Version;
/**
* Version
*
* @package	phpNgin
* @author 	Nickson Ariemba
* @version 	Alpha 1.0
*/
use Engine\Version\VersionModels as VersionModels;
include_once"version.models.php";

class Version extends VersionModels
{
	/**
	* show version
	* @return Array
	*/
	public function showVersion()
	{
		$return =[];
		$model = self::showVersionModel();

		foreach ($model as $key => $value) {
			$return[] = ''.$key.': '.$value.'';
		}
		return $return;
	}
}
?>