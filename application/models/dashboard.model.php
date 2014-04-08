<?php
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
        return $this->count('Media');
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
}
?>
