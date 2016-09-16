<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 17/09/2016
 * Time: 12:41 AM
 *
 */
class Home extends Core_controller
{
    const IS_HOMEPAGE = true;
    public $session;
    #constructor
    public function __construct() {
        $this->session = parent::__construct(self::IS_HOMEPAGE);
    }

    #public region

    public function index() {
        $pageContent = array(
            "hasSession" => $this->session['hasActiveSession'],
            "headFlags" => 'Home',
            "body" => 'template/body_content/homepage_body'
        );
        $this->load->view('template/master_view', $pageContent);
    }

    #end region
}