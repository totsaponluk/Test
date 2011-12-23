<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Kohana API for ORM models
 *
 * @package    Kocrud
 * @category   Controllers
 * @author     Birkir R Gudjonsson (birkir.gudjonsson@gmail.com)
 */
class Controller_Kocrud extends Controller {

	/**
	 * The API Documentation
	 *
	 * @return  void
	 */
	public function action_index()
	{
		$ret = array();

		$models = self::list_models();

		foreach ($models as $model)
		{
			$model = str_replace('/', '_', $model);

			$class_name = self::format_model($model);
			
			if (class_exists($class_name) AND in_array('ORM', class_parents($class_name)))
			{
				$orm = ORM::factory($model);

				$ret[$model] = array
				(
					'columns' => $orm->list_columns()
				);

				if (in_array('CRUD', class_parents($class_name)))
				{
					$ret[$model]['primary_key'] = $orm->primary_key();
					$ret[$model]['primary_val'] = $orm->primary_val();
					$ret[$model]['rules'] = $orm->rules();
					$ret[$model]['has_many'] = $orm->has_many();
					$ret[$model]['has_one'] = $orm->has_one();
					$ret[$model]['belongs_to'] = $orm->belongs_to();
				}
			}
		}
		
		$template = new View('kocrud/api');
		$template->models = $ret;
		
		$this->request->response = $template;
	}

	/**
	 * The API page and handler
	 *
	 * @param   string  Parameters to handle
	 * @return  void
	 */
	public function action_api()
	{
		// Explode parameters string
		$params = explode('/', $this->request->param('params'));

		// Display index page if no params are captured
		if (empty($params[0]))
		{
			return self::action_index();
		}

		// Check type of HTTP method
		$method = $_SERVER['REQUEST_METHOD'];

		// Create instance of Kocrud class with given method
		$crud = Kocrud::factory($method);

		// Process parameters
		$crud->process($params);
	}
	
	private function list_models($dir = NULL)
	{
		$files = Kohana::list_files('classes/model'.$dir);

		$ret = array();

		foreach ($files as $file => $path)
		{
			$file = str_replace(array('.php', 'classes/model/'), NULL, $file);

			if ($file != 'kocrud')
			{
				$ret[] = $file;
				if (is_array($path))
				{
					$dir = explode('/', $file);
					$sub = self::list_models('/'.$dir[0]);
					foreach ($sub as $item)
					{
						$ret[] = $item;
					}
				}
			}
		}

		return $ret;
	}
	
	private function format_model($model = NULL)
	{
		$parts = explode('/', $model);

		foreach ($parts as $i => $part)
		{
			$parts[$i] = ucfirst($part);
		}

		return 'Model_'.implode('_', $parts);
	}

} // End Kocrud
