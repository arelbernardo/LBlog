<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 20/09/2016
 * Time: 4:22 PM
 * @property Personmodel $Personmodel                       Personmodel
 */
class Profile extends Core_controller
{
    #constructor
    public $session;
    public function __construct() {
        $this->session = parent::__construct();
        $this->load->model("Personmodel");
    }
    #public region
    public function index($profileUsername = null) {
        if(!$profileUsername) {
            //todo
            show_404();
        } else {
            $response = $this->Personmodel->validateIfUsernameIsExisting($profileUsername);
            if($response['hasResult']) {
                $userCode = $response['data']->UserCode;
                $personInformation = $this->Personmodel->getMemberInformationBySessionCode($userCode);
                $personInformation = json_decode(json_encode($personInformation), true);
                $buddyStatus = $this->Personmodel->validateIfPersonIsBuddyByPersonId($personInformation['PersonId']);
                $personInformation['buddyStatus'] = $buddyStatus;
                $pageContent = array(
                    "hasSession" => $this->session['hasActiveSession'],
                    "headFlags" => 'Profile',
                    "body" => 'template/body_content/profile_body',
                    "data" => $personInformation,
                );
                $this->load->view('template/master_view', $pageContent);
            } else {
                show_404();
            }
        }
    }
    #end region
}