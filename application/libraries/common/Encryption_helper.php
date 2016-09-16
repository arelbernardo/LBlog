<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 16/09/2016
 * Time: 4:52 PM
 */
class Encryption_helper
{
    public function __construct() {

    }

    public function encrypt_password($password) {
        return hash("sha256", $password);
    }
}