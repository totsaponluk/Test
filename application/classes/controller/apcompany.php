<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Apcompany extends Controller_Template {
    public $template="fontend/template/main";
    public function before(){
        parent::before();
        $this->template->sidebarLeft=View::factory("fontend/apcompany");
        $sr=View::factory("fontend/template/sidebar_right/all");
        $this->template->sidebarRight=$sr;
        //$this->template->sidebarLeft=View::factory("fontend/advisorprofile");
    }
    public function action_index(){
        $this->template->sidebarLeft=View::factory("fontend/apcompany");
        $sr=View::factory("fontend/template/sidebar_right/all");
        //$sr->test=View::factory("fontend/index");
        $this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
    }
    public function action_send(){
       $view=View::factory("fontend/template/mail/apcompany");
       $view->company=Arr::get($_POST,"company");
       $view->name= Arr::get($_POST,"name");
       $view->subject= Arr::get($_POST,"subject");
       $view->address=Arr::get($_POST,"address");
       $view->tel=Arr::get($_POST,"tel");
       $view->fax= Arr::get($_POST,"fax");
       $view->email=Arr::get($_POST,"email");
       $view->esY=Arr::get($_POST,"es_y");
       $view->esM=Arr::get($_POST,"es_m");
       $view->esD=Arr::get($_POST,"es_d");
       $view->capital=Arr::get($_POST,"capital");
       $view->directorName=Arr::get($_POST,"director_name");
       $view->businessType=Arr::get($_POST,"business_type");
       $view->business=Arr::get($_POST,"business");
        $view->salesPoint=Arr::get($_POST,"sales_point");
        $mailTo = array("admin@thaibiznavi.com","thaibiznavi@gmail.com");//email,other email
        $to = implode(", ", $mailTo);//admin@thaibiznavi.com,thaibiznavi@gmail.com
        

            // subject
            $subject = '=?UTF-8?B?'.base64_encode("企業リスト登録申請").'?=';//=?UTF-8?B?'.base64_encode("企業リスト登録申請").'?=

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
                $this->template->sidebarLeft="fail";
            }else{
                $alert= "<script>\n";
                $alert.= "alert('送信完了しました。');\n";
                $alert.= "window.location = '".URL::site("apcompany")."';\n";
                $alert.= "</script>";
                $this->template->sidebarLeft=$alert;
                //Request::current()->redirect("apcompany");
            }
       
    }

} // End Welcome