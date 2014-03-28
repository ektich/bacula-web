<?php

class BwApplication extends Application
{
    public $catalog_current_id;
    private $user_config         = CONFIG_FILE;

    public function bootstrap()
    {
        // Set default controller
            $this->default_controller = 'Dashboard';
            $this->default_view       = 'Dashboard';

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
            if ( FileConfig::count_Catalogs() == 0) {
                throw new Exception("Please define at least one Bacula director connection");
            }
    }

    public function run()
    {
        $router  = new RouterController();
        $context = $router->getContext();

        $controller_class_name = null;
        $view_class_name       = null;

        try {

            $this->bootstrap();
        
            if ( !is_null($context) ) {
                $controller_class_name = ucfirst($context) . '_Controller';
                $view_class_name       = ucfirst($context) . '_View';
            } else {
                $controller_class_name = $this->default_controller . '_Controller';
                $view_class_name       = $this->default_view . '_View';
            }

            if( !class_exists($controller_class_name) )
                throw new Exception( "Controller class ($controller_class_name) do not exist" );

	    if( !class_exists($view_class_name) )
                throw new Exception( "View class ($view_class_name) do not exist" );
            
            // In case an exception is thrown ...
        } catch ( Exception $e) {
             $this->exception       = $e;
             $controller_class_name = 'Exception_Controller';
             $view_class_name       = 'Exception_View';
        }

        $controller = new $controller_class_name();
        $view       = new $view_class_name();

        // if no action defined in url
        if( !is_null($this->exception) )
           $view->index( $this->exception );
        else
           $view->index();

        $view->render();
    }

} // end of class
