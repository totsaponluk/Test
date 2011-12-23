<?php
class Controller_Admin_News extends Controller_Template{
    public $template="admin/templates/blank";
    public function before() {
        parent::before();
        if(!Session::instance()->get("admin")){
            Request::current()->redirect("admin");
        }
    }
    public function action_index(){
        $orm=ORM::factory("news");
        $view=View::factory("admin/news");
        $view->fsort="";
        $view->list=$orm->order_by("update_at","desc")->find_all();
        $this->template->content=$view;
    }
    public function action_add(){
        $orm = ORM::factory("news");
          $view = View::factory("admin/form/news");
          $view->news=$orm ;
          $this->template->content= $view;
    }
     public function action_operation($id=NULL){
            $orm = ORM::factory("news",$id);
            $view = View::factory("admin/form/news");
            $view->news=$orm;
            $this->template->content=$view;
    }
    public function action_save(){
        $com = ORM::factory("news",Arr::get($_POST,"id"));
        $com->title=Arr::get($_POST,"title");
        $com->content=Arr::get($_POST,"content");
        /*$com->business_types_id=Arr::get($_POST,"business_type");
        $com->director_name=Arr::get($_POST,"director_name");
        $com->capital=Arr::get($_POST,"capital");
        $com->establish=Arr::get($_POST,"establish");
        $com->address=Arr::get($_POST,"address");
        $com->seals_point=Arr::get($_POST,"seals_point");
        $com->business_detail=Arr::get($_POST,"business_detail");
        $com->email=Arr::get($_POST,"email");*/
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
        $orm = ORM::factory("news");
          $view = View::factory("admin/news");
          $view->list=$orm->find_all();
          $this->template->content= $view;
          Request::current()->redirect("admin/news");
    }
    public function action_delete($id=NULL){
        $news = ORM::factory("news",$id);
        $news->delete();
        $orm = ORM::factory("news");
        $view = View::factory("admin/news");
        $view->fsort="";
        $view->list=$orm->find_all();
        $this->template->content= $view;
    }
     public function action_sort($sort=NULL,$fsort=NULL){
        switch($sort){
            case "date" :$sort="create_at";break;
            case "title":"";break;
            case "content":"";break;
            default :$sort="update_at";
        }
        if($fsort == "asc" or $fsort == "desc"){
            //$fsort="desc";
        }else{
            $fsort="desc";
        }
        $orm = ORM::factory("news");
        $view=View::factory("admin/news");
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
