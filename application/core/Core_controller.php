<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:21 PM
 *
 * @property CI_Loader $load                            Loads views and files
 * @property session_helper $session_helper                    session helper
 */
class Core_controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if(session_id() == '') {
            session_start();
        }
        $this->load->library('common/Session_helper');
        return $this->_validateSession();
    }

    private function _validateSession() {
       return $this->session_helper->hasActiveSession();
    }
}