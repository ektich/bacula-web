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
            $router  = new RouterController();
            $context = $router->getContext();

            $controller_class_name = null;
            $view_class_name       = null;

            // debug
            if( !is_null($context) ) {
                $controller_class_name = ucfirst($context) . '_Controller';
                $view_class_name       = ucfirst($context) . '_View';
            }else {
                $controller_class_name = $this->default_controller . '_Controller';
                $view_class_name       = $this->default_view . '_View';
            }

        // Check if context controller exist
        if( !class_exists( $controller_class_name) )
            throw new Exception( "Page not found" );
       
        $controller = new $controller_class_name();
        $view       = new $view_class_name();

        // if no action defined in url
        $view->index();
        $view->render();
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
