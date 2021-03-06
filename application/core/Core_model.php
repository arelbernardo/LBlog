<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:21 PM
 *
 *
 * @property CI_DB_active_record $db                    This is the platform-independent base Active Record implementation class.
 * @property CI_Loader $load                            Loads views and files
 * @property Date_helper $Date_helper                   Date_helper
 * @property session_helper $session_helper             Session_helper
 * @property encryption_helper $Encrypt_helper          Encryption_helper
 */
class Core_model extends CI_Model
{
    function __construct() {
        parent::__construct();

        $this->load->library('common/Date_helper');
        $this->load->library('common/Session_helper');
        $this->load->library('common/Encryption_helper');
    }

    function getLastInsertedId() {
        return $this->db->insert_id();
    }
}