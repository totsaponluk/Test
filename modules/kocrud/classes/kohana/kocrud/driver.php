<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Kocrud driver handler
 *
 * @package    Kocrud
 * @author     Birkir R Gudjonsson (birkir.gudjonsson@gmail.com)
 * @copyright  (c) 2010 Birkir R Gudjonsson
 * @license    http://kohanaphp.com/license
 */
class Kohana_Kocrud_Driver {

	public static function factory($driver = NULL, $data = NULL, $model = NULL)
	{
		return new Kocrud_Driver($driver, $data, $model);
	}

	public function __construct($driver, $data = NULL, $model = NULL)
	{
		// Set class name
		$driver = 'Kocrud_Driver_'.ucfirst($driver);

		return new $driver($data, $model);
	}

}