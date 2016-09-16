<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 16/09/2016
 * Time: 3:46 PM
 * @property encryption_helper $encryption_helper                       encryption_helper
 */
class RegistrationModel extends Core_model
{
    #construct region
    public function __construct() {
        parent::__construct();
    }

    #create record region
    public function createNewAccount($data) {
        $this->db->trans_start();
            $personData = array(
                "Firstname" => $data['firstName'],
                "lastName" => $data['lastName'],
                "Birthday" => $data['birthday'],
                "EmailAddress" => $data['email'],
                "CountryId" => $data['countryId']);

            $this->db->insert("person", $personData);
            $personId = $this->getLastInsertedId();
            $member = array(
                "Username" => $data['userName'],
                "Password" => $this->encryption_helper->encrypt_password($data['password']),
                "IsActive" => 1,
                "PersonId" => $personId
            );
            $this->db->insert("member", $member);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            return array(
                'hasError' => true,
                'msg' => 'Failed to create an account. Please try again.');
        } else {
            return array(
                'hasError' => false,
                'msg' => 'You have successfully registered');
        }
    }
    #end region

}