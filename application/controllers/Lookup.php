<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 15/09/2016
 * Time: 9:17 AM
 * @property Lookupmodel $Lookupmodel                           Lookup Model
 * @property Date_helper $Date_helper                           Date_helper
 */
class Lookup extends Core_controller
{
    #constructor region
    public function __construct() {
        parent::__construct();
        $this->load->model('Lookupmodel');
    }

    #public region
    public function getAllCountries() {
        echo json_encode($this->Lookupmodel->getAllCountries());
    }

    public function getDatePickerContents() {
        $content = array(
            "years" => $this->date_helper->getListOfYears(),
            "months" => $this->date_helper->getListOfMonths(),
            "days" => $this->date_helper->getListOfDays()
        );
        echo json_encode($content);
    }

    #end region
}