<?php defined('SYSPATH') or die('No direct script access.');

class CRUD extends ORM {
	
	public function has_many()
	{
		return $this->_has_many;
	}
	
	public function has_one()
	{
		return $this->_has_one;
	}
	
	public function belongs_to()
	{
		return $this->_belongs_to;
	}
	
	public function primary_key()
	{
		return $this->_primary_key;
	}
	
	public function primary_val()
	{
		return $this->_primary_val;
	}
	
}