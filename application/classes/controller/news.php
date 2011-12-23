<?php defined('SYSPATH') or die('No direct script access.');

class Controller_News extends Controller_Template {
    public $template="fontend/template/main";
    public function before(){
        parent::before();
        $this->template->sidebarLeft=View::factory("fontend/news");
        $sr=View::factory("fontend/template/sidebar_right/all");
        $this->template->sidebarRight=$sr;
    }
    public function action_index(){
        $this->template->sidebarLeft=View::factory("fontend/news");
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
    }
    public function action_list($id=NULL){
        if(!$id){
            Request::current()->redirect("news");
        }
        $sl = View::factory("fontend/news");
        $sl->news = ORM::factory("news")->where("id","=",$id)->find();
        $this->template->sidebarLeft=$sl;
    }
   
 

} // End Welcome