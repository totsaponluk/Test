<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {
    public $template="fontend/template/main";
    public function action_index(){
        $sl=View::factory("fontend/index");
        $sl->news = ORM::factory("news")->order_by("create_at","desc")->limit(10)->find_all();
        $sl->advisorList = ORM::factory("advisor")->order_by("create_at","desc")->limit(4)->find_all();
        $this->template->sidebarLeft=$sl;
        $sr=View::factory("fontend/template/sidebar_right/home");
        //$sr->test=View::factory("fontend/index");
        $sr->businessType=ORM::factory("businesstype")->find_all();
        $sr->webcontent=ORM::factory("webcontent",1);
        $arr=ORM::factory("companie")->order_by("create_at","desc")->limit(1)->find_all();
        $sr->newCompany=$arr[0];
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
	}

} // End Welcome
