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
 */
{
    function __construct() {
        parent::__construct();
    }

    function getLastInsertedId() {
        return $this->db->insert_id();
    }
}
