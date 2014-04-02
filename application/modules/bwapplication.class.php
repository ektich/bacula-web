<?php

class BwApplication extends Application
{
    public $catalog_current_id;
    private $user_config         = CONFIG_FILE;

    public function bootstrap()
    {
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

            // Get current catalog id
            if ( !is_null(CHttpRequest::get_Value('catalog_id') ) ) {
               $this->catalog_current_id = CHttpRequest::get_Value('catalog_id');
               $_SESSION['catalog_id'] = $this->catalog_current_id;
            }elseif( isset( $_SESSION['catalog_id'] ) )
               $this->catalog_current_id = $_SESSION['catalog_id'];
            else {
               $this->catalog_current_id = 0;
               $_SESSION['catalog_id'] = $this->catalog_current_id;
            }
    }

    public function run()
    {
        try {
            $router       	= new RouterController('Dashboard');
            $context      	= $router->getContext();

            $controller_class   = $router->getController();
            $view_class         = $router->getView();
            $model_class  	= $router->getModel();

            $this->bootstrap();

            // Bacula catalog selection
            $catalog_nb = FileConfig::count_Catalogs();

            // Create new instance of Controller, Model and View classes
            $this->controller = new $controller_class();
            $this->model      = new $model_class();
            $this->view       = new $view_class( $this->model );

            // Bacula catalog selection
            $catalog_nb = FileConfig::count_Catalogs();

            if ($catalog_nb > 1) {
                // Catalogs list
                $this->view->assign('catalogs', FileConfig::get_Catalogs() );
                // Catalogs count
                $this->view->assign('catalog_nb', $catalog_nb );
            }

            $this->view->index($this->model);
            $this->view->render();

        }catch ( Exception $e) {
             $this->exception   = $e;
             $this->view = new Exception_Controller();	
             $this->model = new Exception_Model();
             $this->view = new Exception_View( $this->model );	
             $this->view->index( $this->exception);
             $this->view->render();
        }
    }
} // end of class
