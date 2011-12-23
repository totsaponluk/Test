<?php
class Controller_Admin_Advisor extends Controller_Template{
    public $template="admin/templates/blank";
    public function before() {
        parent::before();
        if(!Session::instance()->get("admin")){
            Request::current()->redirect("admin");
        }
    }
    public function action_index(){
        //echo 'advisor';
        /*switch($sort){
            case "name" :"";break;
            case "affliation":"";break;
            case "category":"";break;
            case "email":"";break;
            default :$sort="update_at";
        }
        if($fsort != "asc" or $fsort != "desc"){
            $fsort="desc";
        }*/
        $orm = ORM::factory("advisor");
        $advsV=View::factory("admin/advisor");
        $advsV->fsort="";
        $advsV->list=$orm->order_by("update_at","desc")->find_all();
        $this->template->content=$advsV;
    }
    public function action_sort($sort=NULL,$fsort=NULL){
        switch($sort){
            case "name" :"";break;
            case "affliation":"";break;
            case "category":"";break;
            case "email":"";break;
            default :$sort="update_at";
        }
        if($fsort == "asc" or $fsort == "desc"){
            //$fsort="desc";
        }else{
            $fsort="desc";
        }
        $orm = ORM::factory("advisor");
        $advsV=View::factory("admin/advisor");
        $advsV->list=$orm->order_by($sort,$fsort)->find_all();
        if($fsort=="desc"){
            $fsort="asc";
        }elseif($fsort=="asc"){
            $fsort="desc";
        }else{
            $fsort="";
        }
        $advsV->fsort=$fsort;
        $this->template->content=$advsV;
    }
    public function action_add(){
       // echo 'news add';
        $orm = ORM::factory("advisor");
          $view = View::factory("admin/form/advisor");
          $view->advisor=$orm ;
          $this->template->content= $view;
    }
    public function action_operation($id=NULL){
       // echo 'cartoon';
        //if($id){
            //echo $id;
            $orm = ORM::factory("advisor",$id);
            
            $view = View::factory("admin/form/advisor");
            
            $view->advisor=$orm;
           // print_r($orm);
            $this->template->content=$view;
        //}
        //$this->template->content="cartoon";
    }
    public function action_save(){
        /*Upload*/
        //print_r( Arr::get($_FILES,"picture") );
         $advisor = ORM::factory("advisor",Arr::get($_POST,"id"));
        $array = Validation::factory($_FILES);
        $array->rule("picture", 'Upload::not_empty')
              ->rule('picture', 'Upload::type', array(':value', array('jpg', 'png', 'gif')));//array(':value', array('jpg', 'png', 'gif'))
        
        if ($array->check()){
            $fileName = basename(Upload::save($array['picture'],uniqid(),"upload/advisor"));
            //print $fileName;
            $advisor->picture=$fileName;
        }else{
            //Request::current()->redirect("admin/advisor/operation");
        }
        /*end Upload*/
       
        
        $advisor->name=Arr::get($_POST,"name");
        $advisor->categories_id=Arr::get($_POST,"category");
        //Arr::get($_POST,"category");
        $advisor->career=Arr::get($_POST,"career");
        $advisor->affliation=Arr::get($_POST,"affliation");
        $advisor->pr=Arr::get($_POST,"pr");
        $advisor->introduce=Arr::get($_POST,"introduce");
        $advisor->email=Arr::get($_POST,"email");
        //$timestamp_now = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
        //$date_now = $year.'-'.date('m-d H:i:s',$timestamp_now);
        $format = 'Y-m-d H:i:s';

        $date_now=date($format, time());
        $advisor->update_at=$date_now;
        if(!Arr::get($_POST,"id")){
            $advisor->create_at=$date_now;
        }
        $advisor->save();
       
        //echo URL::site("admin/advisor");
        $orm = ORM::factory("advisor");
          $view = View::factory("admin/advisor");
          $view->list=$orm->find_all();
          $this->template->content= $view;
          Request::current()->redirect("admin/advisor");
    }
    public function action_delete($id=NULL){
        $advisor = ORM::factory("advisor",$id);
        $advisor->delete();
        /*$orm = ORM::factory("advisor");
        $view = View::factory("admin/advisor");
        $view->fsort="";
        $view->list=$orm->find_all();
        $this->template->content= $view;*/
        Request::current()->redirect("admin/advisor");
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
