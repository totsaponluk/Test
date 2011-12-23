<?php
class Controller_Admin_Webcontent extends Controller_Template{
    public $template="admin/templates/blank";
    public function before() {
        parent::before();
        if(!Session::instance()->get("admin")){
            Request::current()->redirect("admin");
        }
    }
    public function action_index(){
       // echo 'news';
        $orm = ORM::factory("webcontent",1);
        //print_r($orm);
          $view = View::factory("admin/form/webcontent");
          $view->webcontent = $orm;
          $this->template->content= $view;
        //$this->template->content=View::factory("admin/form/webcontent");
        // $this->template->content=View::factory("admin/webcontent");
    }
    public function action_add(){
       // echo 'news add';
          $this->template->content=View::factory("admin/form/webcontent");
    }
    public function action_operation(){
       // echo 'cartoon';
        $this->template->content="cartoon";
    }
    public function action_save(){
        $com = ORM::factory("webcontent",Arr::get($_POST,"id"));
        $com->title=Arr::get($_POST,"title");
        $com->content=Arr::get($_POST,"content");
        $format = 'Y-m-d H:i:s';

        $date_now=date($format, time());
        $com->update_at=$date_now;
        if(!Arr::get($_POST,"id")){
            $com->create_at=$date_now;
        }
        $com->save();
       
        //echo URL::site("admin/advisor");
        $orm = ORM::factory("webcontent");
          $view = View::factory("admin/webcontent");
          $view->list=$orm->find_all();
          $this->template->content= $view;
          Request::current()->redirect("admin/webcontent");
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
