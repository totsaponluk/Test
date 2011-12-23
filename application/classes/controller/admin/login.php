<?php
class Controller_Admin_Login extends Controller_Template{
	public $template="admin/login";//public $template = 'site';
	public function before() {
            parent::before();
            
        }
        public function action_index(){
            //$this->template->message = 'Please, Login';	
            //$this->template->message = 'Please, Login';
            if(Session::instance()->get("admin")){
                Request::current()->redirect("admin/home");
            }
                $form = View::factory("admin/form/login");
                $form->message = 'Please, Login';
                $this->template->form = $form;
	}
	public function action_login(){
		$this->template->message = 'hello, world!';
                $form = View::factory("admin/form/login");
                $this->template->form = $form;
		//$this->response->body(View::factory('admin/login'));
		//$this->template->message = 'hello, world!';
		//echo "loginnnn:";
		
	}
	public function action_verify(){
	//echo $username;	
            $form = View::factory("admin/form/login");
	$post = Validation::factory($_POST)
			->rule('username', 'not_empty')
			->rule('username', 'regex', array(':value', '/^[a-z_.]++$/iD'))
            //->rule('username', array($user, 'unique_username'))
 
            ->rule('password', 'not_empty')
            ->rule('password', 'min_length', array(':value', 4));
            //->rule('confirm',  'matches', array(':validation', ':field', 'password'));
	$form->message = 'hello, world!';
        
		if($post->check()){
                    $admin = ORM::factory("admin");
                    $admin->where("username","=",$post['username'])
                          ->and_where("password","=",$post['password'])->find();
                    if($admin->loaded()){
                        Session::instance()->set("admin", "totsapon");
                        $newUrl="admin/home";
                        Request::current()->redirect($newUrl);
			$form->message = 'Correct';
                    }else{
                        $form->message = 'Please, cannot find username or password!';
                    }
                    
		}else{
                    
			//echo "<p color='red'></p>";
			$form->message = 'Please, input corect username or password!';
			//$this->response->body(View::factory('admin/login'));
			
		}
              $this->template->form = $form;  
	
	}
        public function action_logout(){
            Session::instance()->delete("admin");
            Request::current()->redirect("admin");
            
        }
}
?>