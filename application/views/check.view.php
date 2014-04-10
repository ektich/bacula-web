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

 class Check_View extends View
 {
     public $title               = 'Check requirements';
     protected $template_file    = 'check.tpl';

     public function index()
     {
         // PHP Gettext support
         $this->assign('php_gettext', $this->model->checkPhpGettext());
 
         // PHP Session support
         $this->assign('php_session', $this->model->checkPhpSession() );

         // PHP GD support
         $this->assign('php_gd', $this->model->checkPhpGd() );

         // PHP PDO support
         $this->assign('php_pdo', $this->model->checkPhpPdo() );
     }
 }

?>
