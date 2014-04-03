<?php
/*
  +-------------------------------------------------------------------------+
  | Copyright (C) 2004 Juan Luis Frances Jimenez                                                    |
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
 class Dashboard_View extends View
 {
    public $title		= 'Dashboard';
    protected $template_file    = 'dashboard.tpl';

    public function index( $action = null) {
        // Clients count
        $this->assign( 'clients_nb', $this->model->countClients());        

        // Stored bytes
        $this->assign( 'stored_bytes', $this->model->getStoredBytes());

        // Stored files
        $this->assign( 'stored_files', $this->model->getStoredFiles());
  
    }
    
    public function render() 
    {
        parent::render();
    }
 }
