<?php defined('SYSPATH') or die('No direct script access.');

class Model_Kocrud extends ORM {

	protected $_db = 'default';
	protected $_primary_key = 'id';
	protected $_primary_val = 'title';
	protected $_table_name = 'kocrud';
	protected $_rules = array
	(
		'title' => array
		(
			'not_empty' => NULL,
		),
		'ip' => array
		(
			'ip' => NULL
		),
		'limit' => array
		(
			'digit' => NULL
		)
	);
	protected $_filters = array
	(
		TRUE => array
		(
			'trim' => NULL
		)
	);
	
	public function create_table()
	{
		$query = '';
	}
	
	public function pbkdf2($string = NULL, $salt = NULL, $count = NULL, $length = NULL, $algorithm = 'sha1')
	{
		$hash_length = strlen(hash($algorithm, NULL, TRUE));

		if ($length <= (pow(2, 32) - 1) * $hash_length)
		{
			$l = ceil($length / $hash_length);
			$hash = NULL;
			for ($x = 1; $x <= $l; $x++)
			{
				$first = $_hash = hash_hmac($algorithm, $salt.pack('N', $x), $string, TRUE);
				for ($y = 1; $y < $count; $y++)
				{
					$first ^= ($_hash = hash_hmac($algorithm, $_hash, $string, TRUE));
				}
				$hash .= $first;
			}
			
			return substr($hash, 0, $length);
		}
		
		return FALSE;
	}

}
