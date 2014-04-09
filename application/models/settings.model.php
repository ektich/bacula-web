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

    class Settings_Model extends Model {

        public function getLanguageSetting() {
            return FileConfig::get_Value( 'language');
        }

        public function getInactiveClientsSetting() {
            if(FileConfig::get_Value('show_inactive_clients'))
                return 'true';
            else
                return 'false';
        }

        public function getHideEmptyPoolsSetting() {
            if(FileConfig::get_Value('hide_empty_pools'))
                return 'true';
            else
                return 'false';
        }

        public function getJobsPerPageSetting() {
            return FileConfig::get_Value('jobs_per_page');
        }

        public function countCatalogs() {
            return FileConfig::count_Catalogs();
        }
    }
?>
