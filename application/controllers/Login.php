<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 16/09/2016
 * Time: 7:00 PM
 * @property Loginmodel $Loginmodel                 Loginmodel
 */
class Login extends Core_controller
{
    #
    private $session;
    public function __construct() {
        $this->session = parent::__construct();
        $this->load->model("Loginmodel");
    }

    public function index() {
        $pageContent = array(
            "hasSession" => $this->session['hasActiveSession'],
            "headFlags" => 'Login',
            "body" => 'template/body_content/login_body'
        );
        $this->load->view('template/master_view', $pageContent);
    }

    public function loginToAccount() {
        $data = $this->input->post("data");
        $response = $this->Loginmodel->loginToAccount($data);
        if($response['hasRecord']) {
            $this->session_helper->setActiveSession($response['data']);
        }
        echo json_encode($response);
    }
}