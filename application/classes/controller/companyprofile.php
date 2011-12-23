<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Companyprofile extends Controller_Template {
    public $template="fontend/template/main";
    public function before(){
        parent::before();
        $this->template->sidebarLeft=View::factory("fontend/companyprofile");
        $sr=View::factory("fontend/template/sidebar_right/all");
        
        $this->template->sidebarRight=$sr;
    }
    public function action_index(){
        
        $this->template->sidebarLeft="Error page";
        //$sr->test=View::factory("fontend/index");
        //$this->template->sidebarRight=$sr;
            
		//$this->response->body('hello, world!');
    }
    public function action_company($id=NULL){
        //$this->action_index();
        if(!$id){
            Request::current()->redirect("companyprofile");
        }
        $sl = View::factory("fontend/companyprofile");
        $sr=View::factory("fontend/template/sidebar_right/all");
        $orm = ORM::factory("companie")->where("id","=",$id)->find();
        $sl->company = $orm;
        $sl->pic1 = $orm->pic1;
        $sl->pic2 = $orm->pic2;
        $this->template->sidebarRight=$sr;
        $this->template->sidebarLeft=$sl;
        
    }
    public function action_send(){
       $view=View::factory("fontend/template/mail/companyprofile");
       $id=Arr::get($_POST,"id");
       //echo "id:".$id;
       $companyOb =  ORM::factory("companie",$id);
       $view->companyOb = $companyOb;
       $view->name= Arr::get($_POST,"name");
       $view->company=Arr::get($_POST,"company");
       $view->email=Arr::get($_POST,"email");
       $view->tel=Arr::get($_POST,"tel");
       $view->address=Arr::get($_POST,"address");
       if(Arr::get($_POST,"contact")==1){
           $view->contact="見積り依頼";
       }else{
           $view->contact="問い合わせ";
       }
       //$view->contact=Arr::get($_POST,"contact");
       $view->detail=Arr::get($_POST,"detail");
       $view->capital=Arr::get($_POST,"capital");
       $view->date=Arr::get($_POST,"date");
        $mailTo = array("admin@thaibiznavi.com","thaibiznavi@gmail.com",$companyOb->email);//email,other email
        $to = implode(", ", $mailTo);//admin@thaibiznavi.com,thaibiznavi@gmail.com
        

            // subject
            $subject = '=?UTF-8?B?'.base64_encode("タイビズナビ・会社へお問い合わせ").'?=';//=?UTF-8?B?'.base64_encode("タイビズナビ・会社へお問い合わせ").'?=

            // message
            $message =$view;

            // To send HTML mail, the Content-type header must be set
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

            // Additional headers
            //$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
            $headers .= 'From: thaibiznavi <admin@thaibiznavi.com>' . "\r\n";
            //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
            //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

            // Mail it
            $send=@mail($to, $subject, $message, $headers);
            if(!$send){
                Request::current()->redirect("");
            }else{
                $alert= "<script>\n";
                $alert.= "alert('送信完了しました。');\n";
                $alert.= "window.location = '".URL::site("companylist")."';\n";
                $alert.= "</script>";
                $this->template->sidebarLeft=$alert;
            }
            
            //Request::current()->redirect("companylist");
            //$this->template->sidebarLeft="finish";
       
    }

} // End Welcome