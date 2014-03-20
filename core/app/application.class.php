<?php

class Application {
    public $name;
    public $version;
    public $author;
    public $website;
	
    private $language;
    private $user_config;

    protected $default_controller;
    protected $default_view;

    public function __construct($app_config_file) {
        require_once( $app_config_file);
        
        $this->name         = $app_config['name'];
        $this->version      = $app_config['version'];
        $this->author       = $app_config['author'];
        $this->website      = $app_config['website'];
    }
    
    public function run() {
        try {
            $controller = new Controller();
            $viewname   = $controller->getView();
            $view       = new $viewname();
            $view->render();

        }catch (Exception $e) {
            CErrorHandler::displayError($e);
        }
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getVersion() {
        return $this->version;
    }
    
    public function getAuthor() {
        return $this->author;
    }
}


?>
