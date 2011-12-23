<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contact extends Controller_Template {
    public $template="fontend/template/main";
    public function before() {
        parent::before();
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
    }
    public function action_index(){
        $this->template->sidebarLeft=View::factory("fontend/contact");
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
    }
    public function action_send(){
       $view=View::factory("fontend/template/mail/contact");
       //$emailAdvisor=Arr::get("id", "post");
       $view->detail= Arr::get($_POST,"detail");
       $view->email=Arr::get($_POST,"email");
      
        $mailTo = array("admin@thaibiznavi.com","thaibiznavi@gmail.com");//email,other email
        $to = implode(", ", $mailTo);//admin@thaibiznavi.com,thaibiznavi@gmail.com
        

            // subject
            $subject = '=?UTF-8?B?'.base64_encode("ご意見・改善提案メール").'?=';//=?UTF-8?B?'.base64_encode("ご意見・改善提案メール").'?=

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
                Request::current()->redirect("");
            }else{
                $alert= "<script>\n";
                $alert.= "alert('送信完了しました。');\n";
                $alert.= "window.location = '".URL::site("contact")."';\n";
                $alert.= "</script>";
                $this->template->sidebarLeft=$alert;
                //Request::current()->redirect("contact");
            }
       
    }

} // End Welcome