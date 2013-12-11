<?php
/** @package Cars::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("CarinstanceMap.php");

/**
 * CarinstanceDAO provides object-oriented access to the CarInstance table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Cars::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CarinstanceDAO extends Phreezable
{
	/** @var string */
	public $Vin;

	/** @var int */
	public $Mileage;

	/** @var string */
	public $Color;

	/** @var string */
	public $Make;

	/** @var string */
	public $Model;

	/** @var string */
	public $Repairs;

	/** @var string */
	public $Package;

	/** @var string */
	public $Maintenance;

	/** @var string */
	public $Type;

	/** @var int */
	public $Mpg;

	/** @var string */
	public $Conditions;

	/** @var string */
	public $Powertrain;



}
?>