<?php

 /*
  +-------------------------------------------------------------------------+
  | Copyright 2010-2014, Davide Franco                                              |
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

    class UserSession {

        private static $session_id;
        
        private function __construct() {}

        public function start() {
            if( !isset( self::$session_id) ) {
                session_start();
                self::$session_id = session_id();
            }
        }

        public function setVar( $var, $value ) {
            $_SESSION[$var] = $value;
        }

        public function getVar( $var ) {
            if( isset( $_SESSION[$var] ) )
                return $_SESSION[$var];
            else
                return null;
        }
    }

?>

