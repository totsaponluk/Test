<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Test extends Controller_Template {
    public $template="fontend/template/main";
    public function before() {
        parent::before();
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
        $this->template->sidebarLeft=View::factory("fontend/test");
    }
    public function action_index(){
        $this->template->sidebarLeft=View::factory("fontend/test");
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
    }
    public function action_send(){
       $view=View::factory("fontend/template/mail/test");
       //$emailAdvisor=Arr::get("id", "post");
       $view->detail= Arr::get($_POST,"detail");
       $view->email=Arr::get($_POST,"email");
      
        $mailTo = array("totsaponk@gmail.com","mag.mako@gmail.com");//email,other email
        $to = implode(", ", $mailTo);//admin@thaibiznavi.com,thaibiznavi@gmail.com
        

            // subject
            $subject = '=?UTF-8?B?'.base64_encode("ご意見・改善提案メール").'?=';

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
                //Request::current()->redirect("");
            }else{
                $alert= "<script>\n";
                $alert.= "alert('finished');\n";
                $alert.= "window.location = '".URL::site("test")."';\n";
                $alert.= "</script>";
                $this->template->sidebarLeft=$alert;
                //Request::current()->redirect("test");
            }
       
    }

} // End Welcome