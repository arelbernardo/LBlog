<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 17/09/2016
 * Time: 2:20 PM
 * @property Personmodel $Personmodel                           Personmodel
 */
class Person extends Core_controller
{
    #constructor
    public function __construct() {
        parent::__construct();
        $this->load->model("Personmodel");
    }
    #public region



    #end region
}