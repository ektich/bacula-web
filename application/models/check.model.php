<?php

/*
  +-------------------------------------------------------------------------+
  | Copyright (C) 2004 Juan Luis Frances Jimenez                            |
  | Copyright 2010-2014, Davide Franco                                      |
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

    class Check_Model extends Model {
        public function checkPhpGettext() {
            if(function_exists('gettext') )
                return 'ok';
            else
                return 'remove';
        }

        public function checkPhpSession() {
            if(function_exists('session_start')) 
                return 'ok';
            else
                return 'remove';
        }

        public function checkPhpGd() {
            if(function_exists('gd_info')) 
                return 'ok';
            else
                return 'remove';
        }

        public function checkPhpPdo(){
            if(class_exists('PDO')) 
                return 'ok';
            else
                return 'remove';
        }

        public function checkPhpMysql(){
            if(function_exists('mysql_connect')) 
                return 'ok';
            else
                return 'remove';
        }

        public function checkPhpPostgresql(){
            if(function_exists('pg_connect')) 
                return 'ok';
            else
                return 'remove';
        }

        public function checkPhpSqlite() {
            if(class_exists('SQLite3'))
                return 'ok';
            else
                return 'remove';
        }
    }


?>
