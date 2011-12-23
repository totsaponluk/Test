<?php

class Controller_Admin_Ad extends Controller_Template {

    public $template = "admin/templates/blank";
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
        $orm = ORM::factory("ad");
        $view = View::factory("admin/ad");
        $view->fsort = "";
        $view->list = $orm->find_all();
        //$this->template->content="";
        $this->template->content = $view;
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
        $view->ad = $orm;
        $this->template->content = $view;
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
        //print_r( Arr::get($_FILES,"picture") );
        $ad = ORM::factory("ad", Arr::get($_POST, "id"));
        $array = Validation::factory($_FILES);
        $array->rule("picture", 'Upload::not_empty')
                ->rule('picture', 'Upload::type', array(':value', array('jpg', 'png', 'gif'))); //array(':value', array('jpg', 'png', 'gif'))

        if ($array->check()) {
            $fileName = basename(Upload::save($array['picture'],uniqid().".jpg", "upload/ad")); //
            //print $fileName;
            $ad->picture = $fileName;
        } else {
            //Request::current()->redirect("admin/ad/operation");
        }
        /* end Upload */


        $ad->title = Arr::get($_POST, "title");
        $ad->link = Arr::get($_POST, "link");
        $ad->status = Arr::get($_POST, "status");
        $ad->width = Arr::get($_POST,"width");
        $ad->height = Arr::get($_POST,"height");
        //$timestamp_now = mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
        //$date_now = $year.'-'.date('m-d H:i:s',$timestamp_now);
        $format = 'Y-m-d H:i:s';

        /* $date_now=date($format, time());
          $ad->update_at=$date_now;
          if(!Arr::get($_POST,"id")){
          $ad->create_at=$date_now;
          } */
        $ad->save();

        //echo URL::site("admin/ad");
        $orm = ORM::factory("ad");
        $view = View::factory("admin/ad");
        $view->list = $orm->find_all();
        $this->template->content = $view;
        Request::current()->redirect("admin/ad");
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

