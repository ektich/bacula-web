<?php

class Application {
    public $name;
    public $version;
    public $author;
    public $website;
	
    private $language;
    private $user_config;

    protected $exception;

    protected $view;
    protected $controller;
    protected $model;

    public function __construct($app_config_file) {
        require_once( $app_config_file);
        
        $this->name         = $app_config['name'];
        $this->version      = $app_config['version'];
        $this->author       = $app_config['author'];
        $this->website      = $app_config['website'];
    }

    public function run() {
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
