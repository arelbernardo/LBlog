<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:56 PM
 */
class Session_helper
{
    public function __construct() {
        if(session_id() == '') {
            session_start();
        }
    }

    public function hasActiveSession() {
        return array(
            "hasActiveSession" => isset($_SESSION['username'])
        );
    }

    public function setActiveSession($personInfo) {
        $_SESSION['username'] = $personInfo->Username;
        $_SESSION['usercode'] = $personInfo->UserCode;
    }

    public function getActiveSession() {
        return array(
            "username" => $_SESSION['username'],
            "usercode" => $_SESSION['usercode']
        );
    }

    public function destroyActiveSession() {
        unset($_SESSION['username']);
        unset($_SESSION['usercode']);
    }
}