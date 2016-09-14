<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 14/09/2016
 * Time: 3:52 PM
 */
class Registration extends Core_controller
{
    private $hasSession;

    public function __construct() {
        $this->hasSession = parent::__construct();
    }


    public function index() {
        $pageContent = array(
            "head" => 'template/head_assets/registration_head',
            "hasSession" => $this->hasSession['hasActiveSession'],
            "naviBarFlag" => 'Registration',
            "body" => 'template/body_assets/registration_body'
        );
        $this->load->view('template/master_view', $pageContent);
    }
}