<?php

class Controller_Admin_Category extends Controller {

    //public $template = "admin/templates/blank";
    public function before() {
        parent::before();
        if(!Session::instance()->get("admin")){
            Request::current()->redirect("admin");
        }
    }
    public function action_index() {
        //echo 'ad';
        /* switch($sort){
          case "name" :"";break;
          case "affliation":"";break;
          case "category":"";break;
          case "email":"";break;
          default :$sort="update_at";
          }
          if($fsort != "asc" or $fsort != "desc"){
          $fsort="desc";
          } */
        $orm = ORM::factory("categorie");
        $view = View::factory("admin/ajax/category");
        
        $view->categories = $orm->find_all();
        $view->selectedId = Arr::get($_POST,"selected_id");
        //echo json_encode($orm->get_entries());
        echo $view;
        //$this->template->content="";
        //$this->template->content = $view;
    }

    public function action_sort($sort=NULL, $fsort=NULL) {
        switch ($sort) {
            case "name" :"";
                break;
            case "affliation":"";
                break;
            case "category":"";
                break;
            case "email":"";
                break;
            default :$sort = "update_at";
        }
        if ($fsort == "asc" or $fsort == "desc") {
            //$fsort="desc";
        } else {
            $fsort = "desc";
        }
        $orm = ORM::factory("ad");
        $advsV = View::factory("admin/ad");
        $advsV->list = $orm->order_by($sort, $fsort)->find_all();
        if ($fsort == "desc") {
            $fsort = "asc";
        } elseif ($fsort == "asc") {
            $fsort = "desc";
        } else {
            $fsort = "";
        }
        $advsV->fsort = $fsort;
        $this->template->content = $advsV;
    }

    public function action_add() {
        // echo 'news add';
        $orm = ORM::factory("ad");
        $view = View::factory("admin/form/ad");
        
        $data['result']=true;
        //$view->ad = $orm;
        //$this->template->content = $view;
    }

    public function action_operation($id=NULL) {
        // echo 'cartoon';
        //if($id){
        //echo $id;
        $orm = ORM::factory("ad", $id);

        $view = View::factory("admin/form/ad");

        $view->ad = $orm;
        // print_r($orm);
        $this->template->content = $view;
        //}
        //$this->template->content="cartoon";
    }

    public function action_save() {
        /* Upload */
        sleep(3);
        //print_r( Arr::get($_FILES,"picture") );
        $cate = ORM::factory("categorie", Arr::get($_POST, "id"));
                
        /* end Upload */
        $checkName = ORM::factory("categorie")->where("name","=",Arr::get($_POST, "name"))->find();

        $cate->name = Arr::get($_POST, "name");
        
        //$timestamp_now = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
        //$date_now = $year.'-'.date('m-d H:i:s',$timestamp_now);
        $format = 'Y-m-d H:i:s';

        /* $date_now=date($format, time());
          $ad->update_at=$date_now;
          if(!Arr::get($_POST,"id")){
          $ad->create_at=$date_now;
          } */
        
        if($checkName->loaded()){
            
            $data['result']=false;
        }else{
            $cate->save();
            $data['result']=true;
        }
        echo json_encode($data);
        //echo URL::site("admin/ad");
        
    }

    public function action_delete($id=NULL) {
        $ad = ORM::factory("ad", $id);
        $ad->delete();
        /* $orm = ORM::factory("ad");
          $view = View::factory("admin/ad");
          $view->fsort="";
          $view->list=$orm->find_all();
          $this->template->content= $view; */
        Request::current()->redirect("admin/ad");
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>