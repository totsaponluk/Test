<?php
class Controller_Admin_Company extends Controller_Template{
    public $template="admin/templates/blank";
    public function before() {
        parent::before();
        if(!Session::instance()->get("admin")){
            Request::current()->redirect("admin");
        }
    }
    public function action_index(){
        $orm=ORM::factory("companie");
        //$companies = ORM::factory("companie");      
        
        $view=View::factory("admin/company");
        //$view->companies=$companies->find_all();
        $view->fsort="";
        $view->list=$orm->order_by("update_at","desc")->find_all();
        $this->template->content=$view;
        $test=ORM::factory("businessType");
    }
    
    public function action_add(){
       // echo 'news add';
        $orm = ORM::factory("companie");
          $view = View::factory("admin/form/company");
          $view->company=$orm ;
          $this->template->content= $view;
    }
    public function action_operation($id=NULL){
       // echo 'cartoon';
        //if($id){
            //echo $id;
            $orm = ORM::factory("companie",$id);
            
            $view = View::factory("admin/form/company");
            
            $view->company=$orm;
           // print_r($orm);
            $this->template->content=$view;
        //}
        //$this->template->content="cartoon";
    }
    public function action_save(){
        /*Upload*/
        //print_r( Arr::get($_FILES,"picture") );
         $com = ORM::factory("companie",Arr::get($_POST,"id"));
        $array = Validation::factory($_FILES);
        $array->rule("logo", 'Upload::not_empty')
              ->rule('logo', 'Upload::type', array(':value', array('jpg', 'png', 'gif')));//array(':value', array('jpg', 'png', 'gif'))
        $pic1 = Validation::factory($_FILES);
        $pic1->rule("pic1", 'Upload::not_empty')
              ->rule('pic1', 'Upload::type', array(':value', array('jpg', 'png', 'gif')));
        $pic2 = Validation::factory($_FILES);
        $pic2->rule("pic2", 'Upload::not_empty')
              ->rule('pic2', 'Upload::type', array(':value', array('jpg', 'png', 'gif')));
        if ($pic1->check()){
            $fileName = basename(Upload::save($pic1['pic1'],uniqid(),"upload/company"));
            //print $fileName;
            $com->pic1=$fileName;
        }
        if ($pic2->check()){
            $fileName = basename(Upload::save($pic2['pic2'],uniqid(),"upload/company"));
            //print $fileName;
            $com->pic2=$fileName;
        }
        if ($array->check()){
            $fileName = basename(Upload::save($array['logo'],uniqid(),"upload/company"));
            //print $fileName;
            $com->logo=$fileName;
        }else{
            //Request::current()->redirect("admin/company/operation");
        }
        /*end Upload*/
        
        //$com->logo=Arr::get($_POST,"logo");
        $com->name=Arr::get($_POST,"company_name");
        $com->business_types_id=Arr::get($_POST,"business_type");
        $com->director_name=Arr::get($_POST,"director_name");
        $com->capital=Arr::get($_POST,"capital");
        $es_y = Arr::get($_POST, "es_y");
        $es_m = Arr::get($_POST, "es_m");
        $com->establish=$es_y."-".$es_m;
        $com->address=Arr::get($_POST,"address");
        $com->seals_point=Arr::get($_POST,"seals_point");
        $com->business_detail=Arr::get($_POST,"business_detail");
        $com->email=Arr::get($_POST,"email");/**/
        $com->msg=Arr::get($_POST,"msg");
        //$timestamp_now = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
        //$date_now = $year.'-'.date('m-d H:i:s',$timestamp_now);
        $format = 'Y-m-d H:i:s';

        $date_now=date($format, time());
        $com->update_at=$date_now;
        if(!Arr::get($_POST,"id")){
            $com->create_at=$date_now;
        }
        $com->save();
       
        //echo URL::site("admin/advisor");
        $orm = ORM::factory("companie");
          $view = View::factory("admin/company");
          $view->list=$orm->find_all();
          $this->template->content= $view;
          Request::current()->redirect("admin/company");
    }
    public function action_delete($id=NULL){
        $com = ORM::factory("companie",$id);
        $com->delete();
        $orm = ORM::factory("companie");
        $view = View::factory("admin/company");
        $view->fsort="";
        $view->list=$orm->find_all();
        $this->template->content= $view;
    }
     public function action_sort($sort=NULL,$fsort=NULL){
        switch($sort){
            case "name" :"";break;
            case "director_name":"";break;
            case "email":"";break;
            default :$sort="update_at";
        }
        if($fsort == "asc" or $fsort == "desc"){
            //$fsort="desc";
        }else{
            $fsort="desc";
        }
        $orm = ORM::factory("companie");
        $view=View::factory("admin/company");
        $view->list=$orm->order_by($sort,$fsort)->find_all();
        if($fsort=="desc"){
            $fsort="asc";
        }elseif($fsort=="asc"){
            $fsort="desc";
        }else{
            $fsort="";
        }
        $view->fsort=$fsort;
        $this->template->content=$view;
    }
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
