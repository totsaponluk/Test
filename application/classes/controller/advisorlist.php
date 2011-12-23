<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Advisorlist extends Controller_Template {
    public $template="fontend/template/main";
    public function action_index(){
        $sl=View::factory("fontend/advisorlist");
        $sl->advisors = ORM::factory("advisor")->order_by("categories_id","desc")->find_all();
        $this->template->sidebarLeft=$sl;
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
    }
    public function action_list($id=NULL){
        $sl = View::factory("fontend/companylist");
        //$sl->businessType = ORM::factory("businesstype")->find_all();
        $sl->businessType = ORM::factory("businesstype")->find_all();
        if($id){
            $sl->companies = ORM::factory("companie")->where("business_types_id","=",$id)->find_all();
        }else{
            $sl->companies = ORM::factory("companie")->find_all();
        }
        
        $this->template->sidebarLeft=$sl;
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        
        $this->template->sidebarRight=$sr;
    }

} // End Welcome