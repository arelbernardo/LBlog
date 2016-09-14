<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:15 PM
 */
class Main extends core_controller
{
    private $session;
    function __construct() {
        $this->session = parent::__construct();
    }

    function index() {
        if($this->session['hasActiveSession']) {
            $pageContent = array(
                "head" => 'template/head_assets/mainpage_without_login',
                "hasSession" => $this->session['hasActiveSession'],
                "body" => 'template/body_assets/mainpage_body'
            );
        } else {
            $pageContent = array(
                "head" => 'template/head_assets/mainpage_with_login',
                "hasSession" => $this->session['hasActiveSession'],
                "body" => 'template/body_assets/mainpage_body'
            );
        }
        $this->load->view('template/master_view', $pageContent);
    }
}