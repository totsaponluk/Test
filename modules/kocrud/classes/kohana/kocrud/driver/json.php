<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Kocrud_Driver_Json {

	public function __construct($data = NULL, $model = NULL)
	{
		echo json_encode($data);
	}

}
