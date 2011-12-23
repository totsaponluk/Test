<?php defined('SYSPATH') or die('No direct access.');
class Model_BusinessType extends ORM{
    protected $_table_name = 'business_types';
    protected $_primary_key = 'id'; 
    protected $_has_many = array('companie' => array ( 'foreign_key' => 'business_types_id'));
}
?>