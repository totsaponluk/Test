<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Purpose extends Controller {
    //public $template="fontend/template/main";
    public function action_index(){
        echo View::factory("fontend/purpose");
        //$this->template->sidebarLeft=View::factory("fontend/purpose");
        //$sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        //$this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
	}

} // End Welcome