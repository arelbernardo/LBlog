<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:15 PM
 */
class Main extends Core_controller
{
    private $session;
    function __construct() {
        $this->session = parent::__construct();
    }

    function index() {
        $pageContent = array(
            "head" => 'template/head_assets/mainpage_welcome',
            "hasSession" => $this->session['hasActiveSession'],
            "body" => 'template/body_assets/mainpage_greetings_body'
        );
        $this->load->view('template/master_view', $pageContent);
    }
}