<?php
/** @package    Cars::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");

/**
 * MpgMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MpgDAO to the mpg datastore.
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
class MpgMap implements IDaoMap
{
	/**
	 * Returns a singleton array of FieldMaps for the Mpg object
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
			$fm["Car"] = new FieldMap("Car","mpg","car",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Mpgamount"] = new FieldMap("Mpgamount","mpg","mpgAmount",false,FM_TYPE_INT,11,null,false);
			$fm["Typeofmiles"] = new FieldMap("Typeofmiles","mpg","typeOfMiles",false,FM_TYPE_VARCHAR,30,null,false);
			$fm["Vin"] = new FieldMap("Vin","mpg","vin",true,FM_TYPE_INT,11,null,false);
		}
		return $fm;
	}

	/**
	 * Returns a singleton array of KeyMaps for the Mpg object
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