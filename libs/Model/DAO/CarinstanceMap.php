<?php
/** @package    Cars::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * CarinstanceMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CarinstanceDAO to the CarInstance datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Cars::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CarinstanceMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Carinstance object
	 *
	 * @access public
	 * @return array of FieldMaps
	 */
	public static function GetFieldMaps()
	{
		static $fm = null;
		if ($fm == null)
		{
			$fm = Array();
			$fm["Vin"] = new FieldMap("Vin","CarInstance","VIN",true,FM_TYPE_VARCHAR,30,null,false);
			$fm["Mileage"] = new FieldMap("Mileage","CarInstance","mileage",false,FM_TYPE_INT,11,null,false);
			$fm["Color"] = new FieldMap("Color","CarInstance","color",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Make"] = new FieldMap("Make","CarInstance","make",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Model"] = new FieldMap("Model","CarInstance","model",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Repairs"] = new FieldMap("Repairs","CarInstance","repairs",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Package"] = new FieldMap("Package","CarInstance","package",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Maintenance"] = new FieldMap("Maintenance","CarInstance","maintenance",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Type"] = new FieldMap("Type","CarInstance","type",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Mpg"] = new FieldMap("Mpg","CarInstance","mpg",false,FM_TYPE_INT,11,null,false);
			$fm["Conditions"] = new FieldMap("Conditions","CarInstance","conditions",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Powertrain"] = new FieldMap("Powertrain","CarInstance","powertrain",false,FM_TYPE_VARCHAR,30,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Carinstance object
	 *
	 * @access public
	 * @return array of KeyMaps
	 */
	public static function GetKeyMaps()
	{
		static $km = null;
		if ($km == null)
		{
			$km = Array();
		}
		return $km;
	}

}

?>