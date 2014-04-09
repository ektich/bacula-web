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

class Dashboard_Model extends DatabaseModel {
    private $periods;

    public function __construct() {

        $this->periods = array( 'lastday' => array( 'label' => 'Last day', 
                                                    'timestamps' => array(LAST_DAY, NOW) ),
                                'lastweek' => array( 'label' => 'Last week',
						    'timestamps' => array(LAST_WEEK, NOW) ),
				'lastmonth' => array( 'label' => 'Last month',
                                                    'timestamps' => array(LAST_MONTH, NOW) ),
				'all' => array( 'label' => 'Since BOT',
                                                    'timestamps' => array(FIRST_DAY, NOW) )
                              );

        parent::__construct();
    }

    public function countClients() {
        return $this->count('Client');
    }

    public function getStoredBytes() {
        $stored_bytes = $this->sum('Job', 'JobBytes');
        return  CUtils::Get_Human_Size($stored_bytes, 1);
    }

    public function getStoredFiles() {
        $stored_files = $this->sum('Job', 'JobFiles');
        return  CUtils::format_Number($stored_files, 0);
    }

    public function countPools() {
        $poolmodel = new Pools_Model();
        return $poolmodel->count('Pool');
    }

    public function countVolumes() {
        $volmodel = new Volumes_Model;
        return $volmodel->count('Media');
    }
 
    public function getPeriodStr() {
        $period_str;

        if ( !is_null(CHttpRequest::get_Value('period') ) ) 
            $period = CHttpRequest::get_Value('period');
        else
            $period = 'lastday';

        $period_str  = '<b>Period:</b> ' . strftime("%d %m %Y", $this->periods[$period]['timestamps'][0]) . ' to ';
        $period_str .= strftime('%d %m %Y', $this->periods[$period]['timestamps'][1]) ;
 
        return $period_str;
    }

    public function getPeriodList() {
        $temp = array();
         
        foreach($this->periods as $key => $period ) {
             $temp[$key] = $period['label'];
        }

        return $temp;
    }

    public function getDatabaseSize() {
       $dbmodel = new Database_Model();
       return $dbmodel->getSize(); 
    } 
}
?>
