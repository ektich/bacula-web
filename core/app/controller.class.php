<?php

class Controller {
    protected $default_view;

    public function __construct() {
        $this->default_view = 'DashBoardView';
    }
  
    public function getView() {
       if( !is_null( ChttpRequest::get_Value('page') ) ) {
           return ChttpRequest::get_Value('page');
       }else{
           return $this->default_view;
       }
    }
}
?>
