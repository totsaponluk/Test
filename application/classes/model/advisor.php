<?php
class Model_Advisor extends ORM{
    protected $_belongs_to = array("category"=>array("model"=>"categorie","foreign_key"=>"categories_id"));

}
?>