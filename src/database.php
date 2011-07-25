<?php

/*	Created by Shane Perreault
 *	Friday July 22, 2011
 *
 *	MultiDB - PHP Tool
 *	Multiple Database Handling w/ CRUD
*/

class Databases
{
	// Instances
	protected static $_db_instances = array();
	
	public static function create($host, $user, $pass, $db_name, $port=3306) {
	
		if(empty(self::$_db_instances[$db_name]))
		{
			$dsn = "mysql:host={$host};port={$port};dbname={$db_name}";
			self::$_db_instances[$db_name] = new PDO($dsn, $user, $pass);
		}
	}
	
	public static function get($db_name) {
		
		if(!empty(self::$_db_instances[$db_name]))
			return self::$_db_instances[$db_name];
	}
	
	
	public static function delete($db_name) {
		if(!empty(self::$_db_instances[$db_name]))
			unset(self::$_db_instances[$db_name]);
	}

}