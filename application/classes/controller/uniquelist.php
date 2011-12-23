<?php defined('SYSPATH') or die('No direct script access.');

class Controller_uniquelist extends Controller_Template {
    public $template="fontend/template/main";
    public function action_index(){
        $this->template->sidebarLeft=View::factory("fontend/uniquelist");
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
	}

} // End Welcome