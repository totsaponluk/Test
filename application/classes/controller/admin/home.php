<?php
class Controller_Admin_Home extends Controller_Template{
    public $template="admin/templates/blank";
    public function before() {
        parent::before();
        if(!Session::instance()->get("admin")){
            Request::current()->redirect("admin");
        }
    }
    public function action_index(){
        
       $this->template->content="";
       
       //echo "index action home";
    }
    public function action_home(){
        echo "inHome";
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

