<?php

/*
  +-------------------------------------------------------------------------+
  | Copyright 2010-2014, Davide Franco			                          |
  |                                                                         |
  | This program is free software; you can redistribute it and/or           |
  | modify it under the terms of the GNU General Public License             |
  | as published by the Free Software Foundation; either version 2          |
  | of the License, or (at your option) any later version.                  |
  |                                                                         |
  | This program is distributed in the hope that it will be useful,         |
  | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
  | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
  | GNU General Public License for more details.                            |
  +-------------------------------------------------------------------------+
 */

class DatabaseAdapter {

    public  $db_link;
    private $db_driver;

    private $dsn;
    private $username;
    private $password;
    
    private $options;

    // ==================================================================================
    // Function: 	__construct()
    // Parameters: 	none
    // Return:		none
    // ==================================================================================
    
    public function __construct() 
    { 
            // Prepare database connection parameters
            $this->dsn    = FileConfig::get_DataSourceName( UserSession::getVar('catalog_id') );

            // Getting driver name from PDO connection
            $this->db_driver     = FileConfig::get_Value( 'db_type', UserSession::getVar('catalog_id') );

            // Set database options
            $db_options = array( PDO::ATTR_CASE => PDO::CASE_LOWER,
                                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                 PDO::ATTR_STATEMENT_CLASS => array('CDBResult', array($this)) );

            // MySQL connection specific parameter
            if ($this->db_driver == 'mysql')
                $db_options[] = array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true);

            // Define username and password for MySQL and postgreSQL
            if( FileConfig::get_Value( 'db_type', UserSession::getVar('catalog_id') ) != 'sqlite' ) {
                $this->username = FileConfig::get_Value( 'login', UserSession::getVar('catalog_id') );
                $this->password = FileConfig::get_Value( 'password', UserSession::getVar('catalog_id') );

                // Create PDO database connection
		$this->db_link = new PDO($this->dsn, $this->username, $this->password);
            }else {
                $this->db_link = new PDO($this->dsn);
            }
    }

    // ==================================================================================
    // Function: 	getDriverName()
    // Parameters: 	none
    // Return:		driver name (eg: mysql, pgsql, sqlite, etc.)
    // ==================================================================================
    
    public function getDriverName() {
        return $this->db_link->getAttribute( PDO::ATTR_DRIVER_NAME );
    }

    // ==================================================================================
    // Function: 	getServerVersion()
    // Parameters: 	none
    // Return:		database server version
    // ==================================================================================
    
    public static function getServerVersion() {
        $server_version = self::$connection->getAttribute( PDO::ATTR_SERVER_VERSION );
        $server_version = explode(':', $server_version);
        return $server_version[0];
    }
}
?>
