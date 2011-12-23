<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Advisorprofile extends Controller_Template {
    public $template="fontend/template/main";
    public function before(){
        parent::before();
        $this->template->sidebarLeft=View::factory("fontend/advisorprofile");
        $sr=View::factory("fontend/template/sidebar_right/all");
        $this->template->sidebarRight=$sr;
        //$this->template->sidebarLeft=View::factory("fontend/advisorprofile");
    }
    public function action_index(){
        $this->template->sidebarLeft=View::factory("fontend/advisorprofile");
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
    }
    public function action_advisor($id=NULL){
        if(!$id){
            Request::current()->redirect("advisorprofile");
        }
        $sl = View::factory("fontend/advisorprofile");
        $sl->advisor = ORM::factory("advisor")->where("id","=",$id)->find();
        $this->template->sidebarLeft=$sl;
    }
    public function action_send(){
        $this->template->sidebarLeft=View::factory("fontend/advisorprofile");
        
       $view=View::factory("fontend/template/mail/advisorprofile");
       $id=Arr::get($_POST,"id");
       $advisorOb = ORM::factory("advisor",$id);
       $view->advisor = $advisorOb;
       
       $view->name= Arr::get($_POST,"name");
       $view->company=Arr::get($_POST,"company");
       $view->email=Arr::get($_POST,"email");
       $view->objective=Arr::get($_POST,"objective");
       $view->question=Arr::get($_POST,"question");
       $view->questionDetail=Arr::get($_POST,"question_detail");
       $template=View::factory("fontend/template/mail/main");
       $template->container=$view;
        $mailTo = array("admin@thaibiznavi.com","thaibiznavi@gmail.com",$advisorOb->email);//email,other email
        $to = implode(", ", $mailTo);//admin@thaibiznavi.com,thaibiznavi@gmail.com
        

            // subject
            $subject = '=?UTF-8?B?'.base64_encode("タイビズナビ・アドバイザーへの相談メール").'?=';//=?UTF-8?B?'.base64_encode("タイビズナビ・アドバイザーへの相談メール").'?=

            // message
            $message =$view;

            // To send HTML mail, the Content-type header must be set
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

            // Additional headers
            //$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
            $headers .= 'From: thaibiznavi <thaibiznavi@gmail.com>' . "\r\n";
            //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
            //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

            // Mail it
            $send=@mail($to, $subject, $message, $headers);
            if(!$send){
                
                $this->template->sidebarLeft="fail!!";
            }else{
                $alert= "<script>\n";
                $alert.= "alert('送信完了しました。');\n";
                $alert.= "window.location = '".URL::site("advisorlist")."';\n";
                $alert.= "</script>";
                $this->template->sidebarLeft=$alert;
                //Request::current()->redirect("advisorlist");
            }
       
    }
 

} // End Welcome