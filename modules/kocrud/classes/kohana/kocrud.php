<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Kocrud API handler
 *
 * @package    Kocrud
 * @author     Birkir R Gudjonsson (birkir.gudjonsson@gmail.com)
 * @copyright  (c) 2010 Birkir R Gudjonsson
 * @license    http://kohanaphp.com/license
 */
class Kohana_Kocrud {

	private $method = NULL;
	private $orm = NULL;
	private $columns = NULL;
	private $model = NULL;
	private $driver = 'json';

	public static function factory($method = NULL)
	{
		return new Kocrud($method);
	}

	public function __construct($method = NULL)
	{
		// Set method type
		$this->method = $method;
	}

	/**
	 * Process the parameters
	 *
	 * @param   array   Parameters in array
	 * @return  void
	 */
	public function process($param = array())
	{
		// Get driver
		$_last_param = $param[count($param)-1];
		$driver = self::_find_extension($_last_param);
		if ($driver != $_last_param)
		{
			$this->driver = $driver;
			$param[count($param)-1] = str_replace('.'.$driver, NULL, $_last_param);
		}

		// Authentication
		if (Kohana::config('kocrud.use_api_keys'))
		{
			self::authenticate();
		}

		// Set model name as singular
		$param[0] = Inflector::singular($param[0]);

		// Check if model requested does exist
		if ( ! Kohana::find_file('classes/model', $param[0]))
		{
			self::_error(400, 'invalid', 'This model was not found', 'model');
		}

		// Init the ORM model
		$this->orm = ORM::factory($param[0], isset($param[1]) ? $param[1] : NULL);

		// Get all columns we need for output
		$this->columns = array_keys($this->orm->list_columns());

		// Set model
		$this->model = Inflector::plural($param[0]);

		// Handle methods
		if ($this->method == 'GET')
		{
			$data = ! empty($param[1]) ? self::_get_one($param) : self::_get_many();
		}
		elseif ($this->method == 'POST')
		{
			$data = self::_post_one();
		}
		elseif ($this->method == 'PUT')
		{
			$data = self::_put_one($param[1]);
		}
		elseif ($this->method == 'DELETE')
		{
			$data = self::_delete_one($param[1]);
		}

		// Init the driver and let it do all the work
		$driver = Kocrud_Driver::factory($this->driver, $data, $this->model);
	}

	/**
	 * Authenticate with API key, check for ip and check the quota.
	 *
	 * @return   boolean   Successful or not
	 */
	private function authenticate()
	{
		if (empty($_REQUEST['__apikey']))
		{
			self::_error(400, 'required', 'API key is required', '__apikey');
		}

		$apikey = pack('H*', $_REQUEST['__apikey']);

		$kocrud = ORM::factory('kocrud', array('api_key' => $apikey));

		if ( ! $kocrud->loaded())
		{
			self::_error(400, 'invalid', 'This API key was not found', '__apikey');
		}

		$ip = inet_pton(empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['REMOTE_ADDR'] : $_SERVER['HTTP_X_FORWARDED_FOR']);

		if ($ip != $kocrud->ip)
		{
			self::_error(400, 'invalid', 'This IP address is not allowed for specified API key', NULL);
		}

		if ($kocrud->quota_count >= $kocrud->quota_limit)
		{
			if (time() > (strtotime($kocrud->quota_datetime)+3600))
			{
				$kocrud->quota_datetime = DB::expr('NOW()');
				$kocrud->quota_count = 1;
			}
			else
			{
				self::_error(400, 'invalid', 'Requests limit reached in the last hour ('.$kocrud->quota_limit.')', NULL);
			}
		}
		
		$kocrud->quota_count++;
		$kocrud->save();

		return TRUE;
	}

	/**
	 * Get one record or trigger many records if relationship was requested.
	 *
	 * @param   array   Parameters as array
	 * @return  array   Array with responsive data
	 */
	private function _get_one($param = NULL)
	{
		// Check whether row was loaded
		if ( ! $this->orm->loaded())
		{
			self::_error(400, 'invalid', 'The record was not found', 'primary_key');
		}

		// Check if we are dealing with relationship
		if ( ! empty($param[2]))
		{
			// Set correct model
			$this->model = $param[2];

			// Init relationship ORM model
			$this->orm = $this->orm->$param[2];

			// Redraw relationship columns
			$this->columns = array_keys($this->orm->list_columns());

			// Return all relationship rows
			return self::_get_many();
		}

		// Reset singular model name
		$this->model = $param[0];

		// Get column data as array
		$data = array();
		foreach ($this->columns as $column)
		{
			$data[$column] = $this->orm->$column;
		}

		$response = array(
			'request' => array
			(
				'response' => $data,
				'status' => 200,
				'details' => array
				(
				)
			)
		);
		
		return $response;
	}

	/**
	 * Get many records
	 *
	 * @return  array   Array of data
	 */
	private function _get_many()
	{
		// Check for ordering records
		if ( ! empty($_GET['__sort']))
		{
			$sorts = explode(',', $_GET['__sort']);
			foreach ($sorts as $sort)
			{
				$dir = 'ASC';

				if ($sort[0] == '-' OR $sort[0] == '+')
				{
					$dir = ($sort[0] == '-' ? 'DESC' : 'ASC');
					$sort = substr($sort, 1);
				}

				$this->orm->order_by(trim($sort), $dir);
			}
		}

		// Check for limit
		$max_limit = Kohana::config('kocrud.limit_max');
		$max_limit = ($max_limit == NULL ? 100 : intval($max_limit));
		$limit = Kohana::config('kocrud.limit_default');
		$limit = ($limit == NULL ? 25 : intval($limit));

		if ( ! empty($_GET['__limit']))
		{
			$limit = (($_GET['__limit'] < $max_limit) ? $_GET['__limit'] : $max_limit);
		}

		$this->orm->limit($limit);
		
		// Check for page
		$page = ( ! empty($_GET['__page']) ? $_GET['__page'] : 1 );
		$this->orm->offset(($page*$limit)-$limit);

		// Build up the request results
		$items = $this->orm->find_all();

		// Get columns data as array
		$data = array();
		foreach ($items as $item)
		{
			$_data = array();
			foreach ($this->columns as $column)
			{
				$_data[$column] = $item->$column;
			}
			$data[] = $_data;
		}
		
		$response = array(
			'request' => array
			(
				'response' => $data,
				'status' => 200,
				'details' => array
				(
					'sort' => isset($_GET['__sort']) ? $_GET['__sort'] : '',
					'limit' => $limit,
					'page' => $page,
					'pages' => ceil($this->orm->count_all() / $limit),
					'total' => $this->orm->count_all()
				)
			)
		);
		
		return $response;
	}

	/**
	 * Create record
	 *
	 * @return  array  Response status or error
	 */
	private function _post_one()
	{
		
		return array();
	}

	/**
	 * Update record
	 * 
	 * @param   int    Record ID
	 * @return  array  Response status or error
	 */
	private function _put_one($id = 0)
	{
		return array();
	}

	/**
	 * Delete record
	 * 
	 * @param   int    Record ID
	 * @return  array  Response status or error
	 */
	private function _delete_one($id = 0)
	{
		return array();
	}

	private function _error($status = 400, $reason = NULL, $message = NULL, $param = NULL)
	{
		$data = array
		(
			'request' => array
			(
				'status' => $status,
				'error' => array
				(
					'param' => $param,
					'reason' => $reason,
					'message' => $message
				)
			)
		);

		$driver = Kocrud_Driver::factory($this->driver, $data, NULL);

		exit;
	}

	/**
	 * Find string extension
	 *
	 * @param   string   The string to parse
	 * @return  string   Characters after last dot
	 */
	private function _find_extension($str = NULL)
	{
		$dots = split('[/\\.]', strtolower($str));
		return $dots[count($dots)-1]; 
	}
}
