<?php

/*
  +-------------------------------------------------------------------------+
  | Copyright 2010-2014, Davide Franco			                          |
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

class View extends Smarty {
    private $language;
    private $charset;
    private $domaine;   

    public function __construct() {
    }

    protected function init() {
        global $bwapp;

        $this->compile_check = true;
        $this->debugging = false;
        $this->force_compile = true;

        $this->template_dir = TEMPLATES_DIR;
        $this->compile_dir  = VIEW_CACHE_DIR;

        // Setting up language translation
        $this->register_block('t', 'smarty_translate');
        $this->language = FileConfig::get_Value( 'language');
        $this->charset  = 'UTF-8';

        putenv("LANGUAGE=" . $this->language . '.' . $this->charset);
        putenv("LANG=" . $this->language . '.' . $this->charset);
        setlocale(LC_ALL, $this->language . '.' . $this->charset);

        bindtextdomain('messages', LOCALE_DIR);
        bind_textdomain_codeset('messages', $this->charset);
        textdomain($this->domaine);
    }

    public function render($view = 'index.tpl') {
        $this->display($view);
    }
}
?>
