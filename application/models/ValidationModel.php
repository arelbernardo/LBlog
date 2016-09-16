<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 16/09/2016
 * Time: 6:02 PM
 */
class ValidationModel extends Core_model
{
    #construct
    public function __construct() {
        parent::__construct();
    }

    #public region

    public function validateDuplicateField($field) {
        $this->db
            ->select("*")
            ->from($field["table"])
            ->where($field["column"]);
        $query = $this->db->get_compiled_select();
        $result = $this->db->query($query);
        if($result->num_rows() > 0) {
            return array(
                "hasDuplicate" => true
            );
        } else {
            return array(
                "hasDuplicate" => false
            );
        }
    }

    #end region
}