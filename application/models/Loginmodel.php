<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 16/09/2016
 * Time: 11:17 PM
 * @property encryption_helper $encryption_helper                   encryption_helper
 */
class Loginmodel extends Core_model
{
    public function __construct() {
        parent::__construct();
    }

    public function loginToAccount($data) {
        $where = array(
            "Username" => $data['username'],
            "Password" => $this->encryption_helper->encrypt_password($data['password']),
        );
        $this->db->select("UserCode, Username")->from("member")->where($where);
        $query = $this->db->get_compiled_select();
        $result = $this->db->query($query);
        if($result->num_rows() > 0) {
            return array(
                "hasRecord" => true,
                "data" => $result->row(),
            );
        } else {
            return array(
                "hasRecord" => false,
                "data" => '',
            );
        }
    }
}