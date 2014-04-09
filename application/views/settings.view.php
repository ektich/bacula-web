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

 class Settings_View extends View
 {
     public $title               = 'Settings';
     protected $template_file    = 'settings.tpl';

     public function index()
     {
       // Language
       $this->assign( 'language', $this->model->getLanguageSetting() );

       // Hide empty pools
       $this->assign('hide_empty_pools', $this->model->getHideEmptyPoolsSetting() );

       // Show inactive clients
       $this->assign( 'show_inactive_clients', $this->model->getInactiveClientsSetting() );

       // Jobs per page
       $this->assign( 'jobs_per_page', $this->model->getJobsPerPageSetting() );

       // Catalogs number
       $this->assign( 'catalogs_nb', $this->model->countCatalogs() );

     }
 }

?>
