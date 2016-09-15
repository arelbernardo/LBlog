<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 15/09/2016
 * Time: 9:17 AM
 * @property LookupModel $LookupModel                           Lookup Model
 */
class Lookup extends Core_controller
{
    #constructor region
    public function __construct() {
        parent::__construct();
        $this->load->model('LookupModel');
    }

    #public region
    public function getAllCountries() {
        echo json_encode($this->LookupModel->getAllCountries());
    }
    
    #end region
}