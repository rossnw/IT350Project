<?php
/** @package    Cars::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Carinstance object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Cars::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CarinstanceReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `CarInstance` table
	public $CustomFieldExample;

	public $Vin;
	public $Mileage;
	public $Color;
	public $Make;
	public $Model;
	public $Repairs;
	public $Package;
	public $Maintenance;
	public $Type;
	public $Mpg;
	public $Conditions;
	public $Powertrain;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`CarInstance`.`VIN` as Vin
			,`CarInstance`.`mileage` as Mileage
			,`CarInstance`.`color` as Color
			,`CarInstance`.`make` as Make
			,`CarInstance`.`model` as Model
			,`CarInstance`.`repairs` as Repairs
			,`CarInstance`.`package` as Package
			,`CarInstance`.`maintenance` as Maintenance
			,`CarInstance`.`type` as Type
			,`CarInstance`.`mpg` as Mpg
			,`CarInstance`.`conditions` as Conditions
			,`CarInstance`.`powertrain` as Powertrain
		from `CarInstance`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `CarInstance`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>