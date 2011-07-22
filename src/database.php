<?php

/*	Created by Shane Perreault
 *	Friday July 22, 2011
 *
 *	MultiDB - PHP Tool
 *	Multiple Database Handling w/ CRUD
*/

class Database extends PDO
{

	// Information
	protected static $_db_info = array();

	// Instances
	protected static $_db_instances = array();
	
	public static function createDB($host, $user, $pass, $db_name) {
	
		if(empty(self::$_db_instances[strtolower($db_name)]))
		{
			self::$_db_info[strtolower($db_name)]['host'] = $host;
			self::$_db_info[strtolower($db_name)]['user'] = $user;
			self::$_db_info[strtolower($db_name)]['pass'] = $pass;
			self::$_db_info[strtolower($db_name)]['name'] = $db_name;
			
			$dsn = "mysql:host=" . self::$_db_info[strtolower($db_name)]['host'] . 
				   ";dbname=" . self::$_db_info[strtolower($db_name)]['name'];
				   
			self::_$db_instances[strtolower($db_name)] = new Database($dsn, self::$_db_info[strtolower($db_name)]['user'],
			self::$_db_info[strtolower($db_name)]['pass']);
		}
	}
	
	public static function getDB($db_name) {
		
		if(!empty(self::$_db_instances[strtolower($db_name)]))
			return self::$_db_instances[strtolower($db_name)];
	}
	
	
	public static function deleteDB($db_name) {
	
		if(!empty(self::$_db_instances[strtolower($db_name)])) {
			unset(self::$_db_instances[strtolower($db_name)]);
		}
	}

}