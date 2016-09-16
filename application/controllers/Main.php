<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: arel
 * Date: 13/09/2016
 * Time: 8:15 PM
 */
class Main extends Core_controller
{
    #constructor region
    const IS_MAIN_PAGE = true;
    private $session;

    public function __construct()
    {
        $this->session = parent::__construct(self::IS_MAIN_PAGE);
    }

    #public region
    public function index()
    {
        $pageContent = array(
            "head" => 'template/head_assets/welcome_head',
            "hasSession" => $this->session['hasActiveSession'],
            "naviBarFlag" => 'Main',
            "body" => 'template/body_assets/welcome_body'
        );
        $this->load->view('template/master_view', $pageContent);
    }
    #end region
}