<?php
/** @package    Cars::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * CarinstanceCriteria allows custom querying for the Carinstance object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Cars::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CarinstanceCriteriaDAO extends Criteria
{

	public $Vin_Equals;
	public $Vin_NotEquals;
	public $Vin_IsLike;
	public $Vin_IsNotLike;
	public $Vin_BeginsWith;
	public $Vin_EndsWith;
	public $Vin_GreaterThan;
	public $Vin_GreaterThanOrEqual;
	public $Vin_LessThan;
	public $Vin_LessThanOrEqual;
	public $Vin_In;
	public $Vin_IsNotEmpty;
	public $Vin_IsEmpty;
	public $Vin_BitwiseOr;
	public $Vin_BitwiseAnd;
	public $Mileage_Equals;
	public $Mileage_NotEquals;
	public $Mileage_IsLike;
	public $Mileage_IsNotLike;
	public $Mileage_BeginsWith;
	public $Mileage_EndsWith;
	public $Mileage_GreaterThan;
	public $Mileage_GreaterThanOrEqual;
	public $Mileage_LessThan;
	public $Mileage_LessThanOrEqual;
	public $Mileage_In;
	public $Mileage_IsNotEmpty;
	public $Mileage_IsEmpty;
	public $Mileage_BitwiseOr;
	public $Mileage_BitwiseAnd;
	public $Color_Equals;
	public $Color_NotEquals;
	public $Color_IsLike;
	public $Color_IsNotLike;
	public $Color_BeginsWith;
	public $Color_EndsWith;
	public $Color_GreaterThan;
	public $Color_GreaterThanOrEqual;
	public $Color_LessThan;
	public $Color_LessThanOrEqual;
	public $Color_In;
	public $Color_IsNotEmpty;
	public $Color_IsEmpty;
	public $Color_BitwiseOr;
	public $Color_BitwiseAnd;
	public $Make_Equals;
	public $Make_NotEquals;
	public $Make_IsLike;
	public $Make_IsNotLike;
	public $Make_BeginsWith;
	public $Make_EndsWith;
	public $Make_GreaterThan;
	public $Make_GreaterThanOrEqual;
	public $Make_LessThan;
	public $Make_LessThanOrEqual;
	public $Make_In;
	public $Make_IsNotEmpty;
	public $Make_IsEmpty;
	public $Make_BitwiseOr;
	public $Make_BitwiseAnd;
	public $Model_Equals;
	public $Model_NotEquals;
	public $Model_IsLike;
	public $Model_IsNotLike;
	public $Model_BeginsWith;
	public $Model_EndsWith;
	public $Model_GreaterThan;
	public $Model_GreaterThanOrEqual;
	public $Model_LessThan;
	public $Model_LessThanOrEqual;
	public $Model_In;
	public $Model_IsNotEmpty;
	public $Model_IsEmpty;
	public $Model_BitwiseOr;
	public $Model_BitwiseAnd;
	public $Repairs_Equals;
	public $Repairs_NotEquals;
	public $Repairs_IsLike;
	public $Repairs_IsNotLike;
	public $Repairs_BeginsWith;
	public $Repairs_EndsWith;
	public $Repairs_GreaterThan;
	public $Repairs_GreaterThanOrEqual;
	public $Repairs_LessThan;
	public $Repairs_LessThanOrEqual;
	public $Repairs_In;
	public $Repairs_IsNotEmpty;
	public $Repairs_IsEmpty;
	public $Repairs_BitwiseOr;
	public $Repairs_BitwiseAnd;
	public $Package_Equals;
	public $Package_NotEquals;
	public $Package_IsLike;
	public $Package_IsNotLike;
	public $Package_BeginsWith;
	public $Package_EndsWith;
	public $Package_GreaterThan;
	public $Package_GreaterThanOrEqual;
	public $Package_LessThan;
	public $Package_LessThanOrEqual;
	public $Package_In;
	public $Package_IsNotEmpty;
	public $Package_IsEmpty;
	public $Package_BitwiseOr;
	public $Package_BitwiseAnd;
	public $Maintenance_Equals;
	public $Maintenance_NotEquals;
	public $Maintenance_IsLike;
	public $Maintenance_IsNotLike;
	public $Maintenance_BeginsWith;
	public $Maintenance_EndsWith;
	public $Maintenance_GreaterThan;
	public $Maintenance_GreaterThanOrEqual;
	public $Maintenance_LessThan;
	public $Maintenance_LessThanOrEqual;
	public $Maintenance_In;
	public $Maintenance_IsNotEmpty;
	public $Maintenance_IsEmpty;
	public $Maintenance_BitwiseOr;
	public $Maintenance_BitwiseAnd;
	public $Type_Equals;
	public $Type_NotEquals;
	public $Type_IsLike;
	public $Type_IsNotLike;
	public $Type_BeginsWith;
	public $Type_EndsWith;
	public $Type_GreaterThan;
	public $Type_GreaterThanOrEqual;
	public $Type_LessThan;
	public $Type_LessThanOrEqual;
	public $Type_In;
	public $Type_IsNotEmpty;
	public $Type_IsEmpty;
	public $Type_BitwiseOr;
	public $Type_BitwiseAnd;
	public $Mpg_Equals;
	public $Mpg_NotEquals;
	public $Mpg_IsLike;
	public $Mpg_IsNotLike;
	public $Mpg_BeginsWith;
	public $Mpg_EndsWith;
	public $Mpg_GreaterThan;
	public $Mpg_GreaterThanOrEqual;
	public $Mpg_LessThan;
	public $Mpg_LessThanOrEqual;
	public $Mpg_In;
	public $Mpg_IsNotEmpty;
	public $Mpg_IsEmpty;
	public $Mpg_BitwiseOr;
	public $Mpg_BitwiseAnd;
	public $Conditions_Equals;
	public $Conditions_NotEquals;
	public $Conditions_IsLike;
	public $Conditions_IsNotLike;
	public $Conditions_BeginsWith;
	public $Conditions_EndsWith;
	public $Conditions_GreaterThan;
	public $Conditions_GreaterThanOrEqual;
	public $Conditions_LessThan;
	public $Conditions_LessThanOrEqual;
	public $Conditions_In;
	public $Conditions_IsNotEmpty;
	public $Conditions_IsEmpty;
	public $Conditions_BitwiseOr;
	public $Conditions_BitwiseAnd;
	public $Powertrain_Equals;
	public $Powertrain_NotEquals;
	public $Powertrain_IsLike;
	public $Powertrain_IsNotLike;
	public $Powertrain_BeginsWith;
	public $Powertrain_EndsWith;
	public $Powertrain_GreaterThan;
	public $Powertrain_GreaterThanOrEqual;
	public $Powertrain_LessThan;
	public $Powertrain_LessThanOrEqual;
	public $Powertrain_In;
	public $Powertrain_IsNotEmpty;
	public $Powertrain_IsEmpty;
	public $Powertrain_BitwiseOr;
	public $Powertrain_BitwiseAnd;

}

?>