<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 20/09/2016
 * Time: 4:22 PM
 */
class Profile extends Core_controller
{
    #constructor
    public $session;
    public function __construct() {
        $this->session = parent::__construct();
    }
    #public region
    public function index($profileUsername = null) {
        if(!$profileUsername) {
            //todo
            show_404();
        } else {
            $pageContent = array(
                "hasSession" => $this->session['hasActiveSession'],
                "headFlags" => 'Profile',
                "body" => 'template/body_content/profile_body'
            );
            $this->load->view('template/master_view', $pageContent);
        }
    }
    #end region
}