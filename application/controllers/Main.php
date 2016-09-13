<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:15 PM
 */
class Main extends core_controller
{
    function __construct() {
        parent::__construct();
    }

    function index() {
        echo "haha";
    }
}