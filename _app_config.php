<?php
/**
 * @package Car Reliability-inator 
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Accessory
	'GET:accessories' => array('route' => 'Accessory.ListView'),
	'GET:accessory/(:any)' => array('route' => 'Accessory.SingleView', 'params' => array('accessoryid' => 1)),
	'GET:api/accessories' => array('route' => 'Accessory.Query'),
	'POST:api/accessory' => array('route' => 'Accessory.Create'),
	'GET:api/accessory/(:any)' => array('route' => 'Accessory.Read', 'params' => array('accessoryid' => 2)),
	'PUT:api/accessory/(:any)' => array('route' => 'Accessory.Update', 'params' => array('accessoryid' => 2)),
	'DELETE:api/accessory/(:any)' => array('route' => 'Accessory.Delete', 'params' => array('accessoryid' => 2)),
		
	// Carinstance
	'GET:carinstances' => array('route' => 'Carinstance.ListView'),
	'GET:carinstance/(:any)' => array('route' => 'Carinstance.SingleView', 'params' => array('vin' => 1)),
	'GET:api/carinstances' => array('route' => 'Carinstance.Query'),
	'POST:api/carinstance' => array('route' => 'Carinstance.Create'),
	'GET:api/carinstance/(:any)' => array('route' => 'Carinstance.Read', 'params' => array('vin' => 2)),
	'PUT:api/carinstance/(:any)' => array('route' => 'Carinstance.Update', 'params' => array('vin' => 2)),
	'DELETE:api/carinstance/(:any)' => array('route' => 'Carinstance.Delete', 'params' => array('vin' => 2)),
		
	// Condition
	'GET:conditions' => array('route' => 'Condition.ListView'),
	'GET:condition/(:any)' => array('route' => 'Condition.SingleView', 'params' => array('vin' => 1)),
	'GET:api/conditions' => array('route' => 'Condition.Query'),
	'POST:api/condition' => array('route' => 'Condition.Create'),
	'GET:api/condition/(:any)' => array('route' => 'Condition.Read', 'params' => array('vin' => 2)),
	'PUT:api/condition/(:any)' => array('route' => 'Condition.Update', 'params' => array('vin' => 2)),
	'DELETE:api/condition/(:any)' => array('route' => 'Condition.Delete', 'params' => array('vin' => 2)),
		
	// Make
	'GET:makes' => array('route' => 'Make.ListView'),
	'GET:make/(:any)' => array('route' => 'Make.SingleView', 'params' => array('vin' => 1)),
	'GET:api/makes' => array('route' => 'Make.Query'),
	'POST:api/make' => array('route' => 'Make.Create'),
	'GET:api/make/(:any)' => array('route' => 'Make.Read', 'params' => array('vin' => 2)),
	'PUT:api/make/(:any)' => array('route' => 'Make.Update', 'params' => array('vin' => 2)),
	'DELETE:api/make/(:any)' => array('route' => 'Make.Delete', 'params' => array('vin' => 2)),
		
	// Mileagebracket
	'GET:mileagebrackets' => array('route' => 'Mileagebracket.ListView'),
	'GET:mileagebracket/(:any)' => array('route' => 'Mileagebracket.SingleView', 'params' => array('vin' => 1)),
	'GET:api/mileagebrackets' => array('route' => 'Mileagebracket.Query'),
	'POST:api/mileagebracket' => array('route' => 'Mileagebracket.Create'),
	'GET:api/mileagebracket/(:any)' => array('route' => 'Mileagebracket.Read', 'params' => array('vin' => 2)),
	'PUT:api/mileagebracket/(:any)' => array('route' => 'Mileagebracket.Update', 'params' => array('vin' => 2)),
	'DELETE:api/mileagebracket/(:any)' => array('route' => 'Mileagebracket.Delete', 'params' => array('vin' => 2)),
		
	// Package
	'GET:packages' => array('route' => 'Package.ListView'),
	'GET:package/(:any)' => array('route' => 'Package.SingleView', 'params' => array('vin' => 1)),
	'GET:api/packages' => array('route' => 'Package.Query'),
	'POST:api/package' => array('route' => 'Package.Create'),
	'GET:api/package/(:any)' => array('route' => 'Package.Read', 'params' => array('vin' => 2)),
	'PUT:api/package/(:any)' => array('route' => 'Package.Update', 'params' => array('vin' => 2)),
	'DELETE:api/package/(:any)' => array('route' => 'Package.Delete', 'params' => array('vin' => 2)),
		
	// Part
	'GET:parts' => array('route' => 'Part.ListView'),
	'GET:part/(:any)' => array('route' => 'Part.SingleView', 'params' => array('partno' => 1)),
	'GET:api/parts' => array('route' => 'Part.Query'),
	'POST:api/part' => array('route' => 'Part.Create'),
	'GET:api/part/(:any)' => array('route' => 'Part.Read', 'params' => array('partno' => 2)),
	'PUT:api/part/(:any)' => array('route' => 'Part.Update', 'params' => array('partno' => 2)),
	'DELETE:api/part/(:any)' => array('route' => 'Part.Delete', 'params' => array('partno' => 2)),
		
	// Powertrain
	'GET:powertrains' => array('route' => 'Powertrain.ListView'),
	'GET:powertrain/(:any)' => array('route' => 'Powertrain.SingleView', 'params' => array('vin' => 1)),
	'GET:api/powertrains' => array('route' => 'Powertrain.Query'),
	'POST:api/powertrain' => array('route' => 'Powertrain.Create'),
	'GET:api/powertrain/(:any)' => array('route' => 'Powertrain.Read', 'params' => array('vin' => 2)),
	'PUT:api/powertrain/(:any)' => array('route' => 'Powertrain.Update', 'params' => array('vin' => 2)),
	'DELETE:api/powertrain/(:any)' => array('route' => 'Powertrain.Delete', 'params' => array('vin' => 2)),
		
	// Repair
	'GET:repairs' => array('route' => 'Repair.ListView'),
	'GET:repair/(:any)' => array('route' => 'Repair.SingleView', 'params' => array('vin' => 1)),
	'GET:api/repairs' => array('route' => 'Repair.Query'),
	'POST:api/repair' => array('route' => 'Repair.Create'),
	'GET:api/repair/(:any)' => array('route' => 'Repair.Read', 'params' => array('vin' => 2)),
	'PUT:api/repair/(:any)' => array('route' => 'Repair.Update', 'params' => array('vin' => 2)),
	'DELETE:api/repair/(:any)' => array('route' => 'Repair.Delete', 'params' => array('vin' => 2)),
		
	// Timeframe
	'GET:timeframes' => array('route' => 'Timeframe.ListView'),
	'GET:timeframe/(:any)' => array('route' => 'Timeframe.SingleView', 'params' => array('vin' => 1)),
	'GET:api/timeframes' => array('route' => 'Timeframe.Query'),
	'POST:api/timeframe' => array('route' => 'Timeframe.Create'),
	'GET:api/timeframe/(:any)' => array('route' => 'Timeframe.Read', 'params' => array('vin' => 2)),
	'PUT:api/timeframe/(:any)' => array('route' => 'Timeframe.Update', 'params' => array('vin' => 2)),
	'DELETE:api/timeframe/(:any)' => array('route' => 'Timeframe.Delete', 'params' => array('vin' => 2)),
		
	// Mpg
	'GET:mpgs' => array('route' => 'Mpg.ListView'),
	'GET:mpg/(:any)' => array('route' => 'Mpg.SingleView', 'params' => array('vin' => 1)),
	'GET:api/mpgs' => array('route' => 'Mpg.Query'),
	'POST:api/mpg' => array('route' => 'Mpg.Create'),
	'GET:api/mpg/(:any)' => array('route' => 'Mpg.Read', 'params' => array('vin' => 2)),
	'PUT:api/mpg/(:any)' => array('route' => 'Mpg.Update', 'params' => array('vin' => 2)),
	'DELETE:api/mpg/(:any)' => array('route' => 'Mpg.Delete', 'params' => array('vin' => 2)),
		
	// User
	'GET:users' => array('route' => 'User.ListView'),
	'GET:user/(:any)' => array('route' => 'User.SingleView', 'params' => array('userid' => 1)),
	'GET:api/users' => array('route' => 'User.Query'),
	'POST:api/user' => array('route' => 'User.Create'),
	'GET:api/user/(:any)' => array('route' => 'User.Read', 'params' => array('userid' => 2)),
	'PUT:api/user/(:any)' => array('route' => 'User.Update', 'params' => array('userid' => 2)),
	'DELETE:api/user/(:any)' => array('route' => 'User.Delete', 'params' => array('userid' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
?>