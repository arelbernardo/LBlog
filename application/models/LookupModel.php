<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 15/09/2016
 * Time: 9:20 AM
 * @property Date_helper $Date_helper                   Date_helper
 */
class LookupModel extends Core_model
{
    #constructor region
    public function __construct() {
        parent::__construct();
    }

    #public region
    public function getAllCountries() {
        $this->db
            ->select("*")
            ->from("country")
            ->order_by("CountryName");
        $query = $this->db->get_compiled_select();
        $countryList = $this->db->query($query);
        return $countryList->result();
    }

    #end region
}