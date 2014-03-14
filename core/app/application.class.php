<?php

class Application {
    public $name;
    public $version;
    public $author;
    public $website;
	
    private $language;
    private $user_config;

    public  $catalog_current_id;
    
    public function __construct($app_config_file) {
        require_once( $app_config_file);
        
        $this->name         = $app_config['name'];
        $this->version      = $app_config['version'];
        $this->author       = $app_config['author'];
        $this->website      = $app_config['website'];

        $this->user_config  = CONFIG_FILE;
    }
    
    public function bootstrap() {
        try {
            // Check config file exist and is readable
            if( !FileConfig::open( CONFIG_FILE ) )
                throw new Exception("The configuration file is missing or not readable");
                
            // Check template cache is writable by Apache
            if( !is_writable( VIEW_CACHE_DIR ) )
                throw new Exception("The template cache folder <b>" . VIEW_CACHE_DIR . "</b> must be writable by Apache user");

            // Check if language have been defined in config file
            $this->language = FileConfig::get_Value( 'language' );
			
            if( !$this->language )
		throw new Exception("Language configuration problem");
			
            // Check if at least one catalog is defined
	    if( FileConfig::count_Catalogs() == 0) {
                throw new Exception("Please define at least on Bacula director connection");
	    }

            // Get current catalog id
           if( !is_null(CHttpRequest::get_Value('catalog_id') ) ) {
               $this->catalog_current_id = CHttpRequest::get_Value('catalog_id');
               $_SESSION['catalog_id'] = $this->catalog_current_id;
           }elseif( isset( $_SESSION['catalog_id'] ) )
               $this->catalog_current_id = $_SESSION['catalog_id'];
           else {
               $this->catalog_current_id = 0;
               $_SESSION['catalog_id'] = $this->catalog_current_id;
           }
           
            // Template engine initalization

            // Bacula catalog selection
            $catalog_nb = FileConfig::count_Catalogs();
            if( $catalog_nb > 1 ) {
                // Catalogs list
                $this->view->assign('catalogs', FileConfig::get_Catalogs() );
                // Catalogs count
                $this->view->assign('catalog_nb', $catalog_nb );
            }
            

        }catch( Exception $e ) {
            CErrorHandler::displayError($e);
        }
        
    }
    
    public function run() {
        /* TO DO
         * Simplify File and FileConfig classes (merge if necessary)
         * Modify CException::raiseErrors (should not die, use template in test page)
         * USER $SESSION $GET $POST should be manager by one object, remove redundancy in all the code
        */
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
