<?php
class Model_Companie extends ORM{
    protected $_belongs_to = array("businesstype"=>array("model"=>"businesstype","foreign_key"=>"business_types_id"));
}
?>