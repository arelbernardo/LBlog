<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 14/09/2016
 * Time: 3:52 PM
 * @property RegistrationModel $RegistrationModel                   RegistrationModel
 * @property ValidationModel $ValidationModel                       ValidationModel
 */
class Registration extends Core_controller
{
    #constructor region
    private $hasSession;

    public function __construct() {
        $this->hasSession = parent::__construct();
        $this->load->model("RegistrationModel");
        $this->load->model("ValidationModel");
    }

    #public region
    public function index() {
        $pageContent = array(
            "head" => 'template/head_assets/registration_head',
            "hasSession" => $this->hasSession['hasActiveSession'],
            "naviBarFlag" => 'Registration',
            "body" => 'template/body_assets/registration_body'
        );
        $this->load->view('template/master_view', $pageContent);
    }

    public function createNewAccount()
    {
        $personInformation = $this->input->post("data");
        $response = $this->input_helper->validateFields($personInformation);
        if (!$response['hasError']) {
            $fields = array(
                array(
                    "column" => array("Username" => $personInformation['data']['userName']),
                    "table" => "member",
                    "field" => "Username",
                ),
                array(
                    "column" => array("EmailAddress" => $personInformation['data']['email']),
                    "table" => "person",
                    "field" => "Email Address",
                )
            );
            foreach($fields as $field) {
                $duplicateResponse = $this->ValidationModel->validateDuplicateField($field);
                if($duplicateResponse['hasDuplicate']) {
                    $response = array(
                        "hasError" => true,
                        "msg" => $field['field']. " is already existing."
                    );
                    break;
                }
            }

            if(!$response["hasError"]) {
                $response = $this->RegistrationModel->createNewAccount($personInformation['data']);
            }
        }
        echo json_encode($response);
    }
    #end region
}