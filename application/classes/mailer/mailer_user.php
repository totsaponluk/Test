<?php defined('SYSPATH') or die('No direct script access.');
class Mailer_User extends Mailer {

		public function before()
		{
			// To set the config by environment
			$this->config		= Kohana::$environment;
		}

		public function welcome($args) 
		{
			$this->to 			= array('totsaponk@gmail.com' => 'Luk');
			$this->bcc			= array('admin@theweapp.com' => 'Admin');
			$this->from 		= array('theteam@theweapp.com' => 'The Team');
			$this->subject		= 'Welcome!';
			$this->attachments	= array('/path/to/file/file.txt', '/path/to/file/file2.txt');
			$this->data 		= $args;
		}

	}
