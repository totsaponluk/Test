<?php
class Controller_User extends Controller {
 
    public function action_register()
    {
        $user = Model::factory('user');
 
        $post = Validation::factory($_POST)
            ->rule('username', 'not_empty')
            ->rule('username', 'regex', array(':value', '/^[a-z_.]++$/iD'))
            ->rule('username', array($user, 'unique_username'))
 
            ->rule('password', 'not_empty')
            ->rule('password', 'min_length', array(':value', 6))
            ->rule('confirm',  'matches', array(':validation', ':field', 'password'))
 
            ->rule('use_ssl', 'not_empty')
            ->rule('use_ssl', 'in_array', array(':value', array('yes', 'no')));
 
        if ($post->check())
        {
            // Data has been validated, register the user
            $user->register($post);
 
            // Always redirect after a successful POST to prevent refresh warnings
            $this->request->redirect('user/profile');
        }
 
        // Validation failed, collect the errors
        $errors = $post->errors('user');
 
        // Display the registration form
        $this->response->body(View::factory('user/register'))
            ->bind('post', $post)
            ->bind('errors', $errors);
    }
 
}
?>