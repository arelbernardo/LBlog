<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:21 PM
 *
 * @property CI_Loader $load                            Loads views and files
 * @property session_helper $session_helper             session helper
 * @property date_helper $date_helper                   date helper
 * @property input_helper $input_helper                 input helper
 * @property encryption_helper $encrypt_helper          encrypt_helper
 * @property html_helper $html_helper                   html_helper
 */
class Core_controller extends CI_Controller
{
    public function __construct($isHomepage = false) {
        parent::__construct();
        if(session_id() == '') {
            session_start();
        }
        $this->load->library('common/Encryption_helper');
        $this->load->library('common/Session_helper');
        $this->load->library('common/Date_helper');
        $this->load->library('common/Input_helper');
        $this->load->library('common/Html_helper');
        return $this->_validateSession($isHomepage);
    }

    private function _validateSession($isHomepage) {
        $session = $this->session_helper->hasActiveSession();
        if($isHomepage) {
            return $session;
        } else {
            if($session['hasActiveSession']) {
                //Redirect(site_url("Main"));
                return $session;
            } else {
                return $session;
            }
        }
    }
}