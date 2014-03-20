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

class ClassAutoLoader {
  private $paths;
  private $current_path;

  // ==================================================================================
  // Function: 	    __construct()
  // Parameters:    none
  // Return:	    
  // ==================================================================================

  public function __construct() {

    $this->current_path = getcwd();

    $this->paths = array( 'application/models', 
                          'application/controllers', 
                          'application/views', 
                          'application/modules',
                          'core', 
                          'core/app',
                          'core/db',
                          'core/graph',
                          'core/utils',
                           );

    // Register autoload function 
    spl_autoload_register( array($this,'loadClass'), true ); 
  }

  // ==================================================================================
  // Function: 	    loadClass()
  // Parameters:    $classname
  // Return:	    
  // ==================================================================================
  
  private function loadClass($classname) {

    $fullpath  = '';
    $classfile = '';
    list($baseclass, $classtype) = explode( '_', $classname);

    if( empty($classtype) ) {
        $classfile = strtolower($baseclass) . '.class.php';
    }else {
        switch($classtype) {
          case 'Controller':
          case 'View':
          case 'Model':
              $classfile = $baseclass . '.' . $classtype . '.php';
              $classfile = strtolower($classfile);
          break;
        } // end switch
    } // end else

    foreach( $this->paths as $path ) {
        $fullpath = $this->current_path . '/' . $path;

        if( file_exists( $fullpath . '/' . $classfile ) ) {
            include( $fullpath . '/' . $classfile );
        } // enf if
    } // end foreach
  }
  
  // ==================================================================================
  // Function: 	    Load_Models()
  // Parameters:    $classname
  // Return:	    
  // ==================================================================================
        
  public function Load_Models( $classname ) {
    foreach( self::$paths as $dir ) {      
      list($class) = explode('_', $classname);
      $file_full_path = $dir . '/' . $class . '.model.php';
      $file_full_path = strtolower($file_full_path);
     
      if( file_exists( $file_full_path ) )
        include( $file_full_path );
    }    
  }

  // ==================================================================================
  // Function:      Load_Views()
  // Parameters:    $classname
  // Return:
  // ==================================================================================

  public function Load_Views( $classname ) {
    foreach( self::$paths as $dir ) {
      list($class) = explode('_', $classname);
      $file_full_path = $dir . '/' . $class . '.view.php';
      $file_full_path = str_replace("View", "", $file_full_path);
      $file_full_path = strtolower($file_full_path);

      if( file_exists( $file_full_path ) )
        include( $file_full_path );
    }
  }

  // ==================================================================================
  // Function:      Load_Views()
  // Parameters:    $classname
  // Return:
  // ==================================================================================

  public function Load_Controllers( $classname ) {
    foreach( self::$paths as $dir ) {
      list($class) = explode('_', $classname);
      $file_full_path = $dir . '/' . $class . '.controller.php';
      $file_full_path = str_replace("Controller", "", $file_full_path);
      $file_full_path = strtolower($file_full_path);

      if( file_exists( $file_full_path ) )
        include( $file_full_path );
    }
  }

} // end class ClassAutoLoader
?>
