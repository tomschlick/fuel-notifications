<?php

/**
 * Notifications package for FuelPHP
 *
 * @package		Notifications
 * @version		1.0
 * @author		Tom Schlick (tom@tomschlick.com)
 * @link		http://github.com/tomschlick/fuel-notifications
 * 
 */
 
 namespace Fuel\Tasks;
 
 class Notify {
 
 	public static function run()
 	{
 		// Code to process pending notifications
 	}
 	
 	public static function help()
 		{
 			echo <<<HELP
Usage:
    php oil refine notify

Fuel options:
    

Description:
	The notify function will process any pending notifications in the queue.

Examples:
    php oil r notify

HELP;
 	
 		}
 
 }